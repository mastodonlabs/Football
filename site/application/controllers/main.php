<?php

require_once("site.php");

class Main extends Site {

    function __construct()
    {
        parent::__construct();
	}
	
	function index()
	{
		$this->load->model('game_model');

		$data = array();
		$data['current_week'] = $this->config->item('current_week');		 
		$data['games'] = $this->game_model->get_by_week($this->config->item('current_week'));

		$schedule = $this->load->view('includes/schedule', $data, TRUE);
		$this->load->view('home', array('schedule' => $schedule));
	}

	function week($week = 0)
	{
		if ( ! $week)
		{
			$week = $this->config->item('current_week');
		}
		$this->load->model('game_model');
		$head = array();
		$head[] =  meta('description', 'This is my page description');

		$this->_data['games'] = $this->game_model->get_by_week($week);

		$schedule = $this->load->view('includes/schedule', $this->_data, TRUE);
		
		$this->load->view('page', array('content' => $schedule));
	}

	
}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */