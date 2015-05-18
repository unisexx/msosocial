<div class="breadcrumbs" id="breadcrumbs">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home home-icon"></i>
			<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร">Home</a>

			<span class="divider">
				<i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">หนังสือ</li>
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
			Tables
			<small>
				<i class="icon-double-angle-right"></i>
				Static &amp; Dynamic Tables
			</small>
		</h1>
	</div><!--/.page-header-->
	
	<div class="row-fluid">
		<div class="span12">
			<!--PAGE CONTENT BEGINS-->
			
			<div class="row-fluid">
				<div class="span12">
					
					<table class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th width="70">แสดง</th>
						<th>หัวข้อ</th>
						<th>url</th>
						<th>เปิดอ่าน</th>
						<th>หมวดหมู่</th>
						<th width="90">
							<a class="btn btn-mini btn-info" href="books/admin/books/form">เพิ่มรายการ</a>
						</th>
					</tr>
					</thead>
					<?php foreach($books as $row): ?>
					<tr>
						<td>
							<!-- <input type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?> /> -->
							<label>
								<input class="ace-switch" type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?>/>
								<span class="lbl"></span>
							</label>
						</td>
						<td><?=$row->title?></td>
						<td><?php echo $row->url?></td>
						<td><?=$row->counter?></td>
						<td><?=$row->category->name?></td>
						<td>
							<a href="books/admin/books/form/<?php echo $row->id?>">
								<button class="btn btn-mini btn-info">
									<i class="icon-edit bigger-120"></i>
								</button>
							</a>
							
							<a href="books/admin/books/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
								<button class="btn btn-mini btn-danger">
									<i class="icon-trash bigger-120"></i>
								</button>
							</a>
						</td>
						</tr>
					<?php endforeach; ?>
					</table>
					
					<?php echo $books->pagination()?>
					
				</div><!--/span-->
			</div><!--/row-->
				
			<!--PAGE CONTENT ENDS-->
		</div>
	</div>
</div>