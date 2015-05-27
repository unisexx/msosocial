<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">ฟอร์ม</li>
	</ul><!--.breadcrumb-->

	<!-- <div class="nav-search" id="nav-search">
		<form class="form-search" />
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="icon-search nav-search-icon"></i>
			</span>
		</form>
	</div> -->
	<!--#nav-search-->
</div>

<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			สมาชิก
			<!-- <small>
				<i class="icon-double-angle-right"></i>
				<?=@$_GET['category']?>
			</small> -->
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" method="post" action="users/admin/users/save/<?php echo $user->id?>" enctype="multipart/form-data">
					
					<!-- <div class="control-group">
			            <label class="control-label" for="id-input-file-1">รูปภาพ</label>
			            <div class="controls">
			                <?php if($user->image):?>
			                <img class="img" style="width:100px;" src="<?php echo (is_file('uploads/user/'.$user->image))? 'uploads/user/'.$user->image : 'media/images/webboard/noavatar.gif' ?>"  /> <br><br>
			                <?php endif;?>
			                <div class="input-xxlarge">
			                    <input type="file" id="id-input-file-1" name="image"/>
			                </div>
			            </div>
			        </div> -->
					
					<!-- select box -->
			        <div class="control-group">
			            <label class="control-label" for="username">กลุ่ม</label>
			            <div class="controls">
			                <?php echo form_dropdown('user_type_id',get_option('id','name','user_types','order by id asc'),$user->user_type_id,'');?>
			            </div>
			        </div>
					
					<div class="control-group">
					    <label class="control-label" for="name">ชื่อ - นามสกุล</label>
					    <div class="controls">
					      <input id="name" class="span5" type="text" name="name" value="<?php echo $user->name?>">
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label" for="email">อีเมล์</label>
					    <div class="controls">
					      <input type="text" id="email" class="span5" name="email" value="<?php echo $user->email?>">
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label" for="username">ยูสเซอร์เนม</label>
					    <div class="controls">
					      <input id="username" type="text" name="username" value="<?php echo $user->username?>">
					    </div>
					</div>
					
					<div class="control-group">
				        <label class="control-label" for="inputPass">รหัสผ่าน</label>
				        <div class="controls">
				          <input type="text" name="password" id="inputPass"  value="<?php echo $user->password?>">
				        </div>
				    </div>
					
					<div class="form-actions">
						<?php echo form_referer() ?>
						<button class="btn btn-large btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>บันทึก
						</button>

						&nbsp; &nbsp; &nbsp;
						<button class="btn btn-large" type="reset">
							<i class="icon-undo bigger-110"></i>รีเซ็ต
						</button>
					</div>
				
				</form>
				
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div>

<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
$(function() {
	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
		no_file:'ไม่มีไฟล์แนบ...',
		btn_choose:'แนบไฟล์',
		btn_change:'เปลี่ยน',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	});
});
</script>