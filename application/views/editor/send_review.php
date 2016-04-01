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
							<!-- <th class="col-sm-2">date send</th> -->
							<th class="col-sm-4">status</th>
							<th class="col-sm-1">date update</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$selected_review = array();
						foreach ($getReviewer as $keyReviewer => $rowReviewer) {
                                 // echo $rowReviewer->user_first_name."  ".$rowReviewer->user_last_name."<br/>";
							if( !isset($selected_review[$rowReviewer['id_journal']])){
								$selected_review[$rowReviewer['id_journal']] = array();
							}
                                 array_push($selected_review[$rowReviewer['id_journal']],array('reviewer_name' => $rowReviewer['reviewer'],'id_member' => $rowReviewer['id_member'],'id_journal'=>$rowReviewer['id_journal'],'title'=>$rowReviewer['j_title']));     //แสดงชื่อกรรมการที่ตรวจโครงงาน

                               }
                                 //  echo '--------------------';
                                 //  echo "<pre/>";
                                 // print_r($selected_review);
                                 //  echo '--------------------';
                               ?>
                               <?php
                               $count = count($getjournal['result']) ;
                               foreach($getjournal['result'] as $journalRow):
                               	$num = $count--;
                               ?>
                               <tr>
                               	<td><?php echo $num;?></td>
                               	<td><?php echo $journalRow->j_title;?></td>
                               	<!-- <td><?php echo $journalRow->dt_create;?></td> -->
                               	<td>
                               		<?php
                               		if( !empty( $selected_review[$journalRow->id_journal])){
                               			foreach($selected_review[$journalRow->id_journal] as $REVIEWER =>$VALUE_REVIEW):
                               				echo "<btn class='btn btn-primary'>",$VALUE_REVIEW['reviewer_name']," </btn>&nbsp;  ";
                               			endforeach;
                               		}else{
                               			?>
                               			<form class="check_status" name="check_status" action="<?php echo  site_url('editor/manage_reviewer');?>" method="post">
                               				<input type="hidden" name="id_admin" id="id_admin" value="<?php echo $session_data['id_member'];?>"/>
                               				<input type="hidden" name="id_user" id="id_user" value="<?php echo $journalRow->id_member;?>"/>
                               				<input type="hidden" name="id_journal" id="id_journal" value="<?php echo $journalRow->id_journal;?>"/>

                               				<select id="select_reviewer" class="selectpicker show-tick "  data-live-search="true"  name="select_reviewer[] " title="SELECT REVIEWER" multiple="true"  data-actions-box="true">';
                               					<?php foreach ($get_reviewer as $rowReviewer):?>
                               						<option value="<?php echo $rowReviewer->id_member;?>"><?php echo $rowReviewer->name; ?></option>
                               					<?php endforeach; ?>
                               				</select>
                               				<input type="submit" class="btn btn-primary btn-xs inline" name="send" value="send" />
                               			</form>
                               			<?php } ?>
                               		</td>
                               		<td><?php echo $journalRow->dt_update;?></td>
                               	</tr>
                               <?php endforeach; ?>
                             </tbody>
                           </table>
                         </div>
                       </div>
                     </div>
                   </div>
                   <script>
                   	$(document).ready(function(){
		// $('[name="select_reviewer"]').on('change',function() {
		// 	console.log($(this).val());
		// 	$(this).selectpicker('refresh');
		// });

		// $('[name="select_reviewer"]').on('change',function(e) {
		// 	$.ajax({
		// 		url: "<?php echo site_url('editor/manage_reviewer');?>",
		// 		type: "POST",
		// 		data: $(this).closest('form').serialize(),
		// 		// data: {"select_reviewer" :$(this).val(),"id_admin":$('[name = "id_admin"]').val(),"id_user":$('[name = "id_user"]').val(),"id_journal":$('[name="id_journal"]').val()},
		// 		dataType:"JSON"
		// 	}).success(function(data){
		// 		alert("update status success");
		// 		alert(data);
		// 	});
		// 	$(this).selectpicker('refresh');
		// });
	});
</script>
<?php echo $footer;?>