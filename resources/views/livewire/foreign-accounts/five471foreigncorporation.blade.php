<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">
                    <li class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">5471 Foreign Corporations </a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="mb-2" for="">Please select country of operation
                @error('countryOfResidence')<span class="error">*</span> @enderror
            </label><br />
            <select class="form-select" wire:model="countryOfResidence">
                <option value="--" selected>Choose country</option>
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

    <div class="row mt-3">
        <div class="form-group light-grey">
            <label class="mb-2" for="">Are you an officer, director, or own more than 10% of a corporation or partnership organized outside the US
                @error('isDirector')<span class="error">*</span> @enderror
            </label><br />
            <input type="radio" wire:model="isDirector" class="btn-check form-check-input "
                name="isDirector" id="isDirectorYes" value='yes'>
            <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                for="isDirectorYes">Yes</label>

            <input wire:model="isDirector" type="radio" class="btn-check form-check-input"
                name="isDirector" id="isDirectorNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="isDirectorNo">No</label>

            <input wire:model="isDirector" type="radio" class="btn-check form-check-input"
                name="isDirector" id="isDirectorOur Israeli Team has this information" value='israeliTeam'>
            <label class="btn btn-outline-secondary btn-site-primary" for="isDirectorOur Israeli Team has this information">Our Israeli Team has this information</label>
        </div>
    </div>

    

    @if($isDirector == 'yes')
        <div class="form-group row mt-3">
            <label for="companyFinal" class="">Upload your company's final, signed financial statements</label>
            <div class="form-group light-grey">
                <div class="form-group mt-1">
                    <div class="mb-2">
                  @if($uploadedFinanceStatement != null) 
                   <a href="{{$uploadedFinanceStatement}}">View File </a>
                   @endif
                </div>
                    <div class="file btn btn-outline-success cs-file-upload">
                        <span class="spinner-border text-dark" wire:loading wire:target="signedFinancialStatement">
                        <span class="visually-hidden">Loading...</span>
                        </span>
                        @if(!empty($signedFinancialStatement)) 
                         <i  class="fa fa-check "></i> {{ $signedFinancialStatement->getClientOriginalName() }} Uploaded 
                           @else  <i class="fa fa-upload mr-4"></i> Upload Signed Statements 
                        @endif
                    <input wire:model="signedFinancialStatement" type="file"  />
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($countryOfResidence == 'IL')
        <div class="form-group row mt-3">
            <label for="companyFinalIsraeli" class="">Upload the doch hatama- adjustment statement- if there were djustments</label>
            <div class="form-group light-grey">
                <div class="form-group mt-1">
                    <div class="file btn btn-outline-success cs-file-upload">
                        <span class="spinner-border text-dark" wire:loading wire:target="signedFinancialStatementIsraeli">
                        <span class="visually-hidden">Loading...</span>
                        </span>
                        @if(!empty($signedFinancialStatementIsraeli)) 
                         <i  class="fa fa-check "></i> {{ $signedFinancialStatementIsraeli->getClientOriginalName() }} Uploaded 
                           @else  <i class="fa fa-upload mr-4"></i> Upload Doch Hatama Forms 
                        @endif
                    <input wire:model="signedFinancialStatementIsraeli" type="file"  />
                    </div>
                </div>
            </div>
        </div>

        @elseif(!$countryOfResidence == '')
        <div class="mb-2">
                  @if($uploadedCoprationTaxReturns != null) 
                   <a href="{{$uploadedCoprationTaxReturns}}">View File </a>
                   @endif
        </div>

        <div class="form-group row mt-3">
            <label for="corporationTaxReturn" class="">Upload the corporation's tax return</label>
            <div class="form-group light-grey">
                <div class="form-group mt-1">
                    <div class="file btn btn-outline-success cs-file-upload">
                        <span class="spinner-border text-dark" wire:loading wire:target="corporationTaxReturn">
                        <span class="visually-hidden">Loading...</span>
                        </span>
                        @if(!empty($corporationTaxReturn)) 
                         <i  class="fa fa-check "></i> {{ $corporationTaxReturn->getClientOriginalName() }} Uploaded 
                           @else  <i class="fa fa-upload mr-4"></i> Upload Corporation's Tax Forms 
                        @endif
                    <input wire:model="corporationTaxReturn" type="file"  />
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <h6 class="section-header mt-5">
        Company's Information @if($nameOfCorporation != null) ({{$nameOfCorporation}}) @endif
    </h3>  

    <div>
        <div class="rental-multibusiness-toggler">
            <div>
                <select class="business-income-date-input" wire:change="getCompanyData($event.target.value)">
                    <option value="0"> </option>
                    @foreach ($companies as $data)

                        <option value="{{$data->id}}"> {{$data->corporation_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="multibusiness-toggler-right">
                <button type="button" wire:click='addMore()' class="btn btn-default">
                    <span class="spinner-border text-dark" wire:loading wire:target="addMore">
                        <span class="visually-hidden">Loading...</span>
                        </span> <i class="fas fa-plus button_font_small"></i>
                 Add another company</button>
                <button type="button" wire:click='removeCompanyField({{$i}})' class="btn btn-default"><i class="fas fa-trash button_font_small"></i> Delete</button>
            </div>
        </div>

        <form wire:submit.prevent=''>
            <div class="form-group">
                <div class="mt-3">
                    <label class="mb-2" for="">Foreign Tax ID Number
                        @error('foreignTaxId') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="foreignTaxId" class="form-control business-income-date-input" name="">
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Date of Incorporation
                        @error('dateOfIncorporation') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="date" wire:model="dateOfIncorporation" class="form-control business-income-date-input" name="">
                </div>

                <div class="mt-3">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label class="mb-2" for="">Full name of corporation
                                @error('nameOfCorporation') <span class="error text-danger">*</span>
                                @enderror
                            </label>
                            <input type="text" wire:model="nameOfCorporation" class="form-control business-income-semi-input" name="">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-2" for="">Address of corporation
                                @error('addressOfCorporation') <span class="error text-danger">*</span>
                                @enderror
                            </label>
                            <input type="text" wire:model="addressOfCorporation" class="form-control business-income-semi-input" name="">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Country under whose laws the company was incorporated
                        @error('countryLawOfInc') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <select class="form-select business-income-date-input" wire:model="countryLawOfInc">
                        <option value="--" selected>Choose country</option>
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


                <div class="row mt-3">
                    <div class="col-md-12 ml-5">
                        <div class="form-group">
                                <div class="row mt-2">
                                    <div class="col-md-8">
                                        <label class="mb-2" for="">Company's Bank account number @error('accountNumber') <span
                                            class="error text-danger">*</span> @enderror
                                        </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="mb-2" for="">Bank name @error('accountNumber') <span
                                                    class="error text-danger">*</span> @enderror
                                                </label>
                                                <input type="text" wire:model.lazy='bankName' class="form-control" name="">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-2" for="">Account Number @error('accountNumber') <span
                                                    class="error text-danger">*</span> @enderror
                                                </label>
                                                <input type="text" wire:model.lazy='accountNumber' class="form-control" name="">
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-2" style="display: flex; align-items:flex-end">
                                        <!-- <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addInput({{$i}})"><i class="fas fa-plus" aria-hidden="true"></i></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($inputs as $value )
                          <!--   <div class="col-md-12 ml-5">
                                <div class="form-group">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="mb-2" for="">Bank name @error('BusinessName') <span
                                                            class="error text-danger">*</span> @enderror
                                                        </label>
                                                        <input type="text" wire:model.lazy='bankName' class="form-control" name="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="mb-2" for="">Account Number @error('BusinessName') <span
                                                            class="error text-danger">*</span> @enderror
                                                        </label>
                                                        <input type="text" wire:model.lazy='accountNumber' class="form-control" name="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="display: flex; align-items:flex-end">
                                                <button class="btn btn-danger add_item_btn03 mr-5" wire:click.prevent="removeInput({{$i}})"><i class="fas fa-minus" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>  -->  
                        @endforeach
                </div>

                

                <div class="mt-3">
                    <label class="mb-2" for="">Fiscal year (beginning and ending dates of the tax year applicable to the foreign corporation)
                        @error('fiscalYear') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="fiscalYear" class="form-control business-income-semi-input" name="">
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Principle place of business
                        @error('principlePlaceOfBusiness') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="principlePlaceOfBusiness" class="form-control business-income-date-input" name="">
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Principle business activity
                        @error('principleBusinessActivity') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="principleBusinessActivity" class="form-control business-income-date-input" name="">
                </div>

                <div class="row mt-3">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Does the corporation have a branch or agent in the US? 
                            @error('hasBranchAgentInUs')<span class="error">*</span> @enderror
                        </label><br />
                        <input type="radio" wire:model="hasBranchAgentInUs" class="btn-check form-check-input "
                            name="hasBranchAgentInUs" id="hasBranchAgentInUsYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="hasBranchAgentInUsYes">Yes</label>
        
                        <input wire:model="hasBranchAgentInUs" type="radio" class="btn-check form-check-input"
                            name="hasBranchAgentInUs" id="hasBranchAgentInUsNo" value='no'>
                        <label class="btn btn-outline-secondary btn-site-primary" for="hasBranchAgentInUsNo">No</label>
                    </div>
                </div>

                @if ($hasBranchAgentInUs == 'yes')
                    <div class="col-md-12">
                        <label class="mb-2" for="">Please provide the name, address and identifying number of the branch office or agent @error('BusinessName') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mb-2" for="">Name @error('agentName') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='agentName' class="form-control" name="">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2" for="">Address @error('agentAddress') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='agentAddress' class="form-control" name="">
                            </div>

                            <div class="col-md-4">
                                <label class="mb-2" for="">Identifying number @error('agentNumber') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='agentNumber' class="form-control" name="">
                            </div>
                        </div>
                    </div>
                @endif
                    

                <div class="row mt-3">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Was a U.S Tax return filed for this corporation in relevant years? 
                            @error('taxReturnFiled')<span class="error">*</span> @enderror
                        </label><br />
                        <input type="radio" wire:model="taxReturnFiled" class="btn-check form-check-input "
                            name="taxReturnFiled" id="taxReturnFiledYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="taxReturnFiledYes">Yes</label>
        
                        <input wire:model="taxReturnFiled" type="radio" class="btn-check form-check-input"
                            name="taxReturnFiled" id="taxReturnFiledNo" value='no'>
                        <label class="btn btn-outline-secondary btn-site-primary" for="taxReturnFiledNo">No</label>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Please specify the income/loss reported and the US Income tax paid
                        @error('incomeLossReport') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="incomeLossReport" class="form-control business-income-date-input" name="">
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Number of shares issued and outstanding
                        @error('shareIssued') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="shareIssued" class="form-control business-income-date-input" name="">
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <label class="mb-2" for="">Please provide names of all shareholders and their percentage ownerships for US Shareholders, please provide name, address and SSN: @error('BusinessName') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        @for($i=0; $i < $nmberOfShareHolders; $i++)
                        <div class="row" wire:model="skey.{{$i}}">
                            <div class="col-md-5">
                                <label class="mb-2" for="">Full name @error('stakeHolderName')  <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='stakeHolderName.{{$i}}' class="form-control" name="">
                            </div>
                            <div class="col-md-4">
                                <label class="mb-2" for="">Social security number @error('stakeHolderSSN') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='stakeHolderSSN.{{$i}}' class="form-control" name="">
                            </div>

                            <div class="col-md-3">
                                <label class="mb-2" for="">Address @error('stakeHolderAddress') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='shareHolderAddress.{{$i}}' class="form-control" name="">
                            </div>

                            <div class="col-md-5">
                                <label class="mb-2" for="">Type of ownership @error('stakeHolderOwnershipType') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="text" wire:model.lazy='stakeHolderOwnershipType.{{$i}}' class="form-control" name="">
                            </div>

                            <div class="col-md-4">
                                <label class="mb-2" for="">Ownership percentage @error('stakeHolderOwnershipPercentage') <span
                                    class="error text-danger">*</span> @enderror
                                </label>
                                <input type="number" wire:model.lazy='stakeHolderOwnershipPercentage.{{$i}}' class="form-control" name="">
                            </div>

                            <div class="col-md-2 mt-4" style="display: flex; align-items:flex-end">
                                <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addShareholderInput()"><i class="fas fa-plus" aria-hidden="true"></i></button> &nbsp;

                                <button class="btn btn-danger add_item_btn03 mr-5" 
                                wire:click.prevent="removeShareholderInput({{$i}})">Clear</button>
                            </div>

                        </div>
                         @endfor
                    </div>
                    
                    
                   <!--  <div class="row mt-5">addShareholderInput({{$stakeholderfieldId}})
                        <div class="col-md-5">
                            <label class="mb-2" for="">Full name @error('stakeHolderName') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='stakeHolderName' class="form-control" name="">
                        </div>
                        <div class="col-md-4">
                            <label class="mb-2" for="">Social security number @error('stakeHolderSSN') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='stakeHolderSSN' class="form-control" name="">
                        </div>

                        <div class="col-md-3">
                            <label class="mb-2" for="">Address @error('stakeHolderAddress') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='stakeHolderAddress' class="form-control" name="">
                        </div>

                        <div class="col-md-5">
                            <label class="mb-2" for="">Type of ownership @error('stakeHolderOwnershipType') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='stakeHolderOwnershipType' class="form-control" name="">
                        </div>

                        <div class="col-md-4">
                            <label class="mb-2" for="">Ownership percentage @error('stakeHolderOwnershipPercentage') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="number" wire:model.lazy='stakeHolderOwnershipPercentage' class="form-control" name="">
                        </div>

                        <div class="col-md-2" style="display: flex; align-items:flex-end">
                            <button class="btn btn-danger add_item_btn03 mr-5" wire:click.prevent="removeShareholderInput">Remove</button>
                        </div>
                        
                    </div> -->

                   
                </div>


            </div>
        </form>

        
    </div>
    
    <div class="row mt-5">
        <div class="button-flex">
            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> FBR and 8938</span>
            </button>

             <button type="button" wire:click='submit5471ForeignCorporation' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                <span class="pl-3 button_font_small">3520 Foreign Trusts <i class="fas fa-arrow-right button_font_small"></i></span>
            </button>
        </div>
    </div>


            <script>

        document.addEventListener('livewire:load', function () {

             @this.on('recordSaved', () => {
            //    toastr.success("Hello World!");
            Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Record Added',
                      showConfirmButton: false,
                      timer: 3500,
                      toast:true
                });
            });

            
        });

    </script>

</div>
