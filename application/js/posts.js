function init(){
	$('div.item div.title').each(function(){
		var length = 25;
		var substring = $(this).text();
		if(substring.length > length)
		{
			var truncate = substring.substring(0, length);
			$(this).text(truncate + '...');
		}
	});

	$('div.right_rail div.title').each(function(){
		var length = 25;
		var substring = $(this).text();
		if(substring.length > length)
		{
			var truncate = substring.substring(0, length);
			$(this).text(truncate + '...');
		}
	});

	$('div.play_button').on('click', function(){
		var play = $(this);
		play.addClass('hide');
		var url = play.parent().siblings('.image').find('.holder').html();
		var image = play.parent().siblings('.image').find('.still').attr('src');
		// show loading image
		play.siblings('.loader_img').removeClass('hide');
		play.parent().siblings('.image').find('.still').attr('src', url);
		play.parent().siblings('.image').find('.holder').html(image);

		// main image loaded ?
		$('img.still').on('load', function(){
			play.siblings('.loader_img').addClass('hide');
			play.parents('.post').mouseleave(function(){
				play.parent().siblings('.image').find('.holder').html(url);
				play.parent().siblings('.image').find('.still').attr('src', image);
				play.removeClass('hide');
			});
		});
	});
}

$(document).ready(function(){
	init();
	$('.item.scroll').infinitescroll({
		navSelector  : "p.jscroll-next",
		nextSelector : "p.jscroll-next a:last",
		itemSelector : ".scroll .container",
		donetext     : "You've reached the end of the Internet!"
	},function(){
		init();
	});
});