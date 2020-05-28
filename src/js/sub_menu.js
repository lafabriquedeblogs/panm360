export default function main_menu_subMenu(){

	let _to_menu;
	//let active_archive_menu;
	//let mouse_moving_on_header = false;
	//let g, x, y;
	//let archive_is_defined = document.querySelector(".archive");
		
	function go_to_slide_menu( id ){
		jQuery("#sub-nav-desktop").slick("slickGoTo", id - 1 ,false);
	}

	function mouse_leave_menu_item(){
			
			clearTimeout(_to_menu);
					
			if ( active_archive_menu_index > 0 ){
				go_to_slide_menu( active_archive_menu_index );
				return;	
			}
		
			_to_menu = setTimeout(function(){
				//jQuery("#sub-nav-desktop").removeClass("active");
				go_to_slide_menu( 1 );
			}, 100);		
	
	}
	//jQuery(document).ready(function(){
		
		//active_archive_menu = jQuery("body.archive #main-menu-desktop .current-menu-ancestor a");
		var active_archive_menu_index = jQuery("body.archive #main-menu-desktop .current-menu-ancestor").index();
		 		
		jQuery("#sub-nav-desktop").slick({
			arrows:false,
			vertical: true,
			speed: 200
		});
		
		
		
		jQuery("#main-menu-desktop > li > a").each( function(){
			
			//return;
			
			let _index = jQuery(this).parent().index();
			
			
			
			if( _index == 0) return;
			
			if( jQuery(this).parent().hasClass("menu-item-has-children") ){
				
				jQuery(this).on("mouseover", function(){
					
					/*
					 *	temporaire tant que ecouter n'a pas de sous menu
					*/
					if( _index == 3) _index = 2;
					/*
					 *	------------------------------------------------
					*/
					
					clearTimeout(_to_menu);
					jQuery("#sub-nav-desktop").addClass("active");
					go_to_slide_menu( _index );
				});				
			} else {
				jQuery(this).on("mouseover", function(){
					mouse_leave_menu_item();
				});
				
			}

		});
				
		jQuery("#masthead").on("mouseleave", function(){		
			mouse_leave_menu_item();
		});
		

		jQuery("#main-menu-desktop a").on("mousemove",function(e){
			let _ok = jQuery(e.target).parent().index();
			//mouse_moving_on_header = true;
			
			if( _ok <= 0 ) return;
		});	
		
		

		go_to_slide_menu( active_archive_menu_index );

		
	//});
}