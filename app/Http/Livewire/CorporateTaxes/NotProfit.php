<?php

namespace App\Http\Livewire\CorporateTaxes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Core\GlobalService;
use App\Models\FilingYears;
use App\Models\NonProfit;
use Illuminate\Support\Facades\Session;

class NotProfit extends Component
{

    use GlobalService;
    use WithFileUploads;

	public $currentStep = 1;

    // form variables
    // form variables
    public $isFirstTimeFiling990, $fileFor990Filed, $fileFor1023App, $fileFor501c3Letter, $articlesOfIncorporation;
    public $name;
    public $ein;
    public $address;
    public $officerInCareDetails;
    public $hasProperBalanceSheet;
    public $compileFinStmtForYou;
    public $isOrgRegisteredCharity;
    public $charityRegState;
    public $officerInCareName, $officerInCareAddress, $officerInCarePhone;
    public $fileForarticlesOfIncorporation;

    public $profitAndLossFilesFor2019_2020 = [];
    public $balanceSheetForTaxYears19_20 = [];
    public $bankStmtForRelevantTaxYear = [];
    public $creditCardStmtForRelevantTaxYear = [];
    public $fileForDonorlist;

    public $uploadedfileFor990Filed, $uploadedfileFor1023App, $UploadedfileFor501c3Letter, $UploadedprofitAndLossFilesFor2019_2020, $UploadedfileForarticlesOfIncorporation,
    $UploadedbalanceSheetForTaxYears19_20,$UploadedbankStmtForRelevantTaxYear, $UploadedcreditCardStmtForRelevantTaxYear, $UploadedfileForDonorlist;



    public function mount(){
        $data = NonProfit::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $this->isFirstTimeFiling990 = $data->is_first_time;
            $this->name= $data->name;
            $this->address= $data->address;
            $this->ein= $data->ein;
            $this->officerInCareName= $data->care_officer_name;
            $this->officerInCareAddress= $data->care_officer_address;
            $this->officerInCarePhone= $data->care_officer_phone;
            $this->hasProperBalanceSheet= $data->has_balance_sheet;
            $this->compileFinStmtForYou= $data->compile_financial_stmt;
            $this->isOrgRegisteredCharity= $data->is_registered_charity;
            $this->charityRegState= $data->state;

            $this->uploadedfileFor990Filed = $data->last_filed;
            $this->uploadedfileFor1023App = $data->initial_1023;
            $this->UploadedfileFor501c3Letter = $data->irs501c3_letter;
            $this->UploadedfileForarticlesOfIncorporation = $data->articles_of_incorporation;
            $this->UploadedfileForDonorlist = $data->list_of_donors;
            $this->UploadedprofitAndLossFilesFor2019_2020 = explode(',', $data->profit_loss_report_19_20);
            $this->UploadedbalanceSheetForTaxYears19_20 = explode(',', $data->balance_sheet_19_20);
            $this->UploadedbankStmtForRelevantTaxYear = explode(',', $data->bank_stmt_for_taxyear);
            $this->UploadedcreditCardStmtForRelevantTaxYear = explode(',', $data->credit_card_stmt);
        }
    }



    // function to submit s-corporation and route to summary page
    public function submitNotProfits()
    { $data = NonProfit::where('user_id', UserID())->where('filing_years_id', CurrentFilingYear())->first();
        if($data){
            $data->is_first_time = $this->isFirstTimeFiling990;

            if(!empty($this->fileFor990Filed)){
                $data->last_filed = $this->fileFor990Filed->store('files');
            }
            if(!empty($this->fileFor1023App)){
                $data->initial_1023 = $this->fileFor1023App->store('files');
            }
            if(!empty($this->fileFor501c3Letter)){
                $data->irs501c3_letter = $this->fileFor501c3Letter->store('files');
            }
            if(!empty($this->fileForarticlesOfIncorporation)){
                $data->articles_of_incorporation = $this->fileForarticlesOfIncorporation->store('files');
            }

            if(!empty($this->profitAndLossFilesFor2019_2020)){
                $profitAndLoss = [];
                foreach($this->profitAndLossFilesFor2019_2020 as $file){
                    $profitAndLoss[] = $file->store('files');
                }
                $data->profit_loss_report_19_20 = implode(',', $profitAndLoss);
            }
            if(!empty($this->balanceSheetForTaxYears19_20)){
                $balancesheet = [];
                foreach($this->balanceSheetForTaxYears19_20 as $file){
                    $balancesheet[] = $file->store('files');
                }
                $data->balance_sheet_19_20 = implode(',', $balancesheet);
            }
            if(!empty($this->bankStmtForRelevantTaxYear)){
                $files = [];
                foreach($this->bankStmtForRelevantTaxYear as $file){
                    $files[] = $file->store('files');
                }
                $data->bank_stmt_for_taxyear = implode(',', $files);
            }
            if(!empty($this->creditCardStmtForRelevantTaxYear)){
                $files = [];
                foreach($this->creditCardStmtForRelevantTaxYear as $file){
                    $files[] = $file->store('files');
                }
                $data->credit_card_stmt = implode(',', $files);
            }

            if(!empty($this->fileForDonorlist)){
                $data->list_of_donors = $this->fileForDonorlist->store('files');
            }

            $data->name = $this->name;
            $data->address = $this->address;
            $data->ein = $this->ein;
            $data->care_officer_name = $this->officerInCareName;
            $data->care_officer_address = $this->officerInCareAddress;
            $data->care_officer_phone = $this->officerInCarePhone;
            $data->has_balance_sheet = $this->hasProperBalanceSheet;
            $data->compile_financial_stmt = $this->compileFinStmtForYou;
            $data->is_registered_charity = $this->isOrgRegisteredCharity;
            $data->state = $this->charityRegState;
            $data->save();
        }
        else{
             $data = new NonProfit();
             $data->user_id = UserID();
             $data->filing_years_id = CurrentFilingYear();
             $data->is_first_time = $this->isFirstTimeFiling990;

             if(!empty($this->fileFor990Filed)){
                 $data->last_filed = $this->fileFor990Filed->store('files');
             }
             if(!empty($this->fileFor1023App)){
                 $data->initial_1023 = $this->fileFor1023App->store('files');
             }
             if(!empty($this->fileFor501c3Letter)){
                 $data->irs501c3_letter = $this->fileFor501c3Letter->store('files');
             }
             if(!empty($this->fileForarticlesOfIncorporation)){
                 $data->articles_of_incorporation = $this->fileForarticlesOfIncorporation->store('files');
             }

             if(!empty($this->profitAndLossFilesFor2019_2020)){
                 $profitAndLoss = [];
                 foreach($this->profitAndLossFilesFor2019_2020 as $file){
                     $profitAndLoss[] = $file->store('files');
                 }
                 $data->profit_loss_report_19_20 = implode(',', $profitAndLoss);
             }
             if(!empty($this->balanceSheetForTaxYears19_20)){
                 $balancesheet = [];
                 foreach($this->balanceSheetForTaxYears19_20 as $file){
                     $balancesheet[] = $file->store('files');
                 }
                 $data->balance_sheet_19_20 = implode(',', $balancesheet);
             }
             if(!empty($this->bankStmtForRelevantTaxYear)){
                 $files = [];
                 foreach($this->bankStmtForRelevantTaxYear as $file){
                     $files[] = $file->store('files');
                 }
                 $data->bank_stmt_for_taxyear = implode(',', $files);
             }
             if(!empty($this->creditCardStmtForRelevantTaxYear)){
                 $files = [];
                 foreach($this->creditCardStmtForRelevantTaxYear as $file){
                     $files[] = $file->store('files');
                 }
                 $data->credit_card_stmt = implode(',', $files);
             }

             if(!empty($this->fileForDonorlist)){
                 $data->list_of_donors = $this->fileForDonorlist->store('files');
             }

             $data->name = $this->name;
             $data->address = $this->address;
             $data->ein = $this->ein;
             $data->care_officer_name = $this->officerInCareName;
             $data->care_officer_address = $this->officerInCareAddress;
             $data->care_officer_phone = $this->officerInCarePhone;
             $data->has_balance_sheet = $this->hasProperBalanceSheet;
             $data->compile_financial_stmt = $this->compileFinStmtForYou;
             $data->is_registered_charity = $this->isOrgRegisteredCharity;
             $data->state = $this->charityRegState;
             $data->save();
        }


        $filing = FilingYears::where('user_id', UserID())->where('id', CurrentFilingYear())->first();
        $filing->status = 1;
        $filing->save();


        foreach (SelectedFilingYears()['SelectedYears'] as $key => $val) {
            if ($val['id'] == CurrentFilingYear()) {
                if($key < count(SelectedFilingYears()['SelectedYears']) -1){
                    $key += 1;
                    Session::put('instructions', ['CurrentTaxFilingYear'=>SelectedFilingYears()['SelectedYears'][$key]['id']]);
                    // dd(session('instructions'));
                }
                else{
                    //Session::put('instructions', ['CurrentTaxFilingYear'=>SelectedFilingYears()['SelectedYears'][0]['id']]);
                }
            }
        }






        // if(session()->has('instructions')){
        //     session()->forget('contact-info');
        //     // dd('lol');
        //     // return redirect()->route('instructions');

        //     // dd(count(session('instructions')['selectedYear']));
        //     // dd('dkd');
        //     // dd(session()->all());
        //     // if(!empty(session('instructions')['completedYears'])){}
        //     if(empty(session('instructions')['completedYears']) || !in_array(session('instructions')['CurrentTaxFilingYear'], session('instructions')['completedYears'])){
        //         session()->push('instructions.completedYears', session('instructions')['CurrentTaxFilingYear']);

        //         // dd(session('completedYears'));
        //         if( is_array(session('instructions')['selectedYear'])){
        //             $key = array_search(session('instructions')['CurrentTaxFilingYear'], session('instructions')['selectedYear']);
        //             if($key < count(session('instructions')['selectedYear']) -1){
        //                 $key += 1;
        //                 session()->put('instructions.CurrentTaxFilingYear', session('instructions')['selectedYear'][$key]);
        //             }
        //         }
        //     }

        // }


        return redirect()->route('instructions');


        // goto partnership page
        $this->progressUpdate();
        // return redirect()->route('summary');

    }

    public function prevForm()
    {
        return redirect()->route('foreign-corporation-112DF');
    }

    public function render()
    {
        return view('livewire.corporate-taxes.not-profit');
    }
}
