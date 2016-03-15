<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {
	function __construct(){
        // Call the Model constructor
		parent::__construct();
		$this->load->model('mdl_authen','',TRUE);
	}

	function index(email){
		echo $email,"<br/>";
		// echo md5($this->input->post('password'));
		// $this->load->library('form_validation');
		// $this->form_validation->set_rules('email','email','trim|required|xss_clean');
		// $this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_check_database');

		// if($this->form_validation->run() === FALSE){
		// 	redirect('home/login','refresh');
		// }elseif($this->session->userdata('session_data')){
		// 	$session_data = $this->session->userdata('session_data');
		// 	//print_r($session_data);
		// 	redirect('home','refresh');
		// }else{
		// 	redirect('main','refresh');
		// }
	}

	function check_database(){
		//field input email
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$result = $this->mdl_authen->getMember($email,$password);

		if($result){
			$sess_array = array();
			foreach ($result as $row_result) {
				$sess_array = array(
					'id_member' =>$row_result->id_member,
					'm_name' => $row_result->m_name,
					'm_lastname' => $row_result->m_lastname,
					'm_email' => $row_result->m_email,
					'm_gender' => $row_result->m_gender,
					'm_status' => $row_result->m_status,
					);
				$this->session->set_userdata('session_data',$sess_array);
			}
		}else{
			$this->form_validation->set_message('check_database','Invalid email && password');
		}
	}

	public function logout(){
		$this->session_destroy();
		$this->session->unset_userdata('session_data');
		// session_destroy();
		redirect('main','refresh');
	}
}
?>