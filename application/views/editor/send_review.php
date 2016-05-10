<?php echo $header;?>
<script type="text/javascript" language="javascript" charset="utf-8">
	$(function(){
		selectReviewer();
	});
	$(function(){
		$('.btnReviewer').on( 'click', function () {
          var idreviewer = $(this).val(); // id Reviewer
          edit($(this).data('idjournal'),$(this).data('id_reviewer'),idreviewer);
        } );

	});

	function selectReviewer(){
		$('.selectpicker').selectpicker({
			width:'190px',
			title:'SELECT REVIEWER',
		});
	}

	function edit(idjournal,id_reviewer,idreviewer)
	{
		var screenname=":: Management Reviewer :: ";
      	// var baseurl_edit = $('#baseurl_edit').val();
      	// var url=baseurl_edit+num+"/"+idx;
      	var baseurl_edit = "<?php echo $url_edit;?>";
      	var url = baseurl_edit+idjournal+"/"+id_reviewer+"/"+idreviewer;
        var n=0;
        $('.div_modal').html('');
        modal_form(n,screenname);
        $('#myModal'+n+'.modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>images/loader.gif"/>');
        var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
        modal.on('show.bs.modal', function () {
          modalBody.load(url);
        }).modal({backdrop: 'static',keyboard: true});
        setInterval(function(){$('#ajaxLoaderModal').remove()},5000);
      }

      function modal_form(n,screenname)
      {
      	var div='';
      	// div+='<form name="main" role="form" data-toggle="validator" id="form" method="post">';
      	div+='<!-- Modal -->';
      	div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
      	div+='<div class="modal-dialog">';
      	div+='<div class="modal-content">';
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
                                 array_push($selected_review[$rowReviewer['id_journal']],array('reviewer_name' => $rowReviewer['reviewer'],'id_member' => $rowReviewer['id_member'],'id_journal'=>$rowReviewer['id_journal'],'id_reviewer'=>$rowReviewer['id_reviewer'],'title'=>$rowReviewer['j_title']));     //แสดงชื่อกรรมการที่ตรวจโครงงาน

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
                               	<td>
                                  <?php
                                   echo "Title :",$journalRow->j_title,"<br/>";
                                   echo "Type :",$journalRow->cat_name;
                                  ?>
                                </td>
                                <!-- <td><?php echo $journalRow->dt_create;?></td> -->
                                <td>
                                 <?php
                                 if( !empty( $selected_review[$journalRow->id_journal])){
                                  foreach($selected_review[$journalRow->id_journal] as $REVIEWER =>$VALUE_REVIEW):
                                   echo "<button class='btnReviewer btn btn-primary' data-id_reviewer=",$VALUE_REVIEW['id_reviewer']," data-idjournal=",$VALUE_REVIEW['id_journal']," value=".$VALUE_REVIEW['id_member'].">",$VALUE_REVIEW['reviewer_name']," </button> &nbsp;  ";
                                 endforeach;
                                 ?>
                                 <br/>
                                 <br/>
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
                               <?php
                             }else{
                              ?>
                              <form class="check_status" name="check_status" action="<?php echo  site_url('editor/manage_reviewer');?>" method="post">
                               <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $session_data['id_member'];?>"/>
                               <input type="hidden" name="id_user" id="id_user" value="<?php echo $journalRow->id_member;?>"/>
                               <input type="hidden" name="id_journal" id="id_journal" value="<?php echo $journalRow->id_journal;?>"/>

                               <select id="select_reviewer" class="selectpicker show-tick "  data-live-search="true"  name="select_reviewer[] "  multiple="true"  data-actions-box="true">';
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
         <!-- Modal -->
         <div class="div_modal">
          <!-- show modal -->
        </div>

        <?php echo $footer;?>