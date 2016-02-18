<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="home";
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);
	}

	public function index()
	{
		$SCREENID="home";
		$this->mainpage();
		$this->load->view($SCREENID,$this->data);
	}
	public function mainpage()
	{
		$SCREENNAME="Home";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $this->SCREENNAME;
		//$this->data['NAV'] =$this->SCREENNAME;
	}

}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */