<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inforesep extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
        $data = $this->data;
        $data['dok'] = $this->mcrud->getData('*', 'IHSEnt.dbo.OInfoRSP', 'nama')->result();
        $data['nav'] = 'inforesep';
        $data['main'] = 'vinfo_resep';
        $this->load->view('template', $data);
    }
}
