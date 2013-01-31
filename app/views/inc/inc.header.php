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
	
	<div class="container-narrow">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="<?php echo Config::site_url; ?>/index.php">Home</a></li>
				<li><a href="<?php echo Config::site_url; ?>/about/">About</a></li>
			</ul>
			<h2 class="muted">Meta</h2>
		</div><!-- / masthead -->
		
		<hr>