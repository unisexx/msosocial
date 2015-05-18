<link rel="stylesheet" type="text/css" href="media/js/featured-content-slider/style.css" />
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
		//$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000000, true);
		
		$("#fragment-1").css('display','block');
		$("#nav-fragment-1").addClass("ui-tabs-selected");
		
		$(".ui-tabs-nav li").hover(function(){
			//$(this).css('background','red');
			$(this).addClass('ui-tabs-selected');
			$(this).siblings().removeClass('ui-tabs-selected');
			var id = $(this).attr('id');
				id = id.substring(4);
				
			$(this).closest("#featured").find("#"+id).removeClass("ui-tabs-hide").siblings(".ui-tabs-panel").addClass("ui-tabs-hide");
			if(id != "fragment-1"){
				$("#fragment-1").css('display','none');
			}else{
				$("#fragment-1").css('display','block');
			}
		});
	});
</script>

<div id="featured" >
	  <ul class="ui-tabs-nav">
	     <?php foreach($galleries as $key=>$gallery):?>
	    	<li class="ui-tabs-nav-item" id="nav-fragment-<?=$key+1?>"><a href="<?php echo $gallery->image?>" rel="lightbox[x<?=$gallery->category_id?>]" title="<?=$gallery->title?>">
	    		<img src="<?=$gallery->image?>" width="80" height="50"><span><?php echo $gallery->title?>
	    	</span></a></li>
	    <?php endforeach;?>
	  </ul>


	<?php foreach($galleries as $key=>$gallery):?>
	<div id="fragment-<?=$key+1?>" class="ui-tabs-panel ui-tabs-hide" style="">
		<a href="<?php echo $gallery->image?>" rel="lightbox[x<?=$gallery->category_id?>]" title="<?=$gallery->title?>">
			<img src="<?=$gallery->image?>" width="400" height="250">
		</a>
		 <div class="info" >
			<h2><a href="galleries/view/<?=$gallery->category_id?>" ><?php echo $gallery->title?></a></h2>
         </div>
    </div>
	<?php endforeach;?>
	</div>
</div>
<br>
<br clear="all">

<div style="display: none;">
<?php foreach($galleries as $key=>$gallery):?>
	<?php 
		$pics = new Gallery();
		$pics->where('category_id = '.$gallery->category_id)->get();
		foreach($pics as $pic):
	?>
		<a rel="lightbox[x<?=$pic->category_id?>]" href="<?php echo $pic->image?>" title="<?=$pic->title?>"></a>
	<?php endforeach;?>
<?php endforeach;?>
</div>