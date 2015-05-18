<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">ภาพกิจกรรม/วิดีโอ</li>
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
			ภาพกิจกรรม
			<small>
				<i class="icon-double-angle-right"></i>
				<?php echo $categories->name ?>
			</small>
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			
			<form action="galleries/admin/galleries/save/<?php echo $categories->id ?>" method="post" enctype="multipart/form-data">
				<div class="widget-box">
					<div class="widget-header">
						<h4>อัพโหลดภาพ</h4>
					</div>
		
					<div class="widget-body">
						<div class="widget-main">
							<input multiple="" type="file" id="id-input-file-3" name="filesToUpload[]" />
							<!-- <label>
								<input type="checkbox" name="file-format" id="id-file-format"/>
								<span class="lbl"> Allow only images</span>
							</label> -->
						</div>
					</div>
				</div>
				
				<div class="form-actions">
					<?php echo form_current() ?>
					<input type='hidden' name="category_id" value="<?php echo $categories->id ?>">
					<input type="hidden" name="category" value="<?=@$_GET['category']?>">
					<button class="btn btn-large btn-info" type="submit">
						<i class="icon-ok bigger-110"></i>บันทึก
					</button>

					&nbsp; &nbsp; &nbsp;
					<!-- <button class="btn btn-large" type="reset">
						<i class="icon-undo bigger-110"></i>รีเซ็ต
					</button> -->
				</div>
					
			</form>
			<!-- end form -->
			
			
			
			
			<ul class="ace-thumbnails">
				<?foreach($galleries as $item):?>
				<li>
					<a href="uploads/gallery/<?=$item->image?>" data-rel="colorbox">
						<img src="uploads/gallery/<?=$item->image?>" style="height:100px;"/>
					</a>

					<div class="tools tools-bottom">
						<a href="#">
							<i class="icon-remove red"></i>
							<input class="imgID" type="hidden" name="id" value="<?=$item->id?>">
						</a>
					</div>
				</li>
				<?endforeach;?>
			</ul>
			
			
			
			
			<!--PAGE CONTENT ENDS-->
		</div><!--/.span-->
	</div><!--/.row-fluid-->
</div>

<!--page specific plugin scripts-->
<script src="themes/ace_admin/assets/js/jquery.colorbox-min.js"></script>

<script>
$(document).ready(function(){
	$('#id-input-file-3').ace_file_input({
		style:'well',
		btn_choose:'Drop files here or click to choose',
		btn_change:null,
		no_icon:'icon-cloud-upload',
		droppable:true,
		thumbnail:'small'
		//,icon_remove:null//set null, to hide remove/reset button
		/**,before_change:function(files, dropped) {
			//Check an example below
			//or examples/file-upload.html
			return true;
		}*/
		/**,before_remove : function() {
			return true;
		}*/
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		}
	
	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});
	
	
	//dynamically change allowed formats by changing before_change callback function
	// $('#id-file-format').removeAttr('checked').on('change', function() {
		// var before_change
		// var btn_choose
		// var no_icon
		// if(this.checked) {
			// btn_choose = "Drop images here or click to choose";
			// no_icon = "icon-picture";
			// before_change = function(files, dropped) {
				// var allowed_files = [];
				// for(var i = 0 ; i < files.length; i++) {
					// var file = files[i];
					// if(typeof file === "string") {
						// //IE8 and browsers that don't support File Object
						// if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
					// }
					// else {
						// var type = $.trim(file.type);
						// if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
								// || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
							// ) continue;//not an image so don't keep this file
					// }
// 					
					// allowed_files.push(file);
				// }
				// if(allowed_files.length == 0) return false;
// 
				// return allowed_files;
			// }
		// }
		// else {
			// btn_choose = "Drop files here or click to choose";
			// no_icon = "icon-cloud-upload";
			// before_change = function(files, dropped) {
				// return files;
			// }
		// }
		// var file_input = $('#id-input-file-3');
		// file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
		// file_input.ace_file_input('reset_input');
	// });
	
	
	// upload image only
	var before_change
	var btn_choose
	var no_icon
	
	btn_choose = "Drop images here or click to choose";
	no_icon = "icon-picture";
	before_change = function(files, dropped) {
		var allowed_files = [];
		for(var i = 0 ; i < files.length; i++) {
			var file = files[i];
			if(typeof file === "string") {
				//IE8 and browsers that don't support File Object
				if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
			}
			else {
				var type = $.trim(file.type);
				if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
						|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
					) continue;//not an image so don't keep this file
			}
			
			allowed_files.push(file);
		}
		if(allowed_files.length == 0) return false;

		return allowed_files;
	}
	var file_input = $('#id-input-file-3');
	file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
	file_input.ace_file_input('reset_input');
	
	
	// color box
	var colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon
	
	
	// delete image
	$('.icon-remove').click(function(){
		var confirm1 = confirm('คุณต้องการลบรูปภาพนี้?');
	    if (confirm1) {
		      var element = $(this);
			$.post('galleries/admin/galleries/delete_image',{
				'id' : element.next('input[class=imgID]').val()
			},function(date){
				element.closest('li').fadeOut( "slow" );
			});
	    } else {
	      return false;
	    }
	    return false;
	});
});
</script>