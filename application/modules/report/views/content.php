<div id="title-blank">รายงาน องค์กรสาธารณประโยขน์</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">รายงาน องค์กรสาธารณประโยขน์</span> 

</div>

<div id="news">
        	
                        <table class="table table-bordered table-striped table-hover">
                      <tbody>
                            
                          <tr>
                              <td>
                              		<div style="display:block; width:150px; text-align:center; margin:auto;">
                                        <a href="#" target="_blank">
                                            <img src="themes/msosocial/images/icon-report/report1_1.png"  /><br />
                                            จำนวนองค์กร
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
                              <form id="frmProvince" name="frmProvince" method="post" action="report/content" >
                              			<select id="seProvince" name="seProvince" style="width:250px;" class="form-control">
                                        <option value="">-- เลือกรายงานประจำจังหวัด</option>
                                         <option value="">แสดงทั้งหมด</option>
                                        	 <?foreach($all as $row):?>
                                            <option value="<?=$row->province_id?>"><?=$row->province_name?></option>
                                             <?endforeach;?>
                                        </select>
                              </form>
                              </td>
                              <td>หน่วย : องค์กร <a href="report/export_excel?seProvince=<?=@$_GET['seProvince']?>&type=2" target="_blank"><img src="media/icon_xls.png" /></a></td>
                          </tr>
                            
                      </tbody>
                  </table>
                  <br />  
                  
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
    
    <script>
	        $(document).ready(function () {


	            $('#seProvince').change(function () {

                		var province_id = $('#seProvince').val();
						location.href = 'report?seProvince=' + province_id;
                
				});
				
				
			});
	</script>