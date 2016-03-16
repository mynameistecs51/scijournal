<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->ctl="editter";
		$this->load->model('mdl_journal');
		$this->load->model('mdl_register');
		$this->session_data = $this->session->userdata('session_data');
	}

	public function index()
	{
		$SCREENID="editor";
		$SCREENNAME = ">All Journal";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view('editor/'.$SCREENID,$this->data);
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

	public function send_reviewer()
	{
		$SCREENID="editor";
		$SCREENNAME = ">All Journal";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->load->view('editor/'.$SCREENID,$this->data);
	}
}


/* End of file editor.php */
/* Location: ./application/controllers/editor.php */