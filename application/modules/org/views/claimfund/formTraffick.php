<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>

<div class="tblForm">
	<div id="trafficktabs">
	  	<ul>
		    <li><a href="#trafficktabs-1">สำหรับผู้ที่ยื่นคำขอรับความช่วยเหลือ</a></li>
		    <li><a href="#trafficktabs-2">สำหรับเจ้าหน้าที่ผู้รับเรื่อง</a></li>
		    <li><a href="#trafficktabs-3">สำหรับนักสังคมสงเคราะห์</a></li>
		    <li><a href="#trafficktabs-4">สำหรับผู้บังคับบัญชา</a></li>
	  	</ul>
	  	<form method="post" action="" enctype="multipart/form-data">
	  	<div id="trafficktabs-1">
	    	<h3 style="margin-top:0; color:#393">ตอนที่ 1 สำหรับผู้ที่ยื่นคำขอรับความช่วยเหลือ</h3>
	    	<table class="tblForm">
	    	<tr>
	  			<th>วันเดือนปี ที่ยื่นเรื่อง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" class="form-control" name="request_date" value="" placeholder="" style="width:100px;margin-right:5px;" required>
				</td>
			</tr>
			<tr>
	  			<th>ปีงบประมาณ / จังหวัด <span class="textRed">*</span></th>
				<td class="form-inline">
					กองทุนเพื่อการป้องกันและปราบปรามการค้ามนุษย์
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
	  			</td>
			</tr>
			<tr>
	  			<th>สถานที่ยื่นคำร้อง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="request_place" style="width:500px;"  class="form-control"/>
				</td>
			</tr>
			<tr>
	  			<th>ชือ-นามสกุล <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="fullname" style="width:300px;"  class="form-control"/>
				</td>
			</tr>
			<tr>
	  			<th>อายุ <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="number" name="age" maxlength="3" style="width:60px;"  class="form-control"/> ปี
				</td>
			</tr>
			<tr>
	  			<th>เลขที่บัตรประชาชน <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="personal_id" maxlength="13" style="width:300px;"  class="form-control"/>
				</td>
			</tr>
			<tr>
	  			<th>ที่อยู่ปัจจุบัน</th>
				<td class="form-inline">
					<div>
						เลขที่ <input type="text" name="address_number" style="width:50px;" class="form-control"/>
						หมู่ที่ <input type="text" name="address_moo" style="width:30px;" class="form-control"/>
						ตรอก/ซอย <input type="text" name="address_soi" style="width:200px;" class="form-control"/>
						ถนน <input type="text" name="address_road" style="width:200px;" class="form-control"/>
					</div>
					<div style="margin-top:5px">
						<!--
						จังหวัด 
						<?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    		อำเภอ 
			    		<span id="ampor">
			    			<?php echo form_dropdown('ampor_code', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    		</span>
			    		ตำบล 
			    		<span id="tumbon">
			    			<?php echo form_dropdown('tumbon_code', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['province_code'].' and ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    		</span>
			    	-->
						จังหวัด 
						<?php echo form_dropdown('address_province_id', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
			    		อำเภอ 
			    		<span id="ampor">
			    			<?php echo form_dropdown('address_amphur_id', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
			    		</span>
			    		ตำบล 
			    		<span id="tumbon">
			    			<?php echo form_dropdown('address_district_id', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['province_code'].' and ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
			    		</span>
	                 	รหัสไปรณีย์ <input type="text" name="address_code" style="width:70px;" class="form-control"/>
	        		</div>
				</td>
			</tr>
			<tr>
	  			<th>ที่อยู่ตามทะเบียนบ้าน</th>
				<td class="form-inline">
					<div>
						เลขที่ <input type="text" name="regis_number" style="width:50px;" class="form-control"/>
						หมู่ที่ <input type="text" name="regis_moo" style="width:30px;" class="form-control"/>
						ตรอก/ซอย <input type="text" name="regis_soi" style="width:200px;" class="form-control"/>
						ถนน <input type="text" name="regis_road" style="width:200px;" class="form-control"/>
					</div>
					<div style="margin-top:5px">จังหวัด
						<?php echo form_dropdown('regis_province_id', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
	 					<p id="regis_amphur_id" style="display: inline;" >
							<select name="address_amphur_id" class="gen_projcode valid form-control"><option value="">-- เลือกอำเภอ --</option>\n</select>
						</p>
						ตำบล
						<p id="regis_district_id" style="display: inline;" >
	                        <select name="address_district_id" class="gen_projcode valid form-control"><option value="">-- เลือกตำบล --</option>\n</select>
	                 	</p>
	                 	รหัสไปรณีย์ <input type="text" name="regis_code" style="width:70px;" class="form-control"/>
	        		</div>
				</td>
			</tr>
			<tr>
	  			<th>เบอร์โทรศัพท์</th>
				<td class="form-inline">
					<input type="text" name="tel_number" class="form-control" style="width:400px">
				</td>
			</tr>
			<tr>
	  			<th>
	  				สภาพครอบครัว / ปัญหาความเดือดร้อน
	  				<p style="font-size:12px; color:#666;">สภาพครอบครัว/ปัญหาความเดือดร้อนและความต้องการช่วยเหลือ เนื่องจากเป็นผู้เสียหายจากการกระทำความผิดฐานค้ามนุษย์ตามพระราชบัญญัติป้องกันและปราบปรามการค้ามนุษย์ พ.ศ. ๒๕๕๑</p>
	  			</th>
				<td class="form-inline">
					<textarea name="problem_family" rows="4" style="width:300px;" placeholder="โปรดระบุสภาพครอบครัว" class="form-control"></textarea>
          			<textarea name="problem_suffered" rows="4" style="width:300px;" placeholder="โปรดระบุปัญหาความเดือนร้อน" class="form-control"></textarea>
				</td>
			</tr>
			<tr>
	  			<th>ความช่วยเหลือที่ต้องการได้รับ</th>
				<td class="form-inline">
					<p><input type="checkbox" class="help" name="help_spend_1" value="1" data-target="1"  > (1) ค่าใช้จ่ายในการครองชีพ</p>
					<p><input type="checkbox" class="help" name="help_spend_2" value="1" data-target="2"  > (2) ค่าใช้จ่ายในการรักษาพยาบาล</p>
					<p><input type="checkbox" class="help" name="help_spend_3" value="1" data-target="3"  > (3) ค่าใช้จ่ายในการบำบัดฟื้นฟูทางร่างกายและจิตใจ</p>
					<p><input type="checkbox" class="help" name="help_spend_4" value="1" data-target="4"  > (4) ค่าขาดประโยชน์ทำมาหาได้ในระหว่างที่ไม่สามารถประกอบการงานได้ตามปกติ</p>
					<p><input type="checkbox" class="help" name="help_spend_5" value="1" data-target="5"  > (5) เครื่องอุปโภคบริโภค</p>
					<p><input type="checkbox" class="help" name="help_spend_6" value="1" data-target="6"  > (6) ค่าใช้จ่ายในการจัดหาที่พักตามความเหมาะสม</p>
					<p><input type="checkbox" class="help" name="help_spend_7" value="1" data-target="7"  > (7) ค่าใช้จ่ายในการศึกษาหรือฝึกอบรม</p>
   					<p><input type="checkbox" class="help" name="help_spend_8" value="1" data-target="8"  > (8) ค่าใช้จ่ายในการให้ความช่วยเหลือทางกฎหมายหรือการดำเนินคดีเพื่อเรียกร้องค่าสินไหมทดแทน หรือตามคำสั่งศาล</p>
					<p><input type="checkbox" class="help" name="help_spend_9" value="1" data-target="9"  > (9) ค่าใช้จ่ายในการส่งกลับไปยังประเทศเดิมหรือภูมิลำเนาของผู้เสียหาย</p>
					<p><input type="checkbox" class="help" name="help_spend_10" value="1" data-target="10"  > (10) ค่าใช้จ่ายในการช่วยเหลือผู้เสียหายในต่างประเทศให้เดินทางกลับเข้ามาในราชอาณาจักรหรือถิ่นที่อยู่</p>
					<p><input type="checkbox" class="help" name="help_spend_11" value="1" data-target="11"  > (11) ค่าใช้จ่ายในกรณีอื่นๆ ตามที่ได้รับอนุมัติเป็นการเฉพาะราย</p>
				</td>
			</tr>
			<tr>
	  			<th>
	  				แนบเอกสารประกอบ
	  				<p style="font-size:12px; color:#666;">เช่น สำเนาบัตรประจำตัวประชาชนหรือบัตรประจำตัวเจ้าหน้าที่ของรัฐ , สำเนาทะเบียนบ้าน, สำเนามรณบัตร, ใบเสร็จรับเงินค่ารักษาพยาบาล</p>
	  			</th>
				<td class="form-inline">
					<input type="file" name="fileField[]" style="width:400px">
					<button type="button" id="add-file" ><img src="../images/btn_addsubproject.png" width="24" height="24"></button>
				</td>
			</tr>
			</table>
	  	</div>
	  	<div id="trafficktabs-2">
	    	<h3 style="margin-top:0; color:#393">ตอนที่ 2 สำหรับเจ้าหน้าที่ผู้รับเรื่อง</h3>
	    	<table class="tblForm">
	    	<tr>
	  			<th>วันเดือนปี ที่รับเรื่อง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" class="form-control" name="officer_date" value="" placeholder="" style="width:100px;margin-right:5px;" required>
				</td>
			</tr>
			<tr>
	  			<th>ชื่อ-นามสกุล เจ้าหน้าที่ <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="officer_fullname" class="form-control" style="width:400px"/>
				</td>
			</tr>
			<tr>
	  			<th>ตำแหน่ง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="officer_position" class="form-control" style="width:400px"/>
				</td>
			</tr>
			<tr>
	  			<th>ผลการตรวจสอบเอกสารหลักฐานเบื้องต้น เพื่อระบุสถานะของผู้ยื่นคำร้อง <span class="textRed">*</span></th>
				<td class="form-inline">
					<p><input type="checkbox" name="officer_document_1" value="1"  > เป็นผู้เสียหายจากการกระทำความผิดฐานค้ามนุษย์</p>
					<p><input type="checkbox" name="officer_document_2" value="1"  > เป็นทายาทของผู้เสียหายจากการกระทำความผิดฐานค้ามนุษย์</p>
					<p>
						<input type="checkbox" name="officer_document_3" value="1"  > เป็นบุคคลอื่น(ระบุความสัมพันธ์กับผู้เสียหาย)
						<input type="text" name="officer_document_3_note" class="form-control" style="width:400px;">
					</p>
				</td>
			</tr>
			<tr>
	  			<th>ความเห็น</th>
				<td class="form-inline">
					<textarea name="officer_note" rows="4" style="width:400px" class="form-control" placeholder="โปรดระบุความเห็น"></textarea>
				</td>
			</tr>
			</table>
	  	</div>
	  	<div id="trafficktabs-3">
	    	<h3 style="margin-top:0; color:#393">ตอนที่ 3 สำหรับนักสังคมสงเคราะห์</h3>
	    	<table class="tblForm">
	    	<tr>
	  			<th>วันเดือนปี ที่พิจารณา <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" class="form-control" name="society_date" placeholder="" style="width:100px;margin-right:5px;" required>
				</td>
			</tr>
			<tr>
	  			<th>ชื่อ-นามสกุล เจ้าหน้าที่ <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="society_fullname" class="form-control" style="width:400px"/>
				</td>
			</tr>
			<tr>
	  			<th>ตำแหน่ง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="society_position" class="form-control" style="width:400px"/>
				</td>
			</tr>
			<tr>
	  			<th>ผลการพิจารณา <span class="textRed">*</span></th>
				<td class="form-inline">
					<p>รวมจำนวนเงินที่ให้การสนับสนุน <input type="number" name="request_total" class="form-control" style="width:200px;" readonly="readonly"> บาท</p>
					<p id="request_help_1" style="display:none;" >(1) ค่าใช้จ่ายในการครองชีพ <input type="number" class="request-calculate form-control" name="spend_1" value="" style="width:200px;" > บาท</p>
					<p id="request_help_2" style="display:none;" > (2) ค่าใช้จ่ายในการรักษาพยาบาล <input type="number" class="request-calculate form-control" name="spend_2" value="" style="width:200px;" > บาท</p>
					<p id="request_help_3" style="display:none;" > (3) ค่าใช้จ่ายในการบำบัดฟื้นฟูทางร่างกายและจิตใจ <input type="number" class="request-calculate form-control" name="spend_3" value="" style="width:200px;" > บาท</p>
					<p id="request_help_4" style="display:none;" > (4) ค่าขาดประโยชน์ทำมาหาได้ในระหว่างที่ไม่สามารถประกอบการงานได้ตามปกติ <input type="number" class="request-calculate form-control" name="spend_4" value="" style="width:200px;" > บาท</p>
					<p id="request_help_5" style="display:none;" > (5) เครื่องอุปโภคบริโภค <input type="number" class="request-calculate form-control" name="spend_5" value="" style="width:200px;" > บาท</p>
					<p id="request_help_6" style="display:none;" > (6) ค่าใช้จ่ายในการจัดหาที่พักตามความเหมาะสม <input type="number" class="request-calculate form-control" name="spend_6" value="" style="width:200px;" > บาท</p>
					<p id="request_help_7" style="display:none;" > (7) ค่าใช้จ่ายในการศึกษาหรือฝึกอบรม <input type="number" class="request-calculate form-control" name="spend_7" value="" style="width:200px;" > บาท</p>
					<p id="request_help_8" style="display:none;" > (8) ค่าใช้จ่ายในการให้ความช่วยเหลือทางกฎหมายหรือการดำเนินคดีเพื่อเรียกร้องค่าสินไหมทดแทน หรือตามคำสั่งศาล <input type="number" class="request-calculate form-control" name="spend_8" value="" style="width:200px;" > บาท</p>
					<p id="request_help_9" style="display:none;" > (9) ค่าใช้จ่ายในการส่งกลับไปยังประเทศเดิมหรือภูมิลำเนาของผู้เสียหาย <input type="number" class="request-calculate form-control" name="spend_9" value="" style="width:200px;" > บาท</p>
					<p id="request_help_10" style="display:none;" > (10) ค่าใช้จ่ายในการช่วยเหลือผู้เสียหายในต่างประเทศให้เดินทางกลับเข้ามาในราชอาณาจักรหรือถิ่นที่อยู่ <input type="number" class="request-calculate form-control" name="spend_10" value="" style="width:200px;" > บาท</p>
					<p id="request_help_11" style="display:none;" > (11) ค่าใช้จ่ายในกรณีอื่นๆ ตามที่ได้รับอนุมัติเป็นการเฉพาะราย <input type="number" class="request-calculate form-control" name="spend_11" value="" style="width:200px;" > บาท</p>
				</td>
			</tr>
			<tr>
	  			<th>ความเห็น</th>
				<td class="form-inline">
					<textarea name="society_note" rows="4" style="width:500px;" class="form-control" placeholder="โปรดระบุความเห็น"></textarea>
				</td>
			</tr>
			</table>
	  	</div>
	  	<div id="trafficktabs-4">
	    	<h3 style="margin-top:0; color:#393">ตอนที่ 4 สำหรับผู้บังคับบัญชา</h3>
	    	<table class="tblForm">
	    	<tr>
	  			<th>วันเดือนปี ที่อนุมัติ <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" class="form-control" name="leader_date" value="" placeholder="" style="width:100px;margin-right:5px;" required>
				</td>
			</tr>
			<tr>
	  			<th>ชื่อ-นามสกุล ผู้บังคับบัญชา <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="leader_fullname" class="form-control" style="width:400px;"/>
				</td>
			</tr>
			<tr>
	  			<th>ตำแหน่ง <span class="textRed">*</span></th>
				<td class="form-inline">
					<input type="text" name="leader_position" class="form-control" style="width:400px;">
				</td>
			</tr>
			<tr>
	  			<th>ผลการพิจารณา <span class="textRed">*</span></th>
				<td class="form-inline">
					<p><input type="radio" name="status" value="1"  > เห็นควรให้ความช่วยเหลือตามที่ยื่นคำขอ</p>
					<p>
						<input type="radio" name="status" value="2"  > ไม่เห็นควรให้ความช่วยเหลือตามที่ยื่นคำขอ
						<br>
						<textarea name="status_note_2" rows="4" style="width:600px;" class="form-control" placeholder="เนื่องจาก (โปรดระบุ)"></textarea>
					</p>
					<p>
						<input type="radio" name="status" value="3"  > อื่นๆ
						<br>
						<textarea name="status_note_3" rows="4" style="width:600px;" class="form-control" placeholder="โปรดระบุ"></textarea>
					</p>
				</td>
			</tr>
			</table>
	  	</div>
	  	</form>
	</div>
	<br/>
	<div style="text-align:right;"><button class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

<link rel="stylesheet" type="text/css" href="media/css/jquery-ui-1.7.2.custom.css">
<style type="text/css">
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
.ui-datepicker{
	width:200px;
	font-family:tahoma;
	font-size:12px;
	text-align:center;
}
button#add-file {
	background: none;
	border: none;
}
</style>
<script type="text/javascript" src="media/js/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript" src="media/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="media/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="media/js/jquery.ui.tabs.js"></script>
<style>
	.ui-widget-header { border: 1px solid #aaaaaa; background:#C6C url(media/css/org/custom-theme/images/ui-bg_dots-medium_50_4bae24_4x4.png) 50% 50% repeat; color: #222222; font-weight: bold; }
</style>
<script type="text/javascript">
$(document).ready(function() {
	$("select[name='address_province_id']").live("change",function(){
		select_name = 'address_amphur_id';
		province_code = $(this).val();
		ajax_ampor(select_name,$('#address_amphur_id'),province_code);
	});
	
	$("select[name='address_amphur_id']").live("change",function(){
		select_name = 'address_district_id';
		province_code = $('select[name="address_province_id"]').val();
		ampor_code = $(this).val();
		ajax_tumbon(select_name,$('#address_district_id'),province_code,ampor_code);
	});
	
	$(".help").click(function(){
		var btn = $(this);
		var target = btn.attr("data-target");
			
		if(btn.is(":checked")) {
			$("#request_help_"+target).show();
		} else {
			$("#request_help_"+target).hide();
			$("input[name=request_help_"+target+"]").val("");
		}
		
		CalculateRequest();
	});
	
	$(".request-calculate").keyup(function() {
		CalculateRequest();
	})
	
	$("select[data-type]").live("change", function(){
		var type = $(this).attr("data-type");
		var cls = $(this).attr("class");
		var id = $(this).val();
			
		$.get("fund/trafficking/person/get_"+cls+"/"+id+"/"+type, function(data) {
			$("#"+type+"_"+cls+"_id").html(data);
		});	
	});

	$("#add-file").click(function(){
		var btn = $(this)
		var input = '<br /><input type="file" name="fileField[]" id="fileField" style="width:400px"><button type="button" class="btn_delete"></button>';
			
		$(input).insertBefore(btn);
	});

});

$(function() {
	$('#trafficktabs').tabs();
	$('input[name="request_date"]').datepicker();
	$('input[name="officer_date"]').datepicker();
	$('input[name="society_date"]').datepicker();
	$('input[name="leader_date"]').datepicker();
	
});

function CalculateRequest() {
	var totalInput = $(".request-calculate").length;
	var totalRequest = 0;
		
	for (var i=0; i < totalInput; i++) {
		totalRequest += Number($(".request-calculate").eq(i).val());
	};
		
	$("input[name=request_total]").val(totalRequest);
}
</script>