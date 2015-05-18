<link rel='stylesheet' href='media/fullcalendar/demos/cupertino/theme.css' />
<link href='media/fullcalendar/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='media/fullcalendar/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='media/fullcalendar/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" src="media/calendarDateInput.js"></script>

<style>

	
    #calendar1 {
        width: 95%;
        margin: 0 auto;
    }
	
	.fc-event-title{ 
			background-color:transparent; font-size:small; color:#FFF;	
	}

    .fc-wed, .fc-tue {
        background:  #FFF2F2;
    }
	.fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end{ height:5px;}

    html, body, div, span, strong {
        font-weight: normal;
        color: black;
    }

.show_sub1 { float:left; background-color:#77c705; width:74px; height:24px;border-radius:4px;
-webkit-border-radius:4px;-moz-border-radius:4px;
padding:15px 15px 30px 15px; margin-left:15px;  text-align:center; font-weight:normal; color:#FFF;}

.show_sub2 {float:left;background-color:#027ac6; width:74px; height:24px;border-radius:4px;
-webkit-border-radius:4px;-moz-border-radius:4px;
padding:15px 15px 30px 15px;margin-left:15px; text-align:center;font-weight:normal; color:#FFF;}

.show_sub3 {float:left;background-color:#ce9a5e; width:74px; height:24px;border-radius:4px;
-webkit-border-radius:4px;-moz-border-radius:4px; 
padding:15px 15px 30px 15px;margin-left:15px; text-align:center;font-weight:normal; color:#FFF;}

</style>

<script>

    $(document).ready(function () {

        var d = new Date();
        var c_year = d.getFullYear();
        var c_year_th = c_year + 543;
        var p_month = d.getMonth();
        var d1 = d.getDate();

        var date = new Date();
        var dd = date.getDate();
        var mm = date.getMonth();
        var yy = date.getFullYear();


        $('#calendar1').fullCalendar({



            defaultView: 'month',
            year: c_year_th,
            month: p_month,

            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            titleFormat: {
                month: 'MMMM yyyy',
                week: "d MMM [yyyy]{ '&#8212;'d [MMM] yyyy}",
                day: 'dddd, d MMM, yyyy'
            },
            columnFormat: {
                month: 'ddd',
                week: 'ddd d/M',
                day: 'dddd d/M'
            },

            monthNames: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
            monthNamesShort: ['มค.', 'กพ.', 'มค..', 'มย.', 'พค.', 'มย.', 'กค.', 'สค.', 'กย.', 'ตค.', 'พย.', 'ธค.'],
            dayNames: ['พฤหัสบดี', 'ศุกร์', 'เสาร์', 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ'],
            dayNamesShort: ['พฤ.', 'ศ.', 'ส.', 'อา.', 'จ.', 'อ.', 'พ.'],
            buttonText: {
                today: 'วันนี้',
                month: 'เดือน',
                week: 'สัปดาห์',
                day: 'วัน'
            },
            editable: true,

            firstDay: 3,
            events: [
			
			<?php
						//include('themes/msosocial/odbc_connect.php');
						$this->load->helper('html'); 
						
						foreach($rs as $row):
					
						dbConvert($row);
							
						$bg = "#77c705";

						$cat_type = $row['actcalendar_type_id'];
						$s_date = $row['startdate'];
						$e_date = $row['enddate'];
						$calendar_id = $row['id'];
						$calendar_title = $row['title'];
						
						
							
						if(strlen($calendar_title)>24)
						{
							$str_data = html_entity_decode($calendar_title);
							$str_data = strip_tags($str_data);
							$calendar_title =  iconv_substr($str_data, 0,24, "UTF-8").".."; 
						}
						
						
						$sd = explode(" ", $s_date); 
						$sd1 = explode("-", $sd[0]); 
						
						$ed = explode(" ", $e_date); 
						$ed1 = explode("-", $ed[0]); 			
						
						
						if ($cat_type == '7')
						{
				
							$bg = "#029DF0";
						}
						else if ($cat_type == '8')
						{
							$bg = "#F79528";
						}
						else if ($cat_type == '9')
						{
				
							$bg = "#79dc16";
						}
						
						
						/*
						$calendar_cat = $db->Execute("select * from INTRANET_ACTCALENDAR_TYPE WHERE ID = ".$cat_type);
						foreach($calendar_cat as $row_cat){
			
							dbConvert($row_cat);
							$bg = $row_cat['color'];				
						}
						*/
						    $s_m = $sd1[1]-1;
							$e_m = $ed1[1]-1;
						
							$strChkDate = $sd1[0];
							$strChkMonth = $s_m;
							$strChkYear = $sd1[2];
						
							$all_dateY = $strChkDate."_".$strChkMonth."_".$strChkYear;
						
							$count_act = 0;
							$chKShow = 0;
							$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
							 "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", 
							 "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
							
							
							if ($chKShow == 0)
							{
								$all_dateY_details = $strChkDate."_".($strChkMonth + 1)."_".$strChkYear;
								$syear_th = $sd1[0] + 543;
								$eyear_th = $ed1[0] + 543;
								if($count_act == 0){$count_act = 1; }
						?>		
									{
			
										title: '<?php echo $sd[1]."  ".$calendar_title; ?>',
										start: new Date('<?php echo $syear_th; ?>', '<?php echo $s_m; ?>', '<?php echo $sd1[2]; ?>'),
										end: new Date('<?php echo $eyear_th; ?>', '<?php echo $e_m; ?>', '<?php echo $ed1[2]; ?>'),
										url: 'calendar/calendar_mso_detail/<?php echo $calendar_id; ?>',
										backgroundColor: '<?php echo $bg; ?>'
			
									},
				<?php
				
							}
				endforeach;
				
			?>

            ],
            eventClick: function (event) {
                if (event.url) {

                    var x = screen.width / 2 - 700 / 2;
                    var y = screen.height / 2 - 450 / 2;

                    myWindow = window.open(event.url, '', 'width=1030,height=450,scrollbars=yes,left=' + x + ',top=' + y +'_blank');
					//window.open(url, '_blank');
                    myWindow.focus();
                    return false;

                }
            },

        });  // end calendar1






    });

</script>

  <div id="download">
        	<div class="download-title">ปฏิทินกิจกรรม</div>
            
                <div class="" id="">

                   <form id="frmCalendar" name="frmCalendar" method="get" action="calendar/lists" class="form-horizontal" >
                      
                      <table class="table table-bordered" style="background-color:#ffffcd; border:none;">
                      <tbody>
                            <tr>
                            
                                <td style="text-align:left; width:160px;">
                                
										  <div class="form-group">
                                            <div class="col-sm-10">
                                            			
                                           <!--   <input type="text" class="form-control" id="searchDate" name="searchDate" placeholder="วันที่กิจกรรม" autocomplete="off" style="width:150px;">--><script>DateInput('searchDate', true, 'YYYY-MM-DD')</script>  
                                            </div>
                                          </div>
                                
                                </td>
                             
                              <td style="text-align:  left; width:100%;">
                              
                                <div class="form-group" style="margin-left:20px;">
                                    
                                      <button type="submit" class="btn btn-default">ค้นหา</button>
                                   
                                  </div>
              
                              </td>
                          
                          </tr>
                            
                      </tbody>
                  </table>
                  
                   </form>           
                    
                </div><!--#nav-search-->
                                    <div style="clear:both; margin-top:15px; margin-bottom:5px;">&nbsp;</div>
            <div id="tab">
                <div id="tabkm1">
                
                    <ul id="navtab">
                    
                        <li><a href="#tab1" class="active">ปฏิทินกิจกรรม</a></li>
                    
                    </ul>
                    
                    <div class="clearfix" style="line-height:0;">&nbsp;</div>
                	
                    <div id="konten">
                    
                        <div style="display: none;" id="tab1" class="tab_konten">


							<div id='calendar1'></div>
                            
						  <div style="clear:both; margin-top:15px; margin-bottom:5px;">&nbsp;</div>
                            <?php 
                            
								$bg_bulet = "#77c705";
								
								foreach($rs_type as $row_type){
							
								dbConvert($row_type);
									
								$bg_bulet = $row_type['color'];
								
				        	?>
							
							<div style="float:left; background-color:<?php echo $bg_bulet; ?>; width:74px; height:24px;border-radius:4px;
-webkit-border-radius:4px;-moz-border-radius:4px;
padding:15px 15px 30px 15px; margin-left:15px;  text-align:center; font-weight:normal; color:#FFF;">
								
								<?php echo $row_type['name']; ?>
								
							</div>
                            
                            <?php } ?>
                            
                            <div style="clear:both; margin-top:15px; margin-bottom:5px;">&nbsp;</div>
                            
                        </div>         
                  </div>
                </div>
          </div>
        </div>
        
