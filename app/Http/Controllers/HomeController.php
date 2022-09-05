<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // session()->flush();
        // dd(auth()->user()->id);
        // dd(session('instructions'));

        // dd(CurrentFilingYear());

    	return view('instructions.instructions');
    }
}
