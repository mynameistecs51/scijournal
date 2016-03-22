<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_register extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function insertRegister($dataRegister)
	{
		$this->db->insert('member', $dataRegister);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

}

/* End of file mdl_register.php */
/* Location: ./application/models/mdl_register.php */