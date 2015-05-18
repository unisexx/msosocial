<div id="title-blank">รายงาน จำนวนองค์กรสวัสดิการสังคม</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">รายงาน จำนวนองค์กรสวัสดิการสังคม</span> 

</div>


<div id="news">
        	
                        <table class="table table-bordered table-striped table-hover">
                      <tbody>
                            
                          <tr>
                              <td>
                              		<div style="display:block; width:150px; text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_1.png"  /><br />
                                            จำแนกตามจังหวัด
                                        </a>
                                    </div>
                              </td>
                              <td>
									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_2.png"  /><br />
                                            จำแนกตามจังหวัด
                                        </a>
                                    </div>
                              </td>
                                <td>
									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_3.png"  /><br />
                                            จำแนกตามจังหวัด
                                        </a>
                                    </div>                              
                              </td>
                               <td>
									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_4.png"  /><br />
                                            จำแนกตามจังหวัด
                                        </a>
                                    </div>                              
                              </td>
                               <td>
 									<div style="display:block; width:150px;text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_5.png"  /><br />
                                            จำแนกตามจังหวัด
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
                              <td><a href="report/export_excel?seProvince=<?=@$_GET['seProvince']?>&type=1" target="_blank"><img src="media/icon_xls.png" /></a></td>
                          </tr>
                            
                      </tbody>
                  </table>
                  <br />  
                  
                    <div class="newstitle">จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัดและลักษณะการดำเนินการองค์กร</div>
                          
                  <table class="table table-bordered table-striped table-hover">
                      <tbody>
                          <tr>
                              <th rowspan="2" style="text-align:center; padding-top:40px;" >จังหวัด</th>
                              <th colspan="7" style="text-align:center;">ประเภทลักษณะการดำเนินการองค์กร</th>
                          </tr>
                          <tr>
                              <th style="text-align:center;">องค์กรการเงินชุมชน</th>
                              <th style="text-align:center;">การผลิตและธุรกิจชุมชน</th>
                              <th style="text-align:center;">ทรัพยากรธรรมชาติและสิ่งแวดล้อม</th>
                              <th style="text-align:center;">อุดมการณ์ / ศาสนา</th>
                              <th style="text-align:center;">ผู้ยากลำบาก</th>
                              <th style="text-align:center;">เครือข่ายองค์กรสวัสดิการชุมชน</th>
                              <th style="text-align:center;">อื่น ๆ</th>
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
                          </tr>
                            
                          <?endforeach;?>
                                    
                      </tbody>
                  </table>


   <div style=" font-weight:bold; color:#F00;"> <strong>แหล่งข้อมูล : </strong> จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัดและลักษณะการดำเนินการองค์กร</div>					
                    
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