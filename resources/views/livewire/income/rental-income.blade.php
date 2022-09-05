<div>
    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">

                    <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">General Rental Property information </a></li>
                    @if($HasRentalIncome == 'yes')
                    <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
                        <a class="light-grey" href="#">Income & Expenses</a></li>
                    @endif

                    @if($SoldPropertyDuringTheTaxYear == 'yes')
                    <li wire:click="moveToTab(3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }} ">
                        <a class="light-grey" href="#">Sale of Property</a></li>
                    @endif
                </ol>
            </nav>
        </div>
    </div>

    

    {{-- this if statement changes the form to display based on the step --}}
    @if ($currentStep == 1)
    @if ($hasRentalProperty == 'yes')
    <div class="rental-multibusiness-toggler">
                    <div>
                        <select wire:change="selectProperty($event.target.value)" class="business-income-date-input" wire:model="noOfProperties">
                             <option value="">Select an option</option>
                            @foreach($numberOfProperties as $data)
                               <option value="{{ $data->id }}">{{ $data->purchase_date }}</option>
                               @for($x=0 ; $x < count($numberOfProperties); $x++ )
                                   
                               @endfor
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="multibusiness-toggler-right">
                        <button type="button" wire:click='addProperty()' class="btn btn-default"><i class="fas fa-plus button_font_small"></i> Add another property</button>
                        <button type="button" wire:click='removePropertyField()' class="btn btn-default"><i class="fas fa-trash button_font_small"></i> Delete</button>
                    </div>
    </div>
    @endif
      <div class="row mt-4">
                    <h6 class="section-header">
                    SECTION 1: GENERAL RENTAL PROPERTY INFORMATION
                </h6>
      </div>
        <div class="row">

            <div class="form-group">
            <label class="mb-2 @error('hasRentalProperty') error @enderror "" for=""><strong>Do you have any rental properties?</strong>
                @error('hasRentalProperty') <span class="error text-danger">*</span>
                @enderror
            </label><br>
            <input type="radio" wire:model="hasRentalProperty" class="btn-check form-check-input "
                    name="hasRentalProperty" id="hasRentalPropertyYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="hasRentalPropertyYes">Yes</label>

            <input wire:model="hasRentalProperty" type="radio" class="btn-check form-check-input"
                name="hasRentalProperty" id="hasRentalPropertyNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="hasRentalPropertyNo">No</label>
            </div>
        </div>

        <div class="row mt-4">

            <div class="form-group">
            <label class="mb-2 @error('hasRentalProperty') error @enderror "" for=""><strong>Do you have any rental income?</strong>
                @error('HasRentalIncome') <span class="error text-danger">*</span>
                @enderror
            </label><br>
            <input type="radio" wire:model="HasRentalIncome" class="btn-check form-check-input "
                    name="HasRentalIncome" id="HasRentalIncomeYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="HasRentalIncomeYes">Yes</label>

            <input wire:model="HasRentalIncome" type="radio" class="btn-check form-check-input"
                name="HasRentalIncome" id="HasRentalIncomeNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="HasRentalIncomeNo">No</label>
            </div>
        </div>

        <div class="row mt-4">

            <div class="form-group">
            <label class="mb-2 @error('hasRentalProperty') error @enderror "" for=""><strong>
            Did you sell any property during the tax year?</strong>
                @error('hasRentalProperty') <span class="error text-danger">*</span>
                @enderror
            </label><br>
            <input type="radio" wire:model="SoldPropertyDuringTheTaxYear" class="btn-check form-check-input "
                    name="SoldPropertyDuringTheTaxYear" id="SoldPropertyDuringTheTaxYearYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="SoldPropertyDuringTheTaxYearYes">Yes</label>

            <input wire:model="SoldPropertyDuringTheTaxYear" type="radio" class="btn-check form-check-input"
                name="SoldPropertyDuringTheTaxYear" id="SoldPropertyDuringTheTaxYearNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="SoldPropertyDuringTheTaxYearNo">No</label>
            </div>
        </div>

        {{-- if above is yes --}}
        @if ($hasRentalProperty == 'yes')
            <div class="rental-property-info-wrapper">
                
                
               
                    <div class="form-group">
                        <div class="mt-3">
                            <label class="mb-2" for="">Date of purchase:
                                @error('dateOfPurchase') <span class="error text-danger">*</span>
                                @enderror
                            </label>
                            <input type="date" wire:model="dateOfPurchase" class="form-control business-income-date-input" name="">
                        </div>
                
                        <div class="mt-3">
                            <label for="propertyPurchasePrice">Purchase Price</label>
                            <input type="text" class="form-control rental-short-input" wire:model="propertyPurchasePrice">
                        </div>
                
                        <div class="mt-3">
                            <label class="mb-2" for="">Date you began to rent out the property:
                                @error('startDateOfPropertyRent') <span class="error text-danger">*</span>
                                @enderror
                            </label>
                            <input type="date" wire:model="startDateOfPropertyRent" class="form-control business-income-date-input" name="">
                        </div>
                
                        <div class="mt-3">
                            <label for="pricOfLand">Land included in price (if known):</label>
                            <input type="text" class="form-control rental-short-input" wire:model="pricOfLand">
                        </div>
                
                        <div class="mt-3">
                            <label class="mb-2" for="">Owners of the property:
                                @error('ownersOfProperty') <span class="error text-danger">*</span>
                                @enderror
                            </label><br>
                            <select class="form-control business-income-date-input" wire:model="ownersOfProperty" id="ownersOfProperty">
                                <option value="" selected>---</option>
                                <option value="taxpayer">Taxpayer</option>
                                <option value="spouse">Spouse</option>
                                <option value="both">Both</option>
                                <option value="jointwithOthers">Joint with others</option>
                            </select>
                        </div>
                
                        <div class="mt-3">
                            <label for="percentageOwned">Percentage ownership:</label>
                            <input type="text" class="form-control rental-short-input" wire:model="percentageOwned">
                        </div>
                
                        <div class="mt-3">
                            <label for="addressOfProperty">Full address of the rental property:</label>
                            <input type="text" class="form-control rental-medium-input" wire:model="addressOfProperty">
                        </div>
                
                        <div class="mt-3">
                            <label for="propertType">Property type (ex. Single family residence, short-term/vacation, etc.):</label>
                            <input type="text" class="form-control rental-semi-input" wire:model="propertType">
                        </div>
                
                        <div class="mt-3">
                            <label for="tenantRelationship">Your relationship, if any, to the tenants:</label>
                            <input type="text" class="form-control rental-semi-input" wire:model="tenantRelationship">
                        </div>
                
                        <div class="mt-3">
                            <label for="numberOfDaysduringTaxYearRented">Number of days during the tax year that the property was rented out:</label>
                            <input type="number" class="form-control rental-semi-input" wire:model="numberOfDaysduringTaxYearRented">
                        </div>
                
                        <div class="mt-3">
                            <label for="numberOfDaysduringTaxYearPersonal">Number of days during the tax year that the property was used for personal use:</label>
                            <input type="number" class="form-control rental-semi-input" wire:model="numberOfDaysduringTaxYearPersonal">
                        </div>
                
                        <div class="mt-3">
                            <label class="mb-2" for="">Who manages your property?
                                @error('propertyManager') <span class="error text-danger">*</span>
                                @enderror
                            </label><br>
                            <select class="form-control business-income-date-input" wire:model="propertyManager" >
                                <option value="" selected>---</option>
                                <option value="myself">Myself</option>
                                <option value="someone">Hire someone to manage it</option>
                            </select>
                        </div>
                    </div>
                
                
            </div>



            {{-- end of if-statement for if first question is yes --}}
        @endif
        {{-- end of if-statement for step 1 --}}
        <div class="row mt-5">
            <div class="button-flex">
                <div></div>

                <button type="submit" wire:click='submitRentalPropertyInfo' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Income & expenses <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>
    @endif
    
    {{-- else statement to check for section 2 --}}
    @if ($currentStep == 2)
     @if ($hasRentalProperty == 'yes')
    <div class="rental-multibusiness-toggler">
                    <div>
                       
                    </div>
                    <div class="multibusiness-toggler-right">
                        <button type="button" wire:click='addProperty()' class="btn btn-default"><i class="fas fa-plus button_font_small"></i> Add </button>
                        <button type="button" wire:click='removePropertyField({{$i}})' class="btn btn-default"><i class="fas fa-trash button_font_small"></i> Delete</button>
                    </div>
    </div>
    @endif
        <h6 class="section-header">
            Section 2 Income and expenses
        </h6>

        <div class="mt-3">
            <label class="mb-2" for="">Tax year
                @error('taxYear') <span class="error text-danger">*</span>
                @enderror
            </label>
            <input type="number" wire:model="taxYear" placeholder="2018" min="2000" max="2099" step="1" class="form-control business-income-date-input">
        </div>

        <div class="mt-3">
            <label for="grossRentalIncome">Amount of gross rental income:</label>
            <input type="text" class="form-control rental-short-input" id="grossRentalIncome">
        </div>

        <div class="mt-4">
            <p class="text-success">Income and expense amounts should be recorded as per US tax year, January -December 31st.</p>
        </div>

        <div class="mt-3">
            <label for="incomeExpenseCurrency">Currency in which income/expenses are recorded:  </label>
            <select id="currency" name="currency" wire:model='incomeExpenseCurrency' class="form-select rental-short-input">
                <option>Select currency</option>
                <option value="AFN">Afghan Afghani</option>
                <option value="ALL">Albanian Lek</option>
                <option value="DZD">Algerian Dinar</option>
                <option value="AOA">Angolan Kwanza</option>
                <option value="ARS">Argentine Peso</option>
                <option value="AMD">Armenian Dram</option>
                <option value="AWG">Aruban Florin</option>
                <option value="AUD">Australian Dollar</option>
                <option value="AZN">Azerbaijani Manat</option>
                <option value="BSD">Bahamian Dollar</option>
                <option value="BHD">Bahraini Dinar</option>
                <option value="BDT">Bangladeshi Taka</option>
                <option value="BBD">Barbadian Dollar</option>
                <option value="BYR">Belarusian Ruble</option>
                <option value="BEF">Belgian Franc</option>
                <option value="BZD">Belize Dollar</option>
                <option value="BMD">Bermudan Dollar</option>
                <option value="BTN">Bhutanese Ngultrum</option>
                <option value="BTC">Bitcoin</option>
                <option value="BOB">Bolivian Boliviano</option>
                <option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
                <option value="BWP">Botswanan Pula</option>
                <option value="BRL">Brazilian Real</option>
                <option value="GBP">British Pound Sterling</option>
                <option value="BND">Brunei Dollar</option>
                <option value="BGN">Bulgarian Lev</option>
                <option value="BIF">Burundian Franc</option>
                <option value="KHR">Cambodian Riel</option>
                <option value="CAD">Canadian Dollar</option>
                <option value="CVE">Cape Verdean Escudo</option>
                <option value="KYD">Cayman Islands Dollar</option>
                <option value="XOF">CFA Franc BCEAO</option>
                <option value="XAF">CFA Franc BEAC</option>
                <option value="XPF">CFP Franc</option>
                <option value="CLP">Chilean Peso</option>
                <option value="CNY">Chinese Yuan</option>
                <option value="COP">Colombian Peso</option>
                <option value="KMF">Comorian Franc</option>
                <option value="CDF">Congolese Franc</option>
                <option value="CRC">Costa Rican ColÃ³n</option>
                <option value="HRK">Croatian Kuna</option>
                <option value="CUC">Cuban Convertible Peso</option>
                <option value="CZK">Czech Republic Koruna</option>
                <option value="DKK">Danish Krone</option>
                <option value="DJF">Djiboutian Franc</option>
                <option value="DOP">Dominican Peso</option>
                <option value="XCD">East Caribbean Dollar</option>
                <option value="EGP">Egyptian Pound</option>
                <option value="ERN">Eritrean Nakfa</option>
                <option value="EEK">Estonian Kroon</option>
                <option value="ETB">Ethiopian Birr</option>
                <option value="EUR">Euro</option>
                <option value="FKP">Falkland Islands Pound</option>
                <option value="FJD">Fijian Dollar</option>
                <option value="GMD">Gambian Dalasi</option>
                <option value="GEL">Georgian Lari</option>
                <option value="DEM">German Mark</option>
                <option value="GHS">Ghanaian Cedi</option>
                <option value="GIP">Gibraltar Pound</option>
                <option value="GRD">Greek Drachma</option>
                <option value="GTQ">Guatemalan Quetzal</option>
                <option value="GNF">Guinean Franc</option>
                <option value="GYD">Guyanaese Dollar</option>
                <option value="HTG">Haitian Gourde</option>
                <option value="HNL">Honduran Lempira</option>
                <option value="HKD">Hong Kong Dollar</option>
                <option value="HUF">Hungarian Forint</option>
                <option value="ISK">Icelandic KrÃ³na</option>
                <option value="INR">Indian Rupee</option>
                <option value="IDR">Indonesian Rupiah</option>
                <option value="IRR">Iranian Rial</option>
                <option value="IQD">Iraqi Dinar</option>
                <option value="ILS">Israeli New Sheqel</option>
                <option value="ITL">Italian Lira</option>
                <option value="JMD">Jamaican Dollar</option>
                <option value="JPY">Japanese Yen</option>
                <option value="JOD">Jordanian Dinar</option>
                <option value="KZT">Kazakhstani Tenge</option>
                <option value="KES">Kenyan Shilling</option>
                <option value="KWD">Kuwaiti Dinar</option>
                <option value="KGS">Kyrgystani Som</option>
                <option value="LAK">Laotian Kip</option>
                <option value="LVL">Latvian Lats</option>
                <option value="LBP">Lebanese Pound</option>
                <option value="LSL">Lesotho Loti</option>
                <option value="LRD">Liberian Dollar</option>
                <option value="LYD">Libyan Dinar</option>
                <option value="LTL">Lithuanian Litas</option>
                <option value="MOP">Macanese Pataca</option>
                <option value="MKD">Macedonian Denar</option>
                <option value="MGA">Malagasy Ariary</option>
                <option value="MWK">Malawian Kwacha</option>
                <option value="MYR">Malaysian Ringgit</option>
                <option value="MVR">Maldivian Rufiyaa</option>
                <option value="MRO">Mauritanian Ouguiya</option>
                <option value="MUR">Mauritian Rupee</option>
                <option value="MXN">Mexican Peso</option>
                <option value="MDL">Moldovan Leu</option>
                <option value="MNT">Mongolian Tugrik</option>
                <option value="MAD">Moroccan Dirham</option>
                <option value="MZM">Mozambican Metical</option>
                <option value="MMK">Myanmar Kyat</option>
                <option value="NAD">Namibian Dollar</option>
                <option value="NPR">Nepalese Rupee</option>
                <option value="ANG">Netherlands Antillean Guilder</option>
                <option value="TWD">New Taiwan Dollar</option>
                <option value="NZD">New Zealand Dollar</option>
                <option value="NIO">Nicaraguan CÃ³rdoba</option>
                <option value="NGN">Nigerian Naira</option>
                <option value="KPW">North Korean Won</option>
                <option value="NOK">Norwegian Krone</option>
                <option value="OMR">Omani Rial</option>
                <option value="PKR">Pakistani Rupee</option>
                <option value="PAB">Panamanian Balboa</option>
                <option value="PGK">Papua New Guinean Kina</option>
                <option value="PYG">Paraguayan Guarani</option>
                <option value="PEN">Peruvian Nuevo Sol</option>
                <option value="PHP">Philippine Peso</option>
                <option value="PLN">Polish Zloty</option>
                <option value="QAR">Qatari Rial</option>
                <option value="RON">Romanian Leu</option>
                <option value="RUB">Russian Ruble</option>
                <option value="RWF">Rwandan Franc</option>
                <option value="SVC">Salvadoran ColÃ³n</option>
                <option value="WST">Samoan Tala</option>
                <option value="SAR">Saudi Riyal</option>
                <option value="RSD">Serbian Dinar</option>
                <option value="SCR">Seychellois Rupee</option>
                <option value="SLL">Sierra Leonean Leone</option>
                <option value="SGD">Singapore Dollar</option>
                <option value="SKK">Slovak Koruna</option>
                <option value="SBD">Solomon Islands Dollar</option>
                <option value="SOS">Somali Shilling</option>
                <option value="ZAR">South African Rand</option>
                <option value="KRW">South Korean Won</option>
                <option value="XDR">Special Drawing Rights</option>
                <option value="LKR">Sri Lankan Rupee</option>
                <option value="SHP">St. Helena Pound</option>
                <option value="SDG">Sudanese Pound</option>
                <option value="SRD">Surinamese Dollar</option>
                <option value="SZL">Swazi Lilangeni</option>
                <option value="SEK">Swedish Krona</option>
                <option value="CHF">Swiss Franc</option>
                <option value="SYP">Syrian Pound</option>
                <option value="STD">São Tomé and Príncipe Dobra</option>
                <option value="TJS">Tajikistani Somoni</option>
                <option value="TZS">Tanzanian Shilling</option>
                <option value="THB">Thai Baht</option>
                <option value="TOP">Tongan pa'anga</option>
                <option value="TTD">Trinidad & Tobago Dollar</option>
                <option value="TND">Tunisian Dinar</option>
                <option value="TRY">Turkish Lira</option>
                <option value="TMT">Turkmenistani Manat</option>
                <option value="UGX">Ugandan Shilling</option>
                <option value="UAH">Ukrainian Hryvnia</option>
                <option value="AED">United Arab Emirates Dirham</option>
                <option value="UYU">Uruguayan Peso</option>
                <option value="USD">US Dollar</option>
                <option value="UZS">Uzbekistan Som</option>
                <option value="VUV">Vanuatu Vatu</option>
                <option value="VEF">Venezuelan BolÃ­var</option>
                <option value="VND">Vietnamese Dong</option>
                <option value="YER">Yemeni Rial</option>
                <option value="ZMK">Zambian Kwacha</option>
            </select>
        </div>

        <div class="row mt-3">
            <div class="form-group light-grey">
                <label class="mb-2" for="">Do you have expenses?
                    @error('hasExpenses')<span class="error">*</span> @enderror
                </label><br />
                <input type="radio" wire:model="hasExpenses" class="btn-check form-check-input "
                    name="hasExpenses" id="hasExpensesYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="hasExpensesYes">Yes</label>

                <input wire:model="hasExpenses" type="radio" class="btn-check form-check-input"
                    name="hasExpenses" id="hasExpensesNo" value='no'>
                <label class="btn btn-outline-secondary btn-site-primary" for="hasExpensesNo">No</label>
            </div>
        </div>

        @if ($hasExpenses == 'yes')
            <div class="row mt-3">
                <span><strong>Expenses</strong></span>
                    <label for="">
                        <i>Below is a general list of expenses that may be incurred in direct relation to real property rentals. Please provide your actual expenses incurred in relation to your rental property during the tax year. </i>
                    </label>
            </div>

            
            <div class="form-group row mt-3">
                <label for="Advertising" class="col-sm-3 col-form-label">Advertising </label>
                <div class="col-sm-5">
                <input type="number"  wire:model='advertisingExpenses'class="form-control" id="Advertising">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Auto" class="col-sm-3 col-form-label">Auto </label>
                <div class="col-sm-5">
                <input type="number" wire:model='autoExpenses' class="form-control" id="Auto">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Travel" class="col-sm-3 col-form-label">Travel </label>
                <div class="col-sm-5">
                <input type="number" wire:model='travelExpenses' class="form-control" id="Travel">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="CleaningMaintenance" class="col-sm-3 col-form-label">Cleaning & Maintenance </label>
                <div class="col-sm-5">
                <input type="number" wire:model='cleaningMaintenance' class="form-control" id="CleaningMaintenance">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Commissions" class="col-sm-3 col-form-label">Commissions </label>
                <div class="col-sm-5">
                <input type="number" wire:model='commissions' class="form-control" id="Commissions">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Qualified mortgage insurance" class="col-sm-3 col-form-label">Qualified mortgage insurance </label>
                <div class="col-sm-5">
                <input type="number" wire:model='qualifiedMortgageInsurance' class="form-control" id="qualifiedMortgageInsurance">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Other insurance" class="col-sm-3 col-form-label">Other insurance </label>
                <div class="col-sm-5">
                <input type="number" wire:model='otherInsurance' class="form-control" id="otherInsurance">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Legal & professional fees" class="col-sm-3 col-form-label">Legal & professional fees </label>
                <div class="col-sm-5">
                <input type="number" wire:model='legalProfessionalFees' class="form-control" id="legalProfessionalfees">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Management fees" class="col-sm-3 col-form-label">Management fees </label>
                <div class="col-sm-5">
                <input type="number" wire:model='managementFees' class="form-control" id="managementFees">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Mortgage interest qualified" class="col-sm-3 col-form-label">Mortgage interest qualified </label>
                <div class="col-sm-5">
                <input type="number" wire:model='mortgageInterestqualified' class="form-control" id="mortgageInterestqualified">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="other mortgage interest" class="col-sm-3 col-form-label">Other mortgage interest </label>
                <div class="col-sm-5">
                <input type="number" wire:model='otherMortgageInterest' class="form-control" id="otherMortgageInterest">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="otherInterestPayment" class="col-sm-3 col-form-label">Other Interest Payment </label>
                <div class="col-sm-5">
                <input type="number" wire:model='otherInterestPayment' class="form-control" id="otherInterestPayment">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Repairs" class="col-sm-3 col-form-label">Repairs </label>
                <div class="col-sm-5">
                <input type="number" wire:model='repairExpenses' class="form-control" id="Repairs">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Supplies" class="col-sm-3 col-form-label">Supplies </label>
                <div class="col-sm-5">
                <input type="number" wire:model='suppliesExpenses' class="form-control" id="Supplies">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Real estate taxes" class="col-sm-3 col-form-label">Real estate taxes </label>
                <div class="col-sm-5">
                <input type="number" wire:model='realEstatetaxes' class="form-control" id="realEstatetaxes">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Other taxes" class="col-sm-3 col-form-label">Other taxes </label>
                <div class="col-sm-5">
                <input type="number" wire:model='otherTaxes' class="form-control" id="otherTaxes">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Utilities" class="col-sm-3 col-form-label">Utilities </label>
                <div class="col-sm-5">
                <input type="number" wire:model='utilities' class="form-control" id="Utilities">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Vehicle Rental" class="col-sm-3 col-form-label">Vehicle Rental </label>
                <div class="col-sm-5">
                <input type="number" wire:model='vehicleRental' class="form-control" id="vehicleRental">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="Other expenses" class="col-sm-3 col-form-label">Other expenses(Specify) </label>
                <div class="col-sm-5">
                <input type="number" wire:model='otherExpenses' class="form-control" id="otherExpenses">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="relevant docs" class="">Upload relevant documents not included in the questions above if any</label>
            </div>

            <div class="form-group row mt-2 col-sm-6">
                <label class="mb-2" for="">Number of forms to upload  @error('numberOfDocs')<span class="error">*</span> @enderror
                     <span class="spinner-border text-dark" wire:loading wire:target="relevantDocs">
                                                <span class="visually-hidden">Loading...</span>
                                               </span>
                </label><br>
                    <select style="margin-left: 10px;" wire:model="numberOfDocs" class="form-select">
                        <option value="0">----</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
            </div>

            @for($i=0; $i < $numberOfDocs; $i++)
                <div class="form-group light-grey">
                    <div class="form-group mt-1">
                        <div class="file btn btn-outline-success cs-file-upload">

                             @if(!empty($relevantDocs[$i])) 
                                                <i  class="fa fa-check "></i> {{ $relevantDocs[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>

                                                @else  <i class="fa fa-upload mr-4"></i> Upload  Forms 
                                              @endif
                        <input wire:model="relevantDocs" type="file"  />
                        </div>
                    </div>
                </div>
            @endfor

        
        @endif
        
        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> General Rental Property information</span>
                </button>

                 <button type="button" wire:click='submitIncomeAndExpenses' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="spinner-border text-dark" wire:loading wire:target="submitIncomeAndExpenses">
                                                <span class="visually-hidden">Loading...</span>
                                               </span>
                    <span class="pl-3 button_font_small">Submit <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>
        
    {{-- end of form for section 2 --}}



    @endif

    @if($currentStep == 3)
    <div class="wrapper">
        
        <div class="row mt-4">
            <h6 class="section-header"> SECTION 3: SALE OF PROPERTY </h6>
      </div>

        <div class="row">

           <!--  <div class="form-group">
            <label class="mb-2 @error('DidYouSellProperty') error @enderror "" for=""><strong>Did you sell a property?</strong>
                @error('DidYouSellProperty') <span class="error text-danger">*</span>
                @enderror
            </label><br>
            <input type="radio" wire:model="DidYouSellProperty" class="btn-check form-check-input "
                    name="DidYouSellProperty" id="DidYouSellPropertYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="DidYouSellPropertYes">Yes</label>

            <input wire:model="DidYouSellProperty" type="radio" class="btn-check form-check-input"
                name="DidYouSellProperty" id="DidYouSellPropertyNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="DidYouSellPropertyNo">No</label>
            </div>
        </div> -->

        <div class="row mb-3">
                    <div class="col-md-8 text-info">
                    <span>
                    <i class="fa fa-regular fa-circle-info "></i>
                    -You owned the home and used it as your main home during at least 2 of the last 5 years before the date of sale. (If your home was your residence for at least 24 of the months you owned the home during the 5 years leading up to the date of sale, you meet the residence requirement. The 24 months of residence can fall anywhere within the 5‐year period. It doesn't even have to be a single block of time. All you need is a total of 24 months (730 days) of residence during the 5‐year period.) <br/>
                    ‐ You did not acquire the home through a like‐kind exchange (also known as a 1031 exchange), during the past 5 years. <br/>
                    - You did not claim any exclusion for the sale of a home that occurred during a 2‐year period ending on the date of the sale of the home, the gain from which you now want to exclude.
                    </div>
         </div>

           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">Address of property sold </label>
                    <textarea class="form-control" wire:model="AddressOfPropertySold"></textarea>
                
                </div>
           </div>

           <div class="form-group row mt-3">
                <div class="col-md-4">
                    <label for="Vehicle Rental" class="col-form-label">
                      Date you originally purchased the property </label>
                    <input type="date" class="form-control" wire:model="OriginalPurcahseDate" />
                
                </div>
           </div>

           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                      Amount which you originally purchased the property </label>
                    <input type="text" class="form-control" wire:model="OriginalPurcahsePrice" />
                
                </div>
           </div>


           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                     Purchase Costs incurred when you purchased the property </label>
                    <input type="text" class="form-control" wire:model="PurcahseCostIncured" />
                
                </div>
           </div>


           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                     Title, Escrow Fees, Real Estate Agent Commissions, etc. </label>
                    <input type="text" class="form-control" wire:model="TitleEscrowFees" />
                
                </div>
           </div>

           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                     Costs of improvements you made to the property </label>
                    <input type="text" class="form-control" wire:model="CostOfImprovement" />
                
                </div>
           </div>

           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                    Selling costs incurred when you sold the property </label>
                    <input type="text" class="form-control" wire:model="SellingCostsIncured" />
                
                </div>
           </div>


           <div class="form-group row mt-3">
                <div class="col-md-7">
                    <label for="Vehicle Rental" class="col-form-label">
                    The amount, if any, of taxes paid on this capital gain </label>
                    <input type="text" class="form-control" wire:model="AmountOfTaxesPaid" />
                
                </div>
           </div>


           <div class="form-group row mt-3">
                <div class="col-md-4">
                    <label for="Vehicle Rental" class="col-form-label">
                    If property was rented out at any time, please provide the date the property was up for rent and the date taken the market for rental, if applicable </label>
                    <input type="date" class="form-control" wire:model="RentPublishDate" />
                
                </div>
           </div>

           <div class="form-group row mt-3">
                <div class="col-md-4">
                    <label for="Vehicle Rental" class="col-form-label @error('DateOfRent') error @enderror">
                    Date of Rental  @error('DateOfRent')<span class="error">*</span> @enderror</label>
                    <input type="date" class="form-control" wire:model="DateOfRent" />
                
                </div>
           </div>
           
           <div class="form-group row mt-3">
                <div class="col-md-4">
                    <label for="Vehicle Rental" class="col-form-label">
                     Who owns this property? </label>
                    <select class="form-control">
                        <option value="Taxpayer">Taxpayer</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Jointlywithothers">Jointly with others</option>
                           
                    </select>
                
                </div>
           </div>

           <div class="form-group row mt-4">
            <div class="col-md-7 ml-5">
                <p class="light-grey">
                    In addition, you may qualify for a $250,000 exclusion of gain from the sale of your property, $500,000 if married filing jointly, if you meet certain requirements. 
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="MeetsRequirements" value="yes">
                    <label class="form-check-label" for="MeetsRequirements">I meet these requirements and can take the exclusion</label>
                        
                    
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Income & Expenses</span>
                </button>

                 <button type="button" wire:click='addPropertySale' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Tax Filing <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>

           
           

     


    </div>
    @endif


    <script>

document.addEventListener('livewire:load', function () {


    @this.on('recordDeleted', () => {
    //    toastr.success("Hello World!");
    Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'Record deleted',
              showConfirmButton: false,
              timer: 3500,
              toast:true
        });
    });

    
});

</script>
   

</div>
