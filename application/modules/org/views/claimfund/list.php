<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;">
	<button class="btn btn-primary" id="btnMemberForm" onclick="memberForm();">ยื่นแบบฟอร์มขอรับสนับสนุน</button>
</div>
<h3 style="margin-top:0; color:#393">รายการขอรับเงินสนับสนุนโครงการ</h3>
	
<table class="tblList">
	<thead>
	    <tr>
		    <th>#</th>
		    <th>รหัสโครงการ</th>
		    <th>ชื่อโครงการ</th>
		    <th>สถานะ</th>
		    <th>วันที่</th>
		    <th>ผลพิจาราณาล่าสุด</th>
		    <th>วันที่</th>
		    <th>ดู/แก้ไข</th>
	    </tr>
   </thead>
   <tbody>
	    <?php $no = 0 ; foreach($rs as $item) { $no++; 
	    	$item['resultt'] = (empty($item['resultt']))?'-':$item['resultt'];
	    	?>
	    	<tr>
			    <td><?php echo $no; ?></td>
			    <td><?php echo @$item['project_code']; ?></td>
			    <td><?php echo @$item['project_name']; ?></td>
			    <td><span class="statusNew"><?php echo $item['project_status']; ?></span></td>
			    <td><?php echo @$item['receive_date']; ?></td>
			    <td><?php echo @$item['resultt']; ?></td>
			    <td><?php echo @$item['date_appoved']; ?></td>
			    <td><img src="media/images/view.png" width="24" height="23" /></td>
			    <!-- <td><img src="media/images/edit.png" width="16" height="16" /></td> -->
		    </tr>
	    <?php } ?>
    </tbody>
</table>
<? echo $pagination; ?>
