<?php echo $header; ?>
<div class="row">
<div class="nev_url"><div class="pull-left"><?php echo "Page -",$NAV; ?> </div><div class="pull-right"><?php echo $name;?></div></div>
		<hr/>
	<div class="panel panel-primary ">
		<div class ="panel-heading">
			<div class ="panel-title">Login</div>
		</div>
		<div class ="panel-body ">
			<form class="form-horizontal" action="<?php echo site_url('authen');?>" method="POST" role="form">
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email"  autofocus="on" autocomplete="true" />
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<!-- <div class="checkbox"> -->
						<!-- <label>
							<input type="checkbox"> Remember me |
						</label> -->
						<label>
							<?php echo anchor('home/register', ' Register', '<i class="glyphicon glyphicon-user" aria-hidden="true"');?>
						</label>
						<!-- </div> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>