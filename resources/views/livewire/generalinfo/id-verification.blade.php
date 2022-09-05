<div>



    {{-- Step 1 --}}
    <div class="row mt-4 stepwizard">
      <div class="col-md-12 ">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb cs-breadcrumbs">

               <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                   <a class="light-grey" href="#">Taxpayer ID Verification</a>
               </li>

                @if($filingType != 'Single')
                <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }}">
                   <a class="light-grey" href="#">Spouse ID Verification</a>
               </li>
               @endif

            </ol>
          </nav>
      </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-info">
        <span>
        <i class="fa fa-regular fa-circle-info "></i>

        Providing identification info helps the IRS verify your identity which can prevent unnecessary delays in tax return processing.</span>
        </div>
    </div>


     <div class="{{ $currentStep != 1 ? 'display-none' : '' }} " id="step-1">

    <div class="row mt-4">

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Select ID Type</label><br/>
                            <select wire:model="taxPayerIdType" class="form-control mt-2 light-grey">
                                <option value="0">--Select an option--</option>
                                <option value="1">US Driver's license</option>
                                <option value="2">State Issued ID </option>

                            </select>

                        </div>
                    </div>
                </div>
    </div>

    <!-- Driver's license -->

    @switch($taxPayerIdType)

        @case(1)
           <div class="row mt-3">
                <div class="col-md-4 col-sm-8  ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">License Number</label><br/>
                            <input wire:model="IDNumber" type="text" class="form-control col-md-4" >

                        </div>
                    </div>
                </div>
            </div>
        @break

        @case(2)
            <div class="row mt-3">
                <div class="col-md-4 col-sm-8  ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">ID Number</label><br/>
                            <input wire:model="IDNumber" type="text" placeholder="State Issued Number" class="form-control col-md-4" >

                        </div>
                    </div>
                </div>
            </div>
        @break

    @endswitch

    <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Issuing State </label><br/>
                            <select wire:model="IDIssueState" class="form-control mt-2 light-grey">
                                <option value="3">NY</option>
                            </select>

                        </div>
                    </div>
                </div>
    </div>

     <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Issue Date</label><br/>
                            <input wire:model="IDIssueDate" type="date" class="form-control col-md-4" >
                            @error('IDIssueDate')<span class="error">{{$message}}</span> @enderror</label> <br/>
                        </div>
                    </div>
                </div>
    </div>

    <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Expiration Date</label><br/>
                            <input wire:model="IDExpirationDate" type="date" class="form-control col-md-4" >
                             @error('IDExpirationDate')<span class="error">{{$message}}</span> @enderror</label> <br/>
                        </div>
                    </div>
                </div>
    </div>

   


    <div class="row">

                <div class="offset-md-5">
                    <div class="rows mr-auro">

                        <div class="d-flex ">


                            <div class="mr-5">
                                <button wire:click="submitTaxpayerVerification" class="btn btn-outline-secondary btn-site-primary color-text-white my-5 mx-5 ml-5">
                                    <span class="pl-3 button_font_small">Spouse ID Verification <i class="fas fa-arrow-right button_font_small"></i></span>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


    </div>
    {{-- End Step 1 --}}



    {{-- Step 2 --}}
    <div class="{{ $currentStep != 2 ? 'display-none' : '' }} " id="step-2">

     <div class="row mt-4">

                <div class="col-md-4 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Select ID Type</label><br/>
                            <select wire:model="spouseIdType" class="form-control mt-2 light-grey">
                                <option value="0">--Select an option--</option>
                                <option value="1">US Driver's license</option>
                                <option value="2">State Issued ID </option>
                                <option value="3">None</option>
                            </select>

                        </div>
                    </div>
                </div>
    </div>

      @switch($spouseIdType)

        @case(1)
           <div class="row mt-3">
                <div class="col-md-4 col-sm-8  ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Spouse License Number</label><br/>
                            <input wire:model="spouseIDNo" type="text" class="form-control col-md-4" >

                        </div>
                    </div>
                </div>
            </div>
        @break

        @case(2)
            <div class="row mt-3">
                <div class="col-md-4 col-sm-8  ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Spouse ID Number</label><br/>
                            <input wire:model="spouseIDNo" type="text" placeholder="State Issued Number" class="form-control col-md-4" >

                        </div>
                    </div>
                </div>
            </div>
        @break

    @endswitch



    <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Issuing State </label><br/>
                            <select class="form-control mt-2 light-grey" wire:model="SpouseIssuingState">
                                <option value="3">NY</option>
                            </select>

                        </div>
                    </div>
                </div>
    </div>

    <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Expiration Date</label><br/>
                            <input type="date" class="form-control col-md-4" wire:model="SpouseIDExpirationDate" >

                        </div>
                    </div>
                </div>
    </div>

    <div class="row mt-3">
                <div class="col-md-3 col-sm-8 ml-5">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <label for="">Issue Date</label><br/>
                            <input type="date" class="form-control col-md-4" wire:model="SpouseIDIssueDate">

                        </div>
                    </div>
                </div>
    </div>



      <div class="row">

                <div class="">
                    <div class="rows mr-auro">

                        <div class="d-flex ">

                                <div class="">
                                    <button wire:click="back" class="btn btn-site-primary btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
                                        <span class="pl-1 button_font_small"> Taxpayer Verification</span>
                                    </button>
                                </div>

                            <div class="mr-5">
                                <button wire:click="submitSpouseIdVerification" class="btn btn-outline-secondary btn-site-primary color-text-white my-5 mx-5 ml-5">
                                    <span class="pl-3 button_font_small"> Payment for our services  <i class="fas fa-arrow-right button_font_small"></i></span>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
    </div>
    {{-- End Step 2 --}}








</div>
