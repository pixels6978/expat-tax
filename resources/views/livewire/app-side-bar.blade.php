<div>
  <div class="main-app-side-bar">
    <header class="px-4">
        <div class="row mb-4">
            <div class="col tax-year-port-wrapper">
                <form action="{{route('change-filing-year')}}" method="post" id="change-tax-year">
                    @csrf
                    @method('post')
                    <select class="" onchange="this.form.submit()" name="year_id">
                        <optgroup>
                            @if(SelectedFilingYears()['SelectedYears']->count()>0)
                            @foreach (SelectedFilingYears()['SelectedYears'] as $selectedYear)
                            <option @if(SelectedFilingYears()['CurrentYear']==$selectedYear->id) selected @endif
                                value="{{$selectedYear->id }}">{{ $selectedYear->year }}</option>
                            @endforeach
                            @else
                            <option>Year</option>
                            @endif
                            {{-- <option @if(session()->has('instructions') &&  session('instructions')['CurrentTaxFilingYear']=='2019') selected @endif>2019</option>
                             <option @if(session()->has('instructions') &&  session('instructions')['CurrentTaxFilingYear']=='2020') selected @endif>2020</option>
                             <option @if(session()->has('instructions') &&  session('instructions')['CurrentTaxFilingYear']=='2021') selected @endif>2021</option> --}}
                        </optgroup>
                    </select>
                </form>
            </div>
            <div class="col progress-text">{{$progress}}% Complete</div>
        </div>


        <div id="progress-bar-container">
            <div class="progress-bar-child progress pr-bg-start" role="progressbar" style="width: {{$progress}}%"
                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> </div>
            <div class="progress-bar-child shrinker timelapse"></div>
        </div>

        <!-- <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div> -->

    </header>

</div>

<div class="app-side-bar-mobile">
  <header>
       <div id="progress-bar-container">
          <div class="progress-bar-child progress pr-bg-start" role="progressbar" style="width: {{$progress}}%"
              aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> </div>
          <div class="progress-bar-child shrinker timelapse"></div>
      </div>

      <div class="d-flex justify-content-between">
        {{-- <div class="progress-text">{{$progress}}% Complete   </div> --}}

        

   
       {{-- side menu to dropdown menu --}}
       <div class="mydropdown">
        <input type="text" name="" id="" class="textBox" value="{{ Request::segment(1) }}" readonly>
       </div>
       <div class="card mobile-side-menu">
           <ul class="list-unstyled ps-0 sidebar-nav mt-4">
               <li  class="mb-2 {{ Request::is('instructions*') ? 'active' : '' }}">
                  <button class="cs-btn btn-single-item align-items-center rounded collapsed px-4"  aria-expanded="false">
                   <a href="/instructions"> Instructions </a>
                  </button>
               </li>

                <li class="mb-4">
                  <button class="cs-btn btn-toggle align-items-center rounded collapsed px-4"
                  data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    General Information
                  </button>
                  <div class="collapse " id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li class="{{ Request::is('general-questions*') ? 'active' : '' }}">
                        <a onclick="show('general-questions')" href="/general-questions" class="link-dark rounded">General Questions</a></li>
                      <li class="{{ Request::is('personal-information*') ? 'active' : '' }}"><a href="/personal-information" class="link-dark rounded">Personal Information</a></li>

                      <li class="{{ Request::is('id-verification*') ? 'active' : '' }}">
                        <a href="/id-verification" class="link-dark rounded">ID verification</a></li>

                      <li class="{{ Request::is('payment-for-our-service*') ? 'active' : '' }}" ><a href="/payment-for-our-service" class="link-dark rounded">Payment for our services</a></li>
                    </ul>
                  </div>
                </li>

                <li class="mb-4">
                  <button class="cs-btn btn-toggle align-items-center rounded collapsed px-4" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Taxes & Deductions
                  </button>
                  <div class="collapse" id="dashboard-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li class="{{ Request::is('tax-filing*') ? 'active' : '' }}">
                        <a href="{{ route('tax-filing') }}" class="link-dark rounded">Tax Filing</a>
                     </li>

                        <li class="{{ Request::is('estimate-payments*') ? 'active' : '' }}">
                            <a href="{{ route('estimate-payments') }}" class="link-dark rounded">Estimate and Other Payments</a>
                        </li>
                        <li class="{{ Request::is('stimulus*') ? 'active' : '' }}">
                            <a href="{{ route('stimulus') }}" class="link-dark rounded">Stimulus</a>
                        </li>

                        <li class="{{ Request::is('advanced-child-tax-credit-payments-received*') ? 'active' : '' }}">
                            <a href="{{ route('advanced-child-tax') }}" class="link-dark rounded">Advanced child tax credit payments</a>
                        </li>
                    </ul>
                  </div>
                </li>

                <li class="mb-4">
                  <button class="cs-btn btn-toggle align-items-center rounded collapsed px-4" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    Income
                  </button>
                  <div class="collapse" id="orders-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li class="{{ Request::is('wages*') ? 'active' : '' }}"><a href="/wages" class="link-dark rounded">Wages</a></li>
                      <li  class="{{ Request::is('foreign-income*') ? 'active' : '' }}">
                        <a href="{{route('foreign-income')}}" class="link-dark rounded">Foreign Earned Income</a>
                      </li>
                      <li  class="{{ Request::is('business-income*') ? 'active' : '' }}">
                        <a href="{{route('business-income')}}" class="link-dark rounded">Business Income</a>
                      </li>
                      <li  class="{{ Request::is('passive-income*') ? 'active' : '' }}">
                        <a href="{{route('passive-income')}}" class="link-dark rounded">Investment and Passive Income</a>
                      </li>
                      <li class="{{ Request::is('rental-income*') ? 'active' : '' }}">
                        <a href="{{route('rental-income')}}" class="link-dark rounded">Rental Income & Sale of Property</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="mb-4">
                  <button class="cs-btn btn-toggle align-items-center rounded collapsed px-4" data-bs-toggle="collapse" data-bs-target="#foreign-collapse" aria-expanded="false">
                    Foreign Account & Entities
                  </button>
                  <div class="collapse" id="foreign-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li class="{{ Request::is('fbr-8938*') ? 'active' : '' }}">
                        <a href="{{route('FBR8938')}}" class="link-dark rounded" class="link-dark rounded">FBR and 8938</a>
                      </li>
                      <li class="{{ Request::is('5471-foreign-corporation*') ? 'active' : '' }}">
                        <a href="{{route('five471')}}" class="link-dark rounded" class="link-dark rounded">5471 Foreign Corporation</a>
                      </li>
                      <li class="{{ Request::is('3520-foreign-trusts*') ? 'active' : '' }}">
                        <a href="{{route('thirty520')}}"  class="link-dark rounded">3520 Foreign</a>
                      </li>

                    </ul>
                  </div>
                </li>

                <li class="mb-4">
                  <button class="cs-btn btn-toggle align-items-center rounded collapsed px-4" data-bs-toggle="collapse" data-bs-target="#corporate-collapse" aria-expanded="false">
                    Corporate Taxes
                  </button>
                  <div class="collapse" id="corporate-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="{{ Request::is('c-corporations*') ? 'active' : '' }}">
                            <a href="{{route('c-corporations')}}" class="link-dark rounded">C-Corporation</a>
                        </li>
                        <li class="{{ Request::is('s-corporations*') ? 'active' : '' }}">
                            <a href="{{route('s-corporations')}}" class="link-dark rounded">S-Corporation</a>
                        </li>
                        <li class="{{ Request::is('partnership*') ? 'active' : '' }}">
                            <a href="{{route('partnership')}}" class="link-dark rounded">Partnerships</a>
                        </li>
                        <li class="{{ Request::is('foreign-corporation-112DF*') ? 'active' : '' }}">
                            <a href="{{route('foreign-corporation-112DF')}}" class="link-dark rounded">Foreign Corporation 112DF</a>
                        </li>
                        <li class="{{ Request::is('not-profit*') ? 'active' : '' }}">
                            <a href="{{route('not-profit')}}" class="link-dark rounded">Not Profit</a>
                        </li>
                    </ul>
                  </div>
                </li>

                <li class="mb-4">
                  <button class="cs-btn btn-single-item align-items-center rounded collapsed px-4"  aria-expanded="false">
                   <a href="#"> Summary </a>
                  </button>

                </li>
           </ul>
       </div>
       {{-- end of sidemenu to dropdown --}}

        <div class="tax-year-port-wrapper">
            <form action="{{route('change-filing-year')}}" method="post" id="change-tax-year">
                @csrf
                @method('post')
                <select class="" onchange="this.form.submit()" name="year_id">
                    <optgroup>
                        @if(SelectedFilingYears()['SelectedYears']->count()>0)
                        @foreach (SelectedFilingYears()['SelectedYears'] as $selectedYear)
                        <option @if(SelectedFilingYears()['CurrentYear']==$selectedYear->id) selected @endif
                            value="{{$selectedYear->id }}">{{ $selectedYear->year }}</option>
                        @endforeach
                        @else
                        <option>Year</option>
                        @endif
                    </optgroup>
                </select>
            </form>
        </div>
      </div>

  </header>

</div>


</div>

