<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function insert($form_data)
    {
        return $this->db->insert_batch('Student', $form_data);
    }

    public function gets_student_by_Month_Month_id($month_month_id)
    {
        $this->db->where('Month_Month_id', $month_month_id);
        $this->db->from('Student');
        $this->db->join('Month', 'Month.Month_id = Student.Month_Month_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_status($student_id, $array)
    {
        $this->db->where('Student_id', $student_id);
        return $this->db->update('Student', $array);
    }

    public function delete($student_id)
    {
        $this->db->where('Student_id', $student_id);
        return $this->db->delete('Student');
    }
}
