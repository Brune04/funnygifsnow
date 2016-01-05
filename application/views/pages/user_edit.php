<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/user.css">
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/user.js"></script>
<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/posts.js"></script>
<div class="profile">
	<div class="container">
		<div class="left_rail">
			<div class="user_edit">
				<h2>My Settings</h2>
				<?php echo validation_errors('<p class="error">'); ?>
				<?php echo form_open_multipart('/u/' . $user->username . '/edit/save');?>
					<li class="top">
						<label for="firstname">User Image:</label>
						<img src="<?php echo $user->user_image ?>" />
						<input class="file" type="file" name="user_image" size="20" />
					</li>
					<li>
						<label for="firstname">First Name:</label>
						<input value="<?php echo $user->firstname ?>" type="text" name="firstname" placeholder="<?php echo $user->firstname ?>" />
					</li>
					<li>
						<label for="lastname">Last Name:</label>
						<input value="<?php echo $user->lastname ?>" type="text" name="lastname" placeholder="<?php echo $user->lastname ?>" />
					</li>
					<li>
						<label for="email">Email:</label>
						<input value="<?php echo $user->email ?>" type="text" name="email" placeholder="<?php echo $user->email ?>" />
					</li>
					<li class="bio">
						<label for="bio">Bio:</label>
						<textarea value="<?php echo $user->bio ?>" name="bio"><?php echo $user->bio ?></textarea>
					</li>
					<input class="login" type="submit" name="submit" value="Save"/>
				</form>
			</div>
		</div>
		<div class="right_rail">
			<div class="related_posts">
				<h2>Featured</h2>
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