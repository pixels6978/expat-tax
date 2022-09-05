<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxesDeductionsController extends Controller
{
    public function showTaxFiling(){
        if(CurrentFilingYear() == false){
            return redirect()->route('instructions');
        }
    	return view('taxes_deductions.taxes-deductions');
    }

    public function showEstimatePayments(){
        if(CurrentFilingYear() == false){
            return redirect()->route('instructions');
        }

    	return view('taxes_deductions.estimate-payments');
    }

    public function showStimulus(){
        if(CurrentFilingYear() == false){
            return redirect()->route('instructions');
        }

    	return view('taxes_deductions.stimulus');
    }

    public function showAdvancedChildTax(){
        if(CurrentFilingYear() == false){
            return redirect()->route('instructions');
        }
    	return view('taxes_deductions.advanced-child-tax');
    }
}
