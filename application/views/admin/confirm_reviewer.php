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
							<th class="col-sm-3">STATUS</th>
						</tr>
					</thead>
					<tbody>
						<?php 	foreach($getreviewer as $reviewer):	?>
							<?php
							$count = count($getreviewer);
							$m_statusType = ($reviewer->m_statusType == '1'? "checked":"");
							?>
							<tr>
								<td><?php echo $count++;?></td>
								<td>
									<?php
									echo $reviewer->name,"<br/>";
									echo "From: ",$reviewer->m_organizetion;
									?>
								</td>
								<td><?php echo $reviewer->date;?></td>
								<td class="col-sm-1">
									<form class="check_status" name="check_status">
										<input type="hidden" name="id_update" id="id_update" value="" />
										<input type="hidden" name="id_member" id="id_member" value="<?php echo $reviewer->id_member;?>"/>										<input type="checkbox" class="form-control"  id="my-checkbox" name="my-checkbox"  <?php echo $m_statusType ;?> />
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
					alert("update status success");
				});
			}else{
				$.ajax({
					url: "<?php echo site_url('main/manage_status');?>",
					type: "POST",
					data: $(this).closest('form').serialize(),
				}).success(function(data){
					alert("cancen status success");
				});
			}
		},
		onText: "Reviewer",
		onColor:'success',
		offColor:'warning',
		handleWidth:"50px",
		labelWidth:'auto',
	});
	});
</script>
<?php echo $footer;?>