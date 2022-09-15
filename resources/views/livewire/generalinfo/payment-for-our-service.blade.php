<div>


                      <div class="row mt-4 stepwizard">
									      <div class="col-md-12 ">
									         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
									            <ol class="breadcrumb cs-breadcrumbs">

									               <li wire:click="moveToTab(1)" class="breadcrumb-item mr-3 {{ $currentStep == 1 ? 'section-active' : '' }}">
									               	<a class="light-grey" href="#">Payment for our services</a></li>

									               <li wire:click="moveToTab(2)" class="breadcrumb-item mr-3 {{ $currentStep == 2 ? 'section-active' : '' }}"><a class="light-grey" href="#">Our Fees</a></li>

									            </ol>
									          </nav>
									      </div>
									    </div>

									    {{-- Section 1 --}}
									    <div class="{{ $currentStep != 1 ? 'display-none' : '' }} " id="step-1">

									    	<div class="row mb-3">
												    	<div class="col-md-8 text-info">
												    	<span>
												    	<i class="fa fa-regular fa-circle-info "></i>

												    	Payment is due when your return is prepared. We accept international Visa and MasterCard and will only charge your card upon your authorization. Other payment methods and payment plans are available. </span>
												    	</div>
										     </div>

									    	<div class="row mt-3">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Card Number
                                                                	</label> <br/>
                                                                <input wire:model="cardNo" maxlength="16" type="text" class="form-control col-md-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-3 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Expiration Date

                                                                </label><br/>
                                                                <input wire:model="ExpirationDate" type="date" class="form-control col-md-2" >

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-3 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">CVV
                                                                	</label> <br/>
                                                                <input wire:model="CVV"  type="text" class="form-control col-md-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-5 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Name on Card
                                                                	</label> <br/>
                                                                <input wire:model="cardName" type="text" class="form-control col-md-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="comment-area">
                                                              <div class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                <i class="fas fa-message"></i> Add Comment
                                                              </div>
                                                  </div>

                                                    <div class=" offset-md-7">
                                                        <div class="rows mr-auro">

	                                                        <div class="d-flex ">

                                                                <div class="mr-5">
                                                                    <button wire:click="submitPaymentDetails" class="btn btn-outline-secondary btn-site-primary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">Our Fees <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

									    </div>
									     {{-- End Section 1 --}}


									     {{-- Section 2 --}}
									    <div class="{{ $currentStep != 2 ? 'display-none' : '' }} " id="step-1">
                                            <div class="row">
                                            <div class="col-md-6 text-info">
                                            <span>
                                            <i class="fa fa-regular fa-circle-info "></i>

                                            Please note: Payment for our services is due regardless of the outcome of the tax return.</span>
                                           
                                            </div>
                                        </div>
									    	<div class="row mt-3">
                                                    <div class="col-md-7 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">How did you hear about our firm?  @error('HowDidYouKnow') <span class="error text-danger">*</span> @enderror</label><br/>
                                                                <input wire:model="HowDidYouKnow" type="text" class="form-control col-md-2">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-7 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label for="">Please see our fee schedule for your reference </label><br/>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2 light-grey">
                                                    <div class="col-md-11">
                                                          <div class="accordion accordion-flush" id="accordionFlushExample">
                                                               
                                                          @if(session()->get('country') == 'Isreal')
                                                                <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingOne">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">

                                                               <span class="light-grey">
                                                               (PW TAX) -
                                                               </span>
                                                                <strong> IRS REPRESENTATION SERVICES </strong>

                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                               <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td> IRS ID verification call, per year. Multiple years/MFS reduced fee of ₪665 </td>

                                                                           <td> ₪480</td>
                                                                       </tr>


                                                                        <tr> <td> TAS</td> <td class="text-right"> ₪775</td> </tr>

                                                                        <tr> <td> Uncollectables </td> <td class="text-right">₪1,960 </td> </tr>

                                                                        <tr> <td> Tracking lost checks (stimulus checks not included) </td> <td class="text-right"> ₪625 </td> </tr>

                                                                        <tr> <td> First time penalty abatement request </td> <td class="text-right"> ₪525 </td> </tr>

                                                                        <tr> <td> Reasonable cause penalty abatement request </td> <td class="text-right">₪650-1,295 </td> </tr>

                                                                        <tr> <td> Appealing timely filing of return </td> <td class="text-right"> ₪625 </td> </tr>

                                                                        <tr> <td> Appealing timely filing of return </td> <td class="text-right"> ₪625 </td> </tr>

                                                                        <tr> <td> Responding to IRS correspondence </td> <td class="text-right"> ₪625 </td> </tr>

                                                                        <tr> <td> Audit </td> <td class="text-right"> ₪2,160 </td> </tr>

                                                                        <tr> <td> Tax court </td> <td class="text-right"> ₪1,575 </td> </tr>

                                                                        <tr> <td>Offer in compromise doubt as to liability/audit reconsideration </td> <td class="text-right"> ₪2,900 </td> </tr>


                                                                   </tbody>
                                                               </table>

                                                              </div>

                                                            </div>


                                                          </div> <!-- End Item -->


                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingFive">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                                                <span class="light-grey">
                                                               (PW TAX) -
                                                               </span>
                                                                <strong>  RETURNS TAX US - INDIVIDUAL  </strong>
                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                               <table class="table table-borderless light-grey">
                                                                   <tbody>

                                                                   <tr> <td> US Federal Income Tax Return </td> <td class="text-right">₪1,050 </td> </tr>
                                                                   <tr> <td> Each additional salary, 1099, K-1  </td> <td class="text-right"> ₪60 </td> </tr>
                                                                   <tr> <td>Schedule E (per rental property)  </td> <td class="text-right"> ₪175 </td> </tr>
                                                                   <tr> <td> Schedule C (per business) </td> <td class="text-right"> .₪175 </td> </tr>
                                                                   <tr> <td> Form 8863 (Refundable tuition credit) </td> <td class="text-right"> ₪175 </td> </tr>
                                                                   <tr> <td> Form 8833 (Treaty-Based Position) </td> <td class="text-right"> ₪175 </td> </tr>
                                                                   <tr> <td>Form 8621 (PFIC reporting) </td> <td class="text-right">₪550 </td> </tr>
                                                                   <tr> <td> Form 4797 (Sale of business and property) </td> <td class="text-right"> ₪450 </td> </tr>
                                                                   <tr> <td> Form 8814 (kiddie tax) </td> <td class="text-right"> ₪175 </td> </tr>
                                                                   <tr> <td> Form 8379 (Injured Spouse Claim) </td> <td class="text-right"> ₪275 </td> </tr>

                                                                   <tr> <td>Resourcing Per Treaty </td> <td class="text-right"> ₪550 </td> </tr>
                                                                   <tr> <td> Streamlined Procedure </td> <td class="text-right"> ₪5,400 </td> </tr>
                                                                   <tr> <td>MFS Tax Return (Married Filing Separate additional tax return) </td> <td class="text-right">₪275 </td> </tr>
                                                                   <tr> <td> Form 1040NR Non Resident Federal Tax return </td> <td class="text-right"> ₪1,100 </td> </tr>
                                                                   <tr> <td> Form 5472 </td> <td class="text-right">  ₪850 </td> </tr>
                                                                   <tr> <td> Form 1040x Amended Tax Return</td> <td class="text-right"> ₪1,275 </td> </tr>
                                                                   <tr> <td> State Tax Return </td> <td class="text-right"> ₪350 </td> </tr>
                                                                   <tr> <td> Dual Status Tax Return </td> <td class="text-right"> ₪1,550 </td> </tr>
                                                                   </tbody>
                                                               </table>
                                                               <hr/>
                                                               <h6>REPORTING ACCOUNT FINANCIAL</h6>

                                                                 <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td> FINCEN Form 114 (FBAR) — up to 5 accounts</td>

                                                                           <td> ₪325</td>
                                                                       </tr>


                                                                        <tr> <td> FINCEN Form 114 (FBAR) — 6-10 accounts </td> <td class="text-right"> ₪525 </td> </tr>

                                                                        <tr> <td> FINCEN Form 114 (FBAR) — 11 + accounts </td> <td class="text-right">₪675</td> </tr>

                                                                        <tr> <td> FATCA (Form 8938) — up to 5 accounts </td> <td class="text-right"> ₪450 </td> </tr>

                                                                         <tr> <td> FATCA (Form 8938) — 6-10 accounts </td> <td class="text-right"> ₪750 </td> </tr>

                                                                          <tr> <td> FATCA (Form 8938) — 11-20 accounts </td> <td class="text-right"> ₪1,100 </td> </tr>




                                                                   </tbody>
                                                               </table>


                                                               <h6> ADDITIONAL FORMS </h6>
                                                               <table class="table table-borderless light-grey">
                                                                   <tbody>

                                                                     <tr> <td> Form 5471 Foreign Corporation Informational Return </td> <td class="text-right"> ₪990 </td> </tr>

                                                                     <tr> <td> Section 962 Election </td> <td class="text-right"> ₪700</td> </tr>

                                                                     <tr> <td> Form 3520/3520a Transactions With Foreign Trusts and Receipt of Certain Foreign Gifts Return</td> <td class="text-right"> ₪1,350</td> </tr>

                                                                     <tr> <td> Form W-7 ITIN Application</td> <td class="text-right">₪450</td> </tr>

                                                                     <tr> <td> Form 709 - Gift return</td> <td class="text-right"> ₪950</td> </tr>


                                                                   </tbody>
                                                               </table>

                                                               <h6>ADDITIONAL FORMS</h6>
                                                               <table class="table table-borderless light-grey">
                                                                   <tbody>

                                                                   <tr> <td> Tax Planning or/and Consultations </td> <td class="text-right"> ₪650 </td> </tr>
                                                                   <tr> <td> Facilitating tax payments (each time) </td> <td class="text-right"> ₪115 </td> </tr>
                                                                   <tr> <td> Insurance coverage plan for Audit and IRS correspondence </td> <td class="text-right"> ₪275 </td> </tr>


                                                                   </tbody>
                                                               </table>


                                                              </div>
                                                            </div>
                                                          </div><!-- End Item -->




                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingSix">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                                                 <span class="light-grey">
                                                               (PW TAX) - CORPORATION
                                                               </span>
                                                                <strong>  SERVICES PROFIT-FOR-NOT 990  </strong>
                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                  <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td> 990-EZ </td>

                                                                           <td> ₪1,960 and up</td>
                                                                       </tr>


                                                                        <tr> <td> 990 </td> <td class="text-right"> ₪3,200 and up </td> </tr>

                                                                        <tr> <td> Bookkeeping </td> <td class="text-right">₪375/ hour </td> </tr>

                                                                        <tr> <td> Audited Financial Statements </td> <td class="text-right"> Please contact us for a price quote </td> </tr>




                                                                   </tbody>
                                                               </table>


                                                              </div>
                                                            </div>
                                                          </div> <!-- End Item -->


                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingEight">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                                                   <span class="light-grey">
                                                               (PW TAX) - Corporations
                                                               </span>
                                                                <strong>- CORPORATE SERVICES  </strong>
                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                     <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td> Form 1120- Corporation Income Tax Return</td>

                                                                           <td> ₪2,700-₪5,500</td>
                                                                       </tr>

                                                                       <tr>
                                                                           <td> Form 1120s- Income Tax Return for an S Corporation</td>

                                                                           <td> ₪2,700-₪3,900</td>
                                                                       </tr>


                                                                       <tr>
                                                                           <td> Form 1120F- Income Tax Return of a Foreign Corporation</td>

                                                                           <td> ₪2,700-₪5,500</td>
                                                                       </tr>


                                                                       <tr>
                                                                           <td> Form 1065- Return of Partnership income</td>

                                                                           <td> ₪2,340-₪5,5000</td>
                                                                       </tr>


                                                                      <tr>
                                                                           <td> EIN and Form 2553, Election by a Small Business Corporation </td>

                                                                           <td>  ₪550</td>
                                                                       </tr>


                                                                   </tbody>
                                                               </table>

                                                              </div>
                                                            </div>
                                                          </div> <!-- End Item -->
                                                          @else
                                                                   
                                                            
                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                                 <span class="light-grey">
                                                               (expat TAX)  -
                                                               </span>
                                                                <strong> IRS REPRESENTATION SERVICES </strong>

                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                <table class="table table-borderless light-grey">

                                                                       <tr> <td>IRS call </td> <td> $130 </td> </tr>

                                                                       <tr> <td> IRS ID verification call </td> <td> $130 </td> </tr>

                                                                       <tr> <td>TAS</td> <td> $210 </td> </tr>

                                                                       <tr> <td> Uncollectables</td> <td> $540 </td> </tr>
                                                                       <tr> <td> Tracking lost checks </td> <td> $170 </td> </tr>
                                                                       <tr> <td> First time penalty abatement request </td> <td> $140 </td> </tr>
                                                                    <tr> <td> Reasonable cause penalty abatement request </td> <td>  $180-$360 </td> </tr>
                                                                    <tr> <td> Appealing timely filing of return </td> <td> $170 </td> </tr>
                                                                    <tr> <td> Responding to IRS correspondence </td> <td> $600 </td> </tr>
                                                                    <tr> <td>Responding to IRS correspondence </td> <td>$600 </td> </tr>
                                                                    <tr> <td>Audit</td> <td> $450 </td> </tr>
                                                                    <tr> <td> Tax court </td> <td>$450 </td> </tr>
                                                                    <tr> <td> Offer in compromise doubt as to liability/audit reconsideration </td> <td> $780 </td> </tr>

                                                                </table>

                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingThree">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">

                                                                <span class="light-grey">
                                                               (expat TAX) -
                                                               </span>
                                                                <strong> 990 NOT-FOR-PROFIT SERVICES </strong>

                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td>
                                                                            990-EZ
                                                                           </td>

                                                                           <td> $650 and up </td>
                                                                       </tr>


                                                                        <tr> <td> 990 </td> <td class="text-right"> $850 and up </td> </tr>
                                                                        <tr> <td> Bookkeeping </td> <td class="text-right"> $100 / hour </td> </tr>
                                                                        <tr>
                                                                            <td> Audited Financial Statements </td>
                                                                            <td class="text-right"> Please contact us for a price quote </td>
                                                                        </tr>


                                                                   </tbody>
                                                               </table>

                                                              </div>
                                                            </div>
                                                          </div>



                                                          <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingFour">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">

                                                                <span class="light-grey">
                                                               (expat TAX) -
                                                               </span>
                                                                <strong>  CORPORATE SERVICES </strong>

                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                <table class="table table-borderless light-grey">
                                                                   <tbody>
                                                                       <tr>
                                                                           <td>
                                                                            Form 1120- Corporation Income Tax Return
                                                                           </td>

                                                                           <td> $750-$1,400 </td>
                                                                       </tr>


                                                                        <tr> <td> Form 1120s- Income Tax Return for an S Corporation </td> <td class="text-right"> $750-$1,000 </td> </tr>
                                                                        <tr> <td> Form 1120F- Income Tax Return of a Foreign Corporation </td> <td class="text-right"> $750-$1,500 </td> </tr>
                                                                        <tr>
                                                                            <td> Form 1065- Return of Partnership income</td>
                                                                            <td class="text-right"> $650-$1500</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td> EIN and Form 2553, Election by a Small Business Corporation</td>
                                                                            <td class="text-right"> $150</td>
                                                                        </tr>


                                                                   </tbody>
                                                               </table>

                                                              </div>
                                                            </div>
                                                          </div>

                                                        <div class="accordion-item ">
                                                            <h2 class="accordion-header" id="flush-headingSeven">
                                                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                                                <span class="light-grey">
                                                               (expat TAX) - Individual 
                                                               </span>
                                                                <strong>  US TAX RETURNS </strong>
                                                              </button>
                                                            </h2>
                                                            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                                              <div class="accordion-body">

                                                                    <table class="table table-borderless light-grey">
                                                                   <tbody>

                                                                  <tr> <td>US Federal Income Tax Return </td> <td class="text-right"> $350 </td> </tr>
                                                                  <tr> <td>
                                                                  Each additional salary, 1099, K-1 </td> <td class="text-right">$25 </td> </tr>
                                                                  <tr> <td> Schedule E (per rent property) </td> <td class="text-right"> $50 </td> </tr>


                                                                  <tr> <td>Schedule C (per rent property)</td> <td class="text-right"> %50 </td> </tr>
                                                                  <tr> <td> FORM 8863 (Refundable tuition credit) </td> <td class="text-right"> $50 </td> </tr>

                                                                  <tr> <td> FORM 8833 (Treaty-Based Position)</td> <td class="text-right"> $50</td> </tr>
                                                                  <tr> <td> FORM 8621 (PFIC reporting) </td> <td class="text-right">$150 per account </td> </tr>


                                                                  <tr> <td> Form 4797 (Sale of business and property) </td> <td class="text-right"> $140 </td> </tr>

                                                                  <tr> <td> FORM 8814 (Kiddie tax) </td> <td class="text-right"> $50 </td> </tr>
                                                                  <tr> <td> FORM 8379 (Injured Spouse Claim) </td> <td class="text-right"> $95 </td> </tr>

                                                                  <tr> <td> Streamlined Precedure </td> <td class="text-right">$1695 </td> </tr>
                                                                  <tr> <td> MFS Tax Return (Married Filling Separate additional tax retrun) </td> <td class="text-right"> $95 </td> </tr>
                                                                  <tr> <td>Form 1040NR Non Resident Federal Tax return </td> <td class="text-right"> $350 </td> </tr>

                                                                  <tr> <td>  Form 5472 </td> <td class="text-right"> $275 </td> </tr>
                                                                  <tr> <td> Form 1040x Amended Tax Return </td> <td class="text-right">$375 </td> </tr>
                                                                  <tr> <td> State Tax Return </td> <td class="text-right">$125 </td> </tr>

                                                                  <tr> <td> Dual Status Tax Return</td> <td class="text-right">strating from $450 </td> </tr>
                                                                  <tr> <td> .. </td> <td class="text-right"> .. </td> </tr>
                                                                  <tr> <td> .. </td> <td class="text-right"> .. </td> </tr>

                                                                  <hr/>
                                                                  <h6>FINANCIAL ACCOUNT REPORTING</h6>
                                                                  <tr> <td> FINCEN Form 114 (FBAR) — up to 5 accounts </td> <td class="text-right"> $115 </td> </tr>
                                                                  <tr> <td> FINCEN Form 114 (FBAR) — 6-10 accounts </td> <td class="text-right"> $155 </td> </tr>
                                                                  <tr> <td> FINCEN Form 114 (FBAR) — 6-10 accounts </td> <td class="text-right"> $155 </td> </tr>
                                                                  <tr> <td> FINCEN Form 114 (FBAR) — 11 + accounts</td> <td class="text-right"> $195 </td> </tr>
                                                                  <tr> <td> FATCA (Form 8938) — up to 5 accounts </td> <td class="text-right"> $150 </td> </tr>
                                                                  <tr> <td> FATCA (Form 8938) — 6-10 accounts </td> <td class="text-right">$225 </td> </tr>
                                                                  <tr> <td>FATCA (Form 8938) — 11-20 accounts </td> <td class="text-right"> $335 </td> </tr>

                                                                  <h6>ADDITIONAL FORMS</h6>
                                                                  <tr> <td> Form 5471 Foreign Corporation Information Return </td> <td class="text-right"> $325 </td> </tr>
                                                                  <tr> <td> Section 962 Election </td> <td class="text-right"> $225 </td> </tr>
                                                                  <tr> <td> Form 3520/3520a Transaction With Foreign Trusts and Receipt of Certain Foreign Gifts Return </td> <td class="text-right"> $400 </td> </tr>
                                                                  <tr> <td> Form W-7 ITIN Application  </td> <td class="text-right">$150 </td> </tr>

                                                                  <h6>ADDITIONAL FEED</h6>
                                                                  <tr> <td> Tax Planning or/and Consultations </td> <td class="text-right"> $175/hour </td> </tr>
                                                                  <tr> <td>Facilitating tax payments (each time) </td> <td class="text-right"> $30 </td>
                                                                  </tr>

                                                                  <tr> <td> Insurance coverage plan for Audit and IRS correspondence </td> <td class="text-right"> $75 </td>
                                                                  </tr>



                                                                   </tbody>
                                                               </table>

                                                              </div>
                                                            </div>
                                                          </div>
                                                          
                                                          @endif

                                                                 <!-- End Accordion -->
                                                          </div>
                                                      </div>
                                                      <!-- End Row -->
                                                </div>



                                                <div class="row mt-4">
                                                    <div class="col-md-8 ml-5">
                                                        <div class="form-group">
                                                            <div class="form-group light-grey">
                                                                <label class="mb-3" for="">Are you interested in the $75+VAT audit insurance coverage plan which can save between $150 - $1000 in the event of an IRS audit. </label><br/>

                                                                <input type="radio" name="InterestedInOurService"
                                                                wire:model="InterestedInOurService" class="btn-check"
                                                                id="InterestedInOurServiceYes" value="yes" >

                                                                    <label  class="btn btn-outline-secondary btn-site-primary mr-3" for="InterestedInOurServiceYes">Yes</label>

                                                                <input type="radio" name="InterestedInOurService"
                                                                wire:model="InterestedInOurService" id="InterestedInOurServiceNo" class="btn-check">
                                                                    <label  class="btn btn-outline-secondary btn-site-primary mr-3" for="InterestedInOurServiceNo">No</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                            <div class="col-md-8 text-info">
                                            <span>
                                            <i class="fa fa-regular fa-circle-info "></i>

                                            By checking this box $75 plus VAT (per return) will be added to your invoice once the tax return preparation has been completed.</span>
                                            <p>
                                                The audit insurance coverage plan covers all audit costs and IRS Correspondences (excluding $60 Tax Court Fee, State Audits and stimulus package issues). <br/>
                                               <strong> Please note, no IRS correspondence will be covered without purchase of the insurance plan. </strong>
                                            </p>
                                            </div>
                                        </div>


                                                <div class="row">

                                                    <div class="comment-area">
                                                              <div class="" data-bs-toggle="modal" data-bs-target="#cardComment">
                                                                <i class="fas fa-message"></i> Add Comment
                                                              </div>
                                                  </div>

                                                    <div class=" offset-md-4">
                                                        <div class="rows mr-auro">

                                                            <div class="d-flex ">

                                                                <div class="mr-5 ">

                                                                     <button wire:click="back" class="btn btn-outline-secondary btn-site-primary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">
                                                                            <i class="fas fa-arrow-left button_font_small"></i> Payment for Our Service
                                                                            </span>
                                                                    </button>


                                                                    <button wire:click="submitFeeData" class="btn btn-outline-secondary btn-site-primary color-text-white my-5 mx-5 ml-5">
                                                                        <span class="pl-3 button_font_small">Income <i class="fas fa-arrow-right button_font_small"></i></span>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>



									    </div>

									      {{-- End Section 2 --}}


</div>
