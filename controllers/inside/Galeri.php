<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['gal'] = $this->mcrud->getData('*', 'wglr', 'dpost desc')->result();
        $data['main'] = 'inside/vgaleri';
        $data['xxx'] = 'Insert';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'GLR', 'wglr');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/galeri/save/' . $idsys);
        $data['kategori'] = $this->mcrud->getData('*', 'wglr_ctg', 'kategori')->result();
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vgaleri_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        $this->form_validation->set_rules('ctg[]', 'Kategori Berita', 'trim');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $dtn = $this->input->post('dtn') != "" ? date("Y-m-d H:i:s", strtotime($this->input->post('dtn'))) : $dpost;
            $ctg = $this->_get_ctg($this->input->post('ctg'));

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = "./asset/img/glr/";
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
                        'filename' => $filename, 'dtaken'=>$dtn,'kategori' => $ctg, 'hide' => $this->input->post('hide'), 
                        'tipe'=>'0','dpost' => $dpost, 'u_' => $u_);
                    $this->mcrud->insert('wglr', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu foto berhasil ditambahkan.</div>');
                    redirect('inside/galeri');
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
        $edit = $this->mcrud->getDataWhere('*', 'wglr', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/galeri/update/' . $idsys);
        $data['kategori'] = $this->mcrud->getData('*', 'wglr_ctg', 'kategori')->result();
        $data['ttl'] = $edit->ttl;
        $data['dsc'] = $edit->dsc;
        $data['dtn'] = date("Y-m-d", strtotime($edit->dtaken));
        $data['filename1'] = $edit->filename;
        $data['ctg'] = explode(';', $edit->kategori);
        $data['hide'] = $edit->hide;
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vgaleri_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }
    
    function update($idsys) {
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        $this->form_validation->set_rules('ctg[]', 'Kategori Berita', 'trim');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $dtn = $this->input->post('dtn') != "" ? date("Y-m-d H:i:s", strtotime($this->input->post('dtn'))) : $dpost;
            $ctg = $this->_get_ctg($this->input->post('ctg'));
            $path_file = './asset/img/glr/';

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
                    unlink($path_file . $this->input->post('filename'));
                    $filename = $this->upload->file_name;
                    $data = array('ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'),
                        'filename' => $filename, 'dtaken'=>$dtn,'kategori' => $ctg, 'hide' => $this->input->post('hide'), 
                        'tipe'=>'0','dpost' => $dpost, 'u_' => $u_);
                    $this->mcrud->update('wglr', array('idsys' => $idsys), $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu foto telah diperbaharui.</div>');
                    redirect('inside/galeri');
                }
            } else {
                $data = array('ttl' => $this->input->post('ttl'), 'dsc' => $this->input->post('dsc'), 
                    'filename' => $this->input->post('filename1'), 'dtaken'=>$dtn,'kategori' => $ctg,
                    'hide' => $this->input->post('hide'), 'tipe'=>'0','dpost' => $dpost, 'u_' => $u_);
                $this->mcrud->update('wglr', array('idsys' => $idsys), $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu foto telah diperbaharui.</div>');
                redirect('inside/galeri');
            }
        } else {
            $this->edit($idsys);
        }
    }
    
    function delete($idsys) {
        $del = $this->mcrud->getDataWhere('*', 'wglr', array('idsys' => $idsys), 'idsys')->row();
        $file = $del->filename;
        $path_file = './asset/img/glr/';
        unlink($path_file . $file);
        $this->mcrud->delete('wglr', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu foto telah dihapus.</div>');
        redirect('inside/galeri');
    }

    function kategori() {
        $data = $this->data;
        $data['ctg'] = $this->mcrud->getData('*', 'wglr_ctg', 'kategori desc')->result();
        $data['xxx'] = 'Insert Galeri';
        $data['main'] = 'inside/vgaleri_ctg';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function kategori_add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'CTG', 'wglr_ctg');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/galeri/kategori_save/' . $idsys);
        $data['xxx'] = 'Insert Galeri';
        $data['main'] = 'inside/vgaleri_ctg_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function kategori_save($idsys) {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('idsys' => $idsys, 'kategori' => $this->input->post('kategori'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('wglr_ctg', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu kategori berhasil ditambahkan.</div>');
            redirect('inside/galeri/kategori');
        } else {
            $this->kategori_add();
        }
    }

    function kategori_edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wglr_ctg', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/galeri/kategori_update/' . $idsys);
        $data['kategori'] = $edit->kategori;
        $data['xxx'] = 'Insert Galeri';
        $data['main'] = 'inside/vgaleri_ctg_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function kategori_update($idsys) {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('kategori' => $this->input->post('kategori'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('wglr_ctg', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu kategori berhasil diperbaharui.</div>');
            redirect('inside/galeri/kategori');
        } else {
            $this->kategori_add();
        }
    }

    function kategori_delete($idsys) {
        $this->mcrud->delete('wglr_ctg', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu kategori telah dihapus.</div>');
        redirect('inside/galeri/kategori');
    }

    private function _get_ctg($ctg) {
        $kategori = '';
        if (empty($ctg)) {
            $kategori = '';
        } else {
            foreach ($ctg as $v) {
                $kategori = $kategori . $v . ';';
            }
        }
        return $kategori;
    }

}
