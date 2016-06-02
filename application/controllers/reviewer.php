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
		$this->data['row_checked'] = $this->mdl_reviewer->journal_checked($this->session_data['id_member']);
		$this->data['base_urlreviewer'] = base_url().'index.php/'.$this->ctl;
		$this->data['baseurl_reading'] =  base_url().'index.php/'.$this->ctl."/reading_journal/";
		$this->data['baseurl_checked'] =  base_url().'index.php/'.$this->ctl."/checked/";
		$this->data['baseurl_savechecked'] = base_url().'index.php/'.$this->ctl."/savechecked/";
		$this->data['baseurl_journalchecked'] = base_url().'index.php/'.$this->ctl.'/journal_checked/';
		$this->data['baseurl_satusjournal'] = base_url().'index.php/'.$this->ctl.'/satus_journal/';
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
		$this->data['file'] = $file;
		$this->load->view('reviewer/'.$SCREENID,$this->data);
	}
	public function checked($title,$idjournal,$idreviewer)
	{
		$SCREENID="checked";
		$this->mainpage($SCREENID);
		$this->data['title'] = $title;
		$this->data['idjournal'] = $idjournal;
		$this->data['idreviewer'] = $idreviewer;
		$this->load->view('reviewer/'.$SCREENID,$this->data);
	}
	function savechecked(){  //upload file comment
		$this->form_validation->set_rules('comment','comment','xss_clean');

		$date = date("d_m_Y_His");
		if($_FILES['userfile']['name'] != ""){
			$config['upload_path'] =  './file_journal/checkedComment';
			$config['allowed_types'] = 'doc|docx|pdf|zip|jpg|png';
			$config['max_size'] = '7000';	// 7mb
			$config['file_name'] = $date.'.'.substr($_FILES['userfile']['name'],-4); //file_name
			$config['remove_spaces'] = TRUE;
			$this->load->library("upload",$config);	//library upload
			$this->upload->initialize($config);
			if($this->upload->do_upload('userfile')){	//ถ้า upload ไม่มีปัญหา
				$file_name = $this->upload->data();
				$data = array(
					'id_reviewer' => $this->input->post('idreviewer'),
					'id_member' => $this->input->post('id_reviewer'),
					'id_journal'  =>$this->input->post('idjournal'),
					'check_status' => $this->input->post('status'),
					'check_comment' => $this->input->post('comment'),
					'check_filecomment' =>$file_name['file_name'],
					'dt_create' => $this->dt_now,
					);
				$this->mdl_reviewer->savechecked($data);
				// echo "<pre>";
				// print_r($data);
			}else{
				// echo $this->upload->display_errors();
				$message = "File Upload Fail !!";
				$url = $this->ctl;
				$this->alert($message,$url);
			}
		}else{
			$data = array(
				'id_reviewer' => $this->input->post('idreviewer'),
				'id_member' => $this->input->post('id_reviewer'),
				'id_journal'  =>$this->input->post('idjournal'),
				'check_status' => $this->input->post('status'),
				'check_comment' => $this->input->post('comment'),
				'check_filecomment' =>"",
				'dt_create' => $this->dt_now,
				);
			$this->mdl_reviewer->savechecked($data);
		}
		redirect($this->ctl,'refresh');
	}
	public function journal_checked()
	{
		$SCREENID="journal_checked";
		$SCREENNAME = "> JOURNAL CHECKED";
		$this->mainpage($SCREENNAME);
		$this->load->view('reviewer/'.$SCREENID,$this->data);
	}
	public function satus_journal()
	{

	}
	public function alert($massage, $url)
	{
		echo "<meta charset='UTF-8'>
		<SCRIPT LANGUAGE='JavaScript'>
			window.alert('$massage')
			window.location.href='".site_url($url)."';
		</SCRIPT>";
	}
}
/* End of file reviewer.php */
/* Location: ./application/controllers/reviewer.php */