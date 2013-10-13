<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Year_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($year)
	{
		$data = array('year'=>$year); 
		$this->db->insert('year',$data);
	}

	public function get()
	{
		$this->db->order_by('year');
		$query = $this->db->get('year');
		return $query->result_array();
	}
	
	
	public function delete($id)
	{
		$this->db->delete('year',array('id'=>$id));	
	}
	
	
	public function checkYear($year)
	{
		$this->db->where('year',$year);
		$query = $this->db->get('year');

		return $query->result_array();
	}	
	
}
	