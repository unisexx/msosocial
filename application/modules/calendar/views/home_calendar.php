<?php
error_reporting(0);
$year = date('Y');
$month = date('m');
?>
 <div id="calendar">
       	   <div class="calendartitle">ปฏิทินกิจกรรม</div>
           <div class="cal-arrow">
           
             <span class="cal-pre">
             <a class="Nav" href="javascript:void(0)" onMouseDown="gfFlat_s.showPrevMon();return false" onMouseOut="gfFlat_s.stopShowMon();if(this.blur)this.blur()" onMouseUp="gfFlat_s.stopShowMon()">
            &nbsp;
             </a>
             </span>
             
           		<!--<span class="cal-month">มีนาคม 2558</span>-->
                
                 <span id="smallCaption" class="cal-month">
                    	<span style="font-size:16px;"></span>
                 </span>
                  
          	 
             <span class="cal-next">
               <a class="Nav" href="javascript:void(0)" onMouseDown="gfFlat_s.showNextMon();return false" onMouseOut="gfFlat_s.stopShowMon();if(this.blur)this.blur()" onMouseUp="gfFlat_s.stopShowMon()">
              &nbsp;
               </a>
               </span>
               
           </div>
           
               <iframe width="100%" height="133" name="[<?php echo $year; ?>,<?php echo $month; ?>]:msmall:agenda.js:gfFlat_s:plugins_s.js" id="[<?php echo $year; ?>,<?php echo $month; ?>]:msmall:agenda.js:gfFlat_s:plugins_s.js" src="media/FlatCal/demos/MockupSibling/iflateng.htm" scrolling="no" frameborder="0" style="width: 222px; height: 184px;">
  				</iframe>
<!--   		   <table class="cal" width="95%">
                  <tr>
                    <th>จ</th>
                    <th>อ</th>
                    <th>พ</th>
                    <th>พฤ</th>
                    <th>ศ</th>
                    <th>ส</th>
                    <th>อา</th>
                  </tr>
                  <tr>
                    <td class="other-date">23</td>
                    <td class="other-date">24</td>
                    <td class="other-date">25</td>
                    <td class="other-date">26</td>
                    <td class="other-date">27</td>
                    <td class="other-date">28</td>
                    <td>1</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td class="today">19</td>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                  </tr>
                  <tr>
                    <td>30</td>
                    <td>31</td>
                    <td class="other-date">1</td>
                    <td class="other-date">2</td>
                    <td class="other-date">3</td>
                    <td class="other-date">4</td>
                    <td class="other-date">5</td>
                  </tr>
         </table>-->
         
        <span><a href="calendar/calendar_mso" class="viewall-vdo">ดูทั้งหมด</a></span>
        
        <div style="clear::both; margin-bottom:15px;"></div>
         
         </div>   
