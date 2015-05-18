<?php 

		$filename= "report_summary_content_".date("Y-m-d_H_i_s").".xls";
		header("Content-Disposition: attachment; filename=".$filename);
		
?>

<div class="title-report">รายงาน จำนวนหน่วยงานของรัฐ จำแนกรายจังหวัดและกลุ่มเป้าหมายผู้ได้รับบริการสวัสดิการสังคม</div>

<div id="news">
        
                    <div class="newstitle">จำนวนหน่วยงานของรัฐ จำแนกรายจังหวัดและกลุ่มเป้าหมายผู้ได้รับบริการสวัสดิการสังคม</div>
                          
                  <table class="table table-bordered table-striped table-hover">
                      <tbody>
                          <tr>
                              <th rowspan="2" style="text-align:center; padding-top:40px;" >จังหวัด</th>
                              <th colspan="21" style="text-align:center;">กลุ่มเป้าหมายผู้รับบริการ</th>
                          </tr>
                          <tr>
                              <th style="text-align:center;">1</th>
                              <th style="text-align:center;">2</th>
                              <th style="text-align:center;">3</th>
                              <th style="text-align:center;">4 </th>
                              <th style="text-align:center;">5</th>
                              <th style="text-align:center;">6</th>
                              <th style="text-align:center;">7</th>
                              <th style="text-align:center;">8</th>
                              <th style="text-align:center;">9</th>
                              <th style="text-align:center;">10</th>
                              <th style="text-align:center;">11</th>
                              <th style="text-align:center;">12</th>
                              <th style="text-align:center;">13</th>
                              <th style="text-align:center;">14</th>
                              <th style="text-align:center;">15</th>
                              <th style="text-align:center;">16</th>
                              <th style="text-align:center;">17</th>
                              <th style="text-align:center;">18</th>
                              <th style="text-align:center;">19</th>
                              <th style="text-align:center;">20</th>
                              <th style="text-align:center;">21</th>
                          </tr>
                            
                          <?foreach($rs as $row):?> 
                             
                          <tr >
                              <td><?=$row->province_name?></td>
                              <td style="text-align: right;" >2,200</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                               <td style="text-align:right;">480</td>
                              <td style="text-align: right;">5</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                               <td style="text-align: right;" >2,200</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                               <td style="text-align:right;">480</td>
                              <td style="text-align: right;">5</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                               <td style="text-align: right;" >2,200</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                               <td style="text-align:right;">480</td>
                              <td style="text-align: right;">5</td>
                              <td style="text-align:right;">480</td>
                                <td style="text-align:right;">297</td>
                          </tr>
                            
                          <?endforeach;?>
                                    
                      </tbody>
                  </table>

   <div style=" font-weight:bold; color:#F00;"> 
   
       <strong>หมายเหตุ : </strong>
       
			กลุ่มเป้าหมายผู้รับบริการ : 1=เด็ก,2=เด็กและเยาวชน,3=เยาวชน,4=ผู้สูงอายุ......,21=อื่น ๆ 
   
   </div>		
   
   <div style=" font-weight:bold; color:#F00;"> 
   
       <strong>แหล่งข้อมูล : </strong>
       
        ฐานข้อมูลระบบจดทะเบียนองค์กรสวัสดิการสังคม สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนูษย์ ณ วันที่ <?=mysql_to_th(date('Y-m-d'))?>
   
   </div>					
                    
 </div>
           
    <div class="clearfix">&nbsp;</div>
    
