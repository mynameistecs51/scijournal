<script type="text/javascript" >
	$(function(){
		//saveData();  ยังไม่ได้เรียกใช้งานเพราะติดเรื่อง ajax upload
	});

	function saveData()
	{
		$('#form').on('submit', function (e,d) {
			if (e.isDefaultPrevented()) {
				alert("ERROR  : CHECK DATA PLASE !");
            	  // handle the invalid form...
            	} else {
              		// everything looks good!
              		e.preventDefault();
              		var form = $('#form').serialize();
              		$.each(d,function(index,value){
              			console.log("INdex"+index+"value-->"+value);
              		})

              		$.ajax(
              		{
              			type: 'POST',
              			url: '<?php echo base_url(),"index.php/",$controller; ?>/savechecked/',
           		      data: {form}, //your form datas to post
	              		  // dataType:'json',
	              		  success: function(rs)
	              		  {
	              		  	$('.modal').modal('hide');
			                	// location.reload();
		                	// alert("#SAVE DATA SUCCESS !");
		                	alert(rs);
		                },
		                error: function(err)
		                {
		                	alert("#ERROR !!!");
		                	console.log(err);
		                }
		              });
              	}
              });
	}
</script>
<div class="row">
	<!-- <form action="<?php echo $baseurl_savechecked; ?>"  method="POST" id="form" enctype="multipart/form-data" > -->
	<?php echo form_open_multipart($baseurl_savechecked); ?>
	<input type="hidden" name="id_reviewer" id="id_reviewer" value="<?php echo $session_data['id_member']; ?>"/>
	<input type="hidden" name="idjournal" id="idjournal" value="<?php echo $idjournal; ?>"/>
	<input type="hidden" name="idreviewer" id="idreviewer" value="<?php echo $idreviewer; ?>"/>
	<div class="form-groupt col-sm-12">
		<div class="col-sm-2">
			<label for="status">status: </label><br/>
			<label>
				<input type="radio" name="status" value="1" checked>  Accept&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="2" >  Minor Revisions&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="3">  Major Revisions&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="4">  Reject&nbsp;&nbsp;
			</label>
		</div>
		<div class="col-sm-6">
			<label for="comment">Comment:</label>
			<textarea class="form-control" id="comment" name="comment" rows="5" cols="100"></textarea>
		</div>
		<div class="col-sm-4">
			<label>upload file:</label>
			<input type="file" name="userfile"  id="userfile" class="form-control" />
			<p class="text-danger">**upload file type .doc,.docx,.pdf,.zip,.jpg,.png</p>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="col-sm-12">
			<hr/>
			<table border="1" class="col-sm-12 table table-striped">
				<tr>
					<td>Reviewer Recommendation Term:</td>
					<td>Major Revision Meetd</td>
				</tr>
				<tr>
					<td><b>Transfor Authorization</b></td>
					<td><b>Response</b></td>
				</tr>
				<tr>
					<td>If this submission is transfered to another publication, do we have your consent to include your identifying information?</td>
					<td>yes</td>
				</tr>
				<tr>
					<td>If this submission is transfered to another publication, do we have your consent to include your original reviewer?</td>
					<td>yes</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="col-sm-12">
			<br/>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="modal-footer" style="text-align:center; background:#F6CECE;">
			<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> SAVE</span></button>
			<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> CANCEL</span></button>
		</div>
	</div>
</form>
</div>