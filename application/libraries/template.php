<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('mdl_menu','',TRUE);
		$this->ci->load->model('Login','',TRUE);
		$this->session_data = $this->ci->session->userdata('session_data');
	}

	// public function index(){
	// 	if(! $this->session->userdata['fb_data']){
	// 		echo "NO";
	// 	}
	// }
	public function getHeader($base_url,$SCREENNAME)
	{
		return'
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="description" content="SCIENCE JOURNAL UDRU,วิจัย,คณะวิทยาศาสตร์ ราชภัฏอุดรธานี">
			<meta name="keywords" content="วิจัย,คณะวิทยาศาสตร์ ราชภัฏอุดรธานี">
			<meta name="author" content="SCIENCE UDRU">
			<title>Science UDRU Journal</title>
			<!-- <link rel="stylesheet" type="text/css" href="'.base_url().'css/bootstrap-theme.css"/> -->
			<link rel="stylesheet" type="text/css" href="'.base_url().'css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="'.base_url().'css/bootstrap.min.css"/>
			<link rel="stylesheet" href="'.base_url().'css/bootstrap-select/bootstrap-select.css">
			<link rel="stylesheet" href="'.base_url().'css/bootstrap-switch/bootstrap-switch.css">

			<script src="'.base_url().'js/jquery.js"></script>
			<!-- <script src="'.base_url().'js/bootstrap.js"></script>-->
			<script src="'.base_url().'js/bootstrap.min.js"></script>
			<script  src="'.base_url().'js/bootstrap-select/bootstrap-select.js"></script>
			<script  src="'.base_url().'js/bootstrap-switch/bootstrap-switch.js"></script>
			<!-- start bootstrap data table -->
			<link rel="stylesheet" type="text/css" href="'.base_url().'DataTables/media/css/jquery.dataTables.css">
			<style type="text/css" class="init">
				div.dataTables_wrapper {
					margin-bottom: 3em;
				}
			</style>
			<!-- <script type="text/javascript" language="javascript" src="'.base_url().'DataTables/media/js/jquery.js"></script> -->
			<script type="text/javascript" language="javascript" src="'.base_url().'DataTables/media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" language="javascript" class="init">
				$(document).ready(function () {
					$("table.display").dataTable();
				});
			</script>
			<!-- end data table bootstrap -->
		</head>
		<body>
			<div class="container" style="bg-color:#fff;">
				<div class="col-sm-12">
					&nbsp;
				</div>
				<div class="row">
					<div class="col-sm-12">
						<img src="'.base_url().'img/header.png"  >
						<!-- Jumbotron Header -->
						<!--<header class="jumbotron hero-spacer" style="height: 270px;" >
						<h1>SCIENCE UDRU JOURNAL...</h1>
						<p>Faculty of Science and Journal</p>
					</header> -->
					<!-- menu -->
				<div class="col-sm-3 well pull-left">
				<h4><p>Menu</p></h4>
						<div class="col-sm-12" style="font-family: "Times New Roman", Times, serif;word-wrap:break-word;">
							'.$this->menu($base_url).'
						</div>
					</div>
					<!-- end menu -->
					<!-- body -->
					<div class="col-sm-9  ">
						';
					}

					public function getFooter()
					{
						return'
					</div>
					<!-- /.body -->
				</div>
			</div>
		</div>
		<!-- /.container -->

		<div class="container">
			<hr>
			<!-- Footer -->
			<footer class="pull-right">
				<div class="row">
					<div class="col-lg-12">
						<p>
							Faculty of Science <br/>
							UDON THANI RAJABHAT UNIVERSITY<br/>
							Copyright &copy; Chaiwat Homsang
						</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->
	</body>
	</html>
	';
}

public function menu($SCREENNAME)
{

	$result =$this->ci->mdl_menu->getMenu();
	$menu = '<ul class="row  nav nav-pills nav-stacked pull-left inline ">';
	foreach($result['result'] as $row) {
			//$active=($active_menu=='active'?'active':'');
		$menu.='<li role="presentation" id="'.$row->menu_name.'" class=""><h4><p>'. anchor("$row->filelocation","$row->menu_name",'class="glyphicon glyphicon-chevron-right"').'</p ></h4></li>';
	}
	if($this->session_data == ''){
		$menu.='<li role="presentation" id="login" class=""><h4><p >'.  anchor('home/login','Login/Register','class="glyphicon glyphicon-chevron-right from-group"').'</p ></h4></li>';
	}else{
		if($this->session_data['m_type'] == 4 && $this->session_data['m_statusType'] == 1){	//admin
			$menu.= '<li role="presentation" id="admin" class=""><h4><p>'.  anchor(site_url('admin'),'Admin','class="glyphicon glyphicon-chevron-right"').'</p ></h4></li>';
		}elseif($this->session_data['m_type'] == 2 && $this->session_data['m_statusType'] ==1){	//editor
			$menu.= '<li role="presentation" id="editer" class=""><h4><p>'.  anchor(site_url('editor'),'Editor','class="glyphicon glyphicon-chevron-right"').'</p ></h4></li>';
		}elseif($this->session_data['m_type'] == 3 && $this->session_data['m_statusType'] ==1){	//editor
			$menu.= '<li role="presentation" id="reviewer" class=""><h4><p>'.  anchor(site_url('reviewer'),'Reviewer','class="glyphicon glyphicon-chevron-right"').'</p ></h4></li>';
		}
		$menu.= '<li role="presentation" id="login" class=""><h4><p>'.  anchor(site_url('authen/logout'),'Logout'." ".$this->session_data['m_name'],'class="glyphicon glyphicon-chevron-right"').'</p ></h4></li>';
	}
	$menu .= '</ul>';

	return $menu;
}

public function getScreenName($ctl_name)
{
	return $this->ci->mdl_menu->getScreenName($ctl_name);
}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
