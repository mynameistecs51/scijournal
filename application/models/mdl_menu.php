<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_menu extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getMenu()
	{
		$sql = "SELECT * FROM menu";
		$query = $this->db->query($sql);
		$num_row = $query->num_rows();
		$result = $query->result();
		$data = array(
			"num_row" => $num_row,
			"result" => $result,
		);
		return $data;
	}
}

/* End of file mdl_menu.php */
/* Location: ./application/models/mdl_menu.php */