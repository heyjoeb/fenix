/*------------------------------------------------------------

Author: Orman Clark 
Name: sildes.js

------------------------------------------------------------------*/
$(document).ready(function() {
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5500,
				pause: 3000,
				hoverPause: true,
				generatePagination: false			
			});
		});
/*------------------------------------------------------------

Author: http://www.queness.com 
Name: Easy to Style jQuery Drop Down Menu

------------------------------------------------------------------*/		
$(document).ready(function () {	
	
	$('#drop-menu li').hover(
		function () {
			//show its submenu
			$('ul', this).stop().slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).stop().slideUp(100);			
		}
	);
	
});