<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="home";
	}

	public function index()
	{
		$SCREENID="home";
		$active_menu = "home";
		$this->mainpage($SCREENID);
		$this->load->view($SCREENID,$this->data);
		$this->template->menu($active_menu);
	}
	public function mainpage()
	{
		$SCREENNAME="Journal";
		$active_menu = 'active';
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		//$this->data['NAV'] =$this->SCREENNAME;
	}

}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */