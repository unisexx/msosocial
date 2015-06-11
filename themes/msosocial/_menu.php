<div id="icon-social">
      <a href="https://www.facebook.com/SWsocialwelfare?ref=hL" target="_blank"><img src="themes/msosocial/images/icon-facebook.jpg" width="23" height="22" /></a> 
      <a href="https://www.facebook.com/SWsocialwelfare?ref=hL" target="_blank"><img src="themes/msosocial/images/icon-twitter.jpg" width="23" height="22" /></a>
      <input name="searchbox" id="searchbox" maxlength="50" value="ค้นหา..." type="text" /><br>
      <span id="login">
        <img src="themes/msosocial/images/icon-key.png" width="14" height="14" />
        	<span id="userlogin">
        		<?php if($this->session->userdata('id')==true):?>
        			<a class="inline" href="org/logout">ออกจากระบบ</a>
        		<?php else:?>
        			<a class="inline" href="#loginform">เข้าสู่ระบบ</a>
        		<?php endif?>
        	</span> 
        <img src="themes/msosocial/images/icon-user.png" width="13" height="14" /><span id="userregis"><a class="inline" href="#register">สมัครสมาชิก</a></span>
<!--                <img src="themes/msosocial/images/icon-key.png" width="14" height="14" /><span id="userlogin"><a href="#">เข้าสู่ระบบ</a></span> 
        <img src="themes/msosocial/images/icon-user.png" width="13" height="14" /><span id="userregis"><a href="#">สมัครสมาชิก</a></span>-->
      </span>
  </div>
    <div id="logo">&nbsp;</div> 
    <div id="bgArt">&nbsp;</div>
       		<div class="clearfix">&nbsp;</div>
        	<div id='cssmenu'>
                <ul>
                   <li><a href='<?php echo base_url(); ?>home' class="menu1">หน้าแรก</a></li>
                   <li class='active has-sub'><a href='#' class="menu2"><span>เกี่ยวกับเรา</span></a>
                      <ul>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร' class="submenu2"><span>พ.ร.บ. ส่งเสริมฯ คืออะไร</span></a>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=โครงสร้างหน่วยงาน' class="submenu2"><span>โครงสร้างหน่วยงาน</span></a></li>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=การดำเนินงานตามนโยบาย' class="submenu2"><span>การดำเนินงานตามนโยบาย</span></a></li>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=ที่อยู่และเบอร์ติดต่อ' class="submenu2"><span>ที่อยู่และเบอร์ติดต่อ</span></a></li>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=การบริการ' class="submenu2"><span>การบริการ</span></a></li>
                         <li class='last'><a href='<?php echo base_url(); ?>contents/view?module=เกี่ยวกับเรา&category=อำนาจหน้าที่' class="submenu2"><span>อำนาจหน้าที่</span></a></li>
                      </ul>
				   </li>
<!--                   <li class='active has-sub'><a href='#' class="menu3">องค์กรสาธารณประโยชน์</a>
                      <ul>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=องค์กรสาธารณประโยชน์&category=เกี่ยวกับองค์กรสาธารณประโยชน์' class="submenu3">เกี่ยวกับองค์กรสาธารณประโยชน์</a>
                         <li class='last'><a href='<?php echo base_url(); ?>contents/lists_report?module=องค์กรสาธารณประโยชน์&category=รายงาน' class="submenu3">รายงาน</a></li>
                      </ul>
                   </li>
                   <li class='active has-sub'><a href='#' class="menu4">องค์กรสวัสดิการชุมชน</a>
                      <ul>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=องค์กรสวัสดิการชุมชน&category=เกี่ยวกับองค์กรสวัสดิการชุมชน' class="submenu4">เกี่ยวกับองค์กรสวัสดิการชุมชน</a>
                         <li class='last'><a href='<?php echo base_url(); ?>contents/lists_report?module=องค์กรสวัสดิการชุมชน&category=รายงาน' class="submenu4">รายงาน</a></li>
                      </ul>                   
                   </li>
                   <li><a href='<?php echo base_url(); ?>contents/view?module=นักสังคมสงเคราะห์&category=นักสังคมสงเคราะห์' class="menu5">นักสังคมสงเคราะห์</a></li>
                   <li class='active has-sub'><a href='#' class="menu6">หน่วยงานรัฐ</a>
                      <ul>
                         <li><a href='<?php echo base_url(); ?>contents/view?module=หน่วยงานรัฐ&category=เกี่ยวกับหน่วยงานรัฐ' class="submenu6">เกี่ยวกับหน่วยงานรัฐ</a>
                         <li class='last'><a href='<?php echo base_url(); ?>contents/lists_report?module=หน่วยงานรัฐ&category=รายงาน' class="submenu6">รายงาน</a></li>
                      </ul> 
                   </li>
                   <li class='last'><a href='<?php echo base_url(); ?>contents/view?module=อาสาสมัคร&category=อาสาสมัคร' class="menu7">อาสาสมัคร</a></li>-->
                   
                   <li><a href='<?php echo base_url(); ?>contents/view?module=นโยบาย/แผนงาน&category=นโยบาย/แผนงาน' class="menu3">นโยบาย/แผนงาน</a></li>
                   <li><a href='<?php echo base_url(); ?>contents/view?module=มาตรการ/กลไก&category=มาตรการ/กลไก' class="menu4">มาตรการ/กลไก</a></li>
                   <li><a href='<?php echo base_url(); ?>contents/view?module=ส่งเสริม/ประสานงาน&category=ส่งเสริม/ประสานงาน' class="menu5">ส่งเสริม/ประสานงาน</a></li>
                   <li><a href='<?php echo base_url(); ?>contents/view?module=พัฒนา/มาตรฐาน&category=พัฒนา/มาตรฐาน' class="menu6">พัฒนา/มาตรฐาน</a></li>
                   <li><a href='<?php echo base_url(); ?>contents/view?module=บริหารกองทุน&category=บริหารกองทุน' class="menu7">บริหารกองทุน</a></li>
                   <li class='last'><a href='<?php echo base_url(); ?>contents/view?module=อาเซียน&category=อาเซียน' class="menu8">อาเซียน</a></li>
                   
                </ul>
            </div>            
 			<div class="clearfix">&nbsp;</div>
    		
<!------------------------------------------------------------END Header and TopMenu----------------------------------------------------------->   


<div style='display:none'>
	<div id='loginform' style='padding:15px; background:#fff;'>
		<h3>เข้าสู่ระบบ</h3>
		<form class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-3 control-label">ยูสเซอร์เนม </label>
		    <div class="col-sm-9">
		      <input name="username" type="input" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-3 control-label">รหัสผ่าน </label>
		    <div class="col-sm-9">
		      <input name="password" type="password" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <input type="hidden" name="status" value="อนุมัติ">
		      <button id="lobin_btn" type="button" class="btn btn-default">ตกลง</button>
		      <span class="login_fail"></span>
		    </div>
		  </div>
		</form>
	</div>
</div>

<div style='display:none'>
	<div id='register' style='padding:15px; background:#fff;'>
		<h3>สมัครสมาชิกออนไลน์</h3>
		<form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">กรุณากรอกชื่อองค์กรเพื่อตรวจสอบ</label>
		    <input type="text" name="organ_name" class="form-control" id="exampleInputEmail1">
		  </div>
		  <button id="register_btn" type="button" class="btn btn-default">ตรวจสอบ</button>
		  <span class="check_fail"></span>
		</form>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('#lobin_btn').click(function(){
		$('.login_fail').html('<img src="themes/msosocial/images/loading.gif">');
		$.post('org/ajax_login',{
			'username' : $('input[name=username]').val(),
			'password' : $('input[name=password]').val(),
			'status' : $('input[name=status]').val()
		},function(data){
			if(data == 'ล้อกอินสำเร็จ'){
				window.location.href = 'org/member';
			}else{
				$('.login_fail').html(data);
			}
		});
	});
	
	$('#register_btn').click(function(){
		$('.check_fail').html('<img src="themes/msosocial/images/loading.gif">');
		$.post('org/ajax_register',{
			'organ_name' : $('input[name=organ_name]').val()
		},function(data){
			if(data == 'success'){
				window.location.href = 'org/reg_member';
			}else{
				$('.check_fail').html(data);
			}
		});
	});
});
</script>
