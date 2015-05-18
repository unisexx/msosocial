<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">เว็บไซต์แนะนำ</li>
	</ul><!--.breadcrumb-->

	<div class="nav-search" id="nav-search">
		<form class="form-search" />
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
				<i class="icon-search nav-search-icon"></i>
			</span>
		</form>
	</div><!--#nav-search-->
</div>

<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			เว็บไซต์แนะนำ
			<small>
				<i class="icon-double-angle-right"></i>
				ฟอร์ม
			</small>
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" method="post" action="galleries/admin/categories/save/<?php echo $category->id ?>" enctype="multipart/form-data">
					
					<!-- <div class="control-group">
						<label class="control-label">รูปภาพ</label>
	
						<div class="controls">
							<div class="span4" style="margin-bottom:-15px;">
								<?php if($weblink->image != ""):?><img src="uploads/weblink/<?=$weblink->image?>" width="120"><?php endif;?>
								<input type="file" name="image" id="id-input-file-2" />
							</div>
						</div>
					</div> -->
					
					<div class="control-group">
						<label class="control-label">ชื่ออัลบั้ม</label>
	
						<div class="controls">
							<input class="input-xxlarge" type="text" name="name" value="<?php echo $category->name?>"/>
						</div>
					</div>
					
					
					<div class="form-actions">
						<?php echo form_current() ?>
						<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
						<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
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
<script type="text/javascript">
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