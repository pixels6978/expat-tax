<?php

namespace App\Http\Livewire\CorporateTaxes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Core\GlobalService;
use App\Models\FCorporation1120f;

class ForeignCorporation extends Component
{
    use GlobalService;
    use WithFileUploads;

	public $currentStep = 1;


    public $isFirstTimeFiling1120F, $LastFiled1120F, $UploadedLastFiled1120F,
    $nameOfCorporation, $addressOfCorporation,$EIN,$ServiceProvided,$PricipalBusinessActivity,$CorporationDate,
    $ShareHolderName,$ShareHolderAddress,$PercentageOwnership,$USTaxNo,$DidYouEmployAnyWorkers,
    $isPaymentToIndependentContractors,$isFile1099MISCForms,$isForeignNonUsTransaction,$BusinessAccountBalance,
    $isAssetWorth,$DocumentForBalanceSheet, $UploadeDocumentForBalanceSheet, $HaveProfitLossStatement,$DocumentForProfitLossStatment, $UploadedDocumentForProfitLossStatment;


    public $incomeExpenseCurrency;
    public $grossIncome;
    public $hasExpenses;

    public $advertising,$vehicleExpenses,$commissions, $ContractLabor,$costOfGoodSold,$depletion,
    $employeeBenefits,$employeeBenefitProgram,$Insurance,$selfEmployedHealthInsurance,$mortgageInterest,
    $otherInterestPayments,$legalProfessionalServices,$officeExpenses,$pensionProfitSharing,$rentLeaseVehicle,
    $rentLeaseMachine,$rentLeaseOther,$repairsMaintenance,$supplies,$taxes,$travel,$meals,$utilities,$wagesExpense,
    $otherExpenses;



    public $hasProfitLossStmt;

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



    public function mount(){
        $data = FCorporation1120f::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $this->isFirstTimeFiling1120F = $data->is_first_time;
            $this->UploadedLastFiled1120F = $data->last_filed_form;
            $this->nameOfCorporation = $data->corporation_name;
            $this->addressOfCorporation = $data->corporation_address;
            $this->EIN = $data->ein;
            $this->ServiceProvided = $data->product_provided;
            $this->PricipalBusinessActivity = $data->principal_business;
            $this->CorporationDate = $data->corporation_date;
            $this->ShareHolderName = $data->shareholder_name;
            $this->ShareHolderAddress = $data->shareholder_address;
            $this->PercentageOwnership = $data->shareholder_percentage;
            $this->USTaxNo = $data->ustax_no;
            $this->DidYouEmployAnyWorkers = $data->is_employ_worker;
            $this->isPaymentToIndependentContractors = $data->independent_contractors_payments;
            $this->isFile1099MISCForms = $data->file_1099MISC;
            $this->isForeignNonUsTransaction = $data->foreign_sharholders_transactions;
            $this->BusinessAccountBalance = $data->end_of_year_balance;
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


    // function to submit s-corporation and route to partnership page
    public function submitFcorporation()
    {
        $data = FCorporation1120f::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $data->is_first_time = $this->isFirstTimeFiling1120F;

            if(!empty($this->LastFiled1120F)){
                $data->last_filed_form = $this->LastFiled1120F->store('files');
            }

            $data->corporation_name = $this->nameOfCorporation;
            $data->corporation_address = $this->addressOfCorporation;
            $data->ein = $this->EIN;
            $data->product_provided = $this->ServiceProvided;
            $data->principal_business = $this->PricipalBusinessActivity;
            $data->corporation_date = $this->CorporationDate;
            $data->shareholder_name = $this->ShareHolderName;
            $data->shareholder_address = $this->ShareHolderAddress;
            $data->shareholder_percentage = $this->PercentageOwnership;
            $data->ustax_no = $this->USTaxNo;
            $data->is_employ_worker = $this->DidYouEmployAnyWorkers;
            $data->independent_contractors_payments = $this->isPaymentToIndependentContractors;
            $data->file_1099MISC = $this->isFile1099MISCForms;
            $data->foreign_sharholders_transactions = $this->isForeignNonUsTransaction;
            $data->end_of_year_balance = $this->BusinessAccountBalance;
            $data->are_assets_worth_one_million = $this->isAssetWorth;

            if(!empty($this->DocumentForBalanceSheet)){
                $data->balance_sheet = $this->DocumentForBalanceSheet->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
            }

            $data->profit_loss_statement = $this->HaveProfitLossStatement;
            if(!empty($this->DocumentForProfitLossStatment)){
                $data->profit_loss_statement_file = $this->DocumentForProfitLossStatment->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
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
             $data = new FCorporation1120f();
             $data->user_id = UserID();
             $data->filing_years_id = CurrentFilingYear();
             $data->is_first_time = $this->isFirstTimeFiling1120F;

             if(!empty($this->LastFiled1120F)){
                 $data->last_filed_form = $this->LastFiled1120F->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
             }

             $data->corporation_name = $this->nameOfCorporation;
             $data->corporation_address = $this->addressOfCorporation;
             $data->ein = $this->EIN;
             $data->product_provided = $this->ServiceProvided;
             $data->principal_business = $this->PricipalBusinessActivity;
             $data->corporation_date = $this->CorporationDate;
             $data->shareholder_name = $this->ShareHolderName;
             $data->shareholder_address = $this->ShareHolderAddress;
             $data->shareholder_percentage = $this->PercentageOwnership;
             $data->ustax_no = $this->USTaxNo;
             $data->is_employ_worker = $this->DidYouEmployAnyWorkers;
             $data->independent_contractors_payments = $this->isPaymentToIndependentContractors;
             $data->file_1099MISC = $this->isFile1099MISCForms;
             $data->foreign_sharholders_transactions = $this->isForeignNonUsTransaction;
             $data->end_of_year_balance = $this->BusinessAccountBalance;
             $data->are_assets_worth_one_million = $this->isAssetWorth;

             if(!empty($this->DocumentForBalanceSheet)){
                 $data->balance_sheet = $this->DocumentForBalanceSheet->store('files');
             }

             $data->profit_loss_statement = $this->HaveProfitLossStatement;
             if(!empty($this->DocumentForProfitLossStatment)){
                 $data->profit_loss_statement_file = $this->DocumentForProfitLossStatment->storeOnCloudinary('expattaxcpa')->getSecurePath(); 
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


        return redirect()->route('not-profit');

    }

    public function prevForm()
    {
        return redirect()->route('partnership');
    }


    public function render()
    {
        return view('livewire.corporate-taxes.foreign-corporation');
    }
}
