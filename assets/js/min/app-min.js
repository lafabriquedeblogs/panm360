(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
}(function () { 'use strict';

	(function ($, d, w) {
	  "use-strict";

	  var menu_toggle = d.querySelector(".menu-toggle");
	  var menu_mobile = d.getElementById("site-navigation");
	  var menu_mobile_open = d.querySelector("#site-navigation.open");
	  var content = d.getElementById("content");
	  var colophon = d.getElementById("colophon");
	  var loupe_search = d.querySelector("#panm-search a");
	  var search_div = d.getElementById("searchform");
	  var close_searchform = d.getElementById("close-searchform");
	  var e, g, x, y;

	  var _to_menu;

	  var triangle = d.getElementById("triangle");
	  var triangle_x = -20;
	  var active_archive_menu;
	  var mouse_noving_on_header = false;
	  var archive_is_defined = d.querySelector(".archive");

	  function toggle_menu() {
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

	    if (x > 980) {
	      menu_mobile.classList.remove("open");
	      content.classList.remove("abracadabra-fixed");
	      colophon.classList.remove("abracadabra-fixed");
	    }

	    move_triangle_subnav_offset_x(active_archive_menu);
	  }

	  function go_to_slide_menu(id) {
	    $("#sub-nav-desktop").slick("slickGoTo", id - 1, false);
	  }

	  function move_triangle_subnav_offset_x(el) {
	    if (!x < 980 && !mouse_noving_on_header && !archive_is_defined) return;
	    var _x = el.offset().left;

	    var _ow = el.outerWidth(true) / 2;

	    triangle_x = _x + _ow;
	    jQuery(triangle).css("left", triangle_x + "px");
	  }
	  /*
	  	----------------------------------------------------------------------------------------------------
	  */


	  menu_toggle.addEventListener('click', function (event) {
	    event.preventDefault(); //menu_is_open = true;

	    toggle_menu();
	  });
	  loupe_search.addEventListener('click', function (event) {
	    search_div.classList.toggle('active');
	  });
	  close_searchform.addEventListener('click', function (event) {
	    search_div.classList.remove('active');
	  });
	  w.addEventListener('resize', function (event) {
	    reportWindowSize();
	  });
	  /*
	  	----------------------------------------------------------------------------------------------------
	  */

	  $(document).ready(function () {
	    active_archive_menu = $("body.archive #main-menu-desktop .current-menu-ancestor a");
	    var active_archive_menu_index = $("body.archive #main-menu-desktop .current-menu-ancestor").index();
	    $("#sub-nav-desktop").slick({
	      arrows: false,
	      vertical: true,
	      speed: 200
	    });
	    $("#main-menu-desktop > li > a").each(function (i) {
	      var _index = $(this).parent().index();

	      if (_index == 0) return;
	      $(this).on("click mouseover", function (e) {
	        e.preventDefault();
	        clearTimeout(_to_menu);
	        $("#sub-nav-desktop").addClass("active");
	        go_to_slide_menu(_index);
	      });
	    });
	    $("#masthead").on("mouseleave", function (e) {
	      clearTimeout(_to_menu);

	      if (active_archive_menu_index > 0) {
	        go_to_slide_menu(active_archive_menu_index);
	        move_triangle_subnav_offset_x(active_archive_menu);
	        return;
	      }

	      _to_menu = setTimeout(function () {
	        $("#sub-nav-desktop").removeClass("active");
	        $(triangle).css("left", "-20px");
	      }, 100);
	    });
	    $("#main-menu-desktop a").on("mousemove", function (e) {
	      var _ok = $(e.target).parent().index();

	      mouse_noving_on_header = true;
	      if (_ok <= 0) return;
	      move_triangle_subnav_offset_x($(e.target));
	    });
	    reportWindowSize();
	    go_to_slide_menu(active_archive_menu_index);
	    move_triangle_subnav_offset_x(active_archive_menu);
	  });
	})(jQuery, document, window);

}));
