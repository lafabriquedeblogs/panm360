(function (factory) {
	typeof define === 'function' && define.amd ? define(factory) :
	factory();
}(function () { 'use strict';

	function unwrapExports (x) {
		return x && x.__esModule && Object.prototype.hasOwnProperty.call(x, 'default') ? x['default'] : x;
	}

	function createCommonjsModule(fn, module) {
		return module = { exports: {} }, fn(module, module.exports), module.exports;
	}

	var datepicker_min = createCommonjsModule(function (module, exports) {
	!function(e,t){module.exports=t();}(window,(function(){return function(e){var t={};function n(a){if(t[a])return t[a].exports;var r=t[a]={i:a,l:!1,exports:{}};return e[a].call(r.exports,r,r.exports,n),r.l=!0,r.exports}return n.m=e,n.c=t,n.d=function(e,t,a){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a});},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0});},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(a,r,function(t){return e[t]}.bind(null,r));return a},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){e.exports=n(1);},function(e,t,n){function a(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if(!(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e)))return;var n=[],a=!0,r=!1,i=void 0;try{for(var o,s=e[Symbol.iterator]();!(a=(o=s.next()).done)&&(n.push(o.value),!t||n.length!==t);a=!0);}catch(e){r=!0,i=e;}finally{try{a||null==s.return||s.return();}finally{if(r)throw i}}return n}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}()}n(2);var r=[],i=["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],o=["January","February","March","April","May","June","July","August","September","October","November","December"],s={t:"top",r:"right",b:"bottom",l:"left",c:"centered"},c=function(){},l=["click","focusin","keydown","input"];function d(e){return Array.isArray(e)?e.map(d):"[object Object]"==={}.toString.call(e)?Object.keys(e).reduce((function(t,n){return t[n]=d(e[n]),t}),{}):e}function u(e,t){var n=e.calendar.querySelector(".qs-overlay"),a=n&&!n.classList.contains("qs-hidden");t=t||new Date(e.currentYear,e.currentMonth),e.calendar.innerHTML=[h(t,e,a),f(t,e,a),v(e,a)].join(""),a&&setTimeout((function(){return M(!0,e)}),10);}function h(e,t,n){return '\n    <div class="qs-controls '.concat(n?"qs-blur":"",'">\n      <div class="qs-arrow qs-left"></div>\n      <div class="qs-month-year">\n        <span class="qs-month">').concat(t.months[e.getMonth()],'</span>\n        <span class="qs-year">').concat(e.getFullYear(),'</span>\n      </div>\n      <div class="qs-arrow qs-right"></div>\n    </div>\n  ')}function f(e,t,n){var a=t.currentMonth,r=t.currentYear,i=t.dateSelected,o=t.maxDate,s=t.minDate,c=t.showAllDates,l=t.days,d=t.disabledDates,u=t.disabler,h=t.noWeekends,f=t.startDay,v=t.weekendIndices,m=t.events,y=t.getRange&&t.getRange()||{},p=+y.start,b=+y.end,D=new Date,g=r===D.getFullYear()&&a===D.getMonth(),w=q(new Date(e).setDate(1)),S=w.getDay()-f,M=S<0?7:0;w.setMonth(w.getMonth()+1),w.setDate(0);var x=w.getDate(),L=[],P=M+7*((S+x)/7|0);P+=(S+x)%7?7:0,0!==f&&0===S&&(P+=7);for(var j=1;j<=P;j++){var k=(j-1)%7,O=l[k],C=j-(S>=0?S:7+S),Y=new Date(r,a,C),N=m[+Y],E=Y.getDate(),A=C<1||C>x,I="",T='<span class="qs-num">'.concat(E,"</span>"),F=p&&b&&+Y>=p&&+Y<=b;A?(I="qs-empty qs-outside-current-month",c?(N&&(I+=" qs-event"),I+=" qs-disabled"):T=""):((s&&Y<s||o&&Y>o||u(Y)||d.includes(+Y)||h&&v.includes(k))&&(I="qs-disabled"),N&&(I+=" qs-event"),g&&C===D.getDate()&&(I+=" qs-current"),+Y==+i&&(I+=" qs-active"),F&&(I+=" qs-range-date-".concat(k),p!==b&&(I+=+Y===p?" qs-range-date-start qs-active":+Y===b?" qs-range-date-end qs-active":" qs-range-date-middle"))),L.push('<div class="qs-square qs-num '.concat(O," ").concat(I,'">').concat(T,"</div>"));}var R=l.map((function(e){return '<div class="qs-square qs-day">'.concat(e,"</div>")})).concat(L);if(R.length%7!=0)throw "Calendar not constructed properly. The # of squares should be a multiple of 7.";return R.unshift('<div class="qs-squares '.concat(n?"qs-blur":"",'">')),R.push("</div>"),R.join("")}function v(e,t){var n=e.overlayPlaceholder,a=e.overlayButton,r=e.overlayMonths.map((function(e,t){return '\n      <div class="qs-overlay-month" data-month-num="'.concat(t,'">\n        <span data-month-num="').concat(t,'">').concat(e,"</span>\n      </div>\n  ")})).join("");return '\n    <div class="qs-overlay '.concat(t?"":"qs-hidden",'">\n      <div>\n        <input class="qs-overlay-year" placeholder="').concat(n,'" />\n        <div class="qs-close">&#10005;</div>\n      </div>\n      <div class="qs-overlay-month-container">').concat(r,'</div>\n      <div class="qs-submit qs-disabled">').concat(a,"</div>\n    </div>\n  ")}function m(e,t,n){var a=t.currentMonth,r=t.currentYear,i=t.calendar,o=t.el,s=t.onSelect,c=t.respectDisabledReadOnly,l=t.sibling,d=i.querySelector(".qs-active"),h=e.textContent;(o.disabled||o.readOnly)&&c||(t.dateSelected=n?void 0:new Date(r,a,h),d&&d.classList.remove("qs-active"),n||e.classList.add("qs-active"),p(o,t,n),!n&&w(t),l&&(y({instance:t,deselect:n}),u(t),u(l)),s(t,n?void 0:new Date(t.dateSelected)));}function y(e){var t=e.instance,n=e.deselect,a=t.first?t:t.sibling,r=a.sibling;a===t?n?(a.minDate=a.originalMinDate,r.minDate=r.originalMinDate):r.minDate=a.dateSelected:n?(r.maxDate=r.originalMaxDate,a.maxDate=a.originalMaxDate):a.maxDate=r.dateSelected;}function p(e,t,n){if(!t.nonInput)return n?e.value="":t.formatter!==c?t.formatter(e,t.dateSelected,t):void(e.value=t.dateSelected.toDateString())}function b(e,t,n,a){n||a?(n&&(t.currentYear=n),a&&(t.currentMonth=+a)):(t.currentMonth+=e.contains("qs-right")?1:-1,12===t.currentMonth?(t.currentMonth=0,t.currentYear++):-1===t.currentMonth&&(t.currentMonth=11,t.currentYear--)),t.currentMonthName=t.months[t.currentMonth],u(t),t.onMonthChange(t);}function D(e){if(!e.noPosition){var t=e.el,n=e.calendarContainer,r=e.position,i=e.parent,o=r.top,s=r.right;if(r.centered)return n.classList.add("qs-centered");var c=a([i,t,n].map((function(e){return e.getBoundingClientRect()})),3),l=c[0],d=c[1],u=c[2],h=d.top-l.top+i.scrollTop,f="".concat(h-(o?u.height:-1*d.height),"px"),v="".concat(d.left-l.left+(s?d.width-u.width:0),"px");n.style.setProperty("top",f),n.style.setProperty("left",v);}}function g(e){return "[object Date]"==={}.toString.call(e)&&"Invalid Date"!==e.toString()}function q(e){if(g(e)||"number"==typeof e&&!isNaN(e)){var t=new Date(+e);return new Date(t.getFullYear(),t.getMonth(),t.getDate())}}function w(e){e.disabled||!e.calendarContainer.classList.contains("qs-hidden")&&!e.alwaysShow&&(M(!0,e),e.calendarContainer.classList.add("qs-hidden"),e.onHide(e));}function S(e){e.disabled||(e.calendarContainer.classList.remove("qs-hidden"),D(e),e.onShow(e));}function M(e,t){var n=t.calendar;if(n){var a=n.querySelector(".qs-overlay"),r=a.querySelector(".qs-overlay-year"),i=n.querySelector(".qs-controls"),o=n.querySelector(".qs-squares");e?(a.classList.add("qs-hidden"),i.classList.remove("qs-blur"),o.classList.remove("qs-blur"),r.value=""):(a.classList.remove("qs-hidden"),i.classList.add("qs-blur"),o.classList.add("qs-blur"),r.focus());}}function x(e,t,n,a){var r=isNaN(+(new Date).setFullYear(t.value||void 0)),i=r?null:t.value;if(13===(e.which||e.keyCode)||"click"===e.type)a?b(null,n,i,a):r||t.classList.contains("qs-disabled")||b(null,n,i,a);else if(n.calendar.contains(t)){n.calendar.querySelector(".qs-submit").classList[r?"add":"remove"]("qs-disabled");}}function L(e){var t=e.type,n=e.target,i=n.classList,o=a(r.filter((function(e){var t=e.calendar,a=e.el;return t.contains(n)||a===n})),1)[0],s=o&&o.calendar.contains(n);if(!(o&&o.isMobile&&o.disableMobile))if("click"===t){if(!o)return r.forEach(w);if(o.disabled)return;var c=o.calendar,l=o.calendarContainer,d=o.disableYearOverlay,u=o.nonInput,h=c.querySelector(".qs-overlay-year"),f=!!c.querySelector(".qs-hidden"),v=c.querySelector(".qs-month-year").contains(n),y=n.dataset.monthNum;if(o.noPosition&&!s)(l.classList.contains("qs-hidden")?S:w)(o);else if(i.contains("qs-arrow"))b(i,o);else if(v||i.contains("qs-close"))!d&&M(!f,o);else if(y)x(e,h,o,y);else{if(i.contains("qs-num")){var p="SPAN"===n.nodeName?n.parentNode:n,D=["qs-disabled","qs-empty"].some((function(e){return p.classList.contains(e)}));return p.classList.contains("qs-active")?m(p,o,!0):!D&&m(p,o)}i.contains("qs-submit")&&!i.contains("qs-disabled")?x(e,h,o):u&&n===o.el&&S(o);}}else if("focusin"===t&&o)S(o),r.forEach((function(e){return e!==o&&w(e)}));else if("keydown"===t&&o&&!o.disabled){var g=!o.calendar.querySelector(".qs-overlay").classList.contains("qs-hidden");13===(e.which||e.keyCode)&&g&&s?x(e,n,o):27===(e.which||e.keyCode)&&g&&s&&M(!0,o);}else if("input"===t){if(!o||!o.calendar.contains(n))return;var q=o.calendar.querySelector(".qs-submit"),L=n.value.split("").reduce((function(e,t){return e||"0"!==t?e+(t.match(/[0-9]/)?t:""):""}),"").slice(0,4);n.value=L,q.classList[4===L.length?"remove":"add"]("qs-disabled");}}function P(){S(this);}function j(){w(this);}function k(e,t){var n=q(e),a=this.currentYear,r=this.currentMonth,i=this.sibling;if(null==e)return this.dateSelected=void 0,p(this.el,this,!0),i&&(y({instance:this,deselect:!0}),u(i)),u(this),this;if(!g(e))throw "`setDate` needs a JavaScript Date object.";if(this.disabledDates.some((function(e){return +e==+n}))||n<this.minDate||n>this.maxDate)throw "You can't manually set a date that's disabled.";return this.currentYear=n.getFullYear(),this.currentMonth=n.getMonth(),this.currentMonthName=this.months[n.getMonth()],this.dateSelected=n,p(this.el,this),i&&(y({instance:this}),u(i,n)),(a===n.getFullYear()&&r===n.getMonth()||t||i)&&u(this,n),this}function O(e){return Y(this,e,!0)}function C(e){return Y(this,e)}function Y(e,t,n){var a=e.dateSelected,r=e.first,i=e.sibling,o=e.minDate,s=e.maxDate,c=q(t),l=n?"Min":"Max",d=function(){return "original".concat(l,"Date")},h=function(){return "".concat(l.toLowerCase(),"Date")},f=function(){return "set".concat(l)},v=function(){throw "Out-of-range date passed to ".concat(f())};if(null==t)e[d()]=void 0,i?(i[d()]=void 0,n?(r&&!a||!r&&!i.dateSelected)&&(e.minDate=void 0,i.minDate=void 0):(r&&!i.dateSelected||!r&&!a)&&(e.maxDate=void 0,i.maxDate=void 0)):e[h()]=void 0;else{if(!g(t))throw "Invalid date passed to ".concat(f());i?((r&&n&&c>(a||s)||r&&!n&&c<(i.dateSelected||o)||!r&&n&&c>(i.dateSelected||s)||!r&&!n&&c<(a||o))&&v(),e[d()]=c,i[d()]=c,(n&&(r&&!a||!r&&!i.dateSelected)||!n&&(r&&!i.dateSelected||!r&&!a))&&(e[h()]=c,i[h()]=c)):((n&&c>(a||s)||!n&&c<(a||o))&&v(),e[h()]=c);}return i&&u(i),u(e),e}function N(){var e=this.first?this:this.sibling,t=e.sibling;return {start:e.dateSelected,end:t.dateSelected}}function E(){var e=this,t=this.inlinePosition,n=this.parent,a=this.calendarContainer,i=this.el,o=this.sibling;t&&(r.some((function(t){return t!==e&&t.parent===n}))||n.style.setProperty("position",null));for(var s in a.remove(),r=r.filter((function(e){return e.el!==i})),o&&delete o.sibling,this)delete this[s];r.length||l.forEach((function(e){return document.removeEventListener(e,L)}));}e.exports=function(e,t){r.length||l.forEach((function(e){return document.addEventListener(e,L)}));var n=function(e,t){var n=e;"string"==typeof n&&(n="#"===n[0]?document.getElementById(n.slice(1)):document.querySelector(n));var l=function(e,t){if(r.some((function(e){return e.el===t})))throw "A datepicker already exists on that element.";var n=d(e);n.events&&(n.events=n.events.reduce((function(e,t){if(!g(t))throw '"options.events" must only contain valid JavaScript Date objects.';return e[+q(t)]=!0,e}),{}));["startDate","dateSelected","minDate","maxDate"].forEach((function(e){var t=n[e];if(t&&!g(t))throw '"options.'.concat(e,'" needs to be a valid JavaScript Date object.');n[e]=q(t);}));var o=n.position,l=n.maxDate,u=n.minDate,h=n.dateSelected,f=n.overlayPlaceholder,v=n.overlayButton,m=n.startDay,y=n.id;if(n.startDate=q(n.startDate||h||new Date),n.disabledDates=(n.disabledDates||[]).map((function(e){var t=+q(e);if(!g(e))throw 'You supplied an invalid date to "options.disabledDates".';if(t===+q(h))throw '"disabledDates" cannot contain the same date as "dateSelected".';return t})),n.hasOwnProperty("id")&&null==y)throw "Id cannot be `null` or `undefined`";if(y||0===y){var p=r.filter((function(e){return e.id===y}));if(p.length>1)throw "Only two datepickers can share an id.";p.length?(n.second=!0,n.sibling=p[0]):n.first=!0;}var b=["tr","tl","br","bl","c"].some((function(e){return o===e}));if(o&&!b)throw '"options.position" must be one of the following: tl, tr, bl, br, or c.';if(n.position=function(e){var t=a(e,2),n=t[0],r=t[1],i={};i[s[n]]=1,r&&(i[s[r]]=1);return i}(o||"bl"),l<u)throw '"maxDate" in options is less than "minDate".';if(h){var D=function(e){throw '"dateSelected" in options is '.concat(e?"less":"greater",' than "').concat(e||"mac",'Date".')};u>h&&D("min"),l<h&&D();}if(["onSelect","onShow","onHide","onMonthChange","formatter","disabler"].forEach((function(e){"function"!=typeof n[e]&&(n[e]=c);})),["customDays","customMonths","customOverlayMonths"].forEach((function(e,t){var a=n[e],r=t?12:7;if(a){if(!Array.isArray(a)||a.length!==r||a.some((function(e){return "string"!=typeof e})))throw '"'.concat(e,'" must be an array with ').concat(r," strings.");n[t?t<2?"months":"overlayMonths":"days"]=a;}})),m&&m>0&&m<7){var w=(n.customDays||i).slice(),S=w.splice(0,m);n.customDays=w.concat(S),n.startDay=+m,n.weekendIndices=[w.length-1,w.length];}else n.startDay=0,n.weekendIndices=[6,0];"string"!=typeof f&&delete n.overlayPlaceholder;"string"!=typeof v&&delete n.overlayButton;return n}(t||{startDate:q(new Date),position:"bl"},n),u=l.startDate,h=l.dateSelected,f=l.sibling,v=n===document.body,m=v?document.body:n.parentElement,y=document.createElement("div"),b=document.createElement("div");y.className="qs-datepicker-container qs-hidden",b.className="qs-datepicker";var D={el:n,parent:m,nonInput:"INPUT"!==n.nodeName,noPosition:v,position:!v&&l.position,startDate:u,dateSelected:h,disabledDates:l.disabledDates,minDate:l.minDate,maxDate:l.maxDate,noWeekends:!!l.noWeekends,weekendIndices:l.weekendIndices,calendarContainer:y,calendar:b,currentMonth:(u||h).getMonth(),currentMonthName:(l.months||o)[(u||h).getMonth()],currentYear:(u||h).getFullYear(),events:l.events||{},setDate:k,remove:E,setMin:O,setMax:C,show:P,hide:j,onSelect:l.onSelect,onShow:l.onShow,onHide:l.onHide,onMonthChange:l.onMonthChange,formatter:l.formatter,disabler:l.disabler,months:l.months||o,days:l.customDays||i,startDay:l.startDay,overlayMonths:l.overlayMonths||(l.months||o).map((function(e){return e.slice(0,3)})),overlayPlaceholder:l.overlayPlaceholder||"4-digit year",overlayButton:l.overlayButton||"Submit",disableYearOverlay:!!l.disableYearOverlay,disableMobile:!!l.disableMobile,isMobile:"ontouchstart"in window,alwaysShow:!!l.alwaysShow,id:l.id,showAllDates:!!l.showAllDates,respectDisabledReadOnly:!!l.respectDisabledReadOnly,first:l.first,second:l.second};if(f){var w=f,M=D,x=w.minDate||M.minDate,L=w.maxDate||M.maxDate;M.sibling=w,w.sibling=M,w.minDate=x,w.maxDate=L,M.minDate=x,M.maxDate=L,w.originalMinDate=x,w.originalMaxDate=L,M.originalMinDate=x,M.originalMaxDate=L,w.getRange=N,M.getRange=N;}h&&p(n,D);var Y=getComputedStyle(m).position;v||Y&&"static"!==Y||(D.inlinePosition=!0,m.style.setProperty("position","relative"));D.inlinePosition&&r.forEach((function(e){e.parent===D.parent&&(e.inlinePosition=!0);}));return r.push(D),y.appendChild(b),m.appendChild(y),D.alwaysShow&&S(D),D}(e,t),h=n.startDate,f=n.dateSelected,v=n.alwaysShow;if(n.second){var m=n.sibling;y({instance:n,deselect:!f}),y({instance:m,deselect:!m.dateSelected}),u(m);}return u(n,h||f),v&&D(n),n};},function(e,t,n){}])}));
	});

	var datepicker = unwrapExports(datepicker_min);
	var datepicker_min_1 = datepicker_min.datepicker;

	function ajax_search_agenda() {
	  var step = 24;
	  var more = 0;
	  var stepin;
	  var items;
	  var items_remaining; //let pages_number;

	  var year, month, genre, nonce;
	  var count; //jQuery("#agenda-count").val();
	  //let fade_results = false;

	  var agenda_full = false;
	  var agenda_start_date;
	  var agenda_end_date;
	  var daterange = false;
	  var agenda_mini = false;

	  function ajex_content() {
	    jQuery(".loader-filtre-genre").css("display", "block").css("opacity", "1");
	    jQuery.ajax({
	      type: "post",
	      dataType: "json",
	      url: agendAjax.ajaxurl,
	      data: {
	        action: "display_agenda",
	        year: year,
	        agenda_start_date: agenda_start_date,
	        agenda_end_date: agenda_end_date,
	        daterange: daterange,
	        month: month,
	        genre: genre,
	        count: count,
	        nonce: nonce,
	        agenda_mini: agenda_mini
	      },
	      success: function success(response) {
	        if (response.type == "success") {
	          if (agenda_full) {
	            jQuery("#agenda").html(response.events);
	            jQuery(".loader-filtre-genre").css("display", "none").css("opacity", "0");
	            return false;
	          }

	          jQuery("#agenda_mini").html(response.events);
	        }

	        jQuery(".loader-filtre-genre").css("display", "none").css("opacity", "0");
	      },
	      complete: function complete(response) {//console.log(response);
	      }
	    });
	  }

	  jQuery("#agenda-filtres-date").on("submit", function (e) {
	    e.preventDefault();

	    if (jQuery(".start").val() == '' || jQuery(".end").val() == '') {
	      jQuery("#date_search_message").css("display", "block");
	      return false;
	    }

	    jQuery("#date_search_message").css("display", "none");
	    jQuery(".loader-filtre-genre").css("display", "block").css("opacity", "1");
	    agenda_full = true;
	    fade_results = true;
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
	  jQuery("#choix-style-musical select").on("change", function (e) {
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

	  function load_more_items() {
	    jQuery(".calendrier-ul-container li").css("display", "none");
	    more++;
	    stepin = more * step;
	    jQuery(".calendrier-ul-container li").slice(0, stepin).css("display", "flex");
	    items_remaining = items - stepin;

	    if (items_remaining < 0) {
	      jQuery("#bouton-load-more").hide();
	    }
	  }

	  jQuery("#bouton-load-more").on("click", function (e) {
	    e.preventDefault();
	    load_more_items();
	  });

	  if (jQuery("#square-featured-slider").length > 0) {
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
	  var filtre_agenda = document.getElementById('agenda-filtres-section'); //console.log(filtre_agenda);

	  if (filtre_agenda !== null) {
	    var local = agendAjax.current_language == 'fr' ? 'fr-FR' : 'en-EN';
	    var local_m = agendAjax.current_language == 'fr' ? 'fr' : 'en';
	    var months = {
	      fr: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jui', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Déc'],
	      en: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	    };
	    var days = {
	      fr: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
	      en: ['S', 'M', 'T', 'W', 'Th', 'F', 'S']
	    };
	    var dates_options = {
	      weekday: 'long',
	      year: 'numeric',
	      month: 'long',
	      day: 'numeric'
	    };
	    var start = datepicker('.start', {
	      // Event callbacks.
	      onSelect: function onSelect(instance) {// Show which date was selected.
	        //console.log(instance.dateSelected)
	      },
	      onShow: function onShow(instance) {//console.log('Calendar showing.')
	      },
	      onHide: function onHide(instance) {//console.log('Calendar hidden.')
	      },
	      onMonthChange: function onMonthChange(instance) {// Show the month of the selected date.
	        //console.log(instance.currentMonthName)
	      },
	      // Customizations.
	      formatter: function formatter(input, date, instance) {
	        // This will display the date as `1/1/2019`.
	        input.value = date.toLocaleDateString(local, dates_options);
	        jQuery(input).attr("data-date", date.toISOString().split('T')[0]);
	      },
	      startDay: 1,
	      // Calendar week starts on a Monday.
	      customDays: days[local_m],
	      customMonths: months[local_m],
	      id: 1
	    });
	    var end = datepicker('.end', {
	      formatter: function formatter(input, date, instance) {
	        // This will display the date as `1/1/2019`.
	        //input.value = date.toISOString().split('T')[0];
	        input.value = date.toLocaleDateString(local, dates_options);
	        jQuery(input).attr("data-date", date.toISOString().split('T')[0]);
	      },
	      startDay: 1,
	      // Calendar week starts on a Monday.
	      customDays: days[local_m],
	      customMonths: months[local_m],
	      id: 1
	    });
	  }
	}

	//import main_menu_subMenu from './sub_menu.js';

	(function ($, d, w) {
	  "use-strict";

	  var menu_mobile = d.getElementById("main-menu-mobile");
	  var menu_mobile_open = d.querySelector("#main-menu-mobile.open");
	  var content = d.getElementById("content");
	  var colophon = d.getElementById("colophon");
	  var menu_toggle = d.querySelector(".bouton-menu-toggle-mobile");
	  var loupe_search = d.querySelector("#panm-search a");
	  var search_div = d.getElementById("searchform");
	  var close_searchform = d.getElementById("close-searchform");
	  var spotify = d.querySelector(".wp-block-embed-spotify .wp-block-embed__wrapper iframe");

	  function toggle_menu() {
	    menu_mobile.classList.toggle("open");
	    menu_mobile_open = d.querySelector("#site-navigation.open");
	  }

	  function reportWindowSize() {
	    var x = w.innerWidth || e.clientWidth || g.clientWidth;

	    if (x > 1024) {
	      menu_mobile.classList.remove("open");
	    } //

	  }
	  /*
	  	----------------------------------------------------------------------------------------------------
	  */


	  menu_toggle.addEventListener('click', function (event) {
	    event.preventDefault();
	    toggle_menu();
	    content.classList.toggle('collapse');
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
	    $(w).load(function () {
	      $(".at-share-btn-elements").prepend('<a class="a-icon-instagram-link" role="button" href="https://www.instagram.com/panm360/" target="_blank"><svg class="icon-instagram-link"><use xlink:href="#instagram"></use></svg></a>');
	    });

	    if ($("#new-featured-slider").length > 0) {
	      $("#new-featured-slider").slick({
	        autoplay: true,
	        autoplaySpeed: 4000,
	        prevArrow: '<div class="slick-prev-arrow"><svg class="icone"><use xlink:href="#slider-left-arrow"></use></svg></div>',
	        nextArrow: '<div class="slick-next-arrow"><svg class="icone"><use xlink:href="#slider-right-arrow"></use></svg></div>'
	      });
	    }

	    $(".filtres-content-tabs").on("click", " li a", function (e) {
	      var _f = $(this).data("content");

	      var _target = $(_f).children("p");

	      if ($(_target).is(":visible")) {
	        _target.hide();

	        return;
	      }

	      $(".filtres-content li p").hide();

	      _target.show();
	    });
	    /*
	    		$(".filtre-liste-tax").on("click","span",function(){
	    			let _data = $(this).data("genre");
	    			$(".album.element").hide();
	    			
	    			$("[data-filter~='"+ _data +"']").each( function(index) {
	    				$(this).show();
	    			});
	    			
	    		});
	    */

	    $("#menu-panm").on("click", ".burger", function () {
	      $(this).removeClass("active");
	      $("#menu-panm .cross").addClass("active");
	      $("#menu-panm .sub-menu").show();
	    });
	    $("#menu-panm").on("click", ".cross", function () {
	      $(this).removeClass("active");
	      $("#menu-panm .burger").addClass("active");
	      $("#menu-panm .sub-menu").hide();
	    });
	    reportWindowSize();
	    var observer = lozad('.lozad', {
	      rootMargin: '10px 0px',
	      // syntax similar to that of CSS Margin
	      threshold: 0,
	      // ratio of element convergence
	      loaded: function loaded(el) {
	        el.classList.add('img-loaded');
	      }
	    });
	    observer.observe();
	    $(".gfield_checkbox").on("click", "label", function (e) {
	      $(this).parent().toggleClass("selected");
	    });
	    if (spotify != null) spotify.setAttribute("width", "100%"); //main_menu_subMenu();

	    ajax_search_agenda();
	  });
	})(jQuery, document, window);

}));
