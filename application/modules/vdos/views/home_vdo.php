    <style>
		.imgvdo
		{
			width:138px;
			height:96px;	
		}
	</style>
    <div id="vdo">
       	<div class="vdotitle">สื่อมัลติมีเดีย/วีดีโอ</div>
		<div id="vdolist">
                  <div class="vdoplay"><a href="#">&nbsp;</a></div>
                  
                  <a href="vdos/view/<?=$rs->id?>">
                  
                    
                    <?php
						$source_vdo = $rs->url;
						$vdo_value = explode("?v=", $source_vdo); 
					?>
                    
                    <img src="http://img.youtube.com/vi/<?=$vdo_value[1]?>/3.jpg" class="imgvdo">
                    
                  </a>
                  
            </div>
            	   
                   <br>
              	  
                  <span class="linkvdo"><a href="vdos/view/<?=$rs->id?>"><?=$rs->title?>
                   <img src="themes/msosocial/images/icon-film.png" width="14" height="15" />
                   </a>
                   </span>			
                  <span><a href="vdos/index" class="viewall-vdo">ดูทั้งหมด</a></span>
                  
        </div>
      <div class="clearfix">&nbsp;</div>
      
