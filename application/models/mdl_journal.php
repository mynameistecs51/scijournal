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
		$query = $this->db->query($sql)->result();
		return $query;
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

	public function insertJournal()
	{
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$email = $this->input->post('email');
		$abstract = $this->input->post('abstract');
		$paper_type = $this->input->post('paper_type');
		$category = $this->input->post('category');
		//$file_name = $this->template->upload_file($_FILES['full_text']);
		//$this->input->post('full_text');
		$sugges_review = $this->input->post('sugges_review');

		///------------------------
		$file_name =  date('dmyHis');
		$config['upload_path'] =  './file_journal/';
		$config['allowed_types'] = 'PDF|pdf';
		$config['file_name'] = trim($file_name.'.'.substr($_FILES['full_text']['name'],-3));		//file_name
		//$config['remove_spaces'] = TRUE;

		 	$this->load->library("upload",$config);		//library upload
		 	$this->upload->initialize($config);
		if($this->upload->do_upload('full_text')){	//ถ้า upload ไม่มีปัญหา
			$dataSubmission = array(
				'id_upload' => '',
				'uld_title' => $title,
				'uld_author' => $author,
				'uld_email' => $email,
				'uld_abstract' => $abstract,
				'id_ptype' => $paper_type,
				'id_category' => $category,
				'uld_fulltext' => $config['file_name'],
				'uld_suggestedReview' => $sugges_review,
				);
			// $file_upload= $this->ci->upload->data('file_name');
			$this->db->insert('member_up_journal',$dataSubmission);
			// echo "<pre>";
			// print_r($dataSubmission);
			// return true;
		}else{
			return $this->upload->display_errors();
		}
	}

	public function getjournal()
	{
		$sql = "SELECT * FROM member_up_journal";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data = array(
			'result' => $result,
			);
		return $data;
	}

	public function geteditor($id_type)
	{
		$sql = "
		SELECT
			 CONCAT(p.pre_name,' ',m.m_name,' ',m.m_lastname) AS name,
			CONCAT(DATE_FORMAT(dt_create,'%d/%m/'), DATE_FORMAT(dt_create,'%y')+543)AS date
		FROM
			member m
		INNER JOIN
			prefixname p
		ON
			m.id_prefixname = p.id_prefixName
		WHERE
			m_type ='2'
				"
	}

}

/* End of file mdl_journal.php */
/* Location: ./application/models/mdl_journal.php */