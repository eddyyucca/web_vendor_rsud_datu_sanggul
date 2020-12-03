<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('m_pdf');
    }

    public function index() {
        $data = $this->data;
        $data['action'] = base_url('pendaftaran/findPasien');
        $data['nav'] = 'pendaftaran';
        $data['main'] = 'vpendaftaran';
        $this->load->view('template', $data);
    }

    function findPasien() {
        $this->form_validation->set_rules('idkartu', 'Nomor Kartu', 'trim|required');
        $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
        if ($this->form_validation->run()) {
            $id_ = $this->input->post('idkartu');
            $tgl = $this->input->post('tgllahir');
            $cek = $this->mcrud->getDataWhere('*', 'IHSEnt.dbo.mr_pasien', array('idpasien' => $id_, 'tgllahir' => $tgl))->row();
            if (!empty($cek)) {
                redirect('pendaftaran/greeting/' . $id_);
            } else {
                $this->session->set_flashdata('_msg', '<i class="fa fa-exclamation-triangle fa-2x"></i>&nbsp;&nbsp;Nomor Rekam Medis dan/atau Tanggal Lahir Salah');
                redirect('pendaftaran');
            }
        } else {
            $this->index();
        }
    }

    function greeting($id_) {
        $data = $this->data;
        $g = $this->greet();
        $data['poli'] = $this->mcrud->getDataWhere('*', 'IHSEnt.dbo.mr_kelpoli', array('fg_sp' => '0'), 'nama_poli')->result();
        $greet = $this->mcrud->getDataWhere('*', 'IHSEnt.dbo.z_greeting', array('jam' => $g), 'jam')->row();
        $data['pasien'] = $this->mcrud->manualquery("SELECT * FROM IHSEnt.dbo.CekNamaPasien('$id_')")->row();
        if (!empty($greet)) {
            $data['greeting1'] = $greet->greeting1;
            $data['greeting2'] = $greet->greeting2;
        } else {
            $data['greeting1'] = '';
            $data['greeting2'] = '';
        }
        $data['action'] = base_url('pendaftaran/getAntrian/' . $id_);
        $data['nav'] = 'pendaftaran';
        $data['main'] = 'vgreeting';
        $this->load->view('template', $data);
    }

    function greet() {
        $time = date('G');
        if ($time > 0 && $time <= 10) {
            $g = '10:00';
        } else if ($time > 10 && $time <= 15) {
            $g = '15:00';
        } else if ($time > 15 && $time <= 18) {
            $g = '18:00';
        } else {
            $g = '19:00';
        }
        return $g;
    }

    function getAntrian($id_) {
        $this->form_validation->set_rules('kdpoli', 'Poli Tujuan', 'trim|required');
        $this->form_validation->set_rules('tgldaftar', 'Untuk Tgl.Pendaftaran', 'trim|required');
        if ($this->form_validation->run()) {
            $data = $this->data;
            $pasien = $this->mcrud->manualquery("SELECT * FROM IHSEnt.dbo.CekNamaPasien('$id_')")->row();
            $data['tglreg'] = $this->input->post('tgldaftar');
            $data['idpasien'] = $pasien->idpasien;
            $data['nama'] = $pasien->nama;
            $data['poli'] = $this->input->post('kdpoli');
            $data['noantri'] = $this->getNum($this->input->post('tgldaftar')); 
            $data['nav'] = 'pendaftaran';
            $data['main'] = 'vantrian';
            $this->load->view('template', $data);
        } else {
            $this->greeting($id_);
        }
    }
    
    function getNum($x) {
//        if ($x > date('Y-m-d') ){
//            $dataseq = $this->mcrud->getDataWhere('*', 'rsdsQue.dbo.dbQue', array('tgl' => $x), 'seqno desc')->row();            
//            $i = !empty($dataseq) ? $dataseq->seqno+1 : 1;
//            
//            $que0_ = '0000'.strval($i);
//            $init = 'A ';
//            $que_ = $init.substr($que0_, -3);
//            $kel = '0';
//            $fg = '0';
//            $datai= array('tgl' => $x, 'seqno' => $i, 'kel_' => $kel, 'inisial' => $init, 'que_' => $que_, 'fgdone' => $fg);
//            $this->mcrud->insert('rsdsQue.dbo.dbQue',$datai);
//            return $que_;
//        } else {
            //$str = file_get_contents('http://192.168.11.2/qumatic/standard/api/intkiosk?id=0');
            $str = file_get_contents('http://localhost:8081/qumatic/standard/api/intkiosk?id=0&date='.$x);
            $json = json_decode($str, true);
            $data['noantri'] = $json['data'];
            return $json['data'];
 //       }
    }

    function save($param) {
        $x = explode('__', $param);
        $data['tglreg'] = $x[0];
        $data['idpasien'] = $x[2];
        $data['nama'] = str_replace('%20', ' ', $x[3]);//$x[3];
        $data['poli'] = str_replace('%20', ' ', $x[4]);
        $data['noantri'] = str_replace('%20', ' ', $x[1]);//$x[1];
        $this->load->view('main/vantrian_pdf', $data, true);
           
        $pdf = $this->m_pdf->load();        
        $pdf->allow_charset_conversion = true;  
        $pdf->charset_in = 'UTF-8';
        $html = $this->load->view('main/vantrian_pdf', $data, true);
        $pdf->WriteHTML($html);
        $output = 'Q'.$idpasien . date('Y_m_d_H_i_s') . '.pdf';
        $pdf->Output("$output", 'I');
    }
}
