<script src="media/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#body_shelf img").click(function(){
		$.get('books/counter',{
			id : $(this).next('input[name=book_id]').val()
		});
	});
});
</script>
<style>
	body{margin: 0;padding: 0}
	#header_shelf{background: url("themes/situation/images/Bookshelf_01.jpg") no-repeat; width:1000px; height:65px; position:relative;}
	#body_shelf{background: url("themes/situation/images/Bookshelf_02.jpg") repeat-y; width:1000px;}
	#category{position:absolute; left:430px; top:15px;}
	.book{float: left; margin:17 0 10px 44px; position:relative;}
	h1{text-align:center; padding-top:10px;}
	.label_counter{position: absolute;bottom: 0px;background: rgba(0, 0, 0, 0.5);color: goldenrod;width: 117px;text-align: center;font-size:12px;}
	select{font-size: 18px;}
</style>
<div>
	<div id="header_shelf">
		<h1></h1>
		<span id="category">
			<select onchange="window.location='books?category='+this.value">
			<option value="">ทุกหมวด</option>
			<?foreach($categories as $row):?>
			<option value="<?=$row->id?>" <?=@$_GET['category'] == $row->id ? 'selected' : '' ;?>><?=$row->name?></option>
			<?endforeach;?>
			</select>
		</span>
	</div>
	<div id="body_shelf">
		<?foreach($books as $row):?>
      		<span class="book">
      			<a href="<?=$row->url?>" target="_blank">
      				<span class="label_counter">อ่านแล้ว <?=$row->counter?> ครั้ง</span>
      				<img src="uploads/book/<?=$row->image?>" border="1" style="border-color:#CC6600" title="<?=$row->title?>" width="115" height="162"/>
      				<input type="hidden" name="book_id" value="<?=$row->id?>">
      			</a>
      		</span>
      	<?endforeach;?>
      	<br clear="all">
	</div>
	<div id="footer_shelf"></div>
</div>