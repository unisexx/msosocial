<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 
		<meta name="description" content="with selectable items(single &amp; multiple) and custom icons" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!--basic styles-->
		<link href="themes/ace_admin/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="themes/ace_admin/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="themes/ace_admin/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="themes/ace_admin/assets/css/colorbox.css" />
		
		<!--font-awesome-4.2.0 styles-->
		<link rel="stylesheet" href="media/font-awesome-4.2.0/css/font-awesome.min.css" />
		<style type="text/css">
		.nav-list>li>a>[class*="fa"]:first-child {
			display: inline-block;
			vertical-align: middle;
			min-width: 30px;
			text-align: center;
			font-size: 18px;
			font-weight: normal;
		}
		</style>
		
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->
		<link rel="stylesheet" href="themes/ace_admin/assets/css/ace.min.css" />
		<link rel="stylesheet" href="themes/ace_admin/assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="themes/ace_admin/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<?php include_once('_script.php');?>
		<?php echo $template['metadata']; ?>
	</head>
	<body> 
		<div id="container">
			<div class="inner"><?php echo $template['body']; ?></div>
		</div> 
		<div id="footer"></div> 
	</body>
</html>