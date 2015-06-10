<div id="title-blank"> ยื่นจดทะเบียนองค์การสวัสดิการสังคม</div><br>
<h2 style="margin-top:0; color:#CC075F">องค์การสวัสดิการชุมชน</h2>

<style type="text/css">
body {
    margin-top:40px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>


  
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>
  
  <form class="form-horizontal" role="form" action="org/community_save" method="post" enctype="multipart/form-data">
  	
  	<!------- ขั้นตอนที่ 1 ------->
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
        <div class="col-md-12">
        	
        	
          <h4 style="margin-top:0; color:#393">ข้อมูลองค์กร (1)</h4>
          <div class="form-group">
		    <label class="col-sm-2 control-label">ประเภทหน่วยงาน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-5"><span style="padding-right:20px;">
		    	<input name="under_type_sub" type="radio" value="องค์กรสวัสดิการชุมชน" <?=@$rs['under_type_sub'] == 'องค์กรสวัสดิการชุมชน' ? 'checked=checked' : '' ;?> required/> องค์กรสวัสดิการชุมชน</span>
		    	<input name="under_type_sub" type="radio" value="เครือข่ายองค์กรสวัสดิการชุมชน" <?=@$rs['under_type_sub'] == 'เครือข่ายองค์กรสวัสดิการชุมชน' ? 'checked=checked' : '' ;?> required/> เครือข่ายองค์กรสวัสดิการชุมชน 
		    </div>
		  </div>
		  
		 <div class="form-group">
		    <label class="col-sm-2 control-label">ชื่อ-สกุลผู้ขอยื่นคำขอ <span class="vald">*</span></label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="request_name" value="<?=@$rs['request_name']?>" placeholder="ชื่อและสกุลผู้ขอยื่นคำขอ" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ชื่อองค์กรภาคประชาชน <span class="vald">*</span></label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="organ_name" value="<?=@$rs['organ_name']?>" placeholder="ชื่อองค์กร" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">วันเดือนปีที่ก่อตั้ง <span class="vald">*</span></label>
		    <div class="form-inline col-sm-4">
		      <input type="text" class="form-control fdate dateInput" name="establish_date" value="<?=@$rs['establish_date']?>" placeholder="" style="width:100px;margin-right:5px;" required>
			</div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">วัตถุประสงค์องค์กรภาคประชาชน <span class="vald">*</span></label>
		    <div class="col-sm-8">
		    	<textarea name="objective" cols="" rows="5" class="form-control" placeholder="ระบุวัตถุประสงค์" required><?=@$rs['objective']?></textarea>
		    </div>
		  </div> 
		   
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ที่ตั้งสำนักงานใหญ่ขององค์กรภาคประชาชน <span class="vald">*</span></label>
		
			<div class="form-inline col-sm-8">
		      <input type="text" class="form-control numInt" name="home_no" value="<?=@$rs['home_no']?>" placeholder="เลขที่" style="width:80px;" required> 
		      <input type="text" class="form-control numOnly" name="moo" value="<?=@$rs['moo']?>" placeholder="หมู่ที่" style="width:80px;" required>
		      <input type="text" class="form-control" name="soi" value="<?=@$rs['soi']?>" placeholder="ตรอก/ซอย" style="width:230px;" required>
		      <input type="text" class="form-control" name="road" value="<?=@$rs['road']?>" placeholder="ถนน" style="width:230px;" required>
		      <?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    <span id="ampor">
			    <?php echo form_dropdown('ampor_code', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    </span>
			    <span id="tumbon">
			    <?php echo form_dropdown('tumbon_code', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['province_code'].' and ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    </span>
		      <input type="text" class="form-control fpostel" name="post_code" value="<?=@$rs['post_code']?>" placeholder="รหัสไปรณีย์" style="width:100px;" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">โทรศัพท์ / โทรสาร / มือถือ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-8">
		      <input type="text" class="form-control" name="tel" value="<?=@$rs['tel']?>" placeholder="เบอร์โทรศัพท์" required> / <input type="text" class="form-control fphone" name="fax" value="<?=@$rs['fax']?>" placeholder="เบอร์โทรสาร" required> / <input type="text" class="form-control fmobile" name="mobile" value="<?=@$rs['mobile']?>" placeholder="เบอร์มือถือ" required>
		    </div>
		
		  </div>
		
		  <div class="form-group">
		    <label class="col-sm-2 control-label">อีเมล์ / เว็บไซต์ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-8">
		      <input type="text" class="form-control" name="email" value="<?=@$rs['email']?>" style="width:300px;" placeholder="ชื่ออีเมล์" required>  / <input type="text" class="form-control" name="website" value="<?=@$rs['website']?>" style="width:300px;" placeholder="ชื่อเว็บไซต์" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">แผนที่ตั้งของสำนักงานใหญ่ <span class="vald">*</span></label>
		    <div class="col-sm-5">
		    	<input type="file" name="UploadFile" id="UploadFile" class="form-control">
		    	<? if(@$rs['filemap']!=''){?>
		    		<a href="uploads/welfare_community/map/<?=$rs['filemap'];?>" target="_blank"><?=$rs['filemap'];?></a>
		    		<input type="hidden" name="hdfilemap" value="<?php echo $rs['filemap'];?>" >
		        <?}?>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">สำนักงานสาขาขององค์กรภาคประชาชน (ถ้ามี)</label>
		
			<div class="form-inline col-sm-8">
		      <input name="b_home_no" value="<?=@$rs['b_home_no'];?>" type="text" class="form-control numInt" placeholder="เลขที่" style="width:80px;"> 
		      <input name="b_moo" value="<?=@$rs['b_moo'];?>" type="text" class="form-control numOnly" placeholder="หมู่ที่" style="width:80px;">
		      <input name="b_soi" value="<?=@$rs['b_soi'];?>" type="text" class="form-control" placeholder="ตรอก/ซอย" style="width:230px;">
		      <input name="b_road" value="<?=@$rs['b_road'];?>" type="text" class="form-control" placeholder="ถนน" style="width:230px;">
		      <?php echo form_dropdown('b_province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['b_province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    <span id="b_ampor">
			    <?php echo form_dropdown('b_ampor_code', (empty($rs['b_province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['b_province_code'].' order by ampor_name'), @$rs['b_ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    </span>
			    <span id="b_tumbon">
			    <?php echo form_dropdown('b_tumbon_code', (empty($rs['b_ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['b_province_code'].' and ampor_code = '.$rs['b_ampor_code'].' order by tumbon_name'), @$rs['b_tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    </span>
		      <input name="b_post_code" value="<?=@$rs['b_post_code'];?>" type="text" class="form-control fpostel" placeholder="รหัสไปรณีย์" style="width:100px;">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">โทรศัพท์ / โทรสาร / มือถือ</label>
		    <div class="form-inline col-sm-8">
		      <input name="b_tel" value="<?=@$rs['b_tel'];?>" type="text" class="form-control" placeholder="เบอร์โทรศัพท์"> / <input name="b_fax" value="<?=@$rs['b_fax'];?>" type="text" class="form-control fphone" placeholder="เบอร์โทรสาร"> / <input name="b_mobile" value="<?=@$rs['b_mobile'];?>" type="text" class="form-control fmobile" placeholder="เบอร์มือถือ">
		    </div>
		
		  </div>
		
		  <div class="form-group">
		    <label class="col-sm-2 control-label">อีเมล์ / เว็บไซต์</label>
		    <div class="form-inline col-sm-8">
		      <input name="b_email" value="<?=@$rs['b_email'];?>" type="text" class="form-control" style="width:300px;" placeholder="ชื่ออีเมล์">  / <input name="b_website" value="<?=@$rs['b_website'];?>" type="text" class="form-control" style="width:300px;" placeholder="ชื่อเว็บไซต์">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">แผนที่ตั้งของสำนักงานสาขา <span class="vald">*</span></label>
		    <div class="col-sm-5">
		    	<input type="file" name="UploadFile2" id="UploadFile2" class="form-control">
		    	<? if(@$rs['b_filemap']!=''){?>
		    		<a href="uploads/welfare_community/map/<?=$rs['b_filemap'];?>" target="_blank"><?=$rs['b_filemap'];?></a>
		    		<input type="hidden" name="hdfilemap2" value="<?php echo $rs['b_filemap'];?>" >
		        <?}?>
		    </div>
		  </div>
		    
		  <div class="form-group" style="margin-left:16%;">
		    <label class="col-sm-12 control-label" style="text-align:left">แนบเอกสารหลักฐาน มาเพื่อประกอบการพิจารณา ดังนี้ <span class="vald">*</span></label>
		  </div>
		  <div class="form-group" style="margin-left:18%;">
		    <div class="form-inline col-sm-12">
		    <div>
		    <p>(๑) สำเนาทะเบียนบ้านและสำเนาบัตรประชาชนของผู้บริหารองค์กรที่ยื่นคำขอ พร้อมรับรองสำเนาถูกต้อง</p>
		    <p>(๒) สำเนาข้อบังคับ หรือระเบียบขององค์กรภาคประชาชน</p>
		    <p>(๓) รายชื่อคณะกรรมการองค์กรภาคประชาชน</p>
		    <p>(๔) สำเนารายงานสถานะการเงินซึ่งประธานกรรมการหรือผู้ซึ่งได้รับมอบฉันทะให้คำรับรอง (ถ้ามี)</p>
		    <p>(๕) แผนงาน/โครงการที่จะดำเนินการต่อไป</p>
		    <p>(๖) ผลการดำเนินงานในระยะเวลาไม่น้อยกว่าหนึ่งปี</p>
		    <p>(๗) เอกสารตามแบบท้ายคำขอรับรองเป็นองค์กรสวัสดิการชุมชน</p>
		    </div>
		    <script type="text/javascript">
		    	updateList = function() {
				  var input = document.getElementById('multifileInput');
				  var output = document.getElementById('fileList');
				
				  output.innerHTML = 'ไฟล์ที่เลือก:<br><ul>';
				  for (var i = 0; i < input.files.length; ++i) {
				    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
				  }
				  output.innerHTML += '</ul>';
				}
		    </script>
		    <input class="form-control" type="file" id="multifileInput" name="filesToUpload[]" multiple="multiple" onchange="javascript:updateList()">
		    <br>
		    <div id="fileList"></div>
	    	<?if(@is_array($doc)):?>
		    	<?foreach($doc as $key=>$row):?>
		    	<?=$key+1?>. <a href="uploads/welfare_community/doc/<?=$row['files']?>" target="_blank"><?=$row['files']?></a><br>
		    	<?endforeach;?>
		    <?endif;?>
		    </div>
		  </div>
          
          
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >ทำขั้นตอนถัดไป (2)</button>
        </div>
      </div>
    </div>
    <!------- จบขั้นตอนที่ 1 ------->
    
    <!------- ขั้นตอนที่ 2 ------->
    <div class="row setup-content" id="step-2">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h4 style="margin-top:0; color:#393">ลักษณะข้อมูลทั่วไปขององค์กร (2)</h4>
          
          
          <div class="form-group">
		    <label class="col-sm-2 control-label">ลักษณะการดำเนินการองค์กร</label>
		    <div class="form-inline col-sm-10 td_chkboxType2">
	    	<? 
	    		// echo "<pre>";
				// echo print_r($format_select);
				// echo "</pre>";
				
				function searchForId($id, $array) {
				   foreach ($array as $key => $val) {
				       if ($val['answer_id'] === $id) {
				           return $key;
				       }
				   }
				   return null;
				}
	    	?>
	    	<?php foreach($pcommunities as $row):?>
	    	<?@$searchkey = searchForId($row->pcommunity_id, $pcommunity_select);?>
	    	<p>
	    	<span style="padding-right:20px;">
				<input name="answer_id[]" type="checkbox" value="<?=$row->pcommunity_id?>" <?=is_numeric($searchkey) ? 'checked' : '' ;?>> <?=$row->pcommunity_name?>
				<?php if($row->pcommunity_name == "เครือข่ายองค์กรสวัสดิการชุมชน"):?>
				&nbsp;จำนวน <input name="other[]" type="text" class="form-control" style="width:100px;" value="<?=@$pcommunity_select[$searchkey]['other']?>" <?=is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/> องค์กร
				<?php else:?>
				<input name="other[]" type="hidden" style="width:100px;" value="<?=@$pcommunity_select[$searchkey]['other']?>" <?=is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/>
				<?php endif;?>
				<input name="question_name[]" type="hidden" value="ProcessCommunity" <?=is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/>
			</span>
			</p>
	    	<?php endforeach;?>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">จำนวนสมาชิก</label>
		    <div class="form-inline col-sm-5"><input name="member_number" value="<?=@$rs['member_number']?>" type="text" class="form-control" style="width:70px;"> คน (สามารถตรวจสอบรายชื่อและที่อยู่ของสมาชิกได้)</div>
		  </div>
		  
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ครอบคลุมจำนวนพื้นที่</label>
		    <div class="form-inline col-sm-8">
		    	<input name="n_area" value="<?=@$rs['n_area']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> 
		    	หมู่บ้าน/ชุมชน <input name="n_mooban" value="<?=@$rs['n_mooban']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> 
		    	ตำบล/แขวง<input name="n_tumbon" value="<?=@$rs['n_tumbon']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> 
		    	อำเภอ/เขต <input name="n_ampor" value="<?=@$rs['n_ampor']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> 
		    	จังหวัด <input name="n_province" value="<?=@$rs['n_province']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน">
		    </div>
		  </div>
		
		<div class="form-group">
		    <label class="col-sm-2 control-label">บุคลากรขององค์กรภาคประชาชน</label>
		    <div class="form-inline col-sm-10">
		    
		    <p>จำนวนคณะกรรมการ  <input name="director" value="<?=@$rs['director']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> คน</p>
		    <p>ผู้ปฎิบัติงานประจำ  <input name="worker" value="<?=@$rs['worker']?>" type="text" class="form-control" style="width:70px;" placeholder="จำนวน"> คน</p>
		    <p>ผู้ประสานงานองค์กร (เป็นประธานคณะกรรมการ เลขานุการ หรือตำแหน่งอื่นๆ <input name="coordinate" class="form-control" type="text" style="width:50px;" readonly="readonly" value="1"> <img class="add_coordinate_btn" src="themes/msosocial/images/btn_add.png" width="24" height="24" title="เพิ่มที่ปรึกษา" style="cursor:pointer;"></p>
		    <?if(@is_array($coordinate)):?>
	    	<?foreach($coordinate as $key=>$row):?>
	    	<div class="coordinate_addr" style="margin: 15px 0; position: relative;">
	    		<img class="remove_coordinate_btn" src="themes/msosocial/images/remove2.png" width="16" height="16" title="ลบที่ปรึกษา" style="cursor:pointer; position: absolute; right: 10px; top: 0;" />
		    	<div> <!--๑)-->
			    <input class="form-control" type="text" name="c_name[]" value="<?=@$row['name']?>" style="width:150px;" placeholder="ชื่อ" />
			    <input class="form-control" type="text" name="c_surname[]" value="<?=@$row['surname']?>" style="width:250px;" placeholder="นามสกุล" />
			    <input class="form-control" type="text" name="c_education[]" value="<?=@$row['education']?>" style="width:350px;" placeholder="วุฒิ" />
			    </div>
			    <div>
			    <input class="form-control" type="text" name="c_experience[]" value="<?=@$row['experience']?>" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
			    <input class="form-control" type="text" name="c_location[]" value="<?=@$row['location']?>" style="width:405px;" placeholder="สถานที่ทำงาน" />
			    </div>
			    <div>
			    <input class="form-control" type="text" name="c_address[]" value="<?=@$row['address']?>" style="width:90%;" placeholder="ที่ติดต่อ" /></div>
			    <div>
			    <input class="form-control" type="text" name="c_tel[]" value="<?=@$row['tel']?>" style="width:180px;" placeholder="โทรศัพท์" />
			    <input class="form-control" type="text" name="c_fax[]" value="<?=@$row['fax']?>" style="width:180px;" placeholder="โทรสาร" />
			    <input class="form-control" type="text" name="c_mobile[]" value="<?=@$row['mobile']?>" style="width:180px;" placeholder="มือถือ" />
			    <input class="form-control" type="text" name="c_email[]" value="<?=@$row['email']?>" style="width:255px;" placeholder="อีเมล์" />
			    </div>
			    <hr>
		    </div>
	    	<?endforeach;?>
	    	<?endif;?>
		    <div class="coordinate_addr">
			    <p>
			    <input name="c_name[]" type="text" class="form-control" style="width:150px;" placeholder="ชื่อ" />
			    <input name="c_surname[]" type="text" class="form-control" style="width:250px;" placeholder="นามสกุล" />
			    <input name="c_education[]" type="text" class="form-control" style="width:350px;" placeholder="วุฒิ" />
			    </p>
			    <p>
			    <input name="c_experience[]" type="text" class="form-control" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
			    <input name="c_location[]" type="text" class="form-control" style="width:405px;" placeholder="สถานที่ทำงาน" />
			    </p>
			    <p><input name="c_address[]" type="text" class="form-control" style="width:100%;" placeholder="ที่ติดต่อ" /></p>
			    <p>
			    <input name="c_tel[]" type="text" class="form-control" style="width:180px;" placeholder="โทรศัพท์" />
			    <input name="c_fax[]" type="text" class="form-control" style="width:180px;" placeholder="โทรสาร" />
			    <input name="c_mobile[]" type="text" class="form-control" style="width:180px;" placeholder="มือถือ" />
			    <input name="c_email[]" type="text" class="form-control" style="width:255px;" placeholder="อีเมล์" />
			    </p>
			    <hr>
		    </div>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ที่ปรึกษา</label>
		    <div class="form-inline col-sm-10"><p>ที่มีความรู้เกี่ยวกับสวัสดิการชุมชน <input class="form-control" name="adviser" type="text" style="width:50px;" readonly="readonly" value="1"> คน <img class="add_adviser_btn" src="themes/msosocial/images/btn_add.png" width="24" height="24" class="vtip" title="เพิ่มที่ปรึกษา" style="cursor:pointer;" /></p>
		    	<?if(@is_array($adviser)):?>
		    	<?foreach($adviser as $key=>$row):?>
		    	<div class="adviser_addr" style="margin: 15px 0; position: relative;">
		    		<img class="remove_adviser_btn" src="themes/msosocial/images/remove2.png" width="16" height="16" title="ลบที่ปรึกษา" style="cursor:pointer; position: absolute; right: 10px; top: 0;" />
			    	<div> <!--๑)-->
				    <input class="form-control" type="text" name="a_name[]" value="<?=@$row['name']?>" style="width:150px;" placeholder="ชื่อ" />
				    <input class="form-control" type="text" name="a_surname[]" value="<?=@$row['surname']?>" style="width:250px;" placeholder="นามสกุล" />
				    <input class="form-control" type="text" name="a_education[]" value="<?=@$row['surname']?>" style="width:350px;" placeholder="วุฒิ" />
				    </div>
				    <div>
				    <input class="form-control" type="text" name="a_experience[]" value="<?=@$row['experience']?>" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
				    <input class="form-control" type="text" name="a_location[]" value="<?=@$row['location']?>" style="width:405px;" placeholder="สถานที่ทำงาน" />
				    </div>
				    <div>
				    <input class="form-control" type="text" name="a_address[]" value="<?=@$row['address']?>" style="width:90%;" placeholder="ที่ติดต่อ" /></div>
				    <div>
				    <input class="form-control" type="text" name="a_tel[]" value="<?=@$row['tel']?>" style="width:180px;" placeholder="โทรศัพท์" />
				    <input class="form-control" type="text" name="a_fax[]" value="<?=@$row['fax']?>" style="width:180px;" placeholder="โทรสาร" />
				    <input class="form-control" type="text" name="a_mobile[]" value="<?=@$row['mobile']?>" style="width:180px;" placeholder="มือถือ" />
				    <input class="form-control" type="text" name="a_email[]" value="<?=@$row['mobile']?>" style="width:255px;" placeholder="อีเมล์" />
				    </div>
				    <hr>
			    </div>
		    	<?endforeach;?>
		    	<?endif;?>
			    <div class="adviser_addr">
			    <p>
			    <input name="a_name[]" type="text" class="form-control" style="width:150px;" placeholder="ชื่อ" />
			    <input name="a_surname[]" type="text" class="form-control" style="width:250px;" placeholder="นามสกุล" />
			    <input name="a_education[]" type="text" class="form-control" style="width:350px;" placeholder="วุฒิ" />
			    </p>
			    <p>
			    <input name="a_experience[]" type="text" class="form-control" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
			    <input name="a_location[]" type="text" class="form-control" style="width:405px;" placeholder="สถานที่ทำงาน" />
			    </p>
			    <p><input name="a_address[]" type="text" class="form-control" style="width:100%;" placeholder="ที่ติดต่อ" /></p>
			    <p>
			    <input name="a_tel[]" type="text" class="form-control" style="width:180px;" placeholder="โทรศัพท์" />
			    <input name="a_fax[]" type="text" class="form-control" style="width:180px;" placeholder="โทรสาร" />
			    <input name="a_mobile[]" type="text" class="form-control" style="width:180px;" placeholder="มือถือ" />
			    <input name="a_email[]" type="text" class="form-control" style="width:255px;" placeholder="อีเมล์" />
			    </p>
			    <hr>
			    </div>
		    </div>
		  </div>
          
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >ทำขั้นตอนถัดไป (3)</button>
        </div>
      </div>
    </div>
    </div>
    <!------- จบขั้นตอนที่ 2 ------->
    
    <!------- ขั้นตอนที่ 3 ------->
    <div class="row setup-content" id="step-3">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h3> Step 3</h3>
          
          <h4 style="margin-top:0; color:#393">ลักษณะข้อมูลทั่วไปขององค์กร (3)</h4>
          <div class="form-group">
		    <label class="col-sm-2 control-label">รูปแบบวิธีการดำเนินงานจัดสวัสดิการชุมชน<span class="vald">*</span></label>
		    <div class="col-sm-8">
		    	<textarea name="method" cols="" rows="5" class="form-control" placeholder="ระบุรูปแบบวิธีการดำเนินงานจัดสวัสดิการชุมชน"><?=@$rs['method']?></textarea>
		    </div>
		  </div> 
		  
		<div class="form-group">
		    <label class="col-sm-2 control-label">บริการสวัสดิการที่จัดให้แก่สมาชิก</label>
		    <div class="form-inline col-sm-10"><p>จำนวน <input name="service_member" type="text" class="form-control" style="width:50px;" readonly="readonly" value="1" class="valid"> เรื่อง <img class="add_service_member_btn" src="themes/msosocial/images/btn_add.png" width="24" height="24" title="เพิ่มสวัสดีการ" style="cursor:pointer;"></p>
		    	<?if(@is_array($service)):?>
				<?foreach($service as $row):?>
				<div class="service_member_addr" style="margin: 15px 0; position: relative;">
		    		<img class="remove_service_member_btn" src="themes/msosocial/images/remove2.png" width="16" height="16" title="ลบที่ปรึกษา" style="cursor:pointer; position: absolute; right: 10px; top: 0;" />
				<input type="text" class="form-control" style="width:350px;" name="m_target[]" value="<?=@$row['target']?>" placeholder="กลุ่มเป้าหมาย">
				<input type="text" class="form-control" style="width:350px;" name="m_receive[]" value="<?=@$row['receive']?>" placeholder="สิ่งที่ได้รับ">
				<input type="text" class="form-control" style="width:350px;" name="m_condition[]" value="<?=@$row['condition']?>" placeholder="เงื่อนไข">
				<input type="text" class="form-control" style="width:350px;" name="m_other[]" value="<?=@$row['other']?>" placeholder="อื่นๆ">
				</div>
				<hr>
				<?endforeach;?>
				<?endif;?>
			    <div class="service_member_addr">
			    <p>
			    <input name="m_target[]" type="text" class="form-control" style="width:350px;" placeholder="กลุ่มเป้าหมาย" />
			    <input name="m_receive[]" type="text" class="form-control" style="width:350px;" placeholder="สิ่งที่ได้รับ" />
			    </p>
			    <p>
			    <input name="m_condition[]" type="text" class="form-control" style="width:350px;" placeholder="เงื่อนไข" />
			    <input name="m_other[]" type="text" class="form-control" style="width:350px;" placeholder="อื่นๆ" />
			    </p>
			    <hr>
			    </div>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">สถานการเงินขององค์กรสวัสดิการชุมชน</label>
		    <div class="form-inline col-sm-10">
		    <p>
		    	<input name="s_budget" value="<?=@$rs['s_budget']?>" type="text" class="form-control numDecimal" style="width:150px;" placeholder="จำนวน"> บาท  
		    	<input name="s_date" value="<?=@$rs['s_date']?>" type="text" class="form-control fdate dateInput" placeholder="" style="width:100px;margin-right:5px;"> </p>
			<p>เงินทุนที่มาจากสมาชิก  <input name="s_member" value="<?=@$rs['s_member']?>" type="text" class="form-control numDecimal" style="width:150px;" placeholder="จำนวน"> บาท</p>
		   <p>เงินสมทบภายนอก (องค์กรปกครองส่วนท้องถิ่น)  <input name="s_local" value="<?=@$rs['s_local']?>" type="text" class="form-control numDecimal" style="width:150px;" placeholder="จำนวน"> บาท</p>
		   <p>เงินสมทบภายนอก (หน่วยงานอื่นๆ)  <input name="s_other" value="<?=@$rs['s_other']?>" type="text" class="form-control numDecimal" style="width:150px;" placeholder="จำนวน"> บาท</p>
		   <p>เงินอื่นๆ <input name="s_other2" value="<?=@$rs['s_other2']?>" type="text" class="form-control numDecimal" style="width:150px;" placeholder="จำนวน"> บาท</p>
		   <p><textarea name="s_note" cols="" rows="5" class="form-control" placeholder="แหล่งเงินได้จาก (ระบุที่มา/กิจกรรม เช่น ดอกผล)" style="width:600px;"><?=@$rs['s_note']?></textarea></p>
		    </div>
		  </div>
		  
		  
		<div class="form-group">
		    <label class="col-sm-2 control-label">อื่นๆ</label>
		    <div class="col-sm-8">
		    	<textarea name="other_note" cols="" rows="5" class="form-control" placeholder="ระบุอื่นๆ"><?=@$rs['other_note']?></textarea>
		    </div>
		  </div> 
		  <input type="hidden" name="edit_code" value="">
		  <input type="hidden" name="id" value="<?=@$rs['id']?>">
          <input type="hidden" name="current_status" value="ยื่นใหม่">
          <input type="hidden" name="post_form" value="fund02">
          <button class="btn btn-success btn-lg pull-right" type="submit">ยื่นจดทะเบียนองค์กร</button>
        </div>
      </div>
    </div>
    <!------- จบขั้นตอนที่ 3 ------->
    
</form>
  

<script type="text/javascript">
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
  
});
  </script>
  

<link rel="stylesheet" type="text/css" href="media/css/jquery-ui-1.7.2.custom.css">
<style type="text/css">
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
.ui-datepicker{
	width:200px;
	font-family:tahoma;
	font-size:12px;
	text-align:center;
}
</style>

<script type="text/javascript" src="media/js/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	var dateBefore=null;
	$(".dateInput").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'both',
		buttonImage: 'media/ico_calendar.png',
		buttonImageOnly: true,
		dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
		monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		changeMonth: true,
		changeYear: true ,
		beforeShow:function(){
			if($(this).val()!=""){
				var arrayDate=$(this).val().split("-");		
				arrayDate[2]=parseInt(arrayDate[2])-543;
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
			}
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);

		},
		onChangeMonthYear: function(){
			setTimeout(function(){
				$.each($(".ui-datepicker-year option"),function(j,k){
					var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
					$(".ui-datepicker-year option").eq(j).text(textYear);
				});				
			},50);		
		},
		onClose:function(){
			if($(this).val()!="" && $(this).val()==dateBefore){			
				var arrayDate=dateBefore.split("-");
				arrayDate[2]=parseInt(arrayDate[2])+543;
				$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);	
			}		
		},
		onSelect: function(dateText, inst){ 
			dateBefore=$(this).val();
			var arrayDate=dateText.split("-");
			arrayDate[2]=parseInt(arrayDate[2])+543;
			$(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
		}

	});
	
	
	// select จังหวัด อำเภอ ตำบล
	$("select[name='province_code']").live("change",function(){
		select_name = 'ampor_code';
		province_code = $(this).val();
		ajax_ampor(select_name,$("#ampor"),province_code);
	});
	
	$("select[name='ampor_code']").live("change",function(){
		select_name = 'tumbon_code';
		province_code = $('select[name=province_code]').val();
		ampor_code = $(this).val();
		ajax_tumbon(select_name,$("#tumbon"),province_code,ampor_code);
	});
	
	$("select[name='b_province_code']").live("change",function(){
		select_name = 'b_ampor_code';
		province_code = $(this).val();
		ajax_ampor(select_name,$("#b_ampor"),province_code);
	});
	
	$("select[name='b_ampor_code']").live("change",function(){
		select_name = 'b_tumbon_code';
		province_code = $('select[name=b_province_code]').val();
		ampor_code = $(this).val();
		ajax_tumbon(select_name,$("#b_tumbon"),province_code,ampor_code);
	});
	
	// checkbox selected
	$('.td_chkboxType2 input[type=checkbox]').change(function(){
		if(this.checked){
			$(this).closest('span').find('input').removeAttr('disabled');
		}else{
			$(this).closest('span').find('input').slice(1).attr('disabled','disabled');
		}
	});
    
    $('.chkboxselected').change(function(){
		var selected_text = $(this).closest('span').text();
		var selected_id = $(this).val();
		var select_type = $(this).attr('name');
			
		if(this.checked){
			var count_element = $(this).closest('tr').find('.tb_selected_place tr').length + 1;
			var ele = '<tr class="target_'+selected_id+'"><td style="width:10%">'+count_element+'</td><td style="width:30%">'+selected_text+'</td><td style="width:40%"><input type="text" name="other[]" style="width:350px;"><input type="hidden" name="answer_id[]" value="'+selected_id+'"><input type="hidden" name="question_name[]" value="'+select_type+'"></td><td style="width:10%"></td></tr>';
			$(this).closest('td').find('.tb_selected_place').append(ele);
		}else{
			$(this).closest('td').find('.tb_selected_place').find('.target_'+selected_id).remove();
		}
	});
	
	// checkbox selected
	$( "input[type=hidden][name=answer_id[]]" ).each(function( index ) {
	  // console.log( index + ": " + $( this ).val() );
	  var inputval = $( this ).val();
	  $(this).closest('td.td_targetgroup').find('input[name=service_com]').filter(function(){return this.value==inputval}).attr('checked','checked');
	});
	
	// ที่ปรึกษา
	adviser_count();
	
	$('.add_adviser_btn').click(function(){
		var e = $('.adviser_addr:first');
	    e.clone().find("input:text").val("").end().insertAfter($('.adviser_addr:last'));
	    $('.remove_adviser_btn:not(:first)').show();
	    adviser_count();
	});
	
	
	$('.remove_adviser_btn:first').hide();
	
	$('.remove_adviser_btn').live('click',function(){
		$(this).closest('.adviser_addr').fadeOut( function() { 
			$(this).remove(); 
			adviser_count();
		});
	});
	
	
	// ผู้ประสานงาน
	coordinate_count();
	
	$('.add_coordinate_btn').click(function(){
		var e = $('.coordinate_addr:first');
	    e.clone().find("input:text").val("").end().insertAfter($('.coordinate_addr:last'));
	    $('.remove_coordinate_btn:not(:first)').show();
	    coordinate_count();
	});
	
	
	$('.remove_coordinate_btn:first').hide();
	
	$('.remove_coordinate_btn').live('click',function(){
		$(this).closest('.coordinate_addr').fadeOut( function() { 
			$(this).remove(); 
			coordinate_count();
		});
	});
	
	
	// ที่ปรึกษา
	service_count();
	
	$('.add_service_member_btn').click(function(){
		var e = $('.service_member_addr:first');
	    e.clone().find("input:text").val("").end().insertAfter($('.service_member_addr:last'));
	    $('.remove_service_member_btn:not(:first)').show();
	    service_count();
	});
	
	
	$('.remove_service_member_btn:first').hide();
	
	$('.remove_service_member_btn').live('click',function(){
		$(this).closest('.service_member_addr').fadeOut( function() { 
			$(this).remove(); 
			service_count();
		});
	});
	
});

function adviser_count(x){
	if(x == 'form_load'){
		var count = $('.adviser_addr').length-1;
	}else{
		var count = $('.adviser_addr').length;
	}
	$('input[name=adviser]').val(count);
}

function coordinate_count(x){
	if(x == 'form_load'){
		var count = $('.coordinate_addr').length-1;
	}else{
		var count = $('.coordinate_addr').length;
	}
	$('input[name=coordinate]').val(count);
}

function service_count(x){
	if(x == 'form_load'){
		var count = $('.service_member_addr').length-1;
	}else{
		var count = $('.service_member_addr').length;
	}
	$('input[name=service_member]').val(count);
}

function ajax_ampor($select_name,$target,$province_code){
	$.post('org/ajax_ampor',{
		'select_name' : $select_name,
		'province_code' : $province_code
	},function(data){
		$target.html(data);
	});
}

function ajax_tumbon($select_name,$target,$province_code,$ampor_code){
	$.post('org/ajax_tumbon',{
		'select_name' : $select_name,
		'province_code': $province_code,
		'ampor_code' : $ampor_code
	},function(data){
		$target.html(data);
	});
}
</script>

<script type="text/javascript" src="media/js/jquery.chainedSelect.min.js"></script>


