!function(e){"function"==typeof define&&define.amd?define(e):e()}((function(){"use strict";var t,n=function(e,t){return e(t={exports:{}},t.exports),t.exports}((function(e,t){window,e.exports=function(e){var t={};function n(a){if(t[a])return t[a].exports;var r=t[a]={i:a,l:!1,exports:{}};return e[a].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=e,n.c=t,n.d=function(e,t,a){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(a,r,function(t){return e[t]}.bind(null,r));return a},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){e.exports=n(1)},function(e,t,n){function a(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e)){var n=[],a=!0,r=!1,i=void 0;try{for(var s,o=e[Symbol.iterator]();!(a=(s=o.next()).done)&&(n.push(s.value),!t||n.length!==t);a=!0);}catch(e){r=!0,i=e}finally{try{a||null==o.return||o.return()}finally{if(r)throw i}}return n}}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}n(2);var r=[],i=["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],s=["January","February","March","April","May","June","July","August","September","October","November","December"],o={t:"top",r:"right",b:"bottom",l:"left",c:"centered"},c=function(){},l=["click","focusin","keydown","input"];function d(e){return Array.isArray(e)?e.map(d):"[object Object]"==={}.toString.call(e)?Object.keys(e).reduce((function(t,n){return t[n]=d(e[n]),t}),{}):e}function u(e,t){var n=e.calendar.querySelector(".qs-overlay"),a=n&&!n.classList.contains("qs-hidden");t=t||new Date(e.currentYear,e.currentMonth),e.calendar.innerHTML=[f(t,e,a),h(t,e,a),v(e,a)].join(""),a&&setTimeout((function(){return j(!0,e)}),10)}function f(e,t,n){return'\n    <div class="qs-controls '.concat(n?"qs-blur":"",'">\n      <div class="qs-arrow qs-left"></div>\n      <div class="qs-month-year">\n        <span class="qs-month">').concat(t.months[e.getMonth()],'</span>\n        <span class="qs-year">').concat(e.getFullYear(),'</span>\n      </div>\n      <div class="qs-arrow qs-right"></div>\n    </div>\n  ')}function h(e,t,n){var a=t.currentMonth,r=t.currentYear,i=t.dateSelected,s=t.maxDate,o=t.minDate,c=t.showAllDates,l=t.days,d=t.disabledDates,u=t.disabler,f=t.noWeekends,h=t.startDay,v=t.weekendIndices,m=t.events,y=t.getRange&&t.getRange()||{},p=+y.start,g=+y.end,b=new Date,D=r===b.getFullYear()&&a===b.getMonth(),q=w(new Date(e).setDate(1)),S=q.getDay()-h,j=S<0?7:0;q.setMonth(q.getMonth()+1),q.setDate(0);var M=q.getDate(),k=[],x=j+7*((S+M)/7|0);x+=(S+M)%7?7:0,0!==h&&0===S&&(x+=7);for(var Q=1;Q<=x;Q++){var L=(Q-1)%7,C=l[L],O=Q-(S>=0?S:7+S),A=new Date(r,a,O),E=m[+A],_=A.getDate(),P=O<1||O>M,I="",Y='<span class="qs-num">'.concat(_,"</span>"),N=p&&g&&+A>=p&&+A<=g;P?(I="qs-empty qs-outside-current-month",c?(E&&(I+=" qs-event"),I+=" qs-disabled"):Y=""):((o&&A<o||s&&A>s||u(A)||d.includes(+A)||f&&v.includes(L))&&(I="qs-disabled"),E&&(I+=" qs-event"),D&&O===b.getDate()&&(I+=" qs-current"),+A==+i&&(I+=" qs-active"),N&&(I+=" qs-range-date-".concat(L),p!==g&&(I+=+A===p?" qs-range-date-start qs-active":+A===g?" qs-range-date-end qs-active":" qs-range-date-middle"))),k.push('<div class="qs-square qs-num '.concat(C," ").concat(I,'">').concat(Y,"</div>"))}var T=l.map((function(e){return'<div class="qs-square qs-day">'.concat(e,"</div>")})).concat(k);if(T.length%7!=0)throw"Calendar not constructed properly. The # of squares should be a multiple of 7.";return T.unshift('<div class="qs-squares '.concat(n?"qs-blur":"",'">')),T.push("</div>"),T.join("")}function v(e,t){var n=e.overlayPlaceholder,a=e.overlayButton,r=e.overlayMonths.map((function(e,t){return'\n      <div class="qs-overlay-month" data-month-num="'.concat(t,'">\n        <span data-month-num="').concat(t,'">').concat(e,"</span>\n      </div>\n  ")})).join("");return'\n    <div class="qs-overlay '.concat(t?"":"qs-hidden",'">\n      <div>\n        <input class="qs-overlay-year" placeholder="').concat(n,'" />\n        <div class="qs-close">&#10005;</div>\n      </div>\n      <div class="qs-overlay-month-container">').concat(r,'</div>\n      <div class="qs-submit qs-disabled">').concat(a,"</div>\n    </div>\n  ")}function m(e,t,n){var a=t.currentMonth,r=t.currentYear,i=t.calendar,s=t.el,o=t.onSelect,c=t.respectDisabledReadOnly,l=t.sibling,d=i.querySelector(".qs-active"),f=e.textContent;(s.disabled||s.readOnly)&&c||(t.dateSelected=n?void 0:new Date(r,a,f),d&&d.classList.remove("qs-active"),n||e.classList.add("qs-active"),p(s,t,n),!n&&q(t),l&&(y({instance:t,deselect:n}),u(t),u(l)),o(t,n?void 0:new Date(t.dateSelected)))}function y(e){var t=e.instance,n=e.deselect,a=t.first?t:t.sibling,r=a.sibling;a===t?n?(a.minDate=a.originalMinDate,r.minDate=r.originalMinDate):r.minDate=a.dateSelected:n?(r.maxDate=r.originalMaxDate,a.maxDate=a.originalMaxDate):a.maxDate=r.dateSelected}function p(e,t,n){if(!t.nonInput)return n?e.value="":t.formatter!==c?t.formatter(e,t.dateSelected,t):void(e.value=t.dateSelected.toDateString())}function g(e,t,n,a){n||a?(n&&(t.currentYear=n),a&&(t.currentMonth=+a)):(t.currentMonth+=e.contains("qs-right")?1:-1,12===t.currentMonth?(t.currentMonth=0,t.currentYear++):-1===t.currentMonth&&(t.currentMonth=11,t.currentYear--)),t.currentMonthName=t.months[t.currentMonth],u(t),t.onMonthChange(t)}function b(e){if(!e.noPosition){var t=e.el,n=e.calendarContainer,r=e.position,i=e.parent,s=r.top,o=r.right;if(r.centered)return n.classList.add("qs-centered");var c=a([i,t,n].map((function(e){return e.getBoundingClientRect()})),3),l=c[0],d=c[1],u=c[2],f=d.top-l.top+i.scrollTop,h="".concat(f-(s?u.height:-1*d.height),"px"),v="".concat(d.left-l.left+(o?d.width-u.width:0),"px");n.style.setProperty("top",h),n.style.setProperty("left",v)}}function D(e){return"[object Date]"==={}.toString.call(e)&&"Invalid Date"!==e.toString()}function w(e){if(D(e)||"number"==typeof e&&!isNaN(e)){var t=new Date(+e);return new Date(t.getFullYear(),t.getMonth(),t.getDate())}}function q(e){e.disabled||!e.calendarContainer.classList.contains("qs-hidden")&&!e.alwaysShow&&(j(!0,e),e.calendarContainer.classList.add("qs-hidden"),e.onHide(e))}function S(e){e.disabled||(e.calendarContainer.classList.remove("qs-hidden"),b(e),e.onShow(e))}function j(e,t){var n=t.calendar;if(n){var a=n.querySelector(".qs-overlay"),r=a.querySelector(".qs-overlay-year"),i=n.querySelector(".qs-controls"),s=n.querySelector(".qs-squares");e?(a.classList.add("qs-hidden"),i.classList.remove("qs-blur"),s.classList.remove("qs-blur"),r.value=""):(a.classList.remove("qs-hidden"),i.classList.add("qs-blur"),s.classList.add("qs-blur"),r.focus())}}function M(e,t,n,a){var r=isNaN(+(new Date).setFullYear(t.value||void 0)),i=r?null:t.value;13===(e.which||e.keyCode)||"click"===e.type?a?g(null,n,i,a):r||t.classList.contains("qs-disabled")||g(null,n,i,a):n.calendar.contains(t)&&n.calendar.querySelector(".qs-submit").classList[r?"add":"remove"]("qs-disabled")}function k(e){var t=e.type,n=e.target,i=n.classList,s=a(r.filter((function(e){var t=e.calendar,a=e.el;return t.contains(n)||a===n})),1)[0],o=s&&s.calendar.contains(n);if(!(s&&s.isMobile&&s.disableMobile))if("click"===t){if(!s)return r.forEach(q);if(s.disabled)return;var c=s.calendar,l=s.calendarContainer,d=s.disableYearOverlay,u=s.nonInput,f=c.querySelector(".qs-overlay-year"),h=!!c.querySelector(".qs-hidden"),v=c.querySelector(".qs-month-year").contains(n),y=n.dataset.monthNum;if(s.noPosition&&!o)(l.classList.contains("qs-hidden")?S:q)(s);else if(i.contains("qs-arrow"))g(i,s);else if(v||i.contains("qs-close"))!d&&j(!h,s);else if(y)M(e,f,s,y);else{if(i.contains("qs-num")){var p="SPAN"===n.nodeName?n.parentNode:n,b=["qs-disabled","qs-empty"].some((function(e){return p.classList.contains(e)}));return p.classList.contains("qs-active")?m(p,s,!0):!b&&m(p,s)}i.contains("qs-submit")&&!i.contains("qs-disabled")?M(e,f,s):u&&n===s.el&&S(s)}}else if("focusin"===t&&s)S(s),r.forEach((function(e){return e!==s&&q(e)}));else if("keydown"===t&&s&&!s.disabled){var D=!s.calendar.querySelector(".qs-overlay").classList.contains("qs-hidden");13===(e.which||e.keyCode)&&D&&o?M(e,n,s):27===(e.which||e.keyCode)&&D&&o&&j(!0,s)}else if("input"===t){if(!s||!s.calendar.contains(n))return;var w=s.calendar.querySelector(".qs-submit"),k=n.value.split("").reduce((function(e,t){return e||"0"!==t?e+(t.match(/[0-9]/)?t:""):""}),"").slice(0,4);n.value=k,w.classList[4===k.length?"remove":"add"]("qs-disabled")}}function x(){S(this)}function Q(){q(this)}function L(e,t){var n=w(e),a=this.currentYear,r=this.currentMonth,i=this.sibling;if(null==e)return this.dateSelected=void 0,p(this.el,this,!0),i&&(y({instance:this,deselect:!0}),u(i)),u(this),this;if(!D(e))throw"`setDate` needs a JavaScript Date object.";if(this.disabledDates.some((function(e){return+e==+n}))||n<this.minDate||n>this.maxDate)throw"You can't manually set a date that's disabled.";return this.currentYear=n.getFullYear(),this.currentMonth=n.getMonth(),this.currentMonthName=this.months[n.getMonth()],this.dateSelected=n,p(this.el,this),i&&(y({instance:this}),u(i,n)),(a===n.getFullYear()&&r===n.getMonth()||t||i)&&u(this,n),this}function C(e){return A(this,e,!0)}function O(e){return A(this,e)}function A(e,t,n){var a=e.dateSelected,r=e.first,i=e.sibling,s=e.minDate,o=e.maxDate,c=w(t),l=n?"Min":"Max",d=function(){return"original".concat(l,"Date")},f=function(){return"".concat(l.toLowerCase(),"Date")},h=function(){return"set".concat(l)},v=function(){throw"Out-of-range date passed to ".concat(h())};if(null==t)e[d()]=void 0,i?(i[d()]=void 0,n?(r&&!a||!r&&!i.dateSelected)&&(e.minDate=void 0,i.minDate=void 0):(r&&!i.dateSelected||!r&&!a)&&(e.maxDate=void 0,i.maxDate=void 0)):e[f()]=void 0;else{if(!D(t))throw"Invalid date passed to ".concat(h());i?((r&&n&&c>(a||o)||r&&!n&&c<(i.dateSelected||s)||!r&&n&&c>(i.dateSelected||o)||!r&&!n&&c<(a||s))&&v(),e[d()]=c,i[d()]=c,(n&&(r&&!a||!r&&!i.dateSelected)||!n&&(r&&!i.dateSelected||!r&&!a))&&(e[f()]=c,i[f()]=c)):((n&&c>(a||o)||!n&&c<(a||s))&&v(),e[f()]=c)}return i&&u(i),u(e),e}function E(){var e=this.first?this:this.sibling,t=e.sibling;return{start:e.dateSelected,end:t.dateSelected}}function _(){var e=this,t=this.inlinePosition,n=this.parent,a=this.calendarContainer,i=this.el,s=this.sibling;for(var o in t&&(r.some((function(t){return t!==e&&t.parent===n}))||n.style.setProperty("position",null)),a.remove(),r=r.filter((function(e){return e.el!==i})),s&&delete s.sibling,this)delete this[o];r.length||l.forEach((function(e){return document.removeEventListener(e,k)}))}e.exports=function(e,t){r.length||l.forEach((function(e){return document.addEventListener(e,k)}));var n=function(e,t){var n=e;"string"==typeof n&&(n="#"===n[0]?document.getElementById(n.slice(1)):document.querySelector(n));var l=function(e,t){if(r.some((function(e){return e.el===t})))throw"A datepicker already exists on that element.";var n=d(e);n.events&&(n.events=n.events.reduce((function(e,t){if(!D(t))throw'"options.events" must only contain valid JavaScript Date objects.';return e[+w(t)]=!0,e}),{})),["startDate","dateSelected","minDate","maxDate"].forEach((function(e){var t=n[e];if(t&&!D(t))throw'"options.'.concat(e,'" needs to be a valid JavaScript Date object.');n[e]=w(t)}));var s=n.position,l=n.maxDate,u=n.minDate,f=n.dateSelected,h=n.overlayPlaceholder,v=n.overlayButton,m=n.startDay,y=n.id;if(n.startDate=w(n.startDate||f||new Date),n.disabledDates=(n.disabledDates||[]).map((function(e){var t=+w(e);if(!D(e))throw'You supplied an invalid date to "options.disabledDates".';if(t===+w(f))throw'"disabledDates" cannot contain the same date as "dateSelected".';return t})),n.hasOwnProperty("id")&&null==y)throw"Id cannot be `null` or `undefined`";if(y||0===y){var p=r.filter((function(e){return e.id===y}));if(p.length>1)throw"Only two datepickers can share an id.";p.length?(n.second=!0,n.sibling=p[0]):n.first=!0}var g=["tr","tl","br","bl","c"].some((function(e){return s===e}));if(s&&!g)throw'"options.position" must be one of the following: tl, tr, bl, br, or c.';if(n.position=function(e){var t=a(e,2),n=t[0],r=t[1],i={};return i[o[n]]=1,r&&(i[o[r]]=1),i}(s||"bl"),l<u)throw'"maxDate" in options is less than "minDate".';if(f){var b=function(e){throw'"dateSelected" in options is '.concat(e?"less":"greater",' than "').concat(e||"mac",'Date".')};u>f&&b("min"),l<f&&b()}if(["onSelect","onShow","onHide","onMonthChange","formatter","disabler"].forEach((function(e){"function"!=typeof n[e]&&(n[e]=c)})),["customDays","customMonths","customOverlayMonths"].forEach((function(e,t){var a=n[e],r=t?12:7;if(a){if(!Array.isArray(a)||a.length!==r||a.some((function(e){return"string"!=typeof e})))throw'"'.concat(e,'" must be an array with ').concat(r," strings.");n[t?t<2?"months":"overlayMonths":"days"]=a}})),m&&m>0&&m<7){var q=(n.customDays||i).slice(),S=q.splice(0,m);n.customDays=q.concat(S),n.startDay=+m,n.weekendIndices=[q.length-1,q.length]}else n.startDay=0,n.weekendIndices=[6,0];return"string"!=typeof h&&delete n.overlayPlaceholder,"string"!=typeof v&&delete n.overlayButton,n}(t||{startDate:w(new Date),position:"bl"},n),u=l.startDate,f=l.dateSelected,h=l.sibling,v=n===document.body,m=v?document.body:n.parentElement,y=document.createElement("div"),g=document.createElement("div");y.className="qs-datepicker-container qs-hidden",g.className="qs-datepicker";var b={el:n,parent:m,nonInput:"INPUT"!==n.nodeName,noPosition:v,position:!v&&l.position,startDate:u,dateSelected:f,disabledDates:l.disabledDates,minDate:l.minDate,maxDate:l.maxDate,noWeekends:!!l.noWeekends,weekendIndices:l.weekendIndices,calendarContainer:y,calendar:g,currentMonth:(u||f).getMonth(),currentMonthName:(l.months||s)[(u||f).getMonth()],currentYear:(u||f).getFullYear(),events:l.events||{},setDate:L,remove:_,setMin:C,setMax:O,show:x,hide:Q,onSelect:l.onSelect,onShow:l.onShow,onHide:l.onHide,onMonthChange:l.onMonthChange,formatter:l.formatter,disabler:l.disabler,months:l.months||s,days:l.customDays||i,startDay:l.startDay,overlayMonths:l.overlayMonths||(l.months||s).map((function(e){return e.slice(0,3)})),overlayPlaceholder:l.overlayPlaceholder||"4-digit year",overlayButton:l.overlayButton||"Submit",disableYearOverlay:!!l.disableYearOverlay,disableMobile:!!l.disableMobile,isMobile:"ontouchstart"in window,alwaysShow:!!l.alwaysShow,id:l.id,showAllDates:!!l.showAllDates,respectDisabledReadOnly:!!l.respectDisabledReadOnly,first:l.first,second:l.second};if(h){var q=h,j=b,M=q.minDate||j.minDate,k=q.maxDate||j.maxDate;j.sibling=q,q.sibling=j,q.minDate=M,q.maxDate=k,j.minDate=M,j.maxDate=k,q.originalMinDate=M,q.originalMaxDate=k,j.originalMinDate=M,j.originalMaxDate=k,q.getRange=E,j.getRange=E}f&&p(n,b);var A=getComputedStyle(m).position;return v||A&&"static"!==A||(b.inlinePosition=!0,m.style.setProperty("position","relative")),b.inlinePosition&&r.forEach((function(e){e.parent===b.parent&&(e.inlinePosition=!0)})),r.push(b),y.appendChild(g),m.appendChild(y),b.alwaysShow&&S(b),b}(e,t),f=n.startDate,h=n.dateSelected,v=n.alwaysShow;if(n.second){var m=n.sibling;y({instance:n,deselect:!h}),y({instance:m,deselect:!m.dateSelected}),u(m)}return u(n,f||h),v&&b(n),n}},function(e,t,n){}])})),a=(t=n)&&t.__esModule&&Object.prototype.hasOwnProperty.call(t,"default")?t.default:t;n.datepicker;!function(t,n,r){var i=n.getElementById("main-menu-mobile"),s=(n.querySelector("#main-menu-mobile.open"),n.getElementById("content")),o=(n.getElementById("colophon"),n.querySelector(".bouton-menu-toggle-mobile")),c=n.querySelector("#panm-search a"),l=n.getElementById("searchform"),d=n.getElementById("close-searchform"),u=n.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe");function f(){(r.innerWidth||e.clientWidth||g.clientWidth)>1024&&i.classList.remove("open")}o.addEventListener("click",(function(e){e.preventDefault(),i.classList.toggle("open"),n.querySelector("#site-navigation.open"),s.classList.toggle("collapse")})),c.addEventListener("click",(function(e){l.classList.toggle("active")})),d.addEventListener("click",(function(e){l.classList.remove("active")})),r.addEventListener("resize",(function(e){f()}));var h=!1;window.addEventListener("scroll",(function(e){h||window.requestAnimationFrame((function(){jQuery(".message_cookie").is(":visible")&&jQuery(".message_cookie").fadeOut(200),h=!1})),h=!0})),t(document).ready((function(){t(r).load((function(){t(".at-share-btn-elements").prepend('<a class="a-icon-instagram-link" role="button" href="https://www.instagram.com/panm360/" target="_blank"><svg class="icon-instagram-link"><use xlink:href="#instagram"></use></svg></a>'),addthis.init()})),t("#new-featured-slider").length>0&&t("#new-featured-slider").slick({autoplay:!0,autoplaySpeed:4e3,prevArrow:'<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',nextArrow:'<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>'}),t(".filtres-content-tabs").on("click"," li a",(function(e){var n=t(this).data("content"),a=t(n).children("p");t(a).is(":visible")?a.hide():(t(".filtres-content li p").hide(),a.show())})),t("#menu-panm").on("click",".burger",(function(){t(this).removeClass("active"),t("#menu-panm .cross").addClass("active"),t("#menu-panm .sub-menu").show()})),t("#menu-panm").on("click",".cross",(function(){t(this).removeClass("active"),t("#menu-panm .burger").addClass("active"),t("#menu-panm .sub-menu").hide()})),t(".gfield_checkbox").on("click","label",(function(){t(this).parent().toggleClass("selected")})),t("#type-d-abonne li").on("click","label",(function(){t(this).toggleClass("selected")})),t("#close-window-posts-consultes").on("click",(function(e){e.preventDefault(),t("#window-posts-consultes").fadeOut(200)})),null!=u&&u.setAttribute("width","100%"),function(){var e;function t(e){jQuery("#sub-nav-desktop").slick("slickGoTo",e-1,!1)}function n(){clearTimeout(e),a>0?t(a):e=setTimeout((function(){jQuery("#sub-nav-desktop").removeClass("active")}),100)}var a=jQuery("body.archive #main-menu-desktop .current-menu-ancestor").index();jQuery("#sub-nav-desktop").slick({arrows:!1,vertical:!0,speed:200}),jQuery("#main-menu-desktop > li > a").each((function(){var a=jQuery(this).parent().index();0!=a&&(jQuery(this).parent().hasClass("menu-item-has-children")?jQuery(this).on("mouseover",(function(){clearTimeout(e),jQuery("#sub-nav-desktop").addClass("active"),t(a)})):jQuery(this).on("mouseover",(function(){n()})))})),jQuery("#masthead").on("mouseleave",(function(){n()})),jQuery("#main-menu-desktop a").on("mousemove",(function(e){jQuery(e.target).parent().index()})),t(a)}(),f(),function(){var e,t,n,r,i,s,o,c,l=0,d=!1,u=!1,f=!1;function h(){jQuery(".loader-filtre-genre").css("display","block").css("opacity","1"),jQuery.ajax({type:"post",dataType:"json",url:agendAjax.ajaxurl,data:{action:"display_agenda",year:t,agenda_start_date:o,agenda_end_date:c,daterange:u,month:n,genre:r,count:s,nonce:i,agenda_mini:f},success:function(e){if("success"==e.type){if(d)return jQuery("#agenda").html(e.events),jQuery(".loader-filtre-genre").css("display","none").css("opacity","0"),!1;jQuery("#agenda_mini").html(e.events)}jQuery(".loader-filtre-genre").css("display","none").css("opacity","0")},complete:function(e){}})}function v(){jQuery(".calendrier-ul-container li").css("display","none"),l++,e=24*l,jQuery(".calendrier-ul-container li").slice(0,e).css("display","flex"),void 0-e<0&&jQuery("#bouton-load-more").hide()}if(jQuery("#agenda-filtres-date").on("submit",(function(e){if(e.preventDefault(),""==jQuery(".start").val()||""==jQuery(".end").val())return jQuery("#date_search_message").css("display","block"),!1;jQuery("#date_search_message").css("display","none"),jQuery(".loader-filtre-genre").css("display","block").css("opacity","1"),d=!0,f=!1,u=!0,i=jQuery("#agenda-nonce").val(),r=jQuery("#agenda-genre").val(),s=jQuery("#agenda-count").val();var t=/-/gi;o=jQuery("#agenda-start").attr("data-date").replace(t,"/"),c=jQuery("#agenda-end").attr("data-date").replace(t,"/"),h()})),jQuery("#choix-style-musical select").on("change",(function(e){e.preventDefault(),d=!1,f=!0,o=jQuery("#agenda-start").val(),t=jQuery("#agenda-year").val(),n=jQuery("#agenda-month").val(),r=jQuery("#agenda-genre").val(),i=jQuery("#agenda-nonce").val(),s=jQuery("#agenda-count").val(),h()})),jQuery("#bouton-load-more").on("click",(function(e){e.preventDefault(),v()})),jQuery("#square-featured-slider").length>0&&jQuery("#square-featured-slider").slick({autoplay:!0,autoplaySpeed:4e3,adaptiveHeight:!0,lazyLoad:"ondemand",prevArrow:'<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',nextArrow:'<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>'}),v(),null!==document.getElementById("agenda-filtres-section")){var m="fr"==agendAjax.current_language?"fr-FR":"en-EN",y="fr"==agendAjax.current_language?"fr":"en",p={fr:["Jan","Fév","Mar","Avr","Mai","Jui","Juil","Aou","Sep","Oct","Nov","Déc"],en:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]},g={fr:["D","L","M","M","J","V","S"],en:["S","M","T","W","Th","F","S"]},b={weekday:"long",year:"numeric",month:"long",day:"numeric"};a(".start",{onSelect:function(e){},onShow:function(e){},onHide:function(e){},onMonthChange:function(e){},formatter:function(e,t,n){e.value=t.toLocaleDateString(m,b),jQuery(e).attr("data-date",t.toISOString().split("T")[0])},startDay:1,customDays:g[y],customMonths:p[y],id:1}),a(".end",{formatter:function(e,t,n){e.value=t.toLocaleDateString(m,b),jQuery(e).attr("data-date",t.toISOString().split("T")[0])},startDay:1,customDays:g[y],customMonths:p[y],id:1})}}()}))}(jQuery,document,window)}));