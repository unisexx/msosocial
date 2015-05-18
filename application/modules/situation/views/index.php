  
      	<div id="title-blank"><?=$rs->module?></div>
        <div id="breadcrumb"><a href="home/index">หน้าแรก</a> 
        > <span class="b1"><?=$rs->module?></span> 
        > <span class="b1"><a href="situation?module=<?=$rs->module?>&category=<?=$rs->category?>"><?=$rs->category?></a></span></div>
        
  <div id="download">
        	<div class="download-title"><?=$rs->category?></div>
            <div id="tab">
                <div id="tabkm1">
                
                    
                    <div class="clearfix" style="line-height:0;">&nbsp;</div>
                	
                    <div id="konten">
                    
                        <div style="display: none;" id="tab1" class="tab_konten">
                            <table width="100%" class="tb1">
                                  <tr>
                                    <th width="400" style="padding-left:50px;">เรื่อง</th>
                                    <th width="148" style="text-align:center;">อ่าน</th>
                                  </tr>
                                  
                                  	<?foreach($rs as $row):?>  
                                  <tr>
                                    <td valign="top"><a href="situation/view/<?=$row->id?>" target="_blank"><?=$row->title?> ( <?=mysql_to_th($row->created)?> ) </a></td>
                                    <td align="center"><?=$row->counter?></td>
                                  </tr>
                                  <?endforeach;?>
                                  
                            </table>
 
               			</div>
                        
                        
                  </div>
                  
                  
                  <?php echo $rs->pagination(); ?>	
                  
                </div>
          </div>
        
  
        </div>
        
        