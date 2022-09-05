<?php

namespace App\Http\Livewire\Generalinfo;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\SpouseSids;
use App\Models\TaxpayerSids;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Session;

class IdVerification extends Component
{
	use GlobalService;

	public $taxPayerIdType,$LicenseNumber,$IDNumber,$IDIssueState,$IDExpirationDate,$IDIssueDate;
	public $spouseIdType, $SpouseLicenseNumber, $spouseIDNo, $SpouseIssuingState, $SpouseIDExpirationDate, $SpouseIDIssueDate;

	public $currentStep = 1;
    public $filingType;

    public function render()
    {
        return view('livewire.generalinfo.id-verification');
    }

    public function mount()
    {
        $IDVerification = TaxpayerSids::where('user_id', auth()->user()->id)->first();
        $user = PersonalInformation::where('user_id', auth()->user()->id)->first();
        $this->filingType = $user->filing_type;

        if($IDVerification){
            $this->taxPayerIdType = $IDVerification->id_type;
            $this->IDNumber =$IDVerification->id_number;
            $this->IDIssueState = $IDVerification->issue_state;
            $this->IDExpirationDate =$IDVerification->expiration_date;
            $this->IDIssueDate =$IDVerification->issue_date;
        }

        $SpouseIDVerification = SpouseSids::where('user_id', auth()->user()->id)->first();
        if($SpouseIDVerification){
            $this->spouseIdType = $SpouseIDVerification->id_type;
            $this->spouseIDNo = $SpouseIDVerification->id_number;
            $this->SpouseIssuingState = $SpouseIDVerification->issue_state;
            $this->SpouseIDExpirationDate = $SpouseIDVerification->expiration_date;
            $this->SpouseIDIssueDate = $SpouseIDVerification->issue_date;
        }
    }

    public function updatedIDIssueDate()
    {
       $validatedData = $this->validate([
            'IDIssueDate'=> 'before_or_equal:today'
        ],
        []); 
    }

     public function updatedIDExpirationDate()
    {
       $validatedData = $this->validate([
            'IDExpirationDate'=>'after:'.$this->IDIssueDate
        ],
        [
            'IDExpirationDate'=>'Expiration date must be greater than the Issued date'
        ]); 
    }

    public function submitTaxpayerVerification(){
        $validatedData = $this->validate([
            'taxPayerIdType' => 'required',
            // 'LicenseNumber'=>'required_if:taxPayerIdType,===,1',
            'IDNumber'=>'required_if:taxPayerIdType,===,2',
            'IDIssueDate'=> 'before_or_equal:today',
            'IDExpirationDate'=>'after:'.date('Y-m-d')
        ],
        []);

        $IDVerification = TaxpayerSids::where('user_id', auth()->user()->id)->first();
        if($IDVerification){
            $IDVerification->id_type=$this->taxPayerIdType;
            $IDVerification->id_number=$this->IDNumber;
            $IDVerification->issue_state=$this->IDIssueState;
            $IDVerification->expiration_date=$this->IDExpirationDate;
            $IDVerification->issue_date=$this->IDIssueDate;
            $IDVerification->save();

    	    return $this->currentStep ++;
        }

        $IDVerification = new TaxpayerSids;
        $IDVerification->user_id = auth()->user()->id;
        $IDVerification->id_type=$this->taxPayerIdType;
        $IDVerification->id_number=$this->IDNumber;
        $IDVerification->issue_state=$this->IDIssueState;
        $IDVerification->expiration_date=$this->IDExpirationDate;
        $IDVerification->issue_date=$this->IDIssueDate;
        $IDVerification->save();


        $data = ['taxPayerIdType'=>$this->taxPayerIdType,'LicenseNumber'=>$this->LicenseNumber,'IDNumber'=>$this->IDNumber,'IDIssueState'=>$this->IDIssueState,'IDExpirationDate'=>$this->IDExpirationDate,'IDIssueDate'=>$this->IDIssueDate];
        Session::put('taxpayerIDVerification',$data);

    	$this->currentStep ++;
    	$this->progressUpdate();
    	$this->emit('IncreamentProgress');
    }

    public function submitSpouseIdVerification(){

        $SpouseIDVerification = SpouseSids::where('user_id', auth()->user()->id)->first();
        if($SpouseIDVerification){
            $SpouseIDVerification->id_type=$this->spouseIdType;
            $SpouseIDVerification->id_number=$this->spouseIDNo;
            $SpouseIDVerification->issue_state=$this->SpouseIssuingState;
            $SpouseIDVerification->expiration_date=$this->SpouseIDExpirationDate;
            $SpouseIDVerification->issue_date=$this->SpouseIDIssueDate;
            $SpouseIDVerification->save();

            $this->currentStep ++;
            return redirect()->to('/payment-for-our-service');
        }

        $SpouseIDVerification = new SpouseSids;
        $SpouseIDVerification->user_id = auth()->user()->id;
        $SpouseIDVerification->id_type=$this->spouseIdType;
        $SpouseIDVerification->id_number=$this->spouseIDNo;
        $SpouseIDVerification->issue_state=$this->SpouseIssuingState;
        $SpouseIDVerification->expiration_date=$this->SpouseIDExpirationDate;
        $SpouseIDVerification->issue_date=$this->SpouseIDIssueDate;
        $SpouseIDVerification->save();


        $this->currentStep ++;
        $this->progressUpdate();
        return redirect()->to('/payment-for-our-service');
    }

      public function back(){
    	$this->currentStep --;

    	$progress = \Session::get('progress') - 2;
    	 \Session::put('progress',$progress);
         $this->emit('IncreamentProgress');
    }

    public function moveToTab($id){
        $this->currentStep = $id;
    }
}
