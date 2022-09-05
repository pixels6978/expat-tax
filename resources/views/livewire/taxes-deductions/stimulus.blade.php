<div>

    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            @include('livewire.taxes-deductions.taxes-header')
        </div>
      </div>

    {{-- Section 1 --}}
    <div class="{{ $currentStep != 3 ? 'display-none' : '' }} " id="step-1">
        <div class="first-stimulus">
            <div class="row mb-3">
                        <div class="col-md-8 text-info">
                        <span>
                        <i class="fa fa-regular fa-circle-info "></i>

                        Up to $1200 per eligible individual and $500 per qualifying child dependent. </span>
                        </div>
             </div>

            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Did you receive the first economic stimulus payment?
                                @error('DidYouReceiveFirstEconomicStimulus')<span class="error">*</span> @enderror
                            </label><br/>
                       <input type="radio" wire:model="DidYouReceiveFirstEconomicStimulus"  class="btn-check form-check-input " name="DidYouReceiveFirstEconomicStimulus" id="DidYouReceiveFirstEconomicStimulusYes"  value='yes' >
                            <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="DidYouReceiveFirstEconomicStimulusYes">Yes</label>

                            <input wire:model="DidYouReceiveFirstEconomicStimulus" type="radio" class="btn-check form-check-input" name="DidYouReceiveFirstEconomicStimulus" id="DidYouReceiveFirstEconomicStimulusNo"   value='no'>
                            <label  class="btn btn-outline-secondary btn-site-primary"
                            for="DidYouReceiveFirstEconomicStimulusNo">No</label>
                    </div>
                </div>
            </div>


            @if($DidYouReceiveFirstEconomicStimulus === 'yes')
                <div class="row mb-3 mt-3">
                    <div class="col-md-8 text-info">
                        <span>
                            <i class="fa fa-regular fa-circle-info "></i>
                            Example: If you, your spouse and your 3 small kids received $3900 in total for the 1st payment then: Taxpayer and dependents: $2700 Spouse $1200 Total $3900.
                        </span>
                    </div>
                </div>

                <div class="row mt-3 mb-3" id="">
                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Date Payment Received @error('FirstStimulusDate')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="FirstStimulusDate" type="date" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Taxpayer and Dependents Received ($)@error('AmountTaxPayerReceivedForFirstStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountTaxPayerReceivedForFirstStimulus" type="number" class="form-control col-md-2" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Spouse Received ($)@error('AmountSpouseReceivedForFirstStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountSpouseReceivedForFirstStimulus" type="number" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for=""><strong>Total Amount Received = ${{$TotalAmountReceivedForFirstStimulus }} </strong></label><br>
                                {{-- <input wire:model="TotalAmountReceivedForFirstStimulus" type="text" class="form-control col-md-2" value=""> --}}
                            </div>
                        </div>
                    </div>
                </div>


            @endif

            <br><br>
        </div>



        <div class="second-stimulus">
            <div class="row mb-3">
                <div class="col-md-8 text-info">
                    <span>
                        <i class="fa fa-regular fa-circle-info "></i>
                        Up to $600 per eligible individual and each qualifying child dependent.
                    </span>
                </div>
             </div>

            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Did you receive the second economic stimulus payment?
                                @error('DidYouReceiveSecondEconomicStimulus')<span class="error">*</span> @enderror
                            </label><br/>
                       <input type="radio" wire:model="DidYouReceiveSecondEconomicStimulus"  class="btn-check form-check-input " name="DidYouReceiveSecondEconomicStimulus" id="DidYouReceiveSecondEconomicStimulusYes"  value='yes' >
                            <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="DidYouReceiveSecondEconomicStimulusYes">Yes</label>

                            <input wire:model="DidYouReceiveSecondEconomicStimulus" type="radio" class="btn-check form-check-input" name="DidYouReceiveSecondEconomicStimulus" id="DidYouReceiveSecondEconomicStimulusNo"   value='no'>
                            <label  class="btn btn-outline-secondary btn-site-primary"
                            for="DidYouReceiveSecondEconomicStimulusNo">No</label>
                    </div>
                </div>
            </div>


            @if($DidYouReceiveSecondEconomicStimulus === 'yes')
                <div class="row mb-3 mt-3">
                    <div class="col-md-8 text-info">
                        <span>
                            <i class="fa fa-regular fa-circle-info "></i>
                           Example: If you, your spouse and 3 small kids received $3000 in total for the 2nd payment then: Taxpayer and dependents: $2400 Spouse $600 Total $3000.
                        </span>
                    </div>
                </div>

                <div class="row mt-3 mb-3" id="">
                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Date Payment Received @error('SecondStimulusDate')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="SecondStimulusDate" type="date" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Taxpayer and Dependents Received ($)@error('AmountTaxPayerReceivedForSecondStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountTaxPayerReceivedForSecondStimulus" type="number" class="form-control col-md-2" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Spouse Received ($)@error('AmountSpouseReceivedForSecondStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountSpouseReceivedForSecondStimulus" type="number" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for=""><strong>Total Amount Received = ${{$TotalAmountReceivedForSecondStimulus }} </strong></label><br>
                                {{-- <input wire:model="TotalAmountReceivedForSecondStimulus" type="text" class="form-control col-md-2" value=""> --}}
                            </div>
                        </div>
                    </div>
                </div>


            @endif

            <br><br>
        </div>




        <div class="third-stimulus">
            <div class="row mb-3">
                <div class="col-md-8 text-info">
                    <span>
                        <i class="fa fa-regular fa-circle-info "></i>
                        Up to $1400 per eligible individual and qualifying dependents
                    </span>
                </div>
             </div>

            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Did you receive the third economic stimulus payment?
                                @error('DidYouReceiveThirdEconomicStimulus')<span class="error">*</span> @enderror
                            </label><br/>
                       <input type="radio" wire:model="DidYouReceiveThirdEconomicStimulus"  class="btn-check form-check-input " name="DidYouReceiveThirdEconomicStimulus" id="DidYouReceiveThirdEconomicStimulusYes"  value='yes' >
                            <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="DidYouReceiveThirdEconomicStimulusYes">Yes</label>

                            <input wire:model="DidYouReceiveThirdEconomicStimulus" type="radio" class="btn-check form-check-input" name="DidYouReceiveThirdEconomicStimulus" id="DidYouReceiveThirdEconomicStimulusNo"   value='no'>
                            <label  class="btn btn-outline-secondary btn-site-primary"
                            for="DidYouReceiveThirdEconomicStimulusNo">No</label>
                    </div>
                </div>
            </div>


            @if($DidYouReceiveThirdEconomicStimulus === 'yes')
                <div class="row mb-3 mt-3">
                    <div class="col-md-8 text-info">
                        <span>
                            <i class="fa fa-regular fa-circle-info "></i>
                            Example: If you, your spouse and 3 small kids received $7000 in total for the 3rd payment then: Taxpayer and dependents: $5600 Spouse $1400 Total $7000.
                        </span>
                    </div>
                </div>

                <div class="row mt-3 mb-3" id="">
                    <div class="col-md-4 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Date Payment Received @error('ThirdStimulusDate')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="ThirdStimulusDate" type="date" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Taxpayer and Dependents Received ($)@error('AmountTaxPayerReceivedForThirdStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountTaxPayerReceivedForThirdStimulus" type="number" class="form-control col-md-2" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ml-5 mb-3">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Amount Spouse Received ($)@error('AmountSpouseReceivedForThirdStimulus')<span class="error">*</span> @enderror</label><br>
                                <input wire:model="AmountSpouseReceivedForThirdStimulus" type="number" class="form-control col-md-2">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for=""><strong>Total Amount Received = ${{$TotalAmountReceivedForThirdStimulus }} </strong></label><br>
                                {{-- <input wire:model="TotalAmountReceivedForThirdStimulus" type="text" class="form-control col-md-2" value=""> --}}
                            </div>
                        </div>
                    </div>
                </div>


            @endif

            <br><br>
        </div>





        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i>  Estimate and Other Payments
                    </span>
                </button>

                 <button type="button" wire:click='submitStimulus' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Advanced child tax credit payments received <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>


    </div>
     {{-- End Section 1 --}}


</div>
