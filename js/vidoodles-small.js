jQuery(document).ready(function($) {


	var videowidth = $('video').attr('width');

	$('#content').css({
 		'max-width': videowidth +'px'
	});

	$('video').mediaelementplayer();

	
});