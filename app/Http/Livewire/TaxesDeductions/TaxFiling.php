<?php

namespace App\Http\Livewire\TaxesDeductions;

use Livewire\Component;
use App\Core\GlobalService;
use App\Models\Filing;
use App\Models\FilingYears;
use App\Models\TaxDeductions;
use App\Models\TaxDeductionsStudentLoan;
use App\Models\TaxDeductionsTuition;
use Livewire\WithFileUploads;

class TaxFiling extends Component
{
    use GlobalService;  use WithFileUploads;

	public $currentStep = 1;
	public $DidYouPayForTuition,$TuitionPaymentDetials,$NumberOfFormsUploadedForTuitionPayment;
    public $DoYouHaveStudenLoan,$ProvideStudentLoanInterest,$NumberOfFormsUploadedForStudentLoanInterest;
    public $UploadedTuition, $UploadedStudentLoan;
    public $TuitionFiles = [];
    public $StudentLoanFiles = [];
    public $listeners = ['moveToTab'];


    public function render()
    {
        return view('livewire.taxes-deductions.tax-filing');
    }


    public function mount()
    {
        if(CurrentFilingYear() != false){
            $deduction = TaxDeductions::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
            if($deduction){
                $this->DidYouPayForTuition = $deduction->tuition;
                $this->DoYouHaveStudenLoan = $deduction->student_loan;
                foreach ($deduction->TuitionFiles as $files){
                    $this->UploadedTuition[] = $files->file_path;
                }

                foreach ($deduction->StudentLoanFiles as $files){
                    $this->UploadedStudentLoan[] = $files->file_path;
                }
            }
        }
    }


    public function submitTaxFiling(){

        $validatedData = $this->validate([
            'DidYouPayForTuition' => 'required',
            'DoYouHaveStudenLoan' => 'required',
            'NumberOfFormsUploadedForTuitionPayment'=>'required_if:DidYouPayForTuition,==,yes',
            'NumberOfFormsUploadedForStudentLoanInterest'=>'required_if:DoYouHaveStudenLoan,==,yes',
        ],
        []);



        if(CurrentFilingYear() != false){
            // Check if exits
            $data = TaxDeductions::where('filing_years_id', CurrentFilingYear())->where('user_id',UserID())->first();
            if($data){
                $data->tuition =  $this->DidYouPayForTuition;
                $data->student_loan = $this->DoYouHaveStudenLoan;
                $data->save();


                if(!empty($this->TuitionFiles)){
                    foreach($this->TuitionFiles as $file){
                        $tuition_files = new TaxDeductionsTuition;
                        $tuition_files->tax_deductions_id = $data->id;
                        $tuition_files->file_path = $file->store('files');
                        $tuition_files->save();
                    }
                }

                if(!empty($this->StudentLoanFiles)){
                    foreach($this->StudentLoanFiles as $file){
                        $loan_files = new TaxDeductionsStudentLoan;
                        $loan_files->tax_deductions_id = $data->id;
                        $loan_files->file_path = $file->store('files');
                        $loan_files->save();
                    }
                }

                $this->currentStep ++;
                return redirect()->route('estimate-payments');
            }


            // else if new
            $new = new TaxDeductions;
            $new->user_id = UserID();
            $new->filing_years_id = CurrentFilingYear();
            $new->tuition =  $this->DidYouPayForTuition;
            $new->student_loan = $this->DoYouHaveStudenLoan;
            $new->save();

            if(!empty($this->TuitionFiles)){
                foreach($this->TuitionFiles as $file){
                    $tuition_files = new TaxDeductionsTuition();
                    $tuition_files->tax_deductions_id = $new->id;
                    $tuition_files->file_path = $file->store('files');
                    $tuition_files->save();
                }
            }

            if(!empty($this->StudentLoanFiles)){
                foreach($this->StudentLoanFiles as $file){
                    $loan_files = new TaxDeductionsStudentLoan;
                    $loan_files->tax_deductions_id = $new->id;
                    $loan_files->file_path = $file->store('files');
                    $loan_files->save();
                }
            }
            $this->currentStep ++;
        }


        $this->progressUpdate();
        return redirect()->route('estimate-payments');
    }

    public function moveToTab($id)
    {
        $this->currentStep = $id;
    }


}
