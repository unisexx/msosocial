<div id="dvList">
	<div style="text-align:right;"><button class="btn btn-primary" id="btn2form">ยื่นแบบฟอร์มขอรับสนับสนุน</button></div>
	<h3 style="margin-top:0; color:#393">รายการขอรับเงินสนับสนุนโครงการ</h3>
	<table class="tblist">
    <tr>
    <th>#</th>
    <th>รหัสโครงการ</th>
    <th>ชื่อโครงการ</th>
    <th>สถานะ</th>
    <th>วันที่</th>
    <th>ผลพิจาราณาล่าสุด</th>
    <th>วันที่</th>
    <th>ดู/แก้ไข</th>
    </tr>
    <tr>
    <td>1</td>
    <td>คคด/2558/นนทบุรี/0001</td>
    <td>โครงการพัฒนาความรู้เด็ก</td>
    <td><span class="statusNew">รายการใหม่</span></td>
    <td>15/03/2558</td>
    <td>-</td>
    <td>20/03/2558</td>
    <td><img src="images/view.png" width="24" height="23" /></td>
    </tr>
    <tr>
      <td>2</td>
      <td>58/0051</td>
      <td>โครงการส่งเสริมศักยภาพทางด้านกีฬา</td>
      <td><span class="statusReturn">กลับไปแก้ไข</span></td>
      <td>10/03/2558</td>
      <td>ขอรายละเอียดเพิ่มเติม</td>
      <td>17/03/2558</td>
      <td><img src="images/edit.png" width="16" height="16" /></td>
    </tr>
    <tr>
      <td>3</td>
      <td>กปม/2558/นนทบุรี/0028</td>
      <td>โครงการมาตราการป้องกันการค้ามนุษย์</td>
      <td><span class="statusConfirm">รอผล</span></td>
      <td>05/03/2558</td>
      <td>อนุมัติ</td>
      <td>10/03/2558</td>
      <td><img src="images/view.png" width="24" height="23" /></td>
    </tr>
    <tr>
      <td>4</td>
      <td>คคด/2558/นนทบุรี/0002</td>
      <td>โครงการวางแผนชีวิตเด็กสู่เยาวชน</td>
      <td><span class="statusConfirm">รอผล</span></td>
      <td>05/03/2558</td>
      <td>-</td>
      <td>-</td>
      <td><img src="images/view.png" width="24" height="23" /></td>
    </tr>
    </table>
</div><!--รายการขอรับเงินสนับสนุนโครงการ-->


<div id="dvForm">
<div style="text-align:right;"><button class="btn" id="btn2list">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">แบบฟอร์มการขอรับเงินสนับสนุนโครงการ <select name=""  class="form-control" style="font-size:14px; width:200px;">
  <option>-- กรุณาเลือกกองทุน --</option>
  <option value="child">กองทุนเด็กฯ</option>
  <option value="support">กองทุนส่งเสริมฯ</option>
  <option value="traffick">กองทุนป้องกันค้ามนุษย์ฯ</option>
</select></h4>


<div class="dvChild">
<table class="tbWebAdd">
<tr>
  <th>ปีงบประมาณ / จังหวัด</th>
  <td class="form-inline">
  	<select name="budget_year" class="gen_projcode valid">
		<option value="2558">2558</option>
		<option value="2557">2557</option>
		<option value="2556">2556</option>
		<option value="2555">2555</option>
		<option value="2554">2554</option>
	</select> /
	<select name="province_id" id="province_id" class="gen_projcode valid">
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
	<th>รหัสโครงการ <span class="Txt_red_12">*</span><input type="hidden" name="id" value="" /></th>
	<td style="font-size:18px; color:#F00;" id="proj_code">คคด/2558/กาญจนบุรี/XXXX</td>
</tr>
<tr>
  <th>ชื่อโครงการ <span class="Txt_red_12">*</span></th>
  <td><input type="text" name="textfield10" id="textfield28" style="width:450px;"  class="form-control"/></td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารโครงการ<span class="Txt_red_12">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files1">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector1'>
	</div>
  	<!--<input type="file" name="fileField" id="fileField" class="form-control" />-->
  </td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารรายละเอียดค่าใช้จ่ายของโครงการ <span class="Txt_red_12">*</span></th>
  <td>
  	<button name="" type="button" class="btn btn-success" id="btn_add_files2">+ เพิ่มไฟล์แนบ</button>
  	<div id='file_sector2'>
	</div>
  	<!--<input type="file" name="fileField2" id="fileField2" class="form-control" />-->
  </td>
</tr>
<tr>
  <th>ชื่อองค์กรที่เสนอขอรับ <span class="Txt_red_12">*</span></th>
  <td><input name="textfield14" type="text"  class="form-control" id="textfield29" style="width:550px;" value="มูลนิธิทองทศฯ เพื่อการศึกษาและสาธารณประโยชน์" readonly="readonly"/></td>
</tr>
<tr>
  <th>สถานะโครงการที่ขอรับเงินกองทุนฯ <span class="Txt_red_12">*</span></th>
  <td><div style="margin-bottom:10px;">
    <input type="radio" name="radio" id="radio7" value="radio" />
    โครงการริเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน) </div>
  <div style="margin-bottom:10px;">
  <input type="radio" name="radio" id="radio8" value="radio" />
    โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน) </div> <div>
  <input type="radio" name="radio" id="radio8" value="radio" />
      โครงการเดิม (โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)</div>
  </td>
</tr>
<tr>
  <th>ประเภทโครงการ  <span class="Txt_red_12">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio9" value="radio" />
การสงเคราะห์เด็ก </span> <span style="margin-right:20px;">
<input type="radio" name="radio" id="radio10" value="radio" />
การคุ้มครองสวัสดิภาพเด็ก </span> <span style="margin-right:20px;">
<input type="radio" name="radio" id="radio10" value="radio" />
การดำเนินงานของสถานรองรับเด็ก 5 สถาน </span> <span>
<input type="radio" name="radio" id="radio10" value="radio" />
การส่งเสริมความประพฤติเด็ก (นักเรียน/นักศึกษา) </span></td>
</tr>
<tr>
  <th>กรอบทิศทางในการจัดสรรเงินกองทุนคุ้มครองเด็ก <span class="Txt_red_12">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio11" value="radio" />
การป้องกันและแก้ไขปัญหาเด็กและเยาวชน </span> <span style="margin-right:20px;">
<input type="radio" name="radio" id="radio12" value="radio" />
การพัฒนาเด็กและเยาวชน </span> <span style="margin-right:20px;">
<input type="radio" name="radio" id="radio12" value="radio" />
การพัฒนาระบบคุ้มครองเด็ก </span> 
<span style="margin-right:20px;">
<input type="radio" name="radio" id="radio12" value="radio" />
การส่งเสริมศักยภาพครอบครัวเพื่อการเลี้ยงดูบุตรอย่างเหมาะสม </span>
<span style="margin-right:20px;">
<input type="radio" name="radio" id="radio12" value="radio" />
การส่งเสริมศักยภาพองค์กรปกครองส่วนท้องถิ่นในการคุ้มครองเด็ก </span>
<span>
<input type="radio" name="radio" id="radio12" value="radio" />
การประชาสัมพันธ์ เผยแพร่ความรู้เกี่ยวกับการคุ้มครองเด็ก </span></td>
</tr>
<tr>
  <th>งบประมาณโครงการและแหล่งสนับสนุน (เฉพาะปีปัจจุบัน) <span class="Txt_red_12">*</span></th>
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
  <th>สาเหตุที่เสนอขอรับเงินกองทุน <span class="Txt_red_12">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio13" value="radio" />
    ไม่ได้รับงบประมาณปกติของหน่วยงาน</span>
    <input type="radio" name="radio" id="radio14" value="radio" />
    ได้รับงบประมาณปกติจากหน่วยงานแต่ไม่เพียงพอ</td>
</tr>
<tr>
  <th>กลุ่มเป้าหมายของโครงการ<span class="Txt_red_12"> *</span></th>
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
  <th>ประเภทองค์กรที่เสนอขอรับเงินกองทุน <span class="Txt_red_12">*</span></th>
  <td><span style="margin-right:20px;">
    <input type="radio" name="radio" id="radio" value="radio" />
    องค์กรภาคเอกชน </span>
    <input type="radio" name="radio" id="radio2" value="radio" />
    หน่วยงานของรัฐ</td>
</tr>
<tr>
  <th>แนบไฟล์เอกสารประกอบการพิจารณา <span class="Txt_red_12">*</span></th>
  <td>
  <p>1. แบบสรุปโครงการ <br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>2. ข้อมูลเกี่ยวกับโครงการที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่พื้นที่ดำเนินงานโครงการ<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>3. ข้อมูลเกี่ยวกับองค์กรที่เสนอขอรับเงินกองทุนฯพร้อมแผนที่ตั้งองค์กร<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>4. หนังสือรับรองผลงาน<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  <p>5. หนังสือรับรององค์กร<br />    <input type="file" name="fileField3" id="fileField3" class="form-control" /></p>
  </td>
</tr>
</table>

<div style="text-align:right; margin-top:20px;"><button class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

<div class="dvSupport">
<table class="tbWebAdd">
<tr>
  <th>ปีงบประมาณ / จังหวัด</th>
  <td class="form-inline">2558 / นนทบุรี</td>
</tr>
<tr>
  <th>ชื่อองค์กรที่เสนอขอรับเงินกองทุน</th>
  <td>มูลนิธิทองทศฯ เพื่อการศึกษาและสาธารณประโยชน์ (องค์กรสาธารณประโยชน์)</td>
</tr>
<tr>
  <th>ชื่อโครงการ (ภาษาไทย)<span class="Txt_red_12"> *</span></th>
  <td><input type="text" name="textfield10" id="textfield28" style="width:550px;" class="form-control"/></td>
</tr>
<tr>
  <th>ประเภทโครงการที่ขอรับเงินกองทุนฯ <span class="Txt_red_12">*</span></th>
  <td>
    <div class="boxOrgType1">
      <div style="margin-bottom:10px;">
        <input type="radio" name="radio" id="radio10" value="radio" />
        โครงการใหม่ (โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้น มาก่อน) </div>
      <div style="margin-bottom:10px;">
        <input type="radio" name="radio" id="radio15" value="radio" />
        โครงการที่ดำเนินงานมาแล้ว (โครงการที่ได้ดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว โดยต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน ซึ่งต้องไม่น้อยกว่า 25%) </div>
      <div>
        <input type="radio" name="radio" id="radio15" value="radio" />
        ไม่ได้รับการสนับสนุนงบประมาณจากส่วนราชการและแหล่งทุนอื่นๆ  หรือได้รับแต่ไม่เพียงพอ</div>
      </div>
    
    
    <div class="boxOrgType2">
      <div style="margin-bottom:10px;">
        <input type="radio" name="radio" id="radio10" value="radio" />
        โครงการรึเริ่มใหม่ (โครงการที่มีแนวคิดหรือนโยบายใหม่ ไม่เคยทำมาก่อน)   </div>
      <div style="margin-bottom:10px;">
        <input type="radio" name="radio" id="radio15" value="radio" />
        ไม่สามารถของบประมาณปกติได้   </div>
      <div>
        <input type="radio" name="radio" id="radio15" value="radio" />
        ได้รับแต่ไม่เพียงพอ (ได้รับงบประมาณปกติ <input name="" type="text" /> บาท)</div>
      </div>
    
    <div style="margin-top:15px; margin-left:30px; display:none">
      <p><span style="margin-right:20px;">
        <input name="input8" type="text" style="width:400px;" placeholder="ชื่อโครงการ (เดิม)" />
        <select name="select3">
          <option>ปีที่ดำเนินการ (เดิม)</option>
          <option>2557</option>
          <option>2556</option>
          </select>
        </span></p>
      <p>แหล่งเงินสนับสนุน (เดิม) <span style="margin-right:20px; margin-left:10px;">
        <input type="radio" name="radio" id="radio16" value="radio" />
        จากกองทุน กสค. </span> <span>
          <input type="radio" name="radio" id="radio20" value="radio" />
          แหล่งอื่นๆ</span>
        <input name="input8" type="text" style="width:250px;" placeholder="ระบุ" />
        </p>
    </div></td>
</tr>
<tr>
  <th>สาขาของโครงการที่ขอรับสนับสนุน <span class="Txt_red_12">*</span></th>
  <td>
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox2" id="checkbox2" /> สาขาการบริการสังคม </span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox3" id="checkbox3" /> สาขาการศึกษา </span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox4" id="checkbox4" /> สาขาสุขภาพอนามัย</span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox5" id="checkbox5" /> สาขาที่อยู่อาศัย</span>
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox6" id="checkbox6" /> สาขาแรงงานการฝึกอาชีพและการประกอบอาชีพ </span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox6" id="checkbox7" /> สาขานันทนาการ </span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox6" id="checkbox8" /> สาขากระบวนการยุติธรรม</span> 
    <span style="display:inline-block; width:280px;"><input type="checkbox" name="checkbox6" id="checkbox9" /> ด้านอื่นๆ ระบุ <input name="" type="text" /> </span></td>
</tr>
<tr>
  <th>กลุ่มเป้าหมาย <span class="Txt_red_12">*</span></th>
  <td><span style="display:inline-block; width:300px;"><input type="checkbox" name="checkbox7" id="checkbox10" />
    เด็กและเยาวชน    <input name="input5" type="text" style="width:30px;"/> คน </span> 
    
    <span style="display:inline-block; width:300px;">  <input type="checkbox" name="checkbox7" id="checkbox11" />
      ผู้หญิง ครอบครัวและผู้ถูกละเมิดทางเพศ  <input name="input5" type="text" style="width:30px;"/> คน</span> 
    
    <span style="display:inline-block; width:300px;"><input type="checkbox" name="checkbox7" id="checkbox12" />
        ผู้สูงอายุ <input name="input5" type="text" style="width:30px;"/> คน</span> 
      <span style="display:inline-block; width:300px;"><input type="checkbox" name="checkbox7" id="checkbox12" />
      คนพิการ  <input name="input5" type="text" style="width:30px;"/> คน</span> 
    <span style="display:inline-block; width:300px;">
      <input type="checkbox" name="checkbox7" id="checkbox13" />
      ชุมชนเมือง <input name="input5" type="text" style="width:30px;"/> แห่ง</span>
    
  <span style="display:inline-block; width:300px;"> <input type="checkbox" name="checkbox7" id="checkbox13" />
    คนจนเมือง  <input name="input5" type="text" style="width:30px;"/> คน</span>
    
  <span style="display:inline-block; width:300px;"> <input type="checkbox" name="checkbox7" id="checkbox14" />
    แรงงานข้ามชาติ/แรงงานต่างด้าว  <input name="input5" type="text" style="width:30px;"/> คน</span>
    
  <span style="display:inline-block; width:300px;"> <input type="checkbox" name="checkbox7" id="checkbox15" /> แรงงานนอกระบบ  <input name="input5" type="text" style="width:30px;"/> คน</span> 
  <span style="display:inline-block; width:300px;">   <input type="checkbox" name="checkbox7" id="checkbox16" /> คนจากจังหวัดชายแดนภาคใต้  <input name="input5" type="text" style="width:30px;"/> คน</span> 
  <span style="display:inline-block; width:300px;">     <input type="checkbox" name="checkbox7" id="checkbox17" />   ผู้ป่วยเอดส์และผู้ได้รับผลกระทบจากเอดส์   <input name="input5" type="text" style="width:30px;"/> คน</span>
    <span style="display:inline-block; width:300px;">     <input type="checkbox" name="checkbox8" id="checkbox18" />    คนที่มีปัญหาสถานะบุคคล/ชาติพันธุ์  <input name="input5" type="text" style="width:30px;"/> คน </span>
  <span style="display:inline-block; width:300px;">    <input type="checkbox" name="checkbox8" id="checkbox19" />    คนไทยในต่างประเทศ  <input name="input5" type="text" style="width:30px;"/> คน</span><br />
  <span style="display:inline-block; width:300px;"><input type="checkbox" name="checkbox8" id="checkbox20" />    ผู้อยู่ในกระบวนการยุติธรรม  <input name="input5" type="text" style="width:30px;"/> คน </span>
    <input type="checkbox" name="checkbox8" id="checkbox21" />
    ผู้มีความหลากหลายทางเพศ  <input name="input5" type="text" style="width:30px;"/> คน
  </td>
</tr>
<tr>
  <th>งบประมาณโครงการและแหล่งสนับสนุน(เฉพาะปีปัจจุบัน) <span class="Txt_red_12">*</span></th>
  <td>
    <div><span style="display:inline-block; width:230px;">งบประมาณทั้งโครงการ (เฉพาะปีปัจจุบัน)    </span>
      <input name="textfield15" type="text" id="textfield34" style="width:180px;" readonly="readonly" />
      บาท</div>
    <div><span style="display:inline-block; width:230px;">งบประมาณที่ขอรับการสนับสนุน  </span>
      <input name="textfield15" type="text" id="textfield34" style="width:180px;" />
      บาท <span class="note">* จะคำนวณเป็นขนาดโครงการ</span></div>
    <div><span style="display:inline-block; width:230px;">งบประมาณที่ได้รับสมทบจากแหล่งอื่น<strong>*</strong><em>(ถ้ามี)</em>  </span>
      <input name="textfield23" type="text" id="textfield35" style="width:180px;" />
      บาท
      <span style="margin-left:20px;"><input name="" type="checkbox" value="" /> หน่วยงานภาครัฐ</span> <span style="margin:0 5px;"><input name="" type="checkbox" value="" /> ท้องถิ่น</span>   <input name="" type="checkbox" value="" /> ธุรกิจ/องค์กรเอกชน
  </div>
    
    </td>
</tr>
<tr>
  <th>แนบไฟล์โครงการ</th>
  <td><input type="file" name="fileField" id="fileField" /></td>
</tr>
</table>

<div style="text-align:right;"><button class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>

<div class="dvTraffick">
กองทุนป้องกัน

<div style="text-align:right;"><button class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>



</div><!--แบบฟอร์มการขอรับเงินสนับสนุนโครงการ-->










