jQuery("document").ready(function($){

	var nav = $('#main-menu-container');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 436) {
			nav.addClass("fixed");
		} else {
			nav.removeClass("fixed");
		}
	});

});