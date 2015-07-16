<div id="title-blank"> ลงทะเบียนนักสังคมสงเคราะห์</div>
<div id="breadcrumb">
	<a href="home/index">หน้าแรก</a> > <span class="b1">ลงทะเบียนนักสังคมสงเคราะห์</span> 
</div>
<div id="page">
<script>
$(document).ready(function(){
	$(".btn_add,.btn_edit").click(function(){
    	$.get('act/welfare_service/ajax_customer_sub2_form',{
    		id : $(this).prev('input[name=id]').val(),
    		id_card : $("input[name=id_card]").val()
    	},function(data){
    		$("#csubs2_form").html(data);
    	});
    });
	
	$('[name=ampor_code]').chainedSelect({
    	parent: '#province',
    	url: 'social_worker/ajax_ampor',
    	value: 'ampor_code',
    	label: 'text'
    });
    
    $("#province").live('change',function(){
    	$('[name=tumbon_code]').chainedSelect({
	    	parent: '[name=ampor_code]',
	    	url: 'social_worker/ajax_tumbon?p='+$(this).val(),
	    	value: 'tumbon_code',
	    	label: 'text'
	    });
    });
    /*
    $("form").validate({
		rules: {
			id_card:"required",
			title_id:"required",
			fname:"required",
			lname:"required",
			sex:"required",
			birthday:"required",
			home_no:"required",
			tel:"required"
		},
		messages:{
			id_card:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			title_id:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			fname:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			lname:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			sex:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			birthday:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			home_no:"ฟิลด์นี้ห้ามเป็นค่าว่าง",
			tel:"ฟิลด์นี้ห้ามเป็นค่าว่าง"
		}
	});*/
	
	$('.td_chkboxType2 input[type=checkbox]').change(function(){
		if(this.checked){
			var input_box = $(this).closest('.input-group').find('input');
			input_box.removeAttr('disabled');
			input_box.attr('placeholder','ระบุรายละเอียด');
		}else{
			var input_box = $(this).closest('.input-group').find('input').slice(1);
			input_box.attr('disabled','disabled');			
		}
	});
	$("input[type=text], select, textarea").attr('class','form-control');
});

function organ_view_sub() {
	window.open("social_worker/organ_select", "", "width=1024,height=768,status=yes,toolbar=no,menubar=no,scrollbars=yes,resizable=yes");
}
</script>
<form id="composeform_sub" method="post" action="social_worker/save" enctype="multipart/form-data" class="form">

<table class="table table-bordered">
  <tr>
    <th>เลขที่บัตรประชาชน <span class="Txt_red_12"> *</span></th>
    <td>
    	<input name="id_card" id="id_card" type="text" value="" style="width:200px;" required="required" data-error="กรุณาระบุเลขประจำตัวประชาชน" />
    	<div class="help-block with-errors"></div>    	
    </td>
  </tr>
  <tr>
    <th>ชื่อ - สกุล <span class="Txt_red_12"> *</span></th>
    <td>
    <div class="input-group">
      <?php echo form_dropdown('title_id', get_option('title_id', 'title_name', 'act_title_name', '1=1 order by title_name asc' , null ,'adoDB'), 1, 'style="width:150px;"', '-- คำนำหน้า --'); ?>    
      <input name="fname" type="text" value="" style="width:150px;" placeholder="ชื่อ"/>
      <input name="lname" type="text" value="" style="width:250px;" placeholder="นามสกุล"/>
    </div>
    </td>
  </tr>
  <tr>
  <th>ไฟล์เอกสาร</th>
  <td>
  	<input type="file" name="UploadFile" />
  </td>
</tr>
  <tr>
    <th>เพศ <span class="Txt_red_12"> *</span></th>
    <td>
    	<span><input type="radio" name="sex" value="M" checked /> ชาย</span> 
      	<span><input type="radio" name="sex" value="F"  /> หญิง</span>
    </td>
  </tr>
  <tr>
    <th>วัน/เดือน/ปี เกิด <span class="Txt_red_12">*</span></th>
    <td>
    		<div class="col-lg-3" style="padding-left: 1px; width: 150px;">
                <div class="input-group">
                <input name="birthday" type="text" class="datepicker" value=""  />
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                </div>
            </div>
     </td>
  </tr>
  <tr>
    <th>สถานที่ทำงาน/สถานที่ติดต่อ<span class="Txt_red_12"> *</span></th>
    <td>
	     <div class="input-group">
	        <span class="input-group-addon">เลขที่</span>
	          <input name="home_no" type="text" class="form-control " value="" />
	        <span class="input-group-addon">หมู่ที่</span>
	        <input name="moo" type="text"  class="form-control"value="" />
	        <span class="input-group-addon">ตรอก/ซอย</span>
	        <input name="soi" type="text" class="form-control" value="" />
	        <span class="input-group-addon">ถนน</span>
			<input name="road" type="text" class="form-control" value="" />
	   </div>
    <br />
  <div class="input-group">
   <span class="input-group-addon">จังหวัด</span> 
    <?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', '1=1 order by province_name asc', null,'adoDB'), null, 'id=province', '- เลือกจังหวัด -'); ?>
    <span class="input-group-addon">อำเภอ</span>
    <?php echo form_dropdown('ampor_code', array() , null , null, '- เลือกอำเภอ -'); ?>
    <span class="input-group-addon">ตำบล</span>
    <?php echo form_dropdown('tumbon_code', array() , null , null, '-- เลือกตำบล --'); ?>
    <span class="input-group-addon">รหัสไปรณีย์</span>
    <input name="post_code" type="text" value="" style="width:70px;"/>
    </div>
  	</td>
  </tr>
  <tr>
    <th>โทรศัพท์<span class="Txt_red_12"> *</span></th>
    <td><input name="tel" type="text" value="" style="width:200px;"/></td>
  </tr>
  <tr>
    <th>แฟกช์</th>
    <td><input name="fax" type="text" value="" style="width:200px;"/></td>
  </tr>
  <tr>
    <th>โทรศัพท์มือถือ</th>
    <td><input name="phone" type="text" value="" style="width:200px;"/></td>
  </tr>
  <tr>
    <th>อีเมล์</th>
    <td><input name="email" type="text" value="" style="width:250px;"/></td>
  </tr>
  <tr>
    <th>เว็บไซต์
     </th>
    <td><input name="website" type="text" value="" style="width:250px;"/></td>
  </tr>
  <tr>
    <th>ระดับการศึกษา
     </th>
    <td>
    	<?php echo form_dropdown('education_id', get_option('id', 'education_name', 'act_education', '1=1 order by education_name asc', null, 'adoDB'), '', '', '- เลือกระดับการศึกษา -'); ?>
    </td>
  </tr>
  <tr>
    <th>คณะ/สาขา
     </th>
    <td>
    <div class="input-group">
    <input name="faculty" type="text" value=""  placeholder="คณะ"/><span class="input-group-addon">  /  </span>  <div style="width:250px;"><input name="major" type="text" value=""  placeholder="สาขา"/></div>
    </div>
    </td>
  </tr>
  <tr>
    <th>สถาบัน </th>
    <td>
      <div class="input-group">
      <input name="institute" type="text" value=""/> 
      <span class="input-group-addon">เมื่อปี </span>
      <div style="width:100px;"><input name="institute_year" type="text" value="" /></div>
      </div>
      </td>
  </tr>
  <tr>
    <th>ตำแหน่งปัจจุบัน</th>
    <td><input name="position_now" type="text" value="" style="width:300px;"/></td>
  </tr>
  <tr>
    <th>ชื่อหน่วยงานที่ปฏิบัติงาน
     </th>
    <td>
    	<a href="javascript:organ_view_sub();" class="btn btn-small btn-info">ค้นหาหน่วยงาน</a>
    	<input name="organ_name" type="text" value="" >
    	<input name="organ_id" type="hidden" value=""/>            	                
    </td>
  </tr>
  <tr>
    <th>ลักษณะงานที่ปฏิบัติ</th>
    <td class="td_chkboxType2">
    	<?php
    		dbConvert($specifics); 
    		foreach($specifics as $row):
    	?>
		<div class="input-group">
           <span class="input-group-addon" style="background:#FFFFFF;">
			<input name="answer_id[]" type="checkbox"  value="<?php echo $row['id']?>" > 
            </span>
            <span class="input-group-addon" style="width:200px;text-align:left;"><?php echo $row['specific_name']?> </span>
			<input name="other[]" type="text" style="" value="" disabled="disabled"/>
			<input name="question_name[]" type="hidden" value="specific" disabled="disabled" />
		</div>
    	<?php endforeach;?>
	</td>
  </tr>
  <tr>
    <th>กลุ่มเป้าหมายที่ปฏิบัติงาน</th>
    <td class="td_chkboxType2">
    <?php
    	dbConvert($target_groups); 
    	foreach($target_groups as $row):
    ?>
    <div class="col-lg-5" style="padding-left:1px;width:50%;">
		<div class="input-group">
        	<span class="input-group-addon" style="background:#FFFFFF;">
				<input name="answer_id[]" type="checkbox" value="<?php echo $row['target_id']?>" > 
            </span>
            <span class="input-group-addon" style="text-align:left;width:100%;display:block;word-wrap:break-word;">                
				<?php echo $row['target_name']?> 
             </span>
			<input name="other[]" type="text" style="" value="" disabled="disabled"/>
			<input name="question_name[]" type="hidden" value="target" 'disabled="disabled"'/>
        </div>
	</span>
    </div>
	<?php endforeach;?>
    </td>
  </tr>
  <tr>
    <th>ระยะเวลาที่ปฏิบัติงาน </th>
    <td>
    		<div style="width:80px;">
    		<div class="input-group">
    		<input name="work_time" type="text" value="" />             
			      <span class="input-group-addon">ปี</span>
      		</div>
            </div>
      </td>
  </tr>
  <tr>
    <th>คุณสมบัติของนักสังคมสงเคราะห์ที่ปฏิบัติงานด้านการจัดสวัสดิการสังคม</th>
    <td>
   	<div class="input-group">
                <span class="input-group-addon" style="background:#FFFFFF;">
                    <input type="checkbox" name="spec1" value="1"  /> 
                </span>
                <span class="input-group-addon" style="">        
                สำเร็จการศึกษาไม่ต่ำกว่าปริญญาตรีสาขาสังคมสงเคราะห์ศาสตร์ เมื่อปี 
                </span>        
               <input name="spec1_year" type="text" value="" style="width:90px;" placeholder="ระบุปีพ.ศ."/>
    </div>
   	<div class="input-group">
                <span class="input-group-addon" style="background:#FFFFFF;">
			    	<input type="checkbox" name="spec2" value="1" /> 
                </span>
                <span class="input-group-addon" style="text-align:left;line-height:20px;">                
			        สำเร็จการศึกษาไม่ต่ำกว่าปริญญาตรีสาขาอื่น และผ่านการฝึกอบรมหลักสูตรเพื่อเป็นนักสังคมสงเคราะห์ <br />ตามที่คณะกรรมการกำหนด เมื่อปี	
                </span>
		    	<input name="spec2_year" type="text" value="" style="width:90px;" placeholder="ระบุปีพ.ศ."/>
	</div>                
   	<div class="input-group">
                <span class="input-group-addon" style="background:#FFFFFF;">
				    	<input type="checkbox" name="spec3" value="1" /> 
                </span>
                <span class="input-group-addon" style="">             
			        มีคุณสมบัติเหมาะสมหรือปฏิบัติงานด้านสังคมสงเคราะห์ เมื่อปี 
                 </span>
                 <input name="spec3_year" type="text" value="" style="width:90px;" placeholder="ระบุปีพ.ศ."/>
	</div>
    </td>
  </tr>
  <tr>
    <th>เป็นนักสังคมสงเคราะห์ตามกฎหมายอื่น </th>
    <td><input name="is_supporter" type="text" value="" style="width:400px;"/></td>
  </tr>
  <tr>
    <th>หมายเหตุ
     </th>
    <td><textarea name="note" rows="3" style="width:500px;"></textarea></td>
  </tr>
</table>

<div style="width:200px;margin:0 auto;text-align:center">
	<img src="social_worker/captcha" ><br>
	กรุณากรอกตัวอักษรในภาพ
	<input type="text" name="captcha" value="" class="form-control" required="required">
</div>
<br>
<div id="btnBoxAdd" style="text-align:center;">
  <input type="submit" title="ลงทะเบียน" value="ลงทะเบียน" class="btn btn-primary"/>
  <input type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)" class="btn btn-default"/>
</div>
</form>