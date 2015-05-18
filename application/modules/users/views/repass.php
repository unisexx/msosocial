<div id="title-blank">ลืมรหัสผ่าน</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">ลืมรหัสผ่าน</span> 

</div>
<div class="title-report">ลืมรหัสผ่าน</div>

<br>

<form class="form-horizontal"  id="repass" method="post" action="users/repass_save">

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" autocomplete="off" style="width:400px;">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Re Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="_password" placeholder="Re Password" autocomplete="off" style="width:400px;">
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
      <input type="hidden" name="auth_key" value="<?=$user->auth_key?>">
      <button type="submit" class="btn btn-default">ยืนยัน</button>
    </div>
  </div>
  
</form>