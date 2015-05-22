<div id="dvForm">
	<div style="text-align:right;"><button class="btn" id="btn2list" onclick="memberList();">กลับไปหน้ารายการ</button></div>
	<h4 style="margin-top:0; color:#393;" class="form-inline ">
		แบบฟอร์มการขอรับเงินสนับสนุนโครงการ 
		<select name=""  class="form-control" style="font-size:14px; width:200px;">
			<option>-- กรุณาเลือกกองทุน --</option>
			<option value="child">กองทุนเด็กฯ</option>
			<option value="support">กองทุนส่งเสริมฯ</option>
			<option value="traffick">กองทุนป้องกันค้ามนุษย์ฯ</option>
		</select>
	</h4>
	<? echo $_GET['type']; ?>
</div><!--แบบฟอร์มการขอรับเงินสนับสนุนโครงการ-->