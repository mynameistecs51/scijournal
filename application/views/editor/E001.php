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
					dataType: 'JSON',
					data: {'idjournal':idjournal,'idreviewer': idreviewer,},
					success:function(res){
						$.each(res, function(index,value){
							alert(value);
						});
					}
				});				
			}else{
				return false;
			}
		});
	}
	// function saveData_update()
	// {
	// 	$('#form').on('submit', function (e) {
	// 		if (e.isDefaultPrevented()) {
	// 			alert("ผิดพลาด : กรุณาตรวจสอบข้อมูลให้ถูกต้อง !");
 //              // handle the invalid form...
 //            } else {
 //              // everything looks good!
 //              e.preventDefault();
 //              var form = $('#form').serialize();
 //              $.ajax(
 //              {
 //              	type: 'POST',
 //              	url: '<?php echo base_url().$controller; ?>/saveUpdate/',
	//                 data: {form}, //your form datas to post
	//                 // dataType:'json',
	//                 success: function(rs)
	//                 {
	//                 	$('.modal').modal('hide');
	//                 	// location.reload();
	//                 	alert("#บันทึกข้อมูล เรียบร้อย !");
	//                 },
	//                 error: function(err)
	//                 {
	//                 	alert("#เกิดข้อผิดพลาด");
	//                 	console.log(err);
	//                 }
	//               });
 //            }
 //          });
</script>

<div class="row">
	<div class="col-sm-4"></div>
	<button class="btnEdit btn btn-pirmary ">Edit</button>   <button class="btnDelete btn btn-danger" data-idjournal="<?php echo $idjournal;?>"  value="<?php echo $idreviewer;?>">Delete</button>
	<div class="showContain container" >
		<?php echo "ID JOURNSL =" , $idjournal;?>
		<br/>
		<?php echo "ID REVIEWER = " , $idreviewer;?>
	</div>
</div>