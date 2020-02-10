(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
}(function () { 'use strict';

	function ajax_search_agenda(){

		let step = 24;
		let more = 0;
		let stepin;
		let items;
		let items_remaining;
		
		let year, month, genre, nonce;
		let count;//jQuery("#agenda-count").val();
		
		let agenda_full = false;
		
		let agenda_start_date;
		
		let agenda_mini = false;
		
		function ajex_content(){
			
			jQuery(".loader-filtre-genre").css("opacity","1");
			
			jQuery.ajax({
				type : "post",
				dataType : "json",
				url : agendAjax.ajaxurl,
				data : {
					action: "display_agenda",
					year : year,
					agenda_start_date: agenda_start_date,
					month : month,
					genre : genre,
					count: count,
					nonce: nonce,
					agenda_mini: agenda_mini
				},
				success: function(response) {
					if( response.type == "success") {
						
						if( agenda_full ){
							jQuery("#agenda").html(response.events);
							jQuery(".loader-filtre-genre").css("opacity","0");
							return false;	
						}
						
						jQuery("#agenda_mini").html(response.events);
					}
					
					jQuery(".loader-filtre-genre").css("opacity","0");

				},
				complete: function(response){
					console.log(response);
				}
			});		
		}
		
		jQuery("#agenda-filtres").on("submit",function(e){
			
			e.preventDefault();
			agenda_full = true;
			agenda_mini = false;
			
			//jQuery(".loader-filtre-genre").css("display","inline-block");
			
			year = jQuery("#agenda-year").val();
			month = jQuery("#agenda-month").val(); 
			genre = jQuery("#agenda-genre").val();
			nonce = jQuery("#agenda-nonce").val(); 
			count = jQuery("#agenda-count").val(); 
			ajex_content();
			
		});
		
		jQuery("#choix-style-musical select").on("change",function(e){
			e.preventDefault();
			agenda_full = false;
			agenda_mini = true;
			
			agenda_start_date = jQuery("#agenda-start").val();
			year = jQuery("#agenda-year").val();
			month = jQuery("#agenda-month").val(); 
			genre = jQuery("#agenda-genre").val();
			nonce = jQuery("#agenda-nonce").val(); 
			count = jQuery("#agenda-count").val(); 
			ajex_content();
		});

		
		function load_more_items(){
			jQuery(".calendrier-ul-container li").css("display","none");
			
			more++;
			stepin = more * step;
			
			jQuery(".calendrier-ul-container li").slice(0,stepin).css("display","flex");
			
			items_remaining = items - stepin;
			if( items_remaining < 0 ){
				jQuery("#bouton-load-more").hide();
			}
		}
		
		jQuery("#bouton-load-more").on("click",function(e){
			e.preventDefault();
			load_more_items();
		});
		
		load_more_items();	
		
	}

	//import main_menu_subMenu from './sub_menu.js';


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
			
			$(window).load(function(){
				$(".at-share-btn-elements").prepend('<a class="a-icon-instagram-link" role="button" href="https://www.instagram.com/panm360/" target="_blank"><svg class="icon-instagram-link"><use xlink:href="#instagram"></use></svg></a>');
			});
			
			
			
			if( $("#new-featured-slider").length > 0 ){
				$("#new-featured-slider").slick({
					autoplay: true,
					autoplaySpeed: 4000,
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
			
			//main_menu_subMenu();
			ajax_search_agenda();
		});
		
	})( jQuery, document , window );

}));
