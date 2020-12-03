<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
           redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['inf'] = $this->mcrud->getData('*', 'winfo', 'dpost desc')->result();
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vpengumuman';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'INF', 'winfo');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/pengumuman/save/' . $idsys);
        $data['pic'] = '';
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vpengumuman_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('ctn', 'isi pengumuman', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = "./asset/img/brt/";
                $config['allowed_types'] = 'gif|png|jpg|jpeg|doc|pdf|docx|xls|xlsx|rar|zip';
                $config['encrypt_name'] = TRUE;
                $config['file_name'] = url_title($this->input->post('filename'));
                $config['max_size'] = '2024';

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('filename')) {
                    $error = $this->upload->display_errors('<span class="error">', '</span>');
                    $this->session->set_flashdata('err', '<span class="error">' . $error . '</span>');
                    $this->add();
                } else {
                    $filename = $this->upload->file_name;
                    $pic = $filename;
                }
            } else {
                $pic = '';
            }
            $data = array('idsys' => $idsys, 'ttl' => $this->input->post('ttl'), 'ctn' => $this->input->post('ctn'),
                 'pic' => $pic, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('winfo', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu pengumuman berhasil ditambahkan.</div>');
            redirect('inside/pengumuman');
        } else {
            $this->add();
        }
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'winfo', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/pengumuman/update/' . $idsys);
        $data['ttl'] = $edit->ttl;
        $data['ctn'] = $edit->ctn;
        $data['pic'] = $edit->pic;
        $data['hide'] = $edit->hide;
        $data['chk'] = $edit->pic == '' ? '' : form_checkbox('del', 'del') . " tandai jika ingin menghapus file<br />";
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vpengumuman_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('ctn', 'isi pengumuman', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $dtn = $this->input->post('dtn') != "" ? date("Y-m-d H:i:s", strtotime($this->input->post('dtn'))) : $dpost;
            $path_file = './asset/img/brt/';

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = $path_file;
                $config['allowed_types'] = 'gif|png|jpg|jpeg|doc|pdf|docx|xls|xlsx|rar|zip';
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
                    $pic = $filename;
                }
            } else {
                if ($this->input->post('del') == 'del') {
                    unlink($path_file . $this->input->post('pic'));
                    $pic = NULL;
                } else {
                    $pic = $this->input->post('pic');
                }
            }
            $data = array('ttl' => $this->input->post('ttl'), 'ctn' => $this->input->post('ctn'),
                'pic' => $pic, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('winfo', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu pengumuman telah diperbaharui.</div>');
            redirect('inside/pengumuman');
        } else {
            $this->edit($idsys);
        }
    }

    function delete($idsys) {
        $del = $this->mcrud->getDataWhere('*', 'winfo', array('idsys' => $idsys), 'idsys')->row();
        $file = $del->pic;
        $path_file = './asset/img/brt/';
        unlink($path_file . $file);
        $this->mcrud->delete('winfo', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu pengumuman telah dihapus.</div>');
        redirect('inside/pengumuman');
    }

}
