<div id="title-blank">ลืมรหัสผ่าน</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">ลืมรหัสผ่าน</span> 

</div>
<div class="title-report">ลืมรหัสผ่าน</div>

<br>


<form class="form-horizontal"  id="forget" method="post" action="users/forget_pass_save">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" autocomplete="off" style="width:600px;">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputCaptcha" class="col-sm-2 control-label">Captcha</label>
    <div class="col-sm-10">
     <img src="users/captcha" /><Br>
      <input type="text" class="form-control" id="inputCaptcha" name="captcha" placeholder="Captcha" autocomplete="off" style="width:200px;">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">ยืนยัน</button>
    </div>
  </div>
  
</form>