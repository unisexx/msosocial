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
<?php
	$year_budget = (empty($rs['year_budget']))?(date('Y')+543):$rs['year_budget'];
	$project_code = (empty($rs['project_code']))?'คคด/'.(date('Y')+543).'/'.$value['province_name'].'/XXXX':$rs['project_code'];
	
	
	echo form_hidden('year_budget', $year_budget); 
	echo form_hidden('province_id', $rs['province_id']);
?>
<div class="dvChild">
<table class="tblForm">
	<tr>
		<th>ปีงบประมาณ / จังหวัด</th>
		<td class="form-inline"> <?php echo $year_budget.'/'.$rs['province_name'] ?> </td>
	</tr>
<tr>
	<th>รหัสโครงการ </th>
	<td style="font-size:18px; color:#F00;" id="proj_code"><?php echo $project_code; ?> </td>
</tr>
<tr>
  <th>ชื่อโครงการ <span class="textRed">*</span></th>
  <td><input type="text" name="project_name" style="width:450px;"  class="form-control" value="<?php echo @$rs['project_name']; ?>" /></td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารโครงการ<span class="textRed">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files1">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector1'>
  		<?php
  			$filelist = @$rs['attach_set_1'];
			if(!empty($filelist)) {
			foreach($filelist as $item) {
				echo '<div class="div_attach">
					<div style="background:#95c9dd; border:solid 1px #688c9a;">
						<strong>ไฟล์แนบ : </strong><a href="org/claimfund/downloadChild/attach_set_1/'.$item['id'].'" target="_blank" style="color:#fff;" class="btn btn-primary">Download</a>
						'.$item['file_name'].'
						<a href="org/claimfund/delfileChild/attach_set_1/'.$item['id'].'" class="btn btn-danger pull-right btnDelfile" style="color:#fff;">Delete</a>
					</div>
				</div>';//btnDelfile
			}	
			}
  		?>
	</div>
  	<!--<input type="file" name="fileField" id="fileField" class="form-control" />-->
  </td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารรายละเอียดค่าใช้จ่ายของโครงการ <span class="textRed">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files2">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector2'>
  		<?php
  			$filelist = @$rs['attach_set_2'];
			if(!empty($filelist)) {
			foreach($filelist as $item) {
				echo '<div class="div_attach">
					<div style="background:#95c9dd; border:solid 1px #688c9a;">
						<strong>ไฟล์แนบ : </strong><a href="org/claimfund/downloadChild/attach_set_2/'.$item['id'].'" target="_blank" style="color:#fff;" class="btn btn-primary">Download</a>
						'.$item['file_name'].'
						<a href="org/claimfund/delfileChild/attach_set_2/'.$item['id'].'" class="btn btn-danger pull-right btnDelfile" style="color:#fff;">Delete</a>
					</div>
				</div>';
			}	
			}
  		?>
	</div>
  	<!--<input type="file" name="fileField2" id="fileField2" class="form-control" />-->
  </td>
</tr>
	<tr>
		<th>ชื่อองค์กรที่เสนอขอรับ <span class="textRed">*</span></th>
		<td><input type="text"  class="form-control" style="width:550px;" value="<?php echo @$rs['welfare_benefit_title']; ?>" readonly="readonly"/></td>
	</tr>
	<tr>
		<th>สถานะโครงการที่ขอรับเงินกองทุนฯ <span class="textRed">*</span></th>
		<td>
			<div style="margin-bottom:10px;">
		    	<input type="radio" name="project_status" value="1" <? echo (@$rs['project_status'] == 1)?'checked = "checked"':null; ?>>
		    	โครงการริเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน)
		    </div>
		    <div style="margin-bottom:10px;">
		    	<input type="radio" name="project_status" value="2" <? echo (@$rs['project_status'] == 2)?'checked = "checked"':null; ?>>
		    	โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน)
		    </div>
		    <div style="margin-bottom:10px;">
		    	<input type="radio" name="project_status" value="3" <? echo (@$rs['project_status'] == 3)?'checked = "checked"':null; ?>>
		    	โครงการเดิม (โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)
		    </div>
		</td>
	</tr>
<tr>
	<th>ประเภทโครงการ  <span class="textRed">*</span></th>
	<td>
		<span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="1" <? echo (@$rs['project_type'] == 1)?'checked = "checked"':null; ?>>
	    	สงเคราะห์
	   </span>
	   <span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="2" <? echo (@$rs['project_type'] == 2)?'checked = "checked"':null; ?>>
	    	คุ้มครองสวัสดิภาพ
	    </span>
	    <span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="3" <? echo (@$rs['project_type'] == 3)?'checked = "checked"':null; ?>>
	    	ส่งเสริมความประพฤติ
	    </span>
	    <span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="4" <? echo (@$rs['project_type'] == 4)?'checked = "checked"':null; ?>>
	    	5 สถาน
	    </span>
	    <span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="5" <? echo (@$rs['project_type'] == 5)?'checked = "checked"':null; ?>>
	    	งานวิจัย ฯ
	    </span>
	    <span style="margin-right:15px;">
	    	<input type="radio" name="project_type" value="6" <? echo (@$rs['project_type'] == 6)?'checked = "checked"':null; ?>>
	    	อื่นๆ
	    </span>
	</td>
</tr>
	<tr>
		<th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="textRed">*</span></th>
		<td> 
			
			<span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="4" <? echo (@$rs['project_direction'] == 4)?'checked = "checked"':null; ?>>
		    	การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="2" <? echo (@$rs['project_direction'] == 2)?'checked = "checked"':null; ?>>
		    	 การพัฒนาเด็กและเยาวชน
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="3" <? echo (@$rs['project_direction'] == 3)?'checked = "checked"':null; ?>>
		    	การพัฒนาระบบคุ้มครองเด็ก
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="5" <? echo (@$rs['project_direction'] == 5)?'checked = "checked"':null; ?>>
		    	 การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="6" <? echo (@$rs['project_direction'] == 6)?'checked = "checked"':null; ?>>
		    	สาโรจน์_ชื่อกรอบทิศทางในการจัดสรรเงิน
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="project_direction" value="1" <? echo (@$rs['project_direction'] == 1)?'checked = "checked"':null; ?>>
		    	 การป้องกันและแก้ไขปัญหาเด็กและเยาวชน	
		    </span>		
			<span id="error_project_direction_set_id"></span>  
		</td>
	</tr>
	<tr>
		<th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="textRed">*</span></th>
		<td>
			<div>
				<span style="display:inline-block; width:240px;">งบประมาณทั้งโครงการ </span>
				<input type="text" name="budget_project" value="<?php echo (empty($rs['budget_project']))?'0.00':number_format($rs['budget_project'], 2); ?>" style="width:180px; background:#EEE; display:inline-block;" ref="project_budget" class="text-right form-control" readonly="readonly" value="<?php echo @$rs['project_budget']; ?>">  บาท
			</div>
			<div style='margin-top:5px;'>
				<span style="display:inline-block; width:240px;">งบประมาณที่ขอรับการสนับสนุน  </span>
				<input type="text" name="budget_support" value="<?php echo (empty($rs['budget_support']))?'0.00':number_format($rs['budget_support'], 2); ?>" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control"> บาท
				<span style="display:none;" class="note">* จะคำนวณเป็นขนาดโครงการ</span>
			</div>
			<div style='margin-top:5px;'>
				<span style="display:inline-block; width:240px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) </span>
				<input type="text" name="budget_other" value="<?php echo (empty($rs['budget_other']))?'0.00':number_format($rs['budget_other'], 2); ?>" style="width:180px; display:inline-block;" class="cal_project_budget text-right form-control" value="<?php echo @$rs['budget_other']; ?>"> บาท
				
				<span style="margin-left:20px;">
					<input type="checkbox" name="has_budget_other[1]" value="1" <? echo (@$rs['has_budget_other_1'] == 1)?'checked = "checked"':null; ?>> หน่วยงานภาครัฐ
					<input type="checkbox" name="has_budget_other[2]" value="2" <? echo (@$rs['has_budget_other_2'] == 1)?'checked = "checked"':null; ?>> ท้องถิ่น
					<input type="checkbox" name="has_budget_other[3]" value="3" <? echo (@$rs['has_budget_other_3'] == 1)?'checked = "checked"':null; ?>> ธุรกิจ/องค์กรเอกชน
				</span>
			</div>
		</td>
	</tr>
	<tr>
		<th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
		<td>
			<span style="margin-right:15px;">
		    	<input type="radio" name="budget_cause" value="1" <? echo (@$rs['budget_cause'] == 1)?'checked = "checked"':null; ?>>
		    	ไม่ได้รับงบประมาณปกติของหน่วยงาน
		    </span>
		    <span style="margin-right:15px;">
		    	<input type="radio" name="budget_cause" value="2" <? echo (@$rs['budget_cause'] == 2)?'checked = "checked"':null; ?>>
		    	ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ
		    </span>
		</td>
	</tr>
<tr>
	<th>กลุ่มเป้าหมายของโครงการ<span class="textRed"> *</span></th>
	<td>
		<?php
			foreach($formInput['project_target_set_id'] as $item) {
				$value = $checked = null;
				if(!empty($rs['project_target_set'][$item['id']])) {
					$checked = 'checked = "checked" ';
					$value = $rs['project_target_set'][$item['id']];
				}
				
				echo '<span style="margin-right:15px;">
					<input type="checkbox" name="project_target_set_id[]" value="'.$item['id'].'" '.$checked.'> 
					<input type="text" name="project_target_set_val['.$item['id'].']" value="'.$value.'" class="nformat" style="width:50px;"> '.$item['title'].'
				</span>';
			}
		?>
	</td>
</tr>
<tr>
	<th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
	<td>
		<span><input type="radio" name="organization_type" value="1" <? echo (@$rs['organization_type'] == 1)?'checked = "checked"':null; ?>> องค์กรภาคเอกชน</span>
		<span><input type="radio" name="organization_type" value="2" <? echo (@$rs['organization_type'] == 2)?'checked = "checked"':null; ?>> หน่วยงานของรัฐ</span>
	</td>
</tr>
<tr>
	<th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="textRed">*</span></th>
	<td>
		<?php 
			
			foreach($formInput['fileattach'] as $key => $item){
				if(empty($rs['fileattach_'.$key])) { ?>
					<div style="font-weight:bold;"><?php echo $item; ?></div>
					<div class="tag_fileattach ">
						<input type="file" name="fileattach_<?php echo $key; ?>">
					</div>
				<?php } else { ?>
					<div style="font-weight:bold;"><?php echo $item; ?></div>
					<div class="tag_fileattach download">
						<a href="org/claimfund/downloadChild/<?php echo 'fileattach_'.$key.'/'.$rs['id']; ?>" target="_blank" class="btn btn-primary" style="color:#fff;">Download</a>
						<a href="org/claimfund/delfileChild/<?php echo 'fileattach_'.$key.'/'.$rs['id']; ?>" class="btn btn-danger pull-right btnDelfile" style="color:#fff;">Delete</a>
						
						<!-- <span class="btnDelfile">Delete</span>-->
					</div>
				<?php }/**/
			} 
		?>
	</td>
</tr>
</table>



<div style="text-align:right; margin-top:20px;"><button type="submit" class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

</form>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>

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
			add_input_attach('attach_set_1', $('#file_sector1'));
		});
		
		$('#btn_add_files2').click(function(){
			add_input_attach('attach_set_2', $('#file_sector2'));
		});
		
		//Attach files
		//--Delete attach file
		$('a.btnDelfile').live("click", function(){
			if(!confirm('กรุณายืนยันการลบไฟล์แนบ')) { return false; }
			$('#sector-3--fps_1').html('<div style="text-align:center;">Loading...</div>');
			href = $(this).attr('href');
			$.get(href, function(data){
				$('#sector-3--fps_1').html(data);
				memberForm(1, '<?php echo @$rs['id']; ?>');
			});
			return false;
		});
		
		//--cal_project_budget
		$('.cal_project_budget').focus(function(){
			$(this).val($(this).val().replace(/,/gi, "")*1);
		});
		$('.cal_project_budget').blur(function(){
			$(this).val(numeral($(this).val()).format('0,0.00'));
			
			project_budget = 0;
			for(i=0; i<$('.cal_project_budget').length; i++) {
				project_budget += ($('.cal_project_budget').eq(i).val().replace(/,/gi, "")*1);
			}
			$('[name=project_budget]').val(numeral(project_budget).format('0,0.00'));
		});
	});
</script>