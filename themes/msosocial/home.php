<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
<title><?php echo $template['title']; ?></title> 

<link href="themes/msosocial/css/template.css?v=<?php echo filemtime('themes/msosocial/css/template.css'); ?>" type="text/css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/msosocial/css/topmenu.css">
<link rel="stylesheet" href="themes/msosocial/css/img.css">
<link rel="stylesheet" href="media/js/colorbox/example5/colorbox.css" />

<?php include_once "_header.php"; ?>
<?php echo $template['metadata']; ?>

</head>
<body>
    
<div id="wrap">

<?php include_once "_menu.php"; ?>        
	
<?php //echo $template['body']; ?>

	
<div id="col1">
	
        <?php echo modules::run('infos/news_relation_mso'); ?>
        <!---------------------------------------------END News------------------------------------------>
        
		<?php echo modules::run('welfare/home_welfare'); ?>
            <!---------------------------------------------END WELFARE------------------------------------------>
                            
        <?php echo modules::run('infos/home_situation'); ?>
        <!---------------------------------------------END situation------------------------------------------>
        
        <?php echo modules::run('downloads/home_download'); ?>
        

        <!---------------------------------------------END DOWNLOAD------------------------------------------>    	


        <div id="download">
                <div class="download-title">รายงาน</div>
          

       </div>
 
  </div>
<!------------------------------------------------------------END Col1----------------------------------------------------------->  

   <?php include_once "_col2.php"; ?>
     
</div>
<!-------------------------------------------------------END wrap-------------------------------------------------------->  

     <?php //include_once "_footer.php"; ?>
     <?=modules::run('log/statvisits'); ?>
   
</body>
</html>
