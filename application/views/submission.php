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
				<?php echo form_open_multipart('submission/insertJournal/','class="form-horizontal role="form"');?>
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label"><i style="color: red;">**</i> Title</label>
					<div class="col-sm-10">
						<textarea id="title" name="title" style="width: 100%" required><?php echo set_value('title');?></textarea>
						<?php echo form_error('title','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="author" class="col-sm-2 control-label"><i style="color: red;">**</i>  Author</label>
					<div class="col-sm-10">
						<textarea id="author" name="author" style="width: 100%" required><?php echo set_value('author'); ?></textarea>
						<?php echo form_error('author','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label"><i style="color: red;">**</i> Email</label>
					<div class="col-sm-10">
						<input type="email"  class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>" required />
						<?php echo form_error('email','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="abstract" class="col-sm-2 control-label"><i style="color: red;">**</i>  Abstract</label>
					<div class="col-sm-10">
						<textarea rows="15" id="abstract" name="abstract" style="width: 100%" required><?php echo set_value('abstract');?></textarea>
						<?php echo form_error('abstract','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="paper_type" class="col-sm-2 control-label"><i style="color: red;">**</i>  Paper Type</label>
					<div class="col-sm-3">
						<select class="form-control" id="paper_type" name="paper_type" required>
							<?php foreach ($paperType['result'] as $rowPaper) : ?>
								<option value="<?php echo $rowPaper->id_ptype; ?>"><?php echo $rowPaper->ptype_name;?></option>
							<?php endforeach;?>
						</select>
						<?php echo form_error('paper_type','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="category" class="col-sm-2 control-label"><i style="color: red;">**</i>  Category</label>
					<div class="col-sm-3">
						<select class="form-control" id="category" name="category" required>
							<?php foreach ($category['result'] as $rowCategory):?>
								<option value="<?php echo $rowCategory->id_category;?>"><?php echo $rowCategory->cat_name;?></option>
							<?php endforeach;?>
						</select>
						<?php echo form_error('category','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="full_text" class="col-sm-2 control-label"><i style="color: red;">**</i>  Full Text</label>
					<div class="col-sm-10">
						<input type="file" id="full_text" name="full_text" class="form-control" >
						<?php echo form_error('full_text','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<label for="sugges_review" class="col-sm-2 control-label"><i style="color: red;">**</i>  Suggested Reviewers</label>
					<div class="col-sm-10">
						<textarea rows="15" id="sugges_review" name="sugges_review" style="width: 100%" required><?php echo set_value('sugges_review');?></textarea>
						<?php echo form_error('sugges_review','<span class="label label-warning">','</span>');?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>
<?php echo $footer;?>