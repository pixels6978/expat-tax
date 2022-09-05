<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use App\Core\GlobalService;
use Livewire\WithFileUploads;
use App\Models\FilingYears;
use App\Models\PassiveIncome as PassiveIncomeModel;
use App\Models\PassiveIncomeFiles;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PassiveIncome extends Component
{
    use GlobalService; use WithFileUploads;
	public $currentStep = 1;

    public $inputs = [];
    public $i = 1;


    public $Have1099Forms, $NumberofFormsToUploadFor1099;
    public $DocumentFor1099=[];
    public $HaveInterest, $NumberofFormsToUploadForInterest;
    public $DocumentForInterest=[];
    public $HaveDividends, $NumberofFormsToUploadForDividends;
    public $DocumentForDividends=[];
    public $HaveCapitalGains, $NumberofFormsToUploadForCapitalGains;
    public $DocumentForCapitalGains=[];
    public $HaveRoyalties, $NumberofFormsToUploadForRoyalties;
    public $DocumentForRoyalties=[];
    public $HavePensionPayments, $NumberofFormsToUploadForPensionPayments;
    public $DocumentForPensionPayments=[];
    public $HaveSocialSecurity, $NumberofFormsToUploadForSocialSecurity;
    public $DocumentForSocialSecurity=[];
    public $HaveK1s, $NumberofFormsToUploadForK1s;
    public $DocumentForK1s=[];
    public $Have1042S, $NumberofFormsToUploadFor1042S;
    public $DocumentFor1042S=[];
    public $HaveCryptoCurrency;
    public $HaveOthers, $NumberofFormsToUploadForOthers;
    public $DocumentForOthers=[];
    public $CryptoCost, $DateCryptoAcquired, $DateCryptoSold,$Proceeds,$TransactionDate,$TransactionValue,$ValueIsAlsoIncome;
    public $ExpenseData =[];
    public $Expenses;
    public $flexCheckDefault;
    public $listExpenses ='';
    public $incomeId;
    public $incomeFiles;
    public $incomeData;

    protected $listeners = ['reload'=>'render','fileLoaded'];

    // public function mount(){

    // }

    public function fetchData()
    {
       $this->incomeData = PassiveIncomeModel::where('user_id', UserID())->where('filing_years_id',CurrentFilingYear())->first();
       if(!empty($this->incomeData)){
        $this->incomeFiles =  PassiveIncomeFiles::where('passive_income_id',$this->incomeData->id)->where('user_id', 
        UserID())->orderBy('type','ASC')->get();
       }
       
      
    }

    public function render()
    {
        $this->fetchData();
        return view('livewire.income.passive-income');
    }


    public function addExpense()
    {
       
        // $i = $i + 1;
        // $this->i = $i;
      array_push($this->ExpenseData ,$this->Expenses);
         for ($x=0; $x < count($this->ExpenseData); $x++) {
            $this->listExpenses = $this->ExpenseData[$x].',';
          }
        
      $this->Expenses ='';
    }

    public function removeInput($i)
    {
        // $this->i--;
        // array_pop($this->inputs);
    }

    public function prevForm()
    {
        $this->currentStep--;
    }

    public function deleteArrivalDetails($item,$switch=null)
     {
                
                unset($this->ExpenseData[$item]);
                // array_splice($arrayItems,$id);
                // array_splice($this->arrivalDetails,$id);
                // unset($arrayItems[$id]);
                // unset($this->arrivalDetails[$id]);
                $this->emit('reload');
                $this->emit('recordDeleted');
              
            
         
     }




    public function submitPassiveIncome(){

        $validatedData = $this->validate([
             'flexCheckDefault'           => 'required',
             'DocumentFor1099'            => 'required_if:Have1099Forms,==,yes',
             'DocumentForInterest'        => 'required_if:HaveInterest,==,yes',
             'DocumentForDividends'       => 'required_if:HaveDividends,==,yes',
             'DocumentForCapitalGains'    => 'required_if:HaveCapitalGains,==,yes',
             'DocumentForRoyalties'       => 'required_if:HaveRoyalties,==,yes',
             'DocumentForPensionPayments' => 'required_if:HavePensionPayments,==,yes',
             'DocumentForSocialSecurity'  => 'required_if:HaveSocialSecurity,==,yes',
             'DocumentForK1s'             => 'required_if:HaveK1s,==,yes',
             'DocumentFor1042S'           => 'required_if:Have1042S,==,yes',
             'DocumentForOthers'          => 'required_if:HaveOthers,==,yes',
             'DateCryptoSold'             => 'required_if:HaveCryptoCurrency,==,yes, after:DateCryptoAcquired'

             
           ],

           [

           ]

       );

        $info = PassiveIncomeModel::where('user_id', UserID())->where('filing_years_id',CurrentFilingYear())->first();
       
        if($info)
        {
          $info->remove_password_status      = $this->flexCheckDefault;
          $info->crypto                      = $this->HaveCryptoCurrency ;            
          $info->crypto_exchange_cost        = $this->CryptoCost;
          $info->crypto_acquire_date         = $this->DateCryptoAcquired;
          $info->crypto_sold_date            = $this->DateCryptoSold;
          $info->crypto_proceeds             = $this->Proceeds;
          $info->crypto_transaction_date     = $this->TransactionDate;
          $info->crypto_value                = $this->TransactionValue;
          $info->crypto_income_value         = $this->ValueIsAlsoIncome;

          $info->crypto_expenses            = json_encode($this->ExpenseData);
          $info->save();   

          $this->incomeId = $info->id;  

          $this->upload1099Forms();  
          $this->uploadInterestForms();   
          $this->uploadDividensForms();
          $this->uploadCapitalGainsForms();
          $this->uploadRoyaltiesForms();
          $this->uploadPensionPaymentsForms();
          $this->uploadSocialSecurityForms();
          $this->uploadForK1sForms();
          $this->uploadFor1042SForms();
          $this->uploadOtherFormsForms();
          return redirect()->to('/rental-income');

        }else{
          $income = new PassiveIncomeModel;
          $income->user_id                = UserID();
          $income->filing_years_id        = CurrentFilingYear();
          $income->remove_password_status = $this->flexCheckDefault;
          $income->crypto_exchange_cost        = $this->CryptoCost;
          $income->crypto_acquire_date         = $this->DateCryptoAcquired;
          $income->crypto_sold_date            = $this->DateCryptoSold;
          $income->crypto_proceeds             = $this->Proceeds;
          $income->crypto_transaction_date     = $this->TransactionDate;
          $income->crypto_value                = $this->TransactionValue;
          $income->crypto_income_value         = $this->ValueIsAlsoIncome;

          $income->crypto_expenses            = json_encode($this->ExpenseData);
          $income->save();

          $this->incomeId = $income->id;  

          $this->upload1099Forms();
          $this->uploadInterestForms();
          $this->uploadDividensForms();
          $this->uploadCapitalGainsForms();
          $this->uploadRoyaltiesForms();
          $this->uploadPensionPaymentsForms();
          $this->uploadSocialSecurityForms();
          $this->uploadForK1sForms();
          $this->uploadFor1042SForms();
          $this->uploadOtherFormsForms();

          return redirect()->to('/rental-income');
          
        }
       
       // $this->currentStep ++;
       // $this->progressUpdate();
       // $this->emit('IncreamentProgress');

   }

   public function updatedDateCryptoSold(){
       $validatedData = $this->validate([      
             'DateCryptoSold'             => 'after:DateCryptoAcquired'
           ],
           [

           ]

       );
   }

   public function uploadFor1042SForms(){
       if(!empty($this->DocumentFor1042S)){
            $this->uploadMultipleForms($this->DocumentFor1042S,'For1042SForms');
      }
   }

   public function uploadOtherFormsForms(){
       if(!empty($this->DocumentForOthers)){
            $this->uploadMultipleForms($this->DocumentForOthers,'OtherForms');
      }
   }

   

   
   public function uploadForK1sForms(){
       if(!empty($this->DocumentForK1s)){
            $this->uploadMultipleForms($this->DocumentForK1s,'K1sForms');
      }
   }

   public function upload1099Forms(){
       if(!empty($this->DocumentFor1099)){
            $this->uploadMultipleForms($this->DocumentFor1099,'1099Forms');
      }
   }


   public function uploadInterestForms(){
       if(!empty($this->DocumentForInterest)){
            $this->uploadMultipleForms($this->DocumentForInterest,'InterestForms');
      }
   }

   public function uploadDividensForms(){
       if(!empty($this->DocumentForDividends)){
            $this->uploadMultipleForms($this->DocumentForDividends,'DividendsForms');
      }
   }

   public function uploadCapitalGainsForms(){
       if(!empty($this->DocumentForCapitalGains)){
            $this->uploadMultipleForms($this->DocumentForCapitalGains,'CapitalGainsForms');
      }
   }


   public function uploadRoyaltiesForms(){
       if(!empty($this->DocumentForRoyalties)){
            $this->uploadMultipleForms($this->DocumentForRoyalties,'RoyaltiesForms');
      }
   }


   public function uploadPensionPaymentsForms(){
       if(!empty($this->DocumentForPensionPayments)){
            $this->uploadMultipleForms($this->DocumentForPensionPayments,'PensionPaymentsForms');
      }
   }


   public function uploadSocialSecurityForms(){
       if(!empty($this->DocumentForSocialSecurity)){
            $this->uploadMultipleForms($this->DocumentForSocialSecurity,'SocialSecurityForms');
      }
   }


   public function uploadMultipleForms($data,$type){
        foreach($data as $file){
            $passive_income_file                    = new PassiveIncomeFiles;

            $passive_income_file->user_id           = UserID();
            $passive_income_file->passive_income_id = $this->incomeId;
            $passive_income_file->filename          = rand(); 
            $passive_income_file->path              = $file->storeOnCloudinary('expattaxcpa')->getSecurePath();
            $passive_income_file->type              = $type;
            $passive_income_file->save();
        }
    }

   public function deleteFile($id){
     PassiveIncomeFiles::where('id',$id)->where('user_id',UserID())->delete();
     $this->emit('reload');
     $this->emit('recordDeleted');

   }



}
