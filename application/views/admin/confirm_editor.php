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
						<?php 	foreach($geteditor as $editor_row):	?>
							<?php $count = count($geteditor);?>
							<tr>
								<td><?php echo $count++;?></td>
								<td>
									<?php
									echo $editor_row->name,"<br/>";
									echo "From: ",$editor_row->m_organizetion;
									?>
								</td>
								<td><?php echo $editor_row->date;?></td>
								<td>confirm</td>
							</tr>
						<?php	endforeach;	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo $footer;?>