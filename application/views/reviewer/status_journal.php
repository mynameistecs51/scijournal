<div class="row">
	<?php echo form_open_multipart('#'); ?>
	<?php foreach ($dataStatus as $rowStatus):?>
		<input type="hidden" name="id_reviewer" id="id_reviewer" value="<?php echo $session_data['id_member']; ?>"/>
		<input type="hidden" name="idjournal" id="idjournal" value="<?php echo $idjournal; ?>"/>
		<input type="hidden" name="idreviewer" id="idreviewer" value="<?php echo $id_member; ?>"/>
		<div class="form-groupt col-sm-12">
			<div class="col-sm-2">
				<label for="status">status: </label><br/>
				<label>
					<?php $checked =($rowStatus['check_status'] ==1 ?"checked":''); ?>
					<input type="radio" name="status" value="1" <?php echo $checked; ?> >  Accept&nbsp;&nbsp;
				</label>
				<label>
					<?php $checked =($rowStatus['check_status'] ==2 ?"checked":''); ?>
					<input type="radio" name="status" value="2" <?php echo $checked; ?>>  Minor Revisions&nbsp;&nbsp;
				</label>
				<label>
					<?php $checked =($rowStatus['check_status'] ==3 ?"checked":''); ?>
					<input type="radio" name="status" value="3" <?php echo $checked; ?>>  Major Revisions&nbsp;&nbsp;
				</label>
				<label>
					<?php $checked =($rowStatus['check_status'] ==4 ?"checked":''); ?>
					<input type="radio" name="status" value="4" <?php echo $checked; ?>>  Reject&nbsp;&nbsp;
				</label>
			</div>
			<div class="col-sm-6">
				<label for="comment">Comment:</label>
				<textarea class="form-control" id="comment" name="comment" rows="5" cols="100"><?php echo $rowStatus['check_comment']; ?></textarea>
			</div>
			<div class="col-sm-4 ">
				<label>edit file:</label>
				<input type="file" name="userfile"  id="userfile" class="form-control" />
				<p class="text-danger">**upload file type .doc,.docx,.pdf,.zip,.jpg,.png</p>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="form-groupt col-sm-12">
		<div class="col-sm-12">
			<br/>
		</div>
	</div>
	<div class="form-groupt col-sm-12">
		<div class="modal-footer" style="text-align:center; background:#F6CECE;">
			<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> CONFIRME</span></button>
			<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> CANCEL</span></button>
		</div>
	</div>
</form>
</div>