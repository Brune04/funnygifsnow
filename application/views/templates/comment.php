<div class="comment_container">
	<img class="user_image" data-id="<?php echo $data->user_id; ?>" src="<?php echo $data->user_image; ?>" />
	<?php if(!empty($data->user_id)): ?>
		<div class="comment"><div class="name"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $data->username; ?>"><?php echo $data->username; ?></a></div> <?php echo $data->comment; ?></div>
	<?php else: ?>
		<div class="comment"><div class="name"><?php echo $data->username; ?></div> <?php echo $data->comment; ?></div>
	<?php endif; ?>
</div>