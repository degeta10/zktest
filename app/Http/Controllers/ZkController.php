<?php

namespace App\Http\Controllers;

use App\TADFactory;
use App\TAD;
use App\Providers\TADSoap;
use App\Providers\TADZKLib;

use App\ZKLib;
use App\ZKLibrary;
use Illuminate\Http\Request;

class ZkController extends Controller
{
   public $user_id = array();
   public $user_name = array();
   public $user_role = array();
   public $user_password = array();

   public function test()
   {
      $tad_factory = new TADFactory(['ip'=>'192.168.1.201']);
      $tad = $tad_factory->get_instance();
      $logs = $tad->get_att_log();
      $json_att_logs = $logs->to_json();
      return $json_att_logs;

      //For Connecting to ZK
      // $zk = new ZKLib("192.168.1.201", 4370);
      // $ret = $zk->connect();
      //   if ( $ret ){
      //    $zk->disableDevice(); 
      //    sleep(1);
      // } 

      // For Getting Users
      // $users = $zk->getUser();
      // foreach ($users as $user) {
      //    array_push($this->user_id,$user[0]);
      //    array_push($this->user_name,$user[1]);
      // }
      // return json_encode($this->user_name);



      // For Getting Attendance
      // $attendance = $zk->getAttendance();
      // return json_encode($attendance);


      //For Addinmg User
      // $zk->enrollUser('123');
      // $zk->setUser(123, '123', 'Shubhamoy Chakrabarty', '', LEVEL_USER);
      // $zk->enableDevice();
      // sleep(1);
      // $zk->disconnect();

      //For connecting
      // $zk = new ZKLibrary('192.168.1.201', 4370);
      // $zk->connect();
      // $zk->disableDevice();

      //FOr Listing Users
      // $users = $zk->getUser();
      // foreach ($users as $user) {
      //    array_push($this->user_id,$user[0]);
      //    array_push($this->user_name,$user[1]);
      //    array_push($this->user_role,$user[2]);
      //    array_push($this->user_password,$user[3]);
      // }

      // return json_encode($this->user_id);

      // $template = $zk->getAttendance();
      // return json_encode($template);
   }

}
