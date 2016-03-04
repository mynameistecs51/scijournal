<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="Submission";
		$this->SCREENNAME=$this->template->getScreenName($this->ctl);
		$this->load->model('mdl_journal');
	}

	public function index()
	{
		$SCREENID="submission";
		$this->mainpage();
		$this->load->view($SCREENID,$this->data);
	}
	public function mainpage()
	{
		$SCREENNAME="Submission";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $this->SCREENNAME;
		$this->data['paperType'] = $this->mdl_journal->getPaper_type();
		$this->data['category'] = $this->mdl_journal->getCategory();
	}

	public function insertJournal()
	{
		$this->form_validation->set_rules('title', 'Title','required|xss_clean|trim');
		$this->form_validation->set_rules('author', 'Author','required|xss_clean|trim');
		$this->form_validation->set_rules('email', 'Email','required|xss_clean|trim');
		$this->form_validation->set_rules('abstract', 'Abstract','required|xss_clean|trim');
		$this->form_validation->set_rules('paper_type', 'Paper_type','required|xss_clean');
		$this->form_validation->set_rules('category', 'Category','required|xss_clean');
		//$this->form_validation->set_rules('full_text', 'Full_text','required');
		$this->form_validation->set_rules('sugges_review', 'Sugges_review','xss_clean|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('', ' กรุณากรอกข้อมูล %s ');
			$this->index();
		}
		else
		{
			$this->mdl_journal->insertJournal();
			redirect('home','refresh');
		}
	}

}

/* End of file ctl_journal.php */
/* Location: ./application/controllers/ctl_journal.php */