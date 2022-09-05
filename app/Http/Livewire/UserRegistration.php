<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\UserRegistration as WelcomeMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use App\Models\Country;

class UserRegistration extends Component
{
	public $Email;
	public $Fullname;
    public $countries;
    public $country;

    protected $rules = [

        'Fullname' => 'required',

        'Email' => 'required|email',

    ];

    public function mount(){
        $this->countries = Country::get();
       
    }
    
    public function render()
    {
        return view('livewire.user-registration');
    }

    public function registerUser()
    {
        $this->validate();
        $ip = request()->ip(); 
        $currentUserInfo = Location::get($ip);
        //$countryName = $currentUserInfo->countryName;

         $defaultPassword   = substr(number_format(time() * rand(),0,'',''),0,6);
         $data              = ['name'=>$this->Fullname,'defaultPassword'=>$defaultPassword];
         $current_timestamp = Carbon::now();
         $token = (string) Str::uuid();
         $user = new User;
        
        
         try{
             if(User::where('email', $this->Email)->exists()){
                session()->flash('message_error', 'Account already taken');
                return redirect()->to('/register-user');
             }

             $user->name       = $this->Fullname;
             $user->email      = $this->Email;
             $user->password   = bcrypt($defaultPassword);
             $user->userid     = $token;
             $user->type       = 2;
             $user->userstatus = 1;
             $user->country    = $this->country;
             $user->save();

            Mail::to($this->Email)->send(new WelcomeMail($data));
            session()->flash('message_new_user', 'Your account has been created. Check your email for your default password');
            return redirect()->to('/login');
         }catch(\Exception $e){
           
             session()->flash('message_error', 'Error creating your account. Check your internet and try again ');
             return redirect()->to('/register-user');
         }

    }
}
