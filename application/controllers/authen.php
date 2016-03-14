<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authen extends CI_Controller {
	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login');
		//$this->load->model('mdl_authen');
		//$this->load->library('Template_authen');
		$this->fb_data = $this->session->userdata("fb_data");
		date_default_timezone_set('Asia/Bangkok');
	}

	public function index()
	{
		$fb_data = $this->session->userdata("fb_data");
		if($fb_data['me'] =="" || $fb_data['uid'] == 0){
			// echo "NO";
			echo anchor($fb_data['loginUrl'],'<image src="'.base_url().'img/fb_login.png"/>');
		}else{
			echo $fb_data['me']['name'],"<br/>";
			echo $fb_data['me']['first_name'],"<br/>";
			echo $fb_data['me']['email'],"<br/>";
			echo $fb_data['me']['gender']."<br/>";
			echo anchor('home/logout','logout','class="pull-right navbar-brand inline "');
		}
	}


	public function logout()
	{
		if ( $this->session->userdata("id_mmember") != null )
		{
			$this->session->unset_userdata("id_mmember");
			$this->session->unset_userdata("mmember_code");
			$this->session->unset_userdata("email");
			$this->session->unset_userdata("mmember_name");
			$this->session->unset_userdata("id_mposition");
			$this->session->unset_userdata("mbranch_name");
			$this->session->unset_userdata("id_mbranch");
			$this->session->unset_userdata("mposition_name");
			$this->session->unset_userdata("lastLogin");
		}
		$screenID = "login";
		$this->data['base_url'] = $this->config->item('base_url');
		$this->load->view($screenID ,$this->data);
	}
	public function alert($massage, $url)
	{
		echo "<meta charset='UTF-8'>
		<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')
			window.location.href='".site_url($url)."';
		</SCRIPT>";
	}

/*
	public function doCheckLogin()
	{
		if ( $this->mdl_authen->doCheckValidUserLogin($this->data["username"], $this->data["password"]) )
		{
			$this->data["id_mmember"]   = $this->mdl_authen->getmmemberID($this->data["username"]);
			$result   = $this->mdl_authen->getDataUser($this->data["id_mmember"]);
			$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
			$loginData = array(
				"id_mmember" => $this->data["id_mmember"],
				"is_login"  => '1',
				"id_create" => '1',
				"dt_create" => $now->format('Y-m-d H:i:s')
				);
			$this->mdl_authen->doInsert('tlog_lgn', $loginData);

			$this->data["lastLogin"] = $this->mdl_authen->getLastLogin($this->data["id_mmember"]);
			$this->loginSession = array(
				"id_mmember"     => $result->id_mmember,
				"mmember_code"   => $result->mmember_code,
				"email"   	 	 => $result->email,
				"mmember_name"   => $result->mmember_name,
				"id_mposition"   => $result->id_mposition,
				"mbranch_name"	 => $result->mbranch_name,
				"id_mbranch"	 => $result->id_mbranch,
				"mposition_name" => $result->mposition_name,
				"lastLogin"  	 => $this->data["lastLogin"]
				);
			$this->session->set_userdata($this->loginSession);

			redirect('dashboard/');

		}
		else
		{
			$massage = "ข้อมูล ผิดพลาด !";
			$url = "authen/";
			$this->alert($massage, $url);
			exit();
		}

	}
	*/

}


/* End of file authen.php */
/* Location: ./application/controllers/authen.php */