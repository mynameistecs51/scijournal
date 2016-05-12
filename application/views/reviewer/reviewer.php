<?php echo $header;?>
<script  type="text/javascript" charset="utf-8">
	$(function(){
		count_journal();
	});

	function count_journal(){
		var count = $('.reading').length;
		for(i=1;i <= count ; i++){
			reading_journal(i);
			checked(i);
		}
	}

	function checked(num){
		$('#check'+num).click(function(){
			var screenname=":: CHECKED JOURNAL :: "+$(this).data('title');
			var baseurl_checked = "<?php echo $baseurl_checked;?>";
			var url = baseurl_checked+$(this).data('title')+'/'+$(this).data('idjournal');
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname);
			$('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
			var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
			modal.on('show.bs.modal', function () {
				modalBody.load(url);
			}).modal({backdrop: 'static',keyboard: true});
			setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
		});
	}

	function	reading_journal(num){
		$('#reading'+num).click(function(){
			var screenname=":: READING JOURNAL :: ";
			var baseurl_reading = "<?php echo $baseurl_reading;?>";
			var url = baseurl_reading+$(this).data('file');
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname);
			$('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
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
    						<?php
    						$count = count($read_journal);
    						foreach ($read_journal as $read) :
    							$num = $count--;
    						?>
    						<tr>
    							<td><?php echo $num; ?></td>
    							<td><?php echo $read['j_title']; ?></td>
    							<td class="pull-right">
    								<button type="button" class="btn btn-info  btn-xs reading" name="reading" id="reading<?php echo $num;?>" data-file="<?php echo $read['j_fulltext'];?>">READING</button>&nbsp;
    								<?php  //echo  anchor('reviewer/download_journal/'.$read['j_fulltext'],"download",' class="btn btn-info  btn-xs" name="download" ') ;?> &nbsp;
    								<button type="button" class="btn btn-primary btn-xs check" id="check<?php echo $num;?>" data-title="<?php echo $read['j_title'];?>" data-idjournal="<?php echo $read['id_journal']; ?>">CHECK</button>
    							</td>
    						</tr>
    					<?php endforeach;?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div><!-- /.end row  -->
  </div> <!-- /. end panel // -->
  <!-- Modal -->
  <div class="div_modal">
  	<!-- show modal -->
  </div>
  <?php echo $footer;?>