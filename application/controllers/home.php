<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="home";
		$this->load->model('mdl_journal');
		$this->load->model('mdl_register');
		$this->session_data = $this->session->userdata('session_data');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		// if($fb_data['me'] == ""){
		// 	redirect('authen','refresh');
		// }else{
		// 	echo "OK";
		// }
	}

	public function index()
	{
		$SCREENID="home";
		// $SCREENNAME = "Home";
		$SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function mainpage($SCREENNAME)
	{
		//$SCREENNAME="Home";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data['name'] = $this->session_data['m_name'];
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $SCREENNAME;
		$this->data['getjournal'] = $this->mdl_journal->getjournal();
		// $this->data['NAV'] = $this->SCREENNAME;
	}

	public function getPrefixName()
	{
		$prefixName = $this->mdl_journal->getPrefixName();
		// return $prefixName;
		echo  json_encode($prefixName);
	}

	public function getProvince() //แสดงรายการ รหัสไปรษณีย์ จังหวัด อำเภอ ตำบล
	{
		$zipcode = $_POST['zipcode'];
		$showdata = $this->mdl_journal->getProvince($zipcode);

		$province = array('province_id'=>$showdata[0]['PROVINCE_ID'],'province_name' => $showdata[0]['PROVINCE_NAME'],'amphur_id'=>$showdata[0]['AMPHUR_ID'],'amphur_name' => $showdata[0]['AMPHUR_NAME'],'zipcode ' => $showdata[0]['ZIPCODE']);
		foreach ($showdata as $rowProvince) {
			$dataProvince = array(
				'district_id' => $rowProvince['DISTRICT_ID'],
				'district_name' => $rowProvince['DISTRICT_NAME'],
				);
			array_push($province,array('district_name'=>$dataProvince['district_name'],'district_id'=>$dataProvince['district_id']));
		}
		echo json_encode($showdata);
	}

	public function inserMember()
	{

		$this->form_validation->set_rules('username', 'Username','required|xss_clean|trim');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|xss_clean');
		$this->form_validation->set_rules('confirm_password', '**ยืนยันรหัสผ่าน', 'trim|xss_clean|callback_confirm_password');
		$this->form_validation->set_rules('prefixName','** คำนำหน้าชื่อ','required|xss_clean|trim');
		$this->form_validation->set_rules('name', 'ชื่อ','required|xss_clean|trim');
		//$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('', '%s ไม่ถูกต้อง');
			$this->register();
		}
		else
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
				'm_country' =>$this->input->post('county'),
				'm_zipcode' => $this->input->post('zipcode'),
				'm_tel' => $this->input->post('tel'),
				'm_email' => $this->input->post('email'),
				'm_type' => $this->input->post('status'),
				'dt_create' => $this->dt_now ,
				'id_update' => '',
				'dt_update' => $this->dt_now ,
				);
			$insert =	$this->mdl_register->insertRegister($dataRegister);
			$massage = "success fully register  !";
			$url = "home/login/";
			$this->alert($massage,$url);
		}
	}

	public function confirm_password($value)			//check confirm password
	{
		$password = $this->input->post('password');
		if($value == $password){
			return TRUE;
		}else{
			$this->form_validation->set_message('confirm_password', '%s ไม่ถูกต้อง');
			return FALSE;
		}
	}

	public function logout()
	{
		$this->Login->logout();
	}

	public function alert($massage, $url)
	{
		echo "<meta charset='UTF-8'>
		<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')
			window.location.href='".site_url($url)."';
		</SCRIPT>";
	}

	//---------------------- call page -----------------------//

	public function paperInpress()
	{
		$SCREENID="paperInpress";
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function information()
	{
		$SCREENID="information";
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function introducing()
	{
		$SCREENID="introducing";
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function contact()
	{
		$SCREENID="contact";
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function login()
	{
		$SCREENID="login";
		// $SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$SCREENNAME = ">Login";
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function register()
	{
		$SCREENID="register";
		$SCREENNAME="> Register";
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */