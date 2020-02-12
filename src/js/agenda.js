export default function ajax_search_agenda(){

	let step = 24;
	let more = 0;
	let stepin;
	let items;
	let items_remaining;
	let pages_number;
	
	let year, month, genre, nonce;
	let count;//jQuery("#agenda-count").val();
	
	let fade_results = false;
	
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
		fade_results = true;
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
		fade_results = false;
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
	
	if( jQuery("#square-featured-slider").length > 0 ){
		jQuery("#square-featured-slider").slick({
			autoplay: true,
			autoplaySpeed: 4000,
			adaptiveHeight: true,
			prevArrow: '<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',
			nextArrow: '<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>',
		});
	}
		
	load_more_items();	
	
}