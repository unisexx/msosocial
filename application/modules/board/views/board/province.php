<?php
	$subtype_arr = array(
		'1'=>'ส่วนราชการ',
		'2'=>'ผู้แทนองค์กรสาธารณประโยชน์',
		'3'=>'ผู้แทนองค์กรปกครองส่วนท้องถิ่น',
		'4'=>'ผู้แทนองค์กรสวัสดิการชุมชน',
		'5'=>'ผู้ทรงคุณวุฒิ',
	);
?>
<div id="title-blank">รายชื่อ<?php echo $committee_name; ?></div>
<br /><br />
<table id="tbl-board" class="table table-striped table-hover">
<tr>
  <th>ลำดับ</th>
<th>ชื่อคณะกรรมการ</th>
<th>ประเภทกรรมการ</th>
<th>ตำแหน่งในคณะกรรมการ</th>
</tr>
<?php $i=(isset($_GET['page']))? (($_GET['page'] -1)* 20)+1:1; ?>
<?php foreach($result as $row):?>
<tr>
	<td><?php echo $i?></td>
	<td><?php echo $row['title_name'].$row['fname'].' '.$row['lname']?></td>
	<td><?php echo $subtype_arr[$row['sub_type_id']]?></td>
	<td><?php echo $row['position_name']?></td>
</tr>
<?$i++;?>
<?php endforeach;?>
</table>

<?php echo $pagination; ?>

<div class="clearfix"></div>

<script type="text/javascript" charset="utf-8">
	$(function(){
		//$('#tbl-board tr td').css('cursor', 'pointer');
	})
</script>