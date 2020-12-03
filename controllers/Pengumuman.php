<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->data;
        $data['umm'] = $this->mcrud->getDataWhere('*', 'winfo', array('hide' => '0'), 'dpost desc')->result();
        $data['nav'] = 'informasi';        
        $data['main'] = 'vpengumuman';
        $this->load->view('template', $data);
    }
}
