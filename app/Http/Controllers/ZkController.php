<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\TADFactory;
use App\TAD;
use App\Providers\TADSoap;
use App\Providers\TADZKLib;

use App\ZkUser;
use App\ZKLib;
use App\ZKLibrary;
use Illuminate\Http\Request;

class ZkController extends Controller
{

   public function fingerprint()
   {

   }
   
   public function push_all_zkusers()
   {
      $tad_factory = new TADFactory(['ip'=>'192.168.1.201']);
      $tad = $tad_factory->get_instance();
      $all_user_info = $tad->get_all_user_info();
      $all_users_array_info = $all_user_info->to_array();
      $users_array_info = $all_users_array_info['Row'];
      return $users_array_info;

      foreach ($users_array_info as $user) {
      // return $user;
         $result = ZkUser::insert([
            'pin'=>  $user['PIN'],
            'name'=> $user['Name'],
            'password'=>   $user['Password'],
            'privilege'=>  $user['Privilege'],
            'group'=>   $user['Group'],
            'card'=> $user['Card'],
            'pin2'=> $user['PIN2'],
            'tz1'=>  $user['TZ1'],
            'tz2'=>  $user['TZ2'],
            'tz3'=>  $user['TZ3'],
         ]);
         if (!$result) {
            return "Error";
         }
      }
      return $users_array_info;
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

   public function users_index()
   {
      $users = ZkUser::orderBy("pin2",'asc')->get(); 
      return view('users',compact('users'));
   }

}
