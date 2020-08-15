<?php
class M_register extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
