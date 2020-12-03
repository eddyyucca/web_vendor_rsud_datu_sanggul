<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_logreq_in()) {
           redirect('member/user', 'refresh');
        }
    }

    public function index() {
        $data = $this->data;
        $data['main'] = 'member/vreqin';
        $data['jsadd'] = '';
        $this->load->view('member/template', $data);
    }
}
