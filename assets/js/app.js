( function( $, d , w ) {
	
	"use-strict";
	
	let menu_toggle = d.querySelector(".menu-toggle");
	let menu_mobile = d.getElementById("site-navigation");
	let menu_mobile_open = d.querySelector("#site-navigation.open");
	let content = d.getElementById("content");
	let colophon = d.getElementById("colophon");
	let e, g, x, y;
	let _to_menu;
	
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
	
	function slide_menu( id ){
		$("#sub-nav-desktop").slick("slickGoTo", id - 1 ,false);
	}
	
	menu_toggle.addEventListener('click', event => {
		menu_is_open = true;
		toggle_menu();
	});
	
	w.addEventListener('resize', event => {
		 reportWindowSize();
	});

	$(document).ready(function(){
		
		var active_archive_menu_index = $("body.archive #main-menu-desktop .current-menu-ancestor").index();
		 
		console.log(active_archive_menu_index);
		
		$("#sub-nav-desktop").slick({
			arrows:false,
			vertical: true,
			speed: 200
		});
		
		$("#main-menu-desktop > li > a").each( function(i){
			
			let _index = $(this).parent().index();
			
			if( _index == 0) return;
			
			$(this).on("click mouseover", function(e){
				
				e.preventDefault();
				clearTimeout(_to_menu);
				$("#sub-nav-desktop").addClass("active");
				slide_menu( _index );
			});
		});
		
		$("#masthead").on("mouseleave", function(e){
			clearTimeout(_to_menu);
			
			console.log(active_archive_menu_index);
			
			if ( active_archive_menu_index > 0 ){
				slide_menu( active_archive_menu_index );
				return;	
			}
		
			_to_menu = setTimeout(function(){
				$("#sub-nav-desktop").removeClass("active");
			}, 600);
		});
		
		
		slide_menu( active_archive_menu_index );
		
	});
	reportWindowSize();
	
	
})( jQuery, document , window );
