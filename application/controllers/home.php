<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="home";
		$this->load->model('mdl_journal');
		//$this->SCREENNAME=$this->template->getScreenName($this->ctl);
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
		$this->data['getPrefixName'] = $this->mdl_journal->getPrefixName();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $SCREENNAME;
		// $this->data['NAV'] = $this->SCREENNAME;
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
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}

	public function register()
	{
		$SCREENID="register";
		$SCREENNAME=$this->template->getScreenName('home/'.$SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view($SCREENID,$this->data);
	}
}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */