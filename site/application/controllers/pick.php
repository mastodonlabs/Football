<?php

require_once('site.php');

class Pick extends Site {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view();
	}
	
	public function view($week = FALSE)
	{
		$this->load->model('game_model');
		
		if ( ! $week)
		{
			$week = $this->config->item('current_week');
		}
		$this->_data['week'] = $week;
		$this->_data['games'] = $this->game_model->get_by_week($week);		
	}

	public function add($week = FALSE)
	{
		$this->load->model('game_model');
		
		if ( ! $week)
		{
			$week = $this->config->item('current_week');
		}

		$this->_data['games'] = $this->game_model->get_by_week($week);		
		
		if ($this->input->post('submit_button'))
		{
			foreach ($this->_data['games'] AS $game)
			{
				$field = 'game_id_' . $game->id;
				$value = $this->input->post($field);
			}
		}
		
		$this->_data['week'] = $week;
		$this->_data['form_path'] = 'pick/add/' . $week;
		$content = $this->load->view('includes/picks_form', $this->_data, TRUE);
		
		$this->load->view('page', array('content' => $content));


	}
	
	
}

