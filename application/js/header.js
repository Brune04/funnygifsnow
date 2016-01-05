$(document).ready(function(){
	$("#login_form").on('click', function(){
		$(".header_title").text('Login');
		$(".user_register").hide();
		$(".social_login").hide();
		$(".user_login").show();
		$("#login_form").leanModal({top : 50, overlay : 0.6, closeButton: ".modal_close" });
	});

	$("#register_form").on('click', function(){
		$(".header_title").text('Register');
		$(".social_login").hide();
		$(".user_login").hide();
		$(".user_register").show();
		$("#register_form").leanModal({top : 50, overlay : 0.6, closeButton: ".modal_close" });
	});

	$("#register_second").on('click', function(){
		$(".header_title").text('Register');
		$(".social_login").hide();
		$(".user_login").hide();
		$(".user_register").show();
		$("#register_form").leanModal({top : 50, overlay : 0.6, closeButton: ".modal_close" });
	});

	$("#login_second").on('click', function(){
		$(".header_title").text('Login');
		$(".user_register").hide();
		$(".social_login").hide();
		$(".user_login").show();
		$("#login_form").leanModal({top : 50, overlay : 0.6, closeButton: ".modal_close" });
	});

	$('.login_user').on('click', function(){
		var data = $('#login_user_form input').serializeArray();
		$.ajax({
			url: '/~peterbrune/index.php/login/login_user',
			data: data,
			success: function(response){
				if(response.status == 'success'){
					location.reload();
				}
				else{
					$('p.error').remove();
					var i;
					for (i = 0; i < response.errors.length; i++) {
					    $('#login_user_form').prepend('<p class="error">'+response.errors[i]+'</p>')
					}
				}
			}
		});
	});

	$('.register_user').on('click', function(){
		var data = $('#register_user_form input').serializeArray();
		$.ajax({
			url: '/~peterbrune/index.php/register/register_user',
			data: data,
			success: function(response){
				if(response.status == 'success'){
					location.reload();
				}
				else{
					$('p.error').remove();
					var i;
					for (i = 0; i < response.errors.length; i++) {
					    $('#register_user_form').prepend('<p class="error">'+response.errors[i]+'</p>')
					}
				}
			}
		});
	});

	$(function(){

		// Going back to Social Forms
		$(".login_popup").click(function(){
			$(".user_login").show();
			$(".user_register").hide();
			$(".social_login").hide();
			$(".header_title").text('Login');
			return false;
		});

		$(".register_popup").click(function(){
			$(".user_login").hide();
			$(".user_register").show();
			$(".social_login").hide();
			$(".header_title").text('Register');
			return false;
		});
	});
});