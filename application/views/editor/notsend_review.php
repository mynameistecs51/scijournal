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
           $count = count($notsend) ;
           foreach($notsend as $notsendRow):
            $num = $count--;
          ?>
          <tr>
            <td><?php echo $num;?></td>
            <td><?php echo $notsendRow['j_title'];?></td>
            <td><?php echo $notsendRow['dt_create'];?></td>
            <td><?php echo '<p class="text-danger">NOT SEND</p>';?> </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php echo $footer;?>