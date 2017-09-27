jQuery("document").ready(function($){

  var nav = $('#main-menu-container');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 130) {
      nav.addClass("fix-search");
    } else {
      nav.removeClass("fix-search");
    }
  });

 
});

jQuery("document").ready(function($){

   var logo = $('#menu-item-180');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 130) {
      logo.addClass("fix-logo");
    } else {
      logo.removeClass("fix-logo");
    }
  }); 


  });


jQuery("document").ready(function($){

 var logoprzesun = $('#menu-item-23');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 130) {
      logoprzesun.addClass("fix-logo-przesun");
    } else {
      logoprzesun.removeClass("fix-logo-przesun");
    }
  }); 

    });

jQuery("document").ready(function($){

var pasek = $('#pasek-bottom');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 130) {
      pasek.addClass("fix-pasek");
    } else {
      pasek.removeClass("fix-pasek");
    }
  }); 

    });

jQuery("document").ready(function($){

 var nav = $('.logo-top');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 130) {
      nav.addClass("fix-gorne-logo");
    } else {
      nav.removeClass("fix-gorne-logo");
    }
  });
});