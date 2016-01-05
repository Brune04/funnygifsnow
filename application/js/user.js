$(document).ready(function(){
	$('li.user_uploads').on('click', function(){
		$('li.user_favs').removeClass('selected');
		$(this).addClass('selected');
		$('div.uploads').show();
		$('div.favs').hide();
	});

	$('li.user_favs').on('click', function(){
		$('li.user_uploads').removeClass('selected');
		$(this).addClass('selected');
		$('div.uploads').hide();
		$('div.favs').show();
	});
});