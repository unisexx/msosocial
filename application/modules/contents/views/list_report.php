
                    <div id="title-blank">รายงาน <?=$rs->module?></div>
                    <div id="breadcrumb">
                    
                    <a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1">รายงาน <?=$rs->module?></span> 
                    
                    </div>
                            
    			<br /><br />
                
                      <table class="table table-bordered">
                      <tbody>
                          <tr>
                              <th style="text-align: left;">หัวข้อ</th>
                              <th style="text-align:center;">จำนวนคนอ่าน</th>
                          </tr>
                            
                          <?php 
						  
						  	$r=0;
						    foreach($rs as $row):
						  
						  	$r++;
							if($r==1){$ClasRow = 'active';}
							else if($r==2){$ClasRow = 'danger';}
					   		
							if($r==2){$r=0;}
							
							
						  ?> 
                             
                          <tr class=<?php echo $ClasRow; ?>>
                              <td><a href="contents/report_view/<?=$row->id?>"><?=$row->title?></a></td>
                              <td style="text-align: right;" >อ่าน <?=$row->counter?> ครั้ง</td>
                          </tr>
                            
                          <?php endforeach;?>
                                    
                      </tbody>
                  </table>
                  
                  <?=$rs->pagination();?>	