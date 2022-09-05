<?php

namespace App\Http\Controllers;

use App\Models\Filing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChangeFilingYearController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'year_id' => "exists:filing_years,id",
        ]);

        Session::put('instructions', ['CurrentTaxFilingYear'=>$request->year_id]);

        return redirect()->back();
    }
}
