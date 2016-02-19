<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_journal extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getPaper_type()
	{
		$sql = "SELECT * FROM paper_type";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data = array(
			'result' => $result,
		);
		return $data;
	}

	public function getCategory()
	{
		$sql = "SELECT * FROM category";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data = array(
			'result' => $result,
		);
		return $data;
	}

}

/* End of file mdl_journal.php */
/* Location: ./application/models/mdl_journal.php */