<?php 

		$filename= "report_summary_data_".date("Y-m-d_H_i_s").".xls";
		header("Content-Disposition: attachment; filename=".$filename);
		
?>

<div class="title-report">รายงาน</div>

<div id="news">
        	
  <div class="newstitle">จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัดและลักษณะการดำเนินการองค์กร</div>
   
                  <table class="table table-bordered table-striped table-hover">
                      <tbody>
                          <tr>
                              <th rowspan="2">จังหวัด</th>
                              <th colspan="3">ประเภทลักษณะการดำเนินการองค์กร</th>
                          </tr>
                          <tr>
                              <th>องค์กรการเงินชุมชน</th>
                              <th>การผลิตและธุรกิจชุมชน</th>
                              <th>ทรัพยากรธรรมชาติและสิ่งแวดล้อม</th>
                          </tr>
                            
                          <?foreach($rs as $row):?> 
                             
                          <tr>
                              <td><?=$row->province_name?></td>
                              <td>2,200</td>
                              <td>480</td>
                                <td>297</td>
                          </tr>
                            
                          <?endforeach;?>
                                    
                      </tbody>
                  </table>

   <div style=" font-weight:bold; color:#F00;"> <strong>แหล่งข้อมูล : </strong> จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัดและลักษณะการดำเนินการองค์กร</div>					
                    
 </div>
           
    <div class="clearfix">&nbsp;</div>
    