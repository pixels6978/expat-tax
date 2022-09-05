<?php

namespace App\Core;

use GuzzleHttp\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Core\GlobalService;
use Carbon\Carbon;


trait GlobalService
{




        public function getclientip(){

            $clientIP = \Request::getClientIp(true);
            return $clientIP;

        }



          public function logMessageRequest($data,$lable){
           date_default_timezone_set("Africa/Accra");
            $date = date('Y-m-d');

            $ipAddress = $this->getClientIp();

            $filename = "../applogs/log".$date."."."log";
            $content = ['Info'=>$lable,'Message'=>$data,'Ip::'=>$ipAddress];
            $content_json = json_encode($content);
            $myfile = fopen($filename, "a") or die("Unable to open file!");
            fwrite($myfile, "\n". $content_json);
            fclose($myfile);

        }




           public function logUserActivities($data,$lable){
           date_default_timezone_set("Africa/Accra");
            $date = date('Y-m-d');
            $username = session()->get('userid');
            $filename = "../userActivitylogs/".$username.$date."."."log";
            $content = ['Activity'=>$lable,'Info'=>$data];
            $content_json = json_encode($content);
            $myfile = fopen($filename, "a") or die("Unable to open file!");
            fwrite($myfile, "\n". $content_json);
            fclose($myfile);

        }

        public function progressUpdate(){

         $progress = \Session::get('progress') + 2;
         \Session::put('progress',$progress);

        }


    public function assignUserRole($userType,$modelId){
        $modelRole = new ModelHasRoles;
        $role = Roles::where('name',$userType)->first();
        $modelRole->role_id    = $role->id;
        $modelRole->model_type = 'App\Models\User';
        $modelRole->model_id   = $modelId;

        $modelRole->save();
        // switch ($userType) {
        //     case 'Farmer':


        //         break;

        //     case 'Seller':
        //         # code...
        //         break;


        //     case 'Buyer':
        //         # code...
        //         break;


        //     default:
        //         # code...
        //         break;
        // }
    }




        public function myDates(){
            date_default_timezone_set("Africa/Accra");
            $now = date('Y-m-d');
            return $now;
        }


        public function myDatesGregorian(){
            date_default_timezone_set("Africa/Accra");
            $now = date('M-d-Y');
            return $now;
        }

        public function longDate(){
            date_default_timezone_set("Africa/Accra");
            $nowWithTime = date('Y-m-d H:i:s');
            return $nowWithTime;

        }

        public function timeOnly(){
            date_default_timezone_set("Africa/Accra");
            $time = date('H:i:s');
            return $time;
        }

        public function formatCustomDate($data){
            $date=date_create($data);
            $res=  date_format($date,"Y-m-d");
            return $res;
        }

        public function formatCustomDateOnly($data){
            $date=date_create($data);
            $res=  date_format($date,"Y-m-d");
            return $res;
        }

        public function formatCustomTime($data){
            $date=date_create($data);
            $res=  date_format($date,"H:i:sa");
            return $res;
        }


        public function formatCustomDateText($data){
            $date=date_create($data);
            $res =  date_format($date,"M-d-Y");
            return $res;
        }

         public function formatCustomDateTextTime($data){
            $date=date_create($data);
            $res =  date_format($date,"d-M-y @ H:i");
            return $res;
        }

        public function createDateFormatFromString($data){
            $datetimeobj = date('Y-m-d',$data);
            return $datetimeobj;
        }

        public function sanitizeString($string){
            $sanitizedString = filter_var($string, FILTER_SANITIZE_STRING);
            $cleaned = strip_tags($sanitizedString);
            return $cleaned;
        }


        // public function








}


?>
