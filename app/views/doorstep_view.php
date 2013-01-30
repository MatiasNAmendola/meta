<div class="row">
	<div class="span12">
		<p class="lead">Welcome to <strong><?php echo Config::site_title; ?></strong>, a client credential management system. It's been designed from the ground up to make ease of saving your client's sensitive information and then finding it again later.</p>
	</div>
</div>
<div class="row">
	<div class="span4">
		<h2>Login</h2>
	</div>
	<div class="span8">
		<div class="row">
			<div class="span8"><h2>Create an account, it's free!</h2></div>
		</div>
		<form id="doorstep-register">
			<div class="row">
				<div class="span4"><input type="text" name="reg_email" id="reg_email" placeholder="Email Address"></div>
				<div class="span4">
					<div class="email_empty reg_error alert alert-error hide">You must enter an email address.</div>
					<div class="email_valid reg_error alert alert-error hide">The email you enter must be valid: name@domain.com</div>
				</div>
			</div>
			<div class="row">
				<div class="span4"><input type="password" name="reg_password" id="reg_password" placeholder="Password"></div>
				<div class="span4">
					<div class="password_empty reg_error alert alert-error hide">You must enter a password.</div>
					<div class="password_match reg_error alert alert-error hide">The passwords you entered do not match.</div>
				</div>
			</div>
			<div class="row">
				<div class="span4"><input type="password" name="reg_password2" id="reg_password2" placeholder="Confirm Password"></div>
			</div>
			<div class="row">
				<div class="span4">
					<button class="btn btn-large btn-primary">Create Account</button>
				</div>
			</div>
		</form>
	</div>
</div>