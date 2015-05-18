  <div id="download">
        	<div class="download-title">ดาวน์โหลด</div>
            <div id="tab">
                <div id="tabkm1">
                
                    <ul id="navtab">
                    
                        <li><a href="#tab1" class="active"><?php echo $rs->module; ?></a></li>
                    
                    </ul>
                    
                    <div class="clearfix" style="line-height:0;">&nbsp;</div>
                	
                    <div id="konten">
                    
                        <div style="display: none;" id="tab1" class="tab_konten">
                            <table width="100%" class="tb1">
                                  <tr>
                                    <th width="400" style="padding-left:50px;">เรื่อง</th>
                                    <th width="148" style="text-align:center;">จำนวนดาวน์โหลด</th>
                                  </tr>
                                  
                                  	<?foreach($rs as $row):?>  
                                  <tr>
                                    <td valign="top"><a href="downloads/view/<?=$row->id?>" target="_blank"><?=$row->title?></a></td>
                                    <td align="center"><?=$row->counter?></td>
                                  </tr>
                                  <?endforeach;?>
                                  
                            </table>
                         <!--   <div class="viewall-tb1"><a href="downloads/lists?category_id=<?php echo $row->module; ?>">ดูทั้งหมด</a></div>-->
               			
                            <?=$rs->pagination();?>	
                            
                        </div>
                        
                            
                                 
                  </div>
                </div>
                
                 
                
          </div>
          
           
          
        </div>
        
