<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_editor extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
	}

	public function insertEditor($data)
	{
		$this->db->insert('reviewer',$data);
	}

	public function deleteReviewer()
	{

		$idjournal = $this->input->post('idjournal');
		$idreviewer  =$this->input->post('idreviewer');

		$sql = "DELETE FROM reviewer WHERE id_journal = '$idjournal' AND id_member ='$idreviewer'";
		$query = $this->db->query($sql);
	}

	public function saveUpdate()
	{
		if($_POST){
			parse_str($this->input->post('form'), $post);
			$idjournal = $post['idjournal'];
			$idreviewer  =$post['select_reviewer'];
			$id_editor = $post['id_editor'];
			$row_reviewer = $post['id_reviewer'];
		}

		$sql = "UPDATE reviewer SET id_member ='".$idreviewer."', id_update ='".$id_editor."' WHERE id_reviewer ='".$row_reviewer."' ";
		$query = $this->db->query($sql);
	}

	public function getReviewer()
	{
		$sql = "
		SELECT
		m.id_member,
		m.m_name AS reviewer,
		j.id_journal,
		j.j_title,
		c.id_category,
		c.cat_name,
		r.id_reviewer,
		r.id_update,
		r.m_name AS admin,
		CONCAT(DATE_FORMAT(r.dt_create,'%d/%m/'),DATE_FORMAT(r.dt_create,'%Y')+543)AS date_send
		FROM
		member m
		INNER JOIN
		(SELECT m.m_name,r.id_reviewer,r.id_update,r.id_member,r.dt_create,r.id_journal FROM `reviewer` r INNER JOIN member m ON m.id_member = r.id_update )r
		ON
		r.id_member = m.id_member
		INNER JOIN
		journal j
		ON
		j.id_journal = r.id_journal
		INNER JOIN
		category c
		ON
		j.id_category = c.id_category
		WHERE
		j.id_journal = r.id_journal
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function deleteReviewer()
	// {
	// 	$id_member = $this->input->post('idreviewer');

	// 	$sql = "DELETE FROM reviewer WHERE id_member = $id_member";

	// }

	public function notsendReviewer()
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
		CONCAT(DATE_FORMAT(j.dt_create,'%d/%m/'),DATE_FORMAT(j.dt_create,'%Y')+543)AS dt_create,
		CONCAT(DATE_FORMAT(j.dt_update,'%d/%m/'),DATE_FORMAT(j.dt_update,'%Y')+543)AS dt_update,
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
		WHERE
		j.id_journal NOT IN (SELECT id_journal FROM reviewer GROUP BY id_journal)
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}
	public function editorStatus_save()
	{
		echo "OK";
		if($_POST){
			parse_str($this->input->post('form'), $post);
			$idjournal = $post['idjournal'];
			$id_editor = $post['id_editor'];
			$status = $post['status'];
			$comment = $post['comment'];
		}
		// echo $idjournal,'<br>',$id_editor,'<br>',$status,'<br>',$comment;
		$sql = "UPDATE reviewer_check SET status_editorcheck ='".$status."', editor_comment ='".$comment."',dt_editorcheck = '".$this->now."',id_editorcheck = '".$id_editor."' WHERE id_checked ='".$row_reviewer."' ";
		$query = $this->db->query($sql);
		// --------------------------------//
		// $data = array(
		// 	// 'idjournal' => $this->input->post('idjournal'),
		// 	'status_editorcheck' => $this->input->post('status'),
		// 	'check_comment' => $this->input->post('comment'),
		// 	'dt_update' => $this->dt_now ,
		// 	'id_update' => $this->session_data['id_member'],
		// 	);
	}
}

/* End of file mdl_editor.php */
/* Location: ./application/models/mdl_editor.php */