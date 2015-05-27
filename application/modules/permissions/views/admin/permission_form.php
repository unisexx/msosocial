<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="#">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">สิทธิ์การใช้งาน</li>
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
    <h1>Permission <small><i class="icon-double-angle-right"></i> กลุ่มผู้ใช้งาน & กำหนดสิทธิ์</small></h1>
</div><!--/page-header-->

<div class="row-fluid">
<!-- PAGE CONTENT BEGINS HERE -->
    <form id="validation-form" class="form-horizontal" method="post" action="permissions/admin/permissions/save/<?php echo $user_type->id?>" enctype="multipart/form-data">
        
        <div class="control-group">
		    <label class="control-label" for="username">สิทธิ์การใช้งาน</label>
		    <div class="controls">
		      <?php echo form_input('name', $user_type->name, 'class="span5"'); ?>
		    </div>
		</div>
		
        <?php foreach($module as $key => $item): ?>
			<div class="control-group">
			    <label class="control-label"></label>
			    <div class="controls">
			      	<?php foreach($item['permission'] as $perm): ?>
			      		<label class="checkbox inline">
	                        <input id="<?php echo 'checkbox['.$key.']['.$perm.']'; ?>" type="checkbox" name="<?php echo 'checkbox['.$key.']['.$perm.']'; ?>" value="1" <?php echo (@$rs_perm[$key][$perm]) ? 'checked' : ''; ?> ><span class="lbl"> <?php echo $item['label']; ?></span>
	                    </label>
					<?php endforeach; ?>
			    </div>
			</div>
		<?php endforeach; ?>
        
        <div class="form-actions">
            <button class="btn btn-info" type="submit"><i class="icon-ok"></i> Submit</button>
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset"><i class="icon-undo"></i> Reset</button>
        </div>
        
    </form>
<!-- PAGE CONTENT ENDS HERE -->
	</div>
</div>
</div>

<?=permission('weblink','full')?>
</div>