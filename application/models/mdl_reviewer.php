<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_reviewer extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getReviewer()
	{
		$sql = "
		SELECT
		m.id_member,
		m.m_name AS reviewer,
		j.id_journal,
		j.j_title,
		r.id_update,
		r.m_name AS admin,
		CONCAT(DATE_FORMAT(r.dt_create,'%d/%m/'),DATE_FORMAT(r.dt_create,'%Y')+543)AS date_send
		FROM
		member m
		INNER JOIN
        #(SELECT r.id_update,r.id_member,r.dt_create,r.id_journal FROM reviewer r) r
		(SELECT m.m_name,r.id_update,r.id_member,r.dt_create,r.id_journal FROM `reviewer` r INNER JOIN member m ON m.id_member = r.id_update )r
		ON
		r.id_member = m.id_member

		INNER JOIN
		journal j
		ON
		j.id_journal = r.id_journal
		WHERE 
		j.id_journal = r.id_journal
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}

/* End of file mdl_reviewer.php */
/* Location: ./application/models/mdl_reviewer.php */