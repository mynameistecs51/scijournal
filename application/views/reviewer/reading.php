<script  type="text/javascript" charset="utf-8" async defer>
	$(function(){
		$('.check').on('click',function(){
			alert("CLICK");
		});
	});
</script>
<div class="row">
	<div class="form-group col-sm-12" align="center">
	<div class="col-sm-12"><button type="button" class="btn btn-primary check" >ตรวจ</button> </div>
	<div class="col-sm-12"></div>
	<div class="col-sm-12">
	<embed src="../file_journal/<?php echo $file;?>" type='application/pdf' width="90%" height="768px"></embed>
	</div>

	</div>
</div>