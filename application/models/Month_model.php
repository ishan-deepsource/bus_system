<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Month_model extends CI_Model {

	public function gets_month()
	{
		$this->db->from('Month');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($array)
	{
		return $this->db->insert('Month', $array);
	}

	public function get_month_by_id($month_id)
	{
		$this->db->where('Month_id', $month_id);
		$this->db->from('Month');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update($month_id, $array)
	{
		$this->db->where('Month_id', $month_id);
		return $this->db->update('Month', $array);		
	}

	public function delete($month_id)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$this->db->where('Month_id', $month_id);
		$status = $this->db->delete('Month');
		$this->db->db_debug = $db_debug;
		return $status;

	}
}
