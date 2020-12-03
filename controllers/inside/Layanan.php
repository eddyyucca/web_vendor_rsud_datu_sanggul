<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
           redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['lyn'] = $this->mcrud->getData('*', 'wlyn', 'odr')->result();
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vlayanan';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'LYN', 'wlyn');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/layanan/save/' . $idsys);
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vlayanan_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('dsc', 'isi layanan', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = "./asset/img/lyn/";
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
                    $pic = $filename;
                }
            } else {
                $pic = '';
            }
            $data = array('idsys' => $idsys, 'ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'),
                'pic' => $pic, 'odr' => $this->input->post('odr'),'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('wlyn', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu layanan berhasil ditambahkan.</div>');
            redirect('inside/layanan');
        } else {
            $this->add();
        }
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wlyn', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/layanan/update/' . $idsys);
        $data['ttl'] = $edit->ttl;
        $data['dsc'] = $edit->dsc;
        $data['pic'] = $edit->pic;
        $data['odr'] = $edit->odr;
        $data['hide'] = $edit->hide;
        $data['chk'] = $edit->pic == '' ? '' : form_checkbox('del', 'del') . " tandai jika ingin menghapus gambar<br />";
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vlayanan_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('dsc', 'isi layanan', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $path_file = './asset/img/lyn/';

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
            $data = array('ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'),
                'pic' => $pic, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('wlyn', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu layanan telah diperbaharui.</div>');
            redirect('inside/layanan');
        } else {
            $this->edit($idsys);
        }
    }

    function delete($idsys) {
        $del = $this->mcrud->getDataWhere('*', 'wlyn', array('idsys' => $idsys), 'idsys')->row();
        $file = $del->pic;
        $path_file = './asset/img/lyn/';
        unlink($path_file . $file);
        $this->mcrud->delete('wlyn', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu layanan telah dihapus.</div>');
        redirect('inside/layanan');
    }

}
