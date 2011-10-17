<?php

class Site extends CI_Controller {

	protected $_data = array();
	
	public function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->config('account/account');
		$this->load->helper(array('date', 'language', 'account/ssl', 'url', 'html'));
        $this->load->library(array('account/authentication', 'form_validation'));
		$this->load->model(array('account/account_model', 'account/account_details_model', 'account/ref_country_model', 'account/ref_language_model', 'account/ref_zoneinfo_model'));
		$this->load->language(array('general', 'account/account_settings'));


	}


	public function index()
	{
		
	}

}

// for testing only
function debug_object($data)
{
	echo '<pre>';
	print_r($data);
	echo '</pre>';	
}
