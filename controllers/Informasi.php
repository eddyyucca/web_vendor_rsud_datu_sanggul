<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
//        $data = $this->data;
//        $data['nav'] = 'informasi';        
//        $data['main'] = 'vinfo_ap';
//        $this->load->view('template', $data);
        $data = $this->data;
        $data['umm'] = $this->mcrud->getDataWhere('*', 'winfo', array('hide' => '0'), 'dpost desc')->result();
        $data['nav'] = 'informasi';        
        $data['main'] = 'vpengumuman';
        $this->load->view('template', $data);
    }
    
}
