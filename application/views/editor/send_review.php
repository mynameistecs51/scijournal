<?php echo $header;?>
<div class="row ">
	<div class="nev_url"><div class="pull-left"><?php echo "Page -",$NAV; ?> </div><div class="pull-right"><?php echo $name;?></div></div>
	<hr/>
	<div class=" col-lg-3 col-md-2">
		<a href="<?php echo site_url('editor');?>">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-file-text fa-5x"></i>
						</div>
						<div class="col-md-9 text-right">
							<div class="huge">xxxx</div>
							<div>All Journal</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</a>
	</div>
	<div class=" col-lg-3 col-md-2">
		<a href="#">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-share-square fa-5x"></i>
						</div>
						<div class="col-md-12 text-right">
							<div class="huge">xxxx</div>
							<div>Send To Reviewer</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</a>
	</div>
	<div class=" col-lg-3 col-md-2">
		<a href="#">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-12 text-right">
							<div class="huge">xxxx</div>
							<div>Not Send </div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</a>
	</div>
	<div class=" col-lg-3 col-md-2">
		<a href="admin_status_paper">
			<div class="panel panel-info ">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-file-text fa-5x"></i>
						</div>
						<div class="col-md-12 text-right">
							<div class="huge">xxxx</div>
							<div>Reviewer comment</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</div>
		</a>
	</div>
</div>  <!-- /.row -->
<hr/>
<div class="panel-body">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<!-- <table class="table table-bordered table-hover table-striped"> -->
				<table id ="" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>id</th>
							<th>details</th>
							<th class="col-sm-2">date send</th>
							<th>สถานะ</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>123AAA</td>
						<td>asdfasdfasdfasdf</td>
						<td>12-3-2016</td>
						<td>Accept</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo $footer;?>