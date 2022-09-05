<?php

namespace App\Http\Livewire\ForeignAccounts;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\Fbr8938 as FBARModel;
use App\Models\Fbr8938Account;
use App\Models\Filing;
use App\Models\FilingYears;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;



class Fbr8938 extends Component
{

    use GlobalService; use WithFileUploads;
	public $currentStep = 1;
    public $accountData;
    public $selectedAccountName;


    public $isRequiredToFileFBAR;
    public $fBarAccount =[1];
    public $i = 1;

    // bank information variables
    public $nameOfBank;
    public $addressOfBank;
    public $city;
    public $postalCode;
    public $country;

    // account information variables
    public $accountNumber;
    public $accountType;
    public $isNewAccountOpenedInTaxYear; //checkbox
    public $wasClosedDuringTaxYear =false; //checkbox


    // account balance variables
    public $currencyOfAccount;
    public $highestAccountBalanceDuringYear;
    public $balanceOn31stDecember;


    // Stage 2 Account holder variables
    public $primaryAccountHolder;
    public $ownershipType;
    public $numberOfAccountHolders;


    // additional account holder details variables
    public $nameOfAdditionalAccountHolder;
    public $additionalAccountHolderCountry;


    // Step 3 FATCA Requirements variables
    public $hasAssetValueAboveFilingThreshold;

    public $primaryAccountWithOptions=true;
    public $nb;
    public $showPreviousOptions = false;

    public $currentAccounts;
    public $accountId;

    //fetch accounts

     public function render()
    {
        $this->fetchFbarAccounts();
        return view('livewire.foreign-accounts.fbr8938');
    }

    public function fetchFbarAccounts(){
        $fbar = FBARModel::where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();
        
        if(!empty($fbar)){
            $this->currentAccounts = Fbr8938Account::where('user_id',UserID())->where('fbr8938s_id',$fbar->id)->get();
        }else{
             $this->currentAccounts = [];
        }
        
    }

     // function to create array to loop through to show more account fields
     public function addfBarAccountInfo()
     {
          $validatedData = $this->validate(
            [
               'isRequiredToFileFBAR'=>'required'
            ]);

            if($this->accountId != null || $this->accountId != ''){
                //Update the selected id
                $info = Fbr8938Account::where('id',$this->accountId)->where('user_id',UserID())->first();
                $info->bank_name                    = $this->nameOfBank; 
                $info->bank_address                 = $this->addressOfBank;
                $info->bank_city                    = $this->city;
                $info->bank_zip                     = $this->postalCode;
                $info->bank_country                 = $this->country;
                $info->account_no                   = $this->accountNumber;
                $info->account_type                 = $this->accountType;
                $info->is_it_new_account            = $this->isNewAccountOpenedInTaxYear;
                $info->is_account_closed            = $this->wasClosedDuringTaxYear;
                $info->account_currency             = $this->currencyOfAccount;
                $info->highest_balance              = $this->highestAccountBalanceDuringYear;
                $info->balance_on_31dec             = $this->balanceOn31stDecember;
              
                $info->save();
                $this->emit('success');

            }else{
                 $fbar = new FBARModel;
                 $fbar->user_id           = UserID();
                 $fbar->filing_years_id   = CurrentFilingYear(); 
                 $fbar->are_you_required_to_file_fbar  = $this->isRequiredToFileFBAR;
                 $fbar->save();

                 $info = new Fbr8938Account;
                 $info->bank_name                    = $this->nameOfBank; 
                 $info->fbr8938s_id                  = $fbar->id;
                 $info->user_id                      = UserID();

                 $info->bank_address                 = $this->addressOfBank;
                 $info->bank_city                    = $this->city;
                 $info->bank_zip                     = $this->postalCode;
                 $info->bank_country                 = $this->country;
                 $info->account_no                   = $this->accountNumber;
                 $info->account_type                 = $this->accountType;
                 $info->is_it_new_account            = $this->isNewAccountOpenedInTaxYear;
                 $info->is_account_closed            = $this->wasClosedDuringTaxYear;
                 $info->account_currency             = $this->currencyOfAccount;
                 $info->highest_balance              = $this->highestAccountBalanceDuringYear;
                 $info->balance_on_31dec             = $this->balanceOn31stDecember;
                 $info->save();

                 $this->accountId = $fbar->id;
                 $this->emit('success');
            }
         // $i++;
         // $this->i = $i;
         // array_push($this->fBarAccount, $this->i);
     }

     public function addNew(){
       // $this->addfBarAccountInfo();
        $this->ownedFinancialAssets();
        //Reset form
        $this->reset(['nameOfBank','addressOfBank','city','postalCode','country','accountNumber','accountType','wasClosedDuringTaxYear','isNewAccountOpenedInTaxYear','currencyOfAccount','highestAccountBalanceDuringYear','balanceOn31stDecember','additionalAccountHolderCountry','nameOfAdditionalAccountHolder','numberOfAccountHolders','ownershipType','primaryAccountHolder']);

        $this->accountId = '';
        $this->currentStep  = 1;
     }

     public function editAccount(){
        if($this->accountId == null || $this->accountId == ''){
            $this->emit('selectaAccount');
        }else{
             $this->addfBarAccountInfo();
        }
       
     }

    // move from account info section to account holder section
    public function submitAccountInformation()
    {
        $this->addfBarAccountInfo();
        $this->currentStep++;
    }

     // move from account holder details section to 8938 fatca requirements
    public function submitAccountHolderDetails()
    {
        if($this->accountId != null || $this->accountId != ''){
                //Update the selected id
               
                $info = Fbr8938Account::where('id',$this->accountId)->where('user_id',UserID())->first();

                $info->primary_account_holder       = $this->primaryAccountHolder;
                $info->ownership_type               = $this->ownershipType;
                $info->no_of_acc_holders            = $this->numberOfAccountHolders;
                $info->additional_acc_holder_name   = $this->nameOfAdditionalAccountHolder;
                $info->additional_country           = $this->additionalAccountHolderCountry;
                $info->save(); 
                $this->currentStep++;
            }
            // else{
            //     $info = new Fbr8938Account;
            //     $info->primary_account_holder       = $this->primaryAccountHolder;
            //     $info->ownership_type               = $this->ownershipType;
            //     $info->no_of_acc_holders            = $this->numberOfAccountHolders;
            //     $info->additional_acc_holder_name   = $this->nameOfAdditionalAccountHolder;
            //     $info->additional_country           = $this->additionalAccountHolderCountry;
            //     $info->save();
            // }
        
    }

     public function updatednoOfProperties($value){
        $this->accountId = $value;
     }
 

    public function gotoSalesOfProperty()
    {
        return redirect()->route('rental-income');
    }

    // move a step back
    public function prevForm()
    {
        if ($this->currentStep == 1) {
            return;
        }
        else
        {
            $this->currentStep--;
        }
    }


    public function goto5471ForeignCorp()
    {
            $this->ownedFinancialAssets();
       
            // else{
            //     $info = new Fbr8938Account;
            //     $info->owned_financial_assests  = $this->hasAssetValueAboveFilingThreshold;
                
            //     $info->save();
            // }
        return redirect()->route('five471');
    }

    public function ownedFinancialAssets(){
         if($this->accountId != null || $this->accountId != ''){
                //Update the selected id
                $info = Fbr8938Account::where('id',$this->accountId)->where('user_id',UserID())->first();
                $info->owned_financial_assests   = $this->hasAssetValueAboveFilingThreshold;
                 $info->save(); 
            }
    }

    public function submitFBR8938(){

        $this->currentStep ++;
        $this->progressUpdate();
        return redirect()->route('five471');
    }

    public function moveToTab($id)
    {
        $this->currentStep = $id;
    }

    public function updatedaccountType($value){
        if($value == 'Other'){
            $this->primaryAccountWithOptions = false;
            $this->primaryAccountHolder='';
            $this->nb= 'Enter an option';
        }else{
             $this->showPreviousOptions = false;
        }
    }

    public function updatedshowPreviousOptions($value){
        if($value == true){
             $this->showPreviousOptions = true;
             $this->primaryAccountWithOptions = true;

        }
    }


    public function updatedaccountData($value){
       
        if($value != null){
            $data = explode('|', $value);
            $this->selectedAccountName = $data[1];
            $this->accountId           = $data[0];

              $info = Fbr8938Account::where('id',$this->accountId)->where('user_id',UserID())->first();
               
                $this->nameOfBank                = $info->bank_name; 
                $this->addressOfBank             =$info->bank_address ;
                $this->city                      =  $info->bank_city ;
                $this->postalCode                = $info->bank_zip;
                $this->country                   =$info->bank_country;
                $this->accountNumber             =$info->account_no ;
                $this->accountType               =$info->account_type;
                $this->isNewAccountOpenedInTaxYear = $info->is_it_new_account;
                $this->wasClosedDuringTaxYear       =$info->is_account_closed;
                $this->currencyOfAccount            =$info->account_currency;
                $this->highestAccountBalanceDuringYear =$info->highest_balance;
                $this->balanceOn31stDecember =$info->balance_on_31dec ;

                $this->primaryAccountHolder=$info->primary_account_holder;
                $this->ownershipType =$info->ownership_type;
                $this->numberOfAccountHolders =$info->no_of_acc_holders;
                $this->nameOfAdditionalAccountHolder =$info->additional_acc_holder_name;
                $this->additionalAccountHolderCountry = $info->additional_country;
                $this->hasAssetValueAboveFilingThreshold  = $info->owned_financial_assests;
        }else{
            $this->selectedAccountName = '';
            $this->accountId           = '';
        }
    }


    public function updatedisRequiredToFileFBAR($value){
        session()->put('isFBARRequired',$value);
    }

     // function to remove property field
     public function removefBarAccount($i)
     {
         // if ($i==0) {
         //     return;
         //  }
         //  else{
         //    array_pop($this->fBarAccount);
         //  }
     }


}
