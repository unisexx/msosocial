
          <div id="news">
        	
        	<?php 
        		$this->load->helper('html'); 
				
				foreach($rs_first as $row){
			
				dbConvert($row);
        	?>
        	
        	
            <div class="newstitle"><?=$row['title']?> <span><a href="infos/list_news_mso?title=<?=$row['title']?>" class="viewall">ดูทั้งหมด</a></span></div>
            
               <p class="p-news-frist">
                    
                    <a href="infos/view_mso/<?=$row['id']?>" target="_blank">
                    	<img src="http://intranet.m-society.go.th/upload/newsletters/<?=$row['img_title']?>" width="314" height="215">
                    </a>
                    <br>
                    
                    	  <?php
							
							$text =  $row['title'];
							$text1 = "";
							$text2 = "";
							
							if(strlen($text)>64)
							{
								
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 = iconv_substr($str_data, 0,64, "UTF-8").".."; 
								$text2 = iconv_substr($str_data, 64,strlen($text), "UTF-8")."..";
								
							}
							else
							{
								$text1 = $row['title'];
								$text2 = "...";	
							}
								
						
							?>
                    
                    <a href="infos/view_mso/<?=$row['id']?>" class="text-titlenews-frist" target="_blank"><?php echo $text1;  ?></a>
                    <a href="infos/view_mso/<?=$row['id']?>" class="text-detailnews-frist" target="_blank"><?php echo $text2;  ?></a>
               </p>
               
           <?php } ?>
                
           <div class="p-news-second">
           <?php 
           	
			//$this->load->helper('html'); 
			foreach($rs as $row0){
			
			dbConvert($row0);
				
           ?>
                  
			<p class="p-news">
            	
                <a href="infos/view_mso/<?=$row0['id']?>" target="_blank">
                <img src="http://intranet.m-society.go.th/upload/newsletters/<?=$row0['img_title']?>" width="144" height="100" class="img-pr-news">
                </a>
                
                <br>
                            <a href="infos/view_mso/<?=$row0['id']?>">
							
							<?php
							
							$text =  $row0['title'];
							$text1 = "";
							
							if(strlen($text)>42)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,42, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row0['title'];	
							}
							
							echo $text1;
							
							?>
                            
                            </a>
             </p>
             <?php  } ?>           
           </div>
        </div>
        <div class="clearfix">&nbsp;</div>