<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

   function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->data;
        $data['nav'] = 'contact';        
        $data['main'] = 'vcontact';
        $this->load->view('template', $data);
    }

}
