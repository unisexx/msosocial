<div id="title-blank">รายงาน หน่วยงานรัฐ</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">รายงาน หน่วยงานรัฐ</span> 

</div>


<div id="news">
        	
                        <table class="table table-bordered table-striped table-hover">
                      <tbody>
                            
                          <tr>
                              <td>
                              		<div style="display:block; width:150px; text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_1.png"  /><br />
                                            จำแนกตามจังหวัด และ กลุ่มเป้าหมายผู้รับบริการสวัสดิการสังคม
                                        </a>
                                    </div>
                              </td>
                              <td>
									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_2.png"  /><br />
                                            จำแนกตามจังหวัด และ สาขาการให้บริการ
                                        </a>
                                    </div>
                              </td>
                                <td>
									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_3.png"  /><br />
                                            จำแนกตามจังหวัด และลักษณะการดำเนินงาน
                                        </a>
                                    </div>                              
                              </td>
                          </tr>
                            
                      </tbody>
                  </table>
                  <br />    
  
                      <table class="table table-bordered table-striped table-hover">
                      <tbody>
                            
                          <tr>
                              <td>
                              <form id="frmProvince" name="frmProvince" method="post" action="report/index" >
                              			<select id="seProvince" name="seProvince" style="width:250px;" class="form-control">
                                        <option value="">-- เลือกรายงานประจำจังหวัด</option>
                                         <option value="">แสดงทั้งหมด</option>
                                        	 <?foreach($all as $row):?>
                                            <option value="<?=$row->province_id?>"><?=$row->province_name?></option>
                                             <?endforeach;?>
                                        </select>
                              </form>
                              </td>
                              <td><a href="report/export_excel?seProvince=<?=@$_GET['seProvince']?>&type=3" target="_blank"><img src="media/icon_xls.png" /></a></td>
                          </tr>
                            
                      </tbody>
                  </table>
                  <br />  
                  
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
    
    <script>
	        $(document).ready(function () {


	            $('#seProvince').change(function () {

                		var province_id = $('#seProvince').val();
						location.href = 'report?seProvince=' + province_id;
                
				});
				
				
			});
	</script>