<header class="navbar-fixed-top">
	
	<div class="logo">
		<span class="meta">Meta</span>				
	</div>
	
	<?php
	if($meta_user['active'] == 1):
		require Config::get_dir('view') . '/inc/inc.meta_nav.php';
	else:
		require Config::get_dir('view') . '/inc/inc.doorstep_nav.php';
	endif;
	?>
	
</header>