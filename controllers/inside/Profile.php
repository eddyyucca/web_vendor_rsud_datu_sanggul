<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        //$data['dt'] = $this->mcrud->getData('*', 'm_rs', 'namars')->result();
        $data['pr'] = $this->mcrud->getData('*', 'wprofile', 'idsys')->result();
        $data['main'] = 'inside/vprofile';
        $data['xxx'] = 'Insert';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wprofile', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/profile/update/' . $idsys);
        $data['visi'] = $edit->visi;
        $data['misi'] = $edit->misi;
        $data['sejarah'] = $edit->sejarah;
        $data['prestasi'] = $edit->prestasi;
        $data['pic'] = $edit->pic;
        $data['chk'] = '';
        $data['msg'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vprofile_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $path_file = './asset/img/';

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
        $data = array(
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'sejarah' => $this->input->post('sejarah'),
            'prestasi' => $this->input->post('prestasi'),
            'pic' => $pic);
        $this->mcrud->update('wprofile', array('idsys' => $idsys), $data);
        redirect('inside/profile');
    }

}
