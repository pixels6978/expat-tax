<div style="padding-right: 0px;">

    <div class="row mt-2">
        <div class="row stepwizard">
            <div class="col-md-12 ">
                <nav style="--bs-breadcrumb-divider: '>'; padding-top: 15px;" aria-label="breadcrumb">
                    <ol class="breadcrumb cs-breadcrumbs">

                        <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                            <a class="light-grey" href="#">Filing Questions </a></li>
                        @if(session()->get('filingMode') == 'multiple')
                        <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
                            <a class="light-grey" href="#">Streamlined procedure</a></li>
                        @endif
                        <li wire:click="moveToTab(3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}"><a
                                class="light-grey" href="#">General questions</a></li>

                    </ol>
                </nav>
            </div>
        </div>


    </div>
    {{-- Section 2 --}}
    <div class="{{ $currentStep != 1 ? 'display-none' : '' }} " id="step-1">
        <div>
            <div class="row">


                @switch($currentView)

                @case('general-question')
                <div class="col-md-12 ml-5">


                     <div class="form-group mt-4">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Are you a returning client? 
                            @error('ReturningClient') <span class="error text-danger">*</span> @enderror
                        </label><br />

                        <input wire:model="ReturningClient" type="radio" class="btn-check"
                            id="btn-check-1-returningclient" autocomplete="off" name="returningclient" value="yes"
                            onchange="">
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="btn-check-1-returningclient">Yes</label>

                        <input wire:model="ReturningClient" type="radio" class="btn-check"
                            id="btn-check-2-returningclient" autocomplete="off" name="returningclient" value="no"
                            onchange="">
                        <label class="btn btn-outline-secondary btn-site-primary mr-3"
                            for="btn-check-2-returningclient">No</label>

                    </div>
                </div>

                @if($ReturningClient === 'yes')
                <div class="form-group mt-4">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Have you filed a US tax return previously? *</label><br />

                        <input wire:model="FiledPreviousUSTax" type="radio" class="btn-check"
                            id="btn-checkpreviousustaxyes" autocomplete="off" name="filedustax" value="yes" onchange="">
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="btn-checkpreviousustaxyes">Yes</label>

                        <input wire:model="FiledPreviousUSTax" type="radio" class="btn-check"
                            id="btn-checkpreviousustaxno" autocomplete="off" name="filedustax" value="no" onchange="">
                        <label class="btn btn-outline-secondary btn-site-primary mr-3"
                            for="btn-checkpreviousustaxno">No</label>

                    </div>
                </div> 
   

                @endif

              
                @if($ReturningClient == 'yes' && $FiledPreviousUSTax == 'yes')

                         <div class="row mt-3" id="no_amended_returns1">
                    <div class="col-md-12 ml-5">
                        <div class="form-group">
                            <div class="form-group light-grey">
                                <label for="">Upload a copy of your last filed US tax return 
                                    @error('UploadPreviousUSTax') <span class="error text-danger">*</span> @enderror
                                </label> <span class="pl-3">

                                </span><br />

                                <div class="form-group mt-3">
                                    @if (!empty($UploadedPreviousUSTax) && $FiledPreviousUSTax === 'yes')
                                        <div>
                                            <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i>
                                            <a target="_blank" href="{{$UploadedPreviousUSTax }}">View File</a></span>
                                            <span wire:click="deleteFileReturn('{{$UploadedPreviousUSTax }}','tax')" 
                                                    style="border-radius:10px; border:1px solid #ccc; font-size: 13px; cursor:pointer;" class="error">
                                                     <i class="fa fa-trash ml-4"></i>
                                            </span>
                                        </div>
                                    @endif

                                    <div class="file btn btn-secondary cs-file-upload">
                                        
                                        <span class="spinner-border text-light" wire:loading wire:target="UploadPreviousUSTax">
                                                <span class="visually-hidden">Loading...</span>
                                                </span>
                                               
                                                @if(!empty($UploadPreviousUSTax) && $FiledPreviousUSTax === 'yes') 
                                                   <i  class="fa fa-check "></i> {{ $UploadPreviousUSTax->getClientOriginalName() }} Uploaded 
                                                   @else  <i class="fa fa-upload mr-4"></i> Last Filed US TAX return.pdf
                                                   @endif
                                        <input wire:model="UploadPreviousUSTax" type="file"  />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endif
                



                <div class="form-group mt-4">
                        <div class="form-group light-grey">
                            <label class="mb-2" for="">Are you filing amended returns ? @error('AmendedReturns') <span
                                    class="error text-danger">*</span> @enderror</label><br />

                            <input wire:model="AmendedReturns" type="radio" class="btn-check" id="btn-AmendedReturnsYes"
                                autocomplete="off" name="AmendedReturns" value="yes" onchange="">
                            <label wire:click="$emit('ToggleAmendedReturns','yes')"
                                class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="btn-AmendedReturnsYes">Yes</label>

                            <input wire:model="AmendedReturns" type="radio" class="btn-check" id="btn-AmendedReturnsNo"
                                autocomplete="off" name="AmendedReturns" value="no" onchange="">
                            <label wire:click="$emit('ToggleAmendedReturns','no')"
                                class="btn btn-outline-secondary btn-site-primary mr-3"
                                for="btn-AmendedReturnsNo">No</label>

                        </div>
                    </div>

                     @if($AmendedReturns === 'yes')
                    <div class="row mt-3" id="no_amended_returns">
                        <div class="col-md-12 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label for="">Provide original returns and supporting documentation
                                        @error('SupportingDocument') <span class="error text-danger">*</span> @enderror

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 ">
                        <div class="form-group light-grey">
                            <label class="mb-2" for="">Amount of forms uploaded 
                            <span class="spinner-border text-dark" 
                                        wire:loading wire:target="SupportingDocument">
                                        <span class="visually-hidden">Loading...</span>
                                        </span>
                            </label><br />
                            @foreach ($uploadedAmendedReturnFiles as $uploadedAmendedReturnFile)
                               <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i>
                               <a target="_blank" href="{{$uploadedAmendedReturnFile }}">View File</a></span>
                               <span wire:click="deleteFileReturn('{{$uploadedAmendedReturnFile}}','amended')" 
                                                    style="border-radius:10px; border:1px solid #ccc; font-size: 13px; cursor:pointer;" class="error">
                                                     <i class="fa fa-trash ml-4"></i>
                                                  </span>
                            @endforeach
                          
                            <div class="row">
                                <div class="col-md-4">
                                    <select wire:model="NumberofFormsToUpload" class="form-control">
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
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3" id="">
                        <div class="col-md-12 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">

                                    @for($i=0; $i < $NumberofFormsToUpload; $i++) <div class="form-group mt-3">
                                        <div class="file btn btn-secondary cs-file-upload">
                                             File_Upload.pdf
                                            
                                            <input wire:model="SupportingDocument" type="file" multiple name="file[]" />
                                        </div>
                                </div>
                                @endfor


                            </div>
                        </div>
                    </div>
                </div>


                @endif


                    <div class="form-group mt-4">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Did you file an extension for your tax return?
                            @error('FiledExtention') <span class="error text-danger">*</span> @enderror
                        </label><br />

                        <input wire:model="FiledExtention" type="radio" class="btn-check" id="btn-check-1-extension"
                            autocomplete="off" name="filedextention" value="yes" onchange="">
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="btn-check-1-extension">Yes</label>

                        <input wire:model="FiledExtention" type="radio" class="btn-check" id="btn-check-2-extension"
                            autocomplete="off" name="filedextention" value="no" onchange="">
                        <label class="btn btn-outline-secondary btn-site-primary mr-3"
                            for="btn-check-2-extension">No</label>

                    </div>
                </div>

                 @if($FiledExtention === 'yes')
                <div class="row mb-3 mt-3 light-grey">
                    <label for="">What is the extended due date for your return? *</label><br />
                    <div class="form-group col-md-3 light-grey">

                        <input wire:model="SpecifyExtendedDate" type="date" class="form-control col-md-2 mt-2">
                    </div>
                </div>
                @endif


                <div class="form-group mt-4">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Were you claimed as a dependant on anyone else's tax return ?
                            @error('ClaimedasDependent') <span class="error text-danger">*</span> @enderror
                        </label><br />

                        <input type="radio" class="btn-check" id="btn-check-1-dpclaims" wire:model="ClaimedasDependent"
                            autocomplete="off" name="ClaimedasDependent" value="yes" onchange="">
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="btn-check-1-dpclaims">Yes</label>

                        <input wire:model="ClaimedasDependent" type="radio" class="btn-check" id="btn-check-2-dpclaims"
                            autocomplete="off" name="ClaimedasDependent" value="no" onchange="">
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="btn-check-2-dpclaims">No</label>

                    </div>
                </div>



                    <div class="row mt-4">
                        <div class="col-md-12 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label class="mb-2" for="">Do you want to file Corporate or Partnership returns in
                                        addition to your individual return?
                                        @error('CorporateOrPartnerTax') <span class="error text-danger">*</span>
                                        @enderror
                                    </label><br />

                                    <input wire:model="CorporateOrPartnerTax" type="radio" class="btn-check"
                                        id="btn-corp-p1" autocomplete="off" name="Year" value="yes">
                                    <label class="btn btn-outline-secondary btn-site-primary mr-3"
                                        for="btn-corp-p1">Yes</label>

                                    <input wire:model="CorporateOrPartnerTax" type="radio" class="btn-check"
                                        id="btn-corp-p2" autocomplete="off" name="Year" value="no">
                                    <label class="btn btn-outline-secondary btn-site-primary mr-3"
                                        for="btn-corp-p2">No</label>

                                </div>
                            </div>
                        </div>
                    </div>

                    @if($CorporateOrPartnerTax === 'yes')
                    <div class="form-group mt-4">
                        <div class="form-group light-grey">
                            <div class="row">
                                <label class="mb-2" for="">Please choose the type of return you wish to
                                    file</label><br />
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input @if($partnership == 1) checked @endif class="form-check-input" type="checkbox" value="1" id="partnership" wire:model='partnership'>
                                        <label class="form-check-label" for="partnership">Partnership 1065 Form {{ $partnership}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input selected wire:model='ccorporation' class="form-check-input" type="checkbox" value="1" id="ccorporation">
                                        <label class="form-check-label" for="ccorporation">
                                            C-Corporation
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input  wire:model='scorporation' class="form-check-input" type="checkbox" value="1" id="scorporation">
                                        <label class="form-check-label" for="scorporation">
                                            S-corporation 1120S Form
                                        </label>
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input  wire:model='foreignCorporation' class="form-check-input" type="checkbox" value="1" id="foreignCorporation">
                                        <label class="form-check-label" for="foreignCorporation">
                                            Foreign Corporation 1120F
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input  wire:model='notProfit' class="form-check-input" type="checkbox" value="1" id="notProfit">
                                        <label class="form-check-label" for="notProfit">
                                            Not-for-profit 990
                                        </label>
                                    </div>


                                </div>

                            </div>


                        </div>
                    </div>
                    @endif


                    

                   


                @if($CorporateOrPartnerTax === 'yes')

                @endif

  


               

                











                <!--    <div class="form-group light-grey mt-4">
                                                                    <label for="">Have you filed a US tax return previously? *</label><br/>

                                                                    <input type="radio" class="btn-check" id="btn-previous-tax-return-yes" autocomplete="off" name="US_Previous_Tax_Return" value="yes">
                                                                    <label class="btn btn-outline-secondary btn-site-primary mr-3" for="btn-previous-tax-return-yes">Yes</label>

                                                                    <input type="radio" class="btn-check" id="btn-previous-tax-return-no" autocomplete="off" name="US_Previous_Tax_Return" value="no">
                                                                    <label class="btn btn-outline-secondary btn-site-primary mr-3" for="btn-previous-tax-return-no">No</label>

                                                                </div> -->


                <div class="row mt-5">
                    <div class="col-md-6 offset-md-6">
                        <div class="row mr-auro">
                            <div class="mr-5 button_font_small">
                                <button wire:click="submitSectionOne" type="button"
                                    class="btn mr-3 btn-outline-secondary btn-site-primary color-text-white mb-5 mt-5 button_font_small">
                                    <span class="spinner-border text-secondary" wire:loading wire:target="submitSectionOne">
                                    <span class="visually-hidden">Loading...</span>
                                    </span> 
                                   <span wire:loading.remove> Streamlined procedure <i class="fas fa-arrow-right button_font_small"></i> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            @break

            @case('personal-info')
            @livewire('generalinfo.personal-information')
            @break


            @endswitch





        </div>


    </div>
</div>
{{-- End Section 1 --}}


















{{-- Section 2 --}}
<div class="{{ $currentStep != 2 ? 'display-none' : '' }} " id="step-2">

    <div class="row">
        <div class="col-md-8 text-info">
            <span>
                <i class="fa fa-regular fa-circle-info "></i>

                The Streamline Offshore Program as a means of allowing taxpayers to make up for their filing delinquency
                and become compliant. This program was further developed over the next few years. It includes filing
                three years back of delinquent tax returns and six years of Fbars. One must also sign a certification of
                non-willful conduct. Entering into this program allows taxpayers to come clean without having to pay any
                penalties for delinquency or late filing of past returns or Fbars. </span>
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="form-group col-md-6 light-grey">
            <label class="mb-2" for="">Are you filing streamlined?
                @error('StreamLinedFile') <span class="error text-danger">*</span> @enderror
            </label><br />

            <input type="radio" class="btn-check" id="btn-corp-pstreamline1" wire:model="StreamLinedFile"
                name="streamline" value="yes">
            <label class="btn btn-outline-secondary btn-site-primary mr-3" for="btn-corp-pstreamline1">Yes</label>

            <input wire:model="StreamLinedFile" type="radio" class="btn-check" id="btn-corp-pstreamline2"
                name="streamline" value="no">
            <label class="btn btn-outline-secondary btn-site-primary mr-3" for="btn-corp-pstreamline2">No</label>




        </div>
    </div>

    @if($StreamLinedFile === 'yes')
    <div class="row mb-3 mt-3">
        <div class="form-group col-md-7 light-grey">
            <label class="mb-2" for="">Complete the Non-willful Failure to File Explanation Wording *
                @error('NonWillfulWording') <span class="error text-danger">*</span> @enderror
            </label><br />
            <textarea wire:model="NonWillfulWording" rows="3" class="form-control "></textarea>


        </div>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-md-10 offset-md-2">
            <div class="row mr-auro">
                <div class="mr-5 button_font_small">

                    <button wire:click="$emit('back', 4 )"
                        class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5"><i
                            class="fas fa-arrow-left button_font_small"></i>
                        <span class="pl-1 button_font_small">Filing Questions</span>
                    </button>

                    <button wire:click="submitStreamline" type="button"
                        class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white mb-5 mt-5 button_font_small">
                        General Question <i class="fas fa-arrow-right button_font_small"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
{{-- End Section 2 --}}

{{-- Section 3 --}}
<div class="{{ $currentStep != 3 ? 'display-none' : '' }} " id="step-3">
    <div class="row">
        <div class="col-md-7 text-info">
            <span>
                <i class="fa fa-regular fa-circle-info "></i>

                To increase ID safety the IRS sometimes issues IP Pins to individuals to be used on the tax return. Once
                a pin has been issued the tax return cannot be efiled without it.</span>
        </div>
    </div>


    <div class="row mb-3 mt-3">
        <div class="form-group col-md-4 light-grey">
            <label for="">Date immigrated from the U.S?
                @error('ImmigrationDate') <span class="error text-danger">*</span> @enderror
            </label><br />
            <div class="row">
                <div class="col-md-7">
                    <input wire:model="ImmigrationDate" type="date" class="form-control col-md-2 mt-2">
                </div>
            </div>
        </div>
    </div>


    <div class="form-group mt-4">
        <div class="form-group light-grey">
            <label class="mb-2" for="">Were you living out of the US as of April 15th ? @error('LivingInUS') <span
                    class="error text-danger">*</span> @enderror</label><br />

            <input wire:model="LivingInUS" type="radio" class="btn-check" id="btn-check-1-outlined" name="LivingUS"
                value="yes" onchange="">
            <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="btn-check-1-outlined">Yes</label>

            <input wire:model="LivingInUS" type="radio" class="btn-check" id="btn-check-2-outlined" name="LivingUS"
                value="no" onchange="">
            <label class="btn btn-outline-secondary btn-site-primary mr-3" for="btn-check-2-outlined">No</label>

        </div>
    </div>


    <div class="form-group mt-4">
        <div class="form-group light-grey">
            <label class="mb-2" for="">Have you received an IP PIN from the IRS? @error('IPPIN') <span
                    class="error text-danger">*</span> @enderror</label><br />

            <input wire:model="IPPIN" type="radio" class="btn-check" id="btn-IPPIN-1-outlined" autocomplete="off"
                name="IPPIN" value="yes" onchange="">
            <label class="btn btn-outline-secondary mr-3 btn-site-primary" wire:click="$emit('SetPINStatus', 'yes' )"
                for="btn-IPPIN-1-outlined">Yes</label>

            <input wire:model="IPPIN" type="radio" class="btn-check" id="btn-IPPIN-2-outlined" autocomplete="off"
                name="IPPIN" value="no" onchange="">
            <label wire:click="$emit('SetPINStatus', 'no' )" class="btn btn-outline-secondary btn-site-primary mr-3"
                for="btn-IPPIN-2-outlined">No</label>

        </div>
    </div>

    @if($addIPPIN == 'yes')
    <div class="col-md-7 ml-5 mt-4 mb-2">
        <div class="form-group">
            <div class="form-group light-grey">
                <label class="mb-2" for="">Please enter your IP PIN *</label><br />

                <input wire:model="ProvidePIN" type="text" class="form-control" id="btn-retuning-client-yes"
                    autocomplete="off" name="" value="">
                <div class="text-grey mt-2"></div>

            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <div class="form-group light-grey">
            <label class="mb-2" for="">
                Cant find IP PIN?
            </label><br />

            <input wire:model="CantFindPIN" type="radio" class="btn-check" id="btn-CantFindPIN" name="CantFindPIN"
                value="yes" onchange="">
            <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="btn-CantFindPIN">Yes</label>



        </div>
    </div>


    @endif


    <div class="row">

        <div class=" offset-md-4">
            <div class="rows mr-auro">

                <div class="d-flex ">

                    <div class="">
                        <button wire:click="$emit('back', 4 )"
                            class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5"><i
                                class="fas fa-arrow-left button_font_small"></i>
                            <span class="pl-1 button_font_small"> Streamlined procedure</span>
                        </button>
                    </div>

                    <div class="mr-5">
                        <button wire:click="submitGeneralQuestion"
                            class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5">
                            <span class="pl-3 button_font_small"> Personal Infomation <i
                                    class="fas fa-arrow-right button_font_small"></i></span>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
{{-- End Section 3 --}}




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

    @this.on('fileUploadedSuccessfully', () => {
    //    toastr.success("Hello World!");
    Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'File uploaded',
              showConfirmButton: false,
              timer: 3500,
              toast:true
        });
    });

    @this.on('unableToUploadFile', () => {
    //    toastr.success("Hello World!");
    Swal.fire({
              position: 'top-end',
              icon: 'error',
              title: 'File upload failed',
              showConfirmButton: false,
              timer: 3500,
              toast:true
        });
    });

    @this.on('recordAdded', () => {
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
