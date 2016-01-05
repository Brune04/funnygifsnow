<link rel="stylesheet" type="text/css" href="/~peterbrune/application/css/login.css">
<div class="login">
	<div class="container">
		<h1>Sign Up</h1>
		<?php echo validation_errors('<p class="error">'); ?>
		<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>/register/register_user" method="post">
			<li>
				<label for="username">Username:</label>
				<input value="<?php echo set_value('username') ?>" type="text" name="username" placeholder="Username" />
			</li>
			<li>
				<label for="firstname">First Name:</label>
				<input value="<?php echo set_value('firstname') ?>" type="text" name="firstname" placeholder="First Name" />
			</li>
			<li>
				<label for="lastname">Last Name:</label>
				<input value="<?php echo set_value('lastname') ?>" type="text" name="lastname" placeholder="Last Name" />
			</li>
			<li>
				<label for="email">Email:</label>
				<input value="<?php echo set_value('email') ?>" type="text" name="email" placeholder="test@email.com" />
			</li>
			<li>
				<label for="password">Password:<label>
				<input value="<?php echo set_value('password') ?>" type="password" name="password" placeholder="********" />
			</li>
			<li>
				<label for="confirm">Confirm Password:</label>
				<input value="<?php echo set_value('confirm') ?>" type="password" name="confirm" placeholder="********" />
			</li>
			<input class="login" type="submit" name="sign_up" value="Sign Up" />
		</form>
		<h3>Already a Member</h3>
		<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/user/login">Login</a>
	</div>
</div>