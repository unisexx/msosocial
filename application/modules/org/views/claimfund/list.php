<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;">
	<button class="btn btn-primary" id="btnMemberForm" onclick="memberForm(<?php echo $type; ?>);">ยื่นแบบฟอร์มขอรับสนับสนุน</button>
</div>
<h3 style="margin-top:0; color:#393">รายการขอรับเงินสนับสนุนโครงการ</h3>

<table class="tblList">
	<thead>
	    <tr>
		    <th>#</th>
		    <th style="width: 10%;">รหัสโครงการ</th>
		    <th style="width: 30%;">ชื่อโครงการ</th>
		    <th style="width: 15%;">สถานะ</th>
		    <th>วันที่รับ</th>
		    <th>ผลพิจาราณาล่าสุด</th>
		    <th>วันที่ส่ง</th>
		    <th>ดู/แก้ไข</th>
	    </tr>
   </thead>
   <tbody>
	    <?php 
	    	if(empty($rs)) {
	    		echo '<tr><td colspan="8" style="text-align:center; color:#aaa;"> ไม่พบข้อมูล </td></tr>';
	    	}
	    	/*
			   $type 
			   1 = กองทุนเด็กฯ
			   2 = กองทุนส่งเสริมฯ
			/**/
	    	$no = $data['no'] = (empty($_GET['page']))?0:($_GET['page']-1)*20; 
	        foreach($rs as $item) { $no++; 
	    		$item['resultt'] = (empty($item['resultt']))?'-':$item['resultt'];
			
				$receive_date = (empty($item['receive_date']))?'-':date('d/m/', @strtotime($item['receive_date'])).(date('Y', @strtotime($item['receive_date']))+543);
				$date_appoved = date('d/m/', @strtotime($item['date_appoved'])).(date('Y', @strtotime($item['date_appoved']))+543);
	    	?>
	    	<tr>
			    <td><?php echo $no; ?></td>
			    <td>
			    	<?php 
			    		 if ($type == '1') {
			    	  		echo @$item['project_code_text'].'/'.substr('000'.$item['project_code_number'], -3, 3); 
			     	  	 } else {
			     	  	 	$item['fpsid'] = $item['id'];
			     	  	 	echo @$item['project_id']; 
						 }
			    	?>
			    </td>
			    <td><?php echo @$item['project_name']; ?></td>
			    <?php 
			      	  if ($type == '1') {
			      	  		$statusText = array(
			      	  			1 => '<span title="รายการใหม่" style="background:#f90; padding:2px 10px; font-weight:bold; border-radius:4px;">รายการใหม่ </span>'
			      	  			,2 => '<span title="กลับไปแก้ไข" style="background:#999; padding:2px 10px ;font-weight:bold; border-radius:4px;">กลับไปแก้ไข </span>'
			      	  			,3 =>'<span title="รอผลพิจารณา" style="background:#0C0; padding:2px 10px ;font-weight:bold; border-radius:4px;">รอผลพิจารณา</span>'
							);
							$status_title = (empty($statusText[$item['status']]))?'-':$statusText[$item['status']];
			     	  } else {
			    			$status_title = '';
			    			if ($item['status'] == '1') {
			    				$status_title = 'อนุมัติ';
			    			} else {
			    				switch ($item['web_status']) {
									case '1':
										$status_title = 'รอผลพิจารณา';
										break;									
									case '2':
										$status_title = 'กลับไปแก้ไข';
										break;								
									default:
										$status_title = 'รายการใหม่';
										break;
								}
			    			}
						
					  }
			    ?>
			    <td><span class="statusNew"><?php echo $status_title; ?></span></td>
			    <td><?php echo @$receive_date; ?></td>
			    <?
			    	if($type == 1) {
			    		switch (@$item['resultt']) {
							case '1':
								$result = "อนุมัติ";
								break;
							case '2':
								$result = "อนุมัติในหลักการ ";
								break;
							case '3':
								$result = "ขอรายละเอียดเพิ่มเติม";
								break;
							case '4':
								$result = "ไม่อนุมัติ";
								break;
							case '5':
								$result = "ส่งเข้าพิจารณาในระบบปกติ (ส่วนกลาง)";
								break;
							default:
								$result = "รอการพิจารณา";
								break;
						}
						#$result = @$item['resultt'];
			    	} else {
			    		$result = @$item['result'];
			    	}
					
					
			    ?>
			    <td><?php echo @$result; ?></td>
			    <td><?php echo (empty($item['date_appoved']))?'-':$date_appoved; ?></td>
			    <!-- <td><img src="media/images/view.png" width="24" height="23" /></td> -->
			    <td>
			    	<?php if($item['status'] == 2) { ?>
			    		<img src="media/images/edit.png" width="16" height="16" style="cursor: pointer;" onclick="memberForm(<?php echo $type; ?>, <? echo $item['id']; ?>);"/>
			    	<?php } else { ?>
			    		<img src="media/images/view.png" width="16" height="16" style="cursor: pointer;" onclick="memberForm(<?php echo $type; ?>, <? echo $item['id']; ?>);"/>
			    	<?php } ?>
			    </td>
			    <!-- <td><img src="media/images/edit.png" width="16" height="16" /></td> -->
		    </tr>
	    <?php } ?>
    </tbody>
</table>
<input type="hidden" name="fund_type" value="<?php echo $type; ?>" />
<div class="pagination_claimfund" style="display: inline-block; width: 100%">
	<? echo $pagination; ?>
</div>