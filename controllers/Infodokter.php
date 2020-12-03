<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infodokter extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
        $data = $this->data;
        $data['dok'] = $this->mcrud->getData('*', 'IHSEnt.dbo.mr_dokter', 'nama')->result();
        $data['nav'] = 'infodokter';
        $data['main'] = 'vinfo_dokter';
        $this->load->view('template', $data);
    }
}
