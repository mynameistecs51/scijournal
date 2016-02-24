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

	public function getPrefixName()
	{
		$sql = "SELECT * FROM prefixname";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data = array(
			'result' => $result,
			);
		return $data;
	}

	public function getProvince($zipcode) // province and zipcode
	{
		$sql_query ='
		SELECT
			z.ZIPCODE,
			p.PROVINCE_ID,
			p.PROVINCE_NAME,
			a.AMPHUR_ID,
			a.AMPHUR_NAME,
			d.DISTRICT_ID,
			d.DISTRICT_NAME
		FROM zipcode z
		INNER JOIN province p ON z.PROVINCE_ID = p.PROVINCE_ID
		INNER JOIN amphur a ON z.AMPHUR_ID = a.AMPHUR_ID
		INNER JOIN district d ON z.DISTRICT_ID=d.DISTRICT_ID
		WHERE z.ZIPCODE ="'.$zipcode.'"
		';
		$query = $this->db->query($sql_query)->result_array();
		return $query;
	}

}

/* End of file mdl_journal.php */
/* Location: ./application/models/mdl_journal.php */