<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_register extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function insertRegister()
	{
		$dataRegister = array(
			'm_username' => $this->input->post('username'),
			'm_password' =>md5($this->input->post('password')),
			'id_prefixName' => $this->input->post('prefixName'),
			'm_name' => $this->input->post('name'),
			'm_lastname' =>$this->input->post('lastname'),
			'm_sex' => $this->input->post('sex'),
			'm_education' => $this->input->post('education'),
			'm_career' =>$this->input->post('career'),
			'm_organizetion' => $this->input->post('organizetion'),
			'm_address' =>$this->input->post('address'),
			'zipcode_id' =>$this->input->post('zipcode'),
			'province_id' =>$this->input->post('province'),
			'amphur_id' =>$this->input->post('amphur'),
			'district_id' =>$this->input->post('district'),
			'm_tel' => $this->input->post('tel'),
			'm_email' => $this->input->post('email'),
			);

		$this->db->insert('member',$dataRegister);
	}

}

/* End of file mdl_register.php */
/* Location: ./application/models/mdl_register.php */