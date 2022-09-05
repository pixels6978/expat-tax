<?php

namespace App\Http\Livewire\ForeignAccounts;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\FiveFour7ForeignCorporation;

use App\Models\FiveFourSevenOneCompanyInfo;

use App\Models\Five471CompanyShareholder;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Five471foreigncorporation extends Component
{
    use GlobalService; use WithFileUploads;
    public $currentStep = 1;
    public $companyField =[1];
    public $i = 1;
    public $stakeholderfieldId = 1;
    public $shareHolderInfo = [];
    public $skey;
    public $nmberOfShareHolders = 1;
    public $stakeHolderName;
    public $stakeHolderSSN;
    public $shareHolderAddress;
    public $stakeHolderOwnershipType;
    public $stakeHolderOwnershipPercentage;
    public $foreignTaxId;

    public $inputs = [];
    public $shareHolderInput = [];
    public $filingId;
    public $companyId;

    public $isDirector;
    public $countryOfResidence;
    public $hasBranchAgentInUs;

    public $corporationTaxReturn;

    public $signedFinancialStatement,$signedFinancialStatementIsraeli,$dateOfIncorporation,$fiscalYear,$principlePlaceOfBusiness,$shareIssued,$incomeLossReport,$taxReturnFiled,$agentAddress,$agentNumber;
    public $principleBusinessActivity,$accountNumber,$bankName,$countryLawOfInc,$nameOfCorporation,$addressOfCorporation,$agentName;
    public $companies;

     public function render()
    {
        $this->companies = $this->listCompanyData();
       
        return view('livewire.foreign-accounts.five471foreigncorporation');
    }

    public function listCompanyData(){
       return  FiveFourSevenOneCompanyInfo::where('user_id',UserID())->get();
       // Five471CompanyShareholder::where('user_id',UserID())->where('five471_company_information_id',$selectedCompany)->get();
        
    }

     // submit form and route to next
    public function submit5471ForeignCorporation()
    {
        $this->addFilingData();
        $this->addCompanyData();
        $this->addShearHolderInfo();
        // route to next form
        //return redirect()->route('thirty520');
    }

    public function addFilingData()
    {
        // validate data variables
        $validatedData = $this->validate(
            [
               'countryOfResidence'=>'required',
               'isDirector' => 'required',
               'signedFinancialStatement' => 'required_if:isDirector,==,yes',
               'signedFinancialStatementIsraeli' => 'required_if:countryOfResidence,==,IL'
            ]);
      
      if($this->filingId != null){
        //Use current Id
      }else{
        //Create a new Id
        $filingInfo = new FiveFour7ForeignCorporation;
        $filingInfo->user_id                = UserID();
        $filingInfo->filing_years_id        = CurrentFilingYear();
        $filingInfo->operation_country      = $this->countryOfResidence;
        $filingInfo->are_you_officer        = $this->isDirector;

        if(!empty($this->signedFinancialStatement)){
           $filingInfo->signed_financial_stmt  = $this->signedFinancialStatement->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
        }
        if(!empty($this->signedFinancialStatementIsraeli)){
           $filingInfo->signed_financial_stmt  = $this->signedFinancialStatementIsraeli->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
        }

        $filingInfo->save();
        $this->filingId = $filingInfo->id;

      }

    }

    public function addCompanyData()
    {
       $info = FiveFourSevenOneCompanyInfo::where('user_id',UserID())->where('five471_foreign_corporations_id',$this->filingId)->first();

        if(!empty($info)){
            //Edit Data
            $info->foreign_tax_no                   = $this->foreignTaxId;
            $info->incorporation_date               = $this->dateOfIncorporation;
            $info->corporation_name                 = $this->nameOfCorporation;              
            $info->corporation_address              = $this->addressOfCorporation;
            $info->country_laws                     = $this->countryLawOfInc;
            $info->company_bank_name                = $this->bankName;
            $info->company_bank_no                  = $this->accountNumber;
            $info->fiscal_year                      = $this->fiscalYear;
            $info->place_of_business                = $this->principlePlaceOfBusiness;
            $info->business_activity                = $this->principleBusinessActivity;
            $info->branch_in_us                     = $this->hasBranchAgentInUs;
            $info->us_branch_name                   = $this->agentName;
            $info->us_branch_address                = $this->agentAddress;
            $info->us_branch_id_no                  = $this->agentNumber;
            $info->filed_ustax_return               = $this->taxReturnFiled;
            $info->income_tax_paid                  = $this->incomeLossReport;
            $info->no_of_shares_issued              = $this->shareIssued;

            $info->save();

        }else{
            $info = new FiveFourSevenOneCompanyInfo;
            $info->user_id                           = UserID();
            $info->five471_foreign_corporations_id   = $this->filingId;
            $info->foreign_tax_no                    = $this->foreignTaxId;
            $info->incorporation_date                = $this->dateOfIncorporation;
            $info->corporation_name                 = $this->nameOfCorporation;              
            $info->corporation_address              = $this->addressOfCorporation;
            $info->country_laws                     = $this->countryLawOfInc;
            $info->company_bank_name                = $this->bankName;
            $info->company_bank_no                  = $this->accountNumber;
            $info->fiscal_year                      = $this->fiscalYear;
            $info->place_of_business                = $this->principlePlaceOfBusiness;
            $info->business_activity                = $this->principleBusinessActivity;
            $info->branch_in_us                     = $this->hasBranchAgentInUs;
            $info->us_branch_name                   = $this->agentName;
            $info->us_branch_address                = $this->agentAddress;
            $info->us_branch_id_no                  = $this->agentNumber;
            $info->filed_ustax_return               = $this->taxReturnFiled;
            $info->income_tax_paid                  = $this->incomeLossReport;
            $info->no_of_shares_issued              = $this->shareIssued;

            $info->save();

            $this->companyId = $info->id;  
        }

        



    }

    

    public function addShearHolderInfo()
    {
        for($i=0; $i < count($this->stakeHolderName); $i++):
                    $shareHolders = new Five471CompanyShareholder;
                    $shareHolders->user_id              = UserID();
                    $shareHolders->five471_company_information_id = $this->companyId;
                    $shareHolders->name                 = $this->stakeHolderName[$i];
                    $shareHolders->ssn                  = $this->stakeHolderSSN[$i];
                    $shareHolders->address              = $this->shareHolderAddress[$i];
                    $shareHolders->ownership_type       = $this->stakeHolderOwnershipType[$i];
                    $shareHolders->ownership_percentage = $this->stakeHolderOwnershipPercentage[$i];
                    $shareHolders->save();
                            
        endfor;
    }

     // function to create array to loop through to show more Company fields
     public function addCompanyField($i)
     {
         $i++;
         $this->i = $i;
         array_push($this->companyField, $this->i);
     }
 
     // function to remove Company field
     public function removeCompanyField($i)
     {
         if ($i==0) {
             return;
          }
          else{
            array_pop($this->companyField);
          }
     }

     public function addInput($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function removeInput($i)
    {
        array_pop($this->inputs);
    }


    public function addShareholderInput($stakeholderfieldId=null)
    {
        $this->nmberOfShareHolders ++;
        // $stakeholderfieldId = $stakeholderfieldId + 1;
        // $this->stakeholderfieldId = $stakeholderfieldId;
        // array_push($this->shareHolderInput ,$stakeholderfieldId);
    }


    public function removeShareholderInput($value)
    {
        
        unset($this->stakeHolderName[$value]);
        unset($this->stakeHolderSSN[$value]);
        unset($this->stakeHolderOwnershipType[$value]);
        unset($this->stakeHolderOwnershipPercentage[$value]);
        unset($this->shareHolderAddress[$value]);
        //array_pop($this->shareHolderInput);
    }

    


    public function prevForm()
    {
        return redirect()->route('FBR8938');
    }


   
    
}
