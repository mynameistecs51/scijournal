<?php echo $header;?>
<script  type="text/javascript" charset="utf-8">
	$(function(){
		countstatus();
		countStatusEditor();
	});
	function countstatus(){
		var count = $('.status').length;
		for ( i =1 ; i <= count ; i++){
			reading_journal(i);
		}
	}
	function  reading_journal(num){
		$('#status').attr('id','status'+num);
		$('#status'+num).click(function(){
			var screenname=":: DETAIL :: ";
			var baseurl_satusjournal = "<?php echo $baseurl_satusjournal;?>";
			var url = baseurl_satusjournal+$(this).data('idjournal')+"/"+$(this).data('idreviewer');
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname);
			$('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>img/loader.gif"/>');
			var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
			modal.on('show.bs.modal', function () {
				modalBody.load(url);
			}).modal({backdrop: 'static',keyboard: true});
			setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
		});
	}
	function countStatusEditor(){
		var statusEditor = $('.statusEditor').length;
		for (i= 1 ; i <= statusEditor; i ++) {
			btnEditorCheck(i);
		}
	}
	function btnEditorCheck(num) {
		$('#statusEditor').attr('id','statusEditor'+num);
		$('#statusEditor'+num).click(function(){
			var screenname=":: DETAIL :: ";
			var base_statusEditor = "<?php echo $base_statusEditor;?>";
			var url = base_statusEditor+$(this).data('idjournal')+"/"+$(this).data('idChecked');
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname);
			$('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>img/loader.gif"/>');
			var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
			modal.on('show.bs.modal', function () {
				modalBody.load(url);
			}).modal({backdrop: 'static',keyboard: true});
			setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
		});
	}
	function modal_form(n,screenname)
	{
		var div='';
            // div+='<form name="main" role="form" data-toggle="validator" id="form" method="post">';
            div+='<!-- Modal -->';
            div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
            div+='<div class="modal-dialog " style="width:95%;height:768px;">';
            div+='<div class="modal-content ">';
            div+='<div class="modal-header modal-info"style="background:#E0FFFF;color:#000;" >';
            div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            div+='<h4 class="modal-title">'+screenname+'</h4>';
            div+='</div>';
            div+='<div class="modal-body ">';
            div+='</div>';
        // div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
          // div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
          // div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
        // div+='</div>';
        div+='</div><!-- /.modal-content -->';
        div+='</div><!-- /.modal-dialog -->';
        div+='</div><!-- /.modal -->';
      // div+='</form>';
      $('.div_modal').html(div);
    }
  </script>
  <?php $this->load->view('editor/head_menu');?>
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
  							<th class="col-sm-3 text-center">REVIEWER</th>
  							<th class="col-sm-2 text-center">EDITOR</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php
  						$count = count($reviewerCheck);
  						foreach ($reviewerCheck as $key => $value) {
  							$num = $count--;
  							?>
  							<tr>
  								<td><?php echo $num; ?></td>
  								<td><?php echo $value['j_title']; ?></td>
  								<td>
  									<?php
  									$count_reviewer = count($value['reviewer']);
  									for($i=0;$i<$count_reviewer;$i++){
  										echo '<p> <button type="button" class="btn btn-primary btn-xs status" id="status" data-idjournal="'.$value['id_journal'].'" data-idreviewer="'. $value['reviewer'][$i]['id_member'].'">'.
  										$value['reviewer'][$i]['check_status'].'
  									</button></p>';
  								}
  								?>
  							</td>
  							<td >
  								<?php 
  								echo '<button type="button" class="btn btn-warning statusEditor" id="statusEditor"  data-idChecked="'.$value['id_checked'].'"  data-idjournal="'. $value['id_journal'].'" >
  								<p class="glyphicon glyphicon-remove text-danger">  No Checked !!</p>
  							</button>';
  							?>
  						</td>
  					</tr>
  					<?php
  				}
  				?>
  			</tbody>
  		</table>
  	</div>
  </div>
</div>
</div>
<div class="div_modal">
	<!-- show modal -->
</div>
<?php echo $footer;?>