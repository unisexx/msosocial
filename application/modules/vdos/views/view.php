
    	<div id="title-blank">สื่อมัลติมีเดีย/วีดีโอ</div>
        <div id="breadcrumb">
		
		<a href="<?php echo base_url(); ?>home">หน้าแรก</a> 
		> 
		<span class="b1"><a href="vdos/index">สื่อมัลติมีเดีย/วีดีโอ</a></span> 
		> 
		<span class="b1"><a href="#"><?=$rs->title?></a></span>
        
		</div>
		
	    <div id="page">
	
        	<p>
			
                     		<input type="hidden" name="url" value="<?php echo $rs->url?>"/>
							<div class="show_vid" style="margin-top:10px;"></div>
            
                    <br />
					<?=$rs->title?>
				    <br />
				    วันที่: <?=mysql_to_th($rs->created)?>
                
			</p>
			
        </div>
        
        
 <script type="text/javascript">
$(function() {

	
	// YOUTUBE show vid from url
	var text = $('input[name=url]').val();
	if(text != null){
	    $.get('vdos/ajax_show_vid',{
	    	'url' : text
	    },function(data){
	    	$('.show_vid').html(data);
	    });
	}
	    
	$('input[name=url]').on('paste', function () {
	  var element = this;
	  setTimeout(function () {
	    var text = $(element).val();
	    console.log(text);
	    // do something with text
	    $.get('vdos/ajax_show_vid',{
	    	'url' : text
	    },function(data){
	    	$('.show_vid').html(data);
	    });
	  }, 100);
	});
});
</script>