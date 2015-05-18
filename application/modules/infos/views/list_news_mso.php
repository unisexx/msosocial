

<div id="breadcrumb"><a href="<?php echo base_url(); ?>home">หน้าแรก</a> > <span class="b1"><?=$news_title?></span></div>

    	  <div class="clearfix">&nbsp;</div>
    	  
    	  <div style="clear:both;width: 100%; margin-bottom: 25px;"></div>

<div id="title-blank"><?=$news_title?></div>

<div id="page" style="background:white; margin-top:45px; margin-bottom:15px;  padding:20px;">

		<link rel="stylesheet" type="text/css" href="themes/dev/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="themes/dev/fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="themes/dev/css/style1.css" />
        
		<script src="themes/dev/js/modernizr.custom.js"></script>
    
		<style>
       	 body{ background-image:url(themes/msosocial/images/bg.jpg); background-repeat:repeat; bfbfbf  font-family: tahoma, Arial, sans-serif; font-size:14px; color:black; font-weight:normal;}
        </style>
          
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
            
			<div id="theSidebar" class="sidebar" style="background-image:url(themes/msosocial/images/bg.jpg); background-repeat:repeat; bfbfbf  font-family: tahoma, Arial, sans-serif; font-size:14px; color:black; font-weight:normal;">
				<button class="close-button fa fa-fw fa-close"></button>

			</div>
            
			<div id="theGrid" class="main" style="width:100%; right:300px;">
            
				<section class="grid" style="width:100%;">
                
					<header class="top-bar">
						<h2 class="top-bar__headline"><?=$news_title?> ล่าสุด</h2>
						<div class="filter">
							<span>จัดเรียง by:</span>
							<span class="dropdown">จำนวนคนดู</span>
						</div>
					</header>
                    

                    
                    	<?php 
                    	
						$this->load->helper('html'); 
						
						$news = 1;
						
						foreach($rs as $row)
						{
							
							dbConvert($row);
							
							if($row['img_title']){
							
							$text =  $row['title'];
							$text1 = "";
							
							if(strlen($text)>42)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,42, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row['title'];	
							}
							
							
							
						?>
		
                            <a class="grid__item" href="infos/view/<?=$row['id']?>">
                                <div class="loader"></div>
                                <span class="category"><?=$text1?></span>
                                <div class="meta meta--preview">
                                    <img class="meta__avatar" src="http://intranet.m-society.go.th/upload/newsletters/<?=$row['img_title']?>" alt="author<?php echo $news; ?>" /> 
                                    <span class="meta__date"><i class="fa fa-calendar-o"></i> <?=mysql_to_th($row['create_date'])?></span>
                                    <span class="meta__reading-time"><i class="fa fa-clock-o"></i> 0 อ่าน</span>
                                </div>
                            </a>
                            
                        <?php 
								
									$news++;
								}
							}
						?>
                    
                    
					<footer class="page-meta">
						<span><a href="">เพิ่มเติม...</a></span>
					</footer>
				
                </section>
                
				<section class="content">
                
					<div class="scroll-wrap">
                    
                        
						<?php 
						
						$news = 1;
						
						foreach($rs as $row){
						dbConvert($row);	
						
						if($row['img_title']){
						?>
		
                            
                          <article class="content__item">
							<span class="category category--full"><?=$row['title']?></span>
							
							<div class="meta meta--full">
								<img class="meta__avatar" src="http://intranet.m-society.go.th/upload/newsletters/<?=$row['img_title']?>" alt="author<?php echo $news; ?>" />
								<span class="meta__author"><?=$row['create_by']?></span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i><?=mysql_to_th($row['create_date'])?></span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 0  อ่าน</span>
							</div>
							<p><?=$row['detail']?></p>
						</article>
                        
                            
                        <?php 
									$news++;
								
								}
							}
						?>   
                      
						
					</div>
                    
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
                    
				</section>
                
			</div>
            

        
		<script src="themes/dev/js/classie.js"></script>
		<script src="themes/dev/js/main.js"></script>
    
    
<br clear="all">
</div>