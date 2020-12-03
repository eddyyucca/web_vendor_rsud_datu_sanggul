<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
           redirect('inside/user', 'refresh');
        }
    }

    public function index() {
        $data = $this->data;
        $data['main'] = 'inside/vhome';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

}
