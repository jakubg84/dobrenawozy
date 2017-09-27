/*!
 * Wyszukiwarka / pojawanie się + zanikanie

 */
 
$(document).ready(function() {

// Search
$('#top-menu-container .top-menu li#menu-item-10').click(function() {
    $(this).addClass('search');
    $('.wyszukiwarka').fadeIn();
	$('button.zamknij').fadeIn();
	$('button.zamknij').show();
    
});

$('button.zamknij').click(function(e) {
    e.stopPropagation();
    $('.wyszukiwarka').fadeOut();
	$('button.zamknij').fadeOut();
    $('#top-menu-container .top-menu li#menu-item-10').removeClass('search');
});


/*$('#top-menu-container .top-menu li#menu-item-8').hover(function() {
    $(this).addClass('pokazkonto');
    $('.konto').fadeIn();
	$('button.konto-zamknij').fadeIn();
	$('button.konto-zamknij').show();
    
});*/






})

$(document).ready(function(){
    $("#top-menu-container .top-menu li#menu-item-8").mouseover(function(){

         $(this).addClass('pokazkonto');
    $('.konto').fadeIn();
	//$('button.konto-zamknij').fadeIn();
	//$('button.konto-zamknij').show();

    });

    $('.konto .konto-zamknij').click(function(e) {
    e.stopPropagation();
    $('.konto').fadeOut();
	//$('button.zamknij').fadeOut();
    $('#top-menu-container .top-menu li#menu-item-8').removeClass('pokazkonto');
});

    $("#top-menu-container .top-menu li#menu-item-8").mouseout(function(){
        
       //  $('.konto').fadeOut();
	//$('button.konto-zamknij').fadeOut();
    $(this).removeClass('pokazkonto');
    });
});


$(document).ready(function(){
    $("#top-menu-container .top-menu li#menu-item-9").mouseover(function(){

         $(this).addClass('pokazkoszyk');
    $('.koszyk').fadeIn();
	//$('button.konto-zamknij').fadeIn();
	//$('button.konto-zamknij').show();

    });

    $('.koszyk .koszyk-zamknij').click(function(e) {
    e.stopPropagation();
    $('.koszyk').fadeOut();
	//$('button.zamknij').fadeOut();
    $('#top-menu-container .top-menu li#menu-item-9').removeClass('pokazkoszyk');
});

    $("#top-menu-container .top-menu li#menu-item-9").mouseout(function(){
        
       //  $('.konto').fadeOut();
	//$('button.konto-zamknij').fadeOut();
    $(this).removeClass('pokazkoszyk');
    });
});


