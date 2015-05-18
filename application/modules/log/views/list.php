

  <div id="news">
        	
            <div class="newstitle">จำนวนผู้เข้าเยี่ยมชมเว็บไซต์</div>
            
                    <table class="table table-bordered table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>วันที่</th>
                                <th>IPAddress</th>
                                <th>หน้าที่เยี่ยมชม</th>
                               <!-- <th>ประเภทผู้ใช้</th>-->
                            </tr>
                            <?foreach($rs as $row):?>  
                            <tr>
                                <td><!--<?=mysql_to_th($row->logdate)?>--><?=$row->logdate?></td>
                                <td><?=$row->ip?></td>
                                <td>
								<div style="width:400px; word-wrap: break-word;">
                                		<a href="<?=$row->refer?>" target="_blank">
										<?=$row->refer?>
                                        </a>
                                </div>
                                </td>
                               <!-- <td><?=$row->username?></td>-->
                            </tr>
                            <?endforeach;?>
                                    
                        </tbody>
                    </table>
 					
					<?=$rs->pagination();?>	
                    
           </div>
           
        
        
        
        <div class="clearfix">&nbsp;</div>
        
                     
                           
                     
        
       