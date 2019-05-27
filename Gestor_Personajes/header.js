


$(document).ready(function(){

$(window).scroll(function(){

	if($(this).scrollTop() > 0){

		$('header').addClass('headerr');

	} else {
		$('header').removeClass('headerr');
	}
	
});

});