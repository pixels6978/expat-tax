<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\AmendedReturnsFile;
use App\Models\Filing;
use App\Models\FilingYears;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GeneralInformation extends Component
{
    use GlobalService; use WithFileUploads;



	public $hasIPPIN = 'no';
	public $addIPPIN;
    public $currentStep=1;
    public $currentView ='general-question';
    public $CorporateOrPartnerTax,$ReturningClient,$NumberofFilesUploded,$UploadPreviousUSTax,$FiledExtention,$SpecifyExtendedDate,$ClaimedasDependent,$StreamLinedFile;
    public $partnership, $ccorporation, $scorporation, $foreignCorporation;
    public $notProfit;
    public $AmendedReturns='';
    public $SupportingDocument = [];
    public $NonWillfulWording;
    public $NumberofFormsToUpload =0;
    public $FiledPreviousUSTax,$ImmigrationDate,$LivingInUS,$IPPIN,$ProvidePIN,$CantFindPIN;
    public $uploadedAmendedReturnFiles=[];
    public $uploadedAmendedReturnFilesIds=[];
    public $UploadedPreviousUSTax;




	protected $listeners = ['SetPINStatus','ToggleAmendedReturns','back'];

    public function render()
    {
        return view('livewire.general-information');
    }

    public function mount()
    {
        if(CurrentFilingYear() != false){
            $current_filing_year = FilingYears::where('id', CurrentFilingYear())->where('user_id',UserID())->first();

            if($current_filing_year && $current_filing_year->Filing){
                $this->CorporateOrPartnerTax = $current_filing_year->Filing->additional_returns;
                $this->partnership = $current_filing_year->Filing->partnership;
                $this->foreignCorporation = $current_filing_year->Filing->foreign_corporation;
                $this->ccorporation = $current_filing_year->Filing->ccorporation;
                $this->scorporation = $current_filing_year->Filing->scorporation;
                $this->notProfit = $current_filing_year->Filing->not_profit;
                $this->AmendedReturns = $current_filing_year->Filing->amended_returns;
                $this->ReturningClient = $current_filing_year->Filing->returning_clients;
                $this->FiledPreviousUSTax = $current_filing_year->Filing->ustax_return;
                $this->UploadedPreviousUSTax = $current_filing_year->Filing->ustax_return_file;
                $this->FiledExtention = $current_filing_year->Filing->taxreturn_extension;
                $this->SpecifyExtendedDate = $current_filing_year->Filing->duedate_return;
                $this->ClaimedasDependent = $current_filing_year->Filing->claimed_dependent;

                foreach($current_filing_year->Filing->AmendedReturnsFiles as $files){
                    $this->uploadedAmendedReturnFiles[]= $files->file;
                    
                }

                // streamlined procedure
                $this->StreamLinedFile=$current_filing_year->Filing->streamlined_filing;
                $this->NonWillfulWording =$current_filing_year->Filing->non_willful_wording;

                // general questions
                $this->ImmigrationDate = $current_filing_year->Filing->immigrated_date;
                $this->LivingInUS = $current_filing_year->Filing->living_us;
                $this->IPPIN = $current_filing_year->Filing->ip_pin;
                $this->ProvidePIN = $current_filing_year->Filing->ippin_number;
                $this->CantFindPIN = $current_filing_year->Filing->cant_find_ip_pin;

            }
        }


    }

    public function SetPINStatus($status){

    	$this->addIPPIN = ($status == 'yes') ? 'yes':'no';
    }

    public function submitSectionOne(){
        // dd('hee');
         $validatedData = $this->validate(['CorporateOrPartnerTax' => 'required',
            'AmendedReturns'=>'required',
            'ReturningClient'=>'required','FiledExtention'=>'required_if:ReturningClient,===,no',
            'ClaimedasDependent'=>'required',
            //'SpecifyExtendedDate'=>'required_if:FiledExtention,===,yes',
            //'SupportingDocument'=>'required_if:AmendedReturns,===,yes',
            // 'UploadPreviousUSTax'=>'required_if:FiledPreviousUSTax,===,yes'
            ],

            [
                'CorporateOrPartnerTax.required'=>'Select an option'
            ]

        );


        if(CurrentFilingYear() != false){
            $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
            
            // Check if this year is already filed and update...
            $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                $filed->filing_years_id = $filing_year->id;
                $filed->additional_returns = $this->CorporateOrPartnerTax;
                $filed->partnership = $this->partnership;
                $filed->foreign_corporation = $this->foreignCorporation;
                $filed->ccorporation = $this->ccorporation;
                $filed->scorporation = $this->scorporation;
                $filed->not_profit = $this->notProfit;
                $filed->amended_returns = $this->AmendedReturns;
                $filed->returning_clients = $this->ReturningClient;
                $filed->ustax_return = $this->FiledPreviousUSTax;

                if(!empty($this->UploadPreviousUSTax)){
                    //$filed->ustax_return_file = $this->UploadPreviousUSTax->store('files');
                    $fileName = time().'-'.rand().'ups';
                    $filed->ustax_return_file= $this->UploadPreviousUSTax->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
                }

                $filed->taxreturn_extension = $this->FiledExtention;
                $filed->duedate_return = $this->SpecifyExtendedDate;
                $filed->claimed_dependent = $this->ClaimedasDependent;
                $filed->save();


                if($this->AmendedReturns == 'yes' && count($this->SupportingDocument)>0){
                    foreach($this->SupportingDocument as $file){
                        $amended_files = new AmendedReturnsFile;
                        $amended_files->filings_id = $filed->id;
                        //$amended_files->file = $file->store('files');
                        $fileName = time().'-'.rand().'spd';
                        $amended_files->file = $file->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
                        $amended_files->save();
                    }
                }

            return $this->currentStep ++;
            }


            // else if new application
            $filing = new Filing;
            $filing->filing_years_id = $filing_year->id;
            $filing->additional_returns = $this->CorporateOrPartnerTax;
            $filing->partnership = $this->partnership;
            $filing->foreign_corporation = $this->foreignCorporation;
            $filing->ccorporation = $this->ccorporation;
            $filing->scorporation = $this->scorporation;
            $filing->not_profit = $this->notProfit;
            $filing->amended_returns = $this->AmendedReturns;
            $filing->returning_clients = $this->ReturningClient;
            $filing->ustax_return = $this->FiledPreviousUSTax;

            if(!empty($this->UploadPreviousUSTax)){
                //$filing->ustax_return_file = $this->UploadPreviousUSTax->store('files', 'public');
                $fileName = time().'-'.rand().'ups';
                $filing->ustax_return_file = $this->UploadPreviousUSTax->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
            }

            $filing->taxreturn_extension = $this->FiledExtention;
            $filing->duedate_return = $this->SpecifyExtendedDate;
            $filing->claimed_dependent = $this->ClaimedasDependent;
            $filing->save();


            if($this->AmendedReturns == 'yes' && count($this->SupportingDocument)>0){
                foreach($this->SupportingDocument as $file){
                    $amended_files = new AmendedReturnsFile;
                    $amended_files->filings_id = $filing->id;
                    //$amended_files->file = $file->store('files', 'public');
                    
                    $fileName = time().'-'.rand().'spd';
                    $amended_files->file = $file->storeOnCloudinaryAs('expattaxcpa', $fileName)->getSecurePath();
                    
                    $amended_files->save();
                }
            }
        }




        $this->currentStep ++;
        $this->progressUpdate();
        $this->emit('IncreamentProgress');

    }

    public function submitGeneralQuestion(){
        $validatedData = $this->validate(
            [
                'LivingInUS'=>'required',
                'IPPIN'=>'required',
                'ProvidePIN'=>'required_if:IPPIN,===,yes'
                //'NonWillfulWording'=>'required_if:StreamLinedFile,===,yes'

            ]);

            if(CurrentFilingYear() != false){
                $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
                $current_filing = Filing::where('filing_years_id', $filing_year->id)->first();

                if($current_filing){
                    $current_filing->immigrated_date = $this->ImmigrationDate;
                    $current_filing->living_us = $this->LivingInUS;
                    $current_filing->ip_pin = $this->IPPIN;
                    $current_filing->ippin_number = $this->ProvidePIN;
                    $current_filing->cant_find_ip_pin = $this->CantFindPIN;
                    $current_filing->save();
                }
            }

        $this->currentStep ++;
        $this->progressUpdate();
        $this->emit('IncreamentProgress');

        return redirect()->to('/personal-information');
    }

    public function back($step){

         $this->currentStep --;
         $progress = \Session::get('progress') - 2;
         \Session::put('progress',$progress);
         $this->emit('IncreamentProgress');
    }



    public function submitStreamline(){

        $validatedData = $this->validate(
            [
                'StreamLinedFile'=>'required',
                'NonWillfulWording'=>'required_if:StreamLinedFile,===,yes'

            ]);

            if(CurrentFilingYear() != false){
                $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
                $current_filing = Filing::where('filing_years_id', $filing_year->id)->first();

                if($current_filing){
                    $current_filing->streamlined_filing = $this->StreamLinedFile;
                    $current_filing->non_willful_wording = $this->NonWillfulWording;
                    $current_filing->save();
                }
            }

        $this->currentStep ++;
        $this->progressUpdate();
        $this->emit('IncreamentProgress');
    }

    public function ToggleAmendedReturns($status){
        $this->AmendedReturns = $status;
    }

    public function moveToTab($id)
    {
        $this->currentStep = $id;
    }

    public function deleteFileReturn($data,$type=null)
    {
        
        switch($type){
            case 'amended':
                
               $res= AmendedReturnsFile::where('file', $data)->delete();
            
            //    $res->file ='';
            //    $res->save();
                break;
            case 'tax':
                $res=Filing::where('ustax_return_file', $data)->first();
                $res->ustax_return_file = '';
                $res->save();
                break;
        }
       
        $this->emit('file-deleted');
    }


    public function updatedStreamLinedFile($value)
    {
        
        session()->put('isFillingStreamlined',$value);
    }

    public function updatedpartnership($value){
        session()->put('filePartnership',$value);
        $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                $filed->partnership = $this->partnership;
                $filed->save();
            }
    }

    public function updatedccorporation($value){
        session()->put('fileCcorporation',$value);
        $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                //$filed->foreign_corporation = $this->foreignCorporation;
                $filed->ccorporation = $this->ccorporation;
                $filed->save();
            }
    }

    

     public function updatedscorporation($value){
        session()->put('fileScorporation',$value);
         $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                //$filed->foreign_corporation = $this->foreignCorporation;
                 $filed->scorporation = $this->scorporation;
                $filed->save();
            }
    }

     public function updatedforeignCorporation($value){
        session()->put('fileForeignCorporation',$value);
        $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                $filed->foreign_corporation = $this->foreignCorporation;
                
                $filed->save();
            }
    }


     public function updatednotProfit($value){
        session()->put('fileNotProfit',$value);
        $filing_year = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filed = Filing::where('filing_years_id', $filing_year->id)->first();
            if($filed){
                $filed->not_profit = $this->notProfit;
                
                $filed->save();
            }
    }


               
               
               


}
