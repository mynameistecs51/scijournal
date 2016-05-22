<?php echo $header;?>
<?php $this->load->view('reviewer/head_menu');?>
<div class="panel-body">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<!-- <table class="table table-bordered table-hover table-striped"> -->
				<table id ="" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="col-sm-1">#</th>
							<th class="text-center">DETAIL</th>
							<!-- <th class="col-sm-2">date send</th> -->
							<th class="col-sm-3 text-center">STATUS</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($row_checked as $rowchecked):
						$num = count($row_checked);
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $rowchecked['j_title']; ?></td>
							<td><?php echo $rowchecked['check_status']; ?></td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<?php echo $footer;?>