	<?php 
	
		$this->load->helper('html'); 
		
		foreach($rs as $row)
		{
			
			dbConvert($row);
	?>
    	<div id="title-blank"><?=$row['title']?></div>
        <div id="breadcrumb">
		
		<a href="home/index">หน้าแรก</a> 
		> 
		<span class="b1"><a href="calendar/calendar_mso?actcalendar_type_id=<?=$row['actcalendar_type_id']?>"><?=$row['title']?></a></span> 
		> 
		<span class="b1"><a href="#"><?=$row['title']?></a></span>
		
		</div>
		
	    <div id="page">
	
        	<p>
			
				<h3>ชื่องาน :<?=$row['title']?></h3><br />
                <p>สถานที่ :<?=$row['location']?></p><br /> 
				<p>วัน เวลา :<?=mysql_to_th($row['startdate'])?> ถึง  <?=mysql_to_th($row['enddate'])?></p><br /> 
				<p>รายละเอียด :<?=$row['detail']?></p><br /> 
				<p>เจ้าของงาน(ชื่อหน่วยงาน) :<?=$row['department_id']?></p><br /> 
				<p>ผู้สร้างรายการ :<?=$row['createby']?></p><br />  

				<br />
				<br />
				
				<table>
					<tr>
						<td>ภาพกิจกรรม</td>
						<td></td>
					</tr>
					<tr>
						<td>ไฟล์แนบ</td>
						<td></td>
					</tr>
				</table>
			</p>
			
        </div>
        
<?php } ?>