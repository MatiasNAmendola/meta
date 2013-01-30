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
			//dataType:   'json',
			type:		'post',
			url:		'/register/',
			success:	function(obj) {
		        
		      console.log(obj);  
		        
			}
		});
	});
});