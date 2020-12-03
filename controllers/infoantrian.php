<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infoantrian extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
        $data = $this->data;        
//      $data['antri'] = $this->GetNumQue('QUEUED');
        $data['call_'] = $this->GetNumQueCALL('CALLED');
        $data['proc'] = $this->GetNumQuePROC('PROCESSED');
        $data['end_'] = $this->GetNumQueFINISH('FINISHED');
     //   $data['id0'] = $this->GetIDQueCall('PROCESSED');
        $data['nav'] = 'infoantrian';
        $data['main'] = 'vinfo_antrian';
        $this->load->view('template', $data);
    }
    
//    function GetIDQueCall($s) {
//        if ($s == 'PROCESSED'){
//            $str = file_get_contents('http://localhost:8081/qumatic/standard/api/getQueueListRef?status='.$s);
//            $json = json_decode($str, true);
//            rsort($json);
//            $id0 = $json[0]['id'];
//        }
//        //echo $id0;
//        return $id0;
//    }
    function GetNumQue($s){
            if ($s == 'QUEUED'){ 
                $str = file_get_contents('http://localhost:8081/qumatic/standard/api/getQueueListRef?status='.$s);
                $json = json_decode($str, true);
                rsort($json);
                $itotal = count($json);
            }
        //echo $itotal;
        return $json;
    }
    
    //diurai satu2 baru bisa, knapa digabung belum bisa, baru belajar :(
    function GetNumQueCALL($s) {
        if ($s == 'CALLED'){
            $str = file_get_contents('http://localhost:8081/qumatic/standard/api/getQueueListRef?status='.$s);
            $json = json_decode($str, true);
            rsort($json);
        }
        return $json;
    }
    
    function GetNumQuePROC($s) {
        if ($s == 'PROCESSED'){
            $str = file_get_contents('http://localhost:8081/qumatic/standard/api/getQueueListRef?status='.$s);
            $json = json_decode($str, true);
            rsort($json);
        }
        return $json;
    }

    function GetNumQueFINISH($s) {
        if ($s == 'FINISHED'){
            $str = file_get_contents('http://localhost:8081/qumatic/standard/api/getQueueListRef?status='.$s);
            $json = json_decode($str, true);
            rsort($json);
        }
        return $json;
    }
    
}