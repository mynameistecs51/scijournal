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
					alert("รหัสไปรษณีย์ไม่ถูกต้อง"+'<?php echo base_url().$controller; ?>/getProvince/');
					$('input[name=zipcode]').val('');
					$('#province').html('');
					$('#amphur').html('');
					$('#district').html('');
				}
			});
		});
	}); //----------------------- end javascript---------------------//
</script>
<!-- <div class="nev_url"><?php echo "Page -",$NAV; ?> </div> -->
<!-- <hr/> -->
<div class="panel panel-primary">
	<div class ="panel-heading">
		<div class ="panel-title">Register </div>
	</div>
	<div class ="panel-body">
		<form action="inserMember/" method="POST" accept-charset="utf-8">
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
					<label for="prefixName">คำนำหน้า</label>
					<select name="prefixName" id="prefixName" class="form-control" required>
						<option value=''>-----กรุณาเลือก------</option>
						<?php foreach ($getPrefixName['result'] as $rowPrefix): ?>
							<option value="<?php echo $rowPrefix->id_prefixName;?>" <?php echo set_select('$rowPrefix->pre_name');?> ><?php echo $rowPrefix->pre_name; ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('prefixName','<span class="label label-warning">','</span>');?>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="name">ชื่อ</label>
					<input type="text" name="name"  class="form-control"  value="<?php echo set_value('name'); ?>" required/>
				</div>
				<div class="col-sm-6">
					<label for="lastname">นามสกุล</label>
					<input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname'); ?>" required />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-4">
					<label for="sex">เพศ</label><br/>
					<label>
						<input type="radio" name="sex" value="1" checked>ชาย&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="sex" value="2">หญิง
					</label>
				</div>
				<div class="col-sm-7">
					<label for="education">การศึกษา</label><br/>
					<label>
						<input type="radio" name="education" value="1" required>น้อยกว่า ปริญาตรี&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="2" checked>ปริญาตรี&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="3">ปริญาโท&nbsp;&nbsp;
					</label>
					<label>
						<input type="radio" name="education" value="4">ปริญาเอก&nbsp;&nbsp;
					</label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="career">อาชีพ</label>
					<input type="text" name="career" class="form-control" value="<?php echo set_value('career'); ?>">
				</div>
				<div class="col-sm-6">
					<label for="organizetion">ชื่อองกร(ถ้ามี)</label>
					<input type="text" name="organizetion" class="form-control"  value="<?php echo set_value('organizetion'); ?>">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-12">
					<label>ที่อยู่</label>
					<input tye="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>"accept="" required />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-3">
					<label>รหัสไปรษณีย์</label>
					<input type="text" class="form-control" name="zipcode" required/>
				</div>
				<div class="col-sm-3">
					<label>จังหวัด</label>
					<!-- <input type="text" class="form-control" name="province"  /> -->
					<select name="province" id="province" class="form-control"  >
						<!-- <option value="">----เลือกอำเภอ----</option> -->
					</select>
				</div>
				<div class="col-sm-3">
					<label>เขต/อำเภอ</label>
					<!-- <input type="text" class="form-control" name="amphur"   /> -->
					<select name="amphur" id="amphur" class="form-control"  >
						<!-- <option value="">----เลือกอำเภอ----</option> -->
					</select>
				</div>
				<div class="col-sm-3">
					<label>แขวง/ตำบล</label>
					<select name="district" id="district" class ="form-control"  required>
						<option value="">--เลือก--</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<label for="tel">โทรศัพท์</label>
					<input type="tel" name="tel" class="form-control" value="<?php echo set_value('tel');?>" required/>
				</div>
				<div class="col-sm-6">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" value="<?php echo set_value('email');?>"  required/>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<div class="col-sm-6">
					<button type="submit" class="btn btn-primary">บันทึก</button>
					<button type="reset" class="btn btn-w anning">ยกเลิก</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php echo $footer; ?>