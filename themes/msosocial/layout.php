<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']; ?></title> 

<link href="themes/msosocial/css/template.css" type="text/css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/msosocial/css/topmenu.css">
<link rel="stylesheet" href="media/css/pagination.css">

<?php include_once "_header.php"; ?>
<?php //echo $template['metadata']; ?>

</head>
<body>
    
<div id="wrap">

<?php include_once "_menu.php"; ?>        
	
<?php echo $template['body']; ?>
     
</div>
<!-------------------------------------------------------END wrap-------------------------------------------------------->  

<?php include_once "_footer.php"; ?>
    
   
</body>
</html>
