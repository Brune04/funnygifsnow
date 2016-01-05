<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/view_posts.js"></script>
<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/view_post.css">
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

(function() {
  var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
  po.src = 'https://apis.google.com/js/platform.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<div class="item scroll">
	<div class="container">
		<div class="left_rail">
			<?php if(!empty($data)): ?>
				<div class="post">
					<div class="likes">
						<li class="like" data-id="<?php echo $like ?>"><?php echo $like ?><span> Likes</span></li>
						<li class="dislike" data-id="<?php echo $dislike ?>"><?php echo $dislike ?><span> Dislikes</span></li>
						<li class="favorite" data-id="<?php echo $favorite ?>"><?php echo $favorite ?><span> Favorites</span></li>
						<li class="view"><?php echo $data->views; ?><span> Views</span></li>
					</div>
					<div class="title"><?php echo $data->title; ?></div>
					<div class="post_info">
						<?php if(!empty($data->author_id)): ?>
							<div class="author">Posted By: <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $data->author; ?>"><?php echo $data->author; ?></a></div>
						<?php else: ?>
							<div class="author">Posted By: <?php echo $data->author; ?></div>
						<?php endif; ?>
						<div class="created_at"><?php echo $data->created_at; ?></div>
					</div>
					<a class="image">
						<img class="url" src="<?php echo $data->url; ?>" />
					</a>
					<ul class="like_fav">
						<li class="like">Like</li>
						<li class="dislike">Dislike</li>
						<li class="fav">Favorite</li>
					</ul>
					<div class="social">
						<div class="share">
							<div class="fb-share-button" data-href="" data-type="button_count"></div>
							<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a>
							<div class="g-plus" data-action="share" data-annotation="bubble"></div>
							<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="comments">
			<?php if($logged_in): ?>
				<textarea type="text" data-id="<?php echo $id ?>" class="comment" placeholder="Write A Comment"></textarea>
				<input type="submit" class="add_comment" value="Comment" />
			<?php else: ?>
				<span>Please <a href="#" id="login_second">Login</a> To Comment</span>
			<?php endif; ?>
			<div class="user_comments">
				<div class="filler"></div>
				<?php if(!empty($comments)): ?>
					<?php foreach($comments as $key => $value): ?>
						<div class="comment_container">
							<img class="user_image" data-id="<?php echo $value->id; ?>" src="<?php echo $value->user_image; ?>" />
							<?php if(!empty($value->user_id)): ?>
								<div class="comment"><div class="name"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $value->username; ?>"><?php echo $value->username; ?></a></div> <?php echo $value->comment; ?></div>
							<?php else: ?>
								<div class="comment"><div class="name"><?php echo $value->username; ?></div> <?php echo $value->comment; ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="right_rail">
			<div class="related_posts">
				<h2>Most Popular</h2>
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
	</div>
</div>