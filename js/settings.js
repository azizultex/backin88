(function ($) {
	"use strict";

	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();  

	    $('#toggle').click(function() {
			$(this).toggleClass('active');
			$('#overlay').toggleClass('open');
			$('body').toggleClass('fixed');
		}); 
	});

	var audioMap = new Map();
	var rappers = document.querySelectorAll('.rapper');
	rappers.forEach(function(rapper){
		audioMap.set(rapper, new Audio());
		rapper.addEventListener('click', function(){
			var audio = new Audio($(this).data('audio'));
			audio.play();
			audioMap.set(this, audio);
			var current = audioMap.get(this);
			// console.log('get', current);
			audioMap.forEach(function(audio){
				if( audio != current ){
					audio.pause();
					audio.currentTime = 0;
				}
			});
		});
	});



}(jQuery));	