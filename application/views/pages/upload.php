<div class="upload">
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/upload.css">
	</head>
	<div id="container">
        <div id="body">
        	<h2>Upload</h2>
        	<p>Upload new gifs and memes and share them with your friends!</p>
        	<?php if(!$logged_in): ?>
	        		<span>Please <a href="#" id="login_second">Login</a> To Upload A New File</span>
				<?php else: ?>
				<h2><?php echo $msg;?></h2>
				<?php echo form_open_multipart('upload_file/upload_it');?>
					<li>
						<label>Title:</label><input type="text" name="title" />
					</li>
					<li>
						<input class="file" type="file" name="userfile" size="20" />
					</li>
					<input class="upload" type="submit" value="Upload" />
				</form>
			<?php endif; ?>
		</div>
    </div>
</div>