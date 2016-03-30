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
				'id_journal' => '',
				'j_title' => $title,
				'j_author' => $author,
				'j_email' => $email,
				'j_abstract' => $abstract,
				'id_ptype' => $paper_type,
				'id_category' => $category,
				'j_fulltext' => $config['file_name'],
				'j_suggestedReview' => $sugges_review,
				);
			// $file_upload= $this->ci->upload->data('file_name');
			$this->db->insert('journal',$dataSubmission);
			// echo "<pre>";
			// print_r($dataSubmission);
			// return true;
		}else{
			return $this->upload->display_errors();
		}
	}

	public function getjournal()
	{
		$sql = "
		SELECT
			j.id_journal,
			j.j_title,
			j.j_author,
			j.j_email,
			j.j_abstract,
			j.id_member,
			p.id_ptype,
			p.ptype_name,
			c.id_category,
			c.cat_name,
			j.j_fulltext,
			j.j_suggestedReview,
			CONCAT(DATE_FORMAT(j.dt_create,'%d/%m/'),DATE_FORMAT(j.dt_create,'%y')+543)AS dt_create,
			CONCAT(DATE_FORMAT(j.dt_update,'%d/%m/'),DATE_FORMAT(j.dt_update,'%y')+543)AS dt_update,
			CASE  j.j_status
				WHEN 0 THEN 'Send'
				WHEN 1 THEN 'Reading'
				WHEN 2 THEN 'Minor Revisions'
				WHEN 3 THEN 'Major Revisions'
				WHEN 4 THEN 'Accept'
				WHEN 5 THEN 'Reject'
			END status
		FROM
			journal j
		INNER JOIN
			paper_type p
		ON
			j.id_ptype = p.id_ptype
		INNER JOIN
			category c
		ON
			j.id_category = c.id_category
		INNER JOIN
			member m
		ON
			m.id_member = j.id_member
		 ";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data = array(
			'result' => $result,
			);
		return $data;
	}

	public function getmember_ofType($type_member)
	{
		$sql = "
		SELECT
			id_member,
			CONCAT(p.pre_nameEng,' ',m.m_name,' ',m.m_lastname) AS name,
			CONCAT(DATE_FORMAT(dt_create,'%d/%m/'), DATE_FORMAT(dt_create,'%y')+543)AS dt_create,
			CONCAT(DATE_FORMAT(dt_update,'%d/%m/'), DATE_FORMAT(dt_update,'%y')+543)AS dt_update,
			m.m_organizetion,
			m_statusType
		FROM
			member m
		INNER JOIN
			prefixname p
		ON
			m.id_prefixname = p.id_prefixName
		WHERE
			m_type ='$type_member'
		";
		$query = $this->db->query($sql)->result();
		return $query;
	}

}

/* End of file mdl_journal.php */
/* Location: ./application/models/mdl_journal.php */