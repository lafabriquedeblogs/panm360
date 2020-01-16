export default function main_menu_subMenu(){

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