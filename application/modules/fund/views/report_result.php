<div id="title-blank">รายงานผลการพิจารณา</div>
<div id="breadcrumb"><a href="#">หน้าแรก</a> > <span class="b1"><a href="fund/report_result">รายงานผลการพิจารณา</a></span></div>
<div id="page">
	<h1>รายงานผลการพิจารณา</h1>
	
	<div class="row col-md-6" style="margin-bottom: 10px;">
	<select class="form-control" name="contact_type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
		<option value="http://fund.m-society.go.th/fund/report_result?result_type=1" <?=(@$_GET['result_type']==1)?"selected='selected'":'';?>>กองทุนคุ้มครองเด็กรายบุคคล</option>
		<option value="http://fund.m-society.go.th/fund/report_result?result_type=2" <?=(@$_GET['result_type']==2)?"selected='selected'":'';?>>กองทุนคุ้มครองเด็กรายโครงการ</option>
		<option value="http://fund.m-society.go.th/fund/report_result?result_type=3" <?=(@$_GET['result_type']==3)?"selected='selected'":'';?>>กองทุนส่งเสริมการจัดสวัสดิการสังคม</option>
		<option value="http://fund.m-society.go.th/fund/report_result?result_type=4" <?=(@$_GET['result_type']==4)?"selected='selected'":'';?>>กองทุนเพื่อการป้องกันและปราบปรามการค้ามนุษย์รายโครงการ</option>
		<option value="http://fund.m-society.go.th/fund/report_result?result_type=5" <?=(@$_GET['result_type']==5)?"selected='selected'":'';?>>กองทุนเพื่อการป้องกันและปราบปรามการค้ามนุษย์รายบุคคล</option>
	</select>
	</div>
	
	<?if($_GET['result_type'] == 1):?>
	<table class="table table-bordered">
		<tr>
			<th>ลำดับ</th>
			<th>จังหวัด</th>
			<th>ชื่อผู้รับ (เด็ก)</th>
			<th>ชื่อผู้ขอ</th>
			<th>ผลการพิจารณา</th>
		</tr>
		
		
		<?php if(empty($variable)):?>
		<tr>
			<td colspan="6" class="text-center" >- ไม่มีข้อมูล -</td>
		</tr>
		<?php
			else:
				foreach ($variable as $key => $value):
					$page = 0;
					$status = "รอดำเนินการ";
					
					if(@$_GET["page"]) {
						$page = ($_GET["page"]-1)*20;
					}
					$number = $page+($key+1);
					
					if($value["status"]==0) {
						$status = "รอดำเนินการ";
					}
					if($value["status"]==1) {
						$status = "อนุมัติ";
					}
					if($value["status"]==2) {
						$status = "ไม่อนุมัติ";
					}
					
					if($key%2==0) {
						$odd = " odd";
					} else {
						$odd = null;
					}
		?>
		<tr class="cursor<?php echo $odd?>" >
			<td><?php echo $number?></td>
			<td><?php echo $value["province_title"]?></td>
			<td><?php echo $value["fund_child_name"]?></td>
			<td><?php echo $value["fund_reg_personal_name"]?></td>
			<td><?php echo $status?></td>
		</tr>
		<?php endforeach?>
		<?php endif?>
		
		
	</table>
	<?elseif($_GET['result_type'] == 2):?>
	<table class="table table-bordered">
		<tr>
	  		<th>ลำดับ</th>
	  		<th>รหัสโครงการ</th>
	  		<th>ชื่อโครงการ</th>
	  		<th>ชื่อองค์กรที่เสนอขอรับ</th>
	  		<th>ผลการพิจารณาของอนุกรรมการ</th>
	  		<th>ผลการพิจารณาของคณะกรรมการ</th>
	  		<th>ผลการพิจารณาของคณะอนุกรรมการ จังหวัด</th>
	  	</tr>
		<?php 
			//--Empty data
			echo (count($variable) == 0)?'<tr><td colspan="7" style="color:#aaa; text-align:center;">ยังไม่มีข้อมูลการส่งจากระบบกระจาย</td></tr>':null;

			foreach($variable as $key => $item): 
				$result1 = $result2 = $result3 = null;
				if(@$item['central_check'] == 1) {
					$result1 = $this->ado->getOne("select appoved_id from fund_project_support_result where result_type = 1 and fund_project_support_id = '".$item['id']."'  order by time desc");
					$result2 = $this->ado->getOne("select appoved_id from fund_project_support_result where result_type = 2 and fund_project_support_id = '".$item['id']."'  order by time desc");
				} else {
					$result3 = $this->ado->getOne("select appoved_id from fund_project_support_result where result_type = 3 and fund_project_support_id = '".$item['id']."'  order by time desc");
				}	
			?>
					<tr>
				  		<td><?php echo $key+1?></td>
				  		<td><?php echo $item['project_code_text'].'/'.substr('000'.$item['project_code_number'], -3, 3); #echo $item['project_code'] ?></td>
				  		<td><?php echo (empty($item['project_name']))?'':'โครงการ'.$item['project_name']; ?></td>
				  		<td><?php echo $item['welfare_tog_title']; ?></td>
				  		<td><?php echo (empty($appoved_title1[$result1]))?'-':$appoved_title1[$result1]; ?></td>
				  		<td><?php echo (empty($appoved_title2[$result2]))?'-':$appoved_title2[$result2]; ?></td>
				  		<td><?php echo (empty($appoved_title3[$result3]))?'-':$appoved_title3[$result3]; ?></td>
				  	</tr>
		  		<?php 
		  	endforeach; 
		?>
	</table>
	<?elseif($_GET['result_type'] == 3):?>
		<table class="table table-bordered">
		<tbody>
			<tr>
				<th>ลำดับ</th>
				<th>รหัสโครงการ</th>
				<th>ชื่อโครงการ</th>
		  		<th>ระบบจัดสรร</th>
				<th>ชื่อองค์กรที่เสนอขอรับ</th>
				<th>ประเภทองค์กร</th>
				<th>ผลการพิจารณาเบื้องต้น</th>
			</tr>
			<?php if(empty($variable)):?>
			<?php
				else:
					foreach ($variable as $key => $value):
						$page = 0;
						
						if(@$_GET["page"]) {
							$page = (($_GET["page"]-1)*20);
						}				
						
						$number = $page+($key+1);
						
						if($key%2==0) {
							$odd = " class=\"odd\"";
						} else {
							$odd = null;
						}
			?>
			<tr<?php echo $odd?>>
				<td><?php echo $number?></td>
				<td><?php echo $value["project_id"]?></td>
				<td><?php echo $value["project_name"]?></td>
				<td><?php echo $value["project_system_name"]?></td>
				<td><?php echo $value["agency_name"]?></td>
				<td><?php echo $value["agency_type_title"]?></td>
				<td>
					<?php
						switch ($value["pre_status"]) {
							case 1:
								echo "ส่งคืนโครงการ";
								break;
							case 2:
								echo "ส่งต่อโครงการเนื่องจากกลุ่มเป้าหมายสอดคล้องกับกองทุนอื่น";
								break;
							case 3:
								echo "เข้าหลักเกณฑ์";
								break;
							case 4:
								echo "ขอถอนโครงการ";
								break;
							default:
								echo "ยังไม่มีผลการพิจารณา";
								break;
						}
					?>
				</td>
			</tr>
			<?php
					endforeach;
				endif;
			?>
	
		</tbody>
	</table>
	<?elseif($_GET['result_type'] == 4):?>
	<table class="table table-bordered">
		<tr>
		  <th style="width: 100px;">ลำดับ</th>
		  <th>รหัสโครงการ</th>
		  <th>ชื่อโครงการ</th>
		  <th>ชื่อองค์กรที่เสนอขอรับ</th>
		  <!--<th>ประวัติการขอรับเงิน<br />สนับสนุนเงินกองทุนฯ</th>-->
		  <th>รายละเอียด <br />พิจารณากลั่นกรอง</th>
		  <th>รายละเอียด <br />พิจารณาอนุมัติ</th>
		</tr>
		<?php foreach ($variable as $key => $value) {?>
			<tr>
			  <td><?php echo $key+1; ?></td>
			  <td><?php echo $value['project_code_title']; ?></td>
			  <td><?php echo $value['project_name']; ?></td>
			  <td><?php echo $value['agency_name']; ?></td>
			  <!--<td>&nbsp;</td>-->
			  <td>
			  	<?php
			  		$subcommit_title = '';
			  		$sql = "select * from fund_trafficking_pj_subcommit where fund_trafficking_project_id = '".$value['id']."' order by id desc ";
					$subcommit = $this->ado->getrow($sql);
					dbConvert($subcommit);
					echo (empty($subcommit['detail']))?'-':$subcommit['detail'];
					
			  	?>
			  	
			  </td>
	  		  <td>
	  		  	<?php
			  		$commit_title = '';
			  		$sql = "select * from fund_trafficking_pj_commit where fund_trafficking_project_id = '".$value['id']."' order by id desc ";
					$commit = $this->ado->getrow($sql);
					dbConvert($commit);
					echo (empty($commit['detail']))?'-':$commit['detail'];
			  	?>
	  		  </td>
			</tr>
		<?php } ?>
	</table>
	<?elseif($_GET['result_type'] == 5):?>
	<?$statusArr = array('1'=> 'เห็นควร', '2'=>'ไม่เห็นควร', '3'=>'อื่นๆ');?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th align="left" style="width: 15px;" >ลำดับ</th>
				<th align="left" style="width: 120px;" >รหัส</th>
				<th align="left" style="width: 200px;" >ชื่อผู้ยื่นคำขอฯ</th>
				<th align="left" style="width: 20px;">อายุ</th>
				<th align="left" style="width: 200px;">สถานที่ยื่น</th>
				<th>วันที่อนุมัตื</th>
				<th>ผลการพิจารณา</th>
		  	</tr>
	  	</thead>
	  	
		<tbody>
			<?php if(empty($variable)):?>
			<tr>
				<td colspan="8" class="text-center" >- ไม่มีข้อมูล -</td>
			</tr>
			<?php
				else:
					foreach ($variable as $key => $value):
					$page = 0;
					if(@$_GET["page"]) {
						$page = ($_GET["page"]-1)*20;
					}
					$number = $page+($key+1);
					
					if($key%2==0) {
						$odd = " class=\"odd\"";
					} else {
						$odd = null;
					}
			?>
			<tr<?php echo $odd?>>
				<td><?php echo $number?></td>
				<td><?php echo $value["code_title"]; ?></td>
				<td><?php echo $value["ps_help_name"]?></td>
				<td><?php echo $value["age"]?></td>
				<td><?php echo $value['request_dept_title']; ?></td>
				<td><?=db_to_th($value['leader_date'],FALSE)?></td>
				<td><?=$statusArr[$value['status']]?> <?if($value['status']==3){echo '('.$value['status_note'].')';}?></td>
			</tr>
			<?php
					endforeach;
				endif;
			?>
		</tbody>
		
	</table>
	<?endif;?>


</div>