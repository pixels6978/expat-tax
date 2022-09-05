<div>
     

         <main class="form-signin">
          <form wire:submit.prevent="post" class="text-center">
            <img class="mb-4 site-logo btn-outline-secondary" src="{{ asset('assets/images/expat-logo.png') }}" >
           
              <div>
                    @if (session()->has('message_new_user'))

                        <div class="alert alert-info">

                            Setup your new password

                        </div>

                    @endif

                     @if (session()->has('message_init_resetpassord'))

                        <div class="alert alert-info">

                           Setup a new password

                        </div>

                    @endif

                    

                </div>

            <div class="form-floating">
              <input type="password" wire:model="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">New Password
               @error('password')<span class="error">*</span> @enderror
              </label>
            </div>
            <div class="form-floating mt-2">
              <input type="password" wire:model="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Confirm Password
               @error('password_confirmation')<span class="error">*</span> @enderror
              </label>
            </div>
             <div class="form-floating mt-2">
              @error('password')<span class="error">{{$message}}</span> @enderror
            </div>
            
            <button class="w-100 btn btn-outline-secondary btn-lg btn-site-primary  mt-4 ">
              <div wire:loading wire:target="post" class="spinner-grow text-dark" role="status">
              	<span class="sr-only">Loading...</span>
              </div> 
           Submit

           </button>
          </form>
        </main>
</div>
