<?php

namespace App\Http\Livewire\TaxesDeductions;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\Stimulus as ModelsStimulus;

class Stimulus extends Component
{
    use GlobalService;
	public $currentStep = 3;
	public $DidYouReceiveFirstEconomicStimulus,$FirstStimulusDate,$AmountTaxPayerReceivedForFirstStimulus, $AmountSpouseReceivedForFirstStimulus, $TotalAmountReceivedForThirdStimulus;
    public $DidYouReceiveSecondEconomicStimulus,$SecondStimulusDate,$AmountTaxPayerReceivedForSecondStimulus, $AmountSpouseReceivedForSecondStimulus,$TotalAmountReceivedForSecondStimulus;
    public $DidYouReceiveThirdEconomicStimulus,$ThirdStimulusDate,$AmountTaxPayerReceivedForThirdStimulus, $AmountSpouseReceivedForThirdStimulus,$TotalAmountReceivedForFirstStimulus;


    public function render()
    {
        $this->TotalAmountReceivedForThirdStimulus = $this->AmountTaxPayerReceivedForThirdStimulus + $this->AmountSpouseReceivedForThirdStimulus;
        $this->TotalAmountReceivedForSecondStimulus = $this->AmountTaxPayerReceivedForSecondStimulus + $this->AmountSpouseReceivedForSecondStimulus;
        $this->TotalAmountReceivedForFirstStimulus = $this->AmountTaxPayerReceivedForFirstStimulus + $this->AmountSpouseReceivedForFirstStimulus;
        return view('livewire.taxes-deductions.stimulus', [
            'TotalAmountReceivedForFirstStimulus', 'TotalAmountReceivedForSecondStimulus', 'TotalAmountReceivedForThirdStimulus'
        ]);
    }


    public function mount(){

        $stimuli = ModelsStimulus::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->get();
        if($stimuli->count()>0){
            $this->DidYouReceiveFirstEconomicStimulus = 'no';
            $this->DidYouReceiveSecondEconomicStimulus = 'no';
            $this->DidYouReceiveThirdEconomicStimulus = 'no';

            foreach($stimuli as $stimulus){
                switch($stimulus->type){
                    case 'first':
                        $this->DidYouReceiveFirstEconomicStimulus = 'yes';
                        $this->FirstStimulusDate = $stimulus->received_date;
                        $this->AmountTaxPayerReceivedForFirstStimulus = $stimulus->taxpayer_amount;
                        $this->AmountSpouseReceivedForFirstStimulus = $stimulus->spouse_amount;
                        $this->TotalAmountReceivedForFirstStimulus = $stimulus->total;
                        break;

                    case 'second':
                        $this->DidYouReceiveSecondEconomicStimulus = 'yes';
                        $this->SecondStimulusDate = $stimulus->received_date;
                        $this->AmountTaxPayerReceivedForSecondStimulus = $stimulus->taxpayer_amount;
                        $this->AmountSpouseReceivedForSecondStimulus = $stimulus->spouse_amount;
                        $this->TotalAmountReceivedForSecondStimulus = $stimulus->total;
                        break;

                    case 'third':
                        $this->DidYouReceiveThirdEconomicStimulus = 'yes';
                        $this->ThirdStimulusDate = $stimulus->received_date;
                        $this->AmountTaxPayerReceivedForThirdStimulus = $stimulus->taxpayer_amount;
                        $this->AmountSpouseReceivedForThirdStimulus = $stimulus->spouse_amount;
                        $this->TotalAmountReceivedForThirdStimulus = $stimulus->total;
                        break;


                }
            }
        }
    }


    public function submitStimulus(){
        $validatedData = $this->validate([
            'DidYouReceiveFirstEconomicStimulus' => 'required',
            'DidYouReceiveSecondEconomicStimulus' => 'required',
            'DidYouReceiveThirdEconomicStimulus' => 'required',

            'FirstStimulusDate'=>'required_if:DidYouReceiveFirstEconomicStimulus,==,yes',
            'AmountTaxPayerReceivedForFirstStimulus'=>'required_if:DidYouReceiveFirstEconomicStimulus,==,yes',
            'AmountSpouseReceivedForFirstStimulus'=>'required_if:DidYouReceiveFirstEconomicStimulus,==,yes',

            'SecondStimulusDate'=>'required_if:DidYouReceiveSecondEconomicStimulus,==,yes',
            'AmountTaxPayerReceivedForSecondStimulus'=>'required_if:DidYouReceiveSecondEconomicStimulus,==,yes',
            'AmountSpouseReceivedForSecondStimulus'=>'required_if:DidYouReceiveSecondEconomicStimulus,==,yes',

            'ThirdStimulusDate'=>'required_if:DidYouReceiveThirdEconomicStimulus,==,yes',
            'AmountTaxPayerReceivedForThirdStimulus'=>'required_if:DidYouReceiveThirdEconomicStimulus,==,yes',
            'AmountSpouseReceivedForThirdStimulus'=>'required_if:DidYouReceiveThirdEconomicStimulus,==,yes',
        ],
        []);


        
        $stimuli = ModelsStimulus::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->get();
        if($stimuli->count()>0){
            foreach($stimuli as $stimulus){
                switch($stimulus->type){
                    case 'first':
                        if($this->DidYouReceiveFirstEconomicStimulus == 'yes'){
                            $stimulus->received_date = $this->FirstStimulusDate;
                            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForFirstStimulus;
                            $stimulus->spouse_amount = $this->AmountSpouseReceivedForFirstStimulus;
                            $stimulus->total = $this->AmountSpouseReceivedForFirstStimulus+$this->AmountTaxPayerReceivedForFirstStimulus;

                            $stimulus->save();
                        }
                        else{
                            $stimulus->delete();
                        }
                        break;

                    case 'second':
                        if($this->DidYouReceiveSecondEconomicStimulus == 'yes'){
                            $stimulus->received_date = $this->SecondStimulusDate;
                            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForSecondStimulus;
                            $stimulus->spouse_amount = $this->AmountSpouseReceivedForSecondStimulus;
                            $stimulus->total = $this->AmountTaxPayerReceivedForSecondStimulus+$this->AmountSpouseReceivedForSecondStimulus;

                            $stimulus->save();
                        }
                        else{
                            $stimulus->delete();
                        }

                        break;

                    case 'third':
                        if($this->DidYouReceiveThirdEconomicStimulus == 'yes'){
                            $stimulus->received_date = $this->ThirdStimulusDate;
                            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForThirdStimulus;
                            $stimulus->spouse_amount = $this->AmountSpouseReceivedForThirdStimulus;
                            $stimulus->total = $this->AmountTaxPayerReceivedForThirdStimulus+$this->AmountSpouseReceivedForThirdStimulus;

                            $stimulus->save();
                        }
                        else{
                            $stimulus->delete();
                        }

                        break;

                }
            }

            $this->currentStep ++;
            $this->progressUpdate();
            return redirect()->route('advanced-child-tax');

        }


        if($this->DidYouReceiveFirstEconomicStimulus == 'yes'){
            $stimulus = new ModelsStimulus;
            $stimulus->user_id = UserID();
            $stimulus->filing_years_id = CurrentFilingYear();
            $stimulus->type = 'first';
            $stimulus->received_date = $this->FirstStimulusDate;
            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForFirstStimulus;
            $stimulus->spouse_amount = $this->AmountSpouseReceivedForFirstStimulus;
            $stimulus->total = $this->AmountSpouseReceivedForFirstStimulus+$this->AmountTaxPayerReceivedForFirstStimulus;

            $stimulus->save();

        }


        if($this->DidYouReceiveSecondEconomicStimulus == 'yes'){
            $stimulus = new ModelsStimulus;
            $stimulus->user_id = UserID();
            $stimulus->filing_years_id = CurrentFilingYear();
            $stimulus->type = 'second';
            $stimulus->received_date = $this->SecondStimulusDate;
            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForSecondStimulus;
            $stimulus->spouse_amount = $this->AmountSpouseReceivedForSecondStimulus;
            $stimulus->total = $this->AmountTaxPayerReceivedForSecondStimulus+$this->AmountSpouseReceivedForSecondStimulus;

            $stimulus->save();

        }


        if($this->DidYouReceiveThirdEconomicStimulus == 'yes'){
            $stimulus = new ModelsStimulus;
            $stimulus->user_id = UserID();
            $stimulus->filing_years_id = CurrentFilingYear();
            $stimulus->type = 'third';
            $stimulus->received_date = $this->ThirdStimulusDate;
            $stimulus->taxpayer_amount = $this->AmountTaxPayerReceivedForThirdStimulus;
            $stimulus->spouse_amount = $this->AmountSpouseReceivedForThirdStimulus;
            $stimulus->total = $this->AmountTaxPayerReceivedForThirdStimulus+$this->AmountSpouseReceivedForThirdStimulus;

            $stimulus->save();

        }




        $this->currentStep ++;
        $this->progressUpdate();
        return redirect()->route('advanced-child-tax');
    }

    public function prevForm()
    {
        return redirect()->route('estimate-payments');
    }

}
