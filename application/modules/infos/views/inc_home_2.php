<div id="job">
	<div class="jobtitle">ข่าวประกาศรับสมัครงาน<span><a href="infos/lists?module=ข่าวประกาศรับสมัครงาน" class="viewall">ดูทั้งหมด</a></span></div>
    <ul>
    	<?foreach($rs as $row):?>
    	<li><a href="infos/view/<?=$row->id?>"><?=$row->title?></a> <span class="date-porcument"><?=mysql_to_th($row->created)?></span></li>
    	<?endforeach;?>
    </ul>
</div>