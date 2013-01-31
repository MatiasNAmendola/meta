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
				var email_empty 				= reg_results.reg_email.is_empty;
				var email_valid					= reg_results.reg_email.is_email;
				var password_empty				= reg_results.reg_password.is_empty;
				var password_match				= reg_results.reg_password2.is_matchTo;
				
				if(email_empty == 1) {
					// throw dat error
				}
		        
			}
		});
	});
});