<?php
class M_profile extends CI_Model
{
    function get_data($table)
    {
        $this->db->SELECT('*');
        $this->db->FROM($table);
        $this->db->WHERE('username', $this->session->userdata('username'));
        return $this->db->get();
    }
}
