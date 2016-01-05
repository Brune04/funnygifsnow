<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/posts.css">
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/posts.js"></script>
<div class="item scroll">
	<div class="container">
		<div class="left_rail">
				<div class="info">
					<?php echo $page_description; ?>
					<?php if(!$logged_in): ?>
						<p><a href="#" id="login_second">Login</a> or <a id="register_second" href="#modal">Register</a> today to get started!</p>
					<?php endif; ?>
				</div>
			<?php foreach($data as $value): ?>
				<div class="post">
					<div class="title"><?php echo $value->title ?></div>
					<a class="image" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/view/<?php echo $value->id; ?>">
						<?php if(!empty($value->image)): ?>
							<img class="still" src="<?php echo $value->image ?>" />
							<p class="holder hide"><?php echo $value->url ?></p>
						<?php else: ?>
							<img class="move" src="<?php echo $value->url ?>" />
						<?php endif; ?>
					</a>
					<div class="post_info">
						<?php if(!empty($value->author_id)): ?>
							<div class="author"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $value->author; ?>"><?php echo $value->author ?></a></div>
						<?php else: ?>
							<div class="author"><?php echo $value->author ?></div>
						<?php endif; ?>
						<div class="created_at"><?php echo $value->created_at ?></div>
						<?php if($value->type == 'gif' && !empty($value->image)): ?>
							<div class="play_button"><div class="tri"></div></div>
							<img class="loader_img hide" src="http://bradsknutson.com/wp-content/uploads/2013/04/page-loader.gif" /> 
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
			<p class="clear jscroll-next"><?php echo $links ?></p>
		</div>
	</div>
</div>
<div class="right_rail">
	<div class="related_posts">
		<?php if($title == 'Popular'): ?>
			<h2>Featured</h2>
		<?php else: ?>
			<h2>Most Popular</h2>
		<?php endif; ?>
		<?php foreach($popular as $post): ?>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/view/<?php echo $post->id; ?>">
				<li class="post">
					<div class="left">
						<?php if(!empty($post->image)): ?>
							<img src="<?php echo $post->image ?>" />
						<?php else: ?>
							<img src="<?php echo $post->url ?>" />
						<?php endif; ?>
					</div>
					<div class="right">
						<div class="title"><?php echo $post->title ?></div>
						<div><?php echo $post->author ?></div>
						<div><?php echo $post->created_at ?></div>
					</div>
				</li>
			</a>
		<?php endforeach; ?>
	</div>
	<div class="social_follow">
		<div class="follow">Follow Us: </div>
		<a target="_blank" href="https://www.facebook.com/funnygifsnow"><img class="follow" src="<?php echo $image; ?>social_facebook_box_blue.png" /></a>
		<a href=""><img class="follow" src="<?php echo $image; ?>Twitter_bird_button.png" /></a>
		<a href=""><img class="follow" src="<?php echo $image; ?>Google-plus-button.png" /></a>
	</div>
	<div class="footer">
		<div>Follow Us On:</div>
		<div class="follow">
			<a target="_blank" href="https://www.facebook.com/funnygifsnow"><img class="follow" src="<?php echo $image; ?>social_facebook_box_blue.png" /></a>
			<a target="_blank" href="https://twitter.com/funnygifsnow"><img class="follow" src="<?php echo $image; ?>Twitter_bird_button.png" /></a>
		</div>
		<ul>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/about"><li>About Us | </li></a>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/privacy"><li>Privacy | </li></a>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/terms"><li>Terms | </li></a>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/meme"><li>Memes | </li></a>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/gif"><li>Gifs | </li></a>
			<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/upload"><li>Upload</li></a>
		</ul>
		<div>Copyright &copy 2014 Funny Gifs Now</div>
	</div>
</div>