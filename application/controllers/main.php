<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
		$this->load->model('Employee_model');
		$this->load->model('Prize_model');
		$this->load->model('Year_model');
	}
	
	
	public function index()
	{
		
		$this->form_validation->set_rules('id_employee','Сотрудник', 'required');
		$this->form_validation->set_rules('id_prize','Награда', 'required');
		$this->form_validation->set_rules('id_year','Год', 'required');
		
		//получаем данные для формы
		$data['lstEmployee'] = $this->Employee_model->get();
		$data['lstPrize'] = $this->Prize_model->get();
		$data['lstYear'] = $this->Year_model->get();
		
		if($this->input->post('btnMainAdd'))
		{
			if($this->form_validation->run()==TRUE)
			{
				
				$this->Main_model->add($this->input->post('id_employee', TRUE),
										$this->input->post('id_prize', TRUE),
										$this->input->post('id_year', TRUE));
			} 
			
		}			
		//получаем список награжденных сотрудников
		$data['list_FIO'] = $this->Main_model->get_list_name();
		//получаем список наград (передается во view)
		$data['list_prize'] = $this->get_prize_from_name_year($data['list_FIO'], $data['lstYear']);

		
		//$data['table_main'] = $this->Main_model->get();
		$data['content'] = 'main/main_view';
		$data['input_form'] = 'main/form';
		$this->load->view('layout/main',$data);
	}
	
/**
* 
* @param array $list_FIO массив сотрудников
* @param array $list_year массив лет
* @return string $prizes перечень наград за год, полученных 1 сотрудником
*/	
	
	function get_prize_from_name_year($list_FIO, $list_year)
	{
		$prizes = array();
		$temp_arr = array();
		
		foreach($list_FIO as $FIO)
		{
			foreach($list_year as $year)
			{
				$arr_year = $this->Main_model->get_from_name($FIO['name'], $year['year']);
				$temp_arr = array();
				foreach($arr_year as $k => $val)
				{
					$temp_arr[] = $val['prize'];
					
				}
				$prizes[$FIO['name']][$year['year']] = implode(',&nbsp;',$temp_arr);	
				
			}
		}
		

	return $prizes;	
	}
	
	
/**
* модуль редактирования выбранного сотрудника
* 
*/	
	public function edit()
	{
		
		//получаем данные для формы
		$data['lstPrize'] = $this->Prize_model->get();
		$data['lstYear'] = $this->Year_model->get();
		
		
		
		$data['table_edit'] = $this->Main_model->find_employee($this->input->get('employee'));
		$data['content'] = 'edit/edit_view';
		$data['input_form'] = 'edit/form';
		$this->load->view('layout/main',$data);
	}
	
/**
* обработчик кнопки "Изменить"
* 
*/
	public function action_edit()
	{
		//получаем данные для формы
		$data['lstPrize'] = $this->Prize_model->get();
		$data['lstYear'] = $this->Year_model->get();
		
		if($this->input->post('btnMainEdit'))
		{

			$this->Main_model->edit(
									$this->input->post('checkbox'),
									$this->input->post('id_prize'), 
									$this->input->post('id_year'));
		}		
		
		$data['table_edit'] = $this->Main_model->find_employee($this->input->get('employee'));
		$data['content'] = 'edit/edit_view';
		$data['input_form'] = 'edit/form';
		$this->load->view('layout/main',$data);				
	}

/**
* удаление наград из таблицы main
* 
*/	
	public function action_main()
	{

		$data['lstEmployee'] = $this->Employee_model->get();
		$data['lstPrize'] = $this->Prize_model->get();
		$data['lstYear'] = $this->Year_model->get();

		
		if($this->input->post('btnMainDel'))
		{

			$this->Main_model->delete($this->input->post('hidden'));
		}		

		//список сотрудников, кто есть в списке награжденных
		$data['list_FIO'] = $this->Main_model->get_list_name();
		//получаем список наград 
		$data['list_prize'] = $this->get_prize_from_name_year($data['list_FIO'], $data['lstYear']);

		
		$data['content'] = 'main/main_view';
		$data['input_form'] = 'main/form';
		$this->load->view('layout/main',$data);		
				
	}	
	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */