<style type='text/css'>

 h3 {
    font-family: supermarket;
    font-size: 22px;
    font-weight: 700;
    padding-top: 10px;
    color: #fc7803;
}

#search {
    padding: 10px 10px 0 10px;
    border: 1px dashed #ccc;
    margin: 10px 0;
    background-color: #FFC;
}


.odd {
    background-color: #fff3fc;
}

.tblist {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 14px;
    background: #fff;
    margin: 0;
    margin-bottom: 10px;
    width: 100%;
    border-collapse: collapse;
    text-align: left;
}

.tblist th {
    font-size: 16px;
    font-weight: normal;
    padding: 10px 5px 3px 5px;
    border-top: 0px solid #ccc;
    border-bottom: 2px solid #ccc;
    border-left: 0px solid #ccc;
    border-right: 0px solid #ccc;
    text-align: left;
    background-color: #fff;
    color: #65358f;
}

.tblist td {
    color: #333;
    padding: 5px;
    height: 30px;
    border-top: 0px solid #ccc;
    border-bottom: 1px solid #ccc;
    border-left: 0px solid #ccc;
    border-right: 0px solid #ccc;
}

.tblist td.B {
    font-weight: 700;
}

.tblist td strong {
    font-weight: 700;
}

.tblist td.red, span.red {
    color: #F00;
}

.tblist tr:hover td,.tblist tr.active td {
    color: #666;
}

.tblist .paddL20 {
    padding-left: 20px;
}

.tblist .paddL40 {
    padding-left: 40px;
}

.tblist .paddL60 {
    padding-left: 60px;
}

.tblist tr.topic {
    background: url(../images/bg_topic.gif);
}


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
	
	.tblForm th:first-child{
		padding-bottom:10px;
		width:250px;
	}
	<? if($status == 'view') { ?> 
		.textRed{
			display:none;
		}
	<? } ?>
</style>

<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;">
	<button class="btn" id="btn2list" onclick="memberList(1);">กลับไปหน้ารายการ</button>
</div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>

<?php 
	
	echo form_hidden('type', @$_GET['type']); 
	if($status == 'edit') { ?>  
		<link rel="stylesheet" type="text/css" media="screen"  href="media/js/colorbox/example1/colorbox.css" />

		<form action="org/claimfund/saveChild/<?php echo @$rs['id']; ?>" method='post' enctype="multipart/form-data"> 
	<? } 


	$year_budget = (empty($rs['year_budget']))?(date('Y')+543):$rs['year_budget'];
	$project_code = (empty($rs['project_code']))?'คคด/'.(date('Y')+543).'/'.@$value['province_name'].'/XXXX':$rs['project_code'];
	
	
	echo form_hidden('year_budget', $year_budget); 
	echo form_hidden('province_id', $rs['province_id']);
?>
<div class="dvChild">
<table class="tblForm" style='width:100%;'>
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
	<td>
		<?php if($status == 'edit') { ?>
			<input type="text" name="project_name" style="width:450px;"  class="form-control" value="<?php echo @$rs['project_name']; ?>" />
		<? } else {
			 echo @$rs['project_name']; 
		} ?>
	</td>
</tr>
<tr>
	<th>แนบไฟล์เอกสารโครงการ<span class="textRed">*</span></th>
	<td>
	  	<? $filelist = @$rs['attach_set_1'];
	  	if($status == 'edit') { ?> 
		  	<button name="" type="button" class="btn btn-success" id="btn_add_files1">+ เพิ่มไฟล์แนบ</button>
		  	<div id='file_sector1'>
		  		<?php
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
		<? } else {
			if(!empty($filelist)) {
			foreach($filelist as $item) {
				echo '<div class="div_attach">
					<a href="org/claimfund/downloadChild/attach_set_1/'.$item['id'].'" style="color:#00f;"><u>'.$item['file_name'].'.'.@end(explode('.', $item['file_path'])).'</u></a>
				</div>';//btnDelfile
			}	
			} else {
				echo 'ไม่พบไฟล์แนบ';
			} 
		} ?>
	</td>
</tr>
<tr>
	<th>แนบไฟล์เอกสารรายละเอียดค่าใช้จ่ายของโครงการ <span class="textRed">*</span></th>
	<td>
  		<? $filelist = @$rs['attach_set_2'];
	  	if($status == 'edit') { ?> 
		  	<button name="" type="button" class="btn btn-success" id="btn_add_files2">+ เพิ่มไฟล์แนบ</button>
		  	<div id='file_sector2'>
		  		<?php
					if(!empty($filelist)) {
					foreach($filelist as $item) {
						echo '<div class="div_attach">
							<div style="background:#95c9dd; border:solid 1px #688c9a;">
								<strong>ไฟล์แนบ : </strong><a href="org/claimfund/downloadChild/attach_set_2/'.$item['id'].'" target="_blank" style="color:#fff;" class="btn btn-primary">Download</a>
								'.$item['file_name'].'
								<a href="org/claimfund/delfileChild/attach_set_2/'.$item['id'].'" class="btn btn-danger pull-right btnDelfile" style="color:#fff;">Delete</a>
							</div>
						</div>';//btnDelfile
					}	
					}
		  		?>
			</div>
		<? } else {
			if(!empty($filelist)) {
			foreach($filelist as $item) {
				echo '<div class="div_attach">
					<a href="org/claimfund/downloadChild/attach_set_2/'.$item['id'].'" style="color:#00f;"><u>'.$item['file_name'].'.'.@end(explode('.', $item['file_path'])).'</u></a>
				</div>';//btnDelfile
			}	
			} else {
				echo 'ไม่พบไฟล์แนบ';
			}
		} ?>
	</td>
</tr>
	<tr>
		<th>ชื่อองค์กรที่เสนอขอรับ <span class="textRed">*</span></th>
		<td>
			<?php	
				if($status == 'edit') {
					echo form_hidden('welfare_type', @$rs['welfare_type']);
					echo form_hidden('welfare_id', @$rs['welfare_id']);
					echo form_input('welfare_title', @$rs['welfare_tog_title'], 'readonly="readonly" style="width:400px;"').' ';
					echo '<span style="line-height:30px; margin-right:20px;" id="welfare_title">';
						echo (empty($rs['welfare_tog_title']))?'--ไม่ระบุ--':@$rs['welfare_tog_title'];
					echo '</span> ';
					echo form_button(null, 'เลือกองค์กร', 'class="btn btn-sm btn-default" id="btnSlcBenefit"');
				} else {
					echo @$rs['welfare_tog_title']; 
				} 
			?>

			<!-- Colorbox -->
			<div style='display:none;'><div id="listBenefit" style="padding:10px 20px;">
				<h3>บันทึก องค์กรสารธรณประโยชน์ และ บันทึกองค์กรสวัสดิการชุมชน</h3>
				<div id="search" style='padding:10px 20px;'>
					ประเภท <? echo form_dropdown(null, array(1 => 'องค์กรสาธารณประโยชน์', 2 => 'องค์กรสวัสดิการชุมชน'), null, 'class="form-control" style="display:inline-block; width:auto;" id="searchBenefit_type"', '-- กรุณาเลือก --'); ?>
					ชื่อหน่วยงาน   <input id="searchBenefit_title" type="text" value="" placeholder="ชื่อองค์กร" style="display:inline-block; width:350px;" class="form-control"> 
					<input type="button" title="ค้นหา" class="btn btn-default btn_search" value="ค้นหา" id="btnSearchBenefit">
				</div>
				<div id="listBenefit_content"></div>
			</div></div>
		</td>
	</tr>
	<tr>
		<th>สถานะโครงการที่ขอรับเงินกองทุนฯ <span class="textRed">*</span></th>
		<td>
			<?php if($status == 'edit') { 
				foreach($formInput['project_status'] as $key => $item) {
					?>
					<div style="margin-bottom:10px;">
				    	<input type="radio" name="project_status" value="<? echo $key; ?>" <? echo (@$rs['project_status'] == $key)?'checked = "checked"':null; ?>>
				    	<? echo $item; ?>
				    </div>
					<?
				}
			} else {
				 echo @$formInput['project_status'][$rs['project_status']];
			} ?>
		</td>
	</tr>
<tr>
	<th>ประเภทโครงการ  <span class="textRed">*</span></th>
	<td>
		<?php if($status == 'edit') { 
			foreach($formInput['project_type'] as $key => $item) {
				?>
				<span style="margin-right:15px;">
			    	<input type="radio" name="project_type" value="1" <? echo (@$rs['project_type'] == $key)?'checked = "checked"':null; ?>>
			    	<? echo $item; ?>
			   </span>
				<?
			}
		} else {
			 echo @$formInput['project_type'][$rs['project_type']];
		} ?>
		
	</td>
</tr>
	<tr>
		<th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="textRed">*</span></th>
		<td> 
			<?php if($status == 'edit') { 
				foreach($formInput['project_direction'] as $key => $item) { ?>
					<span style="margin-right:15px;">
				    	<input type="radio" name="project_direction" value="<? echo $key; ?>" <? echo (@$rs['project_direction'] == $key)?'checked = "checked"':null; ?>>
				    	<? echo $item; ?>
				    </span>
				<? } ?>
				<span id="error_project_direction_set_id"></span> 
			<? } else {
				 echo @$formInput['project_direction'][$rs['project_direction']];
			} ?>
		</td>
	</tr>
	<tr>
		<th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="textRed">*</span></th>
		<td>
			<?php if($status == 'edit') { ?>
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
			<? } else { ?>
				 <div>
					<span style="display:inline-block; width:240px;">งบประมาณทั้งโครงการ </span>
					<?php echo (empty($rs['budget_project']))?'0.00':number_format($rs['budget_project'], 2); ?> บาท
				</div>
				<div style='margin-top:5px;'>
					<span style="display:inline-block; width:240px;">งบประมาณที่ขอรับการสนับสนุน  </span>
					<?php echo (empty($rs['budget_support']))?'0.00':number_format($rs['budget_support'], 2); ?> บาท
					<span style="display:none;" class="note">* จะคำนวณเป็นขนาดโครงการ</span>
				</div>
				<div style='margin-top:5px;'>
					<span style="display:inline-block; width:240px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น*(ถ้ามี) </span>
					<?php echo (empty($rs['budget_other']))?'0.00':number_format($rs['budget_other'], 2); ?> บาท
				</div>
				<div style='margin-top:5px;'>
					<? foreach($formInput['has_budget_other'] as $key => $item) { ?>
						<span style='margin-right:25px;'>
							<? if($status == 'edit') { ?> 
								<input type="checkbox" name="has_budget_other[<? echo $key; ?>]" value="<? echo $key; ?>" <? echo (@$rs['has_budget_other_'.$key] == 1)?'checked = "checked"':null; ?> >
							<? } else { ?>
								<? echo (@$rs['has_budget_other_'.$key] == 1)?'<img src="media/images/checked.png"> ':'<img src="media/images/uncheck.png"> '; ?>
							<? } ?> 
							<span style='margin-left:3px;'><? echo $item; ?></span>
						</span> 
					<? } ?>
				</div>
			<? } ?>
			
		</td>
	</tr>
	<tr>
		<th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
		<td>
			<?php if($status == 'edit') { 
				foreach($formInput['budget_cause'] as $key => $item) {
					?>
					<span style="margin-right:15px;">
				    	<input type="radio" name="budget_cause" value="1" <? echo (@$rs['budget_cause'] == $key)?'checked = "checked"':null; ?>>
				    	<? echo $item; ?>
				    </span>
					<?
				}	
			} else {
				echo @$formInput['budget_cause'][$rs['budget_cause']];
			} ?>
		</td>
	</tr>
	<tr>
		<th>กลุ่มเป้าหมายของโครงการ<span class="textRed"> *</span></th>
		<td>
			<?php if($status == 'edit') { 
				foreach($formInput['project_target_set_id'] as $item) {
					$comment = $value = $checked = null;
					if(!empty($rs['project_target_set'][$item['id']]) || @$rs['project_target_set'][$item['id']] == '0') {
						$checked = 'checked = "checked" ';
						$value = $rs['project_target_set'][$item['id']];
						$comment = $rs['project_target_set_comment'][$item['id']];
					}
					
					if(@$item['is_comment'] != 1) {
						echo '<span style="margin-right:25px;">
							<input type="checkbox" name="project_target_set_id[]" value="'.$item['id'].'" '.$checked.'> 
							'.$item['title'].' 
							<input type="text"  name="project_target_set_val['.$item['id'].']" value="'.$value.'" class="form-control nformat" style="display:inline-block; width:50px;"> คน
						</span>';	
					} else {
						echo '<span style="margin-right:25px;">
							<input type="checkbox" name="project_target_set_id[]" value="'.$item['id'].'" '.$checked.'> 
							'.$item['title'].' 
							<input type="text" class="form-control" style="display:inline-block; width:300px;" name="project_target_set_comment['.$item['id'].']" value="'.$comment.'">
						</span>';
					}
					
				}
			} else { 
				foreach($formInput['project_target_set_id'] as $item) {
					if(!empty($rs['project_target_set'][$item['id']]) || @$rs['project_target_set'][$item['id']] == '0') {
						echo '<img src="media/images/checked.png"> ';
						if($item['is_comment'] != 1) {
							echo '<span style="margin-right:25px;">
								'.$item['title'].' '.$rs['project_target_set'][$item['id']].' คน 
							</span>';
						} else {
							echo '<span style="margin-right:25px;">
								'.$item['title'].' 
								"'.$rs['project_target_set_comment'][$item['id']].'"
							</span>';
						}
					}	
				}
			} //if($status == 'edit') ?>
			
		</td>
	</tr>
	<tr>
		<th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
		<td>
			<?php if($status == 'edit') { 
				foreach($formInput['organization_type'] as $key => $item) {
					?><span><input type="radio" name="organization_type" value="1" <? echo (@$rs['organization_type'] == $key)?'checked = "checked"':null; ?> style='margin-right:15px;'> <? echo $item; ?></span><?
				}			
			} else {
				echo @$formInput['organization_type'][$rs['organization_type']];
			} ?>
			
		</td>
	</tr>
	<tr>
		<th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="textRed">*</span></th>
		<td>
			<?php 
				foreach($formInput['fileattach'] as $key => $item){
					if($status == 'edit') {
						echo '<div style="font-weight:bold;">'.$item.'</div>';
							
						if(empty($rs['fileattach_'.$key])) { ?>
							<div class="tag_fileattach ">
								<input type="file" name="fileattach_<?php echo $key; ?>">
							</div>
						<?php } else {
							?>
							<div class="tag_fileattach download">
								<a href="org/claimfund/downloadChild/<?php echo 'fileattach_'.$key.'/'.$rs['id']; ?>" class="btn btn-primary" style="color:#fff;">Download</a>
								<? if($status == 'edit') { ?> <a href="org/claimfund/delfileChild/<?php echo 'fileattach_'.$key.'/'.$rs['id']; ?>" class="btn btn-danger pull-right btnDelfile" style="color:#fff;">Delete</a> <? } ?>
							</div>
							<?
						}
					} else {
						if(empty($rs['fileattach_'.$key])) { 
							echo '<div>'.$item.'</div>';
						} else {
							echo '<div><a href="org/claimfund/downloadChild/fileattach_'.$key.'/'.$rs['id'].'" style="color:#00f;"><u>'.$item.'</u></a></div>';
						}
					}
				} 
			?>
		</td>
	</tr>
	<? if(!empty($rs['id'])) { ?> 
		<tr>
			<th>สถานะ</th>
			<td><? echo @$formInput['status'][$rs['status']]; ?></td>
		</tr>
	<? } ?>
</table>



<? if($status == 'edit') { ?> <div style="text-align:right; margin-top:20px;"><button type="submit" class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div><? } ?>
</div>

<? if($status == 'edit') { ?> </form><? } ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
<script>

			
			
	function add_input_attach(name, obj_sector) {
		content = "<div class='div_attach'>";
			content += '<div style="background:#95c9dd; border:solid 1px #688c9a;">';
				content += "<strong>แนบไฟล์ : </strong>";
					content += "<input type='file' style='display:inline-block;' name='"+name+"[]'>";
					content += "<input type='button' value='Delete' class='btn btn-danger btn-delete_input' onclick='if(!confirm(\"กรุณายืนยันการลบไฟล์แนบ\")) return false; $(this).parent().parent().remove();'>";
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
				//project_budget += ($('.cal_project_budget').eq(i).val().replace(/,/gi, "")*1);
				project_budget += ($('.cal_project_budget').eq(i).val() == '')?0:numeral().unformat($('.cal_project_budget').eq(i).val());
			}
			$('[name=budget_project]').val(numeral(project_budget).format('0,0.00'));
		});

		//Row 8
			//Row 8 -- ชื่อองค์กรที่เสนอขอรับ
			$('#btnSlcBenefit').live('click', function(){
				$('#listBenefit_content').html("<div style='text-align:center; color:#aaa;'>Loading...</div>");
				$.get('org/claimfund/cbox_list_benefit', function(data){
					$('#listBenefit_content').html(data);
				});
			});

			//Row 8 __ colorbox
			//Row 8 __ colorbox -- ชื่อองค์กรที่เสนอขอรับ -- call color box
			$('#btnSlcBenefit').colorbox({
				height	: "80%",
				width	: "80%",
				inline	: true,
				href	: "#listBenefit",
				onClosed: function(){ 
					$("#listBenefit_content").html(""); 
					$('#searchBenefit_type').val('');
					$('#searchBenefit_title').val('');
				} //Clear #listBenefit_content
			});

			//Row 8 __ colorbox -- pagination
			$('.pagination a').live('click', function(){
				$('#listBenefit_content').html("<div style='text-align:center; color:#aaa;'>Loading...</div>");
				$.get('org/claimfund/cbox_list_benefit/'+$(this).attr('href'), function(data){
					$('#listBenefit_content').html(data);
				});
				return false;
			});

			//Row 8 __ colorbox -- Search box 
			$('#btnSearchBenefit').live('click', function(){
				$('#listBenefit_content').html("<div style='text-align:center; color:#aaa;'>Loading...</div>");
				$.get('org/claimfund/cbox_list_benefit'
					, {
						b_type : $('#searchBenefit_type option:selected').val()
						,title : $('#searchBenefit_title').val()
					}, function(data){
						$('#listBenefit_content').html(data);
					}
				);
			});

			//Row 8 __ colorbox -- ชื่อองค์กรที่เสนอขอรับ -- Button select
			$('.btnSlcWelfare').live('click', function(){
				$('[name=welfare_type]').val($(this).attr('rel_type'));
				$('[name=welfare_id]').val($(this).attr('rel_id'));
				$('[name=welfare_title]').val($(this).attr('rel_title'));
				$('#welfare_title').html($(this).attr('rel_title'));

				$.colorbox.close();
			});
	});
</script>