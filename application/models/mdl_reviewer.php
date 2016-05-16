<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_reviewer extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function check_journal($id_reviewer)
	{
		$sql = "
		SELECT
			r.id_journal,
			r.id_member,  #--reviewer--
			CONCAT(m.m_name,' ',m.m_lastname) AS reviewer_name,
			j.j_title,
			j.j_author,
			j.j_email,
			j.j_abstract,
			j.j_fulltext,
			c.cat_name
		FROM
			journal j
		INNER JOIN
			reviewer r
		ON
			r.id_journal = j.id_journal
		INNER JOIN
			category c
		ON
			j.id_category = c.id_category
		INNER JOIN
			member m
		ON
			r.id_member = m.id_member
		WHERE
			r.id_member = '$id_reviewer'
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function savechecked($data)
	{
		print_r($data);
	}
}
/* End of file mdl_reviewer.php */
/* Location: ./application/models/mdl_reviewer.php */