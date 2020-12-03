<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->data;        
        $data['brt'] = $this->mcrud->getDataWhere('*', 'wbrt', array('hide' => '0'), 'dtn desc')->result();
        $data['ctg'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori')->result();
        $data['nav'] = 'berita';
        $data['main'] = 'vberita';
        $this->load->view('template', $data);
    }

    public function kategori($ctg) {
        $data = $this->data;
        $cari = $this->mcrud->getDataWhere('kategori', 'wbrt_ctg', array('idsys' => $ctg), 'kategori desc')->row();
        $data['brt'] = $this->mcrud->getDataWhere('*', 'wbrt', array('hide' => '0', 'kategori like' => '%' . $cari->kategori . '%'), 'dtn desc')->result();
        $data['ctg'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori')->result();
        $data['nav'] = 'berita';
        $data['main'] = 'vberita';
        $this->load->view('template', $data);
    }

    public function detail($idsys) {
        $data = $this->data;
        $data['brt'] = $this->mcrud->getDataWhere('*', 'wbrt', array('idsys' => $idsys, 'hide' => '0'), 'idsys')->row();
        $data['ctg'] = $this->mcrud->getData('*', 'wbrt_ctg', 'kategori')->result();
        $hit = $data['brt']->hint+1;
        $this->mcrud->update('wbrt', array('idsys' => $idsys), array('hint'=> $hit));
        $data['hint'] = $hit;
        $data['nav'] = 'berita';
        $data['main'] = 'vberita_dt';
        $this->load->view('template', $data);
    }

}
