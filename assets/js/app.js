!function(e){"function"==typeof define&&define.amd?define(e):e()}((function(){"use strict";!function(e,t,n){var i,a,s,r,o,c=t.querySelector(".menu-toggle"),l=t.getElementById("site-navigation"),d=(t.querySelector("#site-navigation.open"),t.getElementById("content")),u=t.getElementById("colophon"),v=t.querySelector("#panm-search a"),f=t.getElementById("searchform"),m=t.getElementById("close-searchform"),g=t.getElementById("triangle"),p=-20,h=!1,k=t.querySelector(".archive"),y=t.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe");function b(){i=t.documentElement,a=t.getElementsByTagName("body")[0],s=n.innerWidth||i.clientWidth||a.clientWidth,n.innerHeight||i.clientHeight||a.clientHeight,s>980&&(l.classList.remove("open"),d.classList.remove("abracadabra-fixed"),u.classList.remove("abracadabra-fixed")),x(o)}function w(t){e("#sub-nav-desktop").slick("slickGoTo",t-1,!1)}function x(e){if(!(!s<980)||h||k){var t=e.offset().left,n=e.outerWidth(!0)/2;p=t+n,jQuery(g).css("left",p+"px")}}c.addEventListener("click",(function(e){e.preventDefault(),l.classList.toggle("open"),d.classList.toggle("abracadabra-fixed"),u.classList.toggle("abracadabra-fixed"),t.querySelector("#site-navigation.open")})),v.addEventListener("click",(function(e){f.classList.toggle("active")})),m.addEventListener("click",(function(e){f.classList.remove("active")})),n.addEventListener("resize",(function(e){b()})),e(document).ready((function(){o=e("body.archive #main-menu-desktop .current-menu-ancestor a");var t=e("body.archive #main-menu-desktop .current-menu-ancestor").index();e("#sub-nav-desktop").slick({arrows:!1,vertical:!0,speed:200}),e("#new-featured-slider").length>0&&e("#new-featured-slider").slick({prevArrow:'<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',nextArrow:'<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>'}),e("#main-menu-desktop > li > a").each((function(t){var n=e(this).parent().index();0!=n&&e(this).on("click mouseover",(function(t){t.preventDefault(),clearTimeout(r),e("#sub-nav-desktop").addClass("active"),w(n)}))})),e("#masthead").on("mouseleave",(function(n){if(clearTimeout(r),t>0)return w(t),void x(o);r=setTimeout((function(){e("#sub-nav-desktop").removeClass("active"),e(g).css("left","-20px")}),100)})),e("#main-menu-desktop a").on("mousemove",(function(t){var n=e(t.target).parent().index();h=!0,n<=0||x(e(t.target))})),b(),w(t),x(o),null!=y&&y.setAttribute("width","100%")}))}(jQuery,document,window)}));