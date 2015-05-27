<div class="sidebar" id="sidebar">

	<ul class="nav nav-list">
		<?if(permission('user','full')):?>
		<li <?php echo menu_active('users','users',false,'active open')?><?php echo menu_active('permissions','permissions',FALSE,'active open')?>>
          <a href="#" class="dropdown-toggle" >
            <i class="icon-user"></i>
            <span>ผู้ใช้งาน</span>
            <b class="arrow icon-angle-down"></b>
          </a>
          <ul class="submenu">
            <li <?php echo menu_active('users','users')?>><a href="users/admin/users"><i class="icon-double-angle-right"></i> สมาชิก</a></li>
            <li <?php echo menu_active('permissions','permissions')?>><a href="permissions/admin/permissions"><i class="icon-double-angle-right"></i> สิทธ์การใช้งาน</a></li>
          </ul>
        </li>
        <?endif;?>
        
        <?if(permission('about','full')):?>
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
		<?endif;?>
        
        <?if(permission('policy','full')):?>
       <li <?=@$_GET['module'] == 'นโยบาย/แผนงาน'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=นโยบาย/แผนงาน&category=นโยบาย/แผนงาน" >
				<i class="icon-star"></i>
				<span class="menu-text"> นโยบาย/แผนงาน </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
    
    <?if(permission('measure','full')):?>
           <li <?=@$_GET['module'] == 'มาตรการ/กลไก'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=มาตรการ/กลไก&category=มาตรการ/กลไก" >
				<i class="icon-star"></i>
				<span class="menu-text">มาตรการ/กลไก</span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
        
        <?if(permission('pr','full')):?>
               <li <?=@$_GET['module'] == 'ส่งเสริม/ประสานงาน'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=ส่งเสริม/ประสานงาน&category=ส่งเสริม/ประสานงาน" >
				<i class="icon-star"></i>
				<span class="menu-text"> ส่งเสริม/ประสานงาน </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
        
        <?if(permission('standard','full')):?>
               <li <?=@$_GET['module'] == 'พัฒนา/มาตรฐาน'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=พัฒนา/มาตรฐาน&category=พัฒนา/มาตรฐาน" >
				<i class="icon-star"></i>
				<span class="menu-text"> พัฒนา/มาตรฐาน </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
        
        <?if(permission('fund','full')):?>
               <li <?=@$_GET['module'] == 'บริหารกองทุน'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=บริหารกองทุน&category=บริหารกองทุน" >
				<i class="icon-star"></i>
				<span class="menu-text"> บริหารกองทุน </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
        
        <?if(permission('asian','full')):?>
               <li <?=@$_GET['module'] == 'อาเซียน'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=อาเซียน&category=อาเซียน" >
				<i class="icon-star"></i>
				<span class="menu-text"> อาเซียน </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li> 
		<?endif;?>   
        
		<?if(permission('news','full')):?>
		<li <?=@$_GET['module'] == 'กิจกรรม' || @$_GET['module'] == 'กิจกรรม' ?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-file-text-o"></i>
				<span class="menu-text"> ข้อมูลข่าวสาร </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="infos/admin/infos?module=กิจกรรม">
						<i class="icon-double-angle-right"></i>
						กิจกรรม<br>(Auto feed from Intranet)
					</a>
				</li>

				<li <?=@$_GET['module'] == 'ข่าวประชาสัมพันธ์'?'class="active open"':'';?>>
					<a href="infos/admin/infos?module=กิจกรรม">
						<i class="icon-double-angle-right"></i>
						กิจกรรม
					</a>
				</li>

                
			</ul>
		</li>
		<?endif;?>  
		
            
        <?if(permission('download','full')):?>
		<li <?=@$_GET['module'] == 'คู่มือ'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-download"></i>
				<span class="menu-text"> ดาวน์โหลด </span>
			</a>
            
            	<ul class="submenu">


                <?php foreach($rs as $row): ?>
                			
                        <li <?=@$_GET['module'] == $row->name?'class="active open"':'';?>>
                        <a href="downloads/admin/downloads/?module=<?=$row->name?>&category_id=<?=$row->id?>">
                            <i class="icon-double-angle-right"></i>
                            <?=$row->name?>
                        </a>
                    </li>
                
                <?php endforeach; ?>
                
                
			</ul>
            
		</li>
		<?endif;?>  
		
		<?if(permission('calendar','full')):?>
		<li <?=@$_GET['cmenu'] == 'ปฎิทินกิจกรรม'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-calendar"></i>
				<span class="menu-text"> ปฎิทินกิจกรรม  </span>
			</a>
            
                 <ul class="submenu">

				<li>
					<a href="calendar/admin/calendar/?cmenu=ปฎิทินกิจกรรม&module=อบรม&category=1">
						<i class="fa fa-calendar"></i>
						<span class="menu-text"> ปฎิทินกิจกรรม (Auto feed from Intranet) </span>
					</a>
				</li>

                <?php foreach($calendar as $row): ?>
                			
                        <li <?=@$_GET['module'] == $row->name?'class="active open"':'';?>>
                        <a href="calendar/admin/calendar/?cmenu=ปฎิทินกิจกรรม&module=<?=$row->name?>&category=<?=$row->id?>">
                            <i class="icon-double-angle-right"></i>
                            <?=$row->name?>
                        </a>
                    </li>
                
                <?php endforeach; ?>
                
                
			</ul>
            
		</li>
		<?endif;?> 
		
		<?if(permission('multimedia','full')):?>
		<li <?=(@$this->uri->segment(1) == 'galleries') || ($this->uri->segment(1) == 'vdos')?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-photo"></i>
				<span class="menu-text"> สื่อมัลติมีเดีย/วีดีโอ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
<!--				<li <?=@$this->uri->segment(1) == 'galleries'?'class="active"':'';?>>
					<a href="galleries/admin/categories">
						<i class="icon-double-angle-right"></i>
						ภาพกิจกรรม
					</a>
				</li>-->

				<li <?=@$this->uri->segment(1) == 'vdos'?'class="active"':'';?>>
					<a href="vdos/admin/vdos">
						<i class="icon-double-angle-right"></i>
						วิดีโอ
					</a>
				</li>
			</ul>
		</li>
		<?endif;?> 
		
		<?if(permission('benefit','full')):?>
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
		<?endif;?> 
		
		<?if(permission('community','full')):?>
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
		<?endif;?> 
		
		<?if(permission('social','full')):?>
		<li <?=@$_GET['module'] == 'นักสังคมสงเคราะห์'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=นักสังคมสงเคราะห์&category=นักสังคมสงเคราะห์" >
				<i class="icon-star"></i>
				<span class="menu-text"> นักสังคมสงเคราะห์ </span>

				<b class="arrow icon-angle-down"></b>
			</a>

		</li>
		<?endif;?>
        
		<?if(permission('agency','full')):?>
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
		<?endif;?>
		
		<?if(permission('volunteer','full')):?>
		<li <?=@$_GET['module'] == 'อาสาสมัคร'?'class="active open"':'';?>>
			<a href="contents/admin/contents/form?module=อาสาสมัคร&category=อาสาสมัคร" >
				<i class="icon-star"></i>
				<span class="menu-text"> อาสาสมัคร </span>

				<b class="arrow icon-angle-down"></b>
			</a>
		</li>
		<?endif;?>
        
        
        <?if(permission('social_welfare','full')):?>
        <li <?=@$_GET['cmenu'] == 'สวัสดิการสังคมไทย'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="icon-star"></i>
				<span class="menu-text"> สวัสดิการสังคมไทย </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)">
						<i class="icon-double-angle-right"></i>
						การดำเนินงานตามกฎหมาย (สวัสดิการสังคม)
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'กฏหมายสวัสดิการสังคม'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=กฏหมายสวัสดิการสังคม">
						<i class="icon-double-angle-right"></i>
						กฏหมายสวัสดิการสังคม
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'ข้อมูลบริการ'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=ข้อมูลบริการ">
						<i class="icon-double-angle-right"></i>
						ข้อมูลบริการ
					</a>
				</li>
                
               <li <?=@$_GET['module'] == 'เอกสารประชาสัมพันธ์'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=เอกสารประชาสัมพันธ์">
						<i class="icon-double-angle-right"></i>
						เอกสารประชาสัมพันธ์
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'ทะเบียน'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=ทะเบียน">
						<i class="icon-double-angle-right"></i>
						ทะเบียน
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'องค์การสวัสดิการสังคมภาคเอกชน'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=องค์การสวัสดิการสังคมภาคเอกชน">
						<i class="icon-double-angle-right"></i>
						องค์การสวัสดิการสังคมภาคเอกชน
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'ฝึกอบรม / สัมมนา'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=ฝึกอบรม / สัมมนา">
						<i class="icon-double-angle-right"></i>
						ฝึกอบรม / สัมมนา
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'มุมความรู้'?'class="active open"':'';?>>
					<a href="welfare/admin/welfare?cmenu=สวัสดิการสังคมไทย&module=มุมความรู้">
						<i class="icon-double-angle-right"></i>
						มุมความรู้
					</a>
				</li>
                

			</ul>
		</li>
		<?endif;?>
        
        <?if(permission('situation','full')):?>
                <li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม'?'class="active open"':'';?>>
			<a href="#" class="dropdown-toggle">
				<i class="icon-star"></i>
				<span class="menu-text"> สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม </span>

				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านการศึกษา'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านการศึกษา">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านการศึกษา
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านนันทนาการ'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านนันทนาการ">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านนันทนาการ
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านสุขภาพอนามัย'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านสุขภาพอนามัย">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านสุขภาพอนามัย
					</a>
				</li>
                
               <li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านกระบวนการยุติธรรม'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านกระบวนการยุติธรรม">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านกระบวนการยุติธรรม
					</a>
				</li>
				
				<li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านที่อยู่อาศัย'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านที่อยู่อาศัย">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านที่อยู่อาศัย
					</a>
				</li>
                
                <li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านบริการสังคมทั่วไป'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านบริการสังคมทั่วไป">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านบริการสังคมทั่วไป
					</a>
				</li>
                
                
                <li <?=@$_GET['module'] == 'สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม' && $_GET['category'] == 'สวัสดิการด้านการทำงานและการมีรายได้'?'class="active open"':'';?>>
					<a href="situation/admin/situation?module=สถานการณ์และเหตุการณ์ด้านสวัสดิการสังคม&category=สวัสดิการด้านการทำงานและการมีรายได้">
						<i class="icon-double-angle-right"></i>
						สวัสดิการด้านการทำงานและการมีรายได้
					</a>
				</li>
                

			</ul>
		</li>
		<?endif;?>
		
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>