<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="home";
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
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $SCREENNAME;
		// $this->data['NAV'] = $this->SCREENNAME;
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
}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */