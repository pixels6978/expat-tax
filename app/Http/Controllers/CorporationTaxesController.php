<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporationTaxesController extends Controller
{
    public function showSCorporations(){
    	return view('corporate_taxes.s-corporations');
    }

    public function showCCorporations(){
    	return view('corporate_taxes.c-corporations');
    }

    public function showPartnership(){
    	return view('corporate_taxes.partnership');
    }

    public function showForeignCorporation(){
    	return view('corporate_taxes.foreign-corporation');
    }

    public function showNotProfit(){

        // dd(CurrentFilingYear());
    	return view('corporate_taxes.not-profit');
    }
}
