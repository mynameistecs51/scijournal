<?php echo $header; ?>

<script type="text/javascript">
	$(function(){
		$("input[name=zipcode]").change(function(){
			$.ajax({
				url: '<?php echo base_url().'index.php/'.$controller; ?>/getProvince/',
				data:"zipcode="+$("input[name=zipcode]").val(),
				type: 'POST',
				dataType: 'json',
				success:function(res){
					// var amphur="<option >----เลือกอำเภอ----</option>";
					var district="<option >---เลือกตำบล---</option>";
					$.each(res, function( index, value ) {
						// $('input[name=province]').val(value['PROVINCE_NAME']);
						// $('input[name=amphur]').val(value["AMPHUR_NAME"]);
						province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
						amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
						district += "<option value="+value['DISTRICT_ID']+"> "+value['DISTRICT_NAME']+"</option>";
					});
					$('#province').html(province);
					$('#amphur').html(amphur);
					$('#district').html(district);

				},
				error:function(err){
					alert("Zipcode fail !!!");
					$('input[name=zipcode]').val('');
					$('#province').html('');
					$('#amphur').html('');
					$('#district').html('');
				}
			});
		});
			// $('.selectpicker').selectpicker('show');
	}); //----------------------- end javascript---------------------//

	$(function(){
		$.ajax({
			url: '<?php echo base_url().'index.php/'.$controller; ?>/getPrefixName/',
				// data:"",
				// type: 'POST',
				dataType: 'JSON',
				success:function(resp){
					var selected ="<option value='0'>----------select----------</option>";
					$.each(resp, function( indexPre, valuePre ) {
						selected +="<option value='"+valuePre['id_prefixName']+"' data-subText='"+valuePre['pre_name']+"' >"+valuePre['pre_nameEng']+"</option>";
					});
					$('#prefixName').html(selected).selectpicker('refresh');

				},
				error:function(err){
					alert(err+"error");
				}
			});
	});

</script>
<!-- <div class="nev_url"><?php echo "Page -",$NAV; ?> </div> -->
<!-- <hr/> -->
<div class="panel panel-primary">
	<div class ="panel-heading">
		<div class ="panel-title">Register </div>
	</div>
	<div class ="panel-body">
		<form action="inserMember/" method="POST" accept-charset="utf-8" role="form">
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" required/>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control"  value="<?php echo set_value('password'); ?>"required/>
				</div>
				<div class="col-sm-6">
					<label for="confirm_password">Confirm Password</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" required/>
					<?php echo form_error('confirm_password','<span class="label label-warning">','</span>');?>
				</div>
			</div>
			<div class="form-group col-sm-12"><hr/></div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="prefixName">Prefix</label>
					<select class="selectpicker show-tick form-control" id="prefixName" name="prefixName" >

					</select>
					<?php  //echo form_error('prefixName','<span class="label label-warning">','</span>');?>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="name">Name</label>
					<input type="text" name="name"  class="form-control"  value="<?php echo set_value('name'); ?>" required/>
				</div>
				<div class="col-sm-6">
					<label for="lastname">Last names</label>
					<input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname'); ?>" required />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-2">
					<label for="sex">Sex</label><br/>
					<label>
						<input type="radio" name="sex" value="1" checked>  Male&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="sex" value="2">  Female
					</label>
				</div>
				<div class="col-sm-5">
					<label for="education">Education</label><br/>
					<label>
						<input type="radio" name="education" value="1" required>  Less than a bachelor's degree&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="2" checked>  Bachelor degree&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="3">  Master degree&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="4">  Doctorate(Ph.D.)&nbsp;&nbsp;
					</label>
				</div>
				<div class="form-group col-sm-4">
					<label for="education">Status</label><br/>
					<label>
						<input type="radio" name="status" value="1" required checked>  public  (Senders Research)&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="status" value="4" required >  editter&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="status" value="2" required >  reviewer&nbsp;&nbsp;
					</label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="career">Career</label>
					<input type="text" name="career" class="form-control" value="<?php echo set_value('career'); ?>">
				</div>
				<div class="col-sm-6">
					<label for="organizetion">Organizetion(if available)</label>
					<input type="text" name="organizetion" class="form-control"  value="<?php echo set_value('organizetion'); ?>">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-12">
					<label>Address</label>
					<input tye="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>"accept="" required />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-3">
					<label>Zip code</label>
					<input type="text" class="form-control" name="zipcode" required/>
				</div>
				<div class="col-sm-3">
					<label>Province</label>
					<!-- <input type="text" class="form-control" name="province"  /> -->
					<select name="province" id="province" class="form-control"  >
						<!-- <option value="">----เลือกอำเภอ----</option> -->
					</select>
				</div>
				<div class="col-sm-3">
					<label>District</label>
					<!-- <input type="text" class="form-control" name="amphur"   /> -->
					<select name="amphur" id="amphur" class="form-control"  >
						<!-- <option value="">----เลือกอำเภอ----</option> -->
					</select>
				</div>
				<div class="col-sm-3">
					<label>Sub district</label>
					<select name="district" id="district" class ="form-control"  required>
						<option value="">--เลือก--</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="tel">Telephone</label>
					<input type="tel" name="tel" class="form-control" value="<?php echo set_value('tel');?>" required/>
				</div>
				<div class="col-sm-6">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" value="<?php echo set_value('email');?>"  required/>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-w anning">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php echo $footer; ?>