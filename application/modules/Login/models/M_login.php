<?php
class M_login extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
