<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralQuestionsController extends Controller
{
    public function index(Request $request){
    	return view('general_information.general_questions');
    }
}
