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
			
				$receive_date = date('d/m/', @strtotime($item['receive_date'])).(date('Y', @strtotime($item['receive_date']))+543);
				$date_appoved = date('d/m/', @strtotime($item['date_appoved'])).(date('Y', @strtotime($item['date_appoved']))+543);
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
			      	  		switch ($item['project_status']) {
								case '1':
									$status_title = '<span title="(โครงการที่มีแนวคิดหรือนโยบายใหม่ไม่เคยทำมาก่อน)">โครงการริเริ่มใหม่ </span>';
									break;
								
								case '2':
									$status_title = '<span title="(โครงการที่ไม่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นมาก่อน)">โครงการใหม่ </span>';
									break;
								
								case '3':
									$status_title = '<span title="(โครงการที่เคยดำเนินการในพื้นที่ หรือกลุ่มเป้าหมายนั้นแล้ว และต้องการดำเนินการต่อ โดยจะต้องมีทุนเพื่อใช้ในการดำเนินงานตามโครงการนี้อยู่แล้วบางส่วน)">โครงการเดิม</span>';
									break;
																	
								default:
									$status_title = 'รอผล';
									break;
							}
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