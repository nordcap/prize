<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model');
	}
/**
* Обработка табл. employee
* 
*/
	public function index()
	{
		$this->form_validation->set_rules('lstEmployee', 'Сотрудник','required|callback_checkEmployee');
		$this->form_validation->set_rules('date_birth', 'Дата рождения','required');
		$this->form_validation->set_rules('date_work', 'Дата начала работы','required');
		
		$data['list'] = $this->Employee_model->get_listEmployee();
		if($this->input->post('btnEmployeeAdd'))
		{
			if($this->form_validation->run()==TRUE)
			{
				
				$this->Employee_model->add($this->input->post('lstEmployee', TRUE),
											$this->input->post('date_birth', TRUE),
											$this->input->post('date_work', TRUE)
											);
			} 
			
		}
		

		$data['table_employee'] = $this->Employee_model->get();
		$data['content'] = 'employee/employee_view';
		$data['input_form'] = 'employee/form';
		
		$this->load->view('layout/main',$data);			
	}

/**
* удаление  сотрудников из табл. employee
* 
*/
	public function action_employee()
	{
		if($this->input->post('btnEmployeeDel'))
		{
			$arr = array_keys($this->input->post('btnEmployeeDel'));
			if ($this->checkEmptyDataEmployee($arr[0]))
			{
				$this->Employee_model->delete($arr[0]);	
			} else
			{
				$data['error_delete'] = "<p class='text-error'>В таблице награжденных присутствует данный сотрудник!<p>";
			}			 

			
		}		
		
		if($this->input->post('btnEmployeeEdit'))
		{
			
			$this->form_validation->set_rules('lstEmployee', 'Сотрудник','required');
			$this->form_validation->set_rules('date_birth', 'Дата рождения','required');
			$this->form_validation->set_rules('date_work', 'Дата начала работы','required');

			if($this->form_validation->run()==TRUE)
			{
				$this->Employee_model->update(
											$this->input->post('lstEmployee', TRUE),
											$this->input->post('date_birth', TRUE),
											$this->input->post('date_work', TRUE),
											$this->input->post('chkEmployee',TRUE));
				
			}

		}

			$data['table_employee'] = $this->Employee_model->get();
			$data['content'] = 'employee/employee_view';
			$data['input_form'] = 'employee/form';
			
			$this->load->view('layout/main',$data);	
				
	}	
	
	
	
/**
*  
* @param boolean $lstEmployee проверка на наличие добавляемых сотрудников в табл.employee
* 
*/	
	function checkEmployee($lstEmployee)
	{
		if (count($this->Employee_model->checkEmployee($lstEmployee)) > 0)
		{
			$this->form_validation->set_message('checkEmployee','Выбранный сотрудник уже есть в таблице!');
			return FALSE;
		} else
		{
			return TRUE;
		}
	}
	
/**
* 
* @param tinyint $id - id-employee
* 
*/	
	function checkEmptyDataEmployee($id_employee)
	{
		if(count($this->Employee_model->checkEmptyDataEmployee($id_employee)) > 0)
		{
			return FALSE;
		}	else
		{
			return TRUE;
		}
	}	
}	