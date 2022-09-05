<?php

namespace App\Http\Livewire\Generalinfo;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\OurFee;
use App\Models\PaymentForOurService as ModelsPaymentForOurService;
use Stevebauman\Location\Facades\Location;

class PaymentForOurService extends Component
{
	use GlobalService;
	public $currentStep = 1;
	public $HowDidYouKnow;
	public $InterestedInOurService;
    public $countryName = 'Ghans';
    public $cardNo,$ExpirationDate,$CVV,$cardName,$Comment;

    public function render()
    {
        return view('livewire.generalinfo.payment-for-our-service');
    }

    public function mount(){
        $card = ModelsPaymentForOurService::where('user_id', UserID())->first();
        if($card){
           $this->cardNo= $card->card_number;
           $this->ExpirationDate= $card->expiration_date;
           $this->CVV= $card->cvv;
           $this->cardName= $card->card_name;
           $this->Comment= $card->comment;
        }


        $fees = OurFee::where('user_id', UserID())->first();
        if($fees){
           $this->HowDidYouKnow= $fees->how_did_you_hear_about_firm;
           $this->InterestedInOurService= $fees->seventy_five_plus_vat;
           $this->Comment= $fees->comment;
        }

        $ip = request()->ip(); 
        $currentUserInfo = Location::get($ip);
        if($currentUserInfo != null){
              $this->countryName = $currentUserInfo->countryName;
        }else{

        }
        
        $this->countryName = ($currentUserInfo != null) ? 'Israel' :  $this->countryName;
       
    }

    public function submitPaymentDetails(){
        $card = ModelsPaymentForOurService::where('user_id', UserID())->first();
        if($card){
            $card->card_number = $this->cardNo;
            $card->expiration_date = $this->ExpirationDate;
            $card->cvv = $this->CVV;
            $card->card_name = $this->cardName;
            $card->comment = $this->Comment;
            $card->save();
            return $this->currentStep++;
        }
        else{
            $card = new ModelsPaymentForOurService;
            $card->user_id = UserID();
            $card->card_number = $this->cardNo;
            $card->expiration_date = $this->ExpirationDate;
            $card->cvv = $this->CVV;
            $card->card_name = $this->cardName;
            $card->comment = $this->Comment;
            $card->save();

            return $this->currentStep++;
        }
    }

    public function submitFeeData(){
    		$validatedData = $this->validate([
            'HowDidYouKnow' => 'required'
        ],
        []);


        $fee = OurFee::where('user_id', UserID())->first();
        if($fee){
            $fee->how_did_you_hear_about_firm = $this->HowDidYouKnow;
            $fee->seventy_five_plus_vat = $this->InterestedInOurService;
            $fee->comment = $this->Comment;
            $fee->save();

            $this->progressUpdate();
            $this->emit('IncreamentProgress');

            return redirect()->to('/wages');
        }
        else{
            $fee = new OurFee();
            $fee->user_id = UserID();
            $fee->how_did_you_hear_about_firm = $this->HowDidYouKnow;
            $fee->seventy_five_plus_vat = $this->InterestedInOurService;
            $fee->comment = $this->Comment;
            $fee->save();

            $this->progressUpdate();
            $this->emit('IncreamentProgress');

            return redirect()->to('/wages');        }
    }

    public function back(){
    	$this->currentStep --;
    }

    public function moveToTab($id){
        $this->currentStep = $id;
    }
}
