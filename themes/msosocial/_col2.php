 <div id="col2"> 
      	<a class="inline" href="#org_reg"><img src="themes/msosocial/images/banner-register_2.png" width="232" height="103" class="banner-regis"></a>
        <a href="board/index" target="_blank"><img src="themes/msosocial/images/banner-list_2.jpg" width="255" height="119" class="banner-list"></a>
        <div class="clearfix">&nbsp;</div>
        <div class="title-social-welfare-organ">องค์การสวัสดิการสังคม</div>
        <div class="list-social-welfare-organ">
            <ul>
                <li><a href="#" class="list-social-welfare-organ1">กองทุนเด็กรายบุคคล</a></li>
                <li><a href="#" class="list-social-welfare-organ1">กองทุนเด็กรายโครงการ</a></li>
                <li><a href="#" class="list-social-welfare-organ2">กองทุนส่งเสริการจัดสวัสดิการสังคม</a></li>
                <li><a href="#" class="list-social-welfare-organ2">กองทุนป้องกันและปราบปราม<br>การค้ามนุษย์</a></li>
            </ul> 
        </div>    
      <a href="#"><img src="themes/msosocial/images/banner01.jpg" width="244" height="69" class="banner-link"></a>
      <a href="#"><img src="themes/msosocial/images/banner02.jpg" width="244" height="69" class="banner-link"/></a>
      <a href="social_worker/register" target="_blank"><img src="themes/msosocial/images/banner03.jpg" width="244" height="69" class="banner-link"/></a>
      <a href="fund/report_result?result_type=1" target="_blank"><img src="themes/msosocial/images/result-fund_webmsosocial.jpg" width="244" height="69" class="banner-link"/></a>
      
      <div class="clearfix">&nbsp;</div>
    
        <?=modules::run('contents/home_report'); ?>
        
    <!---------------------------------------------END REPORT------------------------------------------>
    
 		<?=modules::run('vdos/home_vdo'); ?>
    <!---------------------------------------------END VDO------------------------------------------>
 
        <?php //modules::run('calendar/home_calendar'); ?>
        
        <div id="showData"></div>
        
        <script type="text/javascript">
            $(function(){
                
                
                var jMonth = '<?php echo $seMonth; ?>';
                var jYear = '<?php echo $seYear; ?>';
                
                $("#showData").load("<?php echo base_url()?>home/show_calendar/"+jYear+"/"+jMonth);
        
        
                
            });
        </script>
    <!---------------------------------------------END CALENDAR------------------------------------------>

<!------------------------------------------------------------END Col2----------------------------------------------------------->  
<div class="clearfix">&nbsp;</div>


<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
	<div id='org_reg' style='padding:10px; background:#fff;'>
		<a href="org/benefit_reg" style="color:#000;"><div style="text-align: center; background: #FEBF00; font-size: 24px; padding:10px; margin-bottom: 25px; border-radius: 5px; border:1px solid #D8A201;">องค์กรสาธารณประโยชน์</div></a>
		<a href="org/community_reg" style="color:#000;"><div style="text-align: center; background: #7AB7E4; font-size: 24px; padding:10px; border-radius: 5px; border:1px solid #649DC8;">องค์กรสวัสดิการชุมชน</div></a>
	</div>
</div>
	
<script>
	$(document).ready(function(){
		//Examples of how to assign the Colorbox event to elements
		$(".inline").colorbox({inline:true, width:"35%"});
		// $(".inline2").colorbox({inline:true, width:"30%"});
	});
</script>