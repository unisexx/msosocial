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
	
	
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			
			<div class="row-fluid">
				<!-- <h3 class="header smaller lighter blue">jQuery dataTables</h3> -->
				<div class="table-header">
					หมวดหมู่
				</div>

				<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ชื่อ</th>
							<th width="90">
								<a class="btn btn-mini btn-info" href="categories/admin/categories/<?php echo $module?>/form">เพิ่มรายการ</a>
							</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($categories as $row): ?>
						<tr>
							<td><?php echo $row->name?></td>
							<td class="td-actions">
								<div class="hidden-phone visible-desktop action-buttons">
									<a class="green" href="categories/admin/categories/<?php echo $module ?>/form/<?php echo $row->id ?>">
										<i class="icon-pencil bigger-130"></i>
									</a>

									<a class="red" href="categories/admin/categories/delete/<?php echo $row->id?>/<?php echo $row->module?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
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
												<a href="categories/admin/categories/<?php echo $module ?>/form/<?php echo $row->id ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="icon-edit bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="categories/admin/categories/delete/<?php echo $row->id?>/<?php echo $module ?>" class="tooltip-error" data-rel="tooltip" title="Delete" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
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