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

<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>

<?php echo form_hidden('type', @$_GET['type']); ?>


<form action="org/claimfund/saveChild/<?php echo @$rs['id']; ?>" method='post' enctype="multipart/form-data">
	
<div class="dvChild">
<table class="tblForm">
	<tr>
		<th>ปีงบประมาณ / จังหวัด</th>
		<td class="form-inline">
			<? 
				$budget_year = (empty($rs['budget_year']))?(date('Y')+543):$rs['budget_year'];
				$province_id = (empty($rs['province_id']))?$value['province_code']:$rs['province_id'];
				$project_code = (empty($rs['project_code']))?'คคด/'.(date('Y')+543).'/'.$value['province_name'].'/XXXX':$rs['project_code'];
				
				
				echo form_hidden('budget_year', $budget_year); 
				echo form_hidden('province_id', $province_id);
				
				echo (date('Y')+543).'/'.$value['province_name']
			?>
	  </td>
	</tr>
<tr>
	<th>รหัสโครงการ </th>
	<td style="font-size:18px; color:#F00;" id="proj_code"><? echo $project_code; ?> </td>
</tr>
<tr>
  <th>ชื่อโครงการ <span class="textRed">*</span></th>
  <td><input type="text" name="project_name" style="width:450px;"  class="form-control" value="<? echo @$rs['project_name']; ?>" /></td>
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
		<td><input name="organization" type="text"  class="form-control" style="width:550px;" value="<? echo @$rs['organization']; ?>" /></td>
	</tr>
	<tr>
		<th>สถานะโครงการที่ขอรับเงินกองทุนฯ <span class="textRed">*</span></th>
		<td>
			<? 
				
				
				foreach($formInput['project_status'] as $key => $item) {
					$checked = ($key == @$rs['project_status'])?'checked="checked"':null;
					echo '<div style="margin-bottom:10px;">
				    	<input type="radio" name="project_status" value="'.$key.'" '.$checked.'>
				    	'.$item.'
				    </div>'; 
				}
				#echo @$rs['project_status'];
			?>
		</td>
	</tr>
<tr>
	<th>ประเภทโครงการ  <span class="textRed">*</span></th>
	<td>
		<? 
			foreach($formInput['project_typep_main_id'] as $key => $item) {
				$checked = ($key == @$rs['project_typep_main_id'])?'checked="checked"':null;
				echo '<span style="margin-right:15px;">
			    	<input type="radio" name="project_typep_main_id" value="'.$key.'" '.$checked.'>
			    	'.$item.'
			    </span>'; 
			}
		?>			
		<span id="error_project_typep_main_id"></span>
	</td>
</tr>
	<tr>
		<th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="textRed">*</span></th>
		<td> 
			<? 
				foreach($formInput['project_direction_set_id'] as $key => $item) {
					$checked = ($key == @$rs['project_direction_set_id'])?'checked="checked"':null;
					echo '<span style="margin-right:15px;">
				    	<input type="radio" name="project_direction_set_id" value="'.$key.'" '.$checked.'>
				    	'.$item.'
				    </span>'; 
				}
			?>						
			<span id="error_project_direction_set_id"></span>  
		</td>
	</tr>
	<tr>
		<th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="textRed">*</span></th>
		<td>
			<div>
				<span style="width:240px;">งบประมาณทั้งโครงการ </span>
				<input type="text" name="project_budget" value="0.00" style="width:180px; background:#EEE; display:inline-block;" ref="project_budget" class="text-right form-control" readonly="readonly" value="<? echo @$rs['project_budget']; ?>">  บาท
			</div>
			<div>
				<span style="width:240px;">งบประมาณที่ขอรับการสนับสนุน  </span>
				<input type="text" name="budget_request" value="0.00" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control" value="<? echo @$rs['budget_request']; ?>"> บาท
				<span style="display:none;" class="note">* จะคำนวณเป็นขนาดโครงการ</span>
			</div>
			<div>
				<span style="width:240px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) </span>
				<input type="text" name="budget_other" value="0.00" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control" value="<? echo @$rs['budget_other']; ?>"> บาท
				
				<span style="margin-left:20px;">
					 <? 
					 	if(!empty($rs['budget_other_type'])) {
					 		$rs['budget_other_type'] = explode(', ',$rs['budget_other_type']);
					 	}	
						
						foreach($formInput['budget_other_type'] as $key => $item) {
							
							$checked = (@in_array($key,$rs['budget_other_type']))?'checked="checked"':null;
							echo ' <input type="checkbox" name="budget_other_type[]" value="'.$key.'" '.$checked.'> '.$item; 
						}
					?>		
				</span>
			</div>
						
			<input type="hidden" name="budget_request_" value="">
		</td>
	</tr>
	<tr>
		<th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
		<td>
			<? 
				foreach($formInput['budget_cause'] as $key => $item) {
					$checked = ($key == @$rs['budget_cause'])?'checked="checked"':null;
					echo '<span style="margin-right:15px;">
				    	<input type="radio" name="budget_cause" value="'.$key.'" '.$checked.'>
				    	'.$item.'
				    </span>'; 
				}
			?>
		<!--		
			<span><input type="radio" name="budget_cause" value="1"> ไม่ได้รับงบประมาณปกติของหน่วยงาน</span>   
			<span><input type="radio" name="budget_cause" value="2"> ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ</span>
			
			<input type="hidden" name="budget_cause_" value="">
		-->
		</td>
	</tr>
<tr>
	<th>กลุ่มเป้าหมายของโครงการ<span class="textRed"> *</span></th>
	<td>
		<?
			foreach($formInput['project_target_set_id'] as $item) {
				echo '<span style="margin-right:15px;">
					<input type="checkbox" name="project_target_set_id[]" value="'.$item['id'].'"> 
					<input type="text" name="project_target_set_val['.$item['id'].']" value="" class="nformat" style="width:50px;"> '.$item['title'].'
				</span>';
			}
		?>
	</td>
</tr>
<tr>
	<th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
	<td>
		<? 
			foreach($formInput['budget_cause'] as $key => $item) {
				$checked = ($key == @$rs['budget_cause'])?'checked="checked"':null;
				echo '<span><input type="radio" name="organiztion_type" value="'.$key.'" '.$checked.'> '.$item.'</span>'; 
			}
		?>
	</td>
</tr>
<tr>
	<th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="textRed">*</span></th>
	<td>
		<?php foreach($formInput['fileattach'] as $key => $item){
				if(!empty($rs['fileattach']['project_support_attach'.$key]) && file_exists($rs['fileattach']['project_support_attach'.$key])) { ?>
					<div style="font-weight:bold;"><? echo $item; ?></div>
					<div class="tag_fileattach ">
						
						<a href="<? echo $rs['fileattach']['project_support_attach'.$key]; ?>" target="_blank" class="btn btn-primary">Download</a>
					</div>
				<?php } else { ?>
					<div style="font-weight:bold;"><? echo $item; ?></div>
					<div class="tag_fileattach ">
						<input type="file" name="fileattach<? echo $key; ?>">
					</div>
				<?php }
		} ?>
	</td>
</tr>
</table>

<span onclick="memberForm(1, '<? echo @$rs['id']; ?>');">aaaa<? echo @$rs['id']; ?></span>

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