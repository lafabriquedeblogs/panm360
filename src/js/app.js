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
	let active_archive_menu;
	let mouse_noving_on_header = false;
	let archive_is_defined = d.querySelector(".archive");
	let spotify = d.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe");
	
	
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
		
		if( x > 1024 ){
			menu_mobile.classList.remove("open");
			content.classList.remove("abracadabra-fixed");
			colophon.classList.remove("abracadabra-fixed");
		}
		
	}	
	
	/*
		----------------------------------------------------------------------------------------------------
	*/
	
	menu_toggle.addEventListener('click', event => {
		event.preventDefault();
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
		
/*
		if( $("#new-featured-slider").length > 0 ){
			$("#new-featured-slider").slick({
				prevArrow: '<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',
				nextArrow: '<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>',
			});
		}
*/


		
		$(window).on("scroll", function(e) {
		    
		  if ($(this).scrollTop() > 147) {
		    $("#text-introduction-panm360").addClass("moved");
		  } else {
		     $("#text-introduction-panm360").removeClass("moved");
		  }
		  
		});
		
		$(".filtres-content-tabs").on("click"," li a", function(e){
			let _f = $(this).data("content");
			let _target = $(_f).children("p");
			
			console.log(_target);
			
			if( $(_target).is(":visible") ){
				_target.hide();
				return;
			}
				
			$(".filtres-content li p").hide();
			
			_target.show();
		});
		
		reportWindowSize();

		const observer = lozad('.lozad', {
			rootMargin: '10px 0px', // syntax similar to that of CSS Margin
			threshold: 0, // ratio of element convergence
			loaded: function(el) {
				el.classList.add('img-loaded');
			}
		});
		observer.observe();		
		
		$(".gfield_checkbox").on("click","label", function(e){
			$(this).parent().toggleClass("selected");
		});
		
		
		if( spotify != null) spotify.setAttribute("width","100%");
		
	});
	
})( jQuery, document , window );
