<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infojadwal extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
        $data = $this->data;
        $data['jdw'] = $this->mcrud->manualquery('SELECT hari, keterangan, user_, b.* '
            .' FROM IHSEnt.dbo.mr_dkonsul a INNER JOIN IHSEnt.dbo.mr_dkonsul_i b '
            .' ON a.idsistem=b.idsistem')->result();                
        $data['nav'] = 'infojadwal';        
        $data['main'] = 'vinfo_jp';
        $this->load->view('template', $data);
    }
}
