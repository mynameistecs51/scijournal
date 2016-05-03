<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewer extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->ctl="reviewer";
		$this->load->model('mdl_journal');
		$this->load->model('mdl_editor');
		$this->load->model('mdl_reviewer');
		$this->session_data = $this->session->userdata('session_data');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');

		if($this->session_data['m_type']  != "3"   &&  $this->session_data['m_statusType'] != "1" )
		{
			redirect('authen','refresh');
		}
	}


	public function index()
	{
		$SCREENID="reviewer";
		$SCREENNAME = ">REVIEWER";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view('reviewer/'.$SCREENID,$this->data);
	}

	public function mainpage($SCREENNAME)
	{
		//$SCREENNAME="Home";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data['name'] = $this->session_data['m_name'];
		$this->data['session_data'] =$this->session_data;
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $SCREENNAME;
		$this->data['getjournal'] = $this->mdl_journal->getjournal();
		$this->data['getReviewer'] = $this->mdl_reviewer->getReviewer();
		$this->data['notsend'] = $this->mdl_reviewer->notsendReviewer();
		$this->data['url_edit']= base_url().'index.php/'.$this->ctl."/edit/";
		$this->data['url_delete'] = base_url().'index.php/'.$this->ctl."/delete/";
		// $this->data['NAV'] = $this->SCREENNAME;
	}

}

/* End of file reviewer.php */
/* Location: ./application/controllers/reviewer.php */