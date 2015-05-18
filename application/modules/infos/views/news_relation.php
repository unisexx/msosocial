
          <div id="news">
        	
            <div class="newstitle"><?=$rs->module?> <span><a href="infos/lists?module=<?=$rs->module?>" class="viewall">ดูทั้งหมด</a></span></div>
            
               <p class="p-news-frist">
                    <img src="uploads/info/<?=$rs->image?>" width="314" height="215"><br>
                    
                    	  <?php
							
							$text =  $rs->title;
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
								$text1 = $rs->title;
								$text2 = "...";	
							}
								
						
							?>
                    
                    <a href="infos/view/<?=$rs->id?>" class="text-titlenews-frist"><?php echo $text1;  ?></a>
                    <a href="infos/view/<?=$rs->id?>" class="text-detailnews-frist"><?php echo $text2;  ?></a>
               </p>
                
           <div class="p-news-second">
           <?foreach($rs->where('module = "'.$rs->module.'" and status="approve"')->order_by('id desc')->get(4) as $row0):?>       
			<p class="p-news">
            	
                
                <img src="uploads/info/<?=$row0->image?>" width="144" height="100" class="img-pr-news">
                
                <br>
                            <a href="infos/view/<?=$row0->id?>">
							
							<?php
							
							$text =  $row0->title;
							$text1 = "";
							
							if(strlen($text)>42)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,42, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row0->title;	
							}
							
							echo $text1;
							
							?>
                            
                            </a>
             </p>
             <?endforeach;?>           
           </div>
        </div>
        <div class="clearfix">&nbsp;</div>