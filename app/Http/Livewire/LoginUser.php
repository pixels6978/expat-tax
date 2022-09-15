<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginUser extends Component
{
	public $email;
	public $password;

    public function render()
    {
        return view('livewire.login-user');
    }


    public function loginUser()
    {
    	$validatedData = $this->validate([
            'email' => 'required',
            'password'=>'required'
        ],
        []);

    	try{
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password]))
                {
                     $user = User::where('email',$this->email)->first();
                     Session::put('email',$this->email);
                     Session::put('name',$user->name);
                     Session::put('country',$user->country);
                     if($user->userstatus == 1){
                        //Set new password
                        session()->flash('message_init_resetpassord', 'Your account has been created. Check your email for your default password');
                        return redirect()->to('/set-new-password');
                     }elseif($user->userstatus== 2){
                        return redirect()->to('/instructions');
                     }

                     else{
                         request()->session()->regenerate();
                        
                         return redirect()->to('/');
                     }

                }else{
                    $this->emit('Invalid');
                }
        }catch(\Exception $e)
        {
                $this->emit('SystemError');
        }
    }




}
