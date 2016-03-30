<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_editor extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insertEditor($data)
	{

		$this->db->insert('reviewer',$data);
		
	}

}

/* End of file mdl_editor.php */
/* Location: ./application/models/mdl_editor.php */