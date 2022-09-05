<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\ForeignEarnedIncome;
use App\Models\UsHomeOccupants;
use App\Models\ArrivalDeparture;

class ForeignIncome extends Component
{
    use GlobalService;
	public $currentStep = 1;

    public $inputs = [];
    public $i = 1;

	public $employerName,$employerAddress,$isACitizenOfWhatCountry,
    $DidYouMaintainASeparateForeignResidence, $CityOfSeparateForeignResidence,$CountryOfSeparateForeignResidence, $NumberOfDaysForSeparateForeignResidence,
    $CountryOfResidence, $WhenDidYouMoveToCountryOfResidence, $DateResidenceEnded,
    $StatementApplicableToYouRegardingLivingQuarters, $DidAnyFamilyLiveWithYouAbroad, $RelativeName, $RelativeStayPeriod,
    $HaveYouSubmittedAStatmentToAuthorities, $AreYouRequiredToPayIncomeTaxToForeignCountry,
    $WereYouPresentInUSDuringTaxYear, $DateOfArrivalInUS, $DateLeftUS, $NumberOfDaysInTheUSOnBusiness, $IncomeEarnedInUS,
    $AnyContracturalTerms,$UnderWhatTypeOfVisaDidYouEnterTheForeignCountry, $DidYourVisaLimitLengthOfStay,$InWhatWayDidYourVisaLimitLengthOfStay,$DidYouMaintainAHomeInUS, $AddressOfHomeInUS;
    public $NameOfOccupantsOfHomeInUS=[];
    public $RelationshipWithOccupants=[];

    // spouse
    public $SpouseEmployerName,$SpouseEmployerAddress,$SpouseIsACitizenOfWhatCountry,
    $SpouseDidYouMaintainASeparateForeignResidence, $SpouseCityOfSeparateForeignResidence,$SpouseCountryOfSeparateForeignResidence, $SpouseNumberOfDaysForSeparateForeignResidence,
    $SpouseCountryOfResidence, $SpouseWhenDidYouMoveToCountryOfResidence, $SpouseDateResidenceEnded,
    $SpouseStatementApplicableToYouRegardingLivingQuarters, $SpouseDidAnyFamilyLiveWithYouAbroad, $SpouseRelativeName, $SpouseRelativeStayPeriod,
    $SpouseHaveYouSubmittedAStatmentToAuthorities, $SpouseAreYouRequiredToPayIncomeTaxToForeignCountry,
    $SpouseWereYouPresentInUSDuringTaxYear, $SpouseDateOfArrivalInUS, $SpouseDateLeftUS, $SpouseNumberOfDaysInTheUSOnBusiness, $SpouseIncomeEarnedInUS,
    $SpouseAnyContracturalTerms,$SpouseUnderWhatTypeOfVisaDidYouEnterTheForeignCountry, $SpouseDidYourVisaLimitLengthOfStay,$SpouseInWhatWayDidYourVisaLimitLengthOfStay,$SpouseDidYouMaintainAHomeInUS, $SpouseAddressOfHomeInUS;
    public $SpouseNameOfOccupantsOfHomeInUS = [];
    public $SpouseRelationshipWithOccupants= [];


    // Foreign Housing Exclusion
    public $Rent,$HouseholdRepairs,$Utilities,$RealPropertyInsurance,$OccupancyTax,$NonRefundableSecurityDeposit,
    $FurnitureRental,$ResidentialParking;
    public $arrivalDetails = [];
    public $hasArrivalData;
    public $incomeId;

    protected $listeners = ['reload'=>'render'];


    public function render()
    {
        return view('livewire.income.foreign-income');
    }

    public function mount()
    {
        $data = ForeignEarnedIncome::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();

        if($data){
            $this->employerName=$data->employer_name;
            $this->employerAddress=$data->employer_address;
            $this->isACitizenOfWhatCountry=$data->national;
            $this->DidYouMaintainASeparateForeignResidence=$data->separate_family_residence;
            $this->CountryOfSeparateForeignResidence=$data->family_country;
            $this->CityOfSeparateForeignResidence=$data->family_city;
            $this->NumberOfDaysForSeparateForeignResidence=$data->family_residence_days;
            $this->CountryOfResidence=$data->country_resided;
            $this->WhenDidYouMoveToCountryOfResidence=$data->residence_start_date;
            $this->DateResidenceEnded=$data->residence_end_date;
            $this->StatementApplicableToYouRegardingLivingQuarters=$data->type_of_living_quarters;
            $this->DidAnyFamilyLiveWithYouAbroad=$data->did_family_live_with_you_abroad;
            $this->RelativeName=$data->relative_name;
            $this->RelativeStayPeriod=$data->relative_reside_period;
            $this->HaveYouSubmittedAStatmentToAuthorities=$data->stmt_to_foreign_country_authorities;
            $this->AreYouRequiredToPayIncomeTaxToForeignCountry=$data->pay_tax_to_foreign_country;
            $this->WereYouPresentInUSDuringTaxYear=$data->present_in_us;
            $this->DateOfArrivalInUS=$data->us_arrival_date;
            $this->DateLeftUS=$data->us_date_left;
            $this->NumberOfDaysInTheUSOnBusiness=$data->us_business_days;
            $this->IncomeEarnedInUS=$data->us_income;
            $this->AnyContracturalTerms=$data->contractual_terms;
            $this->UnderWhatTypeOfVisaDidYouEnterTheForeignCountry=$data->visa_type;
            $this->DidYourVisaLimitLengthOfStay=$data->visa_limit_stay_lenght;
            $this->InWhatWayDidYourVisaLimitLengthOfStay=$data->limit_way;
            $this->DidYouMaintainAHomeInUS=$data->maintain_us_home;
            $this->AddressOfHomeInUS=$data->us_home_address;

            $this->hasArrivalData = ArrivalDeparture::where('foreign_income_id',$data->id)->get();
            $this->incomeId = $data->id;

        }

        $occupants = UsHomeOccupants::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->get();
        if($occupants->count()>0){
            foreach($occupants as $key => $occupant){
                $this->NameOfOccupantsOfHomeInUS[$key] = $occupant->occupant_name;
                $this->RelationshipWithOccupants[$key] = $occupant->relationship;
            }
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
        array_pop($this->NameOfOccupantsOfHomeInUS);
    }

    public function prevForm()
    {
        $this->currentStep--;
    }

    public function submitTaxPayer(){
       //  $validatedData = $this->validate([
       //      'employerName' => 'required',
       //      'employerAddress' => 'required',
       //      'isACitizenOfWhatCountry' => 'required',
       //     'DidYouMaintainASeparateForeignResidence'=>'required',
       //     'CountryOfSeparateForeignResidence'=>'required_if:DidYouMaintainASeparateForeignResidence,==,yes',
       //     'CityOfSeparateForeignResidence'=>'required_if:DidYouMaintainASeparateForeignResidence,==,yes',
       //     'NumberOfDaysForSeparateForeignResidence'=>'required_if:DidYouMaintainASeparateForeignResidence,==,yes',
       //     'CountryOfResidence'=>'required_if:DidYouMaintainASeparateForeignResidence,==,yes',
       //     'WhenDidYouMoveToCountryOfResidence'=>'required_if:DidYouMaintainASeparateForeignResidence,==,yes',
       //     'DidAnyFamilyLiveWithYouAbroad'=>'required',
       //     'RelativeName'=>'required_if:DidAnyFamilyLiveWithYouAbroad,==,yes',
       //     'RelativeStayPeriod'=>'required_if:DidAnyFamilyLiveWithYouAbroad,==,yes',
       //     'HaveYouSubmittedAStatmentToAuthorities'=>'required',
       //     'AreYouRequiredToPayIncomeTaxToForeignCountry'=>'required_if:HaveYouSubmittedAStatmentToAuthorities,==,yes',
       //     'WereYouPresentInUSDuringTaxYear'=>'required',
       //     'DateOfArrivalInUS'=>'required_if:WereYouPresentInUSDuringTaxYear,==,yes',
       //     'DateLeftUS'=>'required_if:WereYouPresentInUSDuringTaxYear,==,yes',
       //     'NumberOfDaysInTheUSOnBusiness'=>'required_if:WereYouPresentInUSDuringTaxYear,==,yes',
       //     'IncomeEarnedInUS'=>'required_if:WereYouPresentInUSDuringTaxYear,==,yes',
       //     ],

       //     [

       //     ]

       // );

       $data = ForeignEarnedIncome::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
       

       if($data){
            $data->employer_name = $this->employerName;
            $data->employer_address = $this->employerAddress;
            $data->national = $this->isACitizenOfWhatCountry;
            $data->separate_family_residence = $this->DidYouMaintainASeparateForeignResidence;
            $data->family_country = $this->CountryOfSeparateForeignResidence;
            $data->family_city = $this->CityOfSeparateForeignResidence;
            $data->family_residence_days = $this->NumberOfDaysForSeparateForeignResidence;
            $data->country_resided = $this->CountryOfResidence;
            $data->residence_start_date = $this->WhenDidYouMoveToCountryOfResidence;
            $data->residence_end_date = $this->DateResidenceEnded;
            $data->type_of_living_quarters = $this->StatementApplicableToYouRegardingLivingQuarters;
            $data->did_family_live_with_you_abroad = $this->DidAnyFamilyLiveWithYouAbroad;
            $data->relative_name = $this->RelativeName;
            $data->relative_reside_period = $this->RelativeStayPeriod;
            $data->stmt_to_foreign_country_authorities = $this->HaveYouSubmittedAStatmentToAuthorities;
            $data->pay_tax_to_foreign_country = $this->AreYouRequiredToPayIncomeTaxToForeignCountry;
            $data->present_in_us = $this->WereYouPresentInUSDuringTaxYear;
            $data->us_arrival_date = $this->DateOfArrivalInUS;
            $data->us_date_left = $this->DateLeftUS;
            $data->us_business_days = $this->NumberOfDaysInTheUSOnBusiness;
            $data->us_income = $this->IncomeEarnedInUS;
            $data->contractual_terms = $this->AnyContracturalTerms;
            $data->visa_type = $this->UnderWhatTypeOfVisaDidYouEnterTheForeignCountry;
            $data->visa_limit_stay_lenght = $this->DidYourVisaLimitLengthOfStay;
            $data->limit_way = $this->InWhatWayDidYourVisaLimitLengthOfStay;
            $data->maintain_us_home = $this->DidYouMaintainAHomeInUS;
            $data->us_home_address = $this->AddressOfHomeInUS;
            $data->save();

            if(!empty($this->hasArrivalData)){

            }

            $cartDAta = \Session::get('cartItems');
            if(!empty($cartDAta)){
              foreach($cartDAta as $key => $value) {
                $arrivalData = new ArrivalDeparture;
                $arrivalData->foreign_income_id = $data->id;
                $arrivalData->user_id           = UserID();
                $arrivalData->arrival_date      = $value['arrivalDate'];
                $arrivalData->departure_date    = $value['departureDate'];
                $arrivalData->save();
            }  
            } 
            
            
            if(!empty($this->NameOfOccupantsOfHomeInUS)){
                foreach($this->NameOfOccupantsOfHomeInUS as $key => $single){
                    $occupant = new UsHomeOccupants;
                    $occupant->user_id = UserID();
                    $occupant->filing_years_id = CurrentFilingYear();
                    $occupant->occupant_name = $single;
                    $occupant->relationship = $this->RelationshipWithOccupants[$key];
                    $occupant->taxpayer_or_spouse = 'taxpayer';
                    $occupant->save();
                }
            }

       }
       else{
            $data = new ForeignEarnedIncome;

            $data->user_id = UserID();
            $data->filing_years_id = CurrentFilingYear();
            $data->employer_name = $this->employerName;
            $data->employer_address = $this->employerAddress;
            $data->national = $this->isACitizenOfWhatCountry;
            $data->separate_family_residence = $this->DidYouMaintainASeparateForeignResidence;
            $data->family_country = $this->CountryOfSeparateForeignResidence;
            $data->family_city = $this->CityOfSeparateForeignResidence;
            $data->family_residence_days = $this->NumberOfDaysForSeparateForeignResidence;
            $data->country_resided = $this->CountryOfResidence;
            $data->residence_start_date = $this->WhenDidYouMoveToCountryOfResidence;
            $data->residence_end_date = $this->DateResidenceEnded;
            $data->type_of_living_quarters = $this->StatementApplicableToYouRegardingLivingQuarters;
            $data->did_family_live_with_you_abroad = $this->DidAnyFamilyLiveWithYouAbroad;
            $data->relative_name = $this->RelativeName;
            $data->relative_reside_period = $this->RelativeStayPeriod;
            $data->stmt_to_foreign_country_authorities = $this->HaveYouSubmittedAStatmentToAuthorities;
            $data->pay_tax_to_foreign_country = $this->AreYouRequiredToPayIncomeTaxToForeignCountry;
            $data->present_in_us = $this->WereYouPresentInUSDuringTaxYear;
            $data->us_arrival_date = $this->DateOfArrivalInUS;
            $data->us_date_left = $this->DateLeftUS;
            $data->us_business_days = $this->NumberOfDaysInTheUSOnBusiness;
            $data->us_income = $this->IncomeEarnedInUS;
            $data->contractual_terms = $this->AnyContracturalTerms;
            $data->visa_type = $this->UnderWhatTypeOfVisaDidYouEnterTheForeignCountry;
            $data->visa_limit_stay_lenght = $this->DidYourVisaLimitLengthOfStay;
            $data->limit_way = $this->InWhatWayDidYourVisaLimitLengthOfStay;
            $data->maintain_us_home = $this->DidYouMaintainAHomeInUS;
            $data->us_home_address = $this->AddressOfHomeInUS;
            $data->save();
            
            $cartData = \Session::get('cartItems');
            
            if(!empty($this->NameOfOccupantsOfHomeInUS)){
                    foreach($cartData as $key => $value) {
                    $arrivalData = new ArrivalDeparture;
                    $arrivalData->foreign_income_id = $data->id;
                    $arrivalData->user_id           = UserID();
                    $arrivalData->arrival_date      = $value['arrivalDate'];
                    $arrivalData->departure_date    = $value['departureDate'];
                    $arrivalData->save();
                }
            }
            

            if(!empty($this->NameOfOccupantsOfHomeInUS)){
                foreach($this->NameOfOccupantsOfHomeInUS as $key => $single){
                    $occupant = new UsHomeOccupants;
                    $occupant->user_id = UserID();
                    $occupant->filing_years_id = CurrentFilingYear();
                    $occupant->occupant_name = $single;
                    $occupant->relationship = $this->RelationshipWithOccupants[$key];
                    $occupant->taxpayer_or_spouse = 'taxpayer';
                    $occupant->save();
                }
            }
       }


       $this->currentStep ++;
       $this->progressUpdate();
       $this->emit('IncreamentProgress');
       \Session::forget('cartItems');

   }




public function submitSpouse(){
    $validatedData = $this->validate([
        'SpouseEmployerName' => 'required',
        'SpouseEmployerAddress' => 'required',
        'SpouseIsACitizenOfWhatCountry' => 'required',
        'SpouseDidYouMaintainASeparateForeignResidence'=>'required',
        'SpouseCountryOfSeparateForeignResidence'=>'required_if:SpouseDidYouMaintainASeparateForeignResidence,==,yes',
        'SpouseCityOfSeparateForeignResidence'=>'required_if:SpouseDidYouMaintainASeparateForeignResidence,==,yes',
        'SpouseNumberOfDaysForSeparateForeignResidence'=>'required_if:SpouseDidYouMaintainASeparateForeignResidence,==,yes',
        'SpouseCountryOfResidence'=>'required_if:SpouseDidYouMaintainASeparateForeignResidence,==,yes',
        'SpouseWhenDidYouMoveToCountryOfResidence'=>'required_if:SpouseDidYouMaintainASeparateForeignResidence,==,yes',
        'SpouseDidAnyFamilyLiveWithYouAbroad'=>'required',
        'SpouseRelativeName'=>'required_if:SpouseDidAnyFamilyLiveWithYouAbroad,==,yes',
        'SpouseRelativeStayPeriod'=>'required_if:SpouseDidAnyFamilyLiveWithYouAbroad,==,yes',
        'SpouseHaveYouSubmittedAStatmentToAuthorities'=>'required',
        'SpouseAreYouRequiredToPayIncomeTaxToForeignCountry'=>'required_if:SpouseHaveYouSubmittedAStatmentToAuthorities,==,yes',
        'SpouseWereYouPresentInUSDuringTaxYear'=>'required',
        'SpouseDateOfArrivalInUS'=>'required_if:SpouseWereYouPresentInUSDuringTaxYear,==,yes',
        'SpouseDateLeftUS'=>'required_if:SpouseWereYouPresentInUSDuringTaxYear,==,yes',
        'SpouseNumberOfDaysInTheUSOnBusiness'=>'required_if:SpouseWereYouPresentInUSDuringTaxYear,==,yes',
        'SpouseIncomeEarnedInUS'=>'required_if:SpouseWereYouPresentInUSDuringTaxYear,==,yes',
        ],

       [

       ]

   );


   $this->currentStep ++;
   $this->progressUpdate();
   $this->emit('IncreamentProgress');

}

public function addArrivalDetails()
{
   
    $validatedData = $this->validate([
            'DateOfArrivalInUS'=> 'required|before_or_equal:today',
            'DateLeftUS'=> 'required',
        ],
        []);
    $date1         =date_create($this->DateOfArrivalInUS);
    $date2         =date_create($this->DateLeftUS);
    $numberOfDays  =date_diff($date1,$date2);

    $data = [
      'arrivalDate'  => $this->DateOfArrivalInUS,
      'departureDate'=> $this->DateLeftUS,
      'numberOfDays' =>  $numberOfDays->format("%a days"),
    ];

    array_push($this->arrivalDetails, $data);
    \Session::put('cartItems',$this->arrivalDetails);
   
}

public function submitForeignHousing(){


    $this->currentStep ++;
    $this->progressUpdate();
    $this->emit('IncreamentProgress');

    return redirect()->route('business-income');
 }

 public function moveToTab($id)
 {
        $this->currentStep = $id;
 }

 public function deleteArrivalDetails($id,$switch=null)
 {
  
    try{
        if($switch == 1){
           
            $arrayItems=\Session::get('cartItems');
           
            array_splice($arrayItems,$id);
            array_splice($this->arrivalDetails,$id);
            // unset($arrayItems[$id]);
            // unset($this->arrivalDetails[$id]);
            $this->emit('reload');
            $this->emit('recordDeleted');
            if(empty($arrayItems)){
               \Session::forget('cartItems');
            }
        }else{
            ArrivalDeparture::where('id',$id)->delete();
            $this->emit('recordDeleted');
            $this->hasArrivalData = ArrivalDeparture::where('foreign_income_id',$this->incomeId)->get();
        }
        
     }catch(\Exception $e){

     }
     
 }

}
