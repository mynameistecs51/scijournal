<style type="text/css">
	.showContain{
		display: none;
		word-wrap:break-word;
		width: 700px;
	}
</style>
<script type="text/javascript">
	$(function(){
		manageReviwer();
	});

	function manageReviwer(){
		$('.btnEdit').click(function(){
			if ( $( ".showContain" ).is( ":hidden" ) ) {
				$( ".showContain" ).slideDown( "slow" );
				selectReviewer();
				saveData_update();
			} else {
				$( ".showContain" ).hide('slow');
			}
		});

		$('.btnDelete').click(function(){
			var idjournal = $(this).data('idjournal');
			var idreviewer = $(this).val();
			var chk =  confirm('CONFIRM DELETE REVIEWER ?');
			if(chk==true){
				$.ajax({
					url: '<?php echo $url_delete;?>',
					type: 'POST',
					data: {'idjournal':idjournal,'idreviewer': idreviewer,},
					success:function(res){
						$('.modal').modal('hide');
						location.reload();
					}
				});
			}else{
				return false;
			}
		});
	}

	function selectReviewer(){
		$('.selectpicker').selectpicker({
			width:'250px',
			title:'SELECT REVIEWER',
			text:'<?php $idreviewer;?>',
		});
		$('#select_reviewer1').selectpicker('val','<?php echo $idreviewer;?>');
	}

	function saveData_update()
	{
		$('#form').on('submit', function (e) {
			if (e.isDefaultPrevented()) {
				alert("Error : Please review the information provided is correct. !");
          			// handle the invalid form...
          		} else {
              		// everything looks good!
              		e.preventDefault();
              		var form = $('#form').serialize();
              		$.ajax({
              			type: 'POST',
              			url: '<?php echo base_url()."index.php/".$controller; ?>/saveUpdate/',
               		data: {form}, //your form datas to post
                		// dataType:'json',
                		success: function(rs)
                		{
                			$('.modal').modal('hide');
                			alert("#Save completed !");
                			window.location.reload();
          		  	  // alert(rs);
          		  	},
          		  	error: function(err)
          		  	{
          		  		alert("#Error");
          		  		console.log(err);
          		  	},
          		  });
              	}
              });
	}
</script>

<div class="row">
	<div class="form-group">
		<div class="col-sm-4"></div>
		<button class="btn btn-primary btnEdit " >Edit</button>   <button class="btnDelete btn btn-danger" data-idjournal="<?php echo $idjournal;?>"  value="<?php echo $idreviewer;?>">Delete</button>
	</div>
	<div class="showContain container" >
		<form name="main" role="form" data-toggle="validator" id="form" method="post">
			<input type="hidden" name="idjournal" value="<?php echo $idjournal;?>"/>
			<input type="hidden" name="idreviewer" value="<?php echo $idreviewer;?>" /><!--  id member of reviewer -->
			<input type="hidden" name="id_reviewer" value="<?php echo $id_reviewer;?>" /><!--  id row  of reviewer -->
			<input type="hidden" name="id_editor" id="id_editor" value="<?php echo $session_data['id_member'];?>"/>
			<div class="form-group">
				<label class=" inline" for="select_reviewer">UPDATE REVIEWER :  </label>
				<select id="select_reviewer1" class="selectpicker show-tick "  data-live-search="true"  name="select_reviewer" title="SELECT REVIEWER" data-actions-box="true" >
					<?php foreach ($get_reviewer as $rowReviewer):?>
						<?php $selected = ($rowReviewer->id_member == $idreviewer)?"selected":"";?>
						<option value="<?php echo $rowReviewer->id_member;?>" selected="<?php echo $selected;?>" ><?php echo $rowReviewer->name; ?></option>
					<?php endforeach; ?>
				</select>
				<button type="submit" class="btn btn-primary">UPDATE</button>
		</form>
	</div>
</div>