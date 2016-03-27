<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->ctl="admin";
		$this->load->model('mdl_journal');
		$this->load->model('mdl_register');
		$this->session_data = $this->session->userdata('session_data');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$this->dt_now = $now->format('Y-m-d H:i:s');
		
		if($this->session_data['m_type']  != "4"   &&  $this->session_data['m_statusType'] != "1" )
		{
			redirect('authen','refresh');
		}
	}

	public function index()
	{ // ----- confirm editer page ---/
		$type_editor = '2';
		$this->data['geteditor'] = $this->mdl_journal->getmember_ofType($type_editor);
		$SCREENID="confirm_editor";
		$SCREENNAME = ">Confirm Editor";
		$this->mainpage($SCREENNAME);
		$this->load->view('admin/'.$SCREENID,$this->data);
	}

	public function confirm_reviewer()
	{
		$type_reviewer = '3 ';
		$this->data['getreviewer'] = $this->mdl_journal->getmember_ofType($type_reviewer); //getreviewer
		$SCREENID="confirm_reviewer";
		$SCREENNAME = ">Confirm Reviewer";
		$this->mainpage($SCREENNAME);
		$this->load->view('admin/'.$SCREENID,$this->data);
	}
	public function mainpage($SCREENNAME)
	{
		//$SCREENNAME="Home";
		$this->data['controller'] = $this->ctl;
		$this->data['base_url'] = base_url();
		$this->data['name'] = $this->session_data['m_name'];
		$this->data['session_data'] = $this->session_data;
		$this->data["header"]=$this->template->getHeader(base_url(),$SCREENNAME);
		$this->data["footer"] = $this->template->getFooter();
		$this->data['NAV'] = $SCREENNAME;
		$this->data['getmember'] = $this->mdl_journal->getjournal();
		// $this->data['NAV'] = $this->SCREENNAME;
	}

	public function manage_status()
	{
		$id_admin = $this->input->post('id_admin');
		$id_user = $this->input->post('id_user');
		$id_type = $this->input->post('type');
		$btn_status = $this->input->post('my-checkbox');
		if($btn_status === "on"){
			echo "ON";
		}else{
			echo "Off";
		}

		$sql = "UPDATE member SET id_update = '".$id_admin."' ,dt_update ='".$this->dt_now."',m_statusType = '1' WHERE id_member ='".$id_user."' AND m_type = '".$id_type."' ";
		//$this->db->query($sql);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */