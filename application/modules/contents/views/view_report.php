
    	<div id="title-blank">รายงาน <?=$rs->module?></div>
        <div id="breadcrumb">
		
		<a href="home/index">หน้าแรก</a> 
		> 
		<span class="b1"><a href="#"><?=$rs->module?></a></span> 
		> 
		<span class="b1"><a href="contents/lists_report/?module=<?=$rs->module?>&category=<?=$rs->category?>"><?=$rs->category?></a></span>
		
		</div>
		
	    <div id="page">
	
        	<p>
			
				<h3><?=$rs->title?></h3>
                <br />
				<?=$rs->detail?>
				
			</p>
			
        </div>