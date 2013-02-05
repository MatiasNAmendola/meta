/*----------------------------------------------------------------------------------------
 * scripts.js
 * custom javascript
 *----------------------------------------------------------------------------------------
 */

/*----------------------------------------------------------------------------------------
 * doHover(), adds a hover class to an element or removes it
 * @param, class name, the class name to add hover class to
 *----------------------------------------------------------------------------------------
 */
function doHover(className) {
	$(className).mouseenter(function() {
		$(className).addClass('is-hover');
	});
	
	$(className).mouseleave(function() {
		$(className).removeClass('is-hover');
	});
}

$(function(){

	/*------------------------------------------------------------------------------------
	 * Meta Nav Drop downs
	 *------------------------------------------------------------------------------------
	 */
	$('.meta-box-trigger').click(function(e){
		e.preventDefault();
		var metabox = $(this).closest('li').find('.meta-nav-box');
		if(metabox.is(":visible")) {
			metabox.slideUp(100);
			$(this).find('i').removeClass('icon-white');
			metabox.closest('li').removeClass('active');
		} else {
			
			// hide all other meta nav boxes
			$('.meta-nav-box').hide();
			// clear all other nav pills
			$('.nav li').removeClass('active');
			$('.nav li a i').removeClass('icon-white');
			
			$(this).closest('li').addClass('active');
			$(this).find('i').addClass('icon-white');
			metabox.slideDown(200);
		}
	});
	
	/* Set Hover States */
	doHover('.meta-box-trigger');
	doHover('.meta-nav-box');
	
	/* Close the register form if they click the X */
	$('.meta-nav-box-title .close').click(function(e) {
		e.preventDefault();
		$(this).closest('.meta-nav-box').hide();
		$(this).closest('li').removeClass('active');
		$(this).closest('a').find('i').removeClass('icon-white');
	});
	
	/* if body is clicked hide the meta box */
	$('body').click(function() {
		if(!$('.meta-nav-box').hasClass('is-hover') && !$('.meta-box-trigger').hasClass('is-hover')) {
			$('.meta-nav-box').hide();
			$('.nav li a i').removeClass('icon-white');
			$('.nav li').removeClass('active');
		}
	});
	
});