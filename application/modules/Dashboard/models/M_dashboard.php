<?php
class M_dashboard extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
}
