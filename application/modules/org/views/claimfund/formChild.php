<style type='text/css'>
	.div_attach {
		margin:5px;
	}
	
	.div_attach>div {
		display:inline-block;
		border:solid 1px #AAA; 
		padding:10px; 
		border-radius:4px; 
		background:#EEE;
		line-height:30px;
		min-width:420px;
	}
	
	.btn-delete_input {
		display:inline-block;
		width:70px; 
		float:right;
	}
	
	
	.tag_fileattach {
		display:inline-block;
		border:solid 1px #AAA;
		border-radius:4px;
		background:#EEE;
		padding:10px 15px;
		margin:10px 0px;
		margin-bottom:20px;
		
		min-width:280px;
		line-height:30px;
	}
	
	.tag_fileattach.download {
		background:#95c9dd;
		border:solid 1px #688c9a;
	}
</style>



<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>
<span onclick="memberForm(1);">aaaa</span>
<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>

<?php echo form_hidden('type', @$_GET['type']); ?>


<form action="org/claimfund/saveChild/<?php echo @$rs->id; ?>" method='post' enctype="multipart/form-data">
	
<div class="dvChild">
<table class="tblForm">
	<tr>
		<th>ปีงบประมาณ / จังหวัด</th>
		<td class="form-inline">
			<? 
				echo form_hidden('budget_year', (date('Y')+543)); 
				echo form_hidden('province_id', $value['province_code']);
				 
				echo (date('Y')+543); ?> / <? echo $value['province_name']; 
			?>
	  </td>
	</tr>
<tr>
	<th>รหัสโครงการ </th>
	<td style="font-size:18px; color:#F00;" id="proj_code">คคด/<? echo (date('Y')+543).'/'.$value['province_name']; ?>/XXXX</td>
</tr>
<tr>
  <th>ชื่อโครงการ <span class="textRed">*</span></th>
  <td><input type="text" name="project_name" style="width:450px;"  class="form-control"/></td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารโครงการ<span class="textRed">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files1">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector1'>
	</div>
  	<!--<input type="file" name="fileField" id="fileField" class="form-control" />-->
  </td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารรายละเอียดค่าใช้จ่ายของโครงการ <span class="textRed">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files2">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector2'>
	</div>
  	<!--<input type="file" name="fileField2" id="fileField2" class="form-control" />-->
  </td>
</tr>
	<tr>
		<th>ชื่อองค์กรที่เสนอขอรับ <span class="textRed">*</span></th>
		<td><input name="organization" type="text"  class="form-control" style="width:550px;" value="" /></td>
	</tr>
	<tr>
		<th>สถานะโครงการที่ขอรับเงินกองทุนฯ <span class="textRed">*</span></th>
		<td>
		  	<div style="margin-bottom:10px;">
		    	<input type="radio" name="project_status" value="1">
		    	โครงการริเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน) 
		    </div>
			<div style="margin-bottom:10px;">
		  		<input type="radio" name="project_status" value="2">
		    	โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน) </div> 
		    <div>
			<input type="radio" name="project_status" value="3">
		      	โครงการเดิม (โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)
			</div>
		</td>
	</tr>
<tr>
	<th>ประเภทโครงการ  <span class="textRed">*</span></th>
	<td>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="1"> สงเคราะห์</span>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="2"> คุ้มครองสวัสดิภาพ</span>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="3"> ส่งเสริมความประพฤติ</span>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="4"> 5 สถาน</span>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="5"> งานวิจัย ฯ</span>
		<span style="margin-right:15px;"><input type="radio" name="project_typep_main_id" value="6"> อื่นๆ</span>			
		<span id="error_project_typep_main_id"></span>
	</td>
</tr>
	<tr>
		<th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="textRed">*</span></th>
		<td> 
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="4"> การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม</span>
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="2"> การพัฒนาเด็กและเยาวชน</span>
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="3"> การพัฒนาระบบคุ้มครองเด็ก</span>
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="5"> การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก</span>
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="6"> สาโรจน์_ชื่อกรอบทิศทางในการจัดสรรเงิน</span>
			<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="1"> การป้องกันและแก้ไขปัญหาเด็กและเยาวชน</span>			
			<span id="error_project_direction_set_id"></span>  
		</td>
	</tr>
	<tr>
		<th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="textRed">*</span></th>
		<td>
			<div>
				<span style="width:240px;">งบประมาณทั้งโครงการ </span>
				<input type="text" name="project_budget_" value="0.00" style="width:180px; background:#EEE; display:inline-block;" ref="project_budget" class="text-right form-control" readonly="readonly">  บาท
			</div>
			<div>
				<span style="width:240px;">งบประมาณที่ขอรับการสนับสนุน  </span>
				<input type="text" name="budget_request_" value="0.00" ref="budget_request" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control"> บาท
				<span style="display:none;" class="note">* จะคำนวณเป็นขนาดโครงการ</span>
			</div>
			<div>
				<span style="width:240px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) </span>
				<input type="text" name="budget_other_" value="0.00" ref="budget_other" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control"> บาท
				
					
				<input type="hidden" name="project_budget" value="">
				<input type="hidden" name="budget_request" value="">
				<input type="hidden" name="budget_other" value="">
							
				<span style="margin-left:20px;"> 
					<input type="checkbox" name="budget_other_type[]" value="1"> หน่วยงานภาครัฐ 
					<input type="checkbox" name="budget_other_type[]" value="2"> ท้องถิ่น  
					<input type="checkbox" name="budget_other_type[]" value="3"> ธุรกิจ/องค์กรเอกชน
				</span>
			</div>
						
			<input type="hidden" name="budget_request_" value="">
		</td>
	</tr>
	<tr>
		<th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
		<td>
			<span><input type="radio" name="budget_cause" value="1"> ไม่ได้รับงบประมาณปกติของหน่วยงาน</span>   
			<span><input type="radio" name="budget_cause" value="2"> ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ</span>
			
			<input type="hidden" name="budget_cause_" value="">
		</td>
	</tr>
<tr>
	<th>กลุ่มเป้าหมายของโครงการ<span class="textRed"> *</span></th>
	<td>
		<span style="margin-right:15px;">
			<input type="checkbox" name="project_target_set_id[]" value="5"> 
			<input type="text" name="project_target_set_val[5]" value="" class="nformat" style="width:50px;"> สาโรจน์_ชื่อกลุ่มเป้าหมายของโครงการ
		</span>
		<span style="margin-right:15px;">
			<input type="checkbox" name="project_target_set_id[]" value="1"> 
			<input type="text" name="project_target_set_val[1]" value="" class="nformat" style="width:50px;"> เด็ก
		</span>
		<span style="margin-right:15px;">
			<input type="checkbox" name="project_target_set_id[]" value="2"> 
			<input type="text" name="project_target_set_val[2]" value="" class="nformat" style="width:50px;"> ผู้ปกครอง/ครอบครัวอุปถัมภ์
		</span>
		<span style="margin-right:15px;">
			<input type="checkbox" name="project_target_set_id[]" value="3"> 
			<input type="text" name="project_target_set_val[3]" value="" class="nformat" style="width:50px;"> เจ้าหน้าที่ที่ทำงานด้านเด็ก
		</span>
		<span style="margin-right:15px;">
			<input type="checkbox" name="project_target_set_id[]" value="4"> 
			<input type="text" name="project_target_set_val[4]" value="" class="nformat" style="width:50px;"> แกนนำชุมชน
		</span>		
	</td>
</tr>
<tr>
	<th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
	<td>
		<span><input type="radio" name="organiztion_type" value="1"> องค์กรภาคเอกชน</span>  
		<span><input type="radio" name="organiztion_type" value="2"> หน่วยงานของรัฐ</span>
		<input type="hidden" name="organiztion_type_" value="">
	</td>
</tr>
<tr>
	<th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="textRed">*</span></th>
	<td>
		<div style="font-weight:bold;">1. แบบสรุปโครงการ</div>
		<div class="tag_fileattach "><input type="file" name="fileattach1"></div>
		
		<div style="font-weight:bold;">2. ข้อมูลเกี่ยวกับโครงการที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่พื้นที่ดำเนินงานโครงการ</div>
		<div class="tag_fileattach "><input type="file" name="fileattach2"></div>
		
		<div style="font-weight:bold;">3. ข้อมูลเกี่ยวกับองค์กรที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่ตั้งองค์กร</div>
		<div class="tag_fileattach "><input type="file" name="fileattach3"></div>
		
		<div style="font-weight:bold;">4. หนังสือรับรองผลงาน</div>
		<div class="tag_fileattach "><input type="file" name="fileattach4"></div>
		
		<div style="font-weight:bold;">5. หนังสือรับรององค์กร</div>
		<div class="tag_fileattach "><input type="file" name="fileattach5"></div>
	</td>
</tr>
</table>

<div style="text-align:right; margin-top:20px;"><button type="submit" class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

</form>

<script language="JavaScript">
	function add_input_attach(name, obj_sector) {
		content = "<div class='div_attach'>";
			content += "<div>";
				content += "<strong>แนบไฟล์ : </strong>";
					content += "<input type='file' style='display:inline-block;' name='"+name+"[]'>";
					content += "<input type='button' value='Delete' class='btn btn-danger btn-delete_input'>";
			content += "</div>";
		content += "</div>";
		
		obj_sector.prepend(content);
	}

	$(function(){
		$('#btn_add_files1').click(function(){
			add_input_attach('attach_file', $('#file_sector1'));
		});
		
		$('#btn_add_files2').click(function(){
			add_input_attach('attach_file_pay', $('#file_sector2'));
		});


	});
</script>