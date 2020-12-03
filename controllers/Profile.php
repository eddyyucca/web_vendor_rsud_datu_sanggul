<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    
    function __construct() {
        parent::__construct();
    }

    public function index() {        
        $data = $this->data;
        $data['dt'] = $this->mcrud->getData('*', 'IHSEnt.dbo.m_rs', 'namars')->result();
        $data['pr'] = $this->mcrud->getDataWhere('*', 'wprofile', array('idsys' => 'pr1'), 'idsys')->row();
        $data['nav'] = 'profile';        
        $data['main'] = 'vprofile';
        $this->load->view('template', $data);
    }

}
