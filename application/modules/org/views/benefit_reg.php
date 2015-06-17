<div id="title-blank"> ยื่นจดทะเบียนองค์การสวัสดิการสังคม</div><br>
<h2 style="margin-top:0; color:#CC075F">องค์กรสาธารณประโยชน์</h2>

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
      <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
        <p>Step 5</p>
      </div>
    </div>
  </div>
  
  <form class="form-horizontal" role="form" action="org/benefit_save" method="post" enctype="multipart/form-data">
  	
  	<!------- ขั้นตอนที่ 1 ------->
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
        <div class="col-md-12">
        	
        	
          <h4 style="margin-top:0; color:#393">ข้อมูลองค์กร (1/5)</h4>
          <div class="form-group">
		    <label class="col-sm-2 control-label">ประเภทหน่วยงาน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-5"><span style="padding-right:20px;">
		    	<input type="radio" name="agency_sub_type_id" value="1" required <?php if(@$rs['agency_sub_type_id']==1) echo 'checked';?> /> มูลนิธิ
		    	<input type="radio" name="agency_sub_type_id" value="2" required <?php if(@$rs['agency_sub_type_id']==2) echo 'checked';?> /> สมาคม
		    	<input type="radio" name="agency_sub_type_id" value="3" required <?php if(@$rs['agency_sub_type_id']==3) echo 'checked';?> /> องค์กรภาคเอกชน
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ชื่อ-สกุลผู้ขอยื่นคำขอ <span class="vald">*</span></label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="request_name" value="<?php echo @$rs['request_name']?>" placeholder="ชื่อและสกุลผู้ขอยื่นคำขอ" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ชื่อองค์กร <span class="vald">*</span></label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" name="organ_name" value="<?php echo @$rs['organ_name']?>" placeholder="ชื่อองค์กร" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">วันเดือนปีที่ก่อตั้ง <span class="vald">*</span></label>
		    <div class="form-inline col-sm-4">
		      <input type="text" id="dateInput" class="form-control fdate" name="establish_date" value="<?php echo @stamp_to_th($rs['establish_date'])?>" placeholder="" style="width:100px;margin-right:5px;" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">วัตถุประสงค์ <span class="vald">*</span></label>
		    <div class="col-sm-8">
		    	<textarea name="objective" cols="" rows="5" class="form-control" placeholder="ระบุวัตถุประสงค์" required ><?php echo @$rs['objective']?></textarea>
		    </div>
		  </div> 
		   
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ที่ตั้งสำนักงานใหญ๋ <span class="vald">*</span></label>
		
			<div class="form-inline col-sm-8">
		      <input name="home_no" value="<?php echo @$rs['home_no']?>" type="text" class="form-control numInt" placeholder="เลขที่" style="width:80px;" required> 
		      <input name="moo" value="<?php echo @$rs['moo']?>" type="text" class="form-control numOnly" placeholder="หมู่ที่" style="width:80px;" required>
		      <input name="soi" value="<?php echo @$rs['soi']?>" type="text" class="form-control" placeholder="ตรอก/ซอย" style="width:230px;" required>
		      <input name="road" value="<?php echo @$rs['road']?>" type="text" class="form-control" placeholder="ถนน" style="width:230px;" required>
				<?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    <span id="ampor">
			    <?php echo form_dropdown('ampor_code', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    </span>
			    <span id="tumbon">
			    <?php echo form_dropdown('tumbon_code', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['province_code'].' and ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    </span>
		      <input name="post_code" value="<?php echo @$rs['post_code']?>" type="text" class="form-control fpostel" placeholder="รหัสไปรณีย์" style="width:100px;" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">โทรศัพท์ / โทรสาร / มือถือ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-8">
		      <input name="tel" value="<?php echo @$rs['tel']?>" type="text" class="form-control" placeholder="เบอร์โทรศัพท์" required> / <input name="fax" value="<?php echo @$rs['fax']?>" type="text" class="form-control fphone" placeholder="เบอร์โทรสาร" required> / <input name="mobile" value="<?php echo @$rs['mobile']?>" type="text" class="form-control fmobile" placeholder="เบอร์มือถือ" required>
		    </div>
		  </div>
		
		  <div class="form-group">
		    <label class="col-sm-2 control-label">อีเมล์ / เว็บไซต์ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-8">
		      <input name="email" value="<?php echo @$rs['email']?>" type="text" class="form-control" style="width:300px;" placeholder="ชื่ออีเมล์">  / <input name="website" value="<?php echo @$rs['website']?>" type="text" class="form-control" style="width:300px;" placeholder="ชื่อเว็บไซต์">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">แผนที่ตั้งของสำนักงานใหญ่ <span class="vald">*</span></label>
		    <div class="col-sm-5">
		    	<input type="file" name="UploadFile" id="UploadFile" class="form-control">
		    	<? if(@$rs['filemap']!=''){?>
		    		<a href="uploads/welfare_benefit/map/<?php echo $rs['filemap'];?>" target="_blank"><?php echo $rs['filemap'];?></a>
		    		<input type="hidden" name="hdfilemap" value="<?php echo $rs['filemap'];?>" >
		        <?}?>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">สำนักงานสาขา (ถ้ามี)</label>
		
			<div class="form-inline col-sm-8">
		      <input name="b_home_no" value="<?php echo @$rs['b_home_no']?>" type="text" class="form-control numInt" placeholder="เลขที่" style="width:80px;"> 
		      <input name="b_moo" value="<?php echo @$rs['b_moo']?>" type="text" class="form-control numOnly" placeholder="หมู่ที่" style="width:80px;">
		      <input name="b_soi" value="<?php echo @$rs['b_soi']?>" type="text" class="form-control" placeholder="ตรอก/ซอย" style="width:230px;">
		      <input name="b_road" value="<?php echo @$rs['b_road']?>" type="text" class="form-control" placeholder="ถนน" style="width:230px;">
		      <?php echo form_dropdown('b_province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['b_province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    <span id="b_ampor">
			    <?php echo form_dropdown('b_ampor_code', (empty($rs['b_province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['b_province_code'].' order by ampor_name'), @$rs['b_ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    </span>
			    <span id="b_tumbon">
			    <?php echo form_dropdown('b_tumbon_code', (empty($rs['b_ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['b_province_code'].' and ampor_code = '.$rs['b_ampor_code'].' order by tumbon_name'), @$rs['b_tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    </span>
		      <input name="b_post_code" value="<?php echo @$rs['b_post_code']?>" type="text" class="form-control fpostel" placeholder="รหัสไปรณีย์" style="width:100px;">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">โทรศัพท์ / โทรสาร / มือถือ</label>
		    <div class="form-inline col-sm-8">
		      <input name="b_tel" value="<?php echo @$rs['b_tel']?>" type="text" class="form-control" placeholder="เบอร์โทรศัพท์"> / <input name="b_fax" value="<?php echo @$rs['b_fax']?>" type="text" class="form-control fphone" placeholder="เบอร์โทรสาร"> / <input name="b_mobile" value="<?php echo @$rs['b_mobile']?>" type="text" class="form-control fmobile" placeholder="เบอร์มือถือ">
		    </div>
		
		  </div>
		
		  <div class="form-group">
		    <label class="col-sm-2 control-label">อีเมล์ / เว็บไซต์</label>
		    <div class="form-inline col-sm-8">
		      <input name="b_email" value="<?php echo @$rs['b_email']?>" type="text" class="form-control" style="width:300px;" placeholder="ชื่ออีเมล์">  / <input name="b_website" value="<?php echo @$rs['b_website']?>"  type="text" class="form-control" style="width:300px;" placeholder="ชื่อเว็บไซต์">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">แผนที่ตั้งของสำนักงานสาขา </label>
		    <div class="col-sm-5">
		    	<input type="file" name="UploadFile2" id="UploadFile2" class="form-control">
		    	<? if(@$rs['b_filemap']!=''){?>
		    		<a href="uploads/welfare_community/map/<?php echo $rs['b_filemap'];?>" target="_blank"><?php echo $rs['b_filemap'];?></a>
		    		<input type="hidden" name="hdfilemap2" value="<?php echo $rs['b_filemap'];?>" >
		        <?}?>
		    </div>
		  </div>
		  
		  
		  <div class="form-group" style="margin-left:16%;">
		    <label class="col-sm-12 control-label" style="text-align:left">องค์กรของท่าน มีลักษณะการดำนินงานในรูปแบบการประกอบกิจการเพื่อสังคมเป็นหลัก (Social Enterprise) <span class="vald">*</span></label>
		  </div>
		  <div class="form-group" style="margin-left:18%;">
		    <div class="form-inline col-sm-4">
		    	<span style="padding-right:20px;"><input name="socialnetwork" type="radio" value="มี" <?php echo @$rs['socialnetwork'] == 'มี' ? 'checked=checked' : '' ;?> /> มี</span>
		    	<input name="socialnetwork" type="radio" value="ไม่มี" <?php echo @$rs['socialnetwork'] == 'ไม่มี' ? 'checked=checked' : '' ;?> /> ไม่มี 
		    </div>
		  </div>
		  
		  
		  <div class="form-group" style="margin-left:16%;">
		    <label class="col-sm-12 control-label" style="text-align:left">แนบเอกสารหลักฐาน มาเพื่อประกอบการพิจารณา ดังนี้ <span class="vald">*</span></label>
		  </div>
		  <div class="form-group" style="margin-left:18%;">
		    <div class="form-inline col-sm-12">
		    <div class="dvTipFile">ข้อมูลเอกสารจะแสดง เมื่อท่านได้เลือกประเภทหน่วยงานแล้ว</div>
		    <div class="dvType1">
		    <p>(๑) สำเนาทะเบียนบ้าน และสำเนาบัตรประชาชน หรือสำเนาบัตรประจำตัวเจ้าหน้าที่ของรัฐที่มีคำรับรองว่าถูกต้อง</p>
		    <p>(๒) สำเนาข้อบังคับ หรือระเบียบ หรือตราสาร และสำเนาใบอนุญาตจัดตั้งมูลนิธิ หรือสมาคม</p>
		    <p>(๓) รายชื่อคณะกรรมการของมูลนิธิ หรือสมาคม</p>
		    <p>(๔) สำเนางบดุล หรือสำเนารายงานการเงินของมูลนิธิ หรือสมาคม</p>
		    <p>(๕) แผนงานโครงการของมูลนิธิ หรือสมาคม</p>
		    <p>(๖) ผลการดำเนินงานในระยะเวลาไม่น้อยกว่าหกเดือน</p>
		    </div>
		    
		    <div class="dvType2">
		    <p>(๑) สำเนาทะเบียนบ้าน และสำเนาบัตรประชาชน หรือสำเนาบัตรประจำตัวเจ้าหน้าที่ของรัฐที่มีคำรับรองว่าถูกต้อง</p>
		    <p>(๒) สำเนาข้อบังคับ หรือระเบียบองค์กรภาคเอกชน และรายชื่อคณะกรรมการขององค์กรภาคเอกชน</p>
		    <p>(๓) รายชื่อคณะกรรมการขององค์กรภาคเอกชน</p>
		    <p>(๔) สำเนารายงานการเงินซึ่งประธานกรรมการ หรือหัวหน้าผู้บริหารให้คำรับรอง</p>
		    <p>(๕) แผนงานโครงการขององค์กรภาคเอกชน</p>
		    <p>(๖) ผลการดำเนินงานในระยะเวลาไม่น้อยกว่าหนึ่งปี</p>
		    <p>(๗) หนังสือรับรองผลการดำเนินงานด้านการจัดสวัสดิการสังคมในกรณีองค์กรภาคเอกชนมิได้เป็นนิติบุคคล</p>
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
		    <input type="file" name="filesToUpload[]" id="multifileInput" multiple="multiple" class="form-control" onchange="javascript:updateList()"><br>
			<div id="fileList"></div>
		    <?if(@is_array($doc)):?>
		    	<?foreach($doc as $key=>$row):?>
		    	<?php echo $key+1?>. <a href="uploads/welfare_benefit/doc/<?php echo $row['files']?>" target="_blank"><?php echo $row['files']?></a><br>
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
          <h4 style="margin-top:0; color:#393">ข้อมูลบุคลากรภายในองค์กร (2/5)</h4>
          
          
          <div class="form-group">
		    <label class="col-sm-2 control-label">จำนวนบุคลากรในการปฎิบัติงานที่ได้รับเงินเดือน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10 section">
		      <p>วุฒิต่ำกว่าปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="salary_1" value="<?php echo @$rs['salary_1']?>" /> <span class="padR20">คน</span> 
		      วุฒิปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="salary_2" value="<?php echo @$rs['salary_2']?>" /> <span class="padR20">คน</span> 
		      วุฒิสูงกว่าปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="salary_3" value="<?php echo @$rs['salary_3']?>"/> <span class="padR20">คน</span> </p>
		      ได้รับปริญญาทางสังคมสงเคราะห์ศาสตร์ <input type="text" class="form-control input" style="width:60px;" name="salary_4" value="<?php echo @$rs['salary_4']?>" /> <span class="padR20">คน</span> รวมบุคลากร <input type="text" class="form-control total" style="width:80px;" readonly="readonly" name="salary_total" value="<?php echo @$rs['salary_total']?>" /> คน
		      </div>
		  	</div>
		    
		    <div class="form-group">
		    <label class="col-sm-2 control-label">จำนวนอาสาสมัครในการปฎิบัติ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10 section">
		      <p>ปฎิบัติงานประจำ ::: วุฒิต่ำกว่าปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="volunteer_1" value="<?php echo @$rs['volunteer_1']?>" /> <span class="padR20">คน</span> 
		      วุฒิปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="volunteer_2" value="<?php echo @$rs['volunteer_2']?>"/> <span class="padR20">คน</span> 
		      วุฒิสูงกว่าปริญญาตรี <input type="text" class="form-control input" style="width:60px;" name="volunteer_3" value="<?php echo @$rs['volunteer_3']?>"/> <span class="padR20">คน</span> </p>
		      <p>ปฎิบัติงานไม่ประจำ <input type="text" class="form-control input" style="width:60px;" name="volunteer_4" value="<?php echo @$rs['volunteer_4']?>"/> <span class="padR20">คน</span>
		       รวมอาสาสมัคร <input type="text" class="form-control total" style="width:80px;" readonly="readonly" name="volunteer_total" value="<?php echo @$rs['volunteer_total']?>" /> คน</p>
		      </div>
		  	</div>
		
		  <div class="form-group">
		    <label class="col-sm-2 control-label">ที่ปรึกษา</label>
		    <div class="form-inline col-sm-10">
		    	ที่มีความรู้เกี่ยวกับการจัดสวัสดิการสังคมและสังคมสงเคราะห์ 
		    	<input name="adviser" class="form-control" type="text" style="width:50px;" readonly="readonly" value="1"> คน <img class="add_adviser_btn" src="themes/msosocial/images/btn_add.png" width="24" height="24" title="เพิ่มที่ปรึกษา" style="cursor:pointer;"> <br><br>
		    	<?if(@is_array($adviser)):?>
		    	<?foreach($adviser as $key=>$row):?>
		    	<div class="adviser_addr" style="margin: 15px 0; position: relative;">
		    		<img class="remove_adviser_btn" src="themes/msosocial/images/remove2.png" width="16" height="16" title="ลบที่ปรึกษา" style="cursor:pointer; position: absolute; right: 10px; top: 0;" />
			    	<div> <!--๑)-->
				    <input class="form-control" type="text" name="a_name[]" value="<?php echo @$row['name']?>" style="width:150px;" placeholder="ชื่อ" />
				    <input class="form-control" type="text" name="a_surname[]" value="<?php echo @$row['surname']?>" style="width:250px;" placeholder="นามสกุล" />
				    <input class="form-control" type="text" name="a_education[]" value="<?php echo @$row['surname']?>" style="width:350px;" placeholder="วุฒิ" />
				    </div>
				    <div>
				    <input class="form-control" type="text" name="a_experience[]" value="<?php echo @$row['experience']?>" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
				    <input class="form-control" type="text" name="a_location[]" value="<?php echo @$row['location']?>" style="width:405px;" placeholder="สถานที่ทำงาน" />
				    </div>
				    <div>
				    <input class="form-control" type="text" name="a_address[]" value="<?php echo @$row['address']?>" style="width:90%;" placeholder="ที่ติดต่อ" /></div>
				    <div>
				    <input class="form-control" type="text" name="a_tel[]" value="<?php echo @$row['tel']?>" style="width:180px;" placeholder="โทรศัพท์" />
				    <input class="form-control" type="text" name="a_fax[]" value="<?php echo @$row['fax']?>" style="width:180px;" placeholder="โทรสาร" />
				    <input class="form-control" type="text" name="a_mobile[]" value="<?php echo @$row['mobile']?>" style="width:180px;" placeholder="มือถือ" />
				    <input class="form-control" type="text" name="a_email[]" value="<?php echo @$row['mobile']?>" style="width:255px;" placeholder="อีเมล์" />
				    </div>
				    <hr>
			    </div>
		    	<?endforeach;?>
		    	<?endif;?>
		    <div class="adviser_addr" style="margin: 25px 0; position: relative;">
			<img class="remove_adviser_btn" src="themes/msosocial/images/remove2.png" width="16" height="16" title="ลบที่ปรึกษา" style="cursor:pointer; position: absolute; right: 10px; top: 0;" />
		    <p>
		    <input type="text" class="form-control" name="a_name[]" style="width:150px;" placeholder="ชื่อ" />
		    <input type="text" class="form-control" name="a_surname[]" style="width:250px;" placeholder="นามสกุล" />
		    <input type="text" class="form-control" name="a_education[]" style="width:350px;" placeholder="วุฒิ" />
		    </p>
		    <p>
		    <input type="text" class="form-control" name="a_experience[]" style="width:400px;" placeholder="ประสบการณ์ทำงาน" />
		    <input type="text" class="form-control" name="a_location[]" style="width:405px;" placeholder="สถานที่ทำงาน" />
		    </p>
		    <p><input type="text" class="form-control" name="a_address[]" style="width:100%;" placeholder="ที่ติดต่อ" /></p>
		    <p>
		    <input type="text" class="form-control" name="a_tel[]" style="width:180px;" placeholder="โทรศัพท์" />
		    <input type="text" class="form-control" name="a_fax[]" style="width:180px;" placeholder="โทรสาร" />
		    <input type="text" class="form-control" name="a_mobile[]" style="width:180px;" placeholder="มือถือ" />
		    <input type="text" class="form-control" name="a_email[]" style="width:255px;" placeholder="อีเมล์" />
		    </p>
		    <hr>
		    </div>
		    
		    </div>
		  </div>
          
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >ทำขั้นตอนถัดไป (3)</button>
        </div>
      </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('.input').keyup(function(){
			var ele = this.closest('.section');
			var sum = 0;
		     $(ele).find("input.input").each(function () {
		         if (!isNaN(this.value) && this.value.length != 0) {
		             sum += parseFloat(this.value);
		         }
		     });
		     $(ele).find("input.total").val(sum);
		});
		
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
	});	
	
	function adviser_count(x){
		if(x == 'form_load'){
			var count = $('.adviser_addr').length-1;
		}else{
			var count = $('.adviser_addr').length;
		}
		$('input[name=adviser]').val(count);
	}
	</script>
    <!------- จบขั้นตอนที่ 2 ------->
    
    <!------- ขั้นตอนที่ 3 ------->
    <div class="row setup-content" id="step-3">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h4 style="margin-top:0; color:#393">ลักษณะข้อมูลทั่วไปขององค์กร (3/5)</h4>
          <div class="form-group td_targetgroup">
		    <label class="col-sm-2 control-label">กลุ่มเป้าหมายในการจัดสวัสดิการสังคม (กรุณาเรียงลำดับความสำคัญ 3 ลำดับแรก) <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p>
		    	<?foreach($target_groups as $row):?>
		    	<span style="display:inline-block; width:350px;">
		    		<input class="chkboxselected" name="target" type="checkbox" value="<?php echo $row->target_id?>"/> <?php echo $row->target_name?>
		    	</span>
		    	<?endforeach;?>
			</p>
		    
		    <table class="table tbweblist">
		    <tr>
		    <th>ลำดับ</th>
		    <th>ชื่อกลุ่มเป้าหมายฯ</th>
		    <th>รายละเอียด</th>
		    </tr>
		    <tbody class="tb_selected_place">
	    	<?if(@$rs['id'] > "0"):?>
	    		<?php foreach($targetgroup_select as $key=>$row):?>
		    	<tr class="target_<?php echo $row['answer_id']?>">
		    		<td style="width:10%"><?php echo $key+1?></td>
		    		<td style="width:30%"><?php echo act_get_target_group_name($row['answer_id'])?></td>
		    		<td style="width:40%">
		    			<input type="text" name="other[]" value="<?php echo $row['other']?>" style="width:350px;" class="form-control">
		    			<input type="hidden" name="answer_id[]" value="<?php echo $row['answer_id']?>">
		    			<input type="hidden" name="question_name[]" value="<?php echo $row['question_name']?>">
		    		</td>
		    	</tr>
		    	<?php endforeach;?>
	    	<?endif;?>
	    	</tbody>
		    </table>
		    
		    <span style="margin-left:240px;"></span></p> 
		  	</div>
		  </div>
		    
		  <div class="form-group td_service">
		    <label class="col-sm-2 control-label">สาขาในการจัดสวัสดิการสังคม (กรุณาเรียงลำดับความสำคัญ 3 ลำดับแรก) <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p>
		    	<?php foreach($services as $row):?>
		    		<span style="display:inline-block; width:350px;"><input class="chkboxselected" name="service" value="<?php echo $row->service_id?>" type="checkbox" />
<?php echo $row->service_name?> </span>
		    	<?php endforeach;?>
		    </p>
		    
		    <table class="table tbweblist">
		    <tr>
		    <th>ลำดับ</th>
		    <th>ชื่อสาขาฯ</th>
		    <th>รายละเอียด</th>
		    </tr>
		    <tbody class="tb_selected_place">
		  	<?if(@$rs['id'] > "0"):?>
			  	<?php foreach($service_select as $key=>$row):?>
		    	<tr class="target_<?php echo $row['answer_id']?>">
		    		<td style="width:10%"><?php echo $key+1?></td>
		    		<td style="width:30%"><?php echo act_get_service_name($row['answer_id'])?></td>
		    		<td style="width:40%">
		    			<input type="text" name="other[]" value="<?php echo $row['other']?>" style="width:350px;" class="form-control">
		    			<input type="hidden" name="answer_id[]" value="<?php echo $row['answer_id']?>">
		    			<input type="hidden" name="question_name[]" value="<?php echo $row['question_name']?>">
		    		</td>
		    		<td style="width:10%"></td>
		    	</tr>
		    	<?php endforeach;?>
	    	<?endif;?>
		  </tbody>
		    </table>
		    <span style="margin-left:140px;"></span></p> 
		  	</div>
		  	</div>
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >ทำขั้นตอนถัดไป (4)</button>
        </div>
      </div>
    </div>
    <!------- จบขั้นตอนที่ 3 ------->
    
    <!------- ขั้นตอนที่ 4 ------->
    <div class="row setup-content" id="step-4">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h4 style="margin-top:0; color:#393">ลักษณะข้อมูลทั่วไปขององค์กร (4/5)</h4>
          
          <div class="form-group td_process">
		    <label class="col-sm-2 control-label">ลักษณะการดำเนินงาน (กรุณาเรียงลำดับความสำคัญ 3 ลำดับแรก) <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p>
		    	<?foreach($processes as $row):?>
		    	<span style="display:inline-block; width:200px;"><input class="chkboxselected" name="process" type="checkbox" value="<?php echo $row->process_id?>" /> <?php echo $row->process_name?></span>
		    	<?endforeach;?>
			</p>
		    
		    <table class="table tbweblist">
		    <tr>
		    <th>ลำดับ</th>
		    <th>ชื่อลักษณะการดำเนินงาน</th>
		    <th>รายละเอียด</th>
		    </tr>
		    <tbody class="tb_selected_place">
		  	<?if(@$rs['id'] > "0"):?>
				<?php foreach($process_select as $key=>$row):?>
		    	<tr class="target_<?php echo $row['answer_id']?>">
		    		<td style="width:10%"><?php echo $key+1?></td>
		    		<td style="width:30%"><?php echo act_get_process_name($row['answer_id'])?></td>
		    		<td style="width:40%">
		    			<input type="text" name="other[]" value="<?php echo $row['other']?>" style="width:350px;" class="form-control">
		    			<input type="hidden" name="answer_id[]" value="<?php echo $row['answer_id']?>">
		    			<input type="hidden" name="question_name[]" value="<?php echo $row['question_name']?>">
		    		</td>
		    		<td style="width:10%"></td>
		    	</tr>
		    	<?php endforeach;?>
	    	<?endif;?>
		  </tbody>
		    </table>
		  	</div>
		  	</div>
		    
		    <div class="form-group">
		    <label class="col-sm-2 control-label">รูปแบบการให้บริการ <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p class="td_chkboxType2">
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
		    	<?php foreach($service_types as $row):?>
		    	<?@$searchkey = searchForId($row->service_type_id, $service_type_select);?>
		    		<span style="padding-right:20px;">
		    			<input name="answer_id[]" type="checkbox" value="<?php echo $row->service_type_id?>" <?php echo is_numeric($searchkey) ? 'checked' : '' ;?>/> <?php echo $row->service_type_name?> 
		    			<input name="other[]" type="text" style="width:500px;" class="form-control" value="<?php echo @$service_type_select[$searchkey]['other']?>" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?> placeholder="ระบุ รายละเอียด"/> 
						<input name="question_name[]" type="hidden" value="service_type" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>>
		    		</span><br><br>
		    	<?php endforeach;?>
		  	</div>
		  	</div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">วิธีการดำเนินงาน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p class="td_chkboxType2">
		    	<?php foreach($methods as $row):?>
		    	<?@$searchkey = searchForId($row->method_id, $method_select);?>
		    	<span style="padding-right:20px;">
		    		<input name="answer_id[]" type="checkbox" value="<?php echo $row->method_id?>" <?php echo is_numeric($searchkey) ? 'checked' : '' ;?>> <?php echo $row->method_name?> 
		    		<input name="other[]" type="text" class="form-control" style="width:500px;" value="<?php echo @$method_select[$searchkey]['other']?>" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?> placeholder="ระบุ รายละเอียด"/> 
		    		<input name="question_name[]" type="hidden" value="method" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/>
		    	</span><br><br>
		    	<?php endforeach;?>
		    </p>
		 
		  	</div>
		  	</div>
          
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >ทำขั้นตอนถัดไป (5)</button>
        </div>
      </div>
    </div>
    <!------- จบขั้นตอนที่ 4 ------->
    
    <!------- ขั้นตอนที่ 5 ------->
    <div class="row setup-content" id="step-5">
      <div class="col-xs-12">
        <div class="col-md-12">
        	
          <h4 style="margin-top:0; color:#393">ลักษณะข้อมูลทั่วไปขององค์กร (5/5)</h4>
          <div class="form-group">
		    <label class="col-sm-2 control-label">การดำเนินงาน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p>มีการส่งเสริมและสนับสนุนให้บุคคล ครอบครัว ชุมชน องค์กรปกครองส่วนท้องถิ่น องค์กรวิชาชีพ สถาบันศาสนา และองค์กรอื่นให้มีส่วนร่วมในการจัดสวัสดิการสังคมหรือไม่</p>
		    <p class="td_chkboxType2">
		    	<?php foreach($promotes as $row):?>
		    	<?@$searchkey = searchForId($row->promote_id, $promote_select);?>
				<span style="padding-right:20px;">
					<input name="answer_id[]" type="checkbox" value="<?php echo $row->promote_id?>" <?php echo is_numeric($searchkey) ? 'checked' : '' ;?>> <?php echo $row->promote_name?>  
					<input name="other[]" type="text" class="form-control" style="width:500px;" value="<?php echo @$promote_select[$searchkey]['other']?>" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?> placeholder="ระบุ รายละเอียด"/> 
					<input name="question_name[]" type="hidden" value="promote" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/>
				</span><br><br>
		    	<?php endforeach;?>
		    </p>
		   
		  	</div>
		  	</div>
		    
		    <div class="form-group">
		    <label class="col-sm-2 control-label">การประกอบกิจการเพื่อสังคม <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		    <p>กรณีที่องค์กรสาธารณประโยชน์มีการดำเนินงานในลักษณะการประกอบกิจการเพื่อสังคม (Social Enterprise) คือ การมีกิจกรรมหารายได้มาใช้ในการดำเนินงานขององค์กร แต่ไม่ได้มีการนำผลประโยชน์ที่ได้มาแบ่งปันกันในหมู่ผู้ประกอบการ แต่นำมาใช้ในกิจกรรมเพื่อสาธารณะตามวัตถุประสงค์ขององค์กร ขอให้ระบุรายละเอียด</p>
		    <p class="td_chkboxType2">
		    	<?php foreach($socials as $row):?>
		    	<?@$searchkey = searchForId($row->social_id, $social_select);?>
		    	<span>
		    		<input name="answer_id[]" type="checkbox" value="<?php echo $row->social_id?>" <?php echo is_numeric($searchkey) ? 'checked' : '' ;?>> <?php echo $row->social_name?> 
		    		<input name="other[]" type="text" class="form-control" style="width:500px;" value="<?php echo @$social_select[$searchkey]['other']?>" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?> placeholder="ระบุ รายละเอียด"/> 
		    		<input name="question_name[]" type="hidden" value="social" <?php echo is_numeric($searchkey) ? '' : 'disabled="disabled"' ;?>/>
		    	</span><br><br>
		    	<?php endforeach;?>
    		</p>
		    
		  	</div>
		  	</div>
		  
		  <div class="form-group">
		    <label class="col-sm-2 control-label">พื้นที่ปฎิบัตงาน <span class="vald">*</span></label>
		    <div class="form-inline col-sm-10">
		        <p><select name="location_type" id="select" class="form-control">
		      	<option>-- เลือกพื้นที่ปฎิบัติงานระดับ --</option>
		        <option value="จังหวัด">จังหวัด</option>
		        <option value="อำเภอ">อำเภอ</option>
		        <option value="ตำบล">ตำบล</option>
		        <option value="หมู่บ้าน">หมู่บ้าน</option>
		      </select></p>
		      <?php echo form_dropdown('lo_province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    <span id="lo_ampor">
			    <?php echo form_dropdown('lo_ampor_code', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    </span>
			    <span id="lo_tumbon">
			    <?php echo form_dropdown('lo_tumbon_code', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    </span>
				<input type="text" name="mooban" class="form-control" placeholder="หมู่บ้าน" style="width:200px;"> <img class="location_add_btn" src="themes/msosocial/images/btn_add.png" width="24" height="24" style="cursor:pointer;" />
		      
		      <table id="locationList" class="table tbweblist">
		        <tr>
			    <th>#</th>
			    <th>พื้นที่ปฎิบัติงานระดับ</th>
			    <th>รายละเอียด</th>
			    </tr>
			    <?if(@is_array($location)):?>
				<?foreach($location as $key=>$row):?>
				<tr>
				    <td><?php echo $key+1?></td>
				    <td><?php echo $row['type']?></td>
				    <td>
				    	<?php echo $row['province']?> <?php echo $row['ampor']?> <?php echo $row['tumbon']?> <?php echo $row['mooban']?>
				    	<input type='hidden' name='location_type[]' value='<?php echo $row['type']?>'>
				    	<input type='hidden' name='location_province[]' value='<?php echo $row['province_code']?>'>
				    	<input type='hidden' name='location_ampor[]' value='<?php echo $row['ampor_code']?>'>
				    	<input type='hidden' name='location_tumbon[]' value='<?php echo $row['tumbon_code']?>'>
				    	<input type='hidden' name='location_province_text[]' value='<?php echo $row['province']?>'>
				    	<input type='hidden' name='location_ampor_text[]' value='<?php echo $row['ampor']?>'>
				    	<input type='hidden' name='location_tumbon_text[]' value='<?php echo $row['tumbon']?>'>
				    	<input type='hidden' name='location_mooban_text[]' value='<?php echo $row['mooban']?>'>
				    </td>
				    <td><img class='remove_location_btn' src='themes/msosocial/images/remove2.png' width='16' height='16' title='ลบพื้นที่ปฏิบัติงาน' style='cursor: pointer;'></td>
				</tr>
				<?endforeach;?>
				<?endif;?>
			  </table>
		    </div>
		  </div> 
		  <input type="hidden" name="edit_code" value="">
		  <input type="hidden" name="id" value="<?php echo @$rs['id']?>">
          <input type="hidden" name="current_status" value="ยื่นใหม่">
          <input type="hidden" name="post_form" value="fund02">
          <button class="btn btn-success btn-lg pull-right" type="submit">ยื่นจดทะเบียนองค์กร</button>
        </div>
      </div>
    </div>
    <!------- จบขั้นตอนที่ 5 ------->
    
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
<script type="text/javascript" src="media/js/jquery.chainedSelect.min.js"></script>
<script type="text/javascript">
$(function(){
	// jquery-ui datepicker
	var dateBefore=null;
	$("#dateInput").datepicker({
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
	
	$("select[name='lo_province_code']").live("change",function(){
		select_name = 'lo_ampor_code';
		province_code = $(this).val();
		ajax_ampor(select_name,$("#lo_ampor"),province_code);
	});
	
	$("select[name='lo_ampor_code']").live("change",function(){
		select_name = 'lo_tumbon_code';
		province_code = $('select[name=lo_province_code]').val();
		ampor_code = $(this).val();
		ajax_tumbon(select_name,$("#lo_tumbon"),province_code,ampor_code);
	});
	
	
	// checkbox selected
	$('.chkboxselected').change(function(){
		var selected_text = $(this).closest('span').text();
		var selected_id = $(this).val();
		var select_type = $(this).attr('name');
			
		if(this.checked){
			var count_element = $(this).closest('.form-group').find('.tb_selected_place tr').length + 1;
			var ele = '<tr class="target_'+selected_id+'"><td style="width:10%">'+count_element+'</td><td style="width:30%">'+selected_text+'</td><td style="width:40%"><input class="form-control" type="text" name="other[]" style="width:350px;"><input type="hidden" name="answer_id[]" value="'+selected_id+'"><input type="hidden" name="question_name[]" value="'+select_type+'"></td></tr>';
			$(this).closest('.form-group').find('.tb_selected_place').append(ele);
		}else{
			$(this).closest('.form-group').find('.tb_selected_place').find('.target_'+selected_id).remove();
		}
	});
	
	// checkbox selected
	$( "input[type=hidden][name=answer_id[]]" ).each(function( index ) {
	  // console.log( index + ": " + $( this ).val() );
	  var inputval = $( this ).val();
	  $(this).closest('.td_targetgroup').find('input[name=target]').filter(function(){return this.value==inputval}).attr('checked','checked');
	  $(this).closest('.td_service').find('input[name=service]').filter(function(){return this.value==inputval}).attr('checked','checked');
	  $(this).closest('.td_process').find('input[name=process]').filter(function(){return this.value==inputval}).attr('checked','checked');
	});
	
	$('.td_chkboxType2 input[type=checkbox]').change(function(){
		if(this.checked){
			$(this).closest('span').find('input').removeAttr('disabled');
		}else{
			$(this).closest('span').find('input').slice(1).attr('disabled','disabled');
		}
	});
	
	// location select
	$('select[name=location_type]').change(function(){
		switch ($(this).val()) {
		    case 'จังหวัด':
		        $('#lo_ampor').hide();
		        $('#lo_tumbon').hide();
		        $('input[name=mooban]').hide();
		        break;
		    case 'อำเภอ':
		    	$('#lo_ampor').show();
		        $('#lo_tumbon').hide();
		        $('input[name=mooban]').hide();
		        break;
		    case 'ตำบล':
		    	$('#lo_ampor').show();
		        $('#lo_tumbon').show();
		        $('input[name=mooban]').hide();
		        break;
		    case 'หมู่บ้าน':
		    	$('#lo_ampor').show();
		        $('#lo_tumbon').show();
		        $('input[name=mooban]').show();
		        break;
		}
	});
	
	$('.remove_location_btn').live('click',function(){
		$(this).closest('tr').fadeOut( function() { 
			$(this).remove();
		});
	});
	
	$('.location_add_btn').click(function(){
		var location_type = $('select[name=location_type]').val();
		var location_province = $('select[name=lo_province_code]').val();
		var location_ampor = $('select[name=lo_ampor_code]').val();
		var location_tumbon = $('select[name=lo_tumbon_code]').val();
		var location_type_text = $('select[name=location_type] option:selected').text();
		var location_province_text = 'จ.'+$('select[name=lo_province_code] option:selected').text();
		var location_ampor_text = 'อ.'+$('select[name=lo_ampor_code] option:selected').text();
		var location_tumbon_text = 'ต.'+$('select[name=lo_tumbon_code] option:selected').text();
		var location_mooban_text = 'ม.'+$('input[name=mooban]').val();
		
		switch (location_type) {
		    case 'จังหวัด':
		        location_ampor = '';
				location_tumbon = '';
				location_ampor_text = '';
				location_tumbon_text = '';
				location_mooban_text = '';
		        break;
		    case 'อำเภอ':
				location_tumbon = '';
				location_tumbon_text = '';
				location_mooban_text = '';
		        break;
		    case 'ตำบล':
				location_mooban_text = '';
		        break;
		}
		
		if($('#locationList tr').length == 1){
			order = 1;
		}else{
			order = parseInt($('#locationList tr').length);
		}
		
		htmldata1 = "<tr>";
		htmldata2 = "<td style='width:5%;'>"+order+"</td><td style='width:25%;'>"+location_type_text+"</td>";
		htmldata3 = "<td style='width:60%;'>"+location_province_text+" "+location_ampor_text+" "+location_tumbon_text+" "+location_mooban_text+"</td>";
		htmldata4 = "<td style='width:10%;'><img class='remove_location_btn' src='themes/msosocial/images/remove2.png' width='16' height='16' title='ลบพื้นที่ปฏิบัติงาน' style='cursor: pointer;'>";
		htmldata5 = "<input type='hidden' name='location_type[]' value='"+location_type+"'><input type='hidden' name='location_province[]' value='"+location_province+"'><input type='hidden' name='location_ampor[]' value='"+location_ampor+"'><input type='hidden' name='location_tumbon[]' value='"+location_tumbon+"'><input type='hidden' name='location_type_text[]' value='"+location_type_text+"'><input type='hidden' name='location_province_text[]' value='"+location_province_text+"'><input type='hidden' name='location_ampor_text[]' value='"+location_ampor_text+"'><input type='hidden' name='location_tumbon_text[]' value='"+location_tumbon_text+"'><input type='hidden' name='location_mooban_text[]' value='"+location_mooban_text+"'>";
		htmldata6 = "</td></tr>";
		var res = htmldata1.concat(htmldata2,htmldata3,htmldata4,htmldata5);
		console.log(res);
		$( "#locationList tr:last" ).after(res);
	});
	
	
	// disable button on submit
	$('form').submit(function() {
	  $('button[type=submit]', this).attr('disabled', 'disabled');
	});
});

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


