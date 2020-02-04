(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
}(function () { 'use strict';

	function main_menu_subMenu(){

		//alert("yeah");
		let triangle = document.getElementById("triangle");
		let triangle_x = -20;	
		let _to_menu;
		let active_archive_menu;
		let mouse_noving_on_header = false;
		let e, g, x, y;
		let archive_is_defined = document.querySelector(".archive");
			
		function go_to_slide_menu( id ){
			jQuery("#sub-nav-desktop").slick("slickGoTo", id - 1 ,false);
		}
		
		function move_triangle_subnav_offset_x( el ){

			e = document.documentElement;
			g = document.getElementsByTagName('body')[0];
			x = window.innerWidth || e.clientWidth || g.clientWidth;
			y = window.innerHeight || e.clientHeight || g.clientHeight;
						
			if( ! x < 980 && !mouse_noving_on_header && !archive_is_defined) return;	
			 
			let _x = el.offset().left;
			let _ow = el.outerWidth(true) / 2;
			
			triangle_x = _x + _ow;
			
			jQuery(triangle).css("left",triangle_x + "px");	
				
		}
			
		window.addEventListener('resize', event => {

			
			move_triangle_subnav_offset_x( active_archive_menu );
		});
		
		jQuery(document).ready(function(){
			
			active_archive_menu = jQuery("body.archive #main-menu-desktop .current-menu-ancestor a");
			var active_archive_menu_index = jQuery("body.archive #main-menu-desktop .current-menu-ancestor").index();
			 		
			jQuery("#sub-nav-desktop").slick({
				arrows:false,
				vertical: true,
				speed: 200
			});
			
			
			
			jQuery("#main-menu-desktop > li > a").each( function(i){
				
				//return;
				
				let _index = jQuery(this).parent().index();
				
				if( _index == 0) return;
				
				jQuery(this).on("mouseover", function(e){
					
					//e.preventDefault();
					clearTimeout(_to_menu);
					jQuery("#sub-nav-desktop").addClass("active");
					go_to_slide_menu( _index );
				});
			});
					
			jQuery("#masthead").on("mouseleave", function(e){
			
				clearTimeout(_to_menu);
						
				if ( active_archive_menu_index > 0 ){
					go_to_slide_menu( active_archive_menu_index );
					move_triangle_subnav_offset_x( active_archive_menu );
					return;	
				}
			
				_to_menu = setTimeout(function(){
					jQuery("#sub-nav-desktop").removeClass("active");
					jQuery(triangle).css("left","-20px");
				}, 100);
			});
			

			jQuery("#main-menu-desktop a").on("mousemove",function(e){
				let _ok = jQuery(e.target).parent().index();
				mouse_noving_on_header = true;
				
				if( _ok <= 0 ) return;
				move_triangle_subnav_offset_x( jQuery(e.target) );
			});	
			
			

			go_to_slide_menu( active_archive_menu_index );
			move_triangle_subnav_offset_x( active_archive_menu );

			
		});
	}

	function ajax_search_agenda(){
		jQuery("#agenda-filtres").on("submit",function(e){
			
			e.preventDefault();
			
			jQuery(".lds-facebook").css("display","inline-block");
			
			let year = jQuery("#agenda-year").val();
			let month = jQuery("#agenda-month").val(); 
			let genre = jQuery("#agenda-genre").val();
			let nonce = jQuery("#agenda-nonce").val(); 
		
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : agendAjax.ajaxurl,
				data : {
					action: "display_agenda",
					year : year,
					month : month,
					genre : genre,
					nonce: nonce
				},
				success: function(response) {
					if( response.type == "success") {
						jQuery("#agenda").html(response.events);
					} else {
						alert("Your like could not be added");
					}

					jQuery(".lds-facebook").css("display","none");

					jQuery(".aside-item-calendrier.element.hide-me").each(function(i, value) {
						setTimeout(function() {
							jQuery(value).removeClass("hide-me");
						}, 50 * i);
					});
				}
			});		
		});
	}

	( function( $, d , w ) {
		
		"use-strict";
		let menu_mobile = d.getElementById("main-menu-mobile");
		let menu_mobile_open = d.querySelector("#main-menu-mobile.open");
		let content = d.getElementById("content");
		let colophon = d.getElementById("colophon");
			
		let menu_toggle = d.querySelector(".bouton-menu-toggle-mobile");
		let loupe_search = d.querySelector("#panm-search a");
		let search_div = d.getElementById("searchform");
		let close_searchform = d.getElementById("close-searchform");
		
		let spotify = d.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe");
		
		
		function toggle_menu(){
			menu_mobile.classList.toggle("open");
			menu_mobile_open = d.querySelector("#site-navigation.open");
		}
		
		function reportWindowSize() {
			var x = w.innerWidth || e.clientWidth || g.clientWidth;
			
			if( x > 1024 ){
				menu_mobile.classList.remove("open");
			}
			//
		}	


			
		/*
			----------------------------------------------------------------------------------------------------
		*/
		
		menu_toggle.addEventListener('click', event => {
			event.preventDefault();
			toggle_menu();
			content.classList.toggle('collapse');
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
			
			if( $("#new-featured-slider").length > 0 ){
				$("#new-featured-slider").slick({
					prevArrow: '<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',
					nextArrow: '<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>',
				});
			}

			
			$(".filtres-content-tabs").on("click"," li a", function(e){
				let _f = $(this).data("content");
				let _target = $(_f).children("p");
				
				if( $(_target).is(":visible") ){
					_target.hide();
					return;
				}
					
				$(".filtres-content li p").hide();
				
				_target.show();
			});
			
			/*
					$(".filtre-liste-tax").on("click","span",function(){
						let _data = $(this).data("genre");
						$(".album.element").hide();
						
						$("[data-filter~='"+ _data +"']").each( function(index) {
							$(this).show();
						});
						
					});
			*/
			
			$("#menu-panm").on("click",".burger", function(){
				$(this).removeClass("active");
				$("#menu-panm .cross").addClass("active");
				$("#menu-panm .sub-menu").show();
			});
			$("#menu-panm").on("click",".cross", function(){
				$(this).removeClass("active");
				$("#menu-panm .burger").addClass("active");
				$("#menu-panm .sub-menu").hide();
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
			
			main_menu_subMenu();
			ajax_search_agenda();
		});
		
	})( jQuery, document , window );

}));
