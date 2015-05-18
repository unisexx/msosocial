
    	<div id="title-blank"><?=$rs->module?></div>
        <div id="breadcrumb">
		
		<a href="home/index">หน้าแรก</a> 
		> 
		<span class="b1"><a href="calendar/lists/?module=<?=$rs->module?>&category=<?=$rs->category?>"><?=$rs->module?></a></span> 
		> 
		<span class="b1"><a href="#"><?=$rs->category?></a></span>
		
		</div>
		
	    <div id="page">
	
        	<p>
			
				<h3><?=$rs->title?></h3>
                    <br />
                    
                    <?php 
						if($rs->image !="")
						{
							
							echo "<div class=\"image_thumb\">";
							echo "<img class=\"img-thumbnail\" src=\"uploads/calendar/".$rs->image."\" style=\"width:250px;\" >";
                    		echo "</div>";
							
						}
					?>

				<?=$rs->detail?>
				<br />
                <br />
				วันที่เริ่ม : <?=mysql_to_th($rs->start_date)?>
                <br />
                วันที่สิ้นสุด : <?=mysql_to_th($rs->end_date)?>
			</p>
			
        </div>