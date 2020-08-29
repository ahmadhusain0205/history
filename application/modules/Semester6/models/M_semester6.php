<?php
class M_semester6 extends CI_Model
{
    function get_data()
    {
        $this->db->SELECT('semester.id, id_course, username, semester.id_user, course, sks, grade, semester');
        $this->db->FROM('semester');
        $this->db->JOIN('course', 'semester.id_course=course.id');
        $this->db->JOIN('score', 'semester.id_score=score.id');
        $this->db->JOIN('user', 'semester.id_user=user.id');
        $this->db->where('semester', '6');
        if ($this->session->userdata('status') == 'user_login') {
            $this->db->where('semester.id_user', $this->session->userdata('id'));
        }
        return $this->db->get();
    }
    function get_all()
    {
        $this->db->SELECT('semester.id, id_course, course, sks, grade, semester');
        $this->db->FROM('semester');
        $this->db->JOIN('course', 'semester.id_course=course.id');
        $this->db->JOIN('score', 'semester.id_score=score.id');
        $this->db->Order_By('Semester', 'ASC');
        return $this->db->get();
    }
    function get($table)
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
    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
