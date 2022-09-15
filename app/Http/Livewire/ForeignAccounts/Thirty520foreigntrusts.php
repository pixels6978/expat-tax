<?php

namespace App\Http\Livewire\ForeignAccounts;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\ThirtyFiveTwentyForeignTrusts;
use App\Models\Trustees;


class Thirty520foreigntrusts extends Component
{

    use GlobalService;
    public $currentStep = 1;
    public $trusteeInput = [];
    public $trusteefieldId = 1;
    public $numberOfTrustees = 1;

    public $isGrantor,$grantorFullname,$grantorAddress,$dateOfTrustInfo,$isTrustObligated,$trustee;
    public $trusteeName    = []; 
    public $trusteeSSN     = []; 
    public $trusteeAddress = []; 
    public $trusteeRole    = [];

    public $listTrustees;


    public function addTrusteeInput($trusteefieldId)
    {
       //dd($this->numberOfTrustees);
       $this->numberOfTrustees++; 
        // $trusteefieldId = $trusteefieldId + 1;
        // $this->trusteefieldId = $trusteefieldId;
        // array_push($this->trusteeInput ,$trusteefieldId);
    }


    public function removeTrusteeInput()
    {
        array_pop($this->trusteeInput);
    }

    // submit form and route to next
    public function submit3520ForeignTrusts()
    {
        // validate data variables
        $validatedData = $this->validate([
            'dateOfTrustInfo' => 'required_if:isGrantor,===,yes',
            'trustee'         => 'required_if:isGrantor,==,yes',
            'isGrantor'       => 'required'
            
        ],
        []
        );
        
            $info = ThirtyFiveTwentyForeignTrusts::where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();

            if(!empty($info))
            {
                $info->user_id                  = UserID();
                $info->filing_years_id          = CurrentFilingYear();
                $info->is_grantor               = $this->isGrantor;
                $info->address                  = $this->grantorAddress;
                $info->trust_info_date          = $this->dateOfTrustInfo;
                $info->is_trust_obligated_by_law = $this->isTrustObligated;
                $info->save();

                $this->foreignTrustId = $info->id;
                $this->addTrustees();
            }else{
                $info  = new ThirtyFiveTwentyForeignTrusts;

                $info->user_id                  = UserID();
                $info->filing_years_id          = CurrentFilingYear();
                $info->is_grantor               = $this->isGrantor;
                $info->address                  = $this->grantorAddress;
                $info->trust_info_date          = $this->dateOfTrustInfo;
                $info->is_trust_obligated_by_law = $this->isTrustObligated;
                $info->save();

                $this->foreignTrustId = $info->id;
                $this->addTrustees();
            }
            

        // route to next form
        return redirect()->route('c-corporations');
    }


    public function fetchData()
    {
        $info = ThirtyFiveTwentyForeignTrusts::where('user_id',UserID())->where('filing_years_id',CurrentFilingYear())->first();
        if(!empty($info))
        {
            $this->isGrantor        = $info->is_grantor;
            $this->grantorAddress   = $info->address;
            $this->dateOfTrustInfo  = $info->trust_info_date;
            $this->isTrustObligated = $info->is_trust_obligated_by_law;

            $this->listTrustees = Trustees::where('trust_id',$info->id)->get();
        }
    }


    public function addTrustees()
    {
        for($i=0; $i < count($this->trusteeName); $i++):
                    $trustee = new Trustees;

                    $trustee->trust_id       = $this->foreignTrustId;
                    $trustee->name           = $this->trusteeName[$i];
                    $trustee->ssn            = $this->trusteeSSN[$i];
                    $trustee->address        = $this->trusteeAddress[$i];
                    $trustee->role           = $this->trusteeRole[$i];
                    $trustee->filing_year_id = CurrentFilingYear();
                    $trustee->save();
                            
        endfor;
    }

    public function removeTrustee($id){
        
        Trustees::where('id',$id)->delete();
        $this->emit('recordDeleted');
    }

    public function prevForm()
    {
        return redirect()->route('five471');
    }

    public function render()
    {
        $this->fetchData();
        return view('livewire.foreign-accounts.thirty520foreigntrusts');
    }
}
