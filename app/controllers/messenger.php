<?php

class Messenger {
	
	public function ErrorMessage($error_code) {
		
		$error_messages = array(
			'1000' => 'We\'re sorry, the page you are looking for does not exist.'
		);
		
		$error_message = $error_messages[$error_code];
		
		$page_title =  Master_Controller::GetPageTitle('error_404');
		
		include Config::get_dir('view') . '/inc/inc.header.php';
		
		include Config::get_dir('view') . '/messenger/error_view.php';
		
		include Config::get_dir('view') . '/inc/inc.footer.php';
			
	}
}

?>