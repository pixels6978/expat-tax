<div>
    {{-- Stop trying to control. --}}
    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">
                    <li class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">Not-for-Profit - 990</a></li>
                </ol>
            </nav>
        </div>
    </div>

   <form wire:submit.prevent='submitNotProfits'>
        <div class="mt-3" id="general_partnership_information">
            <h6 class="section-header">
                General Information of the US Not-for Profit
            </h3>

            <div class="mt-3">
                <label class="mb-2" for="">Name
                    @error('name') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="name" class="form-control business-income-name-input" required name="">
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">EIN
                    @error('ein') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="ein" class="form-control business-income-semi-input" required name="">
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">Address
                    @error('address') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="address" class="form-control business-income-name-input" required name="">
            </div>


            <div class="mt-3">
                <label class="mb-2" for="">What is the name, address and telephone number of the officer in care of the books and records of the organization.
                    @error('officerInCareDetails') <span class="error text-danger">*</span>
                    @enderror
                </label>
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">Name:
                    @error('officerInCareName') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="officerInCareName" class="form-control business-income-name-input" name="">
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">Address:
                    @error('officerInCareAddress') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="officerInCareAddress" class="form-control business-income-name-input" name="">
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">Telephone Number
                    @error('officerInCarePhone') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="officerInCarePhone" class="form-control business-income-semi-input" name="">
            </div><br>


            <div class="mt-3">
                <label class="mb-2" for="">Is this your first time filing with us?
                    @error('isFirstTimeFiling990') <span class="error text-danger">*</span>
                    @enderror
                </label><br>
                    <input type="radio" wire:model="isFirstTimeFiling990" class="btn-check form-check-input "name="isFirstTimeFiling990" id="isFirstTimeFiling990Yes" value='yes'>
                    <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="isFirstTimeFiling990Yes">Yes</label>

                    <input wire:model="isFirstTimeFiling990" type="radio" class="btn-check form-check-input" name="isFirstTimeFiling990" id="isFirstTimeFiling990No" value='no'>
                    <label class="btn btn-outline-secondary btn-site-primary" for="isFirstTimeFiling990No">No</label>
            </div>

            @if ($isFirstTimeFiling990 == 'yes')
                <div class="mt-3">
                    <label class="mb-2" for="">Please provide a copy of the last filed Form 990 filed for the organization.
                        @error('fileFor990Filed') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($uploadedfileFor990Filed))
                    <div>
                        <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$uploadedfileFor990Filed) }}">{{$uploadedfileFor990Filed }}</a></span>
                    </div>
                @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="fileFor990Filed" type="file" />
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Provide a copy of your initial 1023 application.
                        @error('fileFor1023App') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>


                    @if (!empty($uploadedfileFor1023App))
                        <div>
                            <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$uploadedfileFor1023App) }}">{{$uploadedfileFor1023App }}</a></span>
                        </div>
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="fileFor1023App" type="file" />
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Provide a copy of the IRS 501c3 determination letter.
                        @error('fileFor501c3Letter') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($UploadedfileFor501c3Letter))
                        <div>
                            <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$UploadedfileFor501c3Letter) }}">{{$UploadedfileFor501c3Letter }}</a></span>
                        </div>
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="fileFor501c3Letter" type="file" />
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Provide a copy of the original articles of incorporation.
                        @error('articlesOfIncorporation') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($UploadedfileForarticlesOfIncorporation))
                        <div>
                            <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$UploadedfileForarticlesOfIncorporation) }}">{{$UploadedfileForarticlesOfIncorporation }}</a></span>
                        </div>
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="fileForarticlesOfIncorporation" type="file" />
                    </div>
                </div>



            @endif


            <div class="mt-4">
                <label class="mb-2" for="">Do you have proper Balance Sheet and Profit and Loss statements?
                    @error('hasProperBalanceSheet') <span class="error text-danger">*</span>
                    @enderror
                </label><br>
                    <input type="radio" wire:model="hasProperBalanceSheet" class="btn-check form-check-input "name="hasProperBalanceSheet" id="hasProperBalanceSheetYes" value='yes'>
                    <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="hasProperBalanceSheetYes">Yes</label>

                    <input wire:model="hasProperBalanceSheet" type="radio" class="btn-check form-check-input" name="hasProperBalanceSheet" id="hasProperBalanceSheetNo" value='no'>
                    <label class="btn btn-outline-secondary btn-site-primary" for="hasProperBalanceSheetNo">No</label>
            </div>

            @if ($hasProperBalanceSheet == 'yes')
                <div class="mt-3">
                    <label class="mb-2" for="">Provide the Profit and loss report for calendar tax years 2019 and 2020.
                        @error('profitAndLossFilesFor2019_2020') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($UploadedprofitAndLossFilesFor2019_2020))
                        @foreach($UploadedprofitAndLossFilesFor2019_2020 as $file)
                            <div>
                                <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$file) }}">{{$file }}</a></span>
                            </div>
                        @endforeach
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="profitAndLossFilesFor2019_2020" type="file" multiple/>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Provide the Balance sheet for tax years ending December 31, 2019 and 2020.
                        @error('balanceSheetForTaxYears19_20') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($UploadedbalanceSheetForTaxYears19_20))
                        @foreach($UploadedbalanceSheetForTaxYears19_20 as $file)
                            <div>
                                <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$file) }}">{{$file }}</a></span>
                            </div>
                        @endforeach
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="balanceSheetForTaxYears19_20" type="file" multiple/>
                    </div>
                </div>
            @endif


            @if ($hasProperBalanceSheet == 'no')
                <div class="mt-4">
                    <label class="mb-2" for="">Would you like us to compile the financial statements for you?
                        @error('compileFinStmtForYou') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>
                        <input type="radio" wire:model="compileFinStmtForYou" class="btn-check form-check-input "name="compileFinStmtForYou" id="compileFinStmtForYouYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="compileFinStmtForYouYes">Yes</label>

                        <input wire:model="compileFinStmtForYou" type="radio" class="btn-check form-check-input" name="compileFinStmtForYou" id="compileFinStmtForYouNo" value='no'>
                        <label class="btn btn-outline-secondary btn-site-primary" for="compileFinStmtForYouNo">No</label>
                </div>

                <div class="mt-3 text-success">
                    <label for="">
                        (We charge $100/hour for this additional service.  This fee tends to vary depending on how big the organization is.  We have some clients that require 1.5 hours of bookkeeping services and some that require 20 hours of bookkeeping services…)
                    </label>
                </div>
            @endif

            @if ($compileFinStmtForYou == 'yes')
                <div class="mt-3">
                    <label class="mb-2" for="">Provide your Bank Statements for relevant  tax year  (January –December). Please include copies of checks paid out.
                        @error('bankStmtForRelevantTaxYear') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($bankStmtForRelevantTaxYear))
                        @foreach($bankStmtForRelevantTaxYear as $file)
                            <div>
                                <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$file) }}">{{$file }}</a></span>
                            </div>
                        @endforeach
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="bankStmtForRelevantTaxYear" type="file" multiple/>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="mb-2" for="">Provide Credit card statements for relevant tax year  (January –December)
                        @error('creditCardStmtForRelevantTaxYear') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>

                    @if (!empty($UploadedcreditCardStmtForRelevantTaxYear))
                        @foreach($UploadedcreditCardStmtForRelevantTaxYear as $file)
                            <div>
                                <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$file) }}">{{$file }}</a></span>
                            </div>
                        @endforeach
                    @endif

                    <div class="file btn btn-outline-success cs-file-upload">
                        <i class="fa fa-upload mr-4"></i> Upload Form
                        <input wire:model="creditCardStmtForRelevantTaxYear" type="file" multiple/>
                    </div>
                </div>
            @endif

            <div class="mt-3">
                <label class="mb-2" for="">Provide a list of donors including the Name, address and amount of contribution for all donors that contributed more than $5,000 cumulatively in relevant tax years.
                    @error('fileForDonorlist') <span class="error text-danger">*</span>
                    @enderror
                </label><br>

                @if (!empty($UploadedfileForDonorlist))
                    <div>
                        <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$UploadedfileForDonorlist) }}">{{$UploadedfileForDonorlist }}</a></span>
                    </div>
                @endif

                <div class="file btn btn-outline-success cs-file-upload">
                    <i class="fa fa-upload mr-4"></i> Upload Form
                    <input wire:model="fileForDonorlist" type="file"/>
                </div>
            </div>

            <div class="mt-4">
                <label class="mb-2" for="">Is your organization a registered charity in any specific State?
                    @error('isOrgRegisteredCharity') <span class="error text-danger">*</span>
                    @enderror
                </label><br>
                    <input type="radio" wire:model="isOrgRegisteredCharity" class="btn-check form-check-input "name="isOrgRegisteredCharity" id="isOrgRegisteredCharityYes" value='yes'>
                    <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="isOrgRegisteredCharityYes">Yes</label>

                    <input wire:model="isOrgRegisteredCharity" type="radio" class="btn-check form-check-input" name="isOrgRegisteredCharity" id="isOrgRegisteredCharityNo" value='no'>
                    <label class="btn btn-outline-secondary btn-site-primary" for="isOrgRegisteredCharityNo">No</label>
            </div>

            @if ($isOrgRegisteredCharity == 'yes')
                <div class="mt-3">
                    <label class="mb-2" for="">Which state?
                        @error('charityRegState') <span class="error text-danger">*</span>
                        @enderror
                    </label>
                    <input type="text" wire:model="charityRegState" class="form-control business-income-semi-input" required name="">
                </div>
            @endif


        </div>

        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Foreign Corporation 112DF</span>
                </button>

                <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Summary <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>
   </form>

</div>
