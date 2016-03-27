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
							<th class="col-sm-2">date send</th>
							<th>status</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = count($getjournal['result']) ;
						foreach($getjournal['result'] as $journalRow):
							?>
						<tr>
							<td><?php echo $count--;?></td>
							<td><?= $journalRow->j_title;?></td>
							<td><?= $journalRow->dt_create;?></td>
							<td><?= $journalRow->status;?></td>
							<!-- <td><?= $journalRow->dt_update;?></td> -->
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<?php echo $footer;?>