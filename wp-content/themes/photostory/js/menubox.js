/* menubox.js v1.0 */
jQuery(document).ready(function($) {
		var stickyHeaderTop = $('.header-content').offset().top;
		$(window).scroll(function(){
		    if( $(window).scrollTop() > stickyHeaderTop ) {
			$('.menu-box').addClass("sticky-nav");
		    } else {
			$('.menu-box').removeClass("sticky-nav");
		    }
		});
});