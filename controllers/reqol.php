<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class reqol extends MY_Controller {
    
    var $rs;
    
    function __construct() {
        parent::__construct();
        if (!$this->auth->is_loged_in()) {
           redirect('member/user', 'refresh');
        }
    }

    public function index() {
        $data = $this->data;
        $data['main'] = 'member/vreqin';
        $data['jsadd'] = '';
        $this->load->view('member/template', $data);
    }

/**     $this->rs = $this->mcrud->getDataWhere('*', 'wrs', array('idsys' => '1'), 'idsys')->row();
        $this -> output -> set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this -> output -> set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this -> output -> set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this -> output -> set_header("Pragma: no-cache");        
    }

    function index() {        
        if ($this -> auth -> is_signed_in()) {
            redirect('main');
        } else {
            $this -> signin();
        }
    }
    function signin() {
        $data = $this->data;
        $data['dt'] = $this->mcrud->getDataWhereLimit('*', 'IHSEnt.dbo.mr_pasien', array('idpasien' => 'mr1', 'tgllahir' => 'tgllhr'), 'idpasien', 1, 'bcek')->row();
        $data['nav'] = 'reqol'; 
        $data['content'] = 'view/rqtemplate';
        //$data['main'] = 'vreqin';
        $this->load->view('rqtemplate', $data);
            if ($this -> cart -> contents()) {
                $data['msg'] = '<div class="well well-sm"><ul><li>Silahkan sign in dengan username member Anda melanjutkan checkout.</li><ul> </div>';
                $this -> load -> view('template', $data);
            } else {
                $data['msg'] = '';
                $this -> load -> view('template', $data);
            }        
    }
 * 
 */
}
