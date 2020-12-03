<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotes extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['quo'] = $this->mcrud->getData('*', 'wquo', 'dpost desc')->result();
        $data['main'] = 'inside/vquotes';
        $data['xxx'] = 'Insert';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'QUO', 'wquo');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/quotes/save/' . $idsys);
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vquotes_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('quotes', 'quotes', 'trim|required');
        $this->form_validation->set_rules('odr', 'no.urut', 'trim|numeric');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('idsys' => $idsys, 'quotes' => $this->input->post('quotes'),
                'odr' => $this->input->post('odr'), 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('wquo', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu quotes berhasil ditambahkan.</div>');
            redirect('inside/quotes');
        } else {
            $this->add();
        }
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wquo', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/quotes/update/' . $idsys);
        $data['quotes'] = $edit->quotes;
        $data['odr'] = $edit->odr;
        $data['hide'] = $edit->hide;
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vquotes_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('quotes', 'quotes', 'trim|required');
        $this->form_validation->set_rules('odr', 'no.urut', 'trim|numeric');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('quotes' => $this->input->post('quotes'), 'odr' => $this->input->post('odr'),
                'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('wquo', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu quotes telah diperbaharui.</div>');
            redirect('inside/quotes');
        } else {
            $this->edit($idsys);
        }
    }

    function delete($idsys) {
        $this->mcrud->delete('wquo', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu quotes telah dihapus.</div>');
        redirect('inside/quotes');
    }

}
