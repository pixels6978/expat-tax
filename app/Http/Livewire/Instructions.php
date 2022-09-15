<?php

namespace App\Http\Livewire;

use App\Models\FilingYears;
use App\Models\Filing;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Instructions extends Component
{
	public $selectedYear;
	public $requestType;
    public $setTaxYear;
    public $multipleSelectedYear = [];
    public $CurrentTaxFilingYear;
    public $completedYears = [];
    public $filingMode;
    public $db_filing_year;
    public $setRequestType;



	protected $listeners = ['selectYear','setTaxYear', 'multipleSelectedYear'];

    public function render()
    {
    	$years = range(2018, date('Y'));
    	//\Session::pull('instructions');
        return view('livewire.instructions',['years'=>$years]);
    }

    public function mount()
    {
        //Fetch all filing years
        $this->db_filing_year = FilingYears::where('user_id', auth()->user()->id)->get();
        
        //Uncompleted year
        $current_filing_year = FilingYears::where('status', 0)->where('user_id', auth()->user()->id)->first();
        
        $filing= Filing::where('filing_years_id', CurrentFilingYear())->first();
        if(!empty($filing)){
            session()->put('filePartnership',$filing->partnership);
            session()->put('fileCcorporation',$filing->ccorporation);
            session()->put('fileScorporation',$filing->scorporation);
            session()->put('fileForeignCorporation',$filing->foreign_corporation);
            session()->put('fileNotProfit',$filing->not_profit);
        }


        if($this->db_filing_year->count() == 1){
            $this->requestType = 'single';
            $this->selectedYear = $this->db_filing_year[0]->year;

            if($current_filing_year){
                $this->CurrentTaxFilingYear = $current_filing_year->year;
            }
            else{
                $this->CurrentTaxFilingYear = $this->db_filing_year[0]->year;
            }
        }
        elseif($this->db_filing_year->count() > 1 ){
            $this->requestType = 'multiple';
            foreach($this->db_filing_year as $year){
                $this->multipleSelectedYear[] = $year->year;
            }


            if($current_filing_year){
                $this->CurrentTaxFilingYear = $current_filing_year->year;
            }
            else{
                $this->CurrentTaxFilingYear = $this->db_filing_year[0]->year;
            }
        }
        $completed_years = FilingYears::where('status', 1)->where('user_id', auth()->user()->id)->get();
        if($completed_years->count()>0){
            foreach($completed_years as $year){
                $this->completedYears[] = $year->year;
            }
        }

    }

    public function selectYear($data)
    {
    	$this->requestType = $data;
        \Session::put('filingMode',$data);
    }

    public function multipleSelectedYear($year)
    {
    	$this->requestType = $year;
    }

    public function setTaxYear($year)
    {
        $this->selectedYear = $year;
    }


    public function post(){
        // if(session()->has('instructions')){
        //     return redirect()->to('/general-questions');
        // }

        $validatedData = $this->validate([
            'selectedYear' => 'required_if:requestType,==,single',
             'requestType' => 'required',
             'multipleSelectedYear' => 'required_if:requestType,==,multiple',
            ],
            [
                'selectedYear.required'=>'Which year would you like to file'
            ]
         );
        // $rules    = ['selectedYear'=>'required','lastName'=>'required','email'=>'required','gender'=>'required','phone'=>'required'];
        // $messages = ['firstName' => 'Firstname is missing',
        // 'lastName'=>'Lastname is missing',
        // 'email.email' =>'Invalid email address',];
        // $this->validate($rules,$messages);

       
        if($this->requestType == 'single'){
            $filingYear = new FilingYears;
            $filingYear->user_id = auth()->user()->id;
            $filingYear->year = $this->selectedYear;
            $filingYear->save();
            $data= ['selectedYear'=>$this->selectedYear, 'requestType'=>$this->requestType, 'CurrentTaxFilingYear'=>$this->selectedYear, 'completedYears'=>$this->completedYears];
        }
        else{
            sort($this->multipleSelectedYear);
            foreach($this->multipleSelectedYear as $year){
                $filingYear = new FilingYears;
                $filingYear->user_id = auth()->user()->id;
                $filingYear->year = $year;
                $filingYear->save();
            }


            $this->CurrentTaxFilingYear = $this->multipleSelectedYear[0];
            $data= ['selectedYear'=>$this->multipleSelectedYear, 'requestType'=>$this->requestType, 'CurrentTaxFilingYear'=>$this->CurrentTaxFilingYear, 'completedYears'=>$this->completedYears];
        }

        Session::put('progress',1);
        Session::put('instructions',$data);

        return redirect()->to('/general-questions');
    }


    public function updatedsetRequestType($value){
        if($value == 1){
            $this->requestType = 'single';
        }else{
            $this->requestType = 'multiple';
        }
    }


}
