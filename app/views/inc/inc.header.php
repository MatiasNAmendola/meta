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
	
	<div class="container-narrow">
		
		<header class="row">
		
			<div class="logo">
				<span class="ninjato">Ninjato</span> | <span class="meta">Meta</span>
			</div>
			
			<div class="login">
				<form class="form-inline">
					
					<input type="text" name="login_email" id="login_email" placeholder="Email" class="input-medium">
					<input type="password" name="login_password" id="login_password" placeholder="Password" class="input-medium">
					<button type="submit" class="btn">Log in</button>
					
				</form>
			</div>
			
		</header>
		
		<hr>