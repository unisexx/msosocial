<link href="media/css/org/claimfundForm.css" rel="stylesheet" type="text/css"/>

<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
<h4 style="margin-top:0; color:#393;" class="form-inline ">
	แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
	<?php echo form_dropdown(false, array(1 => 'กองทุนเด็กฯ', 2 => 'กองทุนส่งเสริมฯ', 3 => 'กองทุนป้องกันค้ามนุษย์ฯ'), $_GET['type'], 'class="form-control" onchange = "memberForm($(this).val());"'); ?>
</h4>



<div class="tblForm">
กองทุนป้องกัน

<div style="text-align:right;"><button class="btn btn-primary">บันทึกส่งแบบฟอร์ม</button></div>
</div>
