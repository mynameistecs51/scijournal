<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="admin";
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
	{ // ----- confirm editer page ---/ 
		$type_editor = '2';
		$this->data['geteditor'] = $this->mdl_journal->geteditor($type_editor);
		$SCREENID="confirm_editor";
		$SCREENNAME = ">Confirm Editor";
		$this->mainpage($SCREENNAME);
		$this->load->view('admin/'.$SCREENID,$this->data);
	}

	public function confirm_reviewer()
	{
		$type_reviewer = '3';
		$this->data['getreviewer'] = $this->mdl_journal->geteditor($type_reviewer); //getreviewer
		$SCREENID="confirm_reviewer";
		$SCREENNAME = ">Confirm Reviewer";
		$this->mainpage($SCREENNAME);
		$this->load->view('admin/'.$SCREENID,$this->data);
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
		$this->data['getmember'] = $this->mdl_journal->getjournal();
		// $this->data['NAV'] = $this->SCREENNAME;
	}

	public function geteditor()
	{
		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */