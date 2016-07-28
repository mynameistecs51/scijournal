<div class="row">
	<?php echo form_open_multipart('#'); ?>
	
	<div class="form-groupt col-sm-12">
	<p>:: Comment From Editor ::</p>
		<hr/>
		<div class="col-sm-2">
			<label for="status">Status: </label><br/>
			<label>
				<input type="radio" name="status" value="1" >  Accept&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="2" >  Minor Revisions&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="3" >  Major Revisions&nbsp;&nbsp;
			</label>
			<label>
				<input type="radio" name="status" value="4" >  Reject&nbsp;&nbsp;
			</label>
		</div>
		<div class="col-sm-6">
			<label for="comment">Comment:</label>
			<textarea class="form-control" id="comment" name="comment" rows="5" cols="100"></textarea>
		</div>
		<!-- <div class="col-sm-4">
			<label>Edit file:</label>
			<input type="file" name="userfile"  id="userfile" class="form-control" />
			<p class="text-danger">**upload file type .doc,.docx,.pdf,.zip,.jpg,.png</p>
		</div> -->
	</div>
	<div class="col-sm-12"><br></div>
	<div class="form-groupt col-sm-12">
		<div class="modal-footer" style="text-align:center; background:#F6CECE;">
			<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> SAVE</span></button>
			<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="glyphicon glyphicon-log-out"> CANCEL</span></button>
		</div>
	</div>
</form>
</div>