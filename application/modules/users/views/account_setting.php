<div id="title-blank">แก้ไขข้อมูลส่วนตัว</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">แก้ไขข้อมูลส่วนตัว</span> 

</div>

<div class="title-report">แก้ไขข้อมูลส่วนตัว</div>

<br>

<form class="form-horizontal"  id="userSeting" method="post" action="users/account_setting_save">

  
    <div class="form-group">
    <label for="inputImg" class="col-sm-2 control-label">รูปโปรไฟล์</label>
    <div class="col-sm-10">
    
          <?=thumb(avatar(user_login()->id),120,120,1,"class='img-polaroid' style='margin:0 0 10px 0;'");?>
          <br>
          <input type="text" name="image" id="inputImg" class="input-xxlarge" placeholder="ลิ้งรูปภาพ"  value="<?=$user->image?>">
          
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputCaptcha" class="col-sm-2 control-label">ลายเซ็น (เว็บบอร์ด)</label>
    <div class="col-sm-10">

            <?php echo uppic_mce();?>
          <textarea name="detail" cols="20" class="editor[pm]"><?php echo $user->signature?></textarea>
      
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
          <input type="hidden" name="created" value="<?=$user->created?>" >
      <button type="submit" class="btn btn-default">บันทึก</button>
    </div>
  </div>
  
</form>
