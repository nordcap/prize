<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Year extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Year_model');
	}

	/**
	* обработка табл. year
	* 
*/
	public function index()
	{
		$this->form_validation->set_rules('year', 'год','required|callback_checkYear');
		
		if($this->input->post('btnYearAdd'))
		{
			if($this->form_validation->run()==TRUE)
			{
				
				$this->Year_model->add($this->input->post('year', TRUE));
			} 
			
		}

		$data['table_year'] = $this->Year_model->get();
		$data['content'] = 'year/year_view';
		$data['input_form'] = 'year/form';
		$this->load->view('layout/main',$data);
	}	

	
/**
* удаление лет из таблицы year
* 
*/	
	public function action_year()
	{
		if($this->input->post('btnYearDel'))
		{
			$arr = array_keys($this->input->post('btnYearDel'));
			$this->Year_model->delete($arr[0]);
		}		

		
		$data['table_year'] = $this->Year_model->get();
		$data['content'] = 'year/year_view';
		$data['input_form'] = 'year/form';
		$this->load->view('layout/main',$data);		
				
	}	
	
	
/**
* 
* @param boolean $year проверка на наличие добавляемых лет в табл.year
* 
*/
	function checkYear($year)
	{
		if (count($this->Year_model->checkYear($year)) > 0)
		{
			//$this->form_validation->set_message('checkYear','Год уже присутствует в таблице!');
			return FALSE;
		} else
		{
			return TRUE;
		}
	}		
	
}