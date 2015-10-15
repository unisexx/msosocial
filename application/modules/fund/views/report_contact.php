<div id="title-blank">รายงานการเซ็นสัญญา</div>
<div id="breadcrumb"><a href="#">หน้าแรก</a> > <span class="b1"><a href="fund/report_contact">รายงานการเซ็นสัญญา</a></span></div>
<div id="page">
	<h1>รายงานการเซ็นสัญญา</h1>
	
	<div class="row col-md-4" style="margin-bottom: 10px;">
	<select class="form-control" name="contact_type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
		<option value="http://fund.m-society.go.th/fund/report_contact?contact_type=1" <?=(@$_GET['contact_type']==1)?"selected='selected'":'';?>>กองทุนคุ้มครองเด็กรายโครงการ</option>
		<option value="http://fund.m-society.go.th/fund/report_contact?contact_type=2" <?=(@$_GET['contact_type']==2)?"selected='selected'":'';?>>กองทุนส่งเสริมการจัดสวัสดิการสังคม</option>
		<option value="http://fund.m-society.go.th/fund/report_contact?contact_type=3" <?=(@$_GET['contact_type']==3)?"selected='selected'":'';?>>กองทุนป้องกันค้ามนุษย์รายโครงการ</option>
	</select>
	</div>
	
	<?if($_GET['contact_type'] == 1):?>
	<table class="table table-bordered">
		<tr>
	  		<th style="width: 15px;" >ลำดับ</th>
	  		<th>สัญญาเลขที่</th>
	  		<th>ชื่อองค์กร</th>
	  		<th>ชื่อโครงการ</th>
	  		<th>เมื่อวันที่</th>
	  		<th>จำนวนเงิน</th>
	  		<!-- <th>สถานะ</th> -->
	  		<!-- <th>พิมพ์</th> -->
	  	</tr>
		<?php 
			//--Empty data.
			echo (empty($variable))?'<tr> <td colspan="8" class="text-center" >- ไม่มีข้อมูล -</td> </tr>':null;

			foreach ($variable as $key => $value): 
				$value['contract_status'] = (empty($value['contract_status']))?1:$value['contract_status'];
		?>
			<tr>
				<td><?=$key+1?></td>
				<td><?=$value['project_code']?></td>
				<td><?=$value['organization']?></td>
				<!-- <td><?=anchor('fund/project/contract/form/'.$value['id'], $value['project_name'])?></td> -->
				<td><?=$value['project_name']?></td>
				<td><?=db_to_th($value['date_appoved'], false)?></td>
				<td><?=number_format((empty($value['budget_project']))?0:$value['budget_project'], 2)?></td>
				<!-- <td><?=$value['contract_status']?></td>';
				<td><?echo ($value['contract_status'] == 4)?anchor('fund/project/contract/report_print/'.$value['id'], '<img src="http://boffice.m-society.go.th/bo_ppt/fund/images/ico_print.png">'):null;?></td> -->
			</tr>
		<?endforeach;?>
	</table>
	<?elseif($_GET['contact_type'] == 2):?>
	<table class="table table-bordered">
		  <tr>
		    <th align="left">ลำดับ</th>
		    <th align="left">สัญญาเลขที่</th>
		    <th align="left">ชื่อองค์กร</th>
		    <th align="left">ชื่อโครงการ</th>
		    <!-- <th align="left">ระบบการจัดสรร</th> -->
		    <th align="left">เมื่อวันที่</th>
		    <th align="left">จำนวนเงิน</th>
		    <!-- <th align="left">สถานะ</th>
		    <th align="left">พิมพ์</th> -->
		  </tr>
		  <?php foreach ($variable as $key => $value):?>
		    <tr>
		      <td><?php echo $key+1; ?></td>
		      <td nowrap="nowrap"><?php echo @$value['contract_no']; ?></td>
		      <td><?php echo (empty($value['agency_name']))?$value['w_agency_name']:$value['agency_name']; ?></td>
		      <td><?php echo (empty($value['project_name']))?$value['w_project_name']:$value['project_name']; ?></td>
		      <!-- <td><?php echo @$value["project_system_name"]?></td> -->
		      <td><?php echo db_to_th(@$value["contract_date"], false); ?></td>
		      <td><?php echo @number_format((empty($value["approve_amount"]))?$value['approve_amount']:$value['w_approve_amount'], 2); ?></td>
		      <!-- <td>
		          <?php 
		              $img1 = '<img src="images/fund/icon/ico_wait.png" alt="" width="32" height="32" class="vtip" title="รอทำสัญญา" />';
		              $img2 = '<img src="images/fund/icon/document.png" width="32" height="32"/>';
		              echo (empty($value['id']))?$img1:$img2;
		          ?>
		          
		      </td>
		      <td>
		        <?php if (!empty($value['id'])) { ?>
		                <a href="fund/welfare/contract/prints/<?php echo $value['id']; ?>" class="vtip" title="พิมพ์สัญญา"><img src="images/fund/ico_print.png" width="24" height="24" /></a>
		        <?php } ?>
		      </td> -->
		    </tr>
		  <?php endforeach; ?>
		</table>
		<?elseif($_GET['contact_type'] == 3):?>
		<table class="table table-bordered">
		<tr>
		  <th align="left">ลำดับ</th>
		  <th align="left">สัญญาเลขที่</th>
		  <th align="left">ชื่อองค์กร</th>
		  <th align="left">ชื่อโครงการ</th>
		  <th align="left">เมื่อวันที่</th>
		  <th align="left">จำนวนเงินที่ขอรับ</th>
		  <th align="left">จำนวนเงินที่อนุมติ</th>
		  <!-- <th style="width: 60px; text-align: center">สถานะ</th>
		  <th align="left" style="width: 100px;">พิมพ์</th> -->
		</tr>
		<?php foreach ($variable as $key => $value) {?>
			<tr>
			  <td><?php echo $key+1; ?></td>
			  <td><?php echo (empty($value['id']))?'':$value['contract_no'].'/'.$value['contract_budget_year']; ?></td>
			  <td><?php echo (empty($value['agency_name']))?$value['pj_agency_name']:$value['agency_name']; ?></td>
			  <td><?php echo (empty($value['project_name']))?$value['pj_project_name']:$value['project_name']; ?></td>
			  <td><?php echo db_to_th($value['contract_date'], FALSE); ?></td>
			  <td><?php echo (empty($value['budget_total']))?'':number_format($value['budget_total'], 2); ?></td>
			  <td><?php echo (empty($value['approve_amount']))?'':number_format($value['approve_amount'], 2); ?></td>
			  <!-- <td style="text-align: center;">
			  	  <?php 
			  	  	
			  	  	$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย',5=>'พ.ค.',6=>'มิ.ย.',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
					$title_img = (empty($value['id']))?'':$month_th[@$value['month_start']*1].' '.substr(@$value['year_start'], 2).' - '.$month_th[@$value['month_end']*1].' '.substr(@$value['year_end'], 2);
					$img_1 = '<img src="images/fund/ico_warning2.png" alt="" width="32" height="32" class="vtip" title="'.$title_img.'" />';
					$img_2 = '<img src="images/fund/icon/dialog_warning.png" alt="" width="32" height="32" class="vtip" title="'.$title_img.'" />';
					$img_3 = '<img src="images/fund/icon/calendar_2.png" alt="" width="32" height="32" class="vtip" title="'.$title_img.'" />';
					$img_4 = '<img src="images/fund/icon/ico_wait.png" alt="" width="32" height="32" class="vtip" title="รอทำสัญญา" />';
					
			  	  	if (empty($value['id'])) {
			  	  		echo $img_4;
			  	  	} else {
			  	  		if (@$value['date_show'] == '0' && @$value['alert_status_before'] == '1' && ($date_chk >= '15' || $date_chk == '1')) {
			  	  			echo $img_1;
			  	  		} else if (@$value['date_end_show'] == '0' && @$value['alert_status_after'] == '1' && ($date_chk >= '15' || $date_chk == '1')) {
			  	  			echo $img_2;
			  	  		} else {
			  	  			echo $img_3;
			  	  		}
			  	  	}
			  	  ?>
			  </td>
			  <td>
			  	  <?php if (!empty($value['id'])) { ?>
				  	  <a href="fund/trafficking/project_contract/prints/<?php echo @$value['id']; ?>" class="vtip" title="พิมพ์สัญญา"><img src="images/fund/ico_print.png" width="24" height="24" /></a>
					  <?php if (empty($value['track_id'])) { ?>
					  	<a href="fund/trafficking/project_contract/delete/<?php echo @$value['id']; ?>" class="btn_delete vtip" title="ลบรายการนี้"><img src="images/btn_delete.gif"></a>
			  	  	  <?php } ?>
			  	  <?php } ?>
			  </td> -->
			</tr>
		<?php } ?>
	</table>
	<?endif;?>


</div>