<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_authen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function getMember($email,$password)
	{
		$sql = "SELECT * FROM member WHERE m_email='".$email."' AND  m_password = '".$password."' ";
		$query = $this->db->query($sql)->result();
		return  $query;
	}

}

/* End of file mdl_authen.php */
/* Location: ./application/models/mdl_authen.php */