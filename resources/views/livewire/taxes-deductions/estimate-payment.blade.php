<div>

    <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            @include('livewire.taxes-deductions.taxes-header')
        </div>
      </div>

    {{-- Section 1 --}}
    <div class="{{ $currentStep != 2 ? 'display-none' : '' }} " id="step-1">

        {{-- <div class="row mb-3">
                    <div class="col-md-8 text-info">
                    <span>
                    <i class="fa fa-regular fa-circle-info "></i>
                    Have you made any estimated tax payments?
                    </div>
         </div> --}}

        <div class="row mt-3">
            <div class="col-md-7 ml-5">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">Have you made any estimated tax payments?
                            @error('DidYouMakeEstimatedTaxPayment')<span class="error">*</span> @enderror
                        </label><br/>
                   <input type="radio" wire:model="DidYouMakeEstimatedTaxPayment"  class="btn-check form-check-input " name="DidYouMakeEstimatedTaxPayment" id="DidYouMakeEstimatedTaxPaymentYes"  value='yes' >
                        <label  class="btn btn-outline-secondary mr-3 btn-site-primary"
                        for="DidYouMakeEstimatedTaxPaymentYes">Yes</label>

                        <input wire:model="DidYouMakeEstimatedTaxPayment" type="radio" class="btn-check form-check-input" name="DidYouMakeEstimatedTaxPayment" id="DidYouMakeEstimatedTaxPaymentNo"   value='no'>
                        <label  class="btn btn-outline-secondary btn-site-primary"
                        for="DidYouMakeEstimatedTaxPaymentNo">No</label>
                </div>
            </div>
        </div>

        @if($DidYouMakeEstimatedTaxPayment === 'yes')
        <div class="row mt-3">
            <div class="col-md-3 ml-5">
                <div class="form-group light-grey">
                    <label class="mb-2" for="">How many payments did you make?
                            @error('DidYouMakeEstimatedTaxPayment')<span class="error">*</span> @enderror
                        </label><br/>
                    <input type="number" class="form-control" wire:model="NumberOfPayments" name="">
                </div>
            </div>
        </div>
       

        <div class="row">
            
            <div class="col-md-8">
                   @for($i=0; $i < $NumberOfPayments; $i++)

                    <div class="row mt-3">
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label for="">Payment Date @error('PaymentDate')<span class="error">*</span> @enderror</label><br>
                                    <input wire:model="PaymentDate.{{$i}}" type="date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label for="">Amount @error('AmountForPaymentDateOne')<span class="error">*</span> @enderror</label><br>
                                    <input wire:model="PaymentAmount.{{$i}}" type="text" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>

                @endfor

         @endif

           <div class="row mt-3">
                <div class="col-md-4 ml-5">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">How many payments did you receive?
                                @error('DidYouMakeEstimatedTaxPayment')<span class="error">*</span> @enderror
                            </label><br/>
                        <input type="number" class="form-control" wire:model="NumberOfPaymentsReceived" name="">
                    </div>
                </div>
           </div>

           @for($i=0; $i < $NumberOfPaymentsReceived; $i++)

                    <div class="row mt-3">
                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label for="">Payment Date @error('PaymentDate')<span class="error">*</span> @enderror</label><br>
                                    <input wire:model="DateReceived.{{$i}}" type="date" class="form-control">

                                    <input wire:model="outflow" type="hidden" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 ml-5">
                            <div class="form-group">
                                <div class="form-group light-grey">
                                    <label for="">Amount @error('AmountForPaymentDateOne')<span class="error">*</span> @enderror</label><br>
                                    <input wire:model="AmountReceived.{{$i}}" type="text" class="form-control col-md-2">

                                    <input wire:model="inflow" type="hidden" class="form-control col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>

                @endfor


            </div>

            <div class="col-md-4">
                @if(!empty($showData))
                  <ul class="list-group">
                   <h6> Payments</h6> 
                  @foreach($showData as $data)
                    <li class="list-group-item light-grey">
                        @if($data->type == 'inflow')
                         Payment Received <br/>

                         @else
                          Payment Made <br/>
                       @endif 
                        {{ \Carbon\Carbon::parse($data->payment_date)->format('d/J/Y')}}  | Amount:  {{$data->amount}} 
                       
                    </li>
                  @endforeach
                  </ul>
                @endif  
            </div>


        </div>
       

        <br><br>


        <div class="row mt-5">
            <div class="button-flex">
                <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                    <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Tax Filing</span>
                </button>

                 <button type="button" wire:click='submitEstimatePayment' class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                    <span class="pl-3 button_font_small">Stimulus <i class="fas fa-arrow-right button_font_small"></i></span>
                </button>
            </div>
        </div>


    </div>
     {{-- End Section 1 --}}


</div>
