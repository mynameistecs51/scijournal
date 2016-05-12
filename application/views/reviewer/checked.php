<div class="row">
	<?php echo "id reviewer-->",$session_data['id_member'], "      id journal--", $idjournal ;?>
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
			<input type="text" class="form-control"></input>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="col-sm-12">
			<br/>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="modal-footer" style="text-align:center; background:#F6CECE;">
			<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>
			<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>
		</div>
	</div>
</div>