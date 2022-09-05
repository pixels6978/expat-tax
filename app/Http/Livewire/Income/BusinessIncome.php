<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\BuisnessIncome;
use App\Models\CostOfGoodsSold;
use App\Models\DochRevachFiles;
use App\Models\IncomeExpenses;
use App\Models\Country;
use Livewire\WithFileUploads;
use App\Models\FilingYears;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BusinessIncome extends Component
{
    use GlobalService;
	public $currentStep = 1;
    use WithFileUploads;

    // business information variables
    public $inputs = [];
    public $i = 1;
    public $selfEmployedinIsrael;
    public $selfEmployedinOther;
    public $NumberofDochRevachforms;
    public $countryChosen;
    public $nameOfBusiness, $addressOfBusiness, $principleBusinessActivity,$businessOperator, $businessStartDate;
    public $form1099Worker, $confirmform1099Worker;
    public $hasSelfEmployedor1099Nec, $fileFor1099Nec;
    public $wasIncomeReportedonTaxReturn;
    public $BusinessName ;
    public $fileForDocRevach = [];
    public $UploadedfileForDocRevach = [];
    // end of business information variables



    // income and expenses variables
    public $hasExpenses;
    public $taxYear, $grossReceiptAmount, $advertising,$vehicleExpenses,$commissions,$costOfGoodSold,$depletion,
    $employeeBenefits,$employeeBenefitProgram,$Insurance,$selfEmployedHealthInsurance,$mortgageInterest,
    $otherInterestPayments,$legalProfessionalServices,$officeExpenses,$pensionProfitSharing,$rentLeaseVehicle,
    $rentLeaseMachine,$rentLeaseOther,$repairsMaintenance,$supplies,$taxes,$travel,$meals,$utilities,$wagesExpense,
    $otherExpenses;
    // end of income and expenses variables


    // variables for section 3 Cost of goods sold
    public $hasCostOfGoodSold, $closingInventoryValue,$changesToDetermineQuantity,$startOfYearInventory,
    $amountSpentOnPurchases,$costOfItemsForPersonalUse,$costOfLabor,$amountSpentOnMaterials,$otherCost,
    $endOfYearInventory;

    public $countries,$businessInfo,$businessId,$dbFilingYear,$filingMode,$currentFilingYear;

    // end of variables for cost of goods sold


    // section

    public function render()
    {
        
        return view('livewire.income.business-income');
    }

    public function mount(){
       

        $this->countries = Country::get();
        $this->businessInfo  = BuisnessIncome::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->orderBy('created_at','DESC')->get();

        $this->dbFilingYear = FilingYears::where('user_id', auth()->user()->id)->get();
        $currentFilingYear = FilingYears::where('user_id', auth()->user()->id)->first();
        $this->taxYear = $currentFilingYear->year;
    
        if($this->dbFilingYear->count() > 1)
        {
            //Multiple
            $this->filingMode = 'multiple';

        }else{
            //Single
            $this->filingMode = 'single';
        }
       

    }


    public function fetchBusinessData($id)
    {
         $this->businessId = $id;
         $data = BuisnessIncome::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $this->countryChosen = $data->country;
            $this->selfEmployedinIsrael = $data->is_self_employed_israel;
            $this->selfEmployedinOther = $data->is_self_employed;
            $this->BusinessName = $data->business_names;
            $this->nameOfBusiness = $data->is_name_business_name;
            $this->addressOfBusiness = $data->business_address;
            $this->principleBusinessActivity = $data->principle_activity;
            $this->businessOperator = $data->who_operates;
            $this->businessStartDate = $data->business_start_date;
            $this->form1099Worker = $data->employ_worker;
            $this->confirmform1099Worker = $data->is_file_forms1099;
            $this->hasSelfEmployedor1099Nec = $data->is_other_self_employed;
            $this->wasIncomeReportedonTaxReturn=$data->is_income_from_nec1099;
            $this->UploadedfileForDocRevach =  $data->nec1099_file;
        }


        // Income and expenses
        $income = IncomeExpenses::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($income){
            $this->taxYear = $income->tax_year;
            $this->grossReceiptAmount = $income->amount_of_gross;
            $this->hasExpenses = $income->has_expenses;
            $this->advertising = $income->advertising;
            $this->vehicleExpenses = $income->vehicle;
            $this->commissions = $income->commissions;
            $this->costOfGoodSold = $income->goods_sold;
            $this->depletion = $income->depletion;
            $this->employeeBenefits = $income->employee_benefits;
            $this->employeeBenefitProgram = $income->employee_benefits_program;
            $this->Insurance = $income->insurance;
            $this->selfEmployedHealthInsurance = $income->self_employed_health_insurance;
            $this->mortgageInterest = $income->mortgage_interest;
            $this->otherInterestPayments = $income->other_interest;
            $this->legalProfessionalServices = $income->legal_services;
            $this->officeExpenses = $income->office_expenses;
            $this->pensionProfitSharing = $income->pension;
            $this->rentLeaseVehicle = $income->vehicle_rental;
            $this->rentLeaseMachine = $income->machinery_rental;
            $this->rentLeaseOther = $income->other_items_rental;
            $this->repairsMaintenance = $income->repairs;
            $this->supplies = $income->supplies;
            $this->taxes = $income->taxes;
            $this->travel = $income->travel;
            $this->meals = $income->meal;
            $this->utilities = $income->utilities;
            $this->wagesExpense = $income->wages_expense;
            $this->otherExpenses = $income->other_expenses;
        }


        $cost = CostOfGoodsSold::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($cost){
            $this->hasCostOfGoodSold = $cost->do_you_have;
            $this->closingInventoryValue = $cost->inventory_value_method;
            $this->changesToDetermineQuantity = $cost->any_changes;
            $this->startOfYearInventory = $cost->beginning_inventory;
            $this->amountSpentOnPurchases = $cost->purchases_amount;
            $this->costOfItemsForPersonalUse = $cost->cost_of_withdrawn_items;
            $this->costOfLabor = $cost->labor_cost;
            $this->amountSpentOnMaterials = $cost->materials_cost;
            $this->otherCost = $cost->other_cost;
            $this->endOfYearInventory = $cost->end_inventory_amount;
        }
    }


   public function updatedbusinessStartDate(){
    $validatedData = $this->validate([
            'businessStartDate'=> 'before_or_equal:today',
        ],
        []);
   }
   

    public function submitBusinessInformation()
    {
       
        $data = BuisnessIncome::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
             $data->country = $this->countryChosen;
             $data->is_self_employed_israel = $this->selfEmployedinIsrael;
             $data->is_self_employed = $this->selfEmployedinOther;

             //$names = implode(',',$this->BusinessName);
             $data->business_names = $this->BusinessName;

             $data->is_name_business_name = $this->nameOfBusiness;
             $data->business_address = $this->addressOfBusiness;
             $data->principle_activity = $this->principleBusinessActivity;
             $data->who_operates = $this->businessOperator;
             $data->business_start_date = $this->businessStartDate;
             $data->employ_worker = $this->form1099Worker;
             $data->is_file_forms1099 = $this->confirmform1099Worker;
             $data->is_other_self_employed = $this->hasSelfEmployedor1099Nec;

            if(!empty($this->fileFor1099Nec)){
                $data->nec1099_file = $this->fileFor1099Nec->storeOnCloudinary('expattaxcpa')->getSecurePath();
            }
             $data->is_income_from_nec1099 = $this->wasIncomeReportedonTaxReturn;
             $data->save();

             if(!empty($this->fileForDocRevach)){
                 foreach($this->fileForDocRevach as $key => $single){
                     $file = new DochRevachFiles;
                     $file->user_id = UserID();
                     $file->filing_years_id = CurrentFilingYear();
                     $file->buisness_incomes_id = $data->id;
                     $file->path = $single->storeOnCloudinary('expattaxcpa')->getSecurePath();

                     $file->save();
                 }
             }

        }
        else{
             $data = new BuisnessIncome();  
             $data->user_id = UserID();
             $data->filing_years_id = CurrentFilingYear();
             $data->country = $this->countryChosen;
             $data->is_self_employed_israel = $this->selfEmployedinIsrael;
             $data->is_self_employed = $this->selfEmployedinOther;
             //$names = implode(',',$this->BusinessName);
             $data->business_names = $this->BusinessName;

             $data->is_name_business_name = $this->nameOfBusiness;
             $data->business_address = $this->addressOfBusiness;
             $data->principle_activity = $this->principleBusinessActivity;
             $data->who_operates = $this->businessOperator;
             $data->business_start_date = $this->businessStartDate;
             $data->employ_worker = $this->form1099Worker;
             $data->is_file_forms1099 = $this->confirmform1099Worker;
             $data->is_other_self_employed = $this->hasSelfEmployedor1099Nec;

            if(!empty($this->fileFor1099Nec)){
                $data->nec1099_file = $this->fileFor1099Nec->storeOnCloudinary('expattaxcpa')->getSecurePath();
            }
             $data->is_income_from_nec1099 = $this->wasIncomeReportedonTaxReturn;
             $data->save();

             if(!empty($this->fileForDocRevach)){
                 foreach($this->fileForDocRevach as $key => $single){
                     $file = new DochRevachFiles;
                     $file->user_id = UserID();
                     $file->filing_years_id = CurrentFilingYear();
                     $file->buisness_incomes_id = $data->id;
                     $file->path =  $single->storeOnCloudinary('expattaxcpa')->getSecurePath();
                     $file->save();
                 }
             }
        }

       
        $this->currentStep ++;

    }

    public function submitIncomeAndExpenses()
    {
        $data = IncomeExpenses::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();

        if($data){
            $data->tax_year = $this->taxYear;
            $data->amount_of_gross = $this->grossReceiptAmount;
            $data->has_expenses = $this->hasExpenses;
            $data->advertising =$this->advertising;
            $data->vehicle =$this->vehicleExpenses;
            $data->commissions =$this->commissions;
            $data->goods_sold =$this->costOfGoodSold;
            $data->depletion =$this->depletion;
            $data->employee_benefits =$this->employeeBenefits;
            $data->employee_benefits_program =$this->employeeBenefitProgram;
            $data->insurance =$this->Insurance;
            $data->self_employed_health_insurance =$this->selfEmployedHealthInsurance;
            $data->mortgage_interest =$this->mortgageInterest;
            $data->other_interest =$this->otherInterestPayments;
            $data->legal_services =$this->legalProfessionalServices;
            $data->office_expenses =$this->officeExpenses;
            $data->pension =$this->pensionProfitSharing;
            $data->vehicle_rental =$this->rentLeaseVehicle;
            $data->machinery_rental =$this->rentLeaseMachine;
            $data->other_items_rental =$this->rentLeaseOther;
            $data->repairs =$this->repairsMaintenance;
            $data->supplies =$this->supplies;
            $data->taxes =$this->taxes;
            $data->travel =$this->travel;
            $data->meal =$this->meals;
            $data->utilities =$this->utilities;
            $data->wages_expense =$this->wagesExpense;
            $data->other_expenses =$this->otherExpenses;
            $data->save();

            $this->currentStep =3;


        }
        else{
            $data = new IncomeExpenses();
            $data->user_id = UserID();
            $data->filing_years_id = CurrentFilingYear();
            $data->tax_year = $this->taxYear;
            $data->amount_of_gross = $this->grossReceiptAmount;
            $data->has_expenses = $this->hasExpenses;
            $data->advertising =$this->advertising;
            $data->vehicle =$this->vehicleExpenses;
            $data->commissions =$this->commissions;
            $data->goods_sold =$this->costOfGoodSold;
            $data->depletion =$this->depletion;
            $data->employee_benefits =$this->employeeBenefits;
            $data->employee_benefits_program =$this->employeeBenefitProgram;
            $data->insurance =$this->Insurance;
            $data->self_employed_health_insurance =$this->selfEmployedHealthInsurance;
            $data->mortgage_interest =$this->mortgageInterest;
            $data->other_interest =$this->otherInterestPayments;
            $data->legal_services =$this->legalProfessionalServices;
            $data->office_expenses =$this->officeExpenses;
            $data->pension =$this->pensionProfitSharing;
            $data->vehicle_rental =$this->rentLeaseVehicle;
            $data->machinery_rental =$this->rentLeaseMachine;
            $data->other_items_rental =$this->rentLeaseOther;
            $data->repairs =$this->repairsMaintenance;
            $data->supplies =$this->supplies;
            $data->taxes =$this->taxes;
            $data->travel =$this->travel;
            $data->meal =$this->meals;
            $data->utilities =$this->utilities;
            $data->wages_expense =$this->wagesExpense;
            $data->other_expenses =$this->otherExpenses;
            $data->save();
             $this->currentStep =3;
        }

       

    }


    public function addNewBusiness()
    {
        $this->addCostOfGoods();

        $this->currentStep =1;
        $this->reset(['BusinessName', 'addressOfBusiness','principleBusinessActivity','businessOperator','businessStartDate','form1099Worker','confirmform1099Worker','hasSelfEmployedor1099Nec','otherExpenses','wagesExpense','utilities','meals','travel',
                'taxes','supplies','repairsMaintenance','rentLeaseOther','rentLeaseMachine','rentLeaseVehicle',
                'pensionProfitSharing','officeExpenses','legalProfessionalServices','otherInterestPayments','mortgageInterest','selfEmployedHealthInsurance','Insurance','employeeBenefitProgram','employeeBenefits','depletion','commissions','vehicleExpenses','advertising','hasExpenses','grossReceiptAmount','taxYear','hasCostOfGoodSold','closingInventoryValue','changesToDetermineQuantity','startOfYearInventory','amountSpentOnPurchases','costOfItemsForPersonalUse','costOfLabor','amountSpentOnMaterials','otherCost','endOfYearInventory']);
        $this->businessId='';
        return redirect()->route('business-income');

    }

    public function resetForm()
    {
                $this->currentStep =1;
        $this->reset(['BusinessName', 'addressOfBusiness','principleBusinessActivity','businessOperator','businessStartDate','form1099Worker','confirmform1099Worker','hasSelfEmployedor1099Nec','otherExpenses','wagesExpense','utilities','meals','travel',
                'taxes','supplies','repairsMaintenance','rentLeaseOther','rentLeaseMachine','rentLeaseVehicle',
                'pensionProfitSharing','officeExpenses','legalProfessionalServices','otherInterestPayments','mortgageInterest','selfEmployedHealthInsurance','Insurance','employeeBenefitProgram','employeeBenefits','depletion','commissions','vehicleExpenses','advertising','hasExpenses','grossReceiptAmount','taxYear','hasCostOfGoodSold','closingInventoryValue','changesToDetermineQuantity','startOfYearInventory','amountSpentOnPurchases','costOfItemsForPersonalUse','costOfLabor','amountSpentOnMaterials','otherCost','endOfYearInventory']);
        $this->businessId='';
    }

    public function addCostOfGoods()
    {

        $data = CostOfGoodsSold::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $data->do_you_have = $this->hasCostOfGoodSold;
            $data->inventory_value_method = $this->closingInventoryValue;
            $data->any_changes = $this->changesToDetermineQuantity;
            $data->beginning_inventory = $this->startOfYearInventory;
            $data->purchases_amount = $this->amountSpentOnPurchases;
            $data->cost_of_withdrawn_items = $this->costOfItemsForPersonalUse;
            $data->labor_cost = $this->costOfLabor;
            $data->materials_cost = $this->amountSpentOnMaterials;
            $data->other_cost = $this->otherCost;
            $data->end_inventory_amount = $this->endOfYearInventory;
            $data->save();
        }
        else{
             $data = new CostOfGoodsSold();
             $data->user_id = UserID();
             $data->filing_years_id = CurrentFilingYear();
             $data->do_you_have = $this->hasCostOfGoodSold;
             $data->inventory_value_method = $this->closingInventoryValue;
             $data->any_changes = $this->changesToDetermineQuantity;
             $data->beginning_inventory = $this->startOfYearInventory;
             $data->purchases_amount = $this->amountSpentOnPurchases;
             $data->cost_of_withdrawn_items = $this->costOfItemsForPersonalUse;
             $data->labor_cost = $this->costOfLabor;
             $data->materials_cost = $this->amountSpentOnMaterials;
             $data->other_cost = $this->otherCost;
             $data->end_inventory_amount = $this->endOfYearInventory;
             $data->save();

             
        }
    }

    public function submitCostOfGoodSold($redirect=null)
    {
        $this->addCostOfGoods();
        return redirect()->route('passive-income');  
    }

    public function deleteFile($type,$file=null)
    {
         switch($type){

             case 'nec1099':
                $data = BuisnessIncome::where('id',$this->businessId)->where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
                
                $this->UploadedfileForDocRevach = '';
                $data->nec1099_file = '';
                $data->save();
                break;
                
        }

         $this->emit('fileDeleted');
       
    }

    // public function submitBusinessInfo()
    // {

    // }

    public function postBusinessData()
    {

    }

    public function moveToTab($id)
    {
        $this->currentStep = $id;
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

        public function prevForm()
        {
            $this->currentStep--;
        }

}
