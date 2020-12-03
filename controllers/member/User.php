<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (!$this->auth->is_logreq_in()) {
            $data = $this->data;
            $data['action'] = base_url('member/user/dologin');
            $this->load->view('member/vreqin', $data);
        } else {
            redirect('member/home');
        }
    }

    function dologin() {
        $this->form_validation->set_rules('un', 'Username', 'trim|required');
        $this->form_validation->set_rules('pwd', 'Tgllahir', 'trim|required');
        if ($this->form_validation->run()) {
            //$log = $this->auth->dosignin('wu_', $this->input->post('un'), $this->input->post('pwd'));
            $log = $this->auth->dosignreqin('rsdsIHSEnt.dbo.mr_pasien', $this->input->post('un'), $this->input->post('pwd'));
            if (!$log) {
                redirect('member/user');
            } else {
                redirect('member/home');
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
        }redirect('member/user', 'refresh');
    }

}
