<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

	public function __construct()
	{
       	$this->ci =& get_instance();
       	$this->ci->load->model('mdl_menu');
	}

	public function getHeader($base_url,$SCREENNAME)
	{
		return'
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<title>Science UDRU Journal</title>
				<link rel="stylesheet" type="text/css" href="'.base_url().'css/bootstrap-theme.css"/>
				<link rel="stylesheet" type="text/css" href="'.base_url().'css/bootstrap.min.css"/>
				<!--<script src="'.base_url().'js/bootstrap.js"></script>-->
				<script src="'.base_url().'js/jquery.js"></script>

				<!-- start bootstrap data table -->
				<link rel="stylesheet" type="text/css" href="'.base_url().'DataTables/media/css/jquery.dataTables.css">
				<style type="text/css" class="init">
					div.dataTables_wrapper {
						margin-bottom: 3em;
					}
				</style>
				<script type="text/javascript" language="javascript" src="'.base_url().'DataTables/media/js/jquery.js"></script>
				<script type="text/javascript" language="javascript" src="'.base_url().'DataTables/media/js/jquery.dataTables.js"></script>
				<script type="text/javascript" language="javascript" class="init">
					$(document).ready(function () {
						$("table.display").dataTable();
					});
				</script>
				<!-- end data table bootstrap -->
				</head>
			<body>
				<div class="container">
					<div class="col-sm-12">
						&nbsp;
					</div>
					<div class="row">
						<div class="col-sm-12">
							<!-- Jumbotron Header -->
							<header class="jumbotron hero-spacer" style="height: 270px;">
								<h1>SCIENCE UDRU JOURNAL...</h1>
								<p>Faculty of Science and Journal</p>
							</header>
							<!-- menu -->
							<div class="col-sm-3 well pull-left">
								<div class="col-sm-12">
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
						Copyright &copy; Your Website 2016
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
		$menu = '<ul class="nav nav-pills nav-stacked pull-left inline">';
		foreach($result['result'] as $row) {
			//$active=($active_menu=='active'?'active':'');
			$menu.='<li role="presentation" id="'.$row->menu_name.'" class="">'. anchor("$row->filelocation","$row->menu_name").'</li>';
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
