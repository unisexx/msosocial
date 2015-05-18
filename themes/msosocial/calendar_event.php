<?php

class Calendar
{
    /*
        Constructor for the Calendar class
    */
    function Calendar()
    {
    }
    
    
    /*
        Get the array of strings used to label the days of the week. This array contains seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function getDayNames()
    {
        return $this->dayNames;
    }
    

    /*
        Set the array of strings used to label the days of the week. This array must contain seven 
        elements, one for each day of the week. The first entry in this array represents Sunday. 
    */
    function setDayNames($names)
    {
        $this->dayNames = $names;
    }
    
    /*
        Get the array of strings used to label the months of the year. This array contains twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function getMonthNames()
    {
        return $this->monthNames;
    }
    
    /*
        Set the array of strings used to label the months of the year. This array must contain twelve 
        elements, one for each month of the year. The first entry in this array represents January. 
    */
    function setMonthNames($names)
    {
        $this->monthNames = $names;
    }
    
    
    
    /* 
        Gets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
      function getStartDay()
    {
        return $this->startDay;
    }
    
    /* 
        Sets the start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    function setStartDay($day)
    {
        $this->startDay = $day;
    }
    
    
    /* 
        Gets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function getStartMonth()
    {
        return $this->startMonth;
    }
    
    /* 
        Sets the start month of the year. This is the month that appears first in the year
        view. January = 1.
    */
    function setStartMonth($month)
    {
        $this->startMonth = $month;
    }
    
    
    /*
        Return the URL to link to in order to display a calendar for a given month/year.
        You must override this method if you want to activate the "forward" and "back" 
        feature of the calendar.
        
        Note: If you return an empty string from this function, no navigation link will
        be displayed. This is the default behaviour.
        
        If the calendar is being displayed in "year" view, $month will be set to zero.
    */
    function getCalendarLink($month, $year)
    {
        return "";
    }
    
 
    /*
        Return the HTML for the current month
    */
    function getCurrentMonthView()
    {
        $d = getdate(time());
        return $this->getMonthView($d["mon"], $d["year"] , 1);
    }
    

    /*
        Return the HTML for the current year
    */
    function getCurrentYearView()
    {
        $d = getdate(time());
        return $this->getYearView($d["year"]);
    }
    
    
    /*
        Return the HTML for a specified month
    */
    function getMonthView($month, $year ,$c_type)
    {
        return $this->getMonthHTML($month, $year ,$c_type);
    }
    

    /*
        Return the HTML for a specified year
    */
    function getYearView($year)
    {
        return $this->getYearHTML($year);
    }
    
    
    
    /********************************************************************************
    
        The rest are private methods. No user-servicable parts inside.
        
        You shouldn't need to call any of these functions directly.
        
    *********************************************************************************/


    /*
        Calculate the number of days in a month, taking into account leap years.
    */
    function getDaysInMonth($month, $year)
    {
        if ($month < 1 || $month > 12)
        {
            return 0;
        }
   
        $d = $this->daysInMonth[$month - 1];
   
        if ($month == 2)
        {
            // Check for leap year
            // Forget the 4000 rule, I doubt I'll be around then...
        
            if ($year%4 == 0)
            {
                if ($year%100 == 0)
                {
                    if ($year%400 == 0)
                    {
                        $d = 29;
                    }
                }
                else
                {
                    $d = 29;
                }
            }
        }
    
        return $d;
    }


    /*
        Generate the HTML for a given month
    */
    function getMonthHTML($m, $y, $c_type, $showYear = 1)
    {
        $s = "";
        
        $a = $this->adjustDate($m, $y);
        $month = $a[0];
        $year = $a[1];        
        
    	$daysInMonth = $this->getDaysInMonth($month, $year);
    	$date = getdate(mktime(12, 0, 0, $month, 1, $year));
    	
    	$first = $date["wday"];
    	$monthName = $this->monthNames[$month - 1];
    	
    	$prev = $this->adjustDate($month - 1, $year);
    	$next = $this->adjustDate($month + 1, $year);
    	
    	if ($showYear == 1)
    	{
    	    $prevMonth = $this->getCalendarLink($prev[0], $prev[1] ,$c_type);
    	    $nextMonth = $this->getCalendarLink($next[0], $next[1] ,$c_type);
    	}
    	else
    	{
    	    $prevMonth = "";
    	    $nextMonth = "";
    	}
    	
    	$header = $monthName . (($showYear > 0) ? " " . ($year+543) : "");
    	
    	$s .= "<table width=\"663\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#f2f2f2\">";
    	$s .= "  <tr>";
    	$s .= "    <td bgcolor=\"#f6f6f6\">";
		
		

    	$s .= "<table border=\"0\" width=\"100%\"  cellpadding=\"0\" cellspacing=\"1\">\n";
    	$s .= "<tr>\n";
		
    	$s .= "<td align=\"center\"  height=\"44\" width=\"100\">
		
		<div style=\"float:left; width:33; height:25;\" class=\"calendar_nav\" >" . (($prevMonth == "") ? "&nbsp;" : "
		<a href=\"$prevMonth\" title=\"เดือนก่อนนี้\" class=\"nav_prev\">
		<img src=\"themes/msosocial/images/arrow_left.png\" border=\"0\"></a>
		</div>").
		
		 " <div style=\"float:left; width:33; height:25;\" class=\"calendar_nav\" >". (($nextMonth == "") ? "&nbsp;" : "
		 <center>
		 <a href=\"$nextMonth\" title=\"เดือนถัดไป\" class=\"nav_next\">
		 <img src=\"themes/msosocial/images/arrow_right.png\" border=\"0\"></a>
		 </div>
		 </center>")  .
		 
		 "</td>\n";
		 
    	$s .= "<td align=\"center\"  colspan=\"5\"><strong><font size=\"3\" color=\"#000000\" face=\"Tahoma\"><center>$header</center></font></strong></td>\n"; 
    	$s .= "<td align=\"center\"  ></td>\n";
    	$s .= "</tr>\n";
    	
    	$s .= "<tr>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+1)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+2)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+3)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+4)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+5)%7] . "</center></font></td>\n";
    	$s .= "<td align=\"center\" valign=\"top\"   background=\"themes/msosocial/images/bg-btn-month.png\"  height=\"23\" width=\"14%\"><font size=\"2\" face=\"Tahoma\" color = \"#FFFFFF\"><center>" . $this->dayNames[($this->startDay+6)%7] . "</center></font></td>\n";
    	$s .= "</tr>\n";
    	
    	// We need to work out what date to start at so that the first appears in the correct column
    	$d = $this->startDay + 1 - $first;
    	while ($d > 1)
    	{
    	    $d -= 7;
    	}

        // Make sure we know when today is, so that we can use a different CSS style
        $today = getdate(time());
    	
    	while ($d <= $daysInMonth)
    	{
    	    $s .= "<tr>\n";       
    	    
    	    for ($i = 0; $i < 7; $i++)
    	    {
        	    $class = ($year == $today["year"] && $month == $today["mon"] && $d == $today["mday"]) ? "calendarToday" : "calendar";
			
			if($d >=1 and $d <=31 )
			{

				
				$where = "";
					
/*				$calenar_type = $_GET['c_type'];
				
				if($calenar_type==""){$calenar_type=1;}*/
				
				$calenar_type = 1;
				
/*				if($_GET['t'])
				{
				
					if($calenar_type==1){ $where = " and meeting_members.type_members_id = ".$_GET['t']; }
					if($calenar_type==2){ $where = " and b.id_meeting_room = ".$_GET['t']; }
					if($calenar_type==3){ $where = " and activity_admin.type_members = ".$_GET['t']; }
				
				}*/
				
				if($calenar_type==1)
				{
				
					$sql = "select * from activity order by id desc";
				}
				elseif($calenar_type==2)
				{
					$sql = "select * from activity order by id desc";
				}
				elseif($calenar_type==3)
				{
					$sql = "select * from activity order by id desc";

				}
				
				//echo $sql."<br>";
				$query=mysql_query($sql);
				$result=mysql_fetch_array($query);
			}
			else
			{
			$result="";
			}
				if($result)
				{
					if($calenar_type==1)
					{
						
						$link="themes/msosocial/show_event.php?t=1&edate=".$result['act_date']."&id=".$result['id'];
						$title=iconv_substr($result['topic'], 0,24, "UTF-8").".....";
						$time_start = $result['act_date'];
						$time_end = $result['act_date'];
					
					}
					elseif($calenar_type==2)
					{
						$link="themes/msosocial/show_event.php?t=2&edate=".$result['act_date']."&id=".$result['id'];
						$title=iconv_substr($result['topic'], 0,24, "UTF-8")."....."; 
						$time_start = $result['act_date'];
						$time_end = $result['act_date'];
					}
					elseif($calenar_type==3)
					{
						$link="themes/msosocial/show_event.php?t=3&edate=".$result['act_date']."&id=".$result['id'];
						$title=iconv_substr($result['topic'], 0,24, "UTF-8")."....."; 
						$time_start = $result['act_date'];
						$time_end = $result['act_date'];
					}
				
				}
				else
				{
					$link="";
					$title="";
					$time_start = "";
					$time_end = "";
				}
				
				if($result != "")
				{
					$bgcolor="fddfe9";  // have act
				}
				else if(($i ==5 or $i == 6) && ($d > 0 && $d <= $daysInMonth))
				{
					$bgcolor="f2f2f2";    // sun sat 
				}
				else if($d > 0 && $d <= $daysInMonth)
				{
					$bgcolor="FFFFFF";	 			
				}
				else
				{
					$bgcolor="fff3f8";  //etc
				}
				
				
				//--- check type member 
				
				       $calenar_type=1;
				
						if($calenar_type==1)
						{
							$id_type = 1;
						}
						elseif($calenar_type==2)
						{
							$id_type = 2;
						}
						elseif($calenar_type==3)
						{
							$id_type = 3;
						}
				
						if($id_type==1)
						{
							$bg = 'point-blue.png';

						}
						elseif($id_type==2)
						{
							$bg = 'point-brown.png';

						}
						elseif($id_type==3)
						{
							$bg = 'point-darkblue.png';

						}
				
				// --- end check type 
				
				
    	        $s .= "<td class=\"$class\" align=\"right\" width=\"97\" height=\"80\" bgcolor=\"$bgcolor\" title=\"$title\" valign='top' style='padding: 4 4 4 4;'><font size=\"2\" face=\"Tahoma\" >";       
    	        if ($d > 0 && $d <= $daysInMonth)
    	        {   	            
    	            $s .= (($link == "") ? $d : 
					
					"
					
					$d
					
					
					<div style=\"margin-top:5px;margin-bottom:5px; margin-right:5px; color:#FFF;			
								 background-color:#9c9c9b;
								 text-align:center;
								 width:92px; height:16px;
								 border-radius:4px;
								 -webkit-border-radius:4px;
								 -moz-border-radius:4px;\"> 
					
						$time_start - $time_end 
					
					</div>
								
					<div style=\"text-align:left; margin-left:5px; \">
					
						<img src = 'themes/msosocial/images/point/$bg' width = '12' height = '12'>
					
						<a href=\"$link\" class=\"fancybox fancybox.ajax\"> &nbsp;&nbsp; $title </a>  
					
					</div>
					
					");
    	        }
    	        else
    	        {
    	            $s .= "-";
    	        }
      	        $s .= "</font></td>\n";       
        	    $d++;
    	    }
    	    $s .= "</tr>\n";    
    	}
    	
    	$s .= "</table>\n";
    	
    	$s .= "</td>";
    	$s .= "</tr>";
    	$s .= "</table>";

    	return $s;  	
    }
    

    function adjustDate($month, $year)
    {
        $a = array();  
        $a[0] = $month;
        $a[1] = $year;
        
        while ($a[0] > 12)
        {
            $a[0] -= 12;
            $a[1]++;
        }
        
        while ($a[0] <= 0)
        {
            $a[0] += 12;
            $a[1]--;
        }
        
        return $a;
    }

    /* 
        The start day of the week. This is the day that appears in the first column
        of the calendar. Sunday = 0.
    */
    var $startDay = 1;

    /* 
        The start month of the year. This is the month that appears in the first slot
        of the calendar in the year view. January = 1.
    */
    var $startMonth = 1;

    /*
        The labels to display for the days of the week. The first entry in this array
        represents Sunday.
    */
    var $dayNames = array("อา", "จ", "อ", "พ", "พฤ", "ศ", "ส");
    
    /*
        The labels to display for the months of the year. The first entry in this array
        represents January.
    */
    var $monthNames = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                            "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
                            
                            
    /*
        The number of days in each month. You're unlikely to want to change this...
        The first entry in this array represents January.
    */
    var $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    
}

class MyCalendar extends Calendar
{
    function getCalendarLink($month, $year ,$c_type)
    {
        // Redisplay the current page, but with some parameters
        // to set the new month and year
        
		//$s = getenv('SCRIPT_NAME');
		
		$s = $_SERVER['SCRIPT_NAME'];
		$month = $month;
		$year = $year;
		$c_type = $c_type;
		
        return $s."?sMonth=".$month."&sYear=".$year."&c_type=".$c_type;
    }
}



?>

<meta http-equiv=Content-Type content="text/html; charset=utf-8">


<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>

<?php
// If no month/year set, use current month/year
 
mysql_connect("localhost","root","");
mysql_select_db("fundv2") or die(mysql_error());
mysql_query("SET NAMES UTF8");

//include_once "meeting_room/include/config.php";

$d = getdate(time());

//$month = $_GET["sMonth"];
//$year = $_GET["sYear"];

/*$c_type = $_GET['c_type'];
				
if($c_type==""){$c_type=1;}

if ($month == "")
{
    $month = $d["mon"];
}

if ($year == "")
{
    $year = $d["year"];
}*/
$c_type=1;
$month = $d["mon"];
$year = $d["year"];
 

$cal = new MyCalendar;
echo $cal->getMonthView($month, $year ,$c_type);
?>

