<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\TADFactory;
use App\TAD;
use App\Providers\TADSoap;
use App\Providers\TADZKLib;

use App\ZKLib;
use App\ZKLibrary;
use Illuminate\Http\Request;

class ZkController extends Controller
{
   public function test()
   {
      $tad_factory = new TADFactory(['ip'=>'192.168.1.201']);
      $tad = $tad_factory->get_instance();
      $logs = $tad->get_att_log();
      $array_att_logs = $logs->to_array();
     
      $json_att_logs = $array_att_logs['Row'];
      foreach ($json_att_logs as $log) {
         $result =Attendance::create([
            'pin'=>$log['PIN'],
            'datetime'=>$log['DateTime'],
            'verified'=>$log['Verified'],
            'status'=>$log['Status'],
            'workcode'=>$log['WorkCode'],
         ]);

         if (!$result) {
            return "Error";
         }
      }
   }

   public function push_all_logs()
   {
      $tad_factory = new TADFactory(['ip'=>'192.168.1.201']);
      $tad = $tad_factory->get_instance();
      $logs = $tad->get_att_log();
      $array_att_logs = $logs->to_array();
     
      $json_att_logs = $array_att_logs['Row'];
      foreach ($json_att_logs as $log) {
         $result =Attendance::create([
            'pin'=>$log['PIN'],
            'datetime'=>$log['DateTime'],
            'verified'=>$log['Verified'],
            'status'=>$log['Status'],
            'workcode'=>$log['WorkCode'],
         ]);

         if (!$result) {
            return "Error";
         }
      }
   }

   public function index()
   {
      $logs = Attendance::orderBy("datetime",'desc')->get(); 
      return view('attendance',compact('logs'));
   }

}
