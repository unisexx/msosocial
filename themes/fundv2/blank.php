<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']; ?></title> 
<?include('_inc.php')?>
</head>
<body>
<?include('_header.php')?>
    		
<!------------------------------------------------------------END Header and TopMenu----------------------------------------------------------->           
<div id="blank">
	<?php echo $template['body']; ?>
</div>

<!-------------------------------------------------------END Content-------------------------------------------------------->  
     
<?include('_footer.php')?>   
</body>
</html>
