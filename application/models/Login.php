<?php if (! defined('BASEPATH')) exit("No direct script access allowed");

class Login extends CI_model{

	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
		
	}

	public function logout(){
		$fb_data = $this->session->userdata("fb_data");
	}
	public function checkID_first($fb_data){
		$query_faceboo_id = $this->db->query("SELECT * FROM username WHERE user_fb =".$fb_data['me']['id'])->num_rows();

		return $query_faceboo_id;
	}

}
?>