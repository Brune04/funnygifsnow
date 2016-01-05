<html>
<head>
	<title><?php echo $title ?> | Funny Gifs Now</title>
	<link rel="shortcut icon" href="http://localhost/~peterbrune/application/images/header.png">
	<meta name="description" content="<?php echo $description ?>" />
	<meta name="keywords" content="gifs, memes, funny, funny gifs, funny memes, upload memes, upload gifs, funny gifs now" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:url" content="<?php echo current_url(); ?>" />
	<meta property="og:site_name" content="Funny Gifs Now"/>
	<meta property="og:image" content="<?php echo $ogimage ?>" />
	<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/main.css">
	<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/popup.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/jquery-2.1.1.js"></script>
	<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/jquery.jscroll.min.js"></script>
	<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/header.js"></script>
	<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/leanmodal.min.js"></script>
	<script language="javascript" type="text/javascript" src="/~peterbrune/application/js/leanmodal-modified.js"></script>
</head>
<?php 
	if(isset($_POST['logout']))
	{
		$this->session->sess_destroy();
		header("Location:".$_SERVER['SCRIPT_NAME']);
	}
?>
<body>
	<div id="wrapper">
		<div class="container">
			<div id="modal" class="popupContainer" style="display:none;">
				<header class="popupHeader">
					<span class="header_title">Login</span>
					<span class="modal_close"><i class="fa fa-times"></i></span>
				</header>
				<section class="popupBody">
				<!-- Social Login -->
				<!--<div class="social_login">
					<div class="">
						<a href="#" class="social_box fb">
							<span class="icon"><i class="fa fa-facebook"></i></span>
							<span class="icon_title">Connect with Facebook</span>
							
						</a>

						<a href="#" class="social_box google">
							<span class="icon"><i class="fa fa-google-plus"></i></span>
							<span class="icon_title">Connect with Google</span>
						</a>
					</div>

					<div class="centeredText">
						<span>Or use your Email address</span>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
						<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
					</div>
				</div>-->

				<!-- Username & Password Login form -->
				<div class="user_login">
	   				<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>/login/login_user" id="login_user_form" method="POST">
						<label for="username">Username:</label>
		    			<input type="text" id="username" name="username" placeholder="Username"/>
						<br />

						<label for="password">Password:</label>
		    			<input type="password" id="passowrd" name="password" placeholder="********"/>
						<br />

						<div class="action_btns">
							<div class="one_half"><a href="#" class="btn btn_red"><input class="login_user" type="button" name="submit" value="Login"/></a></div>
							<div class="one_half last">Not a Member Yet? <a href="#" class="register_popup">Register</a></div>
						</div>
					</form>
					<a href="#" class="forgot_password">Forgot password?</a>
				</div>

				<!-- Register Form -->
				<div class="user_register">
					<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>/register/register_user" id="register_user_form" method="post">
						<label for="username">Username:</label>
						<input value="<?php echo set_value('username') ?>" type="text" name="username" placeholder="Username" />
						<br />

						<label for="firstname">First Name:</label>
						<input value="<?php echo set_value('firstname') ?>" type="text" name="firstname" placeholder="First Name" />
						<br />

						<label for="lastname">Last Name:</label>
						<input value="<?php echo set_value('lastname') ?>" type="text" name="lastname" placeholder="Last Name" />
						<br />

						<label for="email">Email:</label>
						<input value="<?php echo set_value('email') ?>" type="text" name="email" placeholder="test@email.com" />
						<br />

						<label for="password">Password:<label>
						<input value="<?php echo set_value('password') ?>" type="password" name="password" placeholder="********" />
						<br />

						<label for="confirm">Confirm Password:</label>
						<input value="<?php echo set_value('confirm') ?>" type="password" name="confirm" placeholder="********" />
						<br />

						<input id="send_updates" type="checkbox" name="agree" />
						<label for="send_updates">I Agree to the <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/terms">Terms of Service</a> and <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/privacy">Privacy Policy</a></label>

						<div class="action_btns">
							<div class="one_half"><a href="#" class="btn btn_red"><input class="register_user" type="button" name="sign_up" value="Register" /></a></div>
							<div class="one_half last">Already a Member? <a href="#" class="login_popup">Login</a></div>
						</div>
					</form>
				</div>
			</section>
		</div>
		<nav class="nav">
			<div class="container">
				<ul>
					<li class="title"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/">FUNNY GIFS NOW</a></li>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/featured"><li>Featured</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/popular"><li>Most Popular</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/random"><li>Random</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/meme"><li>Memes</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/gif"><li>Gifs</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/upload"><li>Upload</li></a>
					<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/about"><li class="about">about</li></a>
					<?php if(!$logged_in): ?>
						<a id="register_form" href="#modal"><li class="login">Sign up</li></a>
						<a id="login_form" href="#modal"><li class="login">Login</li></a>
					<?php else: ?>
						<li class="login logout"><form method="post"><input type="submit" name="logout" value="(Logout)"/></form></li>
						<div class="username"><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $this->session->userdata['username'] ?>">
							<li class="login profile"><?php echo $this->session->userdata['username'] ?></li>
						</a></div>
						<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/u/<?php echo $this->session->userdata['username'] ?>"><li class="login"><img class="image" src="<?php echo $this->session->userdata['user_image'] ?>" /></li></a>
					<?php endif; ?>
				</ul>
			</div>
		</nav>

		</div>

		<div class="main">