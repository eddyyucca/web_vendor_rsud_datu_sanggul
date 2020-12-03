<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['brt'] = $this->mcrud->getData('*', 'wbrt', 'dtn desc')->result();
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vberita';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'BRT', 'wbrt');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/berita/save/' . $idsys);
        $data['kategori'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori')->result();
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Insert';
        $data['main'] = 'inside/vberita_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function save($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('ctn', 'isi berita', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        $this->form_validation->set_rules('ctg[]', 'Kategori Berita', 'trim');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $dtn = $this->input->post('dtn') != "" ? date("Y-m-d H:i:s", strtotime($this->input->post('dtn'))) : $dpost;
            $ctg = $this->_get_ctg($this->input->post('ctg'));

            if (!empty($_FILES['filename']['name']) && $_FILES['filename']['size'] > 0) {
                $config['upload_path'] = "./asset/img/brt/";
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
            $data = array('idsys' => $idsys, 'ttl' => $this->input->post('ttl'), 'ctn' => $this->input->post('ctn'),
                'dtn' => $dtn, 'pic' => $pic,'kategori' => $ctg, 'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('wbrt', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu berita berhasil ditambahkan.</div>');
            redirect('inside/berita');
        } else {
            $this->add();
        }
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wbrt', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/berita/update/' . $idsys);
        $data['kategori'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori')->result();
        $data['ttl'] = $edit->ttl;
        $data['ctn'] = $edit->ctn;
        $data['dtn'] = date("Y-m-d", strtotime($edit->dtn));
        $data['pic'] = $edit->pic;
        $data['ctg'] = explode(';', $edit->kategori);
        $data['hide'] = $edit->hide;
        $data['chk'] = $edit->pic == '' ? '' : form_checkbox('del', 'del') . " tandai jika ingin menghapus gambar<br />";
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vberita_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('ttl', 'judul', 'trim|required');
        $this->form_validation->set_rules('ctn', 'isi berita', 'trim|required');
        $this->form_validation->set_rules('hide', 'publish', 'trim|required');
        $this->form_validation->set_rules('ctg[]', 'Kategori Berita', 'trim');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $dtn = $this->input->post('dtn') != "" ? date("Y-m-d H:i:s", strtotime($this->input->post('dtn'))) : $dpost;
            $ctg = $this->_get_ctg($this->input->post('ctg'));
            $path_file = './asset/img/brt/';

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
            $data = array('ttl' => $this->input->post('ttl'), 'ctn' => $this->input->post('ctn'),
                'dtn' => $dtn, 'pic' => $pic, 'kategori' => $ctg,'hide' => $this->input->post('hide'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('wbrt', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu berita telah diperbaharui.</div>');
            redirect('inside/berita');
        } else {
            $this->edit($idsys);
        }
    }

    function delete($idsys) {
        $del = $this->mcrud->getDataWhere('*', 'wbrt', array('idsys' => $idsys), 'idsys')->row();
        $file = $del->pic;
        $path_file = './asset/img/brt/';
        unlink($path_file . $file);
        $this->mcrud->delete('wbrt', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu berita telah dihapus.</div>');
        redirect('inside/berita');
    }

    function kategori() {
        $data = $this->data;
        $data['ctg'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori desc')->result();
        $data['xxx'] = 'Insert Berita';
        $data['main'] = 'inside/vberita_ctg';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function kategori_add() {
        $data = $this->data;
        $data['nav'] = '';
        $idsys = $this->mcrud->getIDsys('idsys', 'CTG', 'wbrt_ctg');
        $data['idsys'] = $idsys;
        $data['action'] = base_url('inside/berita/kategori_save/' . $idsys);
        $data['xxx'] = 'Insert Berita';
        $data['main'] = 'inside/vberita_ctg_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function kategori_save($idsys) {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('idsys' => $idsys, 'kategori' => $this->input->post('kategori'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->insert('wbrt_ctg', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu kategori berhasil ditambahkan.</div>');
            redirect('inside/berita/kategori');
        } else {
            $this->kategori_add();
        }
    }
    
    function kategori_edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wbrt_ctg', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/berita/kategori_update/' . $idsys);
        $data['kategori'] = $edit->kategori;
        $data['xxx'] = 'Insert Berita';
        $data['main'] = 'inside/vberita_ctg_form';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }
    
    function kategori_update($idsys) {
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
        if ($this->form_validation->run()) {
            $dpost = date("Y-m-d H:i:s");
            $u_ = $this->auth->get_un();
            $data = array('kategori' => $this->input->post('kategori'), 'dpost' => $dpost, 'u_' => $u_);
            $this->mcrud->update('wbrt_ctg', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>satu kategori berhasil diperbaharui.</div>');
            redirect('inside/berita/kategori');
        } else {
            $this->kategori_add();
        }
    }

    function kategori_delete($idsys) {
        $this->mcrud->delete('wbrt_ctg', array('idsys' => $idsys));
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Satu kategori telah dihapus.</div>');
        redirect('inside/berita/kategori');
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
