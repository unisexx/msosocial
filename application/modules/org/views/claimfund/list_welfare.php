

<div style='text-align:center;'><div style='display:inline-block;'><? echo $pagination; ?></div></div>
<table class='tblist'>
	<thead>
		<tr>
			<th style='width:80px;'>ลำดับ</th>
			<th>วันที่ยืน</th>
			<th>ประเภท</th>
			<th>ชื่อหน่วยงาน</th>
			<th>สถานะ</th>
			<th>โทรศัพท์</th>
			<th>แฟกซ์</th>
			<th>เลือก</th>
		</tr>
	</thead>
	<tbody>
		<?
			foreach($rs as $item){ 
				$no++;
			?>
				<tr>
					<td><? echo $no; ?></td>
					<td><? echo mysql_to_th(date('Y-m-d', $item['input_date']), true); ?></td>
					<td><? echo $item['under_type_sub']; ?></td>
					<td><? echo $item['organ_name']; ?></td>
					<td><? echo $item['current_status']; ?></td>
					<td><? echo $item['tel']; ?></td>
					<td><? echo $item['fax']; ?></td>
					<td><? echo form_button(null, 'เลือก', 'class="btnSlcWelfare" rel_type="'.$item['b_type'].'" rel_id="'.$item['id'].'" rel_title="'.$item['organ_name'].'"'); ?></td>
				</tr>
			<? }
		?>
	</tbody>
</table>
<div style='text-align:center;'><div style='display:inline-block;'><? echo $pagination; ?></div></div>