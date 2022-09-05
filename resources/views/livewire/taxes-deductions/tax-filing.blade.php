<div>

    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
          @include('livewire.taxes-deductions.taxes-header')
        </div>
      </div>

    {{-- Section 1 --}}
    <div class="{{ $currentStep != 1 ? 'display-none' : '' }} " id="step-1">

        <div class="row mb-3">
                    <div class="col-md-8 text-info">
                    <span>
                    <i class="fa fa-regular fa-circle-info "></i>
                    Tuition Payments for yourself or dependents to a US-recognized university, are eligible for the American Opportunity Credit. </span>
                    </div>
         </div>

        @if(session()->get('hasDependent') == 'yes')
        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">Did you pay for tuition for you or any of your dependents?
                            @error('DidYouPayForTuition')<span class="error">*</span> @enderror
                        </label><br/>
                   <input type="radio" wire:model="DidYouPayForTuition"  class="btn-check form-check-input " name="DidYouPayForTuition" id="DidYouPayForTuitionYes"  value='yes' >
                        <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                        for="DidYouPayForTuitionYes">Yes</label>

                        <input wire:model="DidYouPayForTuition" type="radio" class="btn-check form-check-input" name="DidYouPayForTuition" id="DidYouPayForTuitionNo"   value='no'>
                        <label  class="btn btn-outline-secondary btn-site-primary"
                        for="DidYouPayForTuitionNo">No</label>
                </div>
            </div>
        </div>
        @endif


        @if($DidYouPayForTuition === 'yes')
            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">
                            Provide the Tuition payment details (Form 1098-T or the foreign equivalent)
                            </label><br/>

                    </div>
                </div>

            </div>


        <div class="row mt-3" id="">
            <div class="col-md-4 mt-2">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">Amount of forms uploaded  @error('NumberOfFormsUploadedForTuitionPayment')<span class="error">*</span> @enderror</label><br>

                    @if (is_array($UploadedTuition) && count($UploadedTuition) > 0)
                        <div>
                            @foreach ($UploadedTuition as $files )
                            <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$files) }}">{{$files }}</a></span>
                            @endforeach
                        </div>
                    @endif

                    <select wire:model="NumberOfFormsUploadedForTuitionPayment" class="form-control number-of-forms">
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


            @for($i=0; $i < $NumberOfFormsUploadedForTuitionPayment; $i++)
                <div class="col-md-12 ml-5 mt-2">
                    <div class="form-group">
                        <div class="form-group light-grey">
                            <div class="form-group ">
                                <div class="file btn btn-outline-success cs-file-upload">
                                    <i class="fa fa-upload mr-4"></i> Upload Forms
                                <input wire:model="TuitionFiles" type="file"  />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
           </div>
        @endif

        <br><br>



        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">Did you have any student loans which you are paying interest for?
                            @error('DoYouHaveStudenLoan')<span class="error">*</span> @enderror
                        </label><br/>
                   <input type="radio" wire:model="DoYouHaveStudenLoan"  class="btn-check form-check-input " name="DoYouHaveStudenLoan" id="DoYouHaveStudenLoanYes"  value='yes' >
                        <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                        for="DoYouHaveStudenLoanYes">Yes</label>

                        <input wire:model="DoYouHaveStudenLoan" type="radio" class="btn-check form-check-input" name="DoYouHaveStudenLoan" id="DoYouHaveStudenLoanNo"   value='no'>
                        <label  class="btn btn-outline-secondary btn-site-primary"
                        for="DoYouHaveStudenLoanNo">No</label>
                </div>
            </div>
        </div>


        @if($DoYouHaveStudenLoan === 'yes')
            <div class="row mt-3">
                <div class="col-md-7 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">
                            Provide the 1098-E student loan interest
                            </label><br/>

                    </div>
                </div>

            </div>


            <div class="row mt-3" id="">
                <div class="col-md-3 mt-2">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Amount of forms uploaded  @error('NumberOfFormsUploadedForStudentLoanInterest')<span class="error">*</span> @enderror</label><br>

                        @if (is_array($UploadedStudentLoan) && count($UploadedStudentLoan) > 0)
                            <div>
                                @foreach ($UploadedStudentLoan as $files )
                                <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i><a href="{{ storage_path('app/'.$files) }}">{{$files }}</a></span>
                                @endforeach
                            </div>
                        @endif


                        <select wire:model="NumberOfFormsUploadedForStudentLoanInterest" class="form-control">
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


                @for($i=0; $i < $NumberOfFormsUploadedForStudentLoanInterest; $i++)
                    <div class="col-md-12 ml-5 mt-2">
                       <div class="form-group">
                           <div class="form-group light-grey">
                               <div class="form-group ">
                                   <div class="file btn btn-outline-success cs-file-upload">
                                      <i class="fa fa-upload mr-4"></i> Upload Forms
                                   <input wire:model="StudentLoanFiles" type="file"  />
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    @endfor

                   </div>
           </div>
        @endif


        <div class="row mt-5">
            <div class="button-flex">
               <div></div>

                 <button type="button" wire:click='submitTaxFiling' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Estimate and Other Payments <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>


    </div>
     {{-- End Section 1 --}}


</div>
