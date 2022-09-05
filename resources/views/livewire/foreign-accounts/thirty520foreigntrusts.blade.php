<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">
                    <li class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">3520 Foreign Trusts</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group light-grey">
            <label class="mb-2" for="">Are you a grantor, trustee or beneficiary of a trust organized outside the US
                @error('isGrantor')<span class="error">*</span> @enderror
            </label><br />
            <input type="radio" wire:model="isGrantor" class="btn-check form-check-input "
                name="isGrantor" id="isGrantorYes" value='yes'>
            <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                for="isGrantorYes">Yes</label>

            <input wire:model="isGrantor" type="radio" class="btn-check form-check-input"
                name="isGrantor" id="isGrantorNo" value='no'>
            <label class="btn btn-outline-secondary btn-site-primary" for="isGrantorNo">No</label>
        </div>
    </div>

    @if($isGrantor == 'yes')
        <div class="form-group">
            <div class="mt-3">
                <label class="mb-2" for="">Full name and address of the foreign partnership</label>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mb-2" for="">Full name</label>
                            <input type="text" wire:model="grantorFullname" class="form-control business-income-medium-input" name="">
                        </div>
                        <div class="col-md-6">
                        <label class="mb-2" for="">Address</label>
                        <input type="text" wire:model="grantorAddress" class="form-control business-income-medium-input" name="">
                    </div>
               </div>
            </div>


            <div class="mt-3">
                <label class="mb-2" for="">Date of Trust information
                    @error('dateOfTrustInfo') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="date" wire:model="dateOfTrustInfo" class="form-control business-income-date-input" name="">
            </div>

            <div class="mt-3">
                <label class="mb-2" for="">Is the trust obligated by law (or contract) to distribute all funds to beneficiaries
                    @error('isTrustObligated') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="text" wire:model="isTrustObligated" class="form-control business-income-date-input" name="">
            </div>


            <div class="row mt-3">
                <div class="col-md-8">
                    <label class="mb-2" for="">Who are the trustees, beneficiaries, creators and owners of the trust
                        @error('trustee')<span class="error">*</span> @enderror
                    </label><br />
                    <select class="form-select" wire:model="trustee">
                        <option value="--" selected>Choose trustee</option>
                        <option value="taxpayer">Taxpayer</option>
                        <option value="spouse">Spouse</option>
                        <option value="both">Both</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            @if ($trustee == 'other')
            <div class="row mt-4">
                <div class="col-md-12">
                    <label class="mb-2" for="">Information for all trustees, beneficiaries, creators and owners of the trust @error('trusteeName') <span
                        class="error text-danger">*</span> @enderror
                    </label>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="mb-2" for="">Full name @error('trusteeName') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeName' class="form-control" name="">
                        </div>
                        <div class="col-md-4">
                            <label class="mb-2" for="">Social security number @error('trusteeSSN') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeSSN' class="form-control" name="">
                        </div>

                        <div class="col-md-3">
                            <label class="mb-2" for="">Address @error('trusteeAddress') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeAddress' class="form-control" name="">
                        </div>

                        <div class="col-md-5">
                            <label class="mb-2" for="">Role @error('trusteeRole') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeRole' class="form-control" name="">
                        </div>

                        <div class="col-md-2 mt-4" style="display: flex; align-items:flex-end">
                            <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addTrusteeInput({{$trusteefieldId}})"><i class="fas fa-plus" aria-hidden="true"></i></button>
                        </div>

                    </div>
                </div>
                
                @foreach ($trusteeInput as $input)
                <div class="row mt-5">
                    <div class="col-md-5">
                        <label class="mb-2" for="">Full name @error('trusteeName') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        <input type="text" wire:model.lazy='trusteeName' class="form-control" name="">
                    </div>
                    <div class="col-md-4">
                        <label class="mb-2" for="">Social security number @error('trusteeSSN') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        <input type="text" wire:model.lazy='trusteeSSN' class="form-control" name="">
                    </div>

                    <div class="col-md-3">
                        <label class="mb-2" for="">Address @error('trusteeAddress') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        <input type="text" wire:model.lazy='trusteeAddress' class="form-control" name="">
                    </div>

                    <div class="col-md-5">
                        <label class="mb-2" for="">Role @error('trusteeRole') <span
                            class="error text-danger">*</span> @enderror
                        </label>
                        <input type="text" wire:model.lazy='trusteeRole' class="form-control" name="">
                    </div>

                    <div class="col-md-2" style="display: flex; align-items:flex-end">
                        <button class="btn btn-danger add_item_btn03 mr-5" wire:click.prevent="removeTrusteeInput">Remove</button>
                    </div>
                    
                </div>
                @endforeach
            </div>
            @endif
            
        </div>
    @endif

    <div class="row mt-5">
        <div class="button-flex">
            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> 5471 Foreign Corporation </span>
            </button>

             <button type="button" wire:click='submit3520ForeignTrusts' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                <span class="pl-3 button_font_small">Submit <i class="fas fa-arrow-right button_font_small"></i></span>
            </button>
        </div>
    </div>

</div>
