<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prize extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Prize_model');
	}	

	/**
	* обработка табл.наград
	* 
*/
	public function index()
	{
		$this->form_validation->set_rules('short_name', 'Аббревиатура','required|callback_checkShortNamePrize');
		$this->form_validation->set_rules('name', 'Название','required|callback_checkNamePrize');
		
		if($this->input->post('btnPrizeAdd'))
		{
			if($this->form_validation->run()==TRUE)
			{
				
				$this->Prize_model->add($this->input->post('short_name', TRUE),
										$this->input->post('name', TRUE),
										$this->input->post('comment', TRUE));
			} 
			
		}		
		$data['table_prize'] = $this->Prize_model->get();
		$data['content'] = 'prize/prize_view';
		$data['input_form'] = 'prize/form';
		$this->load->view('layout/main',$data);
	}


/**
* удаление наград из таблицы prize
* 
*/	
	public function action_prize()
	{
		
		if($this->input->post('btnPrizeDel'))
		{
			$arr = array_keys($this->input->post('btnPrizeDel'));
			$this->Prize_model->delete($arr[0]);
		}		


		if($this->input->post('btnPrizeEdit'))
		{
			
			$this->form_validation->set_rules('short_name', 'Аббревиатура','required');
			$this->form_validation->set_rules('name', 'Название','required');

			if($this->form_validation->run()==TRUE)
			{
				$this->Prize_model->update(
											$this->input->post('short_name', TRUE),
											$this->input->post('name', TRUE),
											$this->input->post('comment', TRUE),
											$this->input->post('chkPrize',TRUE));
				
			}

		}
		
		$data['table_prize'] = $this->Prize_model->get();
		$data['content'] = 'prize/prize_view';
		$data['input_form'] = 'prize/form';
		$this->load->view('layout/main',$data);		
		
	}	



/**
* 
* @param boolean $name проверка на наличие добавляемых аббревиатур в табл.prize
* 
*/
	function checkShortNamePrize($short_name)
	{
		$count = $this->Prize_model->checkPrize($short_name);
		if ($count > 0)
		{
			$this->form_validation->set_message('checkShortNamePrize','Такая аббревиатура уже присутствует в таблице!');
			return FALSE;
		} else
		{
			return TRUE;
		}
	}

/**
* 
* @param boolean $name проверка на наличие добавляемых названий наград в табл.prize
* 
*/
	function checkNamePrize($name)
	{
		$count = $this->Prize_model->checkPrize($name);
		if ($count > 0)
		{
			$this->form_validation->set_message('checkNamePrize','Такое название награды уже присутствует в таблице!');
			return FALSE;
		} else
		{
			return TRUE;
		}
	}

}