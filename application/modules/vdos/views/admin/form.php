<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">สื่อมัลติมีเดีย/วีดีโอ</li>
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
			วิดีโอ
			<!-- <small>
				<i class="icon-double-angle-right"></i>
				<?=@$_GET['category']?>
			</small> -->
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" method="post" action="vdos/admin/vdos/save/<?php echo $rs->id ?>" enctype="multipart/form-data">
					
					<div class="control-group">
						<label class="control-label">หัวข้อ</label>
						<div class="controls">
							<input class="input-xxlarge" type="text" name="title" value="<?php echo $rs->title?>"/>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Youtube URL</label>
						<div class="controls">
							<input class="input-xxlarge" type="text" name="url" value="<?php echo $rs->url?>"/>
							<div class="show_vid" style="margin-top:10px;"></div>
						</div>
					</div>
					
					<!-- <div class="control-group">
						<label class="control-label">ไฟล์แนบ</label>
						<div class="controls">
							<input class="input-xxlarge" type="text" name="files" value="<?php echo $rs->files?>"/>
							<input class="btn btn-mini btn-info" type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'file')" />
						</div>
					</div> -->
					
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
	
	
	// YOUTUBE show vid from url
	var text = $('input[name=url]').val();
	if(text != null){
	    $.get('vdos/admin/vdos/ajax_show_vid',{
	    	'url' : text
	    },function(data){
	    	$('.show_vid').html(data);
	    });
	}
	    
	$('input[name=url]').on('paste', function () {
	  var element = this;
	  setTimeout(function () {
	    var text = $(element).val();
	    console.log(text);
	    // do something with text
	    $.get('vdos/admin/vdos/ajax_show_vid',{
	    	'url' : text
	    },function(data){
	    	$('.show_vid').html(data);
	    });
	  }, 100);
	});
});
</script>