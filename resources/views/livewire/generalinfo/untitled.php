<div>
   
    									<div class="row mt-4 stepwizard">
									      <div class="col-md-12 ">
									         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
									            <ol class="breadcrumb cs-breadcrumbs">
									               
									               <li class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
									               	<a class="light-grey" href="#"> Personal Info</a></li>

									               <li class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }} ">
									               	<a class="light-grey" href="#"> ITIN Info</a>
									               </li>


									               <li class="breadcrumb-item mr-3 {{ $currentStep == 3 ? 'section-active' : '' }}"><a class="light-grey" href="#">Spouse Info</a>
									               </li>

									               <li class="breadcrumb-item mr-3 {{ $currentStep == 4 ? 'section-active' : '' }}"><a class="light-grey" href="#">Spouse ITIN Information</a>
									               </li>

									               <li class="breadcrumb-item mr-3 {{ $currentStep == 5 ? 'section-active' : '' }}"><a class="light-grey" href="#">Dependent</a>
									               </li>
									               <li class="breadcrumb-item mr-3 {{ $currentStep == 6 ? 'section-active' : '' }}"><a class="light-grey" href="#">Contact Info</a>
									               </li>

									               <li class="breadcrumb-item mr-3 {{ $currentStep == 7 ? 'section-active' : '' }}"><a class="light-grey" href="#">Bank Information</a></li>
									           
									            </ol>
									          </nav>
									      </div>
									    </div>


    							<div class="col-md-8">

    										 {{-- Section 1 --}}
    										<div class="{{ $currentStep != 1 ? 'display-none' : '' }} " id="step-1">

    											


                                                

                                                 


                                                

                                               
                                               

                                                 
                                                

                                                 @if($TaxpayerCitizenShipStatus === 'yes') @endif


                                                 

    										 </div>



    									{{-- End Step 1 --}}





    									<div class="{{ $currentStep != 2 ? 'display-none' : '' }} " id="step-2">
			    										
    										

                                        </div> {{-- End Step 2 --}}

                                    
                                    {{-- Step 3 --}}       
                                    <div class="{{ $currentStep != 3 ? 'display-none' : '' }} " id="step-3">
                                    	
                                    </div>
                                    	



		                                              

                                                  

                                                   


                                              



                                                 <div class="row">
                        
                                                    <div class=" offset-md-6">
                                                        <div class="rows mr-auro">
	                                                        
	                                                        <div class="d-flex ">

	                                                                <div class="">
	                                                                    <button wire:click="$emit('back', 1 )" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
	                                                                        <span class="pl-1 button_font_small">Spouse Information</span>
	                                                                    </button>
	                                                                </div>

                                                                <div class="mr-5">
                                                                    <button wire:click="submitSpuseInfo" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">Spouse ITIN <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                            
                                                    </div>
                                                        
                                                </div>



                                           </div>

    										</div>



                                    </div>
                                    {{-- End Step 3 --}}  


                                    {{-- Step 4 --}}       
                                    <div class="{{ $currentStep != 4 ? 'display-none' : '' }} " id="step-4">

                                    				<div class="row mb-3">
												    	<div class="col-md-10 text-info">
												    	<span>
												    	<i class="fa fa-regular fa-circle-info "></i> 

												    	ITIN Requirement: Individual Taxpayer Identification Number (ITIN) is a tax processing number issued by the Internal Revenue Service to help individuals comply with the U.S. tax laws, and to provide a means of efficiently processing and accounting for tax returns and payments for those not eligible for SSN. ITIN's are for federal tax reporting only, and are not intended to serve any other purpose. </span>
												    	</div>
												    </div>


												    <div class=" mb-3">                                              
											              <div class="form-group light-grey">
											                <label for="">Do you have an ITIN?</label>

											                <div class="mt-4">
											                	<input type="radio"   class="btn-check form-check-input " name="doyouhavespouseitin" id="doyouhavespouseitinyes" autocomplete="off" value='1' onchange="">
											                    <label  class="btn btn-outline-secondary mr-3 btn-site-primary" for="doyouhavespouseitinyes">Yes</label> 

											                    <input type="radio" class="btn-check form-check-input" 
											                    name="doyouhavespouseitin" id="doyouhavespouseitinno" autocomplete="off" onchange="" value='2'>
											                    <label class="btn btn-outline-secondary btn-site-primary" 
											                    for="doyouhavespouseitinno">No</label> 
											                </div>
											                                                                                                                                                             
											              </div>                                                 
											        </div>


											        <div class="row mb-3">
                                                            <div class="col-md-7 form-group light-grey">
                                                                <label for="">What is your ITIN?</label><br/>
                                                                <input type="text" placeholder="999-99-9999" class="form-control col-md-2 mt-2">
                                                                
                                                            </div>
                                                    </div>

                                                    <div class=" mb-3">                                              
											              <div class="form-group light-grey">
											                <label for="">Do you want to apply for an ITIN?</label>

											                <div class="mt-2">
											                	<input type="radio"   class="btn-check form-check-input " name="applyforspouseitin" id="apply-for-itin-yes" autocomplete="off" value='1' onchange="">
											                    <label class="btn btn-outline-secondary mr-3 btn-site-primary" for="apply-for-itin-yes">Yes</label> 

											                    <input type="radio" class="btn-check form-check-input" 
											                    name="applyforspouseitin" id="spouse-apply-for-itin-no" autocomplete="off" onchange="" value='2'>
											                    <label  class="btn btn-outline-secondary btn-site-primary" 
											                    for="spouse-apply-for-itin-no">No</label> 
											                </div>
											                                                                                                                                                             
											              </div>                                                 
											        </div>


											        <div class="row mt-3" id="no_amended_returns">
		                                                        <div class="col-md-12 ml-5">
		                                                            <div class="form-group">
		                                                                <div class="form-group light-grey">
		                                                                    <label for="">Provide a copy of your foreign passport</label> <span class="pl-3">
		                                                                       
		                                                                    </span><br/>
		    
		                                                                    <div class="form-group mt-1">
		                                                                        <div class="file btn btn-secondary cs-file-upload">
																				   <i class="fa fa-upload mr-4"></i> Passport
																				<input type="file"  name="file"/>
																				</div>
		                                                                    </div>
		    
		                                                                    
		    
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                            </div>


		                                            <div class="form-group mt-4">
                                                                <div class="form-group light-grey">
                                                                  <div class="row">
                                                                    <label class="mb-2" for="">Provide two of the following documents</label><br/>
                                                                    <div class="row">
															    	<div class="col-md-8 text-info">
															    	<span>
															    	<i class="fa fa-regular fa-circle-info "></i> 

															    	PLEASE NOTE: The documents must be clear, current (not expired) and one of them must contain a photo. Once the forms are ready, you will need to schedule an appointment with Pesach who is an IRS registered agent to verify your identity.</span>
															    	</div>
															    </div>
                                                                    <div class="col-md-6">
                                                                      <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="spusedriverlicensefile">
                                                                        <label class="form-check-label" for="spusedriverlicensefile">Drivers license
                                                                        </label>
                                                                      </div>
                                                                      <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="spusedbirthcertfile" >
                                                                        <label class="form-check-label" for="spusedbirthcertfile">
                                                                         Birth certificate
                                                                        </label>
                                                                      </div>

                                                                      <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="spusedforeignidfile" >
                                                                        <label class="form-check-label" for="spusedforeignidfile">
                                                                        Foreign ID
                                                                        </label>
                                                                      </div>


                                                                    </div>
                                                                      

                                                                    </div>

                                                                  </div>

                                           
                                                                </div>


                                                                  <div class="row mt-3" id="">
		                                                        <div class="col-md-12 ml-5">
		                                                            <div class="form-group">
		                                                                <div class="form-group light-grey">
		                                                                    
		                                                                    <div class="form-group mt-1">
		                                                                        <div class="file btn btn-secondary cs-file-upload">
																				   <i class="fa fa-upload mr-4"></i> Drivers license
																				<input type="file"  name="file"/>
																				</div>
		                                                                    </div>
		    
		                                                                    
		    
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                		</div>


                                                                <div class="row mt-3" id="">
		                                                        <div class="col-md-12 ml-5">
		                                                            <div class="form-group">
		                                                                <div class="form-group light-grey">
		                                                                    
		                                                                    <div class="form-group mt-1">
		                                                                        <div class="file btn btn-secondary cs-file-upload">
																				   <i class="fa fa-upload mr-4"></i>  Birth certificate
																				<input type="file"  name="file"/>
																				</div>
		                                                                    </div>
		    
		                                                                    
		    
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                		</div>

		                                                		<div class="row mt-3" id="">
		                                                        <div class="col-md-12 ml-5">
		                                                            <div class="form-group">
		                                                                <div class="form-group light-grey">
		                                                                    
		                                                                    <div class="form-group mt-1">
		                                                                        <div class="file btn btn-secondary cs-file-upload">
																				   <i class="fa fa-upload mr-4"></i>  Foreign ID
																				<input type="file"  name="file"/>
																				</div>
		                                                                    </div>
		    
		                                                                    
		    
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                		</div>


		                                                    <div class="row mt-4">
                                                              <div class="col-md-12 ml-5">
                                                                  <div class="form-group">
                                                                      <div class="form-group light-grey">
                                                                          <label class="mb-2" for="">Are you filing a Non-Resident Tax return? </label><br/>
                                                                          
                                                                          <input type="radio" class="btn-check" 
                                                                          id="NonResidentSpouseYes" name="NonResidentSpouse" 
                                                                          value="yes" >
                                                                          <label class="btn btn-outline-secondary btn-site-primary mr-3" for="NonResidentSpouseYes">Yes</label>

                                                                          <input type="radio" class="btn-check" 
                                                                          id="NonResidentSpouseNo" autocomplete="off" 
                                                                          name="NonResidentSpouse" value="no">
                                                                          <label class="btn btn-outline-secondary btn-site-primary mr-3" for="NonResidentSpouseNo">No</label>

                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            </div>


                                                              <div class="row">
                        
                                                    <div class=" offset-md-4">
                                                        <div class="rows mr-auro">
	                                                        
	                                                        <div class="d-flex ">

	                                                                <div class="">
	                                                                    <button wire:click="$emit('back', 1 )" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
	                                                                        <span class="pl-1 button_font_small">Spouse </span>
	                                                                    </button>
	                                                                </div>

                                                                <div class="mr-5">
                                                                    <button wire:click="submitDependentInfo" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">Dependent<i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                            
                                                    </div>
                                                        
                                                </div>

                                    </div>
                                    {{-- End Step4 --}} 



                                     {{-- Step 5 --}}       
                                    <div class="{{ $currentStep != 5 ? 'display-none' : '' }} " id="step-5">
                                    	
                                    <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">First Name  
                                                                	@error('dependentFirstName')<span class="error">*</span> @enderror</label> <br/>
                                                                <input wire:model="dependentFirstName" type="text" class="form-control col-md-2">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Middle Name  
                                                                	@error('dependentMiddleName')<span class="error">*</span> @enderror</label> <br/>
                                                                <input wire:model="dependentMiddleName" type="text" class="form-control col-md-2">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Last Name  
                                                                	@error('dependentLastName')<span class="error">*</span> @enderror</label> <br/>
                                                                <input wire:model="dependentLastName" type="text" class="form-control col-md-2">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Social Security Number  
                                                                	@error('dependentSSN')<span class="error">*</span> @enderror</label> <br/>
                                                                <input wire:model="dependentSSN" type="text" class="form-control col-md-2" maxlength="11">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Date of Issuance of SSN 
                                                                	</label> <br/>
                                                                <input type="date" class="form-control col-md-2" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Date of Birth 
                                                                	@error('dependentdod')<span class="error">*</span> @enderror</label> <br/>
                                                                <input wire:model="dependentdod" type="date" class="form-control col-md-2" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                         <div class="row mt-3">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group light-grey">
                                                            <label for="">Relationship to taxpayer</label><br/>
                                                                <select class="form-control" aria-label="Default select example">
                                                                    <option value="">-----</option>
                                                                    <option value="son">Son</option>
                                                                    <option value="daughter">Daughter</option>
                                                                    <option value="other">Other</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                        </div>


                                        
                                        <div class="col-md-8 ml-5 mt-4">                                              
								          <div class="form-group">                                              
								              <div class="form-group light-grey">
								                <label for="">Was Child Naturalised?</label>

								                <div class="mt-1">
								                	<input type="radio"   class="btn-check form-check-input " name="options-outlined" id="success-outlined" autocomplete="off" value='1' onchange="">
								                    <label wire:click="$emit('isChildNaturalised', 'yes' )" class="btn btn-outline-secondary mr-3 btn-site-primary" for="success-outlined"> Yes</label> 

								                    <input type="radio" class="btn-check form-check-input" name="options-outlined" id="danger-outlined" autocomplete="off" onchange="" value='2'>
								                    <label wire:click="$emit('isChildNaturalised', 'no' )" class="btn btn-outline-secondary btn-site-primary" for="danger-outlined">No</label> 
								                </div>
								                                                                                                                                                             
								              </div>                                                 
								          </div>                                                                                                             
									   </div>


									   <div class="row">
                        
                                                    <div class=" offset-md-4">
                                                        <div class="rows mr-auro">
	                                                        
	                                                        <div class="d-flex ">

	                                                                <div class="">
	                                                                    <button wire:click="$emit('back', 2 )" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
	                                                                        <span class="pl-1 button_font_small"> Spouse ITIN</span>
	                                                                    </button>
	                                                                </div>

                                                                <div class="mr-5">
                                                                    <button wire:click="submitDependentInfo" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">Contact Infomation <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                            
                                                    </div>
                                                        
                                        </div> 



                                    </div>
                                     {{-- End Step 5 --}} 



                                     {{-- Step 6 --}} 
                                     <div class="{{ $currentStep != 6 ? 'display-none' : '' }} " id="step-6">

                                     	<div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Street Address / Apartment Number</label><br/>
                                                                <input type="text" class="form-control col-md-4">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-4 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">City</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Country</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">ZIP Code</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Phone Number</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Email</label><br/>
                                                                <input type="email" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row">
                                                    <div class=" ">
                                                        <div class="rows mr-auro">
	                                                        <div class="d-flex ">
	                                                                <div class="">
	                                                                    <button wire:click="$emit('back', 3 )" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
	                                                                        <span class="pl-1 button_font_small"> Contact Info</span>
	                                                                    </button>
	                                                                </div>

                                                                <div class="mr-5">
                                                                    <button wire:click="submitContactInfo" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small"> Bank Information <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                            
                                                    </div>      
                                        </div>

                                     </div>

                                     {{-- End Step 6 --}} 



                                     {{-- Step 6 --}} 
                                     <div class="{{ $currentStep != 7 ? 'display-none' : '' }} " id="step-7">
                                      
                                       <div class="row">
                                    	<p class="light-grey">
                                    	<p class="light-grey">
                                    		
                                    	</p>
                                        </div>

                                        <div class="row mb-3">
												    	<div class="col-md-8 text-info">
												    	<span>
												    	<p><i class="fa fa-regular fa-circle-info "></i> For direct deposits of tax refunds/withdrawals of tax liability-CURRENT TAX YEAR ONLY
												    	<br/>
														    If you complete this- your refund/ tax due will be automatically deposited/ debited from your US account. If not, a check will be mailed to the adrress above.
														</p>
												    	</div>
								        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Account type (Cheking/Savings)</label><br/>
                                                                <select class="form-control">
                                                                	<option>Checking Account</option>
                                                                	<option>Savings Account </option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Phone Number</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>

                                        <div class="row mt-3">
                                                    <div class="col-md-6 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Routing Number</label><br/>
                                                                <input type="text" class="form-control col-md-4" >
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>


                                        <div class="row">
                        
                                                    <div class=" ">
                                                        <div class="rows mr-auro">
	                                                        
	                                                        <div class="d-flex ">

	                                                                <div class="">
	                                                                    <button wire:click="$emit('back', 4 )" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5"><i class="fas fa-arrow-left button_font_small"></i>
	                                                                        <span class="pl-1 button_font_small"> Dependent</span>
	                                                                    </button>
	                                                                </div>

                                                                <div class="mr-5">
                                                                    <a href="/id-verification" class="btn btn-outline-secondary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small"> Next <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </a>
                                                                </div>

                                                            </div>

                                                        </div>
                                                            
                                                    </div>
                                                        
                                        </div>

                                     </div>




</div>
