<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;">
	<button class="btn btn-primary" id="btnMemberForm" onclick="memberForm();">ยื่นแบบฟอร์มขอรับสนับสนุน</button>
</div>
<h3 style="margin-top:0; color:#393">รายการขอรับเงินสนับสนุนโครงการ</h3>
	
<table class="tblList">
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
	    </tr>
    <?php } ?>
	
	    <tr>
		    <td>1</td>
		    <td>คคด/2558/นนทบุรี/0001</td>
		    <td>โครงการพัฒนาความรู้เด็ก</td>
		    <td><span class="statusNew">รายการใหม่</span></td>
		    <td>15/03/2558</td>
		    <td>-</td>
		    <td>20/03/2558</td>
		    <td><img src="media/images/view.png" width="24" height="23" /></td>
	    </tr>
    <tr>
      <td>2</td>
      <td>58/0051</td>
      <td>โครงการส่งเสริมศักยภาพทางด้านกีฬา</td>
      <td><span class="statusReturn">กลับไปแก้ไข</span></td>
      <td>10/03/2558</td>
      <td>ขอรายละเอียดเพิ่มเติม</td>
      <td>17/03/2558</td>
      <td><img src="media/images/edit.png" width="16" height="16" /></td>
    </tr>
    <tr>
      <td>3</td>
      <td>กปม/2558/นนทบุรี/0028</td>
      <td>โครงการมาตราการป้องกันการค้ามนุษย์</td>
      <td><span class="statusConfirm">รอผล</span></td>
      <td>05/03/2558</td>
      <td>อนุมัติ</td>
      <td>10/03/2558</td>
      <td><img src="media/images/view.png" width="24" height="23" /></td>
    </tr>
    <tr>
      <td>4</td>
      <td>คคด/2558/นนทบุรี/0002</td>
      <td>โครงการวางแผนชีวิตเด็กสู่เยาวชน</td>
      <td><span class="statusConfirm">รอผล</span></td>
      <td>05/03/2558</td>
      <td>-</td>
      <td>-</td>
      <td><img src="media/images/view.png" width="24" height="23" /></td>
    </tr>
</table>
