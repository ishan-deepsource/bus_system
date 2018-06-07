<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address_model extends CI_Model {

    public function insert($array)
    {
        return $this->db->insert('Address', $array);
    }

    public function gets_address()
    {
        $this->db->from('Address');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_address_by_student_name($address_student_name)
    {
        $this->db->where('Address_Student_name', $address_student_name);
        $this->db->from('Address');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete($address_id)
    {
        $this->db->where('Address_id', $address_id);
        return $this->db->delete('Address');
    }

    public function get_address_by_id($address_id)
    {
        $this->db->where('Address_id', $address_id);
        $this->db->from('Address');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($address_id, $array)
    {
        $this->db->where('Address_id', $address_id);
        return $this->db->update('Address', $array);
    }
	
}
