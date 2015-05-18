
<div id="title-blank"><?=$_GET['module']?></div>
<div id="breadcrumb"><a href="<?php echo base_url(); ?>home">หน้าแรก</a> > <span class="b1"><?=$_GET['module']?></span></div>

<div id="page" style="background:white; margin-top:45px; margin-bottom:15px;  padding:20px;">

	<?php //foreach($rs as $row):?>
		
<!--        <div class="media col-lg-6">
		
          <div class="media-left media-middle">
		
            <a href="infos/view/<?=$row->id?>">
		      <img class="media-object" src="uploads/info/<?=$row->image?>" width="139" height="96">
		    </a>
		
          </div>
		
          <div class="media-body">
              <a href="infos/view/<?=$row->id?>">
                <span class="b1"><?=$row->title?></span>
                </a>
		  </div>
		
        </div>-->
        
	<?php //endforeach;?>
    
    <?php //echo $rs->pagination();?>	
    
<!--   <br clear="all">
   
   <div style="clear:both; width:100%; margin-top:25px;"></div>-->
   
    
    
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
<!--				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Tutorials/MotionBlurEffect/" title="Previous Demo"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=23872" title="Back to the article"><span>Back to the Codrops article</span></a>
				</div>
				<h1><span>Animated<span> Grid Layout</h1>
				<nav class="codrops-demos">
					<a class="current-demo" href="index.html">Demo 1</a>
					<a href="index2.html">Demo 2</a>
				</nav>
				<div class="related">
					<h3>Related Demos</h3>
					<a href="http://tympanus.net/Development/BookPreview/">Book Preview</a>
					<a href="http://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/">Thumbnail Grid</a>
					<a href="http://tympanus.net/Development/3DGridEffect/">3D Grid Effect</a>
				</div>-->
			</div>
            
			<div id="theGrid" class="main" style="width:100%; right:300px;">
            
				<section class="grid" style="width:100%;">
                
					<header class="top-bar">
						<h2 class="top-bar__headline"><?=$_GET['module']?> ล่าสุด</h2>
						<div class="filter">
							<span>จัดเรียง by:</span>
							<span class="dropdown">จำนวนคนดู</span>
						</div>
					</header>
                    

                    
                    	<?php 
						
						$news = 1;
						foreach($rs as $row):
							
							$text =  $row->title;
							$text1 = "";
							
							if(strlen($text)>42)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,42, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row->title;	
							}
							
							
							
						?>
		
                            <a class="grid__item" href="infos/view/<?=$row->id?>">
                                <!--<h2 class="title title--preview"><?=$text1?></h2>-->
                                <div class="loader"></div>
                                <span class="category"><?=$text1?></span>
                                <div class="meta meta--preview">
                                    <img class="meta__avatar" src="uploads/info/<?=$row->image?>" alt="author<?php echo $news; ?>" /> 
                                    <span class="meta__date"><i class="fa fa-calendar-o"></i> <?=mysql_to_th($row->created)?></span>
                                    <span class="meta__reading-time"><i class="fa fa-clock-o"></i> <?=$row->counter?> อ่าน</span>
                                </div>
                            </a>
                            
                        <?php 
						$news++;
						endforeach;
						?>
                    
                    
					<footer class="page-meta">
						<span><a href="#">เพิ่มเติม...</a></span>
					</footer>
				
                </section>
                
				<section class="content">
                
					<div class="scroll-wrap">
                    
                        
						<?php 
						
						$news = 1;
						foreach($rs as $row):
							
/*							$text =  $row->title;
							$text1 = "";
							
							if(strlen($text)>42)
							{
								$str_data = html_entity_decode($text);
								$str_data = strip_tags($str_data);
								$text1 =  iconv_substr($str_data, 0,42, "UTF-8").".."; 
							}
							else
							{
								$text1 = $row->title;	
							}*/
						?>
		
                            
                          <article class="content__item">
							<span class="category category--full"><?=$row->title?></span>
							<!--<h2 class="title title--full"><?=$row->title?></h2>-->
							<div class="meta meta--full">
								<img class="meta__avatar" src="uploads/info/<?=$row->image?>" alt="author<?php echo $news; ?>" />
								<span class="meta__author">Admins</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i><?=mysql_to_th($row->created)?></span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> <?=$row->counter?> อ่าน</span>
							</div>
							<p><?=$row->detail?></p>
						</article>
                        
                            
                        <?php 
						$news++;
						endforeach;
						?>   
                      
						
					</div>
                    
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
                    
				</section>
                
			</div>
            

        
		<script src="themes/dev/js/classie.js"></script>
		<script src="themes/dev/js/main.js"></script>
    
    
<br clear="all">
</div>