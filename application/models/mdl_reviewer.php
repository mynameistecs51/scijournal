<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_reviewer extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function check_journal($id_reviewer)
	{
		/*$sql = "
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
		*/
		$sql = "
			SELECT
				r.id_reviewer,
	    			r.id_journal,
				r.id_member,  #--reviewer--
				CONCAT(m.m_name,' ',m.m_lastname) AS reviewer_name,
				j.j_title,
				j.j_author,
				j.j_email,
				j.j_abstract,
				j.j_fulltext,
				c.cat_name
			     # chk.id_journal,
			     #chk.id_checked
			FROM
			   reviewer r
			INNER JOIN
			      journal j ON j.id_journal = r.id_journal
			INNER JOIN
				category c	ON  j.id_category = c.id_category
			INNER JOIN
				member m	ON	r.id_member = m.id_member
			LEFT JOIN (
			     SELECT id_checked,id_reviewer,id_member,id_journal from reviewer_check
			     #GROUP BY id_journal
			) AS chk ON r.id_reviewer=chk.id_reviewer
			WHERE    r.id_member = '$id_reviewer' AND ifnull(chk.id_reviewer,'')=''
			";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function savechecked($data)
		{
			$this->db->insert('reviewer_check',$data);
		}
		public function journal_checked($idmember)
		{
			$sql = "
			SELECT
				rc.id_journal,
				rc.id_member,  #--reviewer--
				CONCAT(m.m_name,' ',m.m_lastname) AS reviewer_name,
				j.j_title,
				j.j_author,
				j.j_email,
				j.j_abstract,
				j.j_fulltext,
				c.cat_name,
				CASE check_status
				     WHEN 1 THEN 'Accept'
				     WHEN 2 THEN 'Minor Reviewer'
				     WHEN 3 THEN 'Major Reviewer'
				     WHEN 4 THEN 'Reject'
				END check_status
			FROM
				journal j
			INNER JOIN
				reviewer_check rc
			ON
				rc.id_journal = j.id_journal
			INNER JOIN
				category c
			ON
				j.id_category = c.id_category
			INNER JOIN
				member m
			ON
				rc.id_member = m.id_member
			WHERE
				rc.id_member = '$idmember'
			";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}
	/* End of file mdl_reviewer.php */
/* Location: ./application/models/mdl_reviewer.php */