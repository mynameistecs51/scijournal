<?php echo $header;?>
<?php $this->load->view('editor/head_menu');?>
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
							<!-- <th class="col-sm-2">date send</th> -->
							<th class="col-sm-4">status</th>
							<th class="col-sm-1">date update</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = count($getjournal['result']) ;
						foreach($getjournal['result'] as $journalRow):
							$num = $count--;
						?>
						<tr>
							<td><?php echo $num;?></td>
							<td><?php echo $journalRow->j_title;?></td>
							<!-- <td><?php echo $journalRow->dt_create;?></td> -->
							<td>
								<form class="check_status" name="check_status">
									<input type="hidden" name="id_admin" id="id_admin" value="<?php echo $session_data['id_member'];?>"/>
									<input type="hidden" name="id_user" id="id_user" value="<?php echo $journalRow->id_member;?>"/>
									<select id="select_reviewer<?php echo $num;?>" class="selectpicker show-tick "  data-live-search="true"  name="select_reviewer" title="SELECT REVIEWER" multiple="true"  data-actions-box="true">';
										<?php foreach ($get_reviewer as $rowReviewer):?>
											<option value="<?php echo $rowReviewer->id_member;?>"><?php echo $rowReviewer->name; ?></option>
										<?php endforeach; ?>
									</select>
									<input type="submit" class="btn btn-primary btn-xs inline" name="send[]" value="send" />
								</form>
							</td>
							<td><?php echo $journalRow->dt_update;?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
		// $('#select_reviewer1').on('change',function() {
		// 	console.log($(this).val());
		// 	$(this).selectpicker('refresh');
		// });
		$('input[name=select_reviewer]').selectpicker('changed.bs.select',function(e) {
			if(e){
				$.ajax({
					url: "<?php echo site_url('editor/manage_reviewer');?>",
					type: "POST",
					data: $(this).closest('form').serialize(),
				}).success(function(data){
					alert("update status success");
				});
			}else{
				$.ajax({
					url: "<?php echo site_url('editor/manage_reviewer');?>",
					type: "POST",
					data: $(this).closest('form').serialize(),
				}).success(function(data){
					alert("cancen status success");
				});
			}
		});
	});
</script>
<?php echo $footer;?>