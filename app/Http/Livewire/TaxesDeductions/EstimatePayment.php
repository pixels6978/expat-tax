<?php

namespace App\Http\Livewire\TaxesDeductions;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\EstimatedTaxPayment;

class EstimatePayment extends Component
{
    use GlobalService;
	public $currentStep = 2;
	public $DidYouMakeEstimatedTaxPayment;
    public $PaymentDateOne, $AmountForPaymentDateOne, $PaymentDateTwo, $AmountForPaymentDateTwo;
    public $PaymentDateThree,$AmountForPaymentDateThree,$PaymentDateFour,$AmountForPaymentDateFour;
    public $NumberOfPayments=0;
    public $NumberOfPaymentsReceived =0;
    public $PaymentDate = [];
    public $PaymentAmount=[];
    public $DateReceived = [];
    public $AmountReceived = [];
    public $showData;
    public $outflow = 'payment-made';
    public $inflow = 'payment-received';

    public function render()
    {
        return view('livewire.taxes-deductions.estimate-payment');
    }

    public function mount()
    {
        if(CurrentFilingYear() != false){
            $estimated = EstimatedTaxPayment::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->get();

            if($estimated->count()>0){
                $this->DidYouMakeEstimatedTaxPayment = 'yes';
                $this->showData = $estimated;
                //$this->NumberOfPayments = $estimated->count();
                // $this->PaymentDateOne = $estimated->first()->payment_date;
                // $this->AmountForPaymentDateOne =$estimated->first()->amount;

                // if($estimated->skip(1)->first()){
                //     $this->PaymentDateTwo = $estimated->skip(1)->first()->payment_date;
                //     $this->AmountForPaymentDateTwo  =$estimated->skip(1)->first()->amount;
                // }

                // if($estimated->skip(2)->first()){
                //     $this->PaymentDateThree = $estimated->skip(2)->first()->payment_date;
                //     $this->AmountForPaymentDateThree =$estimated->skip(2)->first()->amount;
                // }

                // if($estimated->skip(3)->first()){
                //     $this->PaymentDateFour = $estimated->last()->payment_date;
                //     $this->AmountForPaymentDateFour  =$estimated->last()->amount;
                // }
            }
            else{
                $this->DidYouMakeEstimatedTaxPayment = 'no';
            }
        }
    }


    public function submitEstimatePayment(){


        

        
        $validatedData = $this->validate([
            'DidYouMakeEstimatedTaxPayment' => 'required',
            'NumberOfPayments' => 'required',
            // 'PaymentDate' => 'required_if:DidYouMakeEstimatedTaxPayment,==,yes',
            // 'AmountForPaymentDateOne' => 'required_if:DidYouMakeEstimatedTaxPayment,==,yes',
        ],
        []);


        $estimated = EstimatedTaxPayment::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->orderBy('type')->get();
        if($estimated->count()>0){
            //$update = EstimatedTaxPayment::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->get();

            // for($i=0; $i < count($this->PaymentDate); $i++):
            //     $update =  EstimatedTaxPayment::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear());
            //     $update->payment_date = $this->PaymentDate[$i];
            //     $update->amount       = $this->PaymentAmount[$i];
            //     $update->save();
                
            // endfor;

            // foreach ($variable as $key => $value) {
            //    $this->PaymentDate[$key] = $value->payment_date; 
            // }
        
            // $this->currentStep ++;
            // return redirect()->route('stimulus');

        }

        for($i=0; $i < count($this->PaymentDate); $i++):
                    $estimated = new EstimatedTaxPayment;
                    $estimated->user_id = UserID();
                    $estimated->filing_years_id = CurrentFilingYear();
                    $estimated->payment_date  = $this->PaymentDate[$i];
                    $estimated->amount = $this->PaymentAmount[$i];
                    $estimated->type   = 'outflow';
                    $estimated->save();
                            
        endfor;

        for($i=0; $i < count($this->DateReceived); $i++):
                    $estimated = new EstimatedTaxPayment;
                    $estimated->user_id = UserID();
                    $estimated->filing_years_id = CurrentFilingYear();
                    $estimated->payment_date  = $this->DateReceived[$i];
                    $estimated->amount = $this->AmountReceived[$i];
                    $estimated->type   = 'inflow';
                    $estimated->save();
                            
        endfor;



        $this->currentStep ++;
        $this->progressUpdate();
        return redirect()->route('stimulus');
    }

    public function prevForm()
    {
        return redirect()->route('tax-filing');
    }
}
