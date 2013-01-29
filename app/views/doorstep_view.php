<p class="lead">Welcome to <strong><?php echo Config::site_title; ?></strong>, a client credential management system. It's been designed from the ground up to make ease of saving your client's sensitive information and then finding it again later.</p>

<div class="login">
	<form class="doorstep-login">
		<h2>Log In</h2>
		<input type="text" class="input-block-level" placeholder="Email Address">
		<input type="password" class="input-block-level" placeholder="Password">
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label><br>
		<button class="btn btn-large btn-primary" type="submit">Log in</button>
	</form>
</div><!-- / login -->

<div class="register">
	<form id="doorstep-register">
		<h2>Create an account, it's free!</h2>
		
		<input type="text" name="reg_email" id="reg_email" placeholder="Email Address" class="input-block-level">
		<input type="password" name="reg_password" id="reg_password" placeholder="Password">
		<input type="password" name="reg_password2" id="reg_password2" placeholder="Confirm Password">
		<button class="btn btn-large btn-primary">Create Account</button>
	</form>
<div><!-- / regiter -->