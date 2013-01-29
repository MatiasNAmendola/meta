/*----------------------------------------------------------------------------------------
 * FRONT END FORM VALIDATION
 *----------------------------------------------------------------------------------------
 */

$(function(){
	/*------------------------------------------------------------------------------------
	 * REGISTRATION FORM
	 *------------------------------------------------------------------------------------
	 */
	 $('#doorstep-register').validate({
	 	rules: {
	 		reg_email: {
	 			required: true,
	 			email: true
	 		},
	 		reg_password: required,
	 		reg_password2: {
	 			required: true,
	 			equalTo: '#password'
	 		}
	 	}, 
	 	messages: {
	 		reg_email: {
	 			required: 'You must enter an email address.',
	 			email: 'You must enter a valid email address: name@domain.com'
	 		},
	 		reg_passwod: 'You must enter a password.',
	 		reg_password2: {
	 			required: 'You must confirm the password you entered.',
	 			equalTo: 'The passwords you entered did not match.'
	 		}
	 	}
	 });	
});