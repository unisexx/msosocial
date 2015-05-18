<?php

		//include_once "include/config.php";
		
		mysql_connect("localhost","root","");
		mysql_select_db("fundv2") or die(mysql_error());
		mysql_query("SET NAMES UTF8");

		date_default_timezone_set('Asia/Bangkok');
		
		
		$cdate=date("Y-m-d H:i:s");
		$tdate=date("Y-m-d");
	
		$edate=$_GET['edate'];
		
		$id = $_GET['id'];
		$t = $_GET['t'];
		$m = $_GET['m'];
	
		if($t==1)
		{
			$type_name = "กิจกรรมทั่วไป";
		}
		elseif($t==2)
		{
			$type_name = "รายการจองห้องประชุม";
		}
		elseif($t==3)
		{
			$type_name = "กิจกรรมผู้บริหาร";
		}





if($t==1)
{
	
		$q=mysql_query("SELECT
		*
		FROM
		activity
		WHERE
		act_date = '".$edate."'");
		

}

if($t==2)
{
	
		$q=mysql_query("SELECT
		*
		FROM
		activity
		WHERE
		act_date = '".$edate."'");
		

}
if($t==3)
{

		$q=mysql_query("SELECT
		*
		FROM
		activity
		WHERE
		act_date = '".$edate."'");
		
}

		$q=mysql_query($str);
		$row=mysql_num_rows($q);
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียด <?php echo $type_name; ?> ณ วันที่ : <?php echo $edate; ?></title>

<link href="media/resources/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" rel="stylesheet">
<script src="media/resources/js/jquery.js"></script>
<script src="media/resources/fancybox/jquery.fancybox.js?v=2.1.4"></script>


<style>
.table1 {border-spacing:1px;  border:1px solid #e9a6bb; -moz-border-radius: 4px;  -webkit-border-radius: 4px;  border-radius: 4px;}
.table1 tr td {padding:5px;}
.table1 tr{background:#fee6f1;}
.table1 tr:hover {  background: #f3f2f2; -o-transition: all 0.1s ease-in-out; -webkit-transition: all 0.1s ease-in-out;-moz-transition: all 0.1s ease-in-out; -ms-transition: all 0.1s ease-in-out;  transition: all 0.1s ease-in-out;   } 
</style>


</head>

<body>




<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" valign="top" bgcolor="#EBEBEB"><b><font style="color:#d73e6d;">รายการกิจกรรมประจำปี <?php echo date('Y'); ?> </font></b></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <br />
        
        <table border="0" cellspacing="0" cellpadding="0" width="100%" class="table1">
          <tbody>
            <tr>
              <th colspan="5" align="center" valign="top" bgcolor="#FFFFFF" scope="row"><h3><?php echo $type_name; ?></h3></th>
            </tr>
            <tr>
              <th width="5%" align="left" bgcolor="#f2c2d0" scope="row"><div align="center">ลำดับที่</div></th>
              <td width="15%" align="left" valign="top" bgcolor="#f2c2d0"><div align="center">วันเวลา</div></td>
              <td width="30%" align="left" valign="top" bgcolor="#f2c2d0"><div align="center">เรื่อง</div></td>
              <td width="10%" align="left" valign="top" bgcolor="#f2c2d0"> </td>
            </tr>
            
			<?php
				for($i=1;$i<=$row;$i++){
					
					$r=mysql_fetch_array($q);
            ?>

            <tr>
              <th align="left" valign="top" scope="row"><div align="center"><?php echo $i; ?></div></th>
              <td align="left" valign="top"><div align="center">
              <?php echo $r['act_date'];?>
              </div>
              
              </td>
              <td align="left" valign="top">
              
                <?php echo $r['topic']; ?>
              
              </td>
              <td align="left" valign="top">
              
              <?php 
			  
			  
			  		if($t==1)
					{
						
						echo "<a href='show_act1_details.php?id=".$r['id']."&t=".$r['type_members']."' target='_self' class=\"fancybox fancybox.ajax\">รายละเอียด</a>";
							
					}
					elseif($t==2)
					{
						echo "<a href='show_event_details.php?id=".$r['id']."&t=".$r['type_members']."' target='_self' class=\"fancybox fancybox.ajax\">รายละเอียด</a>";
					}
					elseif($t==3)
					{
						echo "<a href='show_act_details.php?id=".$r['id']."&t=".$r['type_members']."' target='_self' class=\"fancybox fancybox.ajax\">รายละเอียด</a>";
					}
			  
			  
			  ?> 
              
              
              </td>
            </tr>
			<?php
            }
            ?>           
            
          </tbody>
        </table>
      <br />
      
      
      </td>
    </tr>
  </tbody>
</table>

<br>


<table width="95%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center" valign="top"><!--<input type="button" name="close" id="close" value="ปิดหน้าต่าง"  onclick="window.close();" />--></td>
  </tr>
</table>



</body>
</html>