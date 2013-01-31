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
			success:	function(obj) {
		        
		        console.log(obj[1][1].is_empty);
		    	//console.log(obj[0][2]);
		      //console.log(obj.reg_email['is_empty']);  
		        
			}
		});
	});
});