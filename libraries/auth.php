<?php

class auth {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
    }

    function dosignin($table, $un, $pwd) {
        $query = $this->CI->db->get_where($table, array('un' => $un));
        if ($query->num_rows() == 0) {
            $this->CI->session->set_flashdata('logmsg', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-warning"></i> Username dan atau Password Anda salah !</div>');
            return FALSE;
        } else {
            $row_ = $query->row();
            $pwd_ = sha1($this->aes256Encrypt($pwd));           
            if ($row_->pwd == $pwd_ && $row_->stt_aktif == '1') {
            $session_data = array('us01' => $row_->idsys, 'us02' => $row_->un, 'us04' => TRUE);
            $this->CI->session->set_userdata($session_data);
            return TRUE;
            } else {
                $this->CI->session->set_flashdata('logmsg', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-warning"></i> Username dan atau Password Anda salah !</div>');
                return FALSE;
            }
        }
    }

    function is_signed_in() {
        if ($this->CI->session->userdata('un') == '' && $this->CI->session->userdata('isLogin') == FALSE) {
            return FALSE;
        }return TRUE;
    }
    
    function is_loged_in() {
        if ($this->CI->session->userdata('us02') == '' && $this->CI->session->userdata('us04') == FALSE) {
            return FALSE;
        }return TRUE;
    }

    function dologout() {
        $this->CI->session->set_userdata(array('us01' => '', 'us02' => '', 'us04' => FALSE));
        $this->CI->session->sess_destroy();
    }

    function aes256Encrypt($data) {
        $key = $this->CI->config->item('encryption_key');
        if (32 !== strlen($key)) {
            $key = hash('SHA256', $key, true);
        }
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
    }

    function get_unid() {
        return $this->CI->session->userdata('us01');
    }

    function get_un() {
        return $this->CI->session->userdata('us02');
    }

    function get_untp() {
        return $this->CI->session->userdata('us03');
    }
    function get_unname() {
        $nama = $this->CI->db->query('SELECT nama FROM us WHERE un = ?', array('un' => $this->CI->session->userdata('us02')))->row();
        return $nama->nama;
    }
    
    //**ReqOnline Member Only**//
    function dosignreqin($table, $un, $pwd) {
        $query = $this->CI->db->get_where($table, array('idpasien' => $un));
        if ($query->num_rows() == 0) {
            $this->CI->session->set_flashdata('logmsg', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-warning"></i> No.Rekam Medis dan atau Tgl.Lahir Anda salah !</div>');
            return FALSE;
        } else {
            $row_ = $query->row();
            //$pwd_ = sha1($this->aes256Encrypt($pwd));           
            if ($row_->tgllahir == $pwd_ && $row_->idpasien == $un) {
            $session_data = array('us01' => $row_->idpasien, 'us02' => $row_->tgllahir, 'us04' => TRUE);
            $this->CI->session->set_userdata($session_data);
            echo Benar;
            return TRUE;
            } else {
                $this->CI->session->set_flashdata('logmsg', '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-warning"></i> No.Rekam Medis dan atau Tgl.Lahir Anda salah !</div>');
                return FALSE;
            }
        }
    }

    function is_logreq_in() {
        if ($this->CI->session->userdata('idpasien') == '' && $this->CI->session->userdata('tgllahir') == FALSE) {
            return FALSE;
        }return TRUE;
    }
    
}

?>
