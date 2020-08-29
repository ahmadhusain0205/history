<?php
class M_course extends CI_Model
{
    function get_data($table)
    {
        $this->db->select('course.id, id_user, course, user.username, course.sks');
        $this->db->from($table);
        $this->db->join('user', 'user.id = ' . $table . '.id_user');
        if ($this->session->userdata('status') == 'user_login') {
            $this->db->where('id_user', $this->session->userdata('id'));
        }
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
