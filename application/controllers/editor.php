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
		$this->data['getReviewer'] = $this->mdl_editor->getReviewer();
		$this->data['notsend'] = $this->mdl_editor->notsendReviewer();
		$this->data['url_edit']= base_url().'index.php/'.$this->ctl."/edit/";
		$this->data['url_delete'] = base_url().'index.php/'.$this->ctl."/delete/";
		$this->data['row_checked'] = $this->mdl_reviewer->journal_checked("");
		$this->data['baseurl_satusjournal'] = base_url().'index.php/'.$this->ctl.'/satus_journal/';
		$this->data['base_statusEditor'] = base_url().'index.php/'.$this->ctl.'/statusEditor_click/';
		// $this->data['NAV'] = $this->SCREENNAME;
	}

	public function send_reviewer()
	{
		$SCREENID="send_review";
		$SCREENNAME = ">Send Reviewer";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		$this->data['get_reviewer'] = $this->mdl_journal->getmember_ofTypeComplase(3,1);
		$this->load->view('editor/'.$SCREENID,$this->data);
	}

	public function notsend_reviewer()
	{
		$SCREENID="notsend_review";
		$SCREENNAME = ">Send Reviewer";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->mainpage($SCREENNAME);
		// $this->data['get_reviewer'] = $this->mdl_journal->getmember_ofTypeComplase(3,1);
		// $this->data['getReviewer'] = $this->mdl_editor->getReviewer();
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
		$this->data['get_reviewer'] = $this->mdl_journal->getmember_ofTypeComplase(3,1);
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
	public function reviewer_comment()
	{
		$checked = array();
		foreach ($this->mdl_reviewer->journal_checked("")  as $rowchecked => $valueCheck) {
			if(isset($checked[$valueCheck['id_journal']])){
				array_push($checked[$valueCheck['id_journal']]['reviewer'],array(
					'id_member' => $valueCheck['id_member'],
					'check_status' => $valueCheck['check_status'],
					));
				continue;
			}else{
				$checked[$valueCheck['id_journal']] =array(
					'id_checked' => $valueCheck['id_checked'],
					'id_journal' => $valueCheck['id_journal'],
					'j_title' => $valueCheck['j_title'],
					'j_status' => $valueCheck['j_status'],
					'journal_status' => $valueCheck['journal_status'],
					'reviewer' =>array(
						$key = array(
                                              // 'j_title' => $valueCheck['j_title'],
							'id_member' => $valueCheck['id_member'],
							'check_status' => $valueCheck['check_status'],
							)
						)
					);
			}
		}
		$SCREENID="reviewer_comment";
		$SCREENNAME = ">Reviewer Comment";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		// $this->data['dataStatus'] = $this->mdl_reviewer->getReviewercheck('','');
		$this->data['reviewerCheck'] = $checked;
		$this->mainpage($SCREENNAME);
		$this->load->view('editor/'.$SCREENID,$this->data);
		// print_r($this->data['row_checked']);
	}
	public function satus_journal($idjournal,$id_member)
	{
		$SCREENID="status_journal";
		$SCREENNAME = "> STATUS JOURNAL";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->data['idjournal'] = $idjournal;
		$this->data['id_member'] = $id_member;
		$this->data['dataStatus'] = $this->mdl_reviewer->getReviewercheck($idjournal,$id_member);
		// $this->data['reviewerCheck'] = $checked;
		$this->mainpage($SCREENNAME);
		$this->load->view('editor/'.$SCREENID,$this->data);
	}
	public function statusEditor_click($idjournal,$idChecked)
	{
		// echo $idChecked,'<<<<<<<<<<<<<<<<<<<<<';
		$SCREENID="editorComment";
		$SCREENNAME = "> STATUS JOURNAL";
		// $SCREENNAME=$this->template->getScreenName($SCREENID);
		$this->data['idjournal'] = $idjournal;
		$this->data['id_editor'] = $this->session_data['id_member'];
		// $this->data['id_member'] = $id_member;
		$this->data['dataStatus'] = $this->mdl_reviewer->getReviewercheck($idjournal,'');
		// $this->data['reviewerCheck'] = $checked;
		$this->mainpage($SCREENNAME);
		$this->load->view('editor/'.$SCREENID,$this->data);
	}
	public function editorStatus_save()
	{
		// $data = array(
		// 	// 'idjournal' => $this->input->post('idjournal'),
		// 	'status_editorcheck' => $this->input->post('status'),
		// 	'check_comment' => $this->input->post('comment'),
		// 	'dt_update' => $this->dt_now ,
		// 	'id_update' => $this->session_data['id_member'],
		// 	);
		$this->mdl_editor->editorStatus_save();
	}
}

/* End of file editor.php */
/* Location: ./application/controllers/editor.php */