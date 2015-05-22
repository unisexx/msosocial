<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>


<div class="dvSupport">
<table class="tblForm">
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