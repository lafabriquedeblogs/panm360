import datepicker from 'js-datepicker';
export default function ajax_search_agenda(){

	let step = 24;
	let more = 0;
	let stepin;
	let items;
	let items_remaining;
	//let pages_number;
	
	let year, month, genre, nonce;
	let count;//jQuery("#agenda-count").val();
	
	//let fade_results = false;
	
	let agenda_full = false;
	
	let agenda_start_date;
	let agenda_end_date;
	let daterange = false;
	
	let agenda_mini = false;
	
	function ajex_content(){
		
		jQuery(".loader-filtre-genre").css("display","block").css("opacity","1");
		
		jQuery.ajax({
			type : "post",
			dataType : "json",
			url : agendAjax.ajaxurl,
			data : {
				action: "display_agenda",
				year : year,
				agenda_start_date: agenda_start_date,
				agenda_end_date: agenda_end_date,
				daterange : daterange,
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
						jQuery(".loader-filtre-genre").css("display","none").css("opacity","0");
						return false;	
					}
					
					jQuery("#agenda_mini").html(response.events);
				}
				
				jQuery(".loader-filtre-genre").css("display","none").css("opacity","0");

			},
			complete: function(response){
				//console.log(response);
			}
		});		
	}


	jQuery("#agenda-filtres-date").on("submit",function(e){
		e.preventDefault();
		
    	if ( jQuery(".start").val() == '' ||  jQuery(".end").val() == '' ){
	    	jQuery("#date_search_message").css("display","block");
	    	return false;	
    	}

		jQuery("#date_search_message").css("display","none");
		jQuery(".loader-filtre-genre").css("display","block").css("opacity","1");
		
		agenda_full = true;
		//fade_results = true;
		agenda_mini = false;
		daterange = true;
		nonce = jQuery("#agenda-nonce").val(); 
		genre = jQuery("#agenda-genre").val();
		count = jQuery("#agenda-count").val();
		var re = /-/gi;
		agenda_start_date = jQuery("#agenda-start").attr("data-date").replace(re, "/");
		agenda_end_date = jQuery("#agenda-end").attr("data-date").replace(re, "/");

		ajex_content();
	});

	jQuery("#choix-style-musical select").on("change",function(e){
		e.preventDefault();
		agenda_full = false;
		//fade_results = false;
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
			lazyLoad: 'ondemand',
			prevArrow: '<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',
			nextArrow: '<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>'
		});
	}
	
	load_more_items();
	
	let filtre_agenda = document.getElementById('agenda-filtres-section');
		//console.log(filtre_agenda);
	
	if( filtre_agenda !== null ){
		const local = (agendAjax.current_language == 'fr') ? 'fr-FR' : 'en-EN';
		const local_m = (agendAjax.current_language == 'fr') ? 'fr' : 'en';
		
		const months = {
			fr : ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jui', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Déc'],
			en : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		};
		const days = {
			fr : ['D','L', 'M', 'M', 'J', 'V', 'S'],
			en : ['S', 'M', 'T', 'W', 'Th', 'F', 'S']
		};				
		const dates_options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
		const start = datepicker('.start', {
		
			// Event callbacks.
			onSelect: instance => {
				// Show which date was selected.
				//console.log(instance.dateSelected)
			},
			onShow: instance => {
				//console.log('Calendar showing.')
			},
			onHide: instance => {
				//console.log('Calendar hidden.')
			},
			onMonthChange: instance => {
				// Show the month of the selected date.
				//console.log(instance.currentMonthName)
			},
			
			// Customizations.
			formatter: (input, date, instance) => {
				// This will display the date as `1/1/2019`.
				input.value = date.toLocaleDateString(local, dates_options);
				jQuery(input).attr("data-date",date.toISOString().split('T')[0]);
			},
			startDay: 1, // Calendar week starts on a Monday.
			customDays: days[local_m],
			customMonths: months[local_m],
			id: 1		
		});
		const end = datepicker('.end', {
				formatter: (input, date, instance) => {
					// This will display the date as `1/1/2019`.
					//input.value = date.toISOString().split('T')[0];
					input.value = date.toLocaleDateString(local, dates_options);
					jQuery(input).attr("data-date",date.toISOString().split('T')[0]);
			  },		
			startDay: 1, // Calendar week starts on a Monday.
			customDays: days[local_m],
			customMonths: months[local_m],
			id: 1 
		});
	}
}