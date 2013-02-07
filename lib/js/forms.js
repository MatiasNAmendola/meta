/*----------------------------------------------------------------------------------------
 * forms.js 
 * handles form processing & validation
 *----------------------------------------------------------------------------------------
 */
$(function() {
	/*------------------------------------------------------------------------------------
	 * Registration Form
	 *------------------------------------------------------------------------------------
	 */
	$('#register').submit(function(e){
		e.preventDefault();
		// reset the errors
        $('.reg_error').hide();
		// form data
		var formData = $('#register').serialize();
		$.ajax({
			data:		formData,
			dataType:   'json',
			type:		'post',
			url:		'/register/',
			success:	function(reg_results) {
				/* Validation */
				if(reg_results.success != 1) {
					var fail			= reg_results.fail;
					var email_empty 	= reg_results.reg_email.is_empty;
					var email_valid		= reg_results.reg_email.is_email;
					var email_taken		= reg_results.user_exists;
					var password_empty	= reg_results.reg_password.is_empty;
					var password_match	= reg_results.reg_password2.is_matchTo;
				}
				if(reg_results.success != 1) {
					/* Reset Errors */
					$('.reg_error').hide();
					
					if(email_empty == 1) { $('.email_empty').fadeIn(); }
					if(email_empty != 1 && email_valid == 1) { $('.email_valid').fadeIn(); }
					if(email_taken == 1) { $('.email_taken').fadeIn(); }
					if(password_empty == 1) { $('.password_empty').fadeIn(); }
					if(password_match == 1) { $('.password_match').fadeIn(); }
				} else {
					
					/* Do Something */
					$('#reg_email').val('');
					$('#reg_password').val('');
					$('#reg_password2').val('');
					$('.reg_success').fadeIn();
					
				}
		        
			}
		});
		return false;
	});
	
	/*------------------------------------------------------------------------------------
	 * Login Form
	 *------------------------------------------------------------------------------------
	 */
	$('#login').submit(function(e) {
	
		e.preventDefault();
		
		
		// reset the errors
		$('.login-errors').hide();
		
		// get the form data
		var formData = $('#login').serialize();
		$.ajax({
			data:		formData,
			dataType:	'json',
			type:		'post',
			url:		'/login/',
			success:	function(login_results) {
			
				console.log(login_results);
				
				/* Validation */
				if(login_results.success != 1) {
					
					$('.login_error').fadeIn();
					
					/* clear the password */
					$('#login_password').val('');
				
				} else {
				
					/* Clear the form */
					$('#login_email').val('');
					$('#login_password').val('');
					
					// refresh!
					window.location.replace('/');
				
				}
				
			}
		});
		return false;
	});
});