
    	<div id="title-blank"><?=$rs->module?></div>
        <div id="breadcrumb">
		
		<a href="home/index">หน้าแรก</a> 
		> 
		<span class="b1"><a href="situation?module=<?=$rs->module?>&category=<?=$rs->category?>"><?=$rs->module?></a></span> 
		> 
		<span class="b1"><a href="#"><?=$rs->category?></a></span>
		
		</div>
		
	    <div id="page">
	
        	<p>
			
				<h3><?=$rs->title?></h3>
                <br />
				<?=$rs->detail?>
				<br />
                <br />
				วันที่ : <?=mysql_to_th($rs->created)?>
			</p>
			
        </div>