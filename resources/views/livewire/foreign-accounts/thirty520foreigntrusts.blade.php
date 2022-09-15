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
                <label class="mb-2" for="" class="@error('dateOfTrustInfo') error @enderror">Date of Trust information
                    @error('dateOfTrustInfo') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <input type="date" wire:model="dateOfTrustInfo" class="form-control business-income-date-input" name="">
            </div>

            <div class="mt-3 col-md-5">
                <label class="mb-2" for="">
                    Is the trust obligated by law (or contract) to distribute all funds to beneficiaries
                    @error('isTrustObligated') <span class="error text-danger">*</span>
                    @enderror
                </label>
                <select wire:model="isTrustObligated" class="form-control">
                  <option></option>  
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
               <!--  <input type="text" class="form-control business-income-date-input" name=""> -->
            </div>


            <div class="row mt-3">
                <div class="col-md-5">
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

            <div class="row">
                <div class="col-md-7">
                        
                    @if ($trustee == 'other')
            <div class="row mt-4">
                <div class="col-md-12">
                    <label class="mb-2" for="">Information for all trustees, beneficiaries, creators and owners of the trust @error('trusteeName') <span
                        class="error text-danger">*</span> @enderror
                    </label>

                    @for($i=0; $i < $numberOfTrustees; $i++)
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label class="mb-2" for="">Full name @error('trusteeName') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeName.{{$i}}' class="form-control" name="">
                        </div>
                        <div class="col-md-6">
                            <label class="mb-2" for="">Social security number @error('trusteeSSN') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeSSN.{{$i}}' class="form-control" name="">
                        </div>

                        <div class="col-md-12">
                            <label class="mb-2" for="">Address @error('trusteeAddress') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeAddress.{{$i}}' class="form-control" name="">
                        </div>

                        <div class="col-md-5">
                            <label class="mb-2" for="">Role @error('trusteeRole') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="text" wire:model.lazy='trusteeRole.{{$i}}' class="form-control" name="">
                        </div>

                        <div class="col-md-2 mt-4" style="display: flex; align-items:flex-end">
                            <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addTrusteeInput({{$trusteefieldId}})"><i class="fas fa-plus" aria-hidden="true"></i></button>
                        </div>

                    </div>
                     @endfor


                </div>
                
                @foreach ($trusteeInput as $input)
                <!-- <div class="row mt-5">
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
                    
                </div> -->
                @endforeach
            </div>
            @endif    

                </div>
             @if ($trustee == 'other')
            <div class="col-md-5">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Address</th>
                        <th>SSN</th>

                    </thead>

                    <tbody>
                        @foreach($listTrustees as $data)
                        <tr>
                            <td>{{ $data->name }}</td> <td>{{ $data->address }}</td> <td>{{ $data->ssn }}
                             <span wire:click="removeTrustee({{$data->id}})" class="badge badge-outline bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif


            </div>

            
            
        </div>
    @endif

    <div class="row mt-5">
        <div class="button-flex">
            <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> 5471 Foreign Corporation </span>
            </button>

             <button type="button" wire:click='submit3520ForeignTrusts' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                 <span class="spinner-border text-light" wire:loading wire:target="submit3520ForeignTrusts">
                                                                        <span class="visually-hidden">Loading...</span>
                                                                        </span>
                <span class="pl-3 button_font_small">Submit <i class="fas fa-arrow-right button_font_small"></i></span>
            </button>
        </div>
    </div>


     <script>

        document.addEventListener('livewire:load', function () {

             @this.on('recordDeleted', () => {
            //    toastr.success("Hello World!");
            Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: 'Record Deleted',
                      showConfirmButton: false,
                      timer: 3500,
                      toast:true
                });
            });

            
        });

    </script>

</div>
