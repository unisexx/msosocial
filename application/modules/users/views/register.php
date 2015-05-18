
<div id="title-blank">สมัครสมาชิก</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">สมัครสมาชิก</span> 

</div>
        
<div class="title-report">สมัครสมาชิก</div>

<form class="form-horizontal"  id="regisform" method="post" action="users/signup">


  <div class="form-group">
    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" autocomplete="off" style="width:600px;">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" autocomplete="off" style="width:600px;">
    </div>
  </div>
  
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
      <div class="checkbox">
        <label>
          <input type="checkbox" name="chRemember"> Remember me
        </label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">สมัครสมาชิก</button>
    </div>
  </div>
  
</form>