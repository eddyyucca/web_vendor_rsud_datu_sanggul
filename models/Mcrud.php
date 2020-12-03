<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mcrud extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getData($column, $table, $order) {
        $this->db->select($column);
        $this->db->order_by($order);
        return$this->db->get($table);
    }

    function getDataLimit($column, $table, $order, $limit, $offset) {
        $this->db->select($column);
        $this->db->order_by($order);
        return $this->db->get($table, $limit, $offset);
    }

    function getDataWhere($column, $table, $where, $order) {
        $this->db->select($column);
        $this->db->order_by($order);
        return $this->db->get_where($table, $where);
    }

    function getDataWhereLimit($column, $table, $where, $order, $limit, $offset) {
        $this->db->select($column);
        $this->db->order_by($order);
        return $this->db->get_where($table, $where, $limit, $offset);
    }

    function getNumRow($table) {
        return $this->db->count_all($table);
    }

    function getNumRowWhere($table, $where) {
        return $this->db->get_where($table, $where)->num_rows();
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    function update($table, $where, $data) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($table, $where) {
        $this->db->delete($table, $where);
    }

    function manualquery($q) {
        return $this->db->query($q);
    }

    function manualquerywhere($q, $where) {
        return $this->db->query($q, $where);
    }

    function getIDsys($column, $_id, $table) {
        $last = $_id . date('ym');
        //$query = $this->db->query("SELECT $column FROM $table WHERE $column LIKE '" . $this->db->escape_like_str($last) . "%' ORDER BY $column DESC LIMIT 1");
        $query = $this->db->query("SELECT TOP 1 $column FROM $table WHERE $column LIKE '" . $this->db->escape_like_str($last) . "%' ORDER BY $column DESC");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $count = intval(substr($row->$column, 7) + 1);
            $id_ = $last . sprintf("%03s", $count);
        } else {
            $id_ = $last . sprintf("%03s", 1);
        }return $id_;
    }
    
    function getactv($table, $column, $_id, $_key) {
        $query = $this->db->query("SELECT $column FROM $table WHERE $_id LIKE '$_key' ");
        if ($query->num_rows() > 0) {
            $row = $query->row();
        } else {
            $row = '';
        } return $row;
    }

    function getMenu($table, $parent = 0) {
        $data = array();
        $result = $this->db->get_where($table, array('parent' => $parent));
        foreach ($result->result() as $row) {
            $data[] = array('id' => $row->idsys, 'cname' => $row->cname, 'uri' => $row->uri, 'parent' => $row->parent, 'actv' => $row->actv,
                'child' => $this->getMenu($table, $row->idsys));
        }return $data;
    }

    function aes256Encrypt($data) {
        $key = $this->config->item('encryption_key');
        if (32 !== strlen($key)) {
            $key = hash('SHA256', $key, true);
        }
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
    }

    function aes256Decrypt($data) {
        $key = $this->config->item('encryption_key');
        if (32 !== strlen($key)) {
            $key = hash('SHA256', $key, true);
        }
        $data_ = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
        $padding = ord($data_[strlen($data_) - 1]);
        return substr($data_, 0, -$padding);
    }


}