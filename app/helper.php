<?php

use App\Models\FilingYears;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

    if (!function_exists("SelectedFilingYears")) {
        function SelectedFilingYears(){
           if(auth()->user()->id){

                if(session()->has('instructions') &&  !empty(session('instructions')['CurrentTaxFilingYear'])){
                    $current = session('instructions')['CurrentTaxFilingYear'];
                }
                else{
                    $getCurrent = FilingYears::where('user_id', auth()->user()->id)->where('status', 0)->first();
                    if($getCurrent){
                        $current= $getCurrent->id;
                        Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                    }
                    else{
                        $getCompleted = FilingYears::where('user_id', auth()->user()->id)->first();
                        if($getCompleted){
                            $current= $getCompleted->id;
                            Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                        }
                        else{
                            $current = '';
                        }
                    }
                }

                $selectedYears =FilingYears::where('user_id', auth()->user()->id)->get();

                return [
                    'SelectedYears' => $selectedYears,
                    'CurrentYear' => $current
                ];

           }
        }
    }


    if (!function_exists("CurrentFilingYear")) {
        function CurrentFilingYear(){
           if(auth()->user()->id){

                if(session()->has('instructions') &&  !empty(session('instructions')['CurrentTaxFilingYear'])){
                    $current = session('instructions')['CurrentTaxFilingYear'];
                }
                else{
                    $getCurrent = FilingYears::where('user_id', auth()->user()->id)->where('status', 0)->first();
                    if($getCurrent){
                        $current= $getCurrent->id;
                        Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                    }
                    else{
                        $getCompleted = FilingYears::where('user_id', auth()->user()->id)->first();
                        if($getCompleted){
                            $current= $getCompleted->id;
                            Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                        }
                        else{
                            $current = false;
                        }
                    }
                }

                return $current;
           }
        }
    }


    if (!function_exists("NextFilingYear")) {
        function NextFilingYear(){
           if(auth()->user()->id){

                if(session()->has('instructions') &&  !empty(session('instructions')['CurrentTaxFilingYear'])){
                    $current = session('instructions')['CurrentTaxFilingYear'];
                }
                else{
                    $getCurrent = FilingYears::where('user_id', auth()->user()->id)->where('status', 0)->first();
                    if($getCurrent){
                        $current= $getCurrent->id;
                        Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                    }
                    else{
                        $getCompleted = FilingYears::where('user_id', auth()->user()->id)->first();
                        if($getCompleted){
                            $current= $getCompleted->id;
                            Session::put('instructions', ['CurrentTaxFilingYear'=>$current]);
                        }
                        else{
                            $current = false;
                        }
                    }
                }

                return $current;
           }
        }
    }



    if (!function_exists("UserID")) {
        function UserID(){
            return auth()->user()->id;
        }
    }

    if (!function_exists("FileUpload")) {
        function FileUpload($file, $path, $subfix = null){
            $name = $subfix.date('ymdhis').$file->getClientOriginalName();
            $file->move(public_path($path), $name);
            return $path.'/'.$name;
        }
    }

    if (!function_exists("DeleteImage")) {
        function DeleteImage($path){
            if(!empty($path)){
                File::delete($path);
            }
            return true;
        }
    }


