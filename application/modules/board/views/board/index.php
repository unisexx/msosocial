<?php $committee_type = array(
		'1'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมแห่งชาติ',
		'2'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมจังหวัด',
		'3'=>'คณะกรรมการส่งเสริมการจัดสวัสดิการสังคมกรุงเทพมหานคร',
		'4'=>'คณะกรรมการบริหารกองทุนส่งเสริมการจัดสวัสดิการสังคม',
		'5'=>'คณะกรรมการติดตามและประเมินผลการดำเนินงานของกองทุนส่งเสริมการจัดสวัสดิการสังคม'
);?>
<?php //echo $pagination; ?>
<div id="title-blank">รายชื่อคณะกรรมการ</div>
<br /><br />
<table id="tbl-board" class="table table-striped table-hover">
<tr>
  <th align="left">ลำดับ</th>
  <th align="left">คณะกรรมการ</th>
  <th align="left">จังหวัด</th>
</tr>
<?php $i=(isset($_GET['page']))? (($_GET['page'] -1)* 20)+1:1; ?>
<?php foreach($result as $row):?>
<tr class="cursor" onclick="window.location='<?php echo site_url('board/province/'.$row['id']); ?>'">
  <td><?php echo $i?></td>
  <td nowrap="nowrap"><?php echo $committee_type[$row['committee_type']]; ?></td>
  <td nowrap="nowrap"><?php echo $row['province_name']?></td>
</tr>
<?$i++;?>
<?php endforeach;?>
</table>

<?php echo $pagination; ?>

<div class="clearfix"></div>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#tbl-board tr td').css('cursor', 'pointer');
	})
</script>