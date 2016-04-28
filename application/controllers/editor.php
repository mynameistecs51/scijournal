<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->ctl="editor";
		$this->load->model('mdl_journal');
		$this->load->model('mdl_editor');
		$this->load->model('mdl_reviewer');
		$this->session_data = $this->session->userdata('session_data');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');

		if($this->session_data['m_type']  != "2"   &&  $this->session_data['m_statusType'] != "1" )
		{
			redirect('authen','refresh');
		}
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

	public function send_reviewer()
	{
		$SCREENID="send_review";
		$SCREENNAME = ">Send Reviewer";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->data['get_reviewer'] = $this->mdl_journal->getmember_ofType(3);
		$this->load->view('editor/'.$SCREENID,$this->data);
	}

	public function notsend_reviewer()
	{
		$SCREENID="notsend_review";
		$SCREENNAME = ">Send Reviewer";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		// $this->data['get_reviewer'] = $this->mdl_journal->getmember_ofType(3);
		// $this->data['getReviewer'] = $this->mdl_reviewer->getReviewer();
		$this->load->view('editor/'.$SCREENID,$this->data);
	}

	public function manage_reviewer()
	{
		$id_member = $this->input->post('select_reviewer');

		$reveiw = array();
		foreach($id_member as $key => $value):
			$reveiw[].=$value;
		endforeach;
		for($i=0;$i<count($reveiw);$i++){
			$data = array(
				'id_member' => $reveiw[$i],
				'id_update'  => $this->input->post('id_admin'),
			// 'id_user' => $this->input->post('id_user'),
				'id_journal' => $this->input->post('id_journal'),
				'dt_create' => $this->dt_now,
				);
			$this->mdl_editor->insertEditor($data);
		}
		redirect('editor/send_reviewer','refresh');
	}

	public function edit($idjournal,$id_reviewer,$idreviewer)
	{
		$SCREENID="E001";
		$this->mainpage($SCREENID);
		// $this->data['idx']=$idx;
		// $this->data['listcustomer']= $data_array;
		// $this->load->view('editor/'.$SCREENID,$this->data);
		$this->data['get_reviewer'] = $this->mdl_journal->getmember_ofType(3);
		$this->data['idjournal'] =  $idjournal;
		$this->data['idreviewer'] = $idreviewer;
		$this->data['id_reviewer'] = $id_reviewer;//id row fo reviwer table
		$this->load->view('editor/'.$SCREENID,$this->data);
	}

	public function DELETE()
	{
		$this->mdl_editor->deleteReviewer();
	}

	public function saveUpdate()
	{
		$this->mdl_editor->saveUpdate();
	}
}


/* End of file editor.php */
/* Location: ./application/controllers/editor.php */