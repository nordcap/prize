<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

/**
* 
* @param tinyint $employee - сотрудник
* @param tinyint $prize - награда
* @param tinyint $year - год награждения
* 
*/
	public function add($employee, $prize, $year)
	{
		$data = array(
			'id_employee'=>$employee,
			'id_prize'=>$prize,
			'id_year'=>$year,		
		);
		$this->db->insert('main',$data);
	}

/**
* @return все записи таблицы
* 
*/
/*	public function get()
	{
		$this->db->select('main.id, employee.name AS employee, prize.short_name AS prize, year.year AS year');
		$this->db->from('main');
		$this->db->join('employee', 'main.id_employee=employee.id', 'inner');
		$this->db->join('prize', 'main.id_prize=prize.id', 'inner');
		$this->db->join('year', 'main.id_year=year.id', 'inner');
		$this->db->order_by('employee');
		$this->db->group_by('employee.id');
		$query = $this->db->get();
		return $query->result_array();
	}*/
	
/**
* 
* @param string $employee - сотрудник по которому ведется поиск
* 
*/	
	public function find_employee($employee)
	{
		$this->db->select('main.id, prize.name AS name, prize.short_name AS short_name, year.year AS year');
		$this->db->from('main');
		$this->db->join('employee', 'main.id_employee=employee.id', 'inner');
		$this->db->join('prize', 'main.id_prize=prize.id', 'inner');
		$this->db->join('year', 'main.id_year=year.id', 'inner');
		$this->db->where('employee.name',$employee);
		$this->db->order_by('year');
		$query = $this->db->get();
		return $query->result_array();			
	}
	
/**
* 
* @param array $checkbox_id  выделенные строки таблицы
* @param tinyint $id_prize выбранная награда
* @param tinyint $id_year выбранный год
* 
*/	
	public function edit($checkbox_id, $id_prize, $id_year)
	{
		$comma = implode(',',$checkbox_id);
		$data = array(
					'id_prize'	=> $id_prize,
					'id_year'	=> $id_year		
		);
		
		$this->db->where_in('id',$comma);
		$this->db->update('main',$data);
	}
	
/**
* @return array получить всех награжденных
* 
*/	
	public function get_list_name()
	{
		$this->db->select('employee.name AS name');
		$this->db->from('main');
		$this->db->join('employee', 'main.id_employee=employee.id', 'inner');
		$this->db->order_by('name');
		$this->db->group_by('employee.id');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
/**
* 
* @param string $employee - сотрудник
* @param string $year - год
* 
*/	
	public function get_from_name($employee, $year)
	{
		$this->db->select('prize.short_name AS prize');
		$this->db->from('main');
		$this->db->join('employee', 'main.id_employee=employee.id', 'inner');
		$this->db->join('prize', 'main.id_prize=prize.id', 'inner');
		$this->db->join('year', 'main.id_year=year.id', 'inner');
		$this->db->where('employee.name',$employee);
		$this->db->where('year.year',$year);
		$query = $this->db->get();
		return $query->result_array();		
	}
/**
* 
* @param tinyint $id ид
* 
*/	
	public function delete($name)
	{
		$sql = "DELETE main FROM main, employee WHERE main.id_Employee = employee.id AND employee.name = ?";
		$this->db->query($sql, array($name));
	}
	
}
	