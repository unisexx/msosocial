<?php

	
				session_start();
				
				
				//include_once "include/config.php";
				
				
				mysql_connect("localhost","root","");
				mysql_select_db("fundv2") or die(mysql_error());
				mysql_query("SET NAMES UTF8");
		
				date_default_timezone_set('Asia/Bangkok');
					
				$cdate=date("Y-m-d H:i:s");
	
	
				$id=$_GET['id'];
						
				$q=mysql_query("SELECT
				*
				FROM
				activity
				WHERE
				id = '".$id."'");
				
				$qr=mysql_query($q);
				$r = mysql_fetch_array($qr);
				
	
	
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียด</title>
</head>

<body>


<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="left" valign="top"></td>
  </tr>
  <tr>
    <td width="88%" align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="4">
      
      <tr>
        <td bgcolor="#EBEBEB"><span style="font-weight: bold; color:#000; size:18px" >รายละเอียด</span></td>
        </tr>
      
      
      <tr>
        <td align="center" valign="top">
          
          
         
      
      <table width="95%" cellspacing="2" cellpadding="4">
        <tr>
          <td width="16%" align="right" valign="top" bgcolor="#f2c2d0">ชื่อกิจกรรม :</td>
          <td width="56%" align="left" valign="top" bgcolor="#FAE7EC"><?php echo $r['topic']; ?></td>
          </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#f2c2d0">ประเภทกิจกรม :</td>
          <td align="left" valign="top" bgcolor="#FAE7EC"><?php echo $r['type_activity']; ?></td>
          </tr>
        <tr>
          <td align="right" valign="top" bgcolor="#f2c2d0">วันที่ :</td>
          <td align="left" valign="top" bgcolor="#FAE7EC"><?php echo $r['act_date']; ?></td>
          </tr>
        </table>
        
          
         	 
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>

</body>
</html>
