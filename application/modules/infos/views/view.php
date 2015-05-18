
    	<div id="title-blank"><?=$rs->module?></div>
        <div id="breadcrumb">
		
		<a href="<?php echo base_url(); ?>home">หน้าแรก</a> 
		> 
		<span class="b1"><a href="infos/lists?module=<?=$rs->module?>"><?=$rs->module?></a></span> 
<!--		> 
		<span class="b1"><a href="infos/lists?module=<?=$rs->module?>"><?=$rs->module?></a></span>-->
		
		</div>
		
	    <div id="page">
	
        	<p>
			
				<h4><?=$rs->title?></h4>
                    <br />
                    
                     		<div class="image_thumb">
								<img class="img-thumbnail" src="uploads/info/<?=$rs->image?>" style="width:250px;" >
                    		</div>
                            
                    <br /><br />
				<?=$rs->detail?>
				    <br />
				วันที่ข่าว : <?=mysql_to_th($rs->created)?>
                
			</p>
			
        </div>