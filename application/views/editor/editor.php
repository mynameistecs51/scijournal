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
						$selected_review = array();
						foreach ($getReviewer as $keyReviewer => $rowReviewer) {
                                 // echo $rowReviewer->user_first_name."  ".$rowReviewer->user_last_name."<br/>";
							if( !isset($selected_review[$rowReviewer['id_journal']])){
								$selected_review[$rowReviewer['id_journal']] = array();
							}
                                 array_push($selected_review[$rowReviewer['id_journal']],array('reviewer_name' => $rowReviewer['reviewer'],'id_member' => $rowReviewer['id_member'],'id_journal'=>$rowReviewer['id_journal'],'id_reviewer'=>$rowReviewer['id_reviewer'],'title'=>$rowReviewer['j_title'],'date_send' =>$rowReviewer['date_send']));     //แสดงชื่อกรรมการที่ตรวจโครงงาน

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
                               	<td><?php echo $journalRow->dt_create;?></td>
                               	<td>
                               		<?php
                               		if( !empty( $selected_review[$journalRow->id_journal])){
                               			foreach($selected_review[$journalRow->id_journal] as $REVIEWER =>$VALUE_REVIEW):
                               				echo "<label class='text-success' >",$VALUE_REVIEW['reviewer_name'],", </label><br/> ";
                               			endforeach;
                               		}else{
                               			echo '<p class="text-danger">NOT SEND</p>';
                               		}
                               		endforeach;
                               		?>
                               		<br/>
                               	</td>
                               </tr>
                             </tbody>
                           </table>
                         </div>
                       </div>
                     </div>
                   </div>
                   <?php echo $footer;?>