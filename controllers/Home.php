<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->data;
        $data['brt'] = $this->mcrud->getDataWhereLimit('*', 'wbrt', array('hide' => '0'), 'dtn desc', 4, 0)->result();
        $data['pop'] = $this->mcrud->getDataWhereLimit('*', 'wbrt', array('hide' => '0'), 'hint desc', 4, 0)->result();
        $data['umm'] = $this->mcrud->getDataWhereLimit('*', 'winfo', array('hide' => '0'), 'dpost desc', 4, 0)->result();
        $data['bnr'] = $this->mcrud->getDataWhere('*', 'wban', array('hide' => '0'), 'odr')->result();
        $data['nav'] = 'home';        
        $data['main'] = 'vhome';
        $this->load->view('template', $data);
    }

}
