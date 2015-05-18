<div class="page-content">
	<div class="page-header position-relative">
		<h1>
			หมวดหมู่
			<small>
				<i class="icon-double-angle-right"></i>
				ฟอร์ม
			</small>
		</h1>
	</div><!--/.page-header-->

	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" method="post" action="categories/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
					
					<div class="control-group">
						<label class="control-label">ชื่อหมวดหมู่</label>
	
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