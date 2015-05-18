function changeContent(url) {
	$('.container').css("width", "100%");
	$('.container').css("height", $(window).height()-65);
	$('.container').css("overflow", "auto");
	var iframe = "<iframe src=\""+url+"\" width=\"100%\" height=\"99%\" frameborder=\"0\" scrolling=\"auto\"></iframe>";
	$('.container').html(iframe);
}