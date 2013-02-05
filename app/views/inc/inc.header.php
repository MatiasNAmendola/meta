<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->page_title; ?></title>
		
		<!-- styles -->
		<link href="<?php echo Config::site_url ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo Config::site_url ?>/lib/css/styles.css" rel="stylesheet">
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="<?php echo $this->body_class; ?>">
	
	<?php $cur_user = ""; ?>
	
	<header class="navbar-fixed-top">
		
		<div class="logo">
			<span class="meta">Meta</span>				
		</div>
		
		<ul class="nav nav-pills">
			<?php if($_SESSION['meta_user']): ?>
				Welcome back, <?php echo $_SESSION['meta_user']['email']; ?>
			<?php else: ?>
			<li><a href="#login" class="meta-box-trigger"><i class="icon-user"></i> Login</a>
				
				<div class="meta-nav-box">
					<form id="login">
						
						<div class="meta-nav-box-title"><a class="close" href="#close">&times;</a><h4>Login</h4></div>
						<div class="meta-nav-box-body">
							<?php /* Begin Errors */ ?>
							<div class="row hide login_error">
								<div class="span5 alert alert-error">The email or password you entered was incorrect.</div>
							</div>
							<?php /* End Errors */ ?>
							<div class="row">
								<div class="span12">
									<input type="text" name="login_email" id="login_email" placeholder="Email Address">
								</div>
							</div>	
							<div class="row">
								<div class="span12">
									<input type="password" name="login_password" id="login_password" placeholder="Password">
								</div>
							</div>	
							<div class="row">
								<div class="span12">
									<button class="btn btn-large">Login</button>
									&nbsp;&nbsp;<a href="#forgotpassword">Forgot Password?</a>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				
			</li>
			<li><a href="#register" class="meta-box-trigger"><i class="icon-plus-sign"></i> Register</a>
				
				<div class="meta-nav-box">
					<form id="register">
						<div class="meta-nav-box-title"><a class="close" href="#close">&times;</a><h4>Register an Account</h4></div>
						<div class="meta-nav-box-body">
							<?php /* Confirmation */ ?>
							<div class="row hide reg_success">
								<div class="span5 alert alert-success">Your account has been created. An email has been sent with instructions on how to activate your account!</div>
							</div>
							<?php /* Begin Email Errors */ ?>
							<div class="row hide email_empty reg_error">
								<div class="span5 alert alert-error">You must enter an email address.</div>
							</div>
							<div class="row hide email_valid reg_error">
								<div class="span5 alert alert-error">The email you enter must be valid: name@domain.com</div>
							</div>
							<div class="row hide email_taken reg_error">
								<div class="span5 alert alert-error">The email you entered is already in use.</div>
							</div>
							<?php /* End Email Errors */ ?>
							<div class="row">
								<div class="span12">
									<input type="text" name="reg_email" id="reg_email" placeholder="Email Address">
								</div>
							</div>
							<?php /* Begin Password Errors */ ?>
							<div class="row hide password_empty reg_error">
								<div class="span5 alert alert-error">You must enter a password.</div>
							</div>
							<div class="row hide password_match reg_error">
								<div class="span5 alert alert-error">The passwords you entered do not match.</div>
							</div>
							<?php /* End Password Errors */ ?>
							<div class="row">
								<div class="span12">
									<input type="password" name="reg_password" id="reg_password" placeholder="Password">
								</div>
							</div>
							<div class="row">
								<div class="span12">
									<input type="password" name="reg_password2" id="reg_password2" placeholder="Confirm Password">
								</div>
							</div>
							<div class="row">
								<div class="span12">
									<button class="btn btn-large">Create Account</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			
			</li>
			
			<?php endif; ?>
		</ul>
		
	</header>
	
	<div class="container-narrow">
		