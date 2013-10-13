<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prize_model extends CI_Model 
{
	public  function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
/**
* 
* @param varchar $short_name аббревиатура
* @param varchar $name наименование награды
* @param varchar $comment комментарий
* 
*/
	public function add($short_name, $name, $comment)
	{
		$data = array(
			'short_name'=>$short_name,
			'name'=>$name,
			'comment'=>$comment,		
		);

		$this->db->insert('prize',$data);
	}

/**
* @return все записи таблицы
* 
*/
	public function get()
	{
		$this->db->order_by('short_name');
		$query = $this->db->get('prize');
		return $query->result_array();
	}
	
/**
* 
* @param tinyint $id ид
* 
*/	
	public function delete($id)
	{
		$this->db->delete('prize',array('id'=>$id));	
	}
	


	public function update($short_name, $name, $comment, $comma_separated)
	{
		$data = array(
			'short_name' 	=> $short_name,
			'name' 			=> $name,
			'comment' 		=> $comment			
		);
		$this->db->where_in('id',$comma_separated);
		$this->db->update('prize',$data);
	}
	
/**
* 
* @param varchar $name наименование награды
* 
*/	
	public function checkPrize($name)
	{
		$this->db->where('short_name', $name);
		$this->db->or_where('name', $name);
		$this->db->from('prize');

		return $this->db->count_all_results();
	}	
	

}
	