<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;">
	<button class="btn btn-primary" id="btnMemberForm" onclick="memberForm();">ยื่นแบบฟอร์มขอรับสนับสนุน</button>
</div>
<h3 style="margin-top:0; color:#393">รายการขอรับเงินสนับสนุนโครงการ</h3>
	
<table class="tblList">
	<thead>
	    <tr>
		    <th>#</th>
		    <th style="width: 10%;">รหัสโครงการ</th>
		    <th style="width: 30%;">ชื่อโครงการ</th>
		    <th style="width: 10%;">สถานะ</th>
		    <th>วันที่รับ</th>
		    <th>ผลพิจาราณาล่าสุด</th>
		    <th>วันที่ส่ง</th>
		    <th>ดู/แก้ไข</th>
	    </tr>
   </thead>
   <tbody>
	    <?php 
	    	/*
			   $type 
			   1 = กองทุนเด็กฯ
			   2 = กองทุนส่งเสริมฯ
			/**/
	    	$no = $data['no'] = (empty($_GET['page']))?0:($_GET['page']-1)*20; 
	        foreach($rs as $item) { $no++; 
	    	$item['resultt'] = (empty($item['resultt']))?'-':$item['resultt'];
	    	?>
	    	<tr>
			    <td><?php echo $no; ?></td>
			    <td>
			    	<?php 
			    		 if ($type == '1') {
			    	  		echo @$item['project_code']; 
			     	  	 } else {
			     	  	 	$item['fpsid'] = $item['id'];
			     	  	 	echo @$item['project_id']; 
						 }
			    	?>
			    </td>
			    <td><?php echo @$item['project_name']; ?></td>
			    <?php 
			      	  if ($type == '1') {
			    	  		$status_title = $item['project_status'];
			     	  } else {
			    			$status_title = '';
			    			if ($item['status'] == '1') {
			    				$status_title = 'อนุมัติ';
			    			} else {
			    				switch ($item['pre_status']) {
									case '1':
										$status_title = 'ส่งคืนโครงการ';
										break;
									
									case '2':
										$status_title = 'ส่งต่อโครงการเนื่องจากกลุ่มเป้าหมายสอดคล้องกับกองทุนอื่น';
										break;
									
									case '3':
										$status_title = 'เข้าหลักเกณฑ์';
										break;
									
									case '4':
										$status_title = 'ขอถอนโครงการ';
										break;
										
									default:
										$status_title = 'รอผลพิจารณาเบื้องต้นของเจ้าหน้าที่';
										break;
								}
			    			}
						
					  }
			    ?>
			    		<td><span class="statusNew"><?php echo $status_title; ?></span></td>
			    <td><?php echo @$item['receive_date']; ?></td>
			    <td><?php echo @$item['resultt']; ?></td>
			    <td><?php echo @$item['date_appoved']; ?></td>
			    <!-- <td><img src="media/images/view.png" width="24" height="23" /></td> -->
			    <td><img src="media/images/edit.png" width="16" height="16" style="cursor: pointer;" onclick="memberForm(<?php echo $type; ?>, <? echo $item['fpsid']; ?>);"/></td>
			    <!-- <td><img src="media/images/edit.png" width="16" height="16" /></td> -->
		    </tr>
	    <?php } ?>
    </tbody>
</table>
<input type="hidden" name="fund_type" value="<?php echo $type; ?>" />
<div class="pagination_claimfund" style="display: inline-block; width: 100%">
	<? echo $pagination; ?>
</div>