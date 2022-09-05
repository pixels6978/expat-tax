<div>
    <div class="row mt-4">
        <div class="row mt-4 stepwizard">
            <div class="col-md-12 ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb cs-breadcrumbs">

                        <li class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">Passive Income </a></li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-8">
             <form action="" wire:submit.prevent='submitPassiveIncome'>
        <div class="row mb-3">
            <div class="col-md-8 text-info">
                <span>
                    <i class="fa fa-regular fa-circle-info "></i>
                    Note: the US taxes all worldwide income regardless if taxable in country of residence
                </span>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-group">
                    <label class="mb-2" for="">Please check the box, and upload the documents for each of the following documents you have:</label>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="yes" wire:model="flexCheckDefault">
                    <label class="form-check-label @error('flexCheckDefault') error @enderror " for="flexCheckDefault">
                        I have removed any passwords if any documents were password protected.
                     @error('flexCheckDefault') <span class="error text-danger">*</span> @enderror   
                    </label>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="Have1099Forms" value="yes" id="Have1099Forms">
                    <label class="form-check-label" for="Have1099Forms">1099 forms   
                        @error('DocumentFor1099') <span class="error text-danger">*</span> @enderror 
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentFor1099">
                         <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($Have1099Forms == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of 1099 forms to uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadFor1099" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadFor1099; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentFor1099[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                              <span class="spinner-border text-dark" wire:loading wire:target="DocumentFor1099[$i]">
                                                <span class="visually-hidden">Loading...</span>
                                               </span>
                                              @if(!empty($DocumentFor1099[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentFor1099[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>

                                                @else  <i class="fa fa-upload mr-4"></i> Upload Your 1099 Forms 
                                              @endif
                                                
                                            <input  wire:model="DocumentFor1099" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>

                </div>
            @endif

        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveInterest" value="yes" id="HaveInterest">
                    <label class="form-check-label" for="HaveInterest">Interest 
                        @error('DocumentForInterest')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForInterest">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveInterest == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                                
                            </label>

                            <select wire:model="NumberofFormsToUploadForInterest" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForInterest; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForInterest[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                                
                                              @if(!empty($DocumentForInterest[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForInterest[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Interest Forms 
                                              @endif
                                            <input wire:model="DocumentForInterest" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveDividends" value="yes" id="HaveDividends">
                    <label class="form-check-label" for="HaveDividends">Dividends
                        @error('DocumentForDividends')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForDividends">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveDividends == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForDividends" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForDividends; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForDividends[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                                @if(!empty($DocumentForDividends[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForDividends[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Dividends (PDF Format)
                                              @endif
                                            <input wire:model="DocumentForDividends" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>

        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveCapitalGains" value="yes" id="HaveCapitalGains">
                    <label class="form-check-label" for="HaveCapitalGains">Capital Gains
                        @error('DocumentForCapitalGains')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForCapitalGains">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveCapitalGains == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForCapitalGains" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForCapitalGains; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForCapitalGains[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                                @if(!empty($DocumentForCapitalGains[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForCapitalGains[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Capital Gain Forms (PDF Format)
                                              @endif
                                                
                                            <input wire:model="DocumentForCapitalGains" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>




        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveRoyalties" value="yes" id="HaveRoyalties">
                    <label class="form-check-label" for="HaveRoyalties">Royalties
                        @error('DocumentForRoyalties')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForRoyalties">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveRoyalties == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForRoyalties" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForRoyalties; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForRoyalties[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                               @if(!empty($DocumentForRoyalties[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForRoyalties[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Forms (Royalties - PDF Format)
                                              @endif
                                            <input wire:model="DocumentForRoyalties" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HavePensionPayments" value="yes" id="HavePensionPayments">
                    <label class="form-check-label" for="HavePensionPayments">Pension Payments
                        @error('DocumentForPensionPayments')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForPensionPayments">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HavePensionPayments == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForPensionPayments" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForPensionPayments; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForPensionPayments[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                                @if(!empty($DocumentForPensionPayments[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForPensionPayments[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Your Pension Payments (PDF Format) 
                                              @endif
                                            <input wire:model="DocumentForPensionPayments" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>




        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveSocialSecurity" value="yes" id="HaveSocialSecurity">
                    <label class="form-check-label" for="HaveSocialSecurity">Social Security Payments

                        @error('DocumentForSocialSecurity')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForSocialSecurity">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveSocialSecurity == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForSocialSecurity" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForSocialSecurity; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForSocialSecurity[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                               @if(!empty($DocumentForSocialSecurity[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForSocialSecurity[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Your SS Payments (PDF Format) 
                                              @endif
                                            <input wire:model="DocumentForSocialSecurity" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveK1s" value="yes" id="HaveK1s">
                    <label class="form-check-label" for="HaveK1s">K-1s
                        @error('DocumentForK1s')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForK1s">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveK1s == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForK1s" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForK1s; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForK1s[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                              @if(!empty($DocumentForK1s[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForK1s[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload K1 Forms 
                                              @endif
                                            <input wire:model="DocumentForK1s" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>


        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="Have1042S" value="yes" id="Have1042S">
                    <label class="form-check-label" for="Have1042S">1042S
                        @error('DocumentFor1042S')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentFor1042S">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($Have1042S == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadFor1042S" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadFor1042S; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentFor1042S[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                               @if(!empty($DocumentFor1042S[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentFor1042S[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload 10242s Forms (PDF Format)
                                              @endif
                                            <input wire:model="DocumentFor1042S" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>


        <div class="row mt-3">
            {{-- <div class="row mb-3"> --}}
                <div class="col-md-8 text-info">
                    <span>
                        <i class="fa fa-regular fa-circle-info "></i>
                        At any time in the tax year, did you receive, sell, send, exchange, or otherwise acquire anyfinancial interest in any virtual currency?”
                        Per the IRS, you do not need to check yes if all thatyou did was purchase with no exits or exchanges. Please check if the answer is Yes
                    </span>
                    <br>
                </div>
            {{-- </div> --}}
            <div class="col-md-8 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveCryptoCurrency" value="yes" >
                    <label class="form-check-label" for="HaveCryptoCurrency">Crypto Currency
                    </label>
                </div>

                @if ($HaveCryptoCurrency=='yes')
                    <div class="row mt-3">
                        <div class="col-md- ml-5">
                            <div class="form-group">
                                <label class="mb-2" for="">CAPITAL GAINS AND LOSSES</label>
                            </div>
                        </div>
                    </div>

                    <div class="row text-info">
                        <div class="col-md- ml-5">
                            <span>
                                {{-- <i class="fa fa-regular fa-circle-info "></i> --}}
                                <div class="mt-3">A. Converting crypto to any fiat currency (USD or ILS etc.) </div>
                                <div class="mt-3">B. Exchanging one crypto currency for another. For example, using Bitcoin to purchaseEthereum or to purchase tokens. For tax purposes, you just sold one and bought theother. </div>
                                <div class="mt-3">C. Spending your crypto on goods or services. The fair market value is your exit (proceeds)price. Avoid small purchases to avoid excessive reporting.</div>
                            </span>
                        </div>
                        <br>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md- ml-5">
                            <div class="form-group">
                                <label class="mb-2" for=""><strong>What data do I need?</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-">
                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-8 col-form-label">a. Cost basis – how much did you pay or exchange to acquire the crypto?</label>
                                <div class="col-sm-4">
                                    <input wire:model="CryptoCost" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md- ml-5">
                                <div class="form-group">
                                    <label class="mb-2" for="">b. Date acquired and date sold. More than one year held is reported as long term andotherwise short term.</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row mt-2  light-gre">
                                <label for="" class="col-sm-4 col-form-label">Date Acquired</label>
                                <div class="col-sm-6">
                                    <input wire:model="DateCryptoAcquired" type="date" class="form-control col-md-2">
                                    @error('DateCryptoAcquired') * @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-4 col-form-label">Date Sold</label>
                                <div class="col-sm-6">
                                    <input wire:model="DateCryptoSold" type="date" class="form-control col-md-2">
                                    @error('DateCryptoSold')<span class="error">Date must be after date aquired @enderror</span> 
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-6 col-form-label">c. Proceeds – value in USD at the time of exit</label>
                                <div class="col-sm-4">
                                    <input wire:model="Proceeds" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="row text-info">
                            <div class="col-md- ml-5">
                                <span>
                                    <i class="fa fa-regular fa-circle-info "></i>
                                    TIP – If you have more than a few transactions then the bookkeeping can quickly become overwhelming. Use an application such as cryptotaxcalculator.io or bitcoin.tax.
                                </span>
                            </div>
                            <br>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md- ml-5">
                            <div class="form-group">
                                <label class="mb-2" for="">
                                    REGULAR INCOME <br>

                                    These transactions are considered regular income: <br>
                                    a. Mining <br>
                                    b. Staking <br>
                                    c. Airdrops <br>
                                    d. Payments for goods or services

                                </label>

                            </div>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md- ml-5">
                            <div class="form-group">
                                <label class="mb-2" for=""><strong>What data do I need?</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-">
                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-12 col-form-label">a. Date of transaction and value (for cost basis and purchase date)</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row mt-2  light-gre">
                                <label for="" class="col-sm-4 col-form-label">Date of transaction</label>
                                <div class="col-sm-6">
                                    <input wire:model="TransactionDate" type="date" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-4 col-form-label">Value</label>
                                <div class="col-sm-6">
                                    <input wire:model="TransactionValue" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-5 col-form-label">b.The value is also your income</label>
                                <div class="col-sm-6">
                                    <input wire:model="ValueIsAlsoIncome" type="number" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row mt-4  light-gre">
                                <label for="" class="col-sm-12 col-form-label">c. Expenses (if you are engaged in self-employment)</label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <input wire:model="Expenses" type="number" class="form-control col-md-2">
                            </div>

                            <div class="col-md-2" style="display: flex; align-items:flex-end">
                                <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addExpense()">
                                    <i class="fas fa-plus" aria-hidden="true"></i> </button>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                 <ul class="list-group">
                                    @foreach($ExpenseData as $key => $val)
                                     <li class="list-group-item"> {{ $val }} <span wire:click="deleteArrivalDetails({{$val}})" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   <i class="fa fa-trash"></i>
                                  <span class="visually-hidden">Delete</span></li>
                                    @endforeach
                                 </ul>
                                 
                            </div>

                            </div>

                        </div>

                       
                        

                    </div>

                @endif
             </div>
        </div>



        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="HaveOthers" value="yes" id="HaveOthers">
                    <label class="form-check-label" for="HaveOthers">Others
                        @error('DocumentForOthers')<span class="error">*</span> @enderror
                        <span class="spinner-border text-dark" wire:loading wire:target="DocumentForOthers">
                          <span class="visually-hidden">Loading...</span>
                        </span>
                    </label>
                </div>
            </div>

            @if ($HaveOthers == 'yes')
                <div class="col-md-7 ml-5">
                    <div class="form-check">
                        <div class="mt-2 d-flex">
                            <label  class="light-" for="">Number of forms uploaded
                            </label>

                            <select wire:model="NumberofFormsToUploadForOthers" class="" required>
                                <option value="0">--</option>
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

                        @for($i=0; $i < $NumberofFormsToUploadForOthers; $i++)
                            <div class="col-md-9 ml-5 mt-2">
                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn @if(!empty($DocumentForOthers[$i])) btn-outline-success @else btn-secondary @endif cs-file-upload">
                                                 @if(!empty($DocumentForOthers[$i])) 
                                                <i  class="fa fa-check "></i> {{ $DocumentForOthers[$i]->getClientOriginalName() }} Uploaded 
                                                <span class="badge bg-danger"><i style="cursor: pointer;" class="fa fa-trash"></i></span>
                                                @else  <i class="fa fa-upload mr-4"></i> Upload Interest Forms 
                                              @endif
                                            <input wire:model="DocumentForOthers" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>






        <div class="row mt-5">
            <div class="button-flex">
                <div></div>
                <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Submit Passive Income <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>
    </form>
        </div>

        <div   class="col-md-4 ">
            <table data-bs-spy="scroll" data-bs-offset="0" tabindex="0" style="height: 100px" class="table scrollspy-example">
                <thead>
                    <th class="cols">Type</th> <th class="cols">Doc</th>
                </thead>
           
              @if(isset($incomeFiles))
           
           @foreach($incomeFiles as $data)

                <tr>
                    <td>{{$data->type}}</td> <td><a href="{{$data->path}}">View File</a>   
                                        <span wire:click="deleteFile({{$data->id}})" 
                                            style="border-radius:10px; border:1px solid #ccc; font-size: 13px; cursor:pointer;" class="error">
                                            <i class="fa fa-trash ml-4"></i>
                                          </span> </td>
                </tr>

            @endforeach
           
           @endif
             </table>
        </div>


    </div>
   



</div>



{{-- Pop up for crypo information --}}
<div class="modal fade" id="crypoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body">
            If you are investing in cryptocurrencies then protect your investment by staying in compliance with the tax authorities. The guidelines below are per the IRS. For other tax authorities, please check with your local tax accountant.
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto" data-bs-dismiss="modal">Okay</button>
        </div>
    </div>
    </div>
</div>

<script>
    $('#HaveCryptoCurrency').click(function(){
        if ($('#HaveCryptoCurrency').prop('checked')) {
            $('#crypoModal').modal('show');
        }
    })


    window.livewire.on('show', () => {
        $('#crypoModal').modal('show');
    });
</script>


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
