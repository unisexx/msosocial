<div id="welfare">
	<div class="welfare-title"><?=$rs->module?></div>
        <div id="accordion">
         
            <h2 class="current"><?=$rs->module?></h2>
            
            <div class="pane" style="display:block">
            	<ul>
					<?foreach($rs as $row):?>                   
                    	<li><a href="contents/view?module=<?=$row->module?>&category=<?=$row->category?>"><?=$row->title?></a></li>
					<?endforeach;?>
                </ul>
             <!--   <span><a href="welfare/lists/?module=<?=$row->module?>" class="viewall-welfare">ดูทั้งหมด</a></span>-->
            </div>	 
       </div>
</div>