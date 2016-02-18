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
	public function getScreenName($filelocation)
 {
 	$sql ="
 	SELECT CONCAT(' ','>',' ',menu.menu_name) as screenname FROM menu WHERE menu.filelocation = '".$filelocation."'";
	$query = $this->db->query($sql);
	if($query->num_rows() > 0)
	{
		$row = $query->row();
		return  $row->screenname;
	}else{
		return  '-';
	}

 }
}

/* End of file mdl_menu.php */
/* Location: ./application/models/mdl_menu.php */