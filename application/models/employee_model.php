<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
	var $DB_pko_azot;
	var $DB_prize;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_listEmployee()
	{
		$this->DB_pko_azot = $this->load->database('pko_azot', TRUE); 
		$this->DB_pko_azot->select('Family, Name, Patronymic');	
		$this->DB_pko_azot->where('id <> 206');
		$this->DB_pko_azot->order_by('Family');
		$query = $this->DB_pko_azot->get('employee');
		return $query->result_array();
	}
		

	public function add($name, $date_birth, $date_work)
	{
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$data = array(
					'name'=>$name,
					'date_birth'=>$date_birth,
					'date_work'=>$date_work
					); 

		$this->DB_prize->insert('employee',$data);
	}

	public function get()
	{
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$this->DB_prize->order_by('name');
		$query = $this->DB_prize->get('employee');
		return $query->result_array();
	}

	public function delete($id)
	{
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$this->DB_prize->delete('employee',array('id'=>$id));	
	}
	
	
	public function update($name, $date_birth, $date_work, $comma_separated)
	{
		$data = array(
			'name'=>$name,
			'date_birth'=>$date_birth,
			'date_work'=>$date_work
			);
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$this->DB_prize->where_in('id',$comma_separated);
		$this->DB_prize->update('employee',$data);
	}
	
	public function checkEmployee($name)
	{
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$this->DB_prize->where('name',$name);
		$query = $this->DB_prize->get('employee');
		return $query->result_array();
	}
	
	public function checkEmptyDataEmployee($id)
	{
		$this->DB_prize = $this->load->database('prize', TRUE); 
		$this->DB_prize->where('id_employee', $id);
		$query = $this->DB_prize->get('main');

		return $query->result_array();
	}

}