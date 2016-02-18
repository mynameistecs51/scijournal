<?php echo $header;?>
<div class="row">
	<div class="col-sm-12">
		<div class="nev_url"><?php echo "Page -",$NAV; ?> </div>
		<hr/>
		<div class="panel panel-primary">
			<div class ="panel-heading">
				<div class ="panel-title">Add journal </div>
			</div>
			<div class ="panel-body">
				<?php echo form_open_multipart('','class="form-horizontal role="form"');?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
						<textarea style="width: 100%"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">** Author</label>
					<div class="col-sm-10">
						<textarea style="width: 100%"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">**Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">** Abstract</label>
					<div class="col-sm-10">
						<textarea rows="15" style="width: 100%"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">** Paper Type</label>
					<div class="col-sm-10">
						<select>
							<option>asdf</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">** Category</label>
					<div class="col-sm-10">
						<select>
							<option>asdf</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">** Full Text</label>
					<div class="col-sm-10">
						<input type="file"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">** Suggested Reviewers</label>
					<div class="col-sm-10">
						<textarea rows="15" style="width: 100%"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
<?php echo $footer;?>