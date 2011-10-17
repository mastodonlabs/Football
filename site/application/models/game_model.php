<?php

class Game_model extends CI_Model {
	
	var $_db_table = 'game';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get($id)
	{
		$this->db->select('*');
		$this->db->from($_db_table);
		$this->db->where('id', $id);
	}

	public function get_by_week($week)
	{
		$this->db->select('*, UNIX_TIMESTAMP(date_time) AS game_time_unix');
		$this->db->from($this->_db_table);
		$this->db->where('week', $week);

		return $this->db->get()->result();
	}
	
}