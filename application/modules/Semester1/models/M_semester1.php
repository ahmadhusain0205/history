<?php
class M_semester1 extends CI_Model
{
    function get_data()
    {
        $this->db->SELECT('semester.id, id_course, course, sks, grade, semester');
        $this->db->FROM('semester');
        $this->db->JOIN('course', 'semester.id_course=course.id');
        $this->db->JOIN('score', 'semester.id_score=score.id');
        $this->db->where('semester', '1');
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
        return $this->db->get($table);
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
