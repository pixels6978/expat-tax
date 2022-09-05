<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
	
    public function personalInfo(){
    	return view('general_information.personal_information');
    }

    public function idVerification(){
    	return view('general_information.idverification');
    }

    public function paymentForOurService(){
    	return view('general_information.payment_for_our_service');
    }
}
