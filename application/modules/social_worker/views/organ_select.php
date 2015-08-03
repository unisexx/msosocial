<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>องค์การสวัสดิการสังคม</title> 
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
<link href="themes/msosocial/css/template.css?v=<?php echo filemtime('themes/msosocial/css/template.css'); ?>" type="text/css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="themes/msosocial/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/msosocial/css/topmenu.css">
<link rel="stylesheet" href="media/css/pagination.css">
<link rel="stylesheet" href="themes/msosocial/css/img.css">

<script type="text/javascript">
$(document).ready(function(){
    $(".tblist tr:odd").addClass("odd");
    $(".tblist tr:not(.odd)").addClass("even");  
});

function ins_name(n,ngo) {
    opener.composeform_sub.organ_id.value = n;
    opener.composeform_sub.organ_name.value = ngo;
	window.close();
}

Cufon.replace('h1, h3, h4, h5, ul#navmenu-h');

     var RecaptchaOptions = {
        theme : 'custom',
        custom_theme_widget: 'recaptcha_widget'
     };
</script>
</head>
<body style="padding-left:20px;padding-right:20px;">
<?php 
	$under_type_sub_arr = array('1'=>'ส่วนราชการ','2'=>'องค์กรปกครองส่วนท้องถิ่น','3'=>'มูลนิธิ','4'=>'สมาคม','5'=>'องค์กรภาคเอกชน','6'=>'(ถ้ามี)','7'=>'กลุ่มออมทรัพย์','8'=>'สหกรณ์','9'=>'ศูนย์พัฒนาครอบครัว','10'=>'องค์กรสวัสดิการชุมชน','11'=>'เครือข่ายองค์กรสวัสดิการชุมชน');
?>

<h2 style="font-size: 24px; color: orange;">องค์การสวัสดิการสังคม</h2>

<form action="" method="get">

  <div class="input-group">
  	<div style="width:250px;display:inline;float:left;">
  	<input type="text" name="search" value="<?php echo @$_GET['search']?>" placeholder="ชื่อหน่วยงาน" class="form-control" />
  	</div>
  	<div style="width:150px;display:inline;float:left;">
	  	<select name="budget_year" class="form-control">
	      <option value="">-- ปีงบประมาณ --</option>
	      <?php for ($x=date("Y")+543; $x>=2546; $x--):?>
	      <option value="<?php echo $x?>" <?php echo ($x == @$_GET['budget_year'])?'selected':'';?>><?php echo $x?></option>
	      <?php endfor;?>
	    </select>
    </div>
    <div style="width:150px;display:inline;float:left;">
    	<?php echo form_dropdown('province_code', get_option('province_code', 'province_name', 'act_province', '1=1 order by province_name asc',null,'adoDB'), @$_GET['province_code'], 'class="form-control"', '- เลือกจังหวัด -'); ?>
    </div>    
	<input type="submit" name="button9" id="button9" title="ค้นหา" value=" ค้นหา  " class="btn btn-primary" /></div>
	</div>

</form>

<?php echo $pagination;?>

<table class="table table-bordered table-hover" style="background:#FFFFFF;">
<tr style="background:#F0E99A;">
  <th align="left">รหัส</th>
  <th align="left">ชื่อหน่วยงาน</th>
  <th align="left">ที่อยู่</th>
</tr>
<?php $i=(isset($_GET['page']))? (($_GET['page'] -1)* 10)+1:1; ?>
<?php
foreach($result as $row):
?>
<tr class="cursor" onclick="javascript:ins_name('<?php print $row['organ_id'] ?>','<?php print $row['organ_name']; ?>');">
  <td nowrap="nowrap"><?php echo $row['organ_id']?></td>
  <td><?php echo $row['organ_name']?></td>
  <td>
  	<?php echo ($row['o_name'])?$row['o_name']:"";?>
  	<?php echo ($row['home_no'])?" เลขที่ ".$row['home_no']:"";?>
  	<?php echo ($row['moo'])?" หมู่ที่ ".$row['moo']:"";?>
  	<?php echo ($row['soi'])?" ซ. ".$row['soi']:"";?>
  	<?php echo ($row['road'])?" ถ. ".$row['road']:"";?>
  	<?php echo ($row['tumbon_code'])?" &nbsp;ต. ".act_get_tumbon($row['province_code'],$row['ampor_code'],$row['tumbon_code']):"";?>
	<?php echo ($row['ampor_code'])?" &nbsp;อ. ".act_get_ampor($row['province_code'],$row['ampor_code']):"";?>
	<?php echo ($row['province_code'])?" &nbsp;จ. ".act_get_province($row['province_code']):"";?>
  </td>
</tr>
<?$i++;?> 
<?php endforeach;?>
</table>
<?php echo $pagination;?>
</body>
</html>