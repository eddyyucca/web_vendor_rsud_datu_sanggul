<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->data;
        $data['glr'] = $this->mcrud->getDataWhere('*', 'wglr', array('hide' => '0', 'tipe' => '0'), 'dtaken desc')->result();
        $data['ctg'] = $this->mcrud->getData('*', 'wglr_ctg', 'kategori')->result();
        $data['nav'] = 'galeri';
        $data['main'] = 'vgaleri';
        $this->load->view('template', $data);
    }

    public function kategori($ctg) {
        $data = $this->data;
        $cari = $this->mcrud->getDataWhere('kategori', 'wglr_ctg', array('idsys' => $ctg), 'kategori desc')->row();
        $data['glr'] = $this->mcrud->getDataWhere('*', 'wglr', array('hide' => '0', 'kategori like' => '%' . $cari->kategori . '%'), 'dtaken desc')->result();
        $data['ctg'] = $this->mcrud->getData('*', 'wglr_ctg', 'kategori')->result();
        $data['nav'] = 'galeri';
        $data['main'] = 'vgaleri';
        $this->load->view('template', $data);
    }

    public function video() {
        $data = $this->data;
        $data['glr'] = $this->mcrud->getDataWhere('*', 'wglr', array('hide' => '0', 'tipe' => '1'), 'dtaken desc')->result();
        $data['nav'] = 'galeri';
        $data['main'] = 'vgaleri_v';
        $this->load->view('template', $data);
    }

}
