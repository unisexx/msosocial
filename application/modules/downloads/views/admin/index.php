<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร">หน้าแรก</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active"><?php echo $rs->module ?></li>
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
	<!-- <div class="page-header position-relative">
		<h1>
			ภาพกิจกรรม
			<small>
				<i class="icon-double-angle-right"></i>
				ดาวน์โหลดแบบฟอร์ม &amp; Dynamic Tables
			</small>
		</h1>
	</div> -->
	<!--/.page-header-->
	
	
	
	
	
	                    <?php
							if($rs->module!=""){$module=$rs->module;} 
							if($rs->category_id!=""){$category_id=$rs->category_id;} 
						?>
	
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			
			<div class="row-fluid">
				<!-- <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->
				<div class="table-header">
					ดาวน์โหลดแบบฟอร์ม
				</div>

				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th width="70">แสดง</th>
							<th>หัวข้อ</th>
							<th><a class="btn btn-mini iframe" href="categories/admin/categories/downloads?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
							<th width="90">
								<a class="btn btn-mini btn-info" href="downloads/admin/downloads/form?module=<?=$module?>&category_id=<?=$category_id?>">เพิ่มรายการ</a>
							</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($rs as $row): ?>
						<tr>
							<td>
								<label>
									<input class="ace-switch" type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?>/>
									<span class="lbl"></span>
								</label>
							</td>
							<td><?=$row->title?></td>
							<td><?=$row->category->name?></td>
							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="green" href="downloads/admin/downloads/form/<?php echo $row->id ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a class="red" href="downloads/admin/downloads/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
										<i class="icon-trash bigger-130"></i>
									</a>
								</div>

								<div class="hidden-desktop visible-phone">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
											<i class="icon-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
											<li>
												<a href="downloads/admin/downloads/delete/<?=$row->id?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="icon-edit bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="downloads/admin/downloads/delete/<?=$row->id?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
													<span class="red">
														<i class="icon-trash bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				
			<!--PAGE CONTENT ENDS-->
		</div>
	</div>
</div>


<!--page specific plugin scripts-->
<script src="themes/ace_admin/assets/js/jquery.colorbox-min.js"></script>
<script src="themes/ace_admin/assets/js/jquery.dataTables.min.js"></script>
<script src="themes/ace_admin/assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(function() {
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	
	var oTable1 = $('#sample-table-2').dataTable( {
	"aoColumns": [
      { "bSortable": false },
      null,
	  null,
	  { "bSortable": false }
	] } );
	
	
	$('table th input:checkbox').on('click' , function(){
		var that = this;
		$(this).closest('table').find('tr > td:first-child input:checkbox')
		.each(function(){
			this.checked = that.checked;
			$(this).closest('tr').toggleClass('selected');
		});
			
	});


	$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('table')
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		var w2 = $source.width();

		if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
		return 'left';
	}
	
})
</script>