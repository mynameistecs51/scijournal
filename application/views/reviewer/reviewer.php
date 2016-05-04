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
							<th class="col-sm-4 text-center">STATUS</th>
						</tr>
					</thead>
					<tbody>
						<?php	
						$num = count($read_journal);
						foreach ($read_journal as $read) : 
							?>
						<tr>
							<td><?php echo $num-- ; ?></td>
							<td><?php echo $read['j_title']; ?></td>
							<td>test</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div><!-- /.end row  -->
</div> <!-- /. end panel // -->

<?php echo $footer;?>