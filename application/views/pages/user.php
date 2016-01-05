<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/user.css">
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/user.js"></script>
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/posts.js"></script>
<div class="profile">
	<div class="container">
		<div class="left_rail">
			<div class="user_page">
				<div class="user_container">
					<span class="name"><?php echo $user->username; ?></span>
					<div class="user_info">
						<img class="user_image" src="<?php echo $user->user_image; ?>" />
					</div>
				</div>
				<div class="info">
					<div>Uploads <?php echo count($user_posts); ?></div>
					<div>Favorites <?php echo count($user_favorites); ?></div>
					<?php if(isset($this->session->userdata['username']) && $this->session->userdata['username'] == $user->username): ?>
						<div class="edit"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $this->session->userdata['username'] ?>/edit">Edit Profile</a></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="user_posts">
				<?php if(!empty($user_posts)): ?>
					<div class="nav">
						<ul>
							<li class="selected user_uploads">User Uploads</li>
							<li class="user_favs">User Favorites</li>
						</ul>
					</div>
					<div class="uploads">
						<?php if(count($user_posts) > 0): ?>
							<?php foreach($user_posts as $post): ?>
								<div class="post">
									<div class="title"><?php echo $post->title ?></div>
									<a class="image" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/view/<?php echo $post->id; ?>">
										<img class="post_image" src="<?php echo $post->url ?>" />
									</a>
									<div class="post_info">
										<div class="author"><?php echo $post->author ?></div>
										<div class="created_at"><?php echo $post->created_at ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="none">This User Has No Uploads</div>
						<?php endif; ?>
					</div>
					<div class="favs" style="display:none">
						<?php if(count($user_favorites) > 0): ?>
							<?php foreach($user_favorites as $post): ?>
								<div class="post">
									<div class="title"><?php echo $post->title ?></div>
									<a class="image" href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/view/<?php echo $post->id; ?>">
										<img class="post_image" src="<?php echo $post->url ?>" />
									</a>
									<div class="post_info">
										<div class="author"><?php echo $post->author ?></div>
										<div class="created_at"><?php echo $post->created_at ?></div>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="none">This User Has No Favorites</div>
						<?php endif; ?>
					</div>
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
								<img src="<?php echo $post->url ?>" />
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
		</div>
	</div>
</div>