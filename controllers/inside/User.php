
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (!$this->auth->is_loged_in()) {
            //echo sha1($this->auth->aes256Encrypt('123456'));
            $data = $this->data;
            $data['action'] = base_url('inside/user/dologin');
            $this->load->view('vlogin', $data);
        } else {
            redirect('inside/home');
        }
    }

    function dologin() {
        $this->form_validation->set_rules('un', 'Username', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required');
        if ($this->form_validation->run()) {
            $log = $this->auth->dosignin('wu_', $this->input->post('un'), $this->input->post('pwd'));
            if (!$log) {
                redirect('inside/user');
            } else {
                redirect('inside/home');
            }
        } else {
            $this->index();
        }
    }

    function logout() {
        if ($this->auth->is_loged_in()) {
            $id_ = $this->auth->get_unid();
            $this->mcrud->update('wu_', array('idsys' => $id_), array('lastlog' => date("Y-m-d H:i:s")));
            $this->auth->dologout();
        }redirect('inside/user', 'refresh');
    }

}
