!function(e){"function"==typeof define&&define.amd?define(e):e()}((function(){"use strict";!function(e,t,n){var i,o,a,c=t.querySelector(".menu-toggle"),l=t.getElementById("site-navigation"),s=(t.querySelector("#site-navigation.open"),t.getElementById("content")),r=t.getElementById("colophon"),d=t.querySelector("#panm-search a"),u=t.getElementById("searchform"),f=t.getElementById("close-searchform"),g=(t.querySelector(".archive"),t.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe"));function m(){i=t.documentElement,o=t.getElementsByTagName("body")[0],a=n.innerWidth||i.clientWidth||o.clientWidth,n.innerHeight||i.clientHeight||o.clientHeight,a>1024&&(l.classList.remove("open"),s.classList.remove("abracadabra-fixed"),r.classList.remove("abracadabra-fixed"))}c.addEventListener("click",(function(e){e.preventDefault(),l.classList.toggle("open"),s.classList.toggle("abracadabra-fixed"),r.classList.toggle("abracadabra-fixed"),t.querySelector("#site-navigation.open")})),d.addEventListener("click",(function(e){u.classList.toggle("active")})),f.addEventListener("click",(function(e){u.classList.remove("active")})),n.addEventListener("resize",(function(e){m()})),e(document).ready((function(){e(window).on("scroll",(function(t){e(this).scrollTop()>147?e("#text-introduction-panm360").addClass("moved"):e("#text-introduction-panm360").removeClass("moved")})),e(".filtres-content-tabs").on("click"," li a",(function(t){var n=e(this).data("content"),i=e(n).children("p");console.log(i),e(i).is(":visible")?i.hide():(e(".filtres-content li p").hide(),i.show())})),m(),lozad(".lozad",{rootMargin:"10px 0px",threshold:0,loaded:function(e){e.classList.add("img-loaded")}}).observe(),e(".gfield_checkbox").on("click","label",(function(t){e(this).parent().toggleClass("selected")})),null!=g&&g.setAttribute("width","100%")}))}(jQuery,document,window)}));