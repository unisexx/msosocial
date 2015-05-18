		<?php
			
			$check_module = "";
			$first_block = 0;
			
		?>
        <div id="welfare">
        	<div class="welfare-title">สวัสดิการสังคมไทย</div>
                <div id="accordion">
                
                 <?php 
				 
				 foreach($rs as $row): 
						
						if($row->module!=$check_module)
						{
							$check_module = $row->module;
						
				 ?>  
                  
                    <h2  <?php  if($first_block == 0){ echo 'class="current"';}else{ echo ' ';}  ?> ><?=$row->module?></h2>
                    
                    <div class="pane" <?php  if($first_block == 0){ echo 'style="display:block"';}else{ echo ' ';}  ?>>
                    
                    	<ul>

                 			<?php foreach($rs->where('module = "'.$row->module.'" and status="approve"')->order_by('id desc')->get(4) as $row0):?>   
                                          
                            	<li>
                                <a href="welfare/view/<?=$row0->id?>"><?=$row0->title?></a>
                                </li>
                                
							<?php endforeach;?>
                            
                        </ul>
                        
                        <span>
                        
                            <a href="welfare/lists/?module=<?=$row0->module?>" class="viewall-welfare">
                                    ดูทั้งหมด
                            </a>
                            
                        </span>
                        
                    </div>	
                     
                     
                     
                  <?php 
				  
				  			$first_block = 1;
						}
						
				  endforeach; 
				  
				  ?>  
	             
               </div>
            
            <!-- activate tabs with JavaScript -->
            <script>
            $(function() { 
            
            $("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
            });
            </script>
        	<!--End of each accordion item--> 
	</div>