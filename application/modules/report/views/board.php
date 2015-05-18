<div id="title-blank">รายชื่อคณะกรรมการ</div>
<div id="breadcrumb">

<a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">รายชื่อคณะกรรมการ</span> 

</div>


<div id="news">
        	
    <form id="frmBoard" name="frmBoard" method="post" action="report/board" class="form-horizontal" >
                      <table class="table table-bordered" style="background-color:#ffffcd; border:none;">
                      <tbody>
                            <tr>
                                <td style="text-align:left; width:350px;">
										  <div class="form-group">
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" id="inputKeyword" name="keyword" placeholder="คำสั่ง/รายชื่อคณะกรรมการ" autocomplete="off" style="width:350px;">
                                            </div>
                                          </div>
                                </td>
                                <td colspan="2" style="text-align:left;">
                                
                                          <div class="form-group">
                                            <div class="col-sm-10">
                                                   <select id="seBoard" name="seBoard" style="width:100%;" class="form-control">
                                                        <option value="">-- คณะกรรมการ</option>
                                                         <option value="">แสดงทั้งหมด</option>
                                                                <option value="1">แสดง</option>
                                                                <option value="2">ไม่แสดง</option>
                                                    </select>
                                            </div>
                                          </div>
                                
                                </td>
                            </tr>
                          <tr>
                              <td style="text-align:left;">
                                        
                                        <select id="seProvince" name="seProvince" style="width:250px;" class="form-control">
                                            <option value="">-- เลือกรายงานประจำจังหวัด</option>
                                             <option value="">แสดงทั้งหมด</option>
                                                 <?foreach($all as $row):?>
                                                <option value="<?=$row->province_id?>"><?=$row->province_name?></option>
                                                 <?endforeach;?>
                                        </select>
                                        
                              </td>
                              
                             <td  style="text-align:left;">
                                        
                                          <select id="seStatus" name="seStatus" style="width:150px;" class="form-control">
                                            <option value="">-- เลือกสถานะ</option>
                                             <option value="">แสดงทั้งหมด</option>
                                                    <option value="1">แสดง</option>
                                                    <option value="2">ไม่แสดง</option>
                                        </select>
                                        
                             </td>
                             
                              <td style="text-align:  left;">
                              
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" class="btn btn-default">ค้นหา</button>
                                    </div>
                                  </div>
              
              						<!--  <a href="report/export_excel?seProvince=<?=@$_GET['seProvince']?>" target="_blank"><img src="media/icon_xls.png" /></a>-->                    
                                  
                              </td>
                          
                          </tr>
                            
                      </tbody>
                  </table>
                  
                   </form>
                  
  <br />  
                  
           <?=$rs->pagination();?>	
                           
                   <br><br>
                           
					<table class="table table-bordered">
                      <tbody>
                          <tr>
                              <th style="text-align:center;">ลำดับ</th>
                              <th style="text-align:center;">คณะกรรมการ</th>
                              <th style="text-align:center;">จังหวัด</th>
                              <th style="text-align:center;">คำสั่ง</th>
                              <th style="text-align:center;">ลงวันที่</th>
                              <th style="text-align:center;">รายชื่อคณะกรรมการ</th>
                          </tr>
                            <?php 
							
							$i=0;
							$r=0;
							
							if(@$_GET['page'])
							{
								$i = ($_GET['page'] - 1) * 20;	
							}
							$i++;
							
					  
					   foreach($rs as $row):
					   
					   		$r++;
							if($r==1){$ClasRow = 'active';}
							else if($r==2){$ClasRow = 'danger';}
					   		
							if($r==2){$r=0;}
					   ?> 
                             
                          <tr class=<?php echo $ClasRow; ?>>
                              <td><?php echo $i; $i++; ?></td>
                              <td style="text-align: right;" >คณะกรรมการส่งเสริมการจัดสวัสดิการแห่งชาติ</td>
                              <td style="text-align:right;"><?=$row->province_name?></td>
                                <td style="text-align:right;">606/2555</td>
                               <td style="text-align:right;"><?=mysql_to_th(date('Y-m-d'))?></td>
                              <td style="text-align:  center;"><a href="#" target="_blank"><img src="themes/msosocial/images/icon-user.png"></a></td>
                          </tr>
                            
                          <?php endforeach;?>
                                    
                      </tbody>
                  </table>
					
                    
 			<?=$rs->pagination();?>
            		
                    <br>
<!--   <div style=" font-weight:bold; color:#F00;"> <strong>แหล่งข้อมูล : </strong> จำนวนองค์กรสวัสดิการสังคม จำแนกรายจังหวัดและลักษณะการดำเนินการองค์กร</div>	-->				
                    
</div>
           
    <div class="clearfix">&nbsp;</div>
    
    <script>
	        $(document).ready(function () {


/*	            $('#seProvince').change(function () {

                		var province_id = $('#seProvince').val();
						location.href = 'report?seProvince=' + province_id;
                
				});*/
				
				
			});
	</script>