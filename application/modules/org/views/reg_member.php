<div id="title-blank"> ยืนยันความเป็นองค์กร เพื่อสมัครสมาชิกออนไลน์</div><br>
<h2 style="margin-top:0; color:#CC075F"><?=$organ_name?> (<?=$organ_id_old?>)</h2>

<form action="org/reg_member_save" method="post" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
	    <label class="col-sm-2 control-label">ชื่อ-สกุลผู้ยืนยันความเป็นองค์กร <span class="vald">*</span></label>
	    <div class="col-sm-6">
	      <input type="text" name="name" class="form-control" placeholder="ชื่อและสกุลผู้ยืนยันความเป็นองค์กร" required>
	    </div>
	</div>
	
	<div class="form-group">
    <label class="col-sm-2 control-label">ที่อยู่ <span class="vald">*</span></label>
		<div class="form-inline col-sm-8">
	      <input type="text" class="form-control numInt" name="home_no" value="<?=@$rs['home_no']?>" placeholder="เลขที่" style="width:80px;" required> 
	      <input type="text" class="form-control numOnly" name="moo" value="<?=@$rs['moo']?>" placeholder="หมู่ที่" style="width:80px;" required>
	      <input type="text" class="form-control" name="soi" value="<?=@$rs['soi']?>" placeholder="ตรอก/ซอย" style="width:230px;" required>
	      <input type="text" class="form-control" name="road" value="<?=@$rs['road']?>" placeholder="ถนน" style="width:230px;" required>
	      <?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', 'order by province_name asc'), @$rs['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
		    <span id="ampor">
		    <?php echo form_dropdown('ampor_code', (empty($rs['province_code'])) ? array() : get_option('ampor_code', 'ampor_name', 'act_ampor', 'where province_code = '.$rs['province_code'].' order by ampor_name'), @$rs['ampor_code'], 'class="form-control"', '- เลือกอำเภอ -'); ?>
		    </span>
		    <span id="tumbon">
		    <?php echo form_dropdown('tumbon_code', (empty($rs['ampor_code'])) ? array() : get_option('tumbon_code', 'tumbon_name', 'act_tumbon', 'where province_code = '.$rs['province_code'].' and ampor_code = '.$rs['ampor_code'].' order by tumbon_name'), @$rs['tumbon_code'], 'class="form-control"', '- เลือกตำบล -'); ?>
		    </span>
	      <input type="text" class="form-control fpostel" name="post_code" value="<?=@$rs['post_code']?>" placeholder="รหัสไปรณีย์" style="width:100px;" required>
	    </div>
	</div>
	
	<div class="form-group">
	    <label class="col-sm-2 control-label">โทรศัพท์ / โทรสาร / มือถือ <span class="vald">*</span></label>
	    <div class="form-inline col-sm-8">
	      <input type="text" name="tel" class="form-control" placeholder="เบอร์โทรศัพท์" required> / <input type="text"  name="fax" class="form-control fphone" placeholder="เบอร์โทรสาร" required> / <input type="text"  name="mobile" class="form-control fmobile" placeholder="เบอร์มือถือ" required>
	    </div>
	</div>
	
	<div class="form-group">
	    <label class="col-sm-2 control-label">อีเมล์  <span class="vald">*</span></label>
	    <div class="form-inline col-sm-8">
	      <input type="text" name="email" class="form-control" style="width:300px;" placeholder="ชื่ออีเมล์" required>
	    </div>
	</div>
	
	<div class="form-group" style="margin-left:16%;">
    	<label class="col-sm-12 control-label" style="text-align:left">แนบเอกสารหลักฐาน มาเพื่อประกอบการพิจารณา ดังนี้ <span class="vald">*</span></label>
	</div>
  
	<div class="form-group" style="margin-left:18%;">
	    <div class="form-inline col-sm-12">
	    <div>
	    <p>(๑) สำเนาใบรับรององค์กร</p>
	    <p>(๒) สำเนาบัตรประชาชนผู้ยืนยันความเป็นองค์กร</p>
	    </div>
	    <input class="form-control" type="file" name="filesToUpload[]" multiple="multiple">
		</div>
	</div>
  
	<div class="form-group text-right">
	    <div class="col-sm-offset-2 col-sm-10">
		  <?if($organ_type == 'welfare_benefit'):?>
	      	<input type="hidden" name="act_welfare_benefit_id" value="<?=$organ_id?>">
	      	<input type="hidden" name="act_welfare_type" value="1">
	      <?else:?>
	      	<input type="hidden" name="act_welfare_comm_id" value="<?=$organ_id?>">
	      	<input type="hidden" name="act_welfare_type" value="2">
	      <?endif;?>
	      <input type="hidden" name="status" value="สมัครใหม่">
	      <button class="btn btn-success btn-lg pull-right" type="submit">ส่งข้อมูลยืนยัน</button>
	    </div>
	</div>
  
</form>

<script type="text/javascript">
$(document).ready(function(){
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
