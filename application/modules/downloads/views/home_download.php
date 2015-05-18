  <div id="download">
        	<div class="download-title">ดาวน์โหลด</div>
            <div id="tab">
                <div id="tabkm1">
                
                    <ul id="navtab">
                     <?php
					   
					 		  $count_row = 0;
					 		  
							  foreach($cat as $row_cat): 
							 
							  $count_row++; 
					?> 
                        <li><a href="#tab<?=$count_row?>" class="active"><?=$row_cat->name?></a></li>
<!--                        <li><a href="#tab2">แบบฟอร์ม</a></li>-->
                    <?php endforeach; ?>
                    </ul>
                    
                    <div class="clearfix" style="line-height:0;">&nbsp;</div>
                	
                    <div id="konten">
                    
                        <?php
					   
					 		  $count_row = 0;
					 		  
							  foreach($cat as $row_cat): 
							 
							  $count_row++; 
						?> 
                    
                        <div style="display: none;" id="tab<?=$count_row?>" class="tab_konten">
                            <table width="100%" class="tb1">
                                  <tr>
                                    <th width="400" style="padding-left:50px;">เรื่อง</th>
                                    <th width="148" style="text-align:center;">จำนวนดาวน์โหลด</th>
                                  </tr>
                                  
                                  <?php foreach($rs->where('module = "'.$row_cat->name.'" and status="approve"')->order_by('id desc')->get(16) as $row0):?>   
                                  <tr>
                                    <td valign="top"><a href="downloads/view/<?=$row0->id?>" target="_blank"><?=$row0->title?></a></td>
                                    <td align="center"><?=$row0->counter?></td>
                                  </tr>
                                  <?php endforeach;?>
                                  
                            </table>
                            <div class="viewall-tb1"><a href="downloads/lists?module=<?=$row_cat->name?>">ดูทั้งหมด</a></div>
               			</div>
                       
					   <?php endforeach; ?>
                       
<!--                        <div style="display: none;" id="tab2" class="tab_konten">
                       		<table width="100%" class="tb1">
                              <tr>
                                <th width="400" style="padding-left:50px;">เรื่อง</th>
                                <th width="148" style="text-align:center;">จำนวนดาวน์โหลด</th>
	      					  </tr>
							<?foreach($rs->where('module = "แบบฟอร์ม" and status="approve"')->order_by('id desc')->get() as $row1):?>  
                              <tr>
                                <td valign="top"><a href="downloads/view/<?=$row1->id?>" target="_blank"><?=$row1->title?></a></td>
                                <td align="center"><?=$row1->counter?></td>
                              </tr>
						 <?endforeach;?>
						</table>
                        	<div class="viewall-tb1"><a href="downloads/lists?module=แบบฟอร์ม">ดูทั้งหมด</a></div>
                        </div>-->
                        
                  </div>
                </div>
          </div>
        </div>