jQuery(document).ready(function($) {

	var videoheight = $('video').outerHeight();
	var videowidth = $('video').outerWidth();
	var frameratio = videowidth / videoheight;


	function setHeights() {
		
		var contentwidth = $(window).width();
		var contentheight = $(window).height();

		contentheight = contentheight - 5;

		var headertop = 0;

		if ($('#wpadminbar').length != 0) {
			headertop =+ $('#wpadminbar').outerHeight();
		} 

		contentheight = contentheight - headertop;		


	 	var tagetwidth = contentheight * frameratio;


		if ( tagetwidth < contentwidth ) {
//	 		console.log('adjusting.');
			contentwidth = tagetwidth;
		} 


		$('#content').css({
	 		'width': contentwidth +'px',
	 		'height': contentheight +'px'
		});


	}

	$(window).resize(function() {
	  setHeights();
	});


	$('video').mediaelementplayer({
		defaultVideoWidth: videowidth,
		defaultVideoHeight: videoheight,
	});

	setHeights();

		

});