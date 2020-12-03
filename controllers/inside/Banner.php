<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['ban'] = $this->mcrud->getData('*', 'wban', 'dpost desc')->result();
        $data['main'] = 'inside/vbanner';
        $data['xxx'] = 'Insert';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'BAN', 'wban');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/banner/save/' . $idsys);
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vbanner_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('odr', 'no.urut', 'trim|numeric');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = "./asset/img/bnr/";
                $config['allowed_types'] = 'gif|png|jpg|JPEG';
                $config['encrypt_name'] = TRUE;
                $config['file_name'] = url_title($this->input->post('filename'));
                $config['max_size'] = '1024';

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('filename')) {
                    $error = $this->upload->display_errors('<span class="error">', '</span>');
                    $this->session->set_flashdata('err', '<span class="error">' . $error . '</span>');
                    $this->add();
                } else {
                    $filename = $this->upload->file_name;
                    $data = array('idsys' => $idsys, 'ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'),
                        'odr' => $this->input->post('odr'), 'pic' => $filename, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
                    $this->mcrud->insert('wban', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu banner berhasil ditambahkan.</div>');
                    redirect('inside/banner');
                }
            } else {
                $this->session->set_flashdata('err', '<span class="error">Gambar belum dipilih.</span>');
                $this->add();
            }
        } else {
            $this->add();
        }
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wban', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/banner/update/' . $idsys);
        $data['ttl'] = $edit->ttl;
        $data['dsc'] = $edit->dsc;
        $data['odr'] = $edit->odr;
        $data['pic'] = $edit->pic;
        $data['hide'] = $edit->hide;
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vbanner_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('odr', 'no.urut', 'trim|numeric');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $path_file = './asset/img/bnr/';

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = $path_file;
                $config['allowed_types'] = 'gif|png|jpg|JPEG';
                $config['encrypt_name'] = TRUE;
                $config['file_name'] = url_title($this->input->post('filename'));
                $config['max_size'] = '1024';

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('filename')) {
                    $error = $this->upload->display_errors('<span class="error">', '</span>');
                    $this->session->set_flashdata('err', '<span class="error">' . $error . '</span>');
                    $this->edit($idsys);
                } else {
                    unlink($path_file . $this->input->post('pic'));
                    $filename = $this->upload->file_name;
                    $data = array('ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'), 'odr' => $this->input->post('odr'),
                        'pic' => $filename, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
                    $this->mcrud->update('wban', array('idsys' => $idsys), $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu banner telah diperbaharui.</div>');
                    redirect('inside/banner');
                }
            } else {
                $data = array('ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'), 'odr' => $this->input->post('odr'),
                    'pic' => $this->input->post('pic'), 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
                $this->mcrud->update('wban', array('idsys' => $idsys), $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu banner telah diperbaharui.</div>');
                redirect('inside/banner');
            }
        } else {
            $this->edit($idsys);
        }
    }

    function delete($idsys) {
        $del = $this->mcrud->getDataWhere('*', 'wban', array('idsys' => $idsys), 'idsys')->row();
        $file = $del->pic;
        $path_file = './asset/img/bnr/';
        unlink($path_file . $file);
        $this->mcrud->delete('wban', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu banner telah dihapus.</div>');
        redirect('inside/banner');
    }

}
