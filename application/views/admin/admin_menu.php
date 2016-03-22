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
							<div>Editor</div>
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
		<a href="<?php echo base_url().'index.php/editor/send_reviewer';?>">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-share-square fa-5x"></i>
						</div>
						<div class="col-md-12 text-right">
							<div class="huge">xxxx</div>
							<div>Reviewer</div>
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