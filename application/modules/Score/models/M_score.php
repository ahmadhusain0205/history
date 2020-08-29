<?php
class M_score extends CI_Model
{
    function get_data($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get();
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
