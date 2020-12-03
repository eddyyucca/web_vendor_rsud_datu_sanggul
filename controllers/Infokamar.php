<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infokamar extends MY_Controller {

    var $rs;

    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
    }

    public function index() {
        $data = $this->data;
//        $data['t0'] = $this->mcrud->manualquery('select count(status_) as total from wkmr where status_= 0 ')->row()->total;
//        $data['t1'] = $this->mcrud->manualquery('select count(status_) as total from wkmr where status_= 1 ')->row()->total;
//        $data['t2'] = $this->mcrud->manualquery('select count(status_) as total from wkmr where status_= 2 ')->row()->total;
//        $data['kmr'] = $this->mcrud->getData('*', 'wkmr', 'nama')->result();
        $data['t0'] = $this->mcrud->manualquery('select count(status_) as total from IHSEnt.dbo.mr_room where status_= 0 ')->row()->total;
        $data['t1'] = $this->mcrud->manualquery('select count(status_) as total from IHSEnt.dbo.mr_room where status_= 1 ')->row()->total;
        $data['t2'] = $this->mcrud->manualquery('select count(status_) as total from IHSEnt.dbo.mr_room where status_= 2 ')->row()->total;
        $data['kmr'] = $this->mcrud->manualquery('SELECT a.*, NamaKelompok as kelas FROM IHSEnt.dbo.mr_room a INNER JOIN IHSEnt.dbo.mr_roomkel b '
                . 'ON a.idKelompok=b.idKelompok order by nama')->result();
        $data['nav'] = 'infokamar';
        $data['main'] = 'vinfo_kamar';
        $this->load->view('template', $data);
    }
}
