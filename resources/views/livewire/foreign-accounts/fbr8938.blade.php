<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">

                    <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">Account Information </a></li>

                    <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
                        <a class="light-grey" href="#">Account Holder</a></li>

                    <li wire:click="moveToTab(3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}"><a
                            class="light-grey" href="#">8938 Fatca Requirements</a></li>
                </ol>
            </nav>
        </div>
    </div>

   @if ($currentStep == 1)
        <div class="mt-4 info-group">
            <div class="info-group-one">
                <p>Who is required to file? 
                    <span  class="cstooltip"><span>
                      <i class="fa fa-exclamation"></i></span>
                      
                      <span class="tooltiptext">1. If you are a US citizen and you own accounts outside the United States, that held a total of more than $10,000 at any point during the year, you must submit this information to the IRS.
                        <br/>
                        2. If you are not a citizen, and have an ITIN number (and not a social security number), you are NOT required to file.
                      </span>

                    </span>
                </p>
            </div>


            <div class="info-group-two">
                <p>Which accounts should be reported? <span  class="cstooltip"><span>
                      <i class="fa fa-exclamation"></i></span>
                      
                      <span class="tooltiptext">
                        1. All Bank accounts, insurance and pension funds, investment accounts, life insurance policies with a cash surrender value, and any accounts over which you have signature authority (including business or company accounts).  If filing an FBAR even those accounts with a balance of zero should be reported.
                        <br/>
                        2. If you own over 50% of a foreign company, all corporate accounts must be included.
                        <br/>
                        3. Once you are required to file, all accounts must be included (even those with negative or zero balance).<br/>
                        4. Trust funds should not be included.
                      </span>

                    </span>

                </p>
            </div>

            <div class="info-group-three">
                <p>Who is subject to penalty? <span><i class="fa fa-exclamation"></i></span></p>
            </div>
        </div>


        @if(session()->get('isFillingStreamlined') == 'no')   @endif
 <div class="row mt-4">
            <div class="form-group">
            <label class="mb-2" for=""><strong>Are you required to file an FBAR?</strong>
                @error('isRequiredToFileFBAR') <span class="error text-danger">*</span>
                @enderror
            </label><br>
            <input type="radio" wire:model="isRequiredToFileFBAR" class="btn-check form-check-input "
                    name="isRequiredToFileFBAR" id="isRequiredToFileFBARYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="isRequiredToFileFBARYes">Yes</label>

            <input wire:model="isRequiredToFileFBAR" type="radio" class="btn-check form-check-input"
                name="isRequiredToFileFBAR" id="isRequiredToFileFBARNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="isRequiredToFileFBARNo">No</label>
            </div>
        </div>

       

        {{-- if above is yes --}}
        @if ($isRequiredToFileFBAR == 'yes')
            <div  class="rental-property-info-wrapper mt-3">

                <div style="" class="">
                    <div  id="navbar1" class="rental-multibusiness-toggler ">
                    <div>
                        <select class="business-income-date-input" wire:model="accountData">
                            @foreach ($currentAccounts as $fBarAccount)
                             <option value=""></option>
                            <option value="{{$fBarAccount->id}}|{{$fBarAccount->bank_name}}">Account {{$fBarAccount->bank_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div  class="multibusiness-toggler-right">
                       <!--  <button type="button" wire:click='addNew()' class="btn btn-default"><i class="fas fa-plus button_font_small"></i> Add another account</button> -->
<!-- 
                        <button type="button" wire:click='editAccount()' class="btn btn-default"><i class="fas fa-edit button_font_small"></i> Update account </button> -->

                        <button type="button" wire:click='removefBarAccount({{$i}})' class="btn btn-default"><i class="fas fa-trash button_font_small"></i> Delete</button>
                    </div>
                </div> 
                </div>
                
                <div class="bank-information-area">
                    <h6 class="section-header">
                        BANK INFORMATION
                    </h6>
                    <form wire:submit.prevent=''>
                        <div class="form-group">
                            <div class="mt-3">
                                <label class="mb-2" for="">Bank/Financial Institution Name
                                    @error('nameOfBank') <span class="error text-danger">*</span>
                                    @enderror
                                </label>
                                <input type="text" wire:model="nameOfBank" class="form-control business-income-date-input" name="">
                            </div>
                    
                            <div class="mt-3">
                                <label for="addressOfBank">Bank/Financial Institution Street Address</label>
                                <input type="text" wire:model="addressOfBank" class="form-control business-income-medium-input" >
                            </div>
        
                            <div class="mt-3">
                            <label class="mb-2" for="">City
                                @error('city') <span class="error text-danger">*</span>
                                @enderror
                            </label>
                            <input type="text" wire:model="city" class="form-control business-income-semi-input" name="">
                            </div>
        
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="postalCode">ZIP/ Postal Code</label>
                                    <input type="text" class="form-control business-income-date-input" wire:model="postalCode">
                                </div>
                                <div class="col-md-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control business-income-date-input" wire:model="country">
                                </div>
                            </div>
                    
        
                        </div>
                    </form>
                </div>

                <div class="account-information-area mt-5 content">
                    <h6 class="section-header">
                        account information
                    </h6>

                    <div class="mt-3">
                        <label class="mb-2" for="">Account Number
                            @error('accountNumber') <span class="error text-danger">*</span>
                            @enderror
                        </label>
                        <input type="text" wire:model="accountNumber" class="form-control business-income-semi-input" name="">
                    </div>

                    <div class="mt-3">
                        <label class="mb-2" for="">Account Type
                            @error('accountType') <span class="error text-danger">*</span>
                            @enderror
                        </label>
                       
                        @if($primaryAccountWithOptions == 'true' )
                        <select class="form-control business-income-date-input" wire:model="accountType">
                            <option value=""></option>
                            <option value="Savings">Savings</option>
                            <option value="Securities">Securities</option>
                            <option value="Checking">Checking</option>
                            <option value="Pension">Pension</option>
                            <option value="Life insurance">Life insurance</option>
                            <option value="Education fund">Education fund</option>
                            <option value="Other">Other</option>
                        </select>

                        @else
                          <input type="text" wire:model="primaryAccountHolder" placeholder="{{$nb}}" class="form-control business-income-semi-input">
                        <div>
                            <input class="form-check-input" type="checkbox" wire:model='showPreviousOptions' value="true">
                            <label class="form-check-label" for="defaultCheck1">
                                Show previous options
                            </label>
                        </div>

                        @endif

                    </div>

                    <div class="check-group mt-4">
                        <div>
                            <input class="form-check-input" type="checkbox" wire:model='isNewAccountOpenedInTaxYear' value="openedInTaxYear" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                This is a new account, opened during the tax year
                            </label>
                        </div>

                        <div>
                            <input class="form-check-input" type="checkbox" wire:model='wasClosedDuringTaxYear' value="true" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                This account was closed during the tax year
                            </label>
                        </div>
                    </div>
                </div>

                <div class="account-balance-area mt-5">
                    <h6 class="section-header">
                        account balance
                    </h6>

                    <div class="mt-3">
                        <label for="currencyOfAccount">Currency of account</label>
                        <select id="currency" name="currency" wire:model='currencyOfAccount' class="form-select rental-short-input">
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

                    <div class="mt-3">
                        <label class="mb-2" for="">Highest Balance in Account During the year
                            @error('highestAccountBalanceDuringYear') <span class="error text-danger">*</span>
                            @enderror
                        </label>
                        <input type="text" wire:model="highestAccountBalanceDuringYear" class="form-control business-income-date-input" name="">
                    </div>

                    @if($wasClosedDuringTaxYear == false)
                    <div class="mt-3">
                        <label class="mb-2" for="">Balance on Dec. 31st
                            @error('balanceOn31stDecember') <span class="error text-danger">*</span>
                            @enderror
                        </label>
                        <input type="text" wire:model="balanceOn31stDecember" class="form-control business-income-semi-input" name="">
                    </div>
                    @endif

                </div>
            </div>
        {{-- end of if-statement for if first question is yes --}}
        @endif

        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='gotoSalesOfProperty' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Sales of Property</span>
                </button>
    
                <button type="button" wire:click='submitAccountInformation' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Account Holder <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>
   @endif
   {{-- end of view for currentstep 1 --}}

    
   {{-- if currentstep == 2 --}}
   @if ($currentStep == 2)
      <div class="account-holder-area">
        <div class="button-flex">
            <h6 class="section-header">
               ACCOUNT HOLDER
            </h6>

            <div class="account-select">
                <select class="business-income-date-input">
                    @foreach ($fBarAccount as $fBarAccount) @endforeach

                        <option value="{{$selectedAccountName}}"> {{$selectedAccountName}}</option>
                   
                </select>
            </div>
       </div>

        <div class="mt-3">
            <label class="mb-2" for="">Primary account holder
                @error('primaryAccountHolder') <span class="error text-danger">*</span>
                @enderror
            </label>
            <select class="form-select business-income-date-input" wire:model='primaryAccountHolder' name="" id="">
                <option value="" selected></option>
                <option value="Taxpayer">Taxpayer</option>
                <option value="Spouse">Securities</option>
             
            </select>
            @if($primaryAccountWithOptions == 'true' )
            


            @else
            
            @endif
        </div>

        <div class="mt-3">
            <label class="mb-2" for="">Ownership Type
                @error('ownershipType') <span class="error text-danger">*</span>
                @enderror
            </label>
            <select class="form-select business-income-semi-input" wire:model='ownershipType' name="" id="">
                <option value="" selected></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>

        <div class="mt-3">
            <label class="mb-2" for="">Number of account holders
                @error('numberOfAccountHolders') <span class="error text-danger">*</span>
                @enderror
            </label>
            <select class="form-select" style="width: 70px" wire:model='numberOfAccountHolders' name="" id="">
                
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
      </div>

      <div class="additional-account-holders-area mt-5">
            <h6 class="section-header">
                ADDITIONAL ACCOUNT HOLDER
            </h6>
            <div class="mt-3">
                <label class="mb-2" for="">Company name or name of additional account holder
                    @error('nameOfAdditionalAccountHolder') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="nameOfAdditionalAccountHolder" class="form-control business-income-semi-input" name="">
            </div>

            <div class="mt-4  light-grey">
                <label for="country" class="col-sm-4 col-form-label">Country @error('additionalAccountHolderCountry')<span class="error">*</span> @enderror</label>
                <div class="col-sm-8">
                    <select id="country" class="form-select business-income-medium-input" wire:model="additionalAccountHolderCountry">
                        <option value="  " selected>Select a country</option>
                        <option value="--">Not Specified</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegowina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, the Democratic Republic of the</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote d'Ivoire</option>
                        <option value="HR">Croatia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TP">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="FX">France, Metropolitan</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and Mc Donald Islands</option>
                        <option value="VA">Holy See (Vatican City State)</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran (Islamic Republic of)</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KP">Korea, Democratic People's Republic of</option>
                        <option value="KR">Korea, Republic of</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Lao People's Democratic Republic</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libyan Arab Jamahiriya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau</option>
                        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia, Federated States of</option>
                        <option value="MD">Moldova, Republic of</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russian Federation</option>
                        <option value="RW">Rwanda</option>
                        <option value="KN">Saint Kitts and Nevis</option>
                        <option value="LC">Saint LUCIA</option>
                        <option value="VC">Saint Vincent and the Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia (Slovak Republic)</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SH">St. Helena</option>
                        <option value="PM">St. Pierre and Miquelon</option>
                        <option value="SD">Sudan</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="SY">Syrian Arab Republic</option>
                        <option value="TW">Taiwan, Province of China</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania, United Republic of</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="UM">United States Minor Outlying Islands</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekistan</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Viet Nam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="VI">Virgin Islands (U.S.)</option>
                        <option value="WF">Wallis and Futuna Islands</option>
                        <option value="EH">Western Sahara</option>
                        <option value="YE">Yemen</option>
                        <option value="YU">Yugoslavia</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabwe</option>
                    </select>
                </div>
            </div>
      </div>

      <div class="row mt-5">
        <div class="button-flex">
            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Account Information</span>
            </button>

            <button type="button" wire:click='submitAccountHolderDetails' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                <span class="pl-3 button_font_small">8938 Fatca Requirements <i class="fas fa-arrow-right button_font_small"></i></span>
            </button>
        </div>
    </div>
   @endif
   {{-- end of view for current step 2 --}}



   {{-- if currentStep == 3 --}}
    @if ($currentStep == 3)
        <div class="mt-4 info-group">
            <div class="info-group-one">
                <p>8938 FATCA REQUIREMENTS<span><i class="fa fa-exclamation"></i></span></p>
            </div>
        </div>
        
        <div class="mt-5">
            <div class="mt-3">
                <label class="mb-2" for="">Did you own (on any day during the year) financial assets (including privately owned shares and debt instruments)
                    outside the US with the total value above the filing threshold
                    @error('hasAssetValueAboveFilingThreshold') <span class="error text-danger">*</span>
                    @enderror
                </label>
                 <input type="radio" wire:model="hasAssetValueAboveFilingThreshold" class="btn-check form-check-input "
                    name="hasAssetValueAboveFilingThreshold" id="hasAssetValueAboveFilingThresholdYes" value='yes'>
                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                    for="hasAssetValueAboveFilingThresholdYes">Yes</label>

                <input wire:model="hasAssetValueAboveFilingThreshold" type="radio" class="btn-check form-check-input"
                    name="hasAssetValueAboveFilingThreshold" id="hasAssetValueAboveFilingThresholdNo" value='no'>
                <label class="btn btn-outline-secondary btn-site-primary" for="hasAssetValueAboveFilingThresholdNo">No</label>
            </div>
        </div>

        <div class="mt-4">
            <div class="rental-multibusiness-toggler">
                <div>
                    <select class="business-income-date-input" wire:model="noOfProperties">
                        @foreach ($currentAccounts as $fBarAccount) @endforeach
                            <option value="{{$selectedAccountName}}"> {{$selectedAccountName}}</option>
                       
                    </select>
                </div>
                <div class="multibusiness-toggler-right">
                    <button type="button" wire:click='addNew()' class="btn btn-default"><i class="fas fa-plus button_font_small"></i> Add another account</button>
                    <button type="button" wire:click='removefBarAccount({{$i}})' class="btn btn-default"><i class="fas fa-trash button_font_small"></i> Delete</button>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Account Holder</span>
                </button>
    
                <button type="button" wire:click='goto5471ForeignCorp' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">5471 Foreign Corporation <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>


    @endif
   {{-- end of step 3 view --}}



<script>

document.addEventListener('livewire:load', function () {
   
 

    @this.on('fileDeleted', () => {
    //    toastr.success("Hello World!");
    Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'File deleted',
              showConfirmButton: false,
              timer: 3500,
              toast:true
        });
    });


    // window.onscroll = function() {myFunction()};

    // var navbar = document.getElementById("navbar");
    // console.log(navbar)
    // var sticky = navbar.offsetTop;

    // function myFunction() {
    //   if (window.pageYOffset >= sticky) {
    //     navbar.classList.add("sticky")
    //   } else {
    //     navbar.classList.remove("sticky");
    //   }
    // }

    
});

</script>


</div>
