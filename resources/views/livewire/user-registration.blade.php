<div>
    <div>
         <main class="form-signin">
          <form wire:submit.prevent="registerUser" class="text-center">
            <img class="mb-4 site-logo" src="{{ asset('assets/images/expat-logo.png') }}" alt="">
           
                <div>
                    @if (session()->has('message_error'))
                        <div class="alert alert-danger">

                            {{ session('message_error') }}

                        </div>
                    @endif
                </div>

            <div class="form-floating mt-2">
              <input type="text" wire:model="Fullname" class="form-control" id="floatingInput" placeholder="Fullname">
              <label for="floatingInput">Full name
              @error('Fullname')<span class="error">*</span> @enderror
              </label>
            </div>

            <div class="form-floating mt-2">
              <input type="email" wire:model="Email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address
              @error('email')<span class="error">*</span> @enderror
              </label>
            </div>

            <div class="form-floating mt-2">
             <select class="form-select" wire:model="country" aria-label="Default select example">
               
                <option value=""></option>
                @foreach($countries as $data)
                <option value="{{ $data->countryname }}">{{ $data->countryname }}</option>
                @endforeach
              </select>
              <label for="floatingInput">Country
              @error('email')<span class="error">*</span> @enderror
              </label>
            </div>

              <p>
                Already have an account ? <a href="/login">Login</a>
              </p>

            <!-- <div class="form-floating">
              <input type="email" wire:model="LastName" class="form-control" id="floatingInput" placeholder="Lastname">
              <label for="floatingInput">Lastname
              @error('LastName')<span class="error">*</span> @enderror
              </label>
            </div> -->
           

            
            <button class="w-100 btn btn-outline-secondary btn-lg btn-site-primary  mt-4 ">
              <div wire:loading wire:target="registerUser" class="spinner-grow text-dark" role="status">
              	<span class="sr-only">Loading...</span>
              </div> 
            Sign up

           </button>
          
          </form>
        </main>
</div>

</div>
