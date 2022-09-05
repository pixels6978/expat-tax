<div>
     


	 <div class="row mt-4 stepwizard">
        <div class="col-md-12 ">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb cs-breadcrumbs">

                    <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
                        <a class="light-grey" href="#">Business Information </a></li>

                    <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
                        <a class="light-grey" href="#">Income & Expenses</a></li>

                    <li wire:click="moveToTab(3)" class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}"><a
                            class="light-grey" href="#">Cost of Goods Sold</a></li>
                </ol>
            </nav>
        </div>
    </div>

    

	@if ($currentStep == 1)

		@if($businessInfo != null)
		<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
			  <div class="container-fluid">
			   
			    <div class="collapse navbar-collapse" id="navbarNav">
			      <ul class="navbar-nav">
			      	@foreach($businessInfo as $data)

				      
			        <li wire:click="fetchBusinessData({{$data->id}})" class="nav-item">
			          <a class="nav-link" href="#">{{$data->business_names}}</a>
			        </li>
			       
			        @endforeach
			      </ul>
			    </div>
			  </div>
		</nav>
		@endif
                
            <div class="row">
                <div class="col-md-6">
                    <label class="mb-2" for="">Please select country of operation
                        @error('countryChosen')<span class="error">*</span> @enderror
                    </label><br />

                    <select class="form-control" wire:model="countryChosen">
      					@if(isset($countries))
      						@foreach($countries as $country)
      						  <option value="{{ $country->countryname }}">{{ $country->countryname }}</option>  
      						@endforeach
      					@endif
                    </select>

                </div>

            </div>


                   @if($countryChosen == 'Israel')
                <div class="row mt-3">
                    <div class="ml-5">
                        <div class="form-group light-grey">
                            <label class="mb-2" for="">Are you self employed in Israel?
                                @error('selfEmployedinIsrael')<span class="error">*</span> @enderror
                            </label><br />
                            <input type="radio" wire:model="selfEmployedinIsrael" class="btn-check form-check-input "
                                name="selfEmployedinIsrael" id="selfEmployedinIsraelYes" value='yes'>
                            <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="selfEmployedinIsraelYes">Yes</label>

                            <input wire:model="selfEmployedinIsrael" type="radio" class="btn-check form-check-input"
                                name="selfEmployedinIsrael" id="selfEmployedinIsraelNo" value='no'>
                            <label class="btn btn-outline-secondary btn-site-primary" for="selfEmployedinIsraelNo">No</label>
                        </div>


                        @if($selfEmployedinIsrael == 'yes')
                                    <div class="row mt-5">
                                        <div class="col-md-7 ml-5">
                                            <div class="form-group light-grey">
                                                <label class="mb-2" for="">
                                                    Upload your Doch Revach v'Hefsed
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="mt-2">
                                    <div class="col-md-4 mt-2">
                                        <div class="form-group light-grey">
                                            <label class="mb-2" for="">Amount of forms to upload  @error('NumberofDochRevachforms')<span class="error">*</span> @enderror</label><br>
                                            <select wire:model="NumberofDochRevachforms" class="form-control">
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

                                @for($i=0; $i < $NumberofDochRevachforms; $i++)
                                <div class="col-md-12 ml-5 mt-2">
                                        <div class="form-group">
                                            <div class="form-group light-grey">
                                                <div class="form-group ">
                                                    <div class="file btn btn-outline-success cs-file-upload">
                                                        <i class="fa fa-upload mr-4"></i> Upload Forms
                                                    <input wire:model="fileForDocRevach" type="file"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            @endfor
                        @endif
                </div>

            @else
                <div class="row mt-4">
                    <div class="form-group light-grey">
                        <label class="mb-2" for="">Are you self employed?
                            @error('selfEmployedinOther')<span class="error">*</span> @enderror
                        </label><br />
                        <input type="radio" wire:model="selfEmployedinOther" class="btn-check form-check-input "
                            name="selfEmployedinOther" id="selfEmployedinOtherYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="selfEmployedinOtherYes">Yes</label>

                        <input wire:model="selfEmployedinOther" type="radio" class="btn-check form-check-input"
                            name="selfEmployedinOther" id="selfEmployedinOtherNo" value='no'>
                        <label class="btn btn-outline-secondary btn-site-primary" for="selfEmployedinOtherNo">No</label>
                    </div>
                </div>

                @if ($selfEmployedinOther == 'yes')
                    <div class="row mt-3">
                            <div class="col-md-12 ml-5">
                                <div class="form-group">
                                        <div class="row mt-2">
                                            <div class="col-md-8">
                                                <label class="mb-2" for="">Business name  @error('BusinessName') <span
                                                    class="error text-danger">*</span> @enderror
                                                </label>

                                                <input  wire:model="BusinessName" type="text" class="form-control" name="">
                                            </div>

                                             <div class="col-md-4">
                                               <button wire:click="resetForm" style="margin-top: 29px !important;" wire:click="" class="btn btn-success mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5"><i class="fas fa-plus button_font_small"></i>
                                              </button>
                                    
   
                                             </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                        <label class="mb-2" for="">Address of business
                                            @error('addressOfBusiness') <span class="error text-danger">*</span>
                                            @enderror
                                        </label>
                                        <input type="text" wire:model="addressOfBusiness" class="form-control business-income-name-input" name="">
                                </div>
                                
                                <div class="mt-3">
                                        <label class="mb-2" for="">Principle business activity
                                            @error('principleBusinessActivity') <span class="error text-danger">*</span>
                                            @enderror
                                        </label>
                                        <input type="text" wire:model="principleBusinessActivity" class="form-control business-income-name-input" name="">
                                </div>

                                <div class="mt-3">
                        <label class="mb-2" for="">Who operates the business?
                            @error('businessOperator') <span class="error text-danger">*</span>
                            @enderror
                        </label><br>
                    <select class="form-control business-income-date-input" wire:model="businessOperator" id="businessOperator">
                        <option value="" selected>---</option>
                        <option value="taxpayer">Taxpayer</option>
                        <option value="spouse">Spouse</option>
                        <option value="joint">Joint</option>
                    </select>
                </div>

                    <div class="mt-3">
                        <label class="mb-2" for="">When was the Business Started?
                            @error('businessStartDate') <span class="error text-danger">*</span>@enderror <br/>
                             @error('businessStartDate') <span class="error text-danger">{{$message}}</span>@enderror
                        </label>
                        <input type="date" wire:model.defer="businessStartDate" class="form-control business-income-date-input" name="">
                    </div>

                    <div class="mt-3">
                        <label class="mb-2" for="">Did you employ any workers to whom you paid wages on a Form 1099?
                            @error('form1099Worker') <span class="error text-danger">*</span>
                            @enderror
                        </label><br>
                        <input type="radio" wire:model="form1099Worker" class="btn-check form-check-input "
                                name="form1099Worker" id="form1099WorkerYes" value='yes'>
                            <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="form1099WorkerYes">Yes</label>

                            <input wire:model="form1099Worker" type="radio" class="btn-check form-check-input"
                                name="form1099Worker" id="form1099WorkerNo" value='no'>
                            <label class="btn btn-outline-secondary btn-site-primary" for="form1099WorkerNo">No</label>
                    </div>

                    @if ($form1099Worker == 'yes')
                        <div class="mt-3">
                            <label class="mb-2" for="">If so, did you or will you file all required Forms 1099?
                                @error('confirmform1099Worker') <span class="error text-danger">*</span>
                                @enderror
                            </label><br>
                            <input type="radio" wire:model="confirmform1099Worker" class="btn-check form-check-input "
                                    name="confirmform1099Worker" id="confirmform1099WorkerYes" value='yes'>
                                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="confirmform1099WorkerYes">Yes</label>

                                <input wire:model="confirmform1099Worker" type="radio" class="btn-check form-check-input"
                                    name="confirmform1099Worker" id="confirmform1099WorkerNo" value='no'>
                                <label class="btn btn-outline-secondary btn-site-primary" for="confirmform1099WorkerNo">No</label>
                        </div>
                    @endif

                    @if($confirmform1099Worker)

                    @endif

                    <div class="mt-3">
                        <label class="mb-2" for="">Do you have other self-employed or 1099-NEC (Previously called 1099-MISC) income?
                            @error('hasSelfEmployedor1099Nec') <span class="error text-danger">*</span>
                            @enderror
                        </label><br>
                        <input type="radio" wire:model="hasSelfEmployedor1099Nec" class="btn-check form-check-input "
                                name="hasSelfEmployedor1099Nec" id="hasSelfEmployedor1099NecYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="hasSelfEmployedor1099NecYes">Yes</label>

                        <input wire:model="hasSelfEmployedor1099Nec" type="radio" class="btn-check form-check-input"
                            name="hasSelfEmployedor1099Nec" id="hasSelfEmployedor1099NecNo" value='no'>
                        <label class="btn btn-outline-secondary btn-site-primary" for="hasSelfEmployedor1099NecNo">No</label>
                    </div>


                    </div>


                    <div class="row ml-4">
                

                @if ($hasSelfEmployedor1099Nec == 'yes')
                            <div class="row mt-3">
                                <div class="col-md-7 ml-5">
                                    <div class="form-group light-grey">
                                        <label class="mb-2" for="">
                                            Upload your 1099-NEC
                                        </label>
                                    </div>
                                </div>

                                @if (!empty($UploadedfileForDocRevach))
                                    <div>
                                        <span><i class="fa fa-file text-primary" style="font-size: 30px; display:inline"></i>
                                        <a target="_blank" href="{{$UploadedfileForDocRevach }}">View File</a></span>
                                        <span wire:click="deleteFile('nec1099')" 
                                            style="border-radius:10px; border:1px solid #ccc; font-size: 13px; cursor:pointer;" class="error">
                                            <i class="fa fa-trash ml-4"></i>
                                          </span>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="form-group light-grey">
                                        <div class="form-group ">
                                            <div class="file btn btn @if(!empty($fileFor1099Nec)) btn-success @else btn-secondary @endif cs-file-upload">
                                                <span class="spinner-border text-dark" wire:loading wire:target="fileFor1099Nec">
                                        <span class="visually-hidden">Loading...</span>
                                        </span>
                                        @if(!empty($fileFor1099Nec)) 
                                                   <i  class="fa fa-check "></i> {{ $fileFor1099Nec->getClientOriginalName() }} Uploaded 
                                                   @else  <i class="fa fa-upload mr-4"></i> Upload Forms
                                            @endif
                                               
                                            <input wire:model="fileFor1099Nec" type="file"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                @if ($countryChosen == 'IL')
                                    <label class="mb-2" for="">Was this income reported on your Doch revach vehefsed?
                                        @error('wasIncomeReportedonTaxReturn') <span class="error text-danger">*</span>
                                        @enderror
                                    </label><br>
                                @else
                                   
                                    @if($hasSelfEmployedor1099Nec == 'yes' ||  session()->get('setForeignTaxStatus') == 'yes')
                                    <label class="mb-2" for="">Was this income from your 1099-NEC reported on your foreign tax return?
                                        @error('wasIncomeReportedonTaxReturn') <span class="error text-danger">*</span>
                                        @enderror
                                    </label><br>
                                    @endif

                                @endif


                                <input type="radio" wire:model="wasIncomeReportedonTaxReturn" class="btn-check form-check-input "
                                name="wasIncomeReportedonTaxReturn" id="wasIncomeReportedonTaxReturnYes" value='yes'>
                                <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                                    for="wasIncomeReportedonTaxReturnYes">Yes</label>

                                <input wire:model="wasIncomeReportedonTaxReturn" type="radio" class="btn-check form-check-input"
                                name="wasIncomeReportedonTaxReturn" id="wasIncomeReportedonTaxReturnNo" value='no'>
                                <label class="btn btn-outline-secondary btn-site-primary" for="wasIncomeReportedonTaxReturnNo">No</label>
                            </div>
                    @endif
                </div>


                @endif
            @endif


            <div class="row">

                    <div class="offset-md-7">
                        <div class="rows mr-auro">

                            <div class="d-flex ">

                              <button wire:click="submitBusinessInformation" class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5">
                                  <span class="spinner-border text-dark" wire:loading wire:target="submitBusinessInformation">
                                    <span class="visually-hidden">Loading...</span>
                                     </span>     
                                    <span wire:loading.remove class="pl-3 button_font_small"> Income & Expense 
                                    <i class="fas fa-arrow-right button_font_small"></i>
                                    </span>
                              </button>

                            </div>

                        </div>

                    </div>

            </div>



	@endif {{-- End Step 1 --}}



	{{-- still controlling view based on which step --}}
	@if($currentStep == 2)

	<h6 class="section-header">
            {{$BusinessName}} INCOME AND EXPENSES
    </h3>

    <div class="row mt-3">
            <form wire:submit.prevent='submitIncomeAndExpenses'>
                <div class="col-md-12 ml-5">
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="mb-2" for="">Tax year @error('taxYear') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            @if($filingMode === 'multiple')
                            	 <select class="form-control">
                                 @foreach($dbFilingYear as $data)
                                 	 <option>{{ $data->year }}</option>
                                 @endforeach
                                 </select>
                            	@else
 								  <input type="text" class="form-control business-income-date-input" wire:model.lazy="taxYear">
                            @endif
                           
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <label class="mb-2" for="">Amount of gross receipts @error('grossReceiptAmount') <span
                                class="error text-danger">*</span> @enderror
                            </label>
                            <input type="number" class="form-control business-income-date-input" wire:model.lazy="grossReceiptAmount">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-9">
                        <div class="text-success">
                            <p>Income and expense amounts should be recorded as per US tax year, January -December 31st.</p>
                        </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="form-group light-grey">
                            <label class="mb-2" for="">Do you have expenses?
                                @error('hasExpenses')<span class="error">*</span> @enderror
                            </label><br />
                            <input type="radio" wire:model.defer="hasExpenses" class="btn-check form-check-input "
                                name="hasExpenses" id="hasExpensesYes" value='yes'>
                            <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                                for="hasExpensesYes">Yes</label>

                            <input wire:model.defer="hasExpenses" type="radio" class="btn-check form-check-input"
                                name="hasExpenses" id="hasExpensesNo" value='no'>
                            <label class="btn btn-outline-secondary btn-site-primary" for="hasExpensesNo">No</label>
                        </div>
                    </div>

                    @if ($hasExpenses == 'yes')
                        <div class="row mt-3">
                            <span><strong>Expenses</strong></span><label for="">Below is a general list of expenses that may be incurred in business.  Please provide expense amounts incurred in direct relation to your business during the tax year. </label>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="advertising" class="col-sm-3 col-form-label">Advertising</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="advertising" type="number" class="form-control" id="advertising">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="vehicleExpenses" class="col-sm-3 col-form-label">Vehicle Expenses</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="vehicleExpenses" type="number" class="form-control" id="vehicleExpenses">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="commissions" class="col-sm-3 col-form-label">Commisssions & Fees</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="commissions" type="number" class="form-control" id="commissions">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="costOfGoodSold" class="col-sm-3 col-form-label">Cost of Goods Sold</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="costOfGoodSold" type="number" class="form-control" id="costOfGoodSold">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="depletion" class="col-sm-3 col-form-label">Depletion</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="depletion" type="number" class="form-control" id="depletion">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="employeeBenefits" class="col-sm-3 col-form-label">Employee Benefits</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="employeeBenefits" type="number" class="form-control" id="employeeBenefits">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="employeeBenefitProgram" class="col-sm-3 col-form-label">Employee Benefits Program</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="employeeBenefitProgram" type="number" class="form-control" id="employeeBenefitProgram">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="Insurance" class="col-sm-3 col-form-label">Insurance</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="Insurance" type="number" class="form-control" id="Insurance">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="selfEmployedHealthInsurance" class="col-sm-3 col-form-label">Self-employed health insurance</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="selfEmployedHealthInsurance" type="number" class="form-control" id="selfEmployedHealthInsurance">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="mortgageInterest" class="col-sm-3 col-form-label">Mortgage interest paid to banks (if appears on Form 1098, please specify and send the form)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="mortgageInterest" type="number" class="form-control" id="mortgageInterest">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="otherInterestPayments" class="col-sm-3 col-form-label">Other interest payments</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="otherInterestPayments" type="number" class="form-control" id="otherInterestPayments">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="legalProfessionalServices" class="col-sm-3 col-form-label">Legal and professional services</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="legalProfessionalServices" type="number" class="form-control" id="legalProfessionalServices">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="officeExpenses" class="col-sm-3 col-form-label">Office expenses</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="officeExpenses" type="number" class="form-control" id="officeExpenses">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="pensionProfitSharing" class="col-sm-3 col-form-label">Pension and profit sharing plans</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="pensionProfitSharing" type="number" class="form-control" id="pensionProfitSharing">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="rentLeaseVehicle" class="col-sm-3 col-form-label">Rent or lease of vehicles</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="rentLeaseVehicle" type="number" class="form-control" id="rentLeaseVehicle">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="rentLeaseMaching" class="col-sm-3 col-form-label">Rent or lease of machinery, equipment</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="rentLeaseMachine" type="number" class="form-control" id="rentLeaseMachine">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="rentLeaseOther" class="col-sm-3 col-form-label">Rental or lease of other items (ex. Land)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="rentLeaseOther" type="number" class="form-control" id="rentLeaseOther">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="repairsMaintenance" class="col-sm-3 col-form-label">Repairs and maintenance</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="repairsMaintenance" type="number" class="form-control" id="repairsMaintenance">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="supplies" class="col-sm-3 col-form-label">Supplies (if not included in cost of goods sold)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="supplies" type="number" class="form-control" id="supplies">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="taxes" class="col-sm-3 col-form-label">Taxes (if reported on a Form 1098, please specify and send)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="taxes" type="number" class="form-control" id="taxes">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="travel" class="col-sm-3 col-form-label">Travel</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="travel" type="number" class="form-control" id="travel">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="meals" class="col-sm-3 col-form-label">Meals (subject to 50% limit)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="meals" type="number" class="form-control" id="meals">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="utilities" class="col-sm-3 col-form-label">Utilities</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="utilities" type="number" class="form-control" id="utilities">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="wagesExpense" class="col-sm-3 col-form-label">Wages expense </label>
                            <div class="col-sm-5">
                            <input wire:model.defer="wagesExpense" type="number" class="form-control" id="wagesExpense">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="otherExpenses" class="col-sm-3 col-form-label">Other expenses (please specify)</label>
                            <div class="col-sm-5">
                            <input wire:model.defer="otherExpenses" type="number" class="form-control" id="otherExpenses">
                            </div>
                        </div>

                    @endif


                </div>


              <div class="row">

                    <div class="offset-md-7">
                        <div class="rows mr-auro">

                            <div class="d-flex ">

                              <button wire:click="submitIncomeAndExpenses" class="btn btn-outline-secondary mr-3 btn-site-primary color-text-white my-5 mx-5 ml-5">
                                  <span class="spinner-border text-dark" wire:loading wire:target="submitBusinessInformation">
                                    <span class="visually-hidden">Loading...</span>
                                     </span>     
                                    <span wire:loading.remove class="pl-3 button_font_small"> Cost of Goods Sold
                                    <i class="fas fa-arrow-right button_font_small"></i>
                                    </span>
                              </button>

                            </div>

                        </div>

                    </div>

            </div>

             </form>
        </div>


	@endif



	{{-- still controlling view based on which step --}}
	@if($currentStep == 3)

		<h6 class="section-header">
            {{$BusinessName}}  COST OF GOODS SOLD
        </h3>

        <div class="row">

           
            <div class="row mt-4">
            <div class="form-group">
                    <label class="mb-2" for=""><strong>Do you have Cost of goods sold?</strong>
                        @error('hasCostOfGoodSold') <span class="error text-danger">*</span>
                        @enderror
                    </label><br>
                    <input type="radio" wire:model="hasCostOfGoodSold" class="btn-check form-check-input "
                            name="hasCostOfGoodSold" id="hasCostOfGoodSoldYes" value='yes'>
                        <label class="btn btn-outline-secondary mr-3 btn-site-primary"
                            for="hasCostOfGoodSoldYes">Yes</label>

                    <input wire:model="hasCostOfGoodSold" type="radio" class="btn-check form-check-input"
                        name="hasCostOfGoodSold" id="hasCostOfGoodSoldNo" value='no'>
                    <label class="btn btn-outline-secondary btn-site-primary" for="hasCostOfGoodSoldNo">No</label>
            </div>
            </div>

            @if ($hasCostOfGoodSold == 'yes')
            <div class="row mt-5">
                    <div class="form-group row mt-3">
                        <label for="closingInventoryValue" class="col-sm-4 col-form-label"><strong>What method do you use to value your closing inventory (cost, lower of cost or market, or other?)</strong></label>
                        <div class="col-sm-8">
                            <textarea wire:model="closingInventoryValue" type="text" class="form-control" id="closingInventoryValue"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="changesToDetermineQuantity" class="col-sm-4 col-form-label"><strong>Was there any changes in determining quantities, costs, or valuations between opening and closing inventory? If so, please explain.</strong></label>
                        <div class="col-sm-8">
                            <textarea wire:model="changesToDetermineQuantity" type="text" class="form-control" id="changesToDetermineQuantity"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="startOfYearInventory" class="col-sm-4 col-form-label"><strong>What was your inventory at the beginning of the year?</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="startOfYearInventory" type="text" class="form-control" id="startOfYearInventory">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="amountSpentOnPurchases" class="col-sm-4 col-form-label"><strong>Please enter the amount you spent on purchases:</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="amountSpentOnPurchases" type="number" class="form-control" id="amountSpentOnPurchases">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="costOfItemsForPersonalUse" class="col-sm-4 col-form-label"><strong>Please enter the cost of items withdrawn for personal use:</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="costOfItemsForPersonalUse" type="number" class="form-control" id="costOfItemsForPersonalUse">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="costOfLabor" class="col-sm-4 col-form-label"><strong>Please enter the cost of labor (excluding amounts paid to yourself):</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="costOfLabor" type="number" class="form-control" id="costOfLabor">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="amountSpentOnMaterials" class="col-sm-4 col-form-label"><strong>Please enter the amount you spent on materials and supplies:</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="amountSpentOnMaterials" type="number" class="form-control" id="amountSpentOnMaterials">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="otherCost" class="col-sm-4 col-form-label"><strong>Please enter other costs:</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="otherCost" type="number" class="form-control" id="otherCost">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="endOfYearInventory" class="col-sm-4 col-form-label"><strong>What was your year-end inventory amount?</strong></label>
                        <div class="col-sm-8">
                            <input wire:model="endOfYearInventory" type="number" class="form-control" id="endOfYearInventory">
                        </div>
                    </div>
            </div>
            @endif



             <div class="row mt-5">
                <div class="button-flex">
                 <button  wire:click="addNewBusiness" class="btn btn-outline-success btn-site-primary color-text-white ml-auto">
                            <span class="pl-3 button_font_small"><i class="fas fa-plus button_font_small"></i> Save and Add New</span>
                        </button>

                </div>
            </div>


            <div class="row">

                    <div class="offset-md-7">
                        <div class="rows mr-auro">

                            <div class="d-flex ">
                              <button wire:click="submitCostOfGoodSold" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                                    <span class="pl-3 button_font_small">Investment & Passive Income <i class="fas fa-arrow-right button_font_small"></i></span>
                              </button>
                            </div>

                        </div>

                    </div>

                </div>



           <!--  <div class="row mt-5">
                <div class="button-flex">
                    <button type="button" wire:click='prevForm' class="btn btn-outline-secondary mr-auto btn-site-primary color-text-white">
                        <span class="pl-3 button_font_small"><i class="fas fa-arrow-left button_font_small"></i> Back</span>
                    </button>

                    <button type="submit" class="btn btn-outline-secondary ml-auto btn-site-primary color-text-white ml-auto">
                        <span class="pl-3 button_font_small">Submit <i class="fas fa-arrow-right button_font_small"></i></span>
                    </button>
                </div>
            </div> 

             <div class="col-md-2" style="display: flex; align-items:flex-end">
                                                <button class="btn btn-success add_item_btn03 mr-5" wire:click.prevent="addInput({{$i}})"><i class="fas fa-plus" aria-hidden="true"></i></button>
              </div>
      -->



        </div>

	@endif


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



    

    
});

</script>


</div>