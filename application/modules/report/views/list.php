<div id="title-blank"><?=$_GET['module']?></div>
<div id="breadcrumb"><a href="#">หน้าแรก</a> > <span class="b1"><?=$_GET['module']?></span></div>
<div id="page">
	<?foreach($rs as $row):?>
		<div class="media col-lg-6">
		  <div class="media-left media-middle">
		    <a href="infos/view/<?=$row->id?>">
		      <img class="media-object" src="uploads/info/<?=$row->image?>" width="139" height="96">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><?=$row->title?></h4>
		  </div>
		</div>
	<?endforeach;?>
<br clear="all">
</div>