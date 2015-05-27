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

<div class="row-fluid">
    <div class="span12">
        <table id="table_report" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                	<th>สิทธิ์การใช้งาน</th>
                    <th><a class="btn btn-mini btn-primary" href="permissions/admin/permissions/form"><i class="icon-pencil"></i> เพิ่มรายการ </a></th>
                </tr>
            </thead>
                                    
            <tbody>
            <?php foreach($user_types as $user_type):?>
                <tr>
                    <td><?php echo $user_type->name?></td>
                    <td>
                        <div class='hidden-phone visible-desktop btn-group'>
                            <a href="permissions/admin/permissions/form/<?php echo $user_type->id?>" class='btn btn-mini btn-info'><i class='icon-edit'></i></a>
                            <a class='btn btn-mini btn-danger' href="permissions/admin/permissions/delete/<?php echo $user_type->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')"><i class='icon-trash'></i></a>
                        </div>
                        <div class='hidden-desktop visible-phone'>
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown"><i class="icon-caret-down icon-only"></i></button>
                                <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <li><a href="permissions/admin/permissions/form/<?php echo $user_type->id?>" class="tooltip-success" data-rel="tooltip" title="Edit" data-placement="left"><span class="green"><i class="icon-edit"></i></span></a></li>
                                    <li><a href="permissions/admin/permissions/delete/<?php echo $user_type->id?>" class="tooltip-error" data-rel="tooltip" title="Delete" data-placement="left" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')"><span class="red"><i class="icon-trash"></i></span> </a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div><!--/span-->
</div><!--/row-->

<!-- PAGE CONTENT ENDS HERE -->
</div>
	</div>
</div>

<!-- inline scripts related to this page -->
<script type="text/javascript">
$(function() {
    var oTable1 = $('#table_report').dataTable( {
    "aoColumns": [
      null,
      { "bSortable": false }
    ] } );
})
</script>
