link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>

<? echo form_hidden('type', @$_GET['type']); ?>

<form action="org/claimfund/saveChild/<? echo @$rs->id; ?>" method='post'> 
<div class="dvChild">
<table class="tblForm">
	<tr>
	  <th>ปีงบประมาณ / จังหวัด</th>
	  <td class="form-inline">
	  	<select name="budget_year" class="gen_projcode valid form-control">
			<option value="2558">2558</option>
			<option value="2557">2557</option>
			<option value="2556">2556</option>
			<option value="2555">2555</option>
			<option value="2554">2554</option>
		</select> /
		<select name="province_id" id="province_id" class="gen_projcode valid form-control">
			<option value="">-- เลือกจังหวัด --</option>\n<option value="64">กระบี่</option>
			<option value="1">กรุงเทพมหานคร</option>
			<option value="56" selected="selected">กาญจนบุรี</option>
			<option value="34">กาฬสินธุ์</option>
			<option value="49">กำแพงเพชร</option>
			<option value="28">ขอนแก่น</option>
			<option value="13">จันทบุรี</option>
			<option value="15">ฉะเชิงเทรา</option>
			<option value="11">ชลบุรี</option>
			<option value="9">ชัยนาท</option>
			<option value="25">ชัยภูมิ</option>
			<option value="69">ชุมพร</option>
			<option value="72">ตรัง</option>
			<option value="14">ตราด</option>
			<option value="50">ตาก</option>
			<option value="17">นครนายก</option>
			<option value="58">นครปฐม</option>
			<option value="36">นครพนม</option>
			<option value="19">นครราชสีมา</option>
			<option value="63">นครศรีธรรมราช</option>
			<option value="47">นครสวรรค์</option>
			<option value="3">นนทบุรี</option>
			<option value="76">นราธิวาส</option>
			<option value="43">น่าน</option>
			<option value="77">บึงกาฬ</option>
			<option value="20">บุรีรัมย์</option>
			<option value="4">ปทุมธานี</option>
			<option value="62">ประจวบคีรีขันธ์</option>
			<option value="16">ปราจีนบุรี</option>
			<option value="74">ปัตตานี</option>
			<option value="5">พระนครศรีอยุธยา</option>
			<option value="44">พะเยา</option>
			<option value="65">พังงา</option>
			<option value="73">พัทลุง</option>
			<option value="53">พิจิตร</option>
			<option value="52">พิษณุโลก</option>
			<option value="66">ภูเก็ต</option>
			<option value="32">มหาสารคาม</option>
			<option value="37">มุกดาหาร</option>
			<option value="75">ยะลา</option>
			<option value="24">ยโสธร</option>
			<option value="68">ระนอง</option>
			<option value="12">ระยอง</option>
			<option value="55">ราชบุรี</option>
			<option value="33">ร้อยเอ็ด</option>
			<option value="7">ลพบุรี</option>
			<option value="40">ลำปาง</option>
			<option value="39">ลำพูน</option>
			<option value="22">ศรีสะเกษ</option>
			<option value="35">สกลนคร</option>
			<option value="70">สงขลา</option>
			<option value="71">สตูล</option>
			<option value="2">สมุทรปราการ</option>
			<option value="60">สมุทรสงคราม</option>
			<option value="59">สมุทรสาคร</option>
			<option value="10">สระบุรี</option>
			<option value="18">สระแก้ว</option>
			<option value="8">สิงห์บุรี</option>
			<option value="57">สุพรรณบุรี</option>
			<option value="67">สุราษฎร์ธานี</option>
			<option value="21">สุรินทร์</option>
			<option value="51">สุโขทัย</option>
			<option value="31">หนองคาย</option>
			<option value="27">หนองบัวลำภู</option>
			<option value="26">อำนาจเจริญ</option>
			<option value="29">อุดรธานี</option>
			<option value="41">อุตรดิตถ์</option>
			<option value="48">อุทัยธานี</option>
			<option value="23">อุบลราชธานี</option>
			<option value="6">อ่างทอง</option>
			<option value="45">เชียงราย</option>
			<option value="38">เชียงใหม่</option>
			<option value="61">เพชรบุรี</option>
			<option value="54">เพชรบูรณ์</option>
			<option value="30">เลย</option>
			<option value="42">แพร่</option>
			<option value="46">แม่ฮ่องสอน</option>
		</select>
		<input type="checkbox" name="central_check" value="1"> ส่วนกลาง<span id="error_province_id"></span>
	  </td>
	</tr>
<tr>
	<th>รหัสโครงการ <span class="textRed">*</span><input type="hidden" name="id" value="" /></th>
	<td style="font-size:18px; color:#F00;" id="proj_code">คคด/2558/กาญจนบุรี/XXXX</td>
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
		<td><input name="organization" type="text"  class="form-control" id="textfield29" style="width:550px;" value="มูลนิธิทองทศฯ เพื่อการศึกษาและสาธารณประโยชน์" readonly="readonly"/></td>
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
		<span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="4"> การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม</span><span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="2"> การพัฒนาเด็กและเยาวชน</span><span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="3"> การพัฒนาระบบคุ้มครองเด็ก</span><span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="5"> การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก</span><span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="6"> สาโรจน์_ชื่อกรอบทิศทางในการจัดสรรเงิน</span><span style="margin-right:15px;"><input type="radio" name="project_direction_set_id" value="1"> การป้องกันและแก้ไขปัญหาเด็กและเยาวชน</span>			<span id="error_project_direction_set_id"></span>  
	</td>
</tr>
<tr>
	<th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="textRed">*</span></th>
	<td>
		<span style="margin-right:20px;">
	    	<input type="radio" name="radio" id="radio11" value="radio" />
			การป้องกันและแก้ไขปัญหาเด็กและเยาวชน 
		</span> 
		<span style="margin-right:20px;">
			<input type="radio" name="radio" id="radio12" value="radio" />
			การพัฒนาเด็กและเยาวชน 
		</span> 
		<span style="margin-right:20px;">
			<input type="radio" name="radio" id="radio12" value="radio" />
			การพัฒนาระบบคุ้มครองเด็ก 
		</span> 
		<span style="margin-right:20px;">
			<input type="radio" name="radio" id="radio12" value="radio" />
			การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม 
		</span>
		<span style="margin-right:20px;">
			<input type="radio" name="radio" id="radio12" value="radio" />
			การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก 
		</span>
		<span>
			<input type="radio" name="radio" id="radio12" value="radio" />
			การประชาสัมพันธ์ เผยแพร่ความรู้เกี่ยวกับการคุ้มครองเด็ก 
		</span>
	</td>
</tr>
<tr>
	<th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="textRed">*</span></th>
	<td class="form-inline">
		<div><span style="display:inline-block; width:240px;">งบประมาณทั้งโครงการ   </span>
    <input name="textfield15" type="text" id="textfield34" style="width:180px;" readonly="readonly" class="form-control" />
    บาท</div>
  <div><span style="display:inline-block; width:240px;">งบประมาณที่ขอรับการสนับสนุน  </span>
    <input name="textfield15" type="text" id="textfield34" style="width:180px;"  class="form-control"/>
    บาท </div>
    <div><span style="display:inline-block; width:240px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น<strong>*</strong><em>(ถ้ามี)</em>  </span>
      <input name="textfield23" type="text" id="textfield35" style="width:180px;" class="form-control" />
บาท
 
<p style="margin:0; margin-left:220px;"><span style="margin-left:20px;"> <input name="" type="checkbox" value="" /> หน่วยงานภาครัฐ</span> <span style="margin:0 5px;"><input name="" type="checkbox" value="" /> ท้องถิ่น</span>   <input name="" type="checkbox" value="" /> ธุรกิจ/องค์กรเอกชน</p>
</div>
    
    </td>
</tr>
<tr>
  <th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio13" value="radio" />
    ไม่ได้รับงบประมาณปกติของหน่วยงาน</span>
    <input type="radio" name="radio" id="radio14" value="radio" />
    ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ</td>
</tr>
<tr>
  <th>กลุ่มเป้าหมายของโครงการ<span class="textRed"> *</span></th>
  <td class="form-inline"><span style="margin-right:20px;">
    <input type="checkbox" name="checkbox" id="checkbox" />
เด็ก  <input name="textfield25" type="text" id="textfield36" style="width:50px;" class="form-control"  /> คน
  </span>  <span style="margin-right:20px;">
<input type="checkbox" name="checkbox" id="checkbox" />
ผู้ปกครอง/ครอบครัวอุปถัมภ์  <input name="textfield25" type="text" id="textfield36" style="width:50px;" class="form-control"  /> คน</span> <span style="margin-right:20px;">
<input type="checkbox" name="checkbox" id="checkbox" />
เจ้าหน้าที่ที่ทำงานด้านเด็ก	 <input name="textfield25" type="text" id="textfield36" style="width:50px;" class="form-control"  /> คน </span> <span>
<input type="checkbox" name="checkbox" id="checkbox" />
แกนนำชุมชน <input name="textfield25" type="text" id="textfield36" style="width:50px;" class="form-control"  /> คน</span></td>
</tr>
<tr>
  <th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="textRed">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio" value="radio" />
    องค์กรภาคเอกชน </span>
    <input type="radio" name="radio" id="radio2" value="radio" />
    หน่วยงานของรัฐ</td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="textRed">*</span></th>
  <td>
  <p>1. แบบสรุปโครงการ <br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>2. ข้อมูลเกี่ยวกับโครงการที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่พื้นที่ดำเนินงานโครงการ<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>3. ข้อมูลเกี่ยวกับองค์กรที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่ตั้งองค์กร<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>4. หนังสือรับรองผลงาน<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>5. หนังสือรับรององค์กร<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  </td>
</tr>
</table>

<div style="text-align:right; margin-top:20px;"><button type="submit" class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

</form>