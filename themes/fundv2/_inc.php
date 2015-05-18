<link href="themes/fundv2/css/template.css" type="text/css" rel="stylesheet"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="themes/fundv2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="themes/fundv2/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="themes/fundv2/css/topmenu.css">
<!-- <link rel="stylesheet" href="themes/fundv2/css/calendar.css"> -->
   <script src="themes/fundv2/js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="themes/fundv2/js/script.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#tab1').fadeIn('slow'); //tab pertama ditampilkan
	$('ul#navtab li a').click(function() { // jika link tab di klik
		$('ul#navtab li a').removeClass('active'); //menghilangkan class active (yang tampil)
		$(this).addClass("active"); // menambahkan class active pada link yang diklik
		$('.tab_konten').hide(); // menutup semua konten tab
		var aktif = $(this).attr('href'); // mencari mana tab yang harus ditampilkan
		$(aktif).fadeIn('slow'); // tab yang dipilih, ditampilkan
		return false;
	});

});

</script>
<script type="text/javascript">
	$(document).ready(function(){
	
		//	Load	Statistics
		$("div#statistic").html("<img src='media/images/ajax-loader.gif' />").load(" ");
	
		// hide #back-top first
		$("#back-top").hide();
		
		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 1500) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
	
			// scroll body to 0px on click
			$('#back-top').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});
	
	});
</script>