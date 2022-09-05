<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Core\GlobalService;
use App\Models\RentalPropertyInformation;
use App\Models\RentalIncomeExpensesFiles;
use App\Models\SaleOfProperty;
use App\Models\RentalIncomeExpenses;



class RentalIncome extends Component
{
    use GlobalService; use WithFileUploads;
	public $currentStep = 1;
    public $propertyField =[1];
    public $i = 1;
    public $listeners = ['reload'=>'render','recordDeleted'];

    // public $taxYearRange = range(1900, strftime("%Y", time()));


    // variables for step 1 general rental property information
    public $hasRentalProperty;
    public $noOfProperties = [];

    

    // variables for step 2
    public $taxYear;
    public $hasExpenses;
    public $numberOfDocs;
    public $relevantDocs =[];
    public $incomeExpenseCurrency;
    public $otherExpenses;
    public $grossRentalIncome;
    public $advertisingExpenses;
    public $autoExpenses;
    public $travelExpenses;
    public $cleaningMaintenance;
    public $commissions;
    public $qualifiedMortgageInsurance;
    public $otherInsurance;
    public $legalProfessionalFees;
    public $managementFees;
    public $mortgageInterestqualified;
    public $otherMortgageInterest;
    public $otherInterestPayment;
    public $repairExpenses;
    public $suppliesExpenses;
    public $realEstatetaxes;
    public $otherTaxes;
    public $utilities;
    public $vehicleRental;
    public $HasRentalIncome;

    // property details field variables
    public $percentageOwned;
    public $addressOfProperty;
    public $propertType;
    public $tenantRelationship;
    public $numberOfDaysduringTaxYearRented;
    public $numberOfDaysduringTaxYearPersonal;
    public $propertyManager;
    public $ownersOfProperty;
    public $pricOfLand;
    public $startDateOfPropertyRent;
    public $propertyPurchasePrice;
    public $dateOfPurchase;
    public $numberOfProperties;
    public $propertyId;

    // end of step 1 variables

    //Sale of property
    public $SoldPropertyDuringTheTaxYear,$HavePensionPayments, $AddressOfPropertySold;
    public $DidYouSellProperty,$OriginalPurcahsePrice,$OriginalPurcahseDate,$PurcahseCostIncured,$TitleEscrowFees,
    $CostOfImprovement,$RentPublishDate;
    public $SellingCostsIncured ,$AmountOfTaxesPaid,$DatePropertyWasPutForSale,$DateOfRent,$MeetsRequirements;



    public function render()
    {
        $this->numberOfProperties = RentalPropertyInformation::where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->get();
       
        return view('livewire.income.rental-income');
    }


    // submit rental property information and go to income & expenses
    public function submitRentalPropertyInfo()
    {
        // validate all form fields 
        $validatedData = $this->validate([
             'hasRentalProperty'           => 'required',
             'startDateOfPropertyRent'     => 'after:dateOfPurchase'
           ]

       );
        $this->addProperty();
        //go to next page income and expenses
        $this->currentStep++;
    }

    public function addPropertySale(){
        $sale = new SaleOfProperty;
        
        $sale->user_id                  = UserID();
        $sale->filing_years_id          = CurrentFilingYear();
        $sale->did_sell_property        = $this->SoldPropertyDuringTheTaxYear;
        $sale->address_of_property      = $this->AddressOfPropertySold;
        $sale->date_of_origin_purchase  = $this->OriginalPurcahseDate;
        $sale->origin_purchase_price    = $this->OriginalPurcahsePrice;
        $sale->purchase_cost_incured    = $this->PurcahseCostIncured;
        $sale->title_escrowfees         = $this->TitleEscrowFees;
        $sale->cost_of_improvements     = $this->CostOfImprovement;
        $sale->selling_cost_incured     = $this->SellingCostsIncured;
        $sale->amount_of_taxes_paid     = $this->AmountOfTaxesPaid;
        $sale->date_property_was_put_for_rent = $this->RentPublishDate;
        $sale->date_of_rent                   =  $this->DateOfRent;
        $sale->meet_requirements              =  $this->MeetsRequirements;
        $sale->date_property_was_put_for_rent = $this->DatePropertyWasPutForSale;

        $sale->save();
    }

    public function updatedDateOfRent(){
        $validatedData = $this->validate([
             'DateOfRent'     => 'after:RentPublishDate'
           ]
       );
    }

      // submit income and expenses -> section 2
    public function submitIncomeAndExpenses()
    {
        
        $incomeExpenses = RentalIncomeExpenses::where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();

        if(!empty($incomeExpenses)){
            $incomeExpenses->user_id             = UserID() ;     
            $incomeExpenses->filing_years_id     =CurrentFilingYear();
            $incomeExpenses->tax_year            = $this->taxYear;
            $incomeExpenses->gross_rental_income = $this->grossRentalIncome;
            $incomeExpenses->currency            = $this->incomeExpenseCurrency;
            $incomeExpenses->advertising         = $this->advertisingExpenses;
            $incomeExpenses->auto                = $this->autoExpenses;
            $incomeExpenses->travel              = $this->travelExpenses;
            $incomeExpenses->cleaning            = $this->cleaningMaintenance;
            $incomeExpenses->commissions         = $this->commissions;
            $incomeExpenses->mortgage_insurance  = $this->qualifiedMortgageInsurance;
            $incomeExpenses->other_insurance     = $this->otherInsurance;
            $incomeExpenses->legal_fees          = $this->legalProfessionalFees;
            $incomeExpenses->mortgage_interest   = $this->mortgageInterestqualified;
            $incomeExpenses->other_mortgage_interest = $this->otherMortgageInterest;
            $incomeExpenses->other_interest          = $this->otherInterestPayment;
            $incomeExpenses->repairs                 = $this->repairExpenses;
            $incomeExpenses->supplies                = $this->suppliesExpenses;
            $incomeExpenses->real_estate_taxes       = $this->realEstatetaxes;
            $incomeExpenses->other_taxes             = $this->otherTaxes;
            $incomeExpenses->utilities               = $this->utilities;
            $incomeExpenses->vehicle_rental          = $this->vehicleRental;
            $incomeExpenses->other_expenses          = $this->otherExpenses;

            $incomeExpenses->save();
             if(!empty($this->relevantDocs)){
                $this->uploadMultipleForms($incomeExpenses->id);
            }
            if($this->SoldPropertyDuringTheTaxYear == 'yes'){
                $currentStep++;
            }else{
                return redirect()->to('/tax-filing');
            }
        }else{
            $incomeExpenses = new RentalIncomeExpenses;
            $incomeExpenses->user_id             = UserID() ;     
            $incomeExpenses->filing_years_id     =CurrentFilingYear();
            $incomeExpenses->tax_year            = $this->taxYear;
            $incomeExpenses->gross_rental_income = $this->grossRentalIncome;
            $incomeExpenses->currency            = $this->incomeExpenseCurrency;
            $incomeExpenses->advertising         = $this->advertisingExpenses;
            $incomeExpenses->auto                = $this->autoExpenses;
            $incomeExpenses->travel              = $this->travelExpenses;
            $incomeExpenses->cleaning            = $this->cleaningMaintenance;
            $incomeExpenses->commissions         = $this->commissions;
            $incomeExpenses->mortgage_insurance  = $this->qualifiedMortgageInsurance;
            $incomeExpenses->other_insurance     = $this->otherInsurance;
            $incomeExpenses->legal_fees          = $this->legalProfessionalFees;
            $incomeExpenses->mortgage_interest   = $this->mortgageInterestqualified;
            $incomeExpenses->other_mortgage_interest = $this->otherMortgageInterest;
            $incomeExpenses->other_interest          = $this->otherInterestPayment;
            $incomeExpenses->repairs                 = $this->repairExpenses;
            $incomeExpenses->supplies                = $this->suppliesExpenses;
            $incomeExpenses->real_estate_taxes       = $this->realEstatetaxes;
            $incomeExpenses->other_taxes             = $this->otherTaxes;
            $incomeExpenses->utilities               = $this->utilities;
            $incomeExpenses->vehicle_rental          = $this->vehicleRental;
            $incomeExpenses->other_expenses          = $this->otherExpenses;

            $incomeExpenses->save();

            if(!empty($this->relevantDocs)){
                $this->uploadMultipleForms($incomeExpenses->id);
            }

            if($this->SoldPropertyDuringTheTaxYear == 'yes'){
                $currentStep++;
            }else{
                return redirect()->to('/tax-filing');
            }

        }

    }


    public function uploadMultipleForms($id){
        foreach($this->relevantDocs as $file){
            $rental_income  = new RentalIncomeExpensesFiles;

            $rental_income->user_id           = UserID();
            $rental_income->rental_income_expenses_id = $id;
            $rental_income->filename          = rand(); 
            $rental_income->path              = $file->storeOnCloudinary('expattaxcpa')->getSecurePath();
            $rental_income->save();
        }
    }
    
    public function addProperty()
    {
        $property =  RentalPropertyInformation::where('id',$this->propertyId)->where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();
        
        if(!empty($property)){
          
            $property->filing_years_id          = CurrentFilingYear();
            $property->user_id                  = UserID();
            $property->purchase_date            = $this->dateOfPurchase;
            $property->purchase_price           = $this->propertyPurchasePrice;
            $property->rental_start_date        = $this->startDateOfPropertyRent;
            $property->land_included_in_price   = $this->pricOfLand;
            $property->property_owner           = $this->ownersOfProperty;
            $property->percentage_ownership     = $this->percentageOwned;
            $property->property_address         = $this->addressOfProperty;
            $property->property_type            = $this->propertType;
            $property->tenant_relationship      = $this->tenantRelationship;
            $property->personal_used_days       = $this->numberOfDaysduringTaxYearPersonal;
            $property->rental_days              = $this->numberOfDaysduringTaxYearRented;
            $property->property_manager         = $this->propertyManager;

            $property->save();

      }else{
            $property = new RentalPropertyInformation;

            $property->filing_years_id          = CurrentFilingYear();
            $property->user_id                  = UserID();
            $property->purchase_date            = $this->dateOfPurchase;
            $property->purchase_price           = $this->propertyPurchasePrice;
            $property->rental_start_date        = $this->startDateOfPropertyRent;
            $property->land_included_in_price   = $this->pricOfLand;
            $property->property_owner           = $this->ownersOfProperty;
            $property->percentage_ownership     = $this->percentageOwned;
            $property->property_address         = $this->addressOfProperty;
            $property->property_type            = $this->propertType;
            $property->tenant_relationship      = $this->tenantRelationship;
            $property->personal_used_days       = $this->numberOfDaysduringTaxYearPersonal;
            $property->rental_days              = $this->numberOfDaysduringTaxYearRented;
            $property->property_manager         = $this->propertyManager;

             $property->save(); 
      }
        

        
    }

    public function selectProperty($id){
       $this->propertyId = $id;
       $property =  RentalPropertyInformation::where('id',$this->propertyId)->where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();
       if(!empty($property)){
            $this->dateOfPurchase                     = $property->purchase_date ;
            $this->propertyPurchasePrice              = $property->purchase_price;
            $this->startDateOfPropertyRent            = $property->rental_start_date;
            $this->pricOfLand                         = $property->land_included_in_price;
            $this->ownersOfProperty                   = $property->property_owner;
            $this->percentageOwned                    = $property->percentage_ownership;
            $this->addressOfProperty                  = $property->property_address;
            $this->propertType                        = $property->property_type;
            $this->tenantRelationship                 = $property->tenant_relationship;
            $this->numberOfDaysduringTaxYearPersonal  = $property->personal_used_days;
            $this->numberOfDaysduringTaxYearRented    = $property->rental_days;
            $this->propertyManager                    = $property->property_manager;

       }

       
    }

   
    public function removePropertyField($i)
    {
        RentalPropertyInformation::where('id',$this->propertyId)->where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->delete();
        $this->hasRentalProperty = 'no';
        $this->emit('reload');
        $this->emit('recordDeleted');
    }

    // go back to previous stage
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


  

  

    public function moveToTab($id)
    {
        $this->currentStep = $id;
    }

    
}
