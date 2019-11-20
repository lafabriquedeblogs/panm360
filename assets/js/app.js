( function( $, d , w ) {
	
	"use-strict";
	
	let menu_toggle = d.querySelector(".menu-toggle");
	let menu_mobile = d.getElementById("site-navigation");
	let menu_mobile_open = d.querySelector("#site-navigation.open");
	let content = d.getElementById("content");
	let colophon = d.getElementById("colophon");
	let loupe_search = d.querySelector("#panm-search a");
	let search_div = d.getElementById("searchform");
	let close_searchform = d.getElementById("close-searchform");
	let e, g, x, y;
	let _to_menu;
	let triangle = d.getElementById("triangle");
	let triangle_x = -20;
	let active_archive_menu;
	
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
		
		get_element_offsetx( active_archive_menu );
	}	
	
	function slide_menu( id ){
		$("#sub-nav-desktop").slick("slickGoTo", id - 1 ,false);
	}
	
	function get_element_offsetx( el ){
		let _x = el.offset().left;
		let _ow = el.outerWidth(true) / 2;
		
		triangle_x = _x + _ow;
			
		jQuery(triangle).css("left",triangle_x + "px");		
	}
	/*
		----------------------------------------------------------------------------------------------------
	*/
	
	menu_toggle.addEventListener('click', event => {
		menu_is_open = true;
		toggle_menu();
	});
	
	loupe_search.addEventListener('click', event => {
		search_div.classList.toggle('active');
	});
	
	close_searchform.addEventListener('click', event => {
		search_div.classList.remove('active');
	});
	
	w.addEventListener('resize', event => {
		 reportWindowSize();
	});

	/*
		----------------------------------------------------------------------------------------------------
	*/
	
	$(document).ready(function(){
		
		active_archive_menu = $("body.archive #main-menu-desktop .current-menu-ancestor a");
		var active_archive_menu_index = $("body.archive #main-menu-desktop .current-menu-ancestor").index();
		 		
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
					
			if ( active_archive_menu_index > 0 ){
				slide_menu( active_archive_menu_index );
				get_element_offsetx( active_archive_menu );
				return;	
			}
		
			_to_menu = setTimeout(function(){
				$("#sub-nav-desktop").removeClass("active");
			}, 600);
		});
		
		$("#main-menu-desktop a").on("mousemove",function(e){
			let _ok = $(e.target).parent().index();
			console.log(_ok);
			
			if( _ok <= 0 ) return;
			get_element_offsetx( $(e.target) );
		});	
		
		slide_menu( active_archive_menu_index );
		get_element_offsetx( active_archive_menu );
		reportWindowSize();
	
	});
})( jQuery, document , window );
