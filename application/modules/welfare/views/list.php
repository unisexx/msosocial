<!--		<div id="welfare">
        	<div class="welfare-title">สวัสดิการสังคมไทย</div>
                <div id="accordion">
                 
                    <h2 class="current"><?=$rs->module?></h2>
                    <div class="pane" style="display:block">
                    	<ul>
     						<?foreach($rs as $row):?>                   
                            	<li><a href="welfare/view/<?=$row->id?>"><?=$row->title?></a></li>
							<?endforeach;?>
                        </ul>
                        <span><a href="welfare/lists/?module=<?=$row->module?>" class="viewall-welfare">ดูทั้งหมด</a></span>
                    </div>	 
                    
	             
               </div>
            
      
            <script>
            $(function() { 
            
            $("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
            });
            </script>
        	
	</div>
    -->
    
    
                    <div id="title-blank"> <?=$rs->module?></div>
                    <div id="breadcrumb">
                    
                    <a href="<?php echo base_url(); ?>home">หน้าแรก</a>  > <span class="b1"> <?=$rs->module?></span> 
                    
                    </div>
                            
    			<br /><br />
                
                      <table class="table table-striped">
                      <tbody>
                          <tr>
                              <th style="text-align: left;">หัวข้อ</th>
                              <th style="text-align:center;">จำนวนคนอ่าน</th>
                          </tr>
                            
                          <?php  foreach($rs as $row):?> 
                             
                          <tr >
                              <td><a href="welfare/view/<?=$row->id?>"><?=$row->title?></a></td>
                              <td style="text-align:  center;" >อ่าน <?=$row->counter?> ครั้ง</td>
                          </tr>
                      <!--    <tr><td colspan="2"><div style="border-bottom:dotted; border-bottom-width:thin; width:100%;"></div></td></tr>-->
                            
                          <?php endforeach;?>
                                    
                      </tbody>
                  </table>
                  
                  <?=$rs->pagination();?>	