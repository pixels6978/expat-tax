<?php

namespace App\Http\Livewire\TaxesDeductions;

use Livewire\Component;
use App\Core\GlobalService;


class AdvancedChildTax extends Component
{
    use GlobalService;
	public $currentStep = 4;
	public $DidYouReceiveAdvanceChildTax;
    public $AmountOne, $DateOne, $AmountTwo, $DateTwo;
    public $AmountThree,$DateThree,$AmountFour,$DateFour, $AmountFive, $DateFive;


    public function render()
    {
        return view('livewire.taxes-deductions.advanced-child-tax');
    }


    public function submitAdvancedChildTax(){
        $validatedData = $this->validate([
            'DidYouReceiveAdvanceChildTax' => 'required',
            'DateOne' => 'required_if:DidYouReceiveAdvanceChildTax,==,yes',
            'AmountOne' => 'required_if:DidYouReceiveAdvanceChildTax,==,yes',
        ],
        []);

        $this->currentStep ++;
        $this->progressUpdate();
        return redirect()->route('FBR8938');
    }

    public function prevForm()
    {
        return redirect()->route('stimulus');
    }
}
