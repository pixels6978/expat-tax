<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class SetNewPassword extends Component
{
	public $password;
	public $password_confirmation;

	protected $rules = [
        'password' => ['required','min:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%?@&%.]).*$/', 
        'confirmed'],
        //'password' => 'required|min:8|confirmed', 
    ];
    protected $messages = [

        'password.regex' => 'Your password must contain at least 8 characters, an uppercase letter, a non-numeric character (For example: !, $, #, or %)',

    ];

    public function render()
    {
        return view('livewire.set-new-password');
    }

    public function post()
    {
    	$email = Session::get('email');
    	$user = User::where('email',$email)->first();

    	$this->validate($this->rules);
    	$user->password = bcrypt($this->password);
        $user->userstatus =2;
    	$user->save();

    	//redirect
    	request()->session()->regenerate();
        Session::put('name',$user->name);
        session()->flash('message_new_password', 'Great password reset successful. Login with your new password');
        return redirect()->to('/');
    	
    }




}
