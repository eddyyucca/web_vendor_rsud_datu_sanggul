<?php

class MY_Controller extends CI_Controller {
    
    var $rs, $qts, $data;
    function __construct() {
        parent::__construct();
        $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => 'ws001'), 'idsys')->row();
        $this->qts = $this->mcrud->getDataWhere('*', 'wquo', array('hide' => '0'), 'odr')->result();
        $this->lk = $this->mcrud->getDataWhere('*', 'wlinks', array('hide' => '0'), 'idsys')->result();
        $this->prm = $this->mcrud->getDataWhere('*', 'wpromo', array('hide' => '0'), 'odr')->result();
        $this->data = array('rs'=>  $this->rs,'qts'=>  $this->qts, 'lk'=>  $this->lk, 'prm'=>  $this->prm);
    }

}
