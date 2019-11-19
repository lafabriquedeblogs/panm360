( function( $, d , w ) {
	
	"use-strict";
	
	let menu_toggle = d.querySelector(".menu-toggle");
	let menu_mobile = d.getElementById("site-navigation");
	let menu_mobile_open = d.querySelector("#site-navigation.open");
	let content = d.getElementById("content");
	let colophon = d.getElementById("colophon");
	let e, g, x, y;
		
	function toggle_menu(){
		menu_mobile.classList.toggle("open");
		content.classList.toggle("abracadabra-fixed");
		colophon.classList.toggle("abracadabra-fixed");
		menu_mobile_open = d.querySelector("#site-navigation.open");
	}
	
	function reportWindowSize() {
		
		e = d.documentElement;
		g = d.getElementsByTagName('body')[0];
		x = w.innerWidth || e.clientWidth || g.clientWidth;
		y = w.innerHeight || e.clientHeight || g.clientHeight;
		
		if( x > 980 ){
			menu_mobile.classList.remove("open");
			content.classList.remove("abracadabra-fixed");
			colophon.classList.remove("abracadabra-fixed");
		}
		
	}	
	
	menu_toggle.addEventListener('click', event => {
		menu_is_open = true;
		toggle_menu();
	});
	
	w.addEventListener('resize', event => {
		 reportWindowSize();
	});

	$(document).ready(function(){
		
		let sub_menu_is_open = false;
		
		$("#sub-nav-desktop").slick({
			arrows:false,
			vertical: true,
			speed: 200
		});
		
		$("#main-menu-desktop > li > a").each( function(i){
			
			let _index = $(this).parent().index();
			
			if( _index == 0) return;
			
			$(this).on("click", function(e){
				
				e.preventDefault();
				clearTimeout(_to_menu);
				$("#sub-nav-desktop").addClass("active");
				$("#sub-nav-desktop").slick("slickGoTo",_index - 1 ,false);
			});
		});
		
		let _to_menu;
		
		$("#masthead").on("mouseleave", function(e){
			clearTimeout(_to_menu);
			_to_menu = setTimeout(function(){
				$("#sub-nav-desktop").removeClass("active");
			}, 300);
		});
		
	});
	reportWindowSize();
	
	
})( jQuery, document , window );
