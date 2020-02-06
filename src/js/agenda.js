export default function ajax_search_agenda(){
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
	
	jQuery("#choix-style-musical").on("change",function(e){
		e.preventDefault();
		let year = jQuery("#agenda-year").val();
		let month = jQuery("#agenda-month").val(); 
		let genre = jQuery("#agenda-genre").val();
		let nonce = jQuery("#agenda-nonce").val(); 
		
	});
}