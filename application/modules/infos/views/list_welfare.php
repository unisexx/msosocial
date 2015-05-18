		<div id="welfare">
        	<div class="welfare-title">สวัสดิการสังคมไทย</div>
                <div id="accordion">
                 
                    <h2>ฝึกอบรม / สัมนา</h2>
                    <div class="pane">
                    	<ul>
     						<?foreach($rs as $row):?>                   
                            	<li><a href="#"><?=$row->title?></a></li>
							<?endforeach;?>
                        </ul>
                        <span><a href="#" class="viewall-welfare">ดูทั้งหมด</a></span>
                    </div>	 
                    
	             
               </div>
            
            <!-- activate tabs with JavaScript -->
            <script>
            $(function() { 
            
            $("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
            });
            </script>
        	<!--End of each accordion item--> 
	</div>