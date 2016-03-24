<?php echo $header;?>
<?php $this->load->view('admin/admin_menu');?>
<div class="panel-body">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<!-- <table class="table table-bordered table-hover table-striped"> -->
				<table id ="" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="col-sm-1">#</th>
							<th class="">DETAILS</th>
							<th class="col-sm-1">DATE</th>
							<th class="col-sm-2">STATUS</th>
						</tr>
					</thead>
					<tbody>
						<?php 	foreach($geteditor as $editor_row):	?>
							<?php
							$count = count($geteditor);
							$m_statusType = ($editor_row->m_statusType == '1'? "checked":"");
							?>
							<tr>
								<td><?php echo $count++;?></td>
								<td>
									<?php
									echo $editor_row->name,"<br/>";
									echo "From: ",$editor_row->m_organizetion;
									?>
								</td>
								<td><?php echo $editor_row->date;?></td>
								<td class="col-sm-1">
									<form class="check_status" name="check_status">
										<input type="hidden" name="user_id" id="user_id" value=""/>
										<input type="hidden" name="user" id="user" value=""/>
										<input type="checkbox" class="form-control"  id="my-checkbox" name="my-checkbox"  <?php echo $m_statusType ;?> />
									</form>
								</td>
							</tr>
						<?php	endforeach;	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("[name = 'my-checkbox']").bootstrapSwitch({ onSwitchChange : function(e,s){
			if(s){
				$.ajax({
					url: "<?php echo site_url('main/manage_status');?>",
					type: "POST",
					data: $(this).closest('form').serialize(),
				}).success(function(data){
					alert("อัพเดทสถานะแล้ว");
				});
			}else{
				$.ajax({
					url: "<?php echo site_url('main/manage_status');?>",
					type: "POST",
					data: $(this).closest('form').serialize(),
				}).success(function(data){
					alert("ยกเลิกสถานะแล้ว");
				});
			}
		},
		onText: "Editor",
		onColor:'success',
		offColor:'warning',
		handleWidth:"50px",
		labelWidth:'auto',
	});
	});
</script>
<?php echo $footer;?>