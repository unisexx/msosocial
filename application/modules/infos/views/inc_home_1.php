<div id="porcument">
	<div class="porcumenttitle">ข่าวจัดซื้อจัดจ้าง <span><a href="infos/lists?module=ข่าวจัดซื้อจัดจ้าง" class="viewall">ดูทั้งหมด</a></span></div>
	<?foreach($rs as $row):?>
	<p class="newporcument">
        <img src="uploads/info/<?=$row->image?>" width="139" height="96" class="img-porcument">
        <a href="infos/view/<?=$row->id?>"><?=$row->title?></a><br />
        <span class="date-porcument"><?=mysql_to_th($row->created)?></span>
    </p>
	<?endforeach;?>
</div>