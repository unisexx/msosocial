<div class="sidebar" id="sidebar">

	<ul class="nav nav-list">
		<li <?=@$_GET['module'] == 'เกี่ยวกับเรา'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-users"></i>
				<span class="menu-text"> เกี่ยวกับเรา </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'พ.ร.บ. ส่งเสริมฯ คืออะไร'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร">
						<i class="icon-double-angle-right"></i>
						พ.ร.บ. ส่งเสริมฯ คืออะไร
					</a>
				</li>

				<li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'โครงสร้างหน่วยงาน'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=โครงสร้างหน่วยงาน">
						<i class="icon-double-angle-right"></i>
						โครงสร้างหน่วยงาน
					</a>
				</li>

				<li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'การดำเนินงานตามนโยบาย'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=การดำเนินงานตามนโยบาย">
						<i class="icon-double-angle-right"></i>
						การดำเนินงานตามนโยบาย
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'ที่อยู่และเบอร์ติดต่อ'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=ที่อยู่และเบอร์ติดต่อ">
						<i class="icon-double-angle-right"></i>
						ที่อยู่และเบอร์ติดต่อ
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'การบริการ'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=การบริการ">
						<i class="icon-double-angle-right"></i>
						การบริการ
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'เกี่ยวกับเรา' && @$_GET['category'] == 'อำนาจหน้าที่'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=อำนาจหน้าที่">
						<i class="icon-double-angle-right"></i>
						อำนาจหน้าที่
					</a>
				</li>
                
			</ul>
		</li>
		
		<li <?=@$_GET['module'] == 'ข่าวประชาสัมพันธ์' || @$_GET['module'] == 'ข่าวประชาสัมพันธ์' ?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-file-text-o"></i>
				<span class="menu-text"> ข้อมูลข่าวสาร </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="infos/admin/infos?module=ข่าวประชาสัมพันธ์">
						<i class="icon-double-angle-right"></i>
						ข่าวประชาสัมพันธ์<br>(Auto feed from Intranet)
					</a>
				</li>

				<li <?=@$_GET['module'] == 'ข่าวประชาสัมพันธ์'?'class="active open"':'';?>>
					<a href="infos/admin/infos?module=ข่าวประชาสัมพันธ์">
						<i class="icon-double-angle-right"></i>
						ข่าวประชาสัมพันธ์
					</a>
				</li>

                
			</ul>
		</li>
		
            
		<li <?=@$_GET['module'] == 'คู่มือ'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-download"></i>
				<span class="menu-text"> ดาวน์โหลด </span>
			</a>
            
            	<ul class="submenu">

<!--				<li <?=@$_GET['module'] == 'คู่มือ'?'class="active open"':'';?>>
					<a href="downloads/admin/downloads/?module=คู่มือ">
						<i class="icon-double-angle-right"></i>
						ดาวน์โหลดคู่มือ
					</a>
				</li>

				<li <?=@$_GET['module'] == 'แบบฟอร์ม'?'class="active open"':'';?>>
					<a href="downloads/admin/downloads/?module=แบบฟอร์ม">
						<i class="icon-double-angle-right"></i>
						ดาวน์โหลดแบบฟอร์ม
					</a>
				</li>-->

                <?php foreach($rs as $row): ?>
                			
                        <li <?=@$_GET['module'] == $row->name?'class="active open"':'';?>>
                        <a href="downloads/admin/downloads/?module=<?=$row->name?>">
                            <i class="icon-double-angle-right"></i>
                            <?=$row->name?>
                        </a>
                    </li>
                
                <?php endforeach; ?>
                
                
			</ul>
            
		</li>
		
		<li <?=@$_GET['module'] == 'ปฎิทินกิจกรรม'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=เกี่ยวกับเรา&category=พ.ร.บ. ส่งเสริมฯ คืออะไร">
				<i class="fa fa-calendar"></i>
				<span class="menu-text"> ปฎิทินกิจกรรม (Auto feed from Intranet) </span>
			</a>
		</li>
		
		<li <?=(@$this->uri->segment(1) == 'galleries') || ($this->uri->segment(1) == 'vdos')?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-photo"></i>
				<span class="menu-text"> ภาพกิจกรรม/วิดีโอ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$this->uri->segment(1) == 'galleries'?'class="active"':'';?>>
					<a href="galleries/admin/categories">
						<i class="icon-double-angle-right"></i>
						ภาพกิจกรรม
					</a>
				</li>

				<li <?=@$this->uri->segment(1) == 'vdos'?'class="active"':'';?>>
					<a href="vdos/admin/vdos">
						<i class="icon-double-angle-right"></i>
						วิดีโอ
					</a>
				</li>
			</ul>
		</li>
		
		
		<li <?=@$_GET['module'] == 'องค์กรสาธารณประโยชน์'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-file-pdf-o"></i>
				<span class="menu-text"> องค์กรสาธารณประโยชน์ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'องค์กรสาธารณประโยชน์' && @$_GET['category'] == 'เกี่ยวกับองค์กรสาธารณประโยชน์'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=องค์กรสาธารณประโยชน์&category=เกี่ยวกับองค์กรสาธารณประโยชน์">
						<i class="icon-double-angle-right"></i>
						เกี่ยวกับองค์กรสาธารณประโยชน์
					</a>
				</li>

				<li <?=@$_GET['module'] == 'องค์กรสาธารณประโยชน์' && @$_GET['category'] == 'รายงาน'?'class="active open"':'';?>>
					<a href="contents/admin/contents/report?module=องค์กรสาธารณประโยชน์&category=รายงาน">
						<i class="icon-double-angle-right"></i>
						รายงาน
					</a>
				</li>
				
				

			</ul>
		</li>
		
		<li <?=@$_GET['module'] == 'องค์กรสวัสดิการชุมชน'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="icon-star"></i>
				<span class="menu-text"> องค์กรสวัสดิการชุมชน </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'องค์กรสวัสดิการชุมชน' && @$_GET['category'] == 'เกี่ยวกับองค์กรสวัสดิการชุมชน'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=องค์กรสวัสดิการชุมชน&category=เกี่ยวกับองค์กรสวัสดิการชุมชน">
						<i class="icon-double-angle-right"></i>
						เกี่ยวกับองค์กรสวัสดิการชุมชน
					</a>
				</li>

				<li <?=@$_GET['module'] == 'องค์กรสวัสดิการชุมชน' && @$_GET['category'] == 'รายงาน'?'class="active open"':'';?>>
					<a href="contents/admin/contents/report?module=องค์กรสวัสดิการชุมชน&category=รายงาน">
						<i class="icon-double-angle-right"></i>
						รายงาน
					</a>
				</li>
				
				
			</ul>
		</li>
		
		<li <?=@$_GET['module'] == 'นักสังคมสงเคราะห์'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=นักสังคมสงเคราะห์&category=นักสังคมสงเคราะห์" >
				<i class="icon-star"></i>
				<span class="menu-text"> นักสังคมสงเคราะห์ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

		</li>
        
		
		<li <?=@$_GET['module'] == 'หน่วยงานรัฐ'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=หน่วยงานรัฐ&category=เกี่ยวกับหน่วยงานรัฐ" class="dropdown-toggle">
				<i class="icon-star"></i>
				<span class="menu-text"> หน่วยงานรัฐ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'หน่วยงานรัฐ' && @$_GET['category'] == 'เกี่ยวกับหน่วยงานรัฐ'?'class="active open"':'';?>>
					<a href="contents/admin/contents/form?module=หน่วยงานรัฐ&category=เกี่ยวกับหน่วยงานรัฐ">
						<i class="icon-double-angle-right"></i>
						เกี่ยวกับหน่วยงานรัฐ
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'หน่วยงานรัฐ' && @$_GET['category'] == 'รายงาน'?'class="active open"':'';?>>
					<a href="contents/admin/contents/report?module=หน่วยงานรัฐ&category=รายงาน">
						<i class="icon-double-angle-right"></i>
						รายงาน
					</a>
				</li>

			</ul>
		</li>
		
		<li <?=@$_GET['module'] == 'อาสาสมัคร'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=อาสาสมัคร&category=อาสาสมัคร" >
				<i class="icon-star"></i>
				<span class="menu-text"> อาสาสมัคร </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
        
        
        
        <li <?=@$_GET['module'] == 'สวัสดิการสังคมไทย'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="icon-star"></i>
				<span class="menu-text"> สวัสดิการสังคมไทย </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)">
						<i class="icon-double-angle-right"></i>
						การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'กฏหมายสวัสดิการสังคม'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=กฏหมายสวัสดิการสังคม">
						<i class="icon-double-angle-right"></i>
						กฏหมายสวัสดิการสังคม
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'ข้อมูลบริการ'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=ข้อมูลบริการ">
						<i class="icon-double-angle-right"></i>
						ข้อมูลบริการ
					</a>
				</li>
                
               <li <?=@$_GET['module'] == 'เอกสารที่เกี่ยวข้อง'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=เอกสารที่เกี่ยวข้อง">
						<i class="icon-double-angle-right"></i>
						เอกสารที่เกี่ยวข้อง
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'ทะเบียน'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=ทะเบียน">
						<i class="icon-double-angle-right"></i>
						ทะเบียน
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'องค์การสวัสดิการสังคมภาคเอกชน'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=องค์การสวัสดิการสังคมภาคเอกชน">
						<i class="icon-double-angle-right"></i>
						องค์การสวัสดิการสังคมภาคเอกชน
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'ฝึกอบรม / สัมนา'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=ฝึกอบรม / สัมนา">
						<i class="icon-double-angle-right"></i>
						ฝึกอบรม / สัมนา
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'มุมความรู้'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?module=มุมความรู้">
						<i class="icon-double-angle-right"></i>
						มุมความรู้
					</a>
				</li>
                

			</ul>
		</li>
        
        
		
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>