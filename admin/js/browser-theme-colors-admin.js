(function( $ ) {
	'use strict';

	$( document ).ready(function() {
		$('.color-input').each( function( i, elem ) {
		var hueb = new Huebee( elem, {
			staticOpen: true
		});
		var dbcolor = $('.color-input').val();
		$('.top-bar').css('background-color',dbcolor);
		hueb.on( 'change', function( color, hue, sat, lum ) {
		$('.top-bar').css('background-color',color);
		})
	});
	});

})( jQuery );
function SetSrc()
        {
			var proto = 'https://'; 
			if (location.protocol != 'https:') { proto = 'http://'; }
            document.getElementById("nuttifox-iframe").src = proto + document.getElementById("nuttifox-iframe-source").value;
        }