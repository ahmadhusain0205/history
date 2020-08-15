<?php
class M_user extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
