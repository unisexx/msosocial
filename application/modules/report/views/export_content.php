<?php 

		$filename= "report_summary_content_".date("Y-m-d_H_i_s").".xls";
		header("Content-Disposition: attachment; filename=".$filename);
		
?>

<div class="title-report">รายงาน องค์กรสาธารณประโยขน์</div>

<div id="news">
        	
                    <div class="newstitle">จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัด</div>
                          
                  <table class="table table-bordered table-striped table-hover">
                      <tbody>
                          <tr>
                              <th rowspan="2" style="text-align:center; padding-top:40px;" >จังหวัด</th>
                              <th colspan="7" style="text-align:center;">ประเภทหน่วยงาน</th>
                          </tr>
                          <tr>
                              <th style="text-align:center;">หน่วยงานรัฐ</th>
                              <th style="text-align:center;">องค์กรสาธารณประโยขน์</th>
                              <th style="text-align:center;">จำนวนองค์กรสวัสดิการชุมชน</th>
                              <th style="text-align:center;">รวมทั้งสิ้น</th>
                          </tr>
                            
                          <?php foreach($rs as $row):?> 
                             
                          <tr >
                              <td><?=$row->province_name?></td>
                              <td style="text-align: right;" >10,601</td>
                              <td style="text-align:right;">7,978</td>
                                <td style="text-align:right;">3,427</td>
                               <td style="text-align:right;">22,006</td>
                          </tr>
                            
                          <?php endforeach;?>
                                    
                      </tbody>
                  </table>

   <div style=" font-weight:bold; color:#F00;"> <strong>แหล่งข้อมูล : </strong> จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัด ณ วันที่ <?=mysql_to_th(date('Y-m-d'))?></div>					
                    
 </div>
           
    <div class="clearfix">&nbsp;</div>
    