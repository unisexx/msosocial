<style>

	/*VDO*/
	#vdo{ }
	.vdotitle{font-family: 'Conv_2555 ed_crub huajuck[TH]';font-weight: bold;  font-size:25px; line-height:27px;  color:#d80368; border-bottom:2px solid #f795c3; margin-top:10px;}
	#vdolist{float:left;position:relative;  overflow:hidden; background:white; text-align:center; padding:10px; width:200px; height::125px;}
	.linkvdo a {color:black; text-align:left !important;  float:left; margin-left:20px; margin-right:20px; margin-top:6px;}
	.linkvdo a:hover {color:#337ab7; text-decoration:none;}
	.imgvdo{margin-top:10px;}
	
</style>

<div id="title-blank">สื่อมัลติมีเดีย/วีดีโอ</div>
<div id="breadcrumb"><a href="<?php echo base_url(); ?>home">หน้าแรก</a> > <span class="b1">ข่าวกิจกรรม / วีดีโอ</span></div>
<div id="page">

	<?php foreach($rs as $row):?>   
        
    <div id="vdo">
    
		<div id="vdolist">
                  <div class="vdoplay"><a href="#">&nbsp;</a></div>
                  
                  <a href="vdos/view/<?=$row->id?>">
                  
                    
                    <?php
						$source_vdo = $row->url;
						$vdo_value = explode("?v=", $source_vdo); 
					?>
                    
                    <img src="http://img.youtube.com/vi/<?=$vdo_value[1]?>/3.jpg" class="imgvdo">
                    
                  </a>
                  
                  <br>
              	  
                  <span class="linkvdo">
                  
                  <a href="vdos/view/<?=$row->id?>">
				  <?php 
				  
/*							$text =  $row->title;
							if(strlen($text)>12)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								 echo iconv_substr($str_data, 0,12, "UTF-8").".."; 
							}*/
							
							echo $row->title;
				  
				  ?>
                   <img src="themes/msosocial/images/icon-film.png" width="14" height="15" />
                   </a>
                   
                   </span>	
                  
            </div>
            	   
		
                  
        </div>
        
      
	<?php endforeach;?>
    
    <?php echo $rs->pagination();?>
    
<br clear="all">
</div>