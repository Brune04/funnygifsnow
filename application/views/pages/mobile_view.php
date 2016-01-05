<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/view_posts.js"></script>
<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/view_post_mobile.css">
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
</head>
<body>

<div data-role="page">
  <div data-role="header">
    <h1>Funny Gifs Now</h1>
  </div>

	<?php if(!empty($data)): ?>
  	<div data-role="main" class="ui-content post">
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
			<div class="share">
					<div class="fb-share-button" data-href="" data-type="button_count"></div>
					<div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a>
					<div class="g-plus" data-action="share" data-annotation="bubble"></div>
					<a href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /> </a>
				</div>
			<ul class="like_fav">
				<li class="like">Like</li>
				<li class="dislike">Dislike</li>
				<li class="fav">Favorite</li>
			</ul>
  		</div>
  	<?php endif; ?>

  <div data-role="footer" style="text-align:center;position:fixed;width:100%;bottom:0px">
    <div data-role="controlgroup" data-type="horizontal">
      <a href="https://www.facebook.com/funnygifsnow" target="_blank" class="ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Follow FunnyGifsNow on Facebook</a>
      <a href="https://twitter.com/funnygifsnow" target="_blank" class="ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Follow FunnyGifsNow on Twitter</a>
    </div>
  </div>
</div> 

</body>
</html>