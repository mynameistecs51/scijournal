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
		$SCREENNAME = "> REVIEWER";
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
		$this->data['read_journal'] = $this->mdl_reviewer->check_journal($this->session_data['id_member']);
		$this->data['baseurl_reading'] =  base_url().'index.php/'.$this->ctl."/reading_journal/";
		// $this->data['NAV'] = $this->SCREENNAME;
	}

	public function download_journal($file)
	{
		$file = file_get_contents("file_journal/".$file);
		$name = $file;
		echo  force_download($name,$file);
		redirect('index','refresh');
	}

	public function reading_journal($file)
	{
		$SCREENID="reading";
		$this->mainpage($SCREENID);
		// $this->data['idx']=$idx;
		// $this->data['listcustomer']= $data_array;
		// $this->load->view('editor/'.$SCREENID,$this->data);
		// $this->data['get_reviewer'] = $this->mdl_journal->getmember_ofTypeComplase(3,1);
		// $this->data['idjournal'] =  $idjournal;
		// $this->data['idreviewer'] = $idreviewer;
		// $this->data['id_reviewer'] = $id_reviewer;//id row fo reviwer table
		$this->data['file'] = $file;
		$this->load->view('reviewer/'.$SCREENID,$this->data);
	}

}

/* End of file reviewer.php */
/* Location: ./application/controllers/reviewer.php */