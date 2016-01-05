$(document).ready(function(){
	var id = $('textarea.comment').attr('data-id');
	$('.add_comment').on('click', function(){
		if(!$('div.comments').hasClass('finished'))
		{
			var comment = $('textarea.comment').val();
			var comment_container = $('div.comments');
			if (comment.trim()){
				$.ajax({
					url: "http://localhost/~peterbrune/index.php/post_comment", 
	         		data: {
	         			comment: comment,
	         			id: id
	         		},
	         		success: function(data){
	         			$(data).hide().appendTo("div.filler").fadeIn(900);
	         		}
				});
			}
			else
			{}
		}
	});

	$('li.like').on('click', function(){
		$.ajax({
			url: "http://localhost/~peterbrune/index.php/post_like",
			data: {
				id: id
			},
			success: function(data){
				var value = parseInt($('div.likes li.like').attr('data-id'))+1;
				$('div.likes li.like').html(value + '<span> Likes</span>');
			}
		});
	});

	$('li.dislike').on('click', function(){
		$.ajax({
			url: "http://localhost/~peterbrune/index.php/post_dislike",
			data: {
				id: id
			},
			success: function(data){
				var value = parseInt($('div.likes li.dislike').attr('data-id'))+1;
				$('div.likes li.dislike').html(value + '<span> Dislikes</span>');
			}
		});
	});

	$('li.fav').on('click', function(){
		$.ajax({
			url: "http://localhost/~peterbrune/index.php/post_favorite",
			data: {
				id: id
			},
			success: function(data){
				var value = parseInt($('div.likes li.favorite').attr('data-id'))+1;
				$('div.likes li.favorite').html(value + '<span> Favorites</span>');
			}
		});
	});

	$('div.item div.right_rail div.title').each(function(){
		var length = 30;
		var substring = $(this).text();
		if(substring.length > length)
		{
			var truncate = substring.substring(0, length);
			$(this).text(truncate + '...');
		}
	});
});