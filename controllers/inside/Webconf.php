<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webconf extends MY_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
            redirect('inside/user', 'refresh');
        }
    }

    function index() {
        $data = $this->data;
        $data['wrs'] = $this->mcrud->getData('*', 'wrs', 'idsys')->result();
        $data['main'] = 'inside/vwebconf';
        $data['xxx'] = 'Edit';
        $data['jsadd'] = '';
        $this->load->view('inside/template', $data);
    }

    function edit($idsys) {
        $data = $this->data;
        $data['nav'] = '';
        $data['idsys'] = $idsys;
        $edit = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => $idsys), 'idsys')->row();
        $data['action'] = base_url('inside/webconf/update/' . $idsys);
        $data['jns'] = $this->mcrud->getData('*', 'IHSEnt.dbo.m_jenisrs', 'jenisrs')->result();
        $data['rsakronim'] = $edit->rsakronim;
        $data['rsname'] = $edit->rsname;
        $data['jnsrs'] = $edit->rstype . '__' . $edit->rstype2;
        $data['rsregion'] = $edit->rsregion;
        $data['rsaddres'] = $edit->rsaddres;
        $data['rsphone'] = $edit->rsphone;
        $data['rsphonegd'] = $edit->rsphonegd;
        $data['rsfax'] = $edit->rsfax;
        $data['rscall'] = $edit->rscall;
        $data['rssms'] = $edit->rssms;
        $data['rsmail'] = $edit->rsmail;
        $data['rsembed'] = $edit->rsembed;
        $data['rslogo1'] = $edit->rslogo1;
        $data['msg1'] = '';
        $data['chk2'] = $edit->rslogo2 == '' ? '' : form_checkbox('del', 'del') . " tandai jika ingin menghapus gambar<br />";
        $data['msg2'] = '';
        $data['xxx'] = 'Edit';
        $data['main'] = 'inside/vwebconf_form';
        $data['jsadd'] = 'inside/pro';
        $this->load->view('inside/template', $data);
    }

    function update($idsys) {
        $this->form_validation->set_rules('rsname', 'nama RS', 'trim|required');
        $this->form_validation->set_rules('rsakronim', 'akronim', 'trim|required');
        $this->form_validation->set_rules('rsaddres', 'alamat', 'trim|required');
        $this->form_validation->set_rules('jnsrs', 'jenis RS', 'trim|required');
        $this->form_validation->set_rules('rsregion', 'kapubaten/kota', 'trim|required');
        $this->form_validation->set_rules('rsphone', 'telepon', 'trim|required');
        $this->form_validation->set_rules('rsphonegd', 'telepon IGD', 'trim|required');
        $this->form_validation->set_rules('rsfax', 'fax', 'trim|required');
        $this->form_validation->set_rules('rscall', 'call center', 'trim|required');        
        $this->form_validation->set_rules('rssms', 'sms center', 'trim');
        $this->form_validation->set_rules('rslogo1', 'logo kabupaten', 'trim|required');

        if ($this->form_validation->run()) {
            $jns = explode('__', $this->input->post('jnsrs'));
            $rstype = $jns[0];
            $rstype1 = $jns[1];
            $rslogo1 = $this->updatelogo('rslogo1_', $this->input->post('rslogo1'), $idsys);
            $this->updatebg($idsys,'bg');
            $this->updatebg($idsys,'ft');

            $data = array('rsname' => $this->input->post('rsname'), 'rsakronim' => $this->input->post('rsakronim'),
                'rsaddres' => $this->input->post('rsname'), 'rstype' => $rstype, 'rstype2' => $rstype1,
                'rsregion' => $this->input->post('rsregion'), 'rsaddres' => $this->input->post('rsaddres'),
                'rsphone' => $this->input->post('rsphone'), 'rsphonegd' => $this->input->post('rsphonegd'),
                'rsfax' => $this->input->post('rsfax'), 'rscall' => $this->input->post('rscall'),
                'rssms' => $this->input->post('rssms'),'rsmail' => $this->input->post('rsmail'),
                'rsembed' => $this->input->post('rsembed'), 'rslogo1' => $rslogo1                );
            $this->mcrud->update('wrs', array('idsys' => $idsys), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>konfigurasi telah diperbaharui.</div>');
            redirect('inside/webconf');
        } else {
            $this->edit($idsys);
        }
    }

    function updatelogo($nu, $file, $idsys) {
        $pic = '';
        if (!empty($_FILES[$nu]['name']) && $_FILES[$nu]['size'] > 0) {
            $config['upload_path'] = "./asset/img/";
            $config['allowed_types'] = 'gif|png|jpg|JPEG';
            $config['encrypt_name'] = TRUE;
            $config['file_name'] = url_title($nu);
            $config['max_size'] = '1024';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload($nu)) {
                $error = $this->upload->display_errors('<span class="error">', '</span>');
                $this->session->set_flashdata($nu, '<span class="error">' . $error . '</span>');
                $this->edit($idsys);
            } else {
                unlink("./asset/img/" . $file);
                $filename = $this->upload->file_name;
                $pic = $filename;
            }
        } else {
            $pic = $file;
        }
        return $pic;
    }

    function updatebg($idsys, $bg) {
        if (!empty($_FILES[$bg]['name']) && $_FILES[$bg]['size'] > 0) {
            $config['upload_path'] = "./asset/img/";
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = url_title($bg);
            $config['overwrite'] = TRUE;
            $config['max_size'] = '1024';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload($bg)) {
                $error = $this->upload->display_errors('<span class="error">', '</span>');
                $this->session->set_flashdata('err', '<span class="error">' . $error . '</span>');
                $this->edit($idsys);
            }
        }
    }
}
    