<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {                
        $data = $this->data; 
        $data['lyn'] = $this->mcrud->getDataWhere('*', 'wlyn', array('hide' => '0'), 'odr')->result();        
        $data['nav'] = 'layanan';        
        $data['main'] = 'vlayanan';
        $this->load->view('template', $data);
    }


}
