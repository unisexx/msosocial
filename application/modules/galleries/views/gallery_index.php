<div class="galleries">
	<div class="header-bar">
		<h1>ภาพกิจกรรม</h1>
	</div>
	<div id="boxphoto" class="corner" style="padding-bottom:10px;">
		<ul class="gallery">
			
			<?php
				$i = 0; 
				foreach ($categories as $category):
					if($i%3 == 0):
			?>
				<br clear="all">
				<?php endif;?>
			<li>
				<a href="galleries/view/<?php echo $category->id?>"><span class="clip_image"></span>
					<img src="<?=$category->gallery->order_by("id","random")->get()->image?>" width="170" height="120" alt='image' title='<?=@$category->name?>'></a>
                <div class="txtgallery"><?php echo $category->name?></span></div>
                <div class="qtyphoto">
                	<?php if($category->gallery->result_count() == "1"):?>
					(1 image)
					<?php else:?>
					(<?php echo $category->gallery->result_count()?> images)
					<?php endif;?>
				</div>
			</li>
			<?php 
				$i++;
				endforeach;
			?>
		</ul>
		<div class="clear"></div>
	</div>
	
	<div class="header-bar">
		<h1>วิดิทัศน์</h1>
	</div>
	<div id="boxphoto" class="corner" style="padding-bottom:10px;">
		<ul class="gallery">
			<?php foreach ($vdo_categories as $vdo_category):?>
			<li>
				<a href="galleries/vdo/<?php echo $vdo_category->id?>"><span class="clip_image"></span>
					<img src="<?=$vdo_category->vdo->order_by("id","random")->get()->cover_pic?>" width="170" height="120" alt='image' title='<?=$vdo_category->name?>'></a>
                <div class="txtgallery"><?php echo $vdo_category->name?></span></div>
                <div class="qtyphoto">
                	<?php if($vdo_category->vdo->result_count() == "1"):?>
					(1 video)
					<?php else:?>
					(<?php echo $vdo_category->vdo->result_count()?> videos)
					<?php endif;?>
				</div>
			</li>
			<?php echo alternator('','','<div class="clear"></div>') ?></php>
			<?php endforeach;?>
		</ul>
		<div class="clear"></div>
	</div>
</div>