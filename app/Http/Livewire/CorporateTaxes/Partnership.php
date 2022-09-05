<?php

namespace App\Http\Livewire\CorporateTaxes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Core\GlobalService;
use App\Models\Partnership1065;

class Partnership extends Component
{

    use GlobalService;
    use WithFileUploads;


    public $currentStep = 1;

    public $isFirstTimeFiling1065;
    public $fileFor1065Partnerships; //file for if above is yes

    public $UploadedfileFor1065Partnerships,
    $nameOfPartnership, $addressOfPartnership,$EIN,$ServiceProvided,$PricipalBusinessActivity,$PartnershipDate,
    $PartnerName,$PartnerAddress,$PercentageOwnership,$USTaxNo,$DidYouEmployAnyWorkers,
    $isPaymentToIndependentContractors,$isFile1099MISCForms,$isForeignNonUsTransaction,$BusinessAccountBalance,
    $isAssetWorth,$DocumentForBalanceSheet, $UploadeDocumentForBalanceSheet, $HaveProfitLossStatement,$DocumentForProfitLossStatment, $UploadedDocumentForProfitLossStatment;

    public $advertising,$vehicleExpenses,$commissions, $ContractLabor,$costOfGoodSold,$depletion,
    $employeeBenefits,$employeeBenefitProgram,$Insurance,$selfEmployedHealthInsurance,$mortgageInterest,
    $otherInterestPayments,$legalProfessionalServices,$officeExpenses,$pensionProfitSharing,$rentLeaseVehicle,
    $rentLeaseMachine,$rentLeaseOther,$repairsMaintenance,$supplies,$taxes,$travel,$meals,$utilities,$wagesExpense,
    $otherExpenses;

    // form variables for partnership general info first section
    public $hasProfitLossStmt;

    public $fileForBalanceSheet; //file if balance sheet exists
    public $fileForProfitLossStmt; // file for if there is profit and loss statement.


        // form variables for income and expenses
        public $incomeExpenseCurrency;
        public $grossIncome;
        public $hasExpenses;



        // end of variables for income and expenses section


        // form variables for cost of goods sold
        public $hasCostOfGoodsSold;
        public $hasChangesInQuantities;
        public $methodForClosingInventory;
        public $startOfYearInventory;
        public $amountSpentOnPurchases;
        public $itemsRedrawnForPersonalUse;
        public $costOfLabor;
        public $amountSpentOnMaterials;
        public $otherCosts;
        public $endOfYearInventory;
        // end of variables for cost of goods sold



        public function mount(){
            $data = Partnership1065::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
            if($data){
                $this->isFirstTimeFiling1065 = $data->is_first_time;
                $this->UploadedfileFor1065Partnerships = $data->last_filed_form;
                $this->nameOfPartnership = $data->partnership_name;
                $this->addressOfPartnership = $data->partnership_address;
                $this->EIN = $data->ein;
                $this->ServiceProvided = $data->product_provided;
                $this->PricipalBusinessActivity = $data->principal_business;
                $this->PartnershipDate = $data->partnership_date;
                $this->PartnerName = $data->partner_name;
                $this->PartnerAddress = $data->partner_address;
                $this->PercentageOwnership = $data->partner_percentage;
                $this->USTaxNo = $data->ustax_no;
                $this->DidYouEmployAnyWorkers = $data->is_employ_worker;
                $this->isPaymentToIndependentContractors = $data->independent_contractors_payments;
                $this->isFile1099MISCForms = $data->file_1099MISC;
                $this->isAssetWorth = $data->are_assets_worth_one_million;
                $this->UploadedDocumentForBalanceSheet = $data->balance_sheet;
                $this->HaveProfitLossStatement = $data->profit_loss_statement;
                $this->UploadedDocumentForProfitLossStatment = $data->profit_loss_statement_file;
                $this->incomeExpenseCurrency = $data->income_currency;
                $this->grossIncome = $data->gross_income;
                $this->hasExpenses = $data->has_expenses;
                $this->advertising = $data->advertising;
                $this->vehicleExpenses = $data->vehicle;
                $this->commissions = $data->commissions;
                $this->ContractLabor = $data->contract_labor;
                $this->costOfGoodSold = $data->goods_sold;
                $this->depletion = $data->depletion;
                $this->employeeBenefits = $data->employee_benefits;
                $this->employeeBenefitProgram = $data->employee_benefits_program;
                $this->Insurance = $data->insurance;
                $this->selfEmployedHealthInsurance = $data->self_employed_health_insurance;
                $this->mortgageInterest = $data->mortgage_interest;
                $this->otherInterestPayments = $data->other_interest;
                $this->legalProfessionalServices = $data->legal_services;
                $this->officeExpenses = $data->office_expenses;
                $this->pensionProfitSharing = $data->pension;
                $this->rentLeaseVehicle = $data->vehicle_rental;
                $this->rentLeaseMachine = $data->machinery_rental;
                $this->rentLeaseOther = $data->other_items_rental;
                $this->repairsMaintenance = $data->repairs;
                $this->supplies = $data->supplies;
                $this->taxes = $data->taxes;
                $this->travel = $data->travel;
                $this->meals = $data->meal;
                $this->utilities = $data->utilities;
                $this->wagesExpense = $data->wages_expense;
                $this->otherExpenses = $data->other_expenses;
                $this->hasCostOfGoodsSold = $data->cost_of_goods_sold;
                $this->methodForClosingInventory = $data->closing_inventory_method;
                $this->hasChangesInQuantities = $data->open_close_inventory_challenge;
                $this->startOfYearInventory = $data->beginning_inventory_amount;
                $this->amountSpentOnPurchases = $data->amount_spent_on_purchases;
                $this->itemsRedrawnForPersonalUse = $data->cost_of_items_for_personal_use;
                $this->costOfLabor = $data->labor_cost;
                $this->amountSpentOnMaterials = $data->material_cost;
                $this->otherCosts = $data->other_costs;
                $this->endOfYearInventory = $data->year_end_inventory_amount;
            }
        }


    // function to validate and move to next section (Foreign partnership)
    public function submitPartnerships()
    {
        $data = Partnership1065::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $data->is_first_time = $this->isFirstTimeFiling1065;

            if(!empty($this->fileFor1065Partnerships)){
                $data->last_filed_form = $this->fileFor1065Partnerships->store('files');
            }

            $data->partnership_name = $this->nameOfPartnership;
            $data->partnership_address = $this->addressOfPartnership;
            $data->ein = $this->EIN;
            $data->product_provided = $this->ServiceProvided;
            $data->principal_business = $this->PricipalBusinessActivity;
            $data->partnership_date = $this->PartnershipDate;
            $data->partner_name = $this->PartnerName;
            $data->partner_address = $this->PartnerAddress;
            $data->partner_percentage = $this->PercentageOwnership;
            $data->ustax_no = $this->USTaxNo;
            $data->is_employ_worker = $this->DidYouEmployAnyWorkers;
            $data->independent_contractors_payments = $this->isPaymentToIndependentContractors;
            $data->file_1099MISC = $this->isFile1099MISCForms;
            $data->are_assets_worth_one_million = $this->isAssetWorth;

            if(!empty($this->DocumentForBalanceSheet)){
                $data->balance_sheet = $this->DocumentForBalanceSheet->store('files');
            }

            $data->profit_loss_statement = $this->HaveProfitLossStatement;
            if(!empty($this->DocumentForProfitLossStatment)){
                $data->profit_loss_statement_file = $this->DocumentForProfitLossStatment->store('files');
            }

            $data->income_currency = $this->incomeExpenseCurrency;
            $data->gross_income = $this->grossIncome;
            $data->has_expenses = $this->hasExpenses;
            $data->advertising =$this->advertising;
            $data->vehicle =$this->vehicleExpenses;
            $data->commissions =$this->commissions;
            $data->contract_labor =$this->ContractLabor;
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

            $data->cost_of_goods_sold = $this->hasCostOfGoodsSold;
            $data->closing_inventory_method = $this->methodForClosingInventory;
            $data->open_close_inventory_challenge = $this->hasChangesInQuantities;
            $data->beginning_inventory_amount = $this->startOfYearInventory;
            $data->amount_spent_on_purchases = $this->amountSpentOnPurchases;
            $data->cost_of_items_for_personal_use = $this->itemsRedrawnForPersonalUse;
            $data->labor_cost = $this->costOfLabor;
            $data->material_cost = $this->amountSpentOnMaterials;
            $data->other_costs = $this->otherCosts;
            $data->year_end_inventory_amount = $this->endOfYearInventory;
            $data->save();
        }
        else{
             $data = new Partnership1065();
             $data->user_id = UserID();
             $data->filing_years_id = CurrentFilingYear();
             $data->is_first_time = $this->isFirstTimeFiling1065;

             if(!empty($this->fileFor1065Partnerships)){
                 $data->last_filed_form = $this->fileFor1065Partnerships->store('files');
             }

             $data->partnership_name = $this->nameOfPartnership;
             $data->partnership_address = $this->addressOfPartnership;
             $data->ein = $this->EIN;
             $data->product_provided = $this->ServiceProvided;
             $data->principal_business = $this->PricipalBusinessActivity;
             $data->partnership_date = $this->PartnershipDate;
             $data->partner_name = $this->PartnerName;
             $data->partner_address = $this->PartnerAddress;
             $data->partner_percentage = $this->PercentageOwnership;
             $data->ustax_no = $this->USTaxNo;
             $data->is_employ_worker = $this->DidYouEmployAnyWorkers;
             $data->independent_contractors_payments = $this->isPaymentToIndependentContractors;
             $data->file_1099MISC = $this->isFile1099MISCForms;
             $data->are_assets_worth_one_million = $this->isAssetWorth;

             if(!empty($this->DocumentForBalanceSheet)){
                 $data->balance_sheet = $this->DocumentForBalanceSheet->store('files');
             }

             $data->profit_loss_statement = $this->HaveProfitLossStatement;
             if(!empty($this->DocumentForProfitLossStatment)){
                 $data->profit_loss_statement_file = $this->DocumentForProfitLossStatment->store('files');
             }

             $data->income_currency = $this->incomeExpenseCurrency;
             $data->gross_income = $this->grossIncome;
             $data->has_expenses = $this->hasExpenses;
             $data->advertising =$this->advertising;
             $data->vehicle =$this->vehicleExpenses;
             $data->commissions =$this->commissions;
             $data->contract_labor =$this->ContractLabor;
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

             $data->cost_of_goods_sold = $this->hasCostOfGoodsSold;
             $data->closing_inventory_method = $this->methodForClosingInventory;
             $data->open_close_inventory_challenge = $this->hasChangesInQuantities;
             $data->beginning_inventory_amount = $this->startOfYearInventory;
             $data->amount_spent_on_purchases = $this->amountSpentOnPurchases;
             $data->cost_of_items_for_personal_use = $this->itemsRedrawnForPersonalUse;
             $data->labor_cost = $this->costOfLabor;
             $data->material_cost = $this->amountSpentOnMaterials;
             $data->other_costs = $this->otherCosts;
             $data->year_end_inventory_amount = $this->endOfYearInventory;
             $data->save();
        }

       $this->currentStep ++;
       $this->progressUpdate();
       $this->emit('IncreamentProgress');

        // go to next section and increase progress bar
        return redirect()->route('foreign-corporation-112DF');
    }

    public function prevForm()
    {
        return redirect()->route('s-corporations');
    }


    public function render()
    {
        return view('livewire.corporate-taxes.partnership');
    }
}

