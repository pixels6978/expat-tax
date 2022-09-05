<div>

    <div class="row mt-4 stepwizard">
        <div class="col-md-12">
            @include('livewire.taxes-deductions.taxes-header')
        </div>
      </div>

    {{-- Section 1 --}}
    <div class="{{ $currentStep != 4 ? 'display-none' : '' }} " id="step-1">
        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">Have you received advanced child tax credit payments?
                            @error('DidYouReceiveAdvanceChildTax')<span class="error">*</span> @enderror
                        </label><br/>
                   <input type="radio" wire:model="DidYouReceiveAdvanceChildTax"  class="btn-check form-check-input " name="DidYouReceiveAdvanceChildTax" id="DidYouReceiveAdvanceChildTaxYes"  value='yes' >
                        <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                        for="DidYouReceiveAdvanceChildTaxYes">Yes</label>

                        <input wire:model="DidYouReceiveAdvanceChildTax" type="radio" class="btn-check form-check-input" name="DidYouReceiveAdvanceChildTax" id="DidYouReceiveAdvanceChildTaxNo"   value='no'>
                        <label  class="btn btn-outline-secondary btn-site-primary"
                        for="DidYouReceiveAdvanceChildTaxNo">No</label>
                </div>
            </div>
        </div>


        @if($DidYouReceiveAdvanceChildTax === 'yes')
           <div class="row mt-3" id="">
                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Amount ($) @error('AmountOne')<span class="error">*</span> @enderror</label><br>
                            <input wire:model="AmountOne" type="text" class="form-control col-md-2" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Date @error('DateOne')<span class="error">*</span> @enderror</label><br>
                            <input wire:model="DateOne" type="date" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <div class="row mt-3" id="">
                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Amount ($)</label><br>
                            <input wire:model="AmountTwo" type="text" class="form-control col-md-2" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Date</label><br>
                            <input wire:model="DateTwo" type="date" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <div class="row mt-3" id="">
                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Amount ($)</label><br>
                            <input wire:model="AmountThree" type="text" class="form-control col-md-2" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Date</label><br>
                            <input wire:model="DateThree" type="date" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>


            <br>

            <div class="row mt-3" id="">
                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Amount ($)</label><br>
                            <input wire:model="AmountFour" type="text" class="form-control col-md-2" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Date</label><br>
                            <input wire:model="DateFour" type="date" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row mt-3" id="">
                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Amount ($)</label><br>
                            <input wire:model="AmountFive" type="text" class="form-control col-md-2" >
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Date</label><br>
                            <input wire:model="DateFive" type="date" class="form-control col-md-2">
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <br><br>

        

        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Stimulus</span>
                </button>

                 <button type="button" wire:click='submitAdvancedChildTax' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Foreign Account & Entities <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>


    </div>
     {{-- End Section 1 --}}


</div>
