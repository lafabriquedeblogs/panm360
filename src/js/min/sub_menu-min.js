!function(e,n){"object"==typeof exports&&"undefined"!=typeof module?n(exports):"function"==typeof define&&define.amd?define(["exports"],n):n((e=e||self)._sub_menu_min={})}(this,(function(e){"use strict";e.main_menu_subMenu=function(){alert("yeah");var e=d.getElementById("triangle");function n(e){jQuery("#sub-nav-desktop").slick("slickGoTo",e-1,!1)}jQuery(document).ready((function(){active_archive_menu=jQuery("body.archive #main-menu-desktop .current-menu-ancestor a");var t=jQuery("body.archive #main-menu-desktop .current-menu-ancestor").index();jQuery("#sub-nav-desktop").slick({arrows:!1,vertical:!0,speed:200}),jQuery("#main-menu-desktop > li > a").each((function(e){var t=jQuery(this).parent().index();0!=t&&jQuery(this).on("mouseover",(function(e){clearTimeout(_to_menu),jQuery("#sub-nav-desktop").addClass("active"),n(t)}))})),jQuery("#masthead").on("mouseleave",(function(u){if(clearTimeout(_to_menu),t>0)return n(t),void move_triangle_subnav_offset_x(active_archive_menu);_to_menu=setTimeout((function(){jQuery("#sub-nav-desktop").removeClass("active"),jQuery(e).css("left","-20px")}),100)})),jQuery("#main-menu-desktop a").on("mousemove",(function(e){var n=jQuery(e.target).parent().index();mouse_noving_on_header=!0,n<=0||move_triangle_subnav_offset_x(jQuery(e.target))})),n(t),move_triangle_subnav_offset_x(active_archive_menu)}))},Object.defineProperty(e,"__esModule",{value:!0})}));