<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use App\Core\GlobalService;
use Livewire\WithFileUploads;
use App\Models\Country;
use App\Models\Wages as WagesModel;
use App\Models\WagesFiles;
use App\Models\UserEmployers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class Wages extends Component
{
    use WithFileUploads;

	use GlobalService;
	public $currentStep=1;
	public $DoyouHaveSalaryIncome,$DoyouHaveW2Forms,$DidYouFileIsraliTax,$WasIncomeReceivedOnTlush;
	public $NumberofFormsToUploadIsraeliTaxReturn,$DidYouReceiveAnyCompensation,$NumberofFormsToUploadDidYouReceiveAnyCompensation,$NumberofFormsToUploadAustralianIncomeTax;
	public $NumberofUploadFilePayFromDec=1;
	public $PayFromDeclip,$NonTaxDistribution,$AmountDistributed,$NumberofEmployers,$NameofEmployer;
	public $UploadFileUKIncomeTax=1;
	public $UploadFileUKPaySlips=1;
	public $NumberofUploadsCanadianForms =1;
	public $T4WageStatements;
	public $NumberofT4WageStatements=1;
	public $NumberofSupportingDocuments = 1;
	public $NumberofWageSatements =1;
	public $P60Forms,$DidYouTerminateYourContract,$EmployedByMoreOneEmployer,$Country;
    public $countries;
    public $NumberofFormsToUpload=1;
    public $NumberofForms106 =1;

    public $w2Forms =[];
    public $UKPaySlipForm=[];
    public $UploadSupportingDocuments = [];
    public $UploadWageStatements = [];
    public $IsraleiTaxReturnFiles = [];
    public $Forms106 = [];
    public $UploadFileCompensationForms = [];
    public $UploadFileAustralianIncomeTax = [];
    public $UploadFilePayFromDec = [];
    public $UKIncomeTaxForm = [];
    public $DoyouHaveIncomeOutsideUS;
    public $EmployerName = [];
    public $DatesofEmployment =[];
    public $UploadCanadianForms   = [];
    public $UploadT4WageStatements = [];
    public $CountEmployers =1;

    public function mount()
    {
        $this->countries = Country::get();

    }

    public function DoyouHaveIncomeOutsideUS($val){
        session()->put('ClientHasIncomeOutsideUS',$val);
    }

    public function render()
    {
        return view('livewire.income.wages');
    }

    public function submitWages(){
    	// $validatedData = $this->validate(
        //     [
                //'DoyouHaveSalaryIncome'=>'required',
                // 'DoyouHaveW2Forms'=>'required',
                // 'WasIncomeReceivedOnTlush'=>'required',
                // 'DidYouReceiveAnyCompensation'=>'required',
                // 'UploadFileAustralianIncomeTax'=>'required',
                // 'NonTaxDistribution'=>'required',
                // 'AmountDistributed'=>'required_if:NonTaxDistribution,===,yes',
                 //'EmployerName'=>'required_if:Country,===,United Kingdom || required_if:Country,===,Australia',
                // 'P60Forms'=>'required_if:Country,===,United Kingdom',
                // 'DidYouTerminateYourContract'=>'required',
                 //'//EmployedByMoreOneEmployer'=>'required_if:Country,===,United Kingdom || required_if:Country,===,Australia'

           // ]);
            
         
           
            $wage = WagesModel::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
           
            if($wage){
                $this->saveWageData($wage);  
            }else{
                $wage = new WagesModel;
                $this->saveWageData($wage);
               
            }
            
            if(session()->get('ClientHasIncomeOutsideUS') == 'yes'){
                return redirect()->to('/foreign-income');
                }else
                {
                    return redirect()->to('/business-income');
            }
            

    	// $this->progressUpdate();
     //    $this->emit('IncreamentProgress');
    }

    public function saveWageData($wage){
                $wage->salary_income = $this->DoyouHaveSalaryIncome;
                $wage->w2forms = $this->DoyouHaveW2Forms;
                $wage->wage_country = $this->Country;
                $wage->is_file_isralei_tax_return =$this->DidYouFileIsraliTax;
                $wage->was_income_received_on_tlush =$this->WasIncomeReceivedOnTlush;
                $wage->did_you_receive_any_compensation =$this->DidYouReceiveAnyCompensation;
                $wage->non_tax_distribution =$this->NonTaxDistribution;
                $wage->amount_distributed =$this->AmountDistributed;
                $wage->number_of_employers =$this->NumberofEmployers;
               
                $wage->user_id = UserID();
                $wage->filing_years_id = CurrentFilingYear();
                $wage->save();

                if(!empty($this->UKPaySlipForm)){
                  $this->uploadMultipleForms($this->UKPaySlipForm,$wage,'UKPaySlipForm');
                }

                if(!empty($this->P60Forms)){
                        $wage_file = new WagesFiles;
                        $wage_file->user_id = UserID();
                        $wage_file->wages_id = $wage->id;
                        $wage_file->path = $file->storeOnCloudinary('expattaxcpa')->getSecurePath();
                        $wage_file->type = 'P60Forms';
                        $wage_file->save();
                }

                if(!empty($this->w2Forms)){
                    $this->uploadMultipleForms($this->w2Forms,$wage,'w2Forms');
                }

                if(!empty($this->UploadSupportingDocuments)){
                    $this->uploadMultipleForms($this->UploadSupportingDocuments,$wage,'UploadSupportingDocuments');
                }
                

                if(!empty($this->IsraleiTaxReturnFiles)){
                    $this->uploadMultipleForms($this->IsraleiTaxReturnFiles,$wage,'IsraleiTaxReturnFiles');
                }

                if(!empty($this->Forms106)){
                    $this->uploadMultipleForms($this->Forms106,$wage,'Forms106');
                }

                if(!empty($this->UploadFileCompensationForms)){
                    $this->uploadMultipleForms($this->UploadFileCompensationForms,$wage,'UploadFileCompensationForms');
                }

                if(!empty($this->UploadFileAustralianIncomeTax)){
                    $this->uploadMultipleForms($this->UploadFileAustralianIncomeTax,$wage,'UploadFileAustralianIncomeTax');
                }
                if(!empty($this->UploadFilePayFromDec)){
                    $this->uploadMultipleForms($this->UploadFilePayFromDec,$wage,'UploadFilePayFromDec');
                }

                if(!empty($this->UploadWageStatements)){
                    $this->uploadMultipleForms($this->UploadWageStatements,$wage,'UploadWageStatements');
                }

                if(!empty($this->UKIncomeTaxForm)){
                    $this->uploadMultipleForms($this->UKIncomeTaxForm,$wage,'UKIncomeTaxForm');
                }

                if(!empty($this->UploadCanadianForms)){
                    $this->uploadMultipleForms($this->UploadCanadianForms,$wage,'UploadCanadianForms');
                }

                if(!empty($this->UploadT4WageStatements)){
                    $this->uploadMultipleForms($this->UploadT4WageStatements,$wage,'UploadT4WageStatements');
                }

                
                
    }

    public function uploadMultipleForms($data,$wage,$type){
        foreach($data as $file){
            $wage_file = new WagesFiles;
            $wage_file->user_id = UserID();
            $wage_file->wages_id = $wage->id;
            //$wage_file->path = $file->store('files');
            $wage_file->path = $file->storeOnCloudinary('expattaxcpa')->getSecurePath();
            $wage_file->type = $type;
            $wage_file->save();
        }
    }

    public function addEmployerDetails($data){
        $user = new UserEmployers;

        foreach($data as $value){
            $user->user_id =  UserID();
            $user->filing_years_id = CurrentFilingYear();
            $user->employer_name   = $value['.'];
            $user->employment_date = $value['date'];
            $user->save();
        }

    }

    public function setForeignTaxReturns($value){
        session()->put('setForeignTaxStatus',$value);
    }



}
