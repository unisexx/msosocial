
	<?php 
	
		$this->load->helper('html'); 
		
		foreach($rs as $row)
		{
			
			dbConvert($row);
	?>
						

    	  
        <div id="breadcrumb">
		
		<a href="<?php echo base_url(); ?>home">หน้าแรก</a> 
		> 
		<span class="b1"><a href="infos/list_news_mso?title=<?=$row['title']?>"><?=$row['title']?></a></span> 
		</div>
		
		  <div id="title-blank"><?=$row['title']?></div>
    	
    	  <div class="clearfix">&nbsp;</div>
    	  
    	  <div style="clear:both;width: 100%; margin-bottom: 25px;"></div>
		
	    <div id="page">
	
        	<p>
			
				<h4><?=$row['title']?></h4>
				
                    <br />
                    
                     		<div class="image_thumb">
								<img class="img-thumbnail" src="http://intranet.m-society.go.th/upload/newsletters/<?=$row['img_title']?>" style="width:250px;" >
                    		</div>
                            
                    <br />
                    <br />
                    
					<?=$row['detail']?>
				
				    <br />
				    
					<div style="font-weight: normal; color: #000000;"> วันที่ข่าว : <?=mysql_to_th($row['create_date'])?></div>
                
			</p>
			
        </div>
        
<?php } ?>