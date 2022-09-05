<div>

    <div class="row mt-4">
        <div class="row mt-4 stepwizard">
            <div class="col-md-12 ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb cs-breadcrumbs">

                        <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">Taxpayer </a></li>

                        @if(session()->get('setFilingType') != 'Single')
                        <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
                        <a class="light-grey" href="#">Spouse</a></li>
                        @endif

                        <li wire:click="moveToTab(3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}"><a class="light-grey" href="#">Foreign Housing Exclusion/Deduction</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    {{-- Section 1 --}}
    @if ($currentStep == 1)
        <div>
            
                <div class="row">
                    <div class="row mt-">
                        <div class="col-md-12 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">Please provide the name and address of your employer.
                                    </label><br/>

                                    <div class="row mt-" id="">
                                        <div class="col-md-4 ml-5">
                                            <div class="form-group">
                                                <div class="form-group light-grey">
                                                    <label for="">Name</label>@error('employerName') <span class="error text-danger">*</span> @enderror <br>
                                                    <input wire:model="employerName" type="text" class="form-control col-md-2">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 ml-5">
                                            <div class="form-group">
                                                <div class="form-group light-grey">
                                                    <label for="">Address</label>@error('employerAddress') <span class="error text-danger">*</span> @enderror <br>
                                                    <input wire:model="employerAddress" type="text" class="form-control col-md-2" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="row mt-3">
                    <div class="col-md-7 ml-5">
                        <div class="form-group light-gre">
                            <label class="mb-2" for="">Did you maintain a separate foreign residence for your family because of adverse living conditions at your tax home?
                                    @error('DidYouMaintainASeparateForeignResidence')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="DidYouMaintainASeparateForeignResidence"  class="btn-check form-check-input " name="DidYouMaintainASeparateForeignResidence" id="DidYouMaintainASeparateForeignResidenceYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="DidYouMaintainASeparateForeignResidenceYes">Yes</label>

                                <input wire:model="DidYouMaintainASeparateForeignResidence" type="radio" class="btn-check form-check-input" name="DidYouMaintainASeparateForeignResidence" id="DidYouMaintainASeparateForeignResidenceNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="DidYouMaintainASeparateForeignResidenceNo">No</label>
                        </div>
                    </div>
                </div>


                @if($DidYouMaintainASeparateForeignResidence === 'yes')
                    <div class="row mt-3" id="">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-" for="">Please provide city and country of second separate foreign 
                                    residence and number of days you maintained a household there.
                                </label>
                            </div>

                            <div class="form-group row mt-4  light-grey">
                                <label for="country" class="col-sm-4 col-form-label">Country @error('CountryOfSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <select id="country" class="form-control" wire:model="CountryOfSeparateForeignResidence">
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


                            <div class="form-group row mt-3">
                                <label for="city" class="col-sm-4 col-form-label">City @error('CityOfSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="CityOfSeparateForeignResidence" type="text" class="form-control col-md-2" id="city">
                                </div>
                            </div>


                            <div class="form-group row mt-3">
                                <label for="" class="col-sm-4 col-form-label">Number of Days @error('NumberOfDaysForSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="NumberOfDaysForSeparateForeignResidence" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4" id="">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-" for=""> <strong>What was your country of residence during the year? @error('CountryOfResidence')<span class="error">*</span> @enderror </strong>
                                </label>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-8">
                                    <select class="form-control" wire:model="CountryOfResidence">
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
                    </div>


                    <div class="row mt-3" id="">
                        <label class="mb-2" for="">When did you move to your country of residence? @error('WhenDidYouMoveToCountryOfResidence')<span class="error">*</span> @enderror
                        </label>
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    {{-- <label for="">Date</label>@error('WhenDidYouMoveToCountryOfResidence')<span class="error">*</span> @enderror <br> --}}
                                    <input wire:model="WhenDidYouMoveToCountryOfResidence" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3" id="">
                        <label class="mb-2" for="">If you have since moved away from the above country, please provide the date on which your residence ended:
                            @error('DateResidenceEnded')<span class="error">*</span> @enderror
                        </label>
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    {{-- <label for="">Date</label>@error('DateResidenceEnded')<span class="error">*</span> @enderror <br> --}}
                                    <input wire:model="DateResidenceEnded" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif





                <div class="row mt-4" id="">
                    <div class="col-md-7 ml-5">
                        <div class="form-group light-gey">
                        <label class="mb-2" for=""> <strong>Please specify which statement is applicable to you regarding your living quarters in the foreign country:
                            @error('StatementApplicableToYouRegardingLivingQuarters')<span class="error">*</span> @enderror </strong>
                        </label>
                    </div>

                    <div class="col-md-8 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                {{-- <label for="">Select</label>@error('StatementApplicableToYouRegardingLivingQuarters')<span class="error">*</span> @enderror <br> --}}
                                <select class='form-control' wire:model='StatementApplicableToYouRegardingLivingQuarters'>
                                    <option>Select One</option>
                                    <option>Purchased home</option>
                                    <option>Rented house or apartment</option>
                                    <option>Rented a room</option>
                                    <option>Quarters furnished by employer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Did any of your family lived with you abroad during any part of the tax year?
                                    @error('DidAnyFamilyLiveWithYouAbroad')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="DidAnyFamilyLiveWithYouAbroad"  class="btn-check form-check-input " name="DidAnyFamilyLiveWithYouAbroad" id="DidAnyFamilyLiveWithYouAbroadYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="DidAnyFamilyLiveWithYouAbroadYes">Yes</label>

                                <input wire:model="DidAnyFamilyLiveWithYouAbroad" type="radio" class="btn-check form-check-input" name="DidAnyFamilyLiveWithYouAbroad" id="DidAnyFamilyLiveWithYouAbroadNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="DidAnyFamilyLiveWithYouAbroadNo">No</label>
                        </div>
                    </div>
                </div>



                @if($DidAnyFamilyLiveWithYouAbroad === 'yes')
                <div class="row mt-3" id="">
                    <label class="mb-2" for="">Please specify who (which relative) and for what period:
                    </label><br/>

                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Relative Name @error('RelativeName')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="RelativeName" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Period @error('RelativeStayPeriod')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="RelativeStayPeriod" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                @endif




                <div class="row mt-4">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Have you submitted a statement to the authorities of the foreign country where you claim residence that you are not a resident of that country?
                                    @error('HaveYouSubmittedAStatmentToAuthorities')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="HaveYouSubmittedAStatmentToAuthorities"  class="btn-check form-check-input " name="HaveYouSubmittedAStatmentToAuthorities" id="HaveYouSubmittedAStatmentToAuthoritiesYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="HaveYouSubmittedAStatmentToAuthoritiesYes">Yes</label>

                                <input wire:model="HaveYouSubmittedAStatmentToAuthorities" type="radio" class="btn-check form-check-input" name="HaveYouSubmittedAStatmentToAuthorities" id="HaveYouSubmittedAStatmentToAuthoritiesNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="HaveYouSubmittedAStatmentToAuthoritiesNo">No</label>
                        </div>
                    </div>
                </div>



                @if($HaveYouSubmittedAStatmentToAuthorities === 'yes')

                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Are you required to pay income tax to the foreign country where you claim residence?
                                        @error('AreYouRequiredToPayIncomeTaxToForeignCountry')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="AreYouRequiredToPayIncomeTaxToForeignCountry"  class="btn-check form-check-input " name="AreYouRequiredToPayIncomeTaxToForeignCountry" id="AreYouRequiredToPayIncomeTaxToForeignCountryYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="AreYouRequiredToPayIncomeTaxToForeignCountryYes">Yes</label>

                                    <input wire:model="AreYouRequiredToPayIncomeTaxToForeignCountry" type="radio" class="btn-check form-check-input" name="AreYouRequiredToPayIncomeTaxToForeignCountry" id="AreYouRequiredToPayIncomeTaxToForeignCountryNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="AreYouRequiredToPayIncomeTaxToForeignCountryNo">No</label>
                            </div>
                        </div>
                    </div>
                    <br>

                @endif



                <div class="row mt-5">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Were you present in the US during the tax year?
                                    @error('WereYouPresentInUSDuringTaxYear')<span class="error">*</span> @enderror
                                </label><br/>
                            <input type="radio" wire:model="WereYouPresentInUSDuringTaxYear"  class="btn-check form-check-input " name="WereYouPresentInUSDuringTaxYear" id="WereYouPresentInUSDuringTaxYearYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="WereYouPresentInUSDuringTaxYearYes">Yes</label>

                                <input wire:model="WereYouPresentInUSDuringTaxYear" type="radio" class="btn-check form-check-input" name="WereYouPresentInUSDuringTaxYear" id="WereYouPresentInUSDuringTaxYearNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="WereYouPresentInUSDuringTaxYearNo">No</label>
                        </div>
                    </div>
                </div>
                <br>

                @if($WereYouPresentInUSDuringTaxYear === 'yes')
                    <div class="row mt-3">
                       
                        <div class="col-md-3">
                            <div class="form-group mt-4  light-grey">
                                <label for="" class="col-form-label">Date of Arrival In the US</label>@error('DateOfArrivalInUS')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="DateOfArrivalInUS" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group  mt-4  light-grey">
                                <label for="" class="col-form-label">Date Left the US</label>@error('DateLeftUS')<span class="error">*</span> @enderror <br>
                                <div class="col-sm-8">
                                    <input wire:model="DateLeftUS" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            
                               <button wire:click="addArrivalDetails" style="margin-top: 16px !important; margin-left: 2px !important;"  class="btn btn-success mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5"><i class="fas fa-plus button_font_small"></i>
                                </button>
                      
                        </div>

                        <div class="light-grey row">
                            @if(!empty($hasArrivalData))
                            <ul class="col-md-5 light-grey list-group">
                              @foreach($hasArrivalData as $val)
                                
                                <?php 
                                  $date1         =date_create($val->arrival_date);
                                  $date2         =date_create($val->departure_date);
                                  $numberOfDays  = date_diff($date1,$date2);

                                ?>
                                <li style="cursor: pointer" class="list-group-item light-grey position-relative mb-4"> {{ $val->arrival_date }}  to {{ $val->departure_date }}
                                  <p>Number of Days Spent {{ $numberOfDays->format("%a days") }}</p>
                                  <span wire:click="deleteArrivalDetails({{$val->id}})" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   <i class="fa fa-trash"></i>
                                  <span class="visually-hidden">Delete</span>
                                </li>

                              @endforeach
                               </ul>
                            @endif

                            @if(!empty($arrivalDetails))
                                <ul class="col-md-5 light-grey list-group">
                             

                               @for($i=0; $i < count($arrivalDetails); $i++)
                                <li style="cursor: pointer" class="list-group-item light-grey position-relative mb-4"> 
                                  <p>{{ $arrivalDetails[$i]['arrivalDate']  }} to {{ $arrivalDetails[$i]['departureDate']  }} </p>
                                  <p>Number of Days Spent {{ $arrivalDetails[$i]['numberOfDays']  }}  </p>
                                  <span wire:click="deleteArrivalDetails({{ $i }},1)" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   <i class="fa fa-trash"></i>
                                  <span class="visually-hidden">Delete</span>
                                </li>
                                @endfor

                            
                               </ul>
                            @endif


                        </div>
                        
                        <div class="form-group row mt-4  light-grey">
                                <label for="" class="col-form-label">Income earned in the US</label><br>
                                @error('IncomeEarnedInUS')<span class="error">*</span> @enderror 
                                <div class="col-sm-8">
                                    <input wire:model="IncomeEarnedInUS" type="text" class="form-control col-md-2">
                                </div>
                        </div>

                     </div>
                    


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Please list any contractual terms or conditions relating to the length of your employment abroad:
                                        @error('AnyContracturalTerms')<span class="error">*</span> @enderror
                                    </label><br/>

                                    <textarea wire:model="AnyContracturalTerms" name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Under what type of visa did you enter the foreign country?
                                        @error('UnderWhatTypeOfVisaDidYouEnterTheForeignCountry')<span class="error">*</span> @enderror
                                    </label><br/>

                                    <input wire:model="UnderWhatTypeOfVisaDidYouEnterTheForeignCountry" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>
                    <br>



                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Did your visa limit the length of your stay or employment in the country?
                                        @error('DidYourVisaLimitLengthOfStay')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="DidYourVisaLimitLengthOfStay"  class="btn-check form-check-input " name="DidYourVisaLimitLengthOfStay" id="DidYourVisaLimitLengthOfStayYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="DidYourVisaLimitLengthOfStayYes">Yes</label>

                                    <input wire:model="DidYourVisaLimitLengthOfStay" type="radio" class="btn-check form-check-input" name="DidYourVisaLimitLengthOfStay" id="DidYourVisaLimitLengthOfStayNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="DidYourVisaLimitLengthOfStayNo">No</label>
                            </div>
                        </div>
                    </div>


                    @if($DidYourVisaLimitLengthOfStay === 'yes')
                        <div class="row mt-3">
                            <div class="col-md-7 ml-5">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">In what way?
                                            @error('InWhatWayDidYourVisaLimitLengthOfStay')<span class="error">*</span> @enderror
                                        </label><br/>

                                        <input wire:model="InWhatWayDidYourVisaLimitLengthOfStay" type="text" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Did you maintain a home in the U.S. while living abroad?
                                        @error('DidYouMaintainAHomeInUS')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="DidYouMaintainAHomeInUS"  class="btn-check form-check-input " name="DidYouMaintainAHomeInUS" id="DidYouMaintainAHomeInUSYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="DidYouMaintainAHomeInUSYes">Yes</label>

                                    <input wire:model="DidYouMaintainAHomeInUS" type="radio" class="btn-check form-check-input" name="DidYouMaintainAHomeInUS" id="DidYouMaintainAHomeInUSNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="DidYouMaintainAHomeInUSNo">No</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    @if($DidYouMaintainAHomeInUS === 'yes')
                        <div class="row mt-3">
                            <div class="col-md-7 ml-5">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">Provide the address of the home, whether it was rented out, the names of the occupants, and their relationship to you.
                                        @error('AddressOfHomeInUS')<span class="error">*</span> @enderror
                                    </label><br/>


                                    <div class="form-group row mt-3  light-grey">
                                        <label for="country" class="col-sm-4 col-form-label">Address of home @error('AddressOfHomeInUS')<span class="error">*</span> @enderror</label>
                                        <div class="col-sm-8">
                                            <input wire:model="AddressOfHomeInUS" type="text" class="form-control col-md-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" id="">
                            <div class="col-md-4 ml-5">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <label for="">Occupant Name</label>@error('NameOfOccupantsOfHomeInUS') <span class="error text-danger">*</span> @enderror <br>
                                        <input wire:model="NameOfOccupantsOfHomeInUS.{{0}}" type="text" class="form-control col-md-2" name="NameOfOccupantsOfHomeInUS[]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 ml-5">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <label for="">Relationship</label>@error('RelationshipWithOccupants') <span class="error text-danger">*</span> @enderror <br>
                                        <input wire:model="RelationshipWithOccupants.{{0}}" type="text" class="form-control col-md-2" value="" name="RelationshipWithOccupants[]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2" style="display: flex; align-items:flex-end">
                                <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addInput({{$i}})"><i class="fas fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>

                        @foreach ($inputs as $key =>$value )
                            <div class="row mt-3" id="">
                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <div class="form-group light-grey">
                                            <label for="">Occupant Name</label> <br>
                                            <input wire:model="NameOfOccupantsOfHomeInUS.{{$key+1}}" type="text" class="form-control col-md-2"  name="NameOfOccupantsOfHomeInUS[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <div class="form-group light-grey">
                                            <label for="">Relationship</label><br>
                                            <input wire:model="RelationshipWithOccupants.{{$key+1}}" type="text" class="form-control col-md-2" value=""  name="RelationshipWithOccupants[]">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2" style="display: flex; align-items:flex-end">
                                    <button class="btn btn-danger add_item_btn03 mr-5" wire:click.prevent="removeInput({{$i}})"><i class="fas fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif


                @endif


                <div class="row mt-5">
                    <div class="button-flex">
                        @if (($currentStep-1)==0)
                            <div></div>
                            <button wire:click="submitTaxPayer" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                                <span class="pl-3 button_font_small">Submit Taxpayer <i class="fas fa-arrow-right button_font_small"></i></span>
                            </button>

                        @else
                            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Back</span>
                            </button>

                            <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                                <span class="pl-3 button_font_small">Submit Spouse <i class="fas fa-arrow-right button_font_small"></i></span>
                            </button>
                        @endif

                    </div>
                </div>

           
        </div>




    {{-- Section 2 --}}
    @elseif ($currentStep == 2)
        <div class="" id="step-2">
            <form action="" wire:submit.prevent='submitSpouse'>
                <div class="row">
                    <div class="row mt-">
                        <div class="col-md-12 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">Please provide the name and address of your employer.
                                    </label><br/>

                                    <div class="row mt-" id="">
                                        <div class="col-md-4 ml-5">
                                            <div class="form-group">
                                                <div class="form-group light-grey">
                                                    <label for="">Name</label>@error('SpouseEmployerName') <span class="error text-danger">*</span> @enderror <br>
                                                    <input wire:model="SpouseEmployerName" type="text" class="form-control col-md-2">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 ml-5">
                                            <div class="form-group">
                                                <div class="form-group light-grey">
                                                    <label for="">Address</label>@error('SpouseEmployerAddress') <span class="error text-danger">*</span> @enderror <br>
                                                    <input wire:model="SpouseEmployerAddress" type="text" class="form-control col-md-2" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="row mt-3">
                    <div class="col-md-7 ml-5">
                        <div class="form-group light-gre">
                            <label class="mb-2" for="">Did you maintain a separate foreign residence for your family because of adverse living conditions at your tax home?
                                    @error('SpouseDidYouMaintainASeparateForeignResidence')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="SpouseDidYouMaintainASeparateForeignResidence"  class="btn-check form-check-input " name="SpouseDidYouMaintainASeparateForeignResidence" id="SpouseDidYouMaintainASeparateForeignResidenceYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="SpouseDidYouMaintainASeparateForeignResidenceYes">Yes</label>

                                <input wire:model="SpouseDidYouMaintainASeparateForeignResidence" type="radio" class="btn-check form-check-input" name="SpouseDidYouMaintainASeparateForeignResidence" id="SpouseDidYouMaintainASeparateForeignResidenceNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="SpouseDidYouMaintainASeparateForeignResidenceNo">No</label>
                        </div>
                    </div>
                </div>


                @if($SpouseDidYouMaintainASeparateForeignResidence === 'yes')
                    <div class="row mt-3" id="">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-" for="">Please provide city and country of second separate foreign residence and number of days you maintained a household there.
                                </label>
                            </div>

                            <div class="form-group row mt-4  light-grey">
                                <label for="country" class="col-sm-4 col-form-label">Country @error('SpouseCountryOfSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <select id="country" class="form-control" wire:model="SpouseCountryOfSeparateForeignResidence">
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


                            <div class="form-group row mt-3">
                                <label for="city" class="col-sm-4 col-form-label">City @error('SpouseCityOfSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseCityOfSeparateForeignResidence" type="text" class="form-control col-md-2" id="city">
                                </div>
                            </div>


                            <div class="form-group row mt-3">
                                <label for="" class="col-sm-4 col-form-label">Number of Days @error('SpouseNumberOfDaysForSeparateForeignResidence')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseNumberOfDaysForSeparateForeignResidence" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4" id="">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-" for=""> <strong>What was your country of residence during the year? @error('SpouseCountryOfResidence')<span class="error">*</span> @enderror </strong>
                                </label>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-8">
                                    <select class="form-control" wire:model="SpouseCountryOfResidence">
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
                    </div>


                    <div class="row mt-3" id="">
                        <label class="mb-2" for="">When did you move to your country of residence? @error('SpouseWhenDidYouMoveToCountryOfResidence')<span class="error">*</span> @enderror
                        </label>
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    {{-- <label for="">Date</label>@error('SpouseWhenDidYouMoveToCountryOfResidence')<span class="error">*</span> @enderror <br> --}}
                                    <input wire:model="SpouseWhenDidYouMoveToCountryOfResidence" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3" id="">
                        <label class="mb-2" for="">If you have since moved away from the above country, please provide the date on which your residence ended:
                            @error('SpouseDateResidenceEnded')<span class="error">*</span> @enderror
                        </label>
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    {{-- <label for="">Date</label>@error('SpouseDateResidenceEnded')<span class="error">*</span> @enderror <br> --}}
                                    <input wire:model="SpouseDateResidenceEnded" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endif





                <div class="row mt-4" id="">
                    <div class="col-md-7 ml-5">
                        <div class="form-group light-gey">
                        <label class="mb-2" for=""> <strong>Please specify which statement is applicable to you regarding your living quarters in the foreign country:
                            @error('SpouseStatementApplicableToYouRegardingLivingQuarters')<span class="error">*</span> @enderror </strong>
                        </label>
                    </div>

                    <div class="col-md-8 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                {{-- <label for="">Select</label>@error('SpouseStatementApplicableToYouRegardingLivingQuarters')<span class="error">*</span> @enderror <br> --}}
                                <select class='form-control' wire:model='SpouseStatementApplicableToYouRegardingLivingQuarters'>
                                    <option>Select One</option>
                                    <option>Purchased home</option>
                                    <option>Rented house or apartment</option>
                                    <option>Rented a room</option>
                                    <option>Quarters furnished by employer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Did any of your family lived with you abroad during any part of the tax year?
                                    @error('SpouseDidAnyFamilyLiveWithYouAbroad')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="SpouseDidAnyFamilyLiveWithYouAbroad"  class="btn-check form-check-input " name="SpouseDidAnyFamilyLiveWithYouAbroad" id="SpouseDidAnyFamilyLiveWithYouAbroadYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="SpouseDidAnyFamilyLiveWithYouAbroadYes">Yes</label>

                                <input wire:model="SpouseDidAnyFamilyLiveWithYouAbroad" type="radio" class="btn-check form-check-input" name="SpouseDidAnyFamilyLiveWithYouAbroad" id="SpouseDidAnyFamilyLiveWithYouAbroadNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="SpouseDidAnyFamilyLiveWithYouAbroadNo">No</label>
                        </div>
                    </div>
                </div>



                @if($SpouseDidAnyFamilyLiveWithYouAbroad === 'yes')
                <div class="row mt-3" id="">
                    <label class="mb-2" for="">Please specify who (which relative) and for what period:
                    </label><br/>

                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Relative Name @error('SpouseRelativeName')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="SpouseRelativeName" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Period @error('SpouseRelativeStayPeriod')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="SpouseRelativeStayPeriod" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                @endif




                <div class="row mt-4">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Have you submitted a statement to the authorities of the foreign country where you claim residence that you are not a resident of that country?
                                    @error('SpouseHaveYouSubmittedAStatmentToAuthorities')<span class="error">*</span> @enderror
                                </label><br/>
                        <input type="radio" wire:model="SpouseHaveYouSubmittedAStatmentToAuthorities"  class="btn-check form-check-input " name="SpouseHaveYouSubmittedAStatmentToAuthorities" id="SpouseHaveYouSubmittedAStatmentToAuthoritiesYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="SpouseHaveYouSubmittedAStatmentToAuthoritiesYes">Yes</label>

                                <input wire:model="SpouseHaveYouSubmittedAStatmentToAuthorities" type="radio" class="btn-check form-check-input" name="SpouseHaveYouSubmittedAStatmentToAuthorities" id="SpouseHaveYouSubmittedAStatmentToAuthoritiesNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="SpouseHaveYouSubmittedAStatmentToAuthoritiesNo">No</label>
                        </div>
                    </div>
                </div>



                @if($SpouseHaveYouSubmittedAStatmentToAuthorities === 'yes')

                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Are you required to pay income tax to the foreign country where you claim residence?
                                        @error('SpouseAreYouRequiredToPayIncomeTaxToForeignCountry')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="SpouseAreYouRequiredToPayIncomeTaxToForeignCountry"  class="btn-check form-check-input " name="SpouseAreYouRequiredToPayIncomeTaxToForeignCountry" id="SpouseAreYouRequiredToPayIncomeTaxToForeignCountryYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="SpouseAreYouRequiredToPayIncomeTaxToForeignCountryYes">Yes</label>

                                    <input wire:model="SpouseAreYouRequiredToPayIncomeTaxToForeignCountry" type="radio" class="btn-check form-check-input" name="SpouseAreYouRequiredToPayIncomeTaxToForeignCountry" id="SpouseAreYouRequiredToPayIncomeTaxToForeignCountryNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="SpouseAreYouRequiredToPayIncomeTaxToForeignCountryNo">No</label>
                            </div>
                        </div>
                    </div>
                    <br>

                @endif



                <div class="row mt-5">
                    <div class="col-md-7 ml-5">
                        <div class="form-group">
                            <label class="mb-2" for="">Were you present in the US during the tax year?
                                    @error('SpouseWereYouPresentInUSDuringTaxYear')<span class="error">*</span> @enderror
                                </label><br/>
                            <input type="radio" wire:model="SpouseWereYouPresentInUSDuringTaxYear"  class="btn-check form-check-input " name="SpouseWereYouPresentInUSDuringTaxYear" id="SpouseWereYouPresentInUSDuringTaxYearYes"  value='yes' >
                                <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="SpouseWereYouPresentInUSDuringTaxYearYes">Yes</label>

                                <input wire:model="SpouseWereYouPresentInUSDuringTaxYear" type="radio" class="btn-check form-check-input" name="SpouseWereYouPresentInUSDuringTaxYear" id="SpouseWereYouPresentInUSDuringTaxYearNo"   value='no'>
                                <label  class="btn btn-outline-secondary btn-site-primary"
                                for="SpouseWereYouPresentInUSDuringTaxYearNo">No</label>
                        </div>
                    </div>
                </div>
                <br>

                @if($SpouseWereYouPresentInUSDuringTaxYear === 'yes')
                    <div class="row mt-3" id="">
                        <div class="col-md-7 ml-5">
                            <div class="form-group row mt-4  light-grey">
                                <label for="" class="col-sm-4 col-form-label">Date of Arrival In the US</label>@error('SpouseDateOfArrivalInUS')<span class="error">*</span> @enderror</label>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseDateOfArrivalInUS" type="date" class="form-control col-md-2">
                                </div>
                            </div>


                            <div class="form-group row mt-4  light-grey">
                                <label for="" class="col-sm-4 col-form-label">Date Left the US</label>@error('SpouseDateLeftUS')<span class="error">*</span> @enderror <br>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseDateLeftUS" type="date" class="form-control col-md-2">
                                </div>
                            </div>


                            <div class="form-group row mt-4  light-grey">
                                <label for="" class="col-sm-4 col-form-label">Number of Days in the US on Business</label>@error('SpouseNumberOfDaysInTheUSOnBusiness')<span class="error">*</span> @enderror <br>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseNumberOfDaysInTheUSOnBusiness" type="number" class="form-control col-md-2">
                                </div>
                        </div>

                        <div class="form-group row mt-4  light-grey">
                                <label for="" class="col-sm-4 col-form-label">Income earned in the US</label>@error('SpouseIncomeEarnedInUS')<span class="error">*</span> @enderror <br>
                                <div class="col-sm-8">
                                    <input wire:model="SpouseIncomeEarnedInUS" type="text" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Please list any contractual terms or conditions relating to the length of your employment abroad:
                                        @error('SpouseAnyContracturalTerms')<span class="error">*</span> @enderror
                                    </label><br/>

                                    <textarea wire:model="SpouseAnyContracturalTerms" name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Under what type of visa did you enter the foreign country?
                                        @error('SpouseUnderWhatTypeOfVisaDidYouEnterTheForeignCountry')<span class="error">*</span> @enderror
                                    </label><br/>

                                    <input wire:model="SpouseUnderWhatTypeOfVisaDidYouEnterTheForeignCountry" type="text" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>
                    <br>



                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Did your visa limit the length of your stay or employment in the country?
                                        @error('SpouseDidYourVisaLimitLengthOfStay')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="SpouseDidYourVisaLimitLengthOfStay"  class="btn-check form-check-input " name="SpouseDidYourVisaLimitLengthOfStay" id="SpouseDidYourVisaLimitLengthOfStayYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="SpouseDidYourVisaLimitLengthOfStayYes">Yes</label>

                                    <input wire:model="SpouseDidYourVisaLimitLengthOfStay" type="radio" class="btn-check form-check-input" name="SpouseDidYourVisaLimitLengthOfStay" id="SpouseDidYourVisaLimitLengthOfStayNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="SpouseDidYourVisaLimitLengthOfStayNo">No</label>
                            </div>
                        </div>
                    </div>


                    @if($SpouseDidYourVisaLimitLengthOfStay === 'yes')
                        <div class="row mt-3">
                            <div class="col-md-7 ml-5">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">In what way?
                                            @error('SpouseInWhatWayDidYourVisaLimitLengthOfStay')<span class="error">*</span> @enderror
                                        </label><br/>

                                        <input wire:model="SpouseInWhatWayDidYourVisaLimitLengthOfStay" type="text" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="row mt-3">
                        <div class="col-md-7 ml-5">
                            <div class="form-group light-grey">
                                <label class="mb-2" for="">Did you maintain a home in the U.S. while living abroad?
                                        @error('SpouseDidYouMaintainAHomeInUS')<span class="error">*</span> @enderror
                                    </label><br/>
                                <input type="radio" wire:model="SpouseDidYouMaintainAHomeInUS"  class="btn-check form-check-input " name="SpouseDidYouMaintainAHomeInUS" id="SpouseDidYouMaintainAHomeInUSYes"  value='yes' >
                                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="SpouseDidYouMaintainAHomeInUSYes">Yes</label>

                                    <input wire:model="SpouseDidYouMaintainAHomeInUS" type="radio" class="btn-check form-check-input" name="SpouseDidYouMaintainAHomeInUS" id="SpouseDidYouMaintainAHomeInUSNo"   value='no'>
                                    <label  class="btn btn-outline-secondary btn-site-primary"
                                    for="SpouseDidYouMaintainAHomeInUSNo">No</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    @if($SpouseDidYouMaintainAHomeInUS === 'yes')
                        <div class="row mt-3">
                            <div class="col-md-7 ml-5">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">Provide the address of the home, whether it was rented out, the names of the occupants, and their relationship to you.
                                        @error('SpouseAddressOfHomeInUS')<span class="error">*</span> @enderror
                                    </label><br/>


                                    <div class="form-group row mt-3  light-grey">
                                        <label for="country" class="col-sm-4 col-form-label">Address of home @error('SpouseAddressOfHomeInUS')<span class="error">*</span> @enderror</label>
                                        <div class="col-sm-8">
                                            <input wire:model="SpouseAddressOfHomeInUS" type="text" class="form-control col-md-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" id="">
                            <div class="col-md-4 ml-5">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <label for="">Occupant Name</label>@error('SpouseNameOfOccupantsOfHomeInUS') <span class="error text-danger">*</span> @enderror <br>
                                        <input wire:model="SpouseNameOfOccupantsOfHomeInUS" type="text" class="form-control col-md-2">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 ml-5">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <label for="">Relationship</label>@error('SpouseRelationshipWithOccupants') <span class="error text-danger">*</span> @enderror <br>
                                        <input wire:model="SpouseRelationshipWithOccupants" type="text" class="form-control col-md-2" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2" style="display: flex; align-items:flex-end">
                                <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addInput({{$i}})"><i class="fas fa-plus" aria-hidden="true"></i></button>
                            </div>
                        </div>

                        @foreach ($inputs as $value )
                            <div class="row mt-3" id="">
                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <div class="form-group light-grey">
                                            <label for="">Occupant Name</label> <br>
                                            <input wire:model="SpouseNameOfOccupantsOfHomeInUS" type="text" class="form-control col-md-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 ml-5">
                                    <div class="form-group">
                                        <div class="form-group light-grey">
                                            <label for="">Relationship</label><br>
                                            <input wire:model="SpouseRelationshipWithOccupants" type="text" class="form-control col-md-2" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2" style="display: flex; align-items:flex-end">
                                    <button class="btn btn-danger add_item_btn03 mr-5" wire:click.prevent="removeInput({{$i}})"><i class="fas fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif


                @endif


                <div class="row mt-5">
                    <div class="button-flex">
                        @if (($currentStep-1)==0)
                            <div></div>
                            <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                                <span class="pl-3 button_font_small">Submit Taxpayer <i class="fas fa-arrow-right button_font_small"></i></span>
                            </button>

                        @else
                            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Back</span>
                            </button>

                            <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                                <span class="pl-3 button_font_small">Submit Spouse <i class="fas fa-arrow-right button_font_small"></i></span>
                            </button>
                        @endif

                    </div>
                </div>

            </form>
        </div>





    {{-- Section 3 --}}
    @elseif ($currentStep == 3)
    <div id="step-3">
        <form action="" wire:submit.prevent='submitForeignHousing'>
            <div class="row mb-3">
                <div class="col-md-8 text-info">
                    <span>
                        <i class="fa fa-regular fa-circle-info "></i>
                        Only complete if your income is above $100,000
                    </span>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-gey">
                        <label class="mb-2" for="">The following is a general list of allowable expenses used to calculate your foreign housing exclusion/deduction.  Please provide amounts of actual expenses incurred during the tax year.</label>
                    </div>
                </div>
            </div>


            <div class="row mt-3" id="">
                <div class="col-md-7 ml-5">
                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Rent ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="Rent" type="number" class="form-control col-md-2">
                        </div>
                    </div>

                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Household repairs and maintenance ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="HouseholdRepairs" type="number" class="form-control col-md-2">
                        </div>
                    </div>

                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Utilities (other than telephone) ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="Utilities" type="number" class="form-control col-md-2">
                        </div>
                    </div>

                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Real property and personal property insurance ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="RealPropertyInsurance" type="number" class="form-control col-md-2">
                        </div>
                    </div>

                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Occupancy taxes ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="OccupancyTax" type="number" class="form-control col-md-2">
                        </div>
                    </div>

                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Nonrefundable security deposits ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="NonRefundableSecurityDeposit" type="number" class="form-control col-md-2">
                        </div>
                    </div>
                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Furniture rental ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="FurnitureRental" type="number" class="form-control col-md-2">
                        </div>
                    </div>
                    <div class="form-group row mt-4  light-gre">
                        <label for="" class="col-sm-4 col-form-label">Residential parking fees ($)</label>
                        <div class="col-sm-8">
                            <input wire:model="ResidentialParking" type="number" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>





            <div class="row mt-5">
                <div class="button-flex">
                    @if ($currentStep==3)
                        <div></div>
                        <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                            <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Back</span>
                        </button>

                        <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                            <span class="pl-3 button_font_small">Submit Foreign Housing Exclusion <i class="fas fa-arrow-right button_font_small"></i></span>
                        </button>

                    @endif

                </div>
            </div>
        </form>
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

