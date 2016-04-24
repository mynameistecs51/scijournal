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

}

/* End of file mdl_editor.php */
/* Location: ./application/models/mdl_editor.php */