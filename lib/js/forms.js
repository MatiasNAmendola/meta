/*----------------------------------------------------------------------------------------
 * forms.js 
 * handles form processing & validation
 *----------------------------------------------------------------------------------------
 */
$(function() {
	/* Doorstep Registration Form */
	$('#doorstep-register').submit(function(e){
		e.preventDefault();
		
		// reset the errors
        $('.reg_error').hide();
		
		// form data
		var formData = $('#doorstep-register').serialize();
		
		$.ajax({
			data:		formData,
			dataType:   'json',
			type:		'post',
			url:		'/register/',
			success:	function(reg_results) {
			
				/* Validation */
				var email_empty 	= reg_results.reg_email.is_empty;
				var email_valid		= reg_results.reg_email.is_email;
				var password_empty	= reg_results.reg_password.is_empty;
				var password_match	= reg_results.reg_password2.is_matchTo;
				
				/* Reset Errors */
				$('.reg_error').hide();
				
				if(email_empty == 1) {
					$('.email_empty').fadeIn();
				}
				
				if(email_empty != 1 && email_valid == 1) {
					$('.email_valid').fadeIn();
				}
				
				if(password_empty == 1) {
					$('.password_empty').fadeIn();
				}
				
				if(password_match == 1) {
					$('.password_match').fadeIn();
				}
		        
			}
		});
	});
});