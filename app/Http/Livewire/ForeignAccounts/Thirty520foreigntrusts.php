<?php

namespace App\Http\Livewire\ForeignAccounts;

use Livewire\Component;
use App\Core\GlobalService;

class Thirty520foreigntrusts extends Component
{

    use GlobalService;
    public $currentStep = 1;
    public $trusteeInput = [];
    public $trusteefieldId = 1;

    public $isGrantor;
    public $trustee;


    public function addTrusteeInput($trusteefieldId)
    {
        $trusteefieldId = $trusteefieldId + 1;
        $this->trusteefieldId = $trusteefieldId;
        array_push($this->trusteeInput ,$trusteefieldId);
    }


    public function removeTrusteeInput()
    {
        array_pop($this->trusteeInput);
    }

    // submit form and route to next
    public function submit3520ForeignTrusts()
    {
        // validate data variables

        // route to next form
        return redirect()->route('s-corporations');
    }

    public function prevForm()
    {
        return redirect()->route('five471');
    }

    public function render()
    {
        return view('livewire.foreign-accounts.thirty520foreigntrusts');
    }
}
