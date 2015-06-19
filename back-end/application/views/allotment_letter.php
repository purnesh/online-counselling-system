<html>
<head>
    <title>

    </title>

    <script type="application/javascript">
        /*!
         * Bootstrap v3.3.4 (http://getbootstrap.com)
         * Copyright 2011-2015 Twitter, Inc.
         * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
         */
        if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.4",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.4",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")&&(c.prop("checked")&&this.$element.hasClass("active")?a=!1:b.find(".active").removeClass("active")),a&&c.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));a&&this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.4",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.4",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){b&&3===b.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=c(d),f={relatedTarget:this};e.hasClass("open")&&(e.trigger(b=a.Event("hide.bs.dropdown",f)),b.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger("hidden.bs.dropdown",f)))}))}function c(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.4",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=c(e),g=f.hasClass("open");if(b(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click",b);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger("shown.bs.dropdown",h)}return!1}},g.prototype.keydown=function(b){if(/(38|40|27|32)/.test(b.which)&&!/input|textarea/i.test(b.target.tagName)){var d=a(this);if(b.preventDefault(),b.stopPropagation(),!d.is(".disabled, :disabled")){var e=c(d),g=e.hasClass("open");if(!g&&27!=b.which||g&&27==b.which)return 27==b.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find('[role="menu"]'+h+', [role="listbox"]'+h);if(i.length){var j=i.index(b.target);38==b.which&&j>0&&j--,40==b.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",b).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',g.prototype.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.4",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in").attr("aria-hidden",!1),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a('<div class="modal-backdrop '+e+'" />').appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.init("tooltip",a,b)};c.VERSION="3.3.4",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(this.options.viewport.selector||this.options.viewport),this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c&&c.$tip&&c.$tip.is(":visible")?void(c.hoverState="in"):(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.options.container?a(this.options.container):this.$element.parent(),p=this.getPosition(o);h="bottom"==h&&k.bottom+m>p.bottom?"top":"top"==h&&k.top-m<p.top?"bottom":"right"==h&&k.right+l>p.width?"left":"left"==h&&k.left-l<p.left?"right":h,f.removeClass(n).addClass(h)}var q=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(q,h);var r=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",r).emulateTransitionEnd(c.TRANSITION_DURATION):r()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top=b.top+g,b.left=b.left+h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.width&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){return this.$tip=this.$tip||a(this.options.template)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type)})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.4",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.4",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.4",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){
            var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.4",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=a(document.body).height();"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);

    </script>
    <style>
    /* CSS generated by http://lavishbootstrap.com */
    /*! normalize.css v2.1.0 | MIT License | git.io/normalize */
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section,
    summary {
        display: block;
    }
    audio,
    canvas,
    video {
        display: inline-block;
    }
    audio:not([controls]) {
        display: none;
        height: 0;
    }
    [hidden] {
        display: none;
    }
    html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }
    body {
        margin: 0;
    }
    a:focus {
        outline: thin dotted;
    }
    a:active,
    a:hover {
        outline: 0;
    }
    h1 {
        font-size: 2em;
        margin: 0.67em 0;
    }
    abbr[title] {
        border-bottom: 1px dotted;
    }
    b,
    strong {
        font-weight: bold;
    }
    dfn {
        font-style: italic;
    }
    hr {
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        height: 0;
    }
    mark {
        background: #ff0;
        color: #000;
    }
    code,
    kbd,
    pre,
    samp {
        font-family: monospace, serif;
        font-size: 1em;
    }
    pre {
        white-space: pre-wrap;
    }
    q {
        quotes: "\201C" "\201D" "\2018" "\2019";
    }
    small {
        font-size: 80%;
    }
    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }
    sup {
        top: -0.5em;
    }
    sub {
        bottom: -0.25em;
    }
    img {
        border: 0;
    }
    svg:not(:root) {
        overflow: hidden;
    }
    figure {
        margin: 0;
    }
    fieldset {
        border: 1px solid #c0c0c0;
        margin: 0 2px;
        padding: 0.35em 0.625em 0.75em;
    }
    legend {
        border: 0;
        padding: 0;
    }
    button,
    input,
    select,
    textarea {
        font-family: inherit;
        font-size: 100%;
        margin: 0;
    }
    button,
    input {
        line-height: normal;
    }
    button,
    select {
        text-transform: none;
    }
    button,
    html input[type="button"],
    input[type="reset"],
    input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
    }
    button[disabled],
    html input[disabled] {
        cursor: default;
    }
    input[type="checkbox"],
    input[type="radio"] {
        box-sizing: border-box;
        padding: 0;
    }
    input[type="search"] {
        -webkit-appearance: textfield;
        -moz-box-sizing: content-box;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
    }
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-decoration {
        -webkit-appearance: none;
    }
    button::-moz-focus-inner,
    input::-moz-focus-inner {
        border: 0;
        padding: 0;
    }
    textarea {
        overflow: auto;
        vertical-align: top;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    @media print {
        * {
            text-shadow: none !important;
            color: #000 !important;
            background: transparent !important;
            box-shadow: none !important;
        }
        a,
        a:visited {
            text-decoration: underline;
        }
        a[href]:after {
            content: " (" attr(href) ")";
        }
        abbr[title]:after {
            content: " (" attr(title) ")";
        }
        .ir a:after,
        a[href^="javascript:"]:after,
        a[href^="#"]:after {
            content: "";
        }
        pre,
        blockquote {
            border: 1px solid #999;
            page-break-inside: avoid;
        }
        thead {
            display: table-header-group;
        }
        tr,
        img {
            page-break-inside: avoid;
        }
        img {
            max-width: 100% !important;
        }
        @page  {
            margin: 2cm .5cm;
        }
        p,
        h2,
        h3 {
            orphans: 3;
            widows: 3;
        }
        h2,
        h3 {
            page-break-after: avoid;
        }
        .navbar {
            display: none;
        }
        .table td,
        .table th {
            background-color: #fff !important;
        }
        .btn > .caret,
        .dropup > .btn > .caret {
            border-top-color: #000 !important;
        }
        .label {
            border: 1px solid #000;
        }
        .table {
            border-collapse: collapse !important;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }
    }
    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    html {
        font-size: 62.5%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #5f0808;
        background-color: #fbf8f7;
    }
    input,
    button,
    select,
    textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }
    button,
    input,
    select[multiple],
    textarea {
        background-image: none;
    }
    a {
        color: #625d5b;
        text-decoration: none;
    }
    a:hover,
    a:focus {
        color: #3a3736;
        text-decoration: underline;
    }
    a:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    img {
        vertical-align: middle;
    }
    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }
    .img-rounded {
        border-radius: 6px;
    }
    .img-thumbnail {
        padding: 4px;
        line-height: 1.428571429;
        background-color: #fbf8f7;
        border: 1px solid #dddddd;
        border-radius: 4px;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        display: inline-block;
        max-width: 100%;
        height: auto;
    }
    .img-circle {
        border-radius: 50%;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #c0a4a1;
    }
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0 0 0 0);
        border: 0;
    }
    p {
        margin: 0 0 10px;
    }
    .lead {
        margin-bottom: 20px;
        font-size: 16.099999999999998px;
        font-weight: 200;
        line-height: 1.4;
    }
    @media (min-width: 768px) {
        .lead {
            font-size: 21px;
        }
    }
    small {
        font-size: 85%;
    }
    cite {
        font-style: normal;
    }
    .text-muted {
        color: #98827e;
    }
    .text-primary {
        color: #625d5b;
    }
    .text-warning {
        color: #c09853;
    }
    .text-danger {
        color: #b94a48;
    }
    .text-success {
        color: #468847;
    }
    .text-info {
        color: #3a87ad;
    }
    .text-left {
        text-align: left;
    }
    .text-right {
        text-align: right;
    }
    .text-center {
        text-align: center;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 500;
        line-height: 1.1;
    }
    h1 small,
    h2 small,
    h3 small,
    h4 small,
    h5 small,
    h6 small,
    .h1 small,
    .h2 small,
    .h3 small,
    .h4 small,
    .h5 small,
    .h6 small {
        font-weight: normal;
        line-height: 1;
        color: #98827e;
    }
    h1,
    h2,
    h3 {
        margin-top: 20px;
        margin-bottom: 10px;
    }
    h4,
    h5,
    h6 {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    h1,
    .h1 {
        font-size: 36px;
    }
    h2,
    .h2 {
        font-size: 30px;
    }
    h3,
    .h3 {
        font-size: 24px;
    }
    h4,
    .h4 {
        font-size: 18px;
    }
    h5,
    .h5 {
        font-size: 14px;
    }
    h6,
    .h6 {
        font-size: 12px;
    }
    h1 small,
    .h1 small {
        font-size: 24px;
    }
    h2 small,
    .h2 small {
        font-size: 18px;
    }
    h3 small,
    .h3 small,
    h4 small,
    .h4 small {
        font-size: 14px;
    }
    .page-header {
        padding-bottom: 9px;
        margin: 40px 0 20px;
        border-bottom: 1px solid #c0a4a1;
    }
    ul,
    ol {
        margin-top: 0;
        margin-bottom: 10px;
    }
    ul ul,
    ol ul,
    ul ol,
    ol ol {
        margin-bottom: 0;
    }
    .list-unstyled {
        padding-left: 0;
        list-style: none;
    }
    .list-inline {
        padding-left: 0;
        list-style: none;
    }
    .list-inline > li {
        display: inline-block;
        padding-left: 5px;
        padding-right: 5px;
    }
    dl {
        margin-bottom: 20px;
    }
    dt,
    dd {
        line-height: 1.428571429;
    }
    dt {
        font-weight: bold;
    }
    dd {
        margin-left: 0;
    }
    @media (min-width: 768px) {
        .dl-horizontal dt {
            float: left;
            width: 160px;
            clear: left;
            text-align: right;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .dl-horizontal dd {
            margin-left: 180px;
        }
        .dl-horizontal dd:before,
        .dl-horizontal dd:after {
            content: " ";
            /* 1 */

            display: table;
            /* 2 */

        }
        .dl-horizontal dd:after {
            clear: both;
        }
        .dl-horizontal dd:before,
        .dl-horizontal dd:after {
            content: " ";
            /* 1 */

            display: table;
            /* 2 */

        }
        .dl-horizontal dd:after {
            clear: both;
        }
    }
    abbr[title],
    abbr[data-original-title] {
        cursor: help;
        border-bottom: 1px dotted #98827e;
    }
    abbr.initialism {
        font-size: 90%;
        text-transform: uppercase;
    }
    blockquote {
        padding: 10px 20px;
        margin: 0 0 20px;
        border-left: 5px solid #c0a4a1;
    }
    blockquote p {
        font-size: 17.5px;
        font-weight: 300;
        line-height: 1.25;
    }
    blockquote p:last-child {
        margin-bottom: 0;
    }
    blockquote small {
        display: block;
        line-height: 1.428571429;
        color: #98827e;
    }
    blockquote small:before {
        content: '\2014 \00A0';
    }
    blockquote.pull-right {
        padding-right: 15px;
        padding-left: 0;
        border-right: 5px solid #c0a4a1;
        border-left: 0;
    }
    blockquote.pull-right p,
    blockquote.pull-right small {
        text-align: right;
    }
    blockquote.pull-right small:before {
        content: '';
    }
    blockquote.pull-right small:after {
        content: '\00A0 \2014';
    }
    q:before,
    q:after,
    blockquote:before,
    blockquote:after {
        content: "";
    }
    address {
        display: block;
        margin-bottom: 20px;
        font-style: normal;
        line-height: 1.428571429;
    }
    code,
    pre {
        font-family: Monaco, Menlo, Consolas, "Courier New", monospace;
    }
    code {
        padding: 2px 4px;
        font-size: 90%;
        color: #c7254e;
        background-color: #f9f2f4;
        white-space: nowrap;
        border-radius: 4px;
    }
    pre {
        display: block;
        padding: 9.5px;
        margin: 0 0 10px;
        font-size: 13px;
        line-height: 1.428571429;
        word-break: break-all;
        word-wrap: break-word;
        color: #5f0808;
        background-color: #f5f5f5;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }
    pre.prettyprint {
        margin-bottom: 20px;
    }
    pre code {
        padding: 0;
        font-size: inherit;
        color: inherit;
        white-space: pre-wrap;
        background-color: transparent;
        border: 0;
    }
    .pre-scrollable {
        max-height: 340px;
        overflow-y: scroll;
    }
    .container {
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
    .container:before,
    .container:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .container:after {
        clear: both;
    }
    .container:before,
    .container:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .container:after {
        clear: both;
    }
    .row {
        margin-left: -15px;
        margin-right: -15px;
    }
    .row:before,
    .row:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .row:after {
        clear: both;
    }
    .row:before,
    .row:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .row:after {
        clear: both;
    }
    .col-xs-1,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9,
    .col-xs-10,
    .col-xs-11,
    .col-xs-12,
    .col-sm-1,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-md-1,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-10,
    .col-md-11,
    .col-md-12,
    .col-lg-1,
    .col-lg-2,
    .col-lg-3,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6,
    .col-lg-7,
    .col-lg-8,
    .col-lg-9,
    .col-lg-10,
    .col-lg-11,
    .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
    }
    .col-xs-1,
    .col-xs-2,
    .col-xs-3,
    .col-xs-4,
    .col-xs-5,
    .col-xs-6,
    .col-xs-7,
    .col-xs-8,
    .col-xs-9,
    .col-xs-10,
    .col-xs-11 {
        float: left;
    }
    .col-xs-1 {
        width: 8.333333333333332%;
    }
    .col-xs-2 {
        width: 16.666666666666664%;
    }
    .col-xs-3 {
        width: 25%;
    }
    .col-xs-4 {
        width: 33.33333333333333%;
    }
    .col-xs-5 {
        width: 41.66666666666667%;
    }
    .col-xs-6 {
        width: 50%;
    }
    .col-xs-7 {
        width: 58.333333333333336%;
    }
    .col-xs-8 {
        width: 66.66666666666666%;
    }
    .col-xs-9 {
        width: 75%;
    }
    .col-xs-10 {
        width: 83.33333333333334%;
    }
    .col-xs-11 {
        width: 91.66666666666666%;
    }
    .col-xs-12 {
        width: 100%;
    }
    @media (min-width: 768px) {
        .container {
            max-width: 750px;
        }
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11 {
            float: left;
        }
        .col-sm-1 {
            width: 8.333333333333332%;
        }
        .col-sm-2 {
            width: 16.666666666666664%;
        }
        .col-sm-3 {
            width: 25%;
        }
        .col-sm-4 {
            width: 33.33333333333333%;
        }
        .col-sm-5 {
            width: 41.66666666666667%;
        }
        .col-sm-6 {
            width: 50%;
        }
        .col-sm-7 {
            width: 58.333333333333336%;
        }
        .col-sm-8 {
            width: 66.66666666666666%;
        }
        .col-sm-9 {
            width: 75%;
        }
        .col-sm-10 {
            width: 83.33333333333334%;
        }
        .col-sm-11 {
            width: 91.66666666666666%;
        }
        .col-sm-12 {
            width: 100%;
        }
        .col-sm-push-1 {
            left: 8.333333333333332%;
        }
        .col-sm-push-2 {
            left: 16.666666666666664%;
        }
        .col-sm-push-3 {
            left: 25%;
        }
        .col-sm-push-4 {
            left: 33.33333333333333%;
        }
        .col-sm-push-5 {
            left: 41.66666666666667%;
        }
        .col-sm-push-6 {
            left: 50%;
        }
        .col-sm-push-7 {
            left: 58.333333333333336%;
        }
        .col-sm-push-8 {
            left: 66.66666666666666%;
        }
        .col-sm-push-9 {
            left: 75%;
        }
        .col-sm-push-10 {
            left: 83.33333333333334%;
        }
        .col-sm-push-11 {
            left: 91.66666666666666%;
        }
        .col-sm-pull-1 {
            right: 8.333333333333332%;
        }
        .col-sm-pull-2 {
            right: 16.666666666666664%;
        }
        .col-sm-pull-3 {
            right: 25%;
        }
        .col-sm-pull-4 {
            right: 33.33333333333333%;
        }
        .col-sm-pull-5 {
            right: 41.66666666666667%;
        }
        .col-sm-pull-6 {
            right: 50%;
        }
        .col-sm-pull-7 {
            right: 58.333333333333336%;
        }
        .col-sm-pull-8 {
            right: 66.66666666666666%;
        }
        .col-sm-pull-9 {
            right: 75%;
        }
        .col-sm-pull-10 {
            right: 83.33333333333334%;
        }
        .col-sm-pull-11 {
            right: 91.66666666666666%;
        }
        .col-sm-offset-1 {
            margin-left: 8.333333333333332%;
        }
        .col-sm-offset-2 {
            margin-left: 16.666666666666664%;
        }
        .col-sm-offset-3 {
            margin-left: 25%;
        }
        .col-sm-offset-4 {
            margin-left: 33.33333333333333%;
        }
        .col-sm-offset-5 {
            margin-left: 41.66666666666667%;
        }
        .col-sm-offset-6 {
            margin-left: 50%;
        }
        .col-sm-offset-7 {
            margin-left: 58.333333333333336%;
        }
        .col-sm-offset-8 {
            margin-left: 66.66666666666666%;
        }
        .col-sm-offset-9 {
            margin-left: 75%;
        }
        .col-sm-offset-10 {
            margin-left: 83.33333333333334%;
        }
        .col-sm-offset-11 {
            margin-left: 91.66666666666666%;
        }
    }
    @media (min-width: 992px) {
        .container {
            max-width: 970px;
        }
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11 {
            float: left;
        }
        .col-md-1 {
            width: 8.333333333333332%;
        }
        .col-md-2 {
            width: 16.666666666666664%;
        }
        .col-md-3 {
            width: 25%;
        }
        .col-md-4 {
            width: 33.33333333333333%;
        }
        .col-md-5 {
            width: 41.66666666666667%;
        }
        .col-md-6 {
            width: 50%;
        }
        .col-md-7 {
            width: 58.333333333333336%;
        }
        .col-md-8 {
            width: 66.66666666666666%;
        }
        .col-md-9 {
            width: 75%;
        }
        .col-md-10 {
            width: 83.33333333333334%;
        }
        .col-md-11 {
            width: 91.66666666666666%;
        }
        .col-md-12 {
            width: 100%;
        }
        .col-md-push-0 {
            left: auto;
        }
        .col-md-push-1 {
            left: 8.333333333333332%;
        }
        .col-md-push-2 {
            left: 16.666666666666664%;
        }
        .col-md-push-3 {
            left: 25%;
        }
        .col-md-push-4 {
            left: 33.33333333333333%;
        }
        .col-md-push-5 {
            left: 41.66666666666667%;
        }
        .col-md-push-6 {
            left: 50%;
        }
        .col-md-push-7 {
            left: 58.333333333333336%;
        }
        .col-md-push-8 {
            left: 66.66666666666666%;
        }
        .col-md-push-9 {
            left: 75%;
        }
        .col-md-push-10 {
            left: 83.33333333333334%;
        }
        .col-md-push-11 {
            left: 91.66666666666666%;
        }
        .col-md-pull-0 {
            right: auto;
        }
        .col-md-pull-1 {
            right: 8.333333333333332%;
        }
        .col-md-pull-2 {
            right: 16.666666666666664%;
        }
        .col-md-pull-3 {
            right: 25%;
        }
        .col-md-pull-4 {
            right: 33.33333333333333%;
        }
        .col-md-pull-5 {
            right: 41.66666666666667%;
        }
        .col-md-pull-6 {
            right: 50%;
        }
        .col-md-pull-7 {
            right: 58.333333333333336%;
        }
        .col-md-pull-8 {
            right: 66.66666666666666%;
        }
        .col-md-pull-9 {
            right: 75%;
        }
        .col-md-pull-10 {
            right: 83.33333333333334%;
        }
        .col-md-pull-11 {
            right: 91.66666666666666%;
        }
        .col-md-offset-0 {
            margin-left: 0;
        }
        .col-md-offset-1 {
            margin-left: 8.333333333333332%;
        }
        .col-md-offset-2 {
            margin-left: 16.666666666666664%;
        }
        .col-md-offset-3 {
            margin-left: 25%;
        }
        .col-md-offset-4 {
            margin-left: 33.33333333333333%;
        }
        .col-md-offset-5 {
            margin-left: 41.66666666666667%;
        }
        .col-md-offset-6 {
            margin-left: 50%;
        }
        .col-md-offset-7 {
            margin-left: 58.333333333333336%;
        }
        .col-md-offset-8 {
            margin-left: 66.66666666666666%;
        }
        .col-md-offset-9 {
            margin-left: 75%;
        }
        .col-md-offset-10 {
            margin-left: 83.33333333333334%;
        }
        .col-md-offset-11 {
            margin-left: 91.66666666666666%;
        }
    }
    @media (min-width: 1200px) {
        .container {
            max-width: 1170px;
        }
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11 {
            float: left;
        }
        .col-lg-1 {
            width: 8.333333333333332%;
        }
        .col-lg-2 {
            width: 16.666666666666664%;
        }
        .col-lg-3 {
            width: 25%;
        }
        .col-lg-4 {
            width: 33.33333333333333%;
        }
        .col-lg-5 {
            width: 41.66666666666667%;
        }
        .col-lg-6 {
            width: 50%;
        }
        .col-lg-7 {
            width: 58.333333333333336%;
        }
        .col-lg-8 {
            width: 66.66666666666666%;
        }
        .col-lg-9 {
            width: 75%;
        }
        .col-lg-10 {
            width: 83.33333333333334%;
        }
        .col-lg-11 {
            width: 91.66666666666666%;
        }
        .col-lg-12 {
            width: 100%;
        }
        .col-lg-push-0 {
            left: auto;
        }
        .col-lg-push-1 {
            left: 8.333333333333332%;
        }
        .col-lg-push-2 {
            left: 16.666666666666664%;
        }
        .col-lg-push-3 {
            left: 25%;
        }
        .col-lg-push-4 {
            left: 33.33333333333333%;
        }
        .col-lg-push-5 {
            left: 41.66666666666667%;
        }
        .col-lg-push-6 {
            left: 50%;
        }
        .col-lg-push-7 {
            left: 58.333333333333336%;
        }
        .col-lg-push-8 {
            left: 66.66666666666666%;
        }
        .col-lg-push-9 {
            left: 75%;
        }
        .col-lg-push-10 {
            left: 83.33333333333334%;
        }
        .col-lg-push-11 {
            left: 91.66666666666666%;
        }
        .col-lg-pull-0 {
            right: auto;
        }
        .col-lg-pull-1 {
            right: 8.333333333333332%;
        }
        .col-lg-pull-2 {
            right: 16.666666666666664%;
        }
        .col-lg-pull-3 {
            right: 25%;
        }
        .col-lg-pull-4 {
            right: 33.33333333333333%;
        }
        .col-lg-pull-5 {
            right: 41.66666666666667%;
        }
        .col-lg-pull-6 {
            right: 50%;
        }
        .col-lg-pull-7 {
            right: 58.333333333333336%;
        }
        .col-lg-pull-8 {
            right: 66.66666666666666%;
        }
        .col-lg-pull-9 {
            right: 75%;
        }
        .col-lg-pull-10 {
            right: 83.33333333333334%;
        }
        .col-lg-pull-11 {
            right: 91.66666666666666%;
        }
        .col-lg-offset-0 {
            margin-left: 0;
        }
        .col-lg-offset-1 {
            margin-left: 8.333333333333332%;
        }
        .col-lg-offset-2 {
            margin-left: 16.666666666666664%;
        }
        .col-lg-offset-3 {
            margin-left: 25%;
        }
        .col-lg-offset-4 {
            margin-left: 33.33333333333333%;
        }
        .col-lg-offset-5 {
            margin-left: 41.66666666666667%;
        }
        .col-lg-offset-6 {
            margin-left: 50%;
        }
        .col-lg-offset-7 {
            margin-left: 58.333333333333336%;
        }
        .col-lg-offset-8 {
            margin-left: 66.66666666666666%;
        }
        .col-lg-offset-9 {
            margin-left: 75%;
        }
        .col-lg-offset-10 {
            margin-left: 83.33333333333334%;
        }
        .col-lg-offset-11 {
            margin-left: 91.66666666666666%;
        }
    }
    table {
        max-width: 100%;
        background-color: transparent;
    }
    th {
        text-align: left;
    }
    .table {
        width: 100%;
        margin-bottom: 20px;
    }
    .table thead > tr > th,
    .table tbody > tr > th,
    .table tfoot > tr > th,
    .table thead > tr > td,
    .table tbody > tr > td,
    .table tfoot > tr > td {
        padding: 8px;
        line-height: 1.428571429;
        vertical-align: top;
        border-top: 1px solid #5f0808;
    }
    .table thead > tr > th {
        vertical-align: bottom;
        border-bottom: 2px solid #5f0808;
    }
    .table caption + thead tr:first-child th,
    .table colgroup + thead tr:first-child th,
    .table thead:first-child tr:first-child th,
    .table caption + thead tr:first-child td,
    .table colgroup + thead tr:first-child td,
    .table thead:first-child tr:first-child td {
        border-top: 0;
    }
    .table tbody + tbody {
        border-top: 2px solid #5f0808;
    }
    .table .table {
        background-color: #fbf8f7;
    }
    .table-condensed thead > tr > th,
    .table-condensed tbody > tr > th,
    .table-condensed tfoot > tr > th,
    .table-condensed thead > tr > td,
    .table-condensed tbody > tr > td,
    .table-condensed tfoot > tr > td {
        padding: 5px;
    }
    .table-bordered {
        border: 1px solid #5f0808;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #5f0808;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
    }
    .table-striped > tbody > tr:nth-child(odd) > td,
    .table-striped > tbody > tr:nth-child(odd) > th {
        background-color: #f9f9f9;
    }
    .table-hover > tbody > tr:hover > td,
    .table-hover > tbody > tr:hover > th {
        background-color: #f5f5f5;
    }
    table col[class*="col-"] {
        float: none;
        display: table-column;
    }
    table td[class*="col-"],
    table th[class*="col-"] {
        float: none;
        display: table-cell;
    }
    .table > thead > tr > td.active,
    .table > tbody > tr > td.active,
    .table > tfoot > tr > td.active,
    .table > thead > tr > th.active,
    .table > tbody > tr > th.active,
    .table > tfoot > tr > th.active,
    .table > thead > tr.active > td,
    .table > tbody > tr.active > td,
    .table > tfoot > tr.active > td,
    .table > thead > tr.active > th,
    .table > tbody > tr.active > th,
    .table > tfoot > tr.active > th {
        background-color: #f5f5f5;
    }
    .table > thead > tr > td.success,
    .table > tbody > tr > td.success,
    .table > tfoot > tr > td.success,
    .table > thead > tr > th.success,
    .table > tbody > tr > th.success,
    .table > tfoot > tr > th.success,
    .table > thead > tr.success > td,
    .table > tbody > tr.success > td,
    .table > tfoot > tr.success > td,
    .table > thead > tr.success > th,
    .table > tbody > tr.success > th,
    .table > tfoot > tr.success > th {
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .table-hover > tbody > tr > td.success:hover,
    .table-hover > tbody > tr > th.success:hover,
    .table-hover > tbody > tr.success:hover > td {
        background-color: #d0e9c6;
        border-color: #c9e2b3;
    }
    .table > thead > tr > td.danger,
    .table > tbody > tr > td.danger,
    .table > tfoot > tr > td.danger,
    .table > thead > tr > th.danger,
    .table > tbody > tr > th.danger,
    .table > tfoot > tr > th.danger,
    .table > thead > tr.danger > td,
    .table > tbody > tr.danger > td,
    .table > tfoot > tr.danger > td,
    .table > thead > tr.danger > th,
    .table > tbody > tr.danger > th,
    .table > tfoot > tr.danger > th {
        background-color: #f2dede;
        border-color: #eed3d7;
    }
    .table-hover > tbody > tr > td.danger:hover,
    .table-hover > tbody > tr > th.danger:hover,
    .table-hover > tbody > tr.danger:hover > td {
        background-color: #ebcccc;
        border-color: #e6c1c7;
    }
    .table > thead > tr > td.warning,
    .table > tbody > tr > td.warning,
    .table > tfoot > tr > td.warning,
    .table > thead > tr > th.warning,
    .table > tbody > tr > th.warning,
    .table > tfoot > tr > th.warning,
    .table > thead > tr.warning > td,
    .table > tbody > tr.warning > td,
    .table > tfoot > tr.warning > td,
    .table > thead > tr.warning > th,
    .table > tbody > tr.warning > th,
    .table > tfoot > tr.warning > th {
        background-color: #fcf8e3;
        border-color: #fbeed5;
    }
    .table-hover > tbody > tr > td.warning:hover,
    .table-hover > tbody > tr > th.warning:hover,
    .table-hover > tbody > tr.warning:hover > td {
        background-color: #faf2cc;
        border-color: #f8e5be;
    }
    @media (max-width: 768px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            overflow-x: scroll;
            border: 1px solid #5f0808;
        }
        .table-responsive > .table {
            margin-bottom: 0;
            background-color: #fff;
        }
        .table-responsive > .table > thead > tr > th,
        .table-responsive > .table > tbody > tr > th,
        .table-responsive > .table > tfoot > tr > th,
        .table-responsive > .table > thead > tr > td,
        .table-responsive > .table > tbody > tr > td,
        .table-responsive > .table > tfoot > tr > td {
            white-space: nowrap;
        }
        .table-responsive > .table-bordered {
            border: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:first-child,
        .table-responsive > .table-bordered > tbody > tr > th:first-child,
        .table-responsive > .table-bordered > tfoot > tr > th:first-child,
        .table-responsive > .table-bordered > thead > tr > td:first-child,
        .table-responsive > .table-bordered > tbody > tr > td:first-child,
        .table-responsive > .table-bordered > tfoot > tr > td:first-child {
            border-left: 0;
        }
        .table-responsive > .table-bordered > thead > tr > th:last-child,
        .table-responsive > .table-bordered > tbody > tr > th:last-child,
        .table-responsive > .table-bordered > tfoot > tr > th:last-child,
        .table-responsive > .table-bordered > thead > tr > td:last-child,
        .table-responsive > .table-bordered > tbody > tr > td:last-child,
        .table-responsive > .table-bordered > tfoot > tr > td:last-child {
            border-right: 0;
        }
        .table-responsive > .table-bordered > thead > tr:last-child > th,
        .table-responsive > .table-bordered > tbody > tr:last-child > th,
        .table-responsive > .table-bordered > tfoot > tr:last-child > th,
        .table-responsive > .table-bordered > thead > tr:last-child > td,
        .table-responsive > .table-bordered > tbody > tr:last-child > td,
        .table-responsive > .table-bordered > tfoot > tr:last-child > td {
            border-bottom: 0;
        }
    }
    fieldset {
        padding: 0;
        margin: 0;
        border: 0;
    }
    legend {
        display: block;
        width: 100%;
        padding: 0;
        margin-bottom: 20px;
        font-size: 21px;
        line-height: inherit;
        color: #5f0808;
        border: 0;
        border-bottom: 1px solid #e5e5e5;
    }
    label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="search"] {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    input[type="radio"],
    input[type="checkbox"] {
        margin: 4px 0 0;
        margin-top: 1px \9;
        /* IE8-9 */

        line-height: normal;
    }
    input[type="file"] {
        display: block;
    }
    select[multiple],
    select[size] {
        height: auto;
    }
    select optgroup {
        font-size: inherit;
        font-style: inherit;
        font-family: inherit;
    }
    input[type="file"]:focus,
    input[type="radio"]:focus,
    input[type="checkbox"]:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        height: auto;
    }
    .form-control:-moz-placeholder {
        color: #98827e;
    }
    .form-control::-moz-placeholder {
        color: #98827e;
    }
    .form-control:-ms-input-placeholder {
        color: #98827e;
    }
    .form-control::-webkit-input-placeholder {
        color: #98827e;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        color: #bb1f1e;
        vertical-align: middle;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-control:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    }
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: not-allowed;
        background-color: #c0a4a1;
    }
    textarea.form-control {
        height: auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .radio,
    .checkbox {
        display: block;
        min-height: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-left: 20px;
        vertical-align: middle;
    }
    .radio label,
    .checkbox label {
        display: inline;
        margin-bottom: 0;
        font-weight: normal;
        cursor: pointer;
    }
    .radio input[type="radio"],
    .radio-inline input[type="radio"],
    .checkbox input[type="checkbox"],
    .checkbox-inline input[type="checkbox"] {
        float: left;
        margin-left: -20px;
    }
    .radio + .radio,
    .checkbox + .checkbox {
        margin-top: -5px;
    }
    .radio-inline,
    .checkbox-inline {
        display: inline-block;
        padding-left: 20px;
        margin-bottom: 0;
        vertical-align: middle;
        font-weight: normal;
        cursor: pointer;
    }
    .radio-inline + .radio-inline,
    .checkbox-inline + .checkbox-inline {
        margin-top: 0;
        margin-left: 10px;
    }
    input[type="radio"][disabled],
    input[type="checkbox"][disabled],
    .radio[disabled],
    .radio-inline[disabled],
    .checkbox[disabled],
    .checkbox-inline[disabled],
    fieldset[disabled] input[type="radio"],
    fieldset[disabled] input[type="checkbox"],
    fieldset[disabled] .radio,
    fieldset[disabled] .radio-inline,
    fieldset[disabled] .checkbox,
    fieldset[disabled] .checkbox-inline {
        cursor: not-allowed;
    }
    .input-sm {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    select.input-sm {
        height: 30px;
        line-height: 30px;
    }
    textarea.input-sm {
        height: auto;
    }
    .input-lg {
        height: 45px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }
    select.input-lg {
        height: 45px;
        line-height: 45px;
    }
    textarea.input-lg {
        height: auto;
    }
    .has-warning .help-block,
    .has-warning .control-label {
        color: #c09853;
    }
    .has-warning .form-control {
        border-color: #c09853;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }
    .has-warning .form-control:focus {
        border-color: #a47e3c;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #dbc59e;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #dbc59e;
    }
    .has-warning .input-group-addon {
        color: #c09853;
        border-color: #c09853;
        background-color: #fcf8e3;
    }
    .has-error .help-block,
    .has-error .control-label {
        color: #b94a48;
    }
    .has-error .form-control {
        border-color: #b94a48;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }
    .has-error .form-control:focus {
        border-color: #953b39;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #d59392;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #d59392;
    }
    .has-error .input-group-addon {
        color: #b94a48;
        border-color: #b94a48;
        background-color: #f2dede;
    }
    .has-success .help-block,
    .has-success .control-label {
        color: #468847;
    }
    .has-success .form-control {
        border-color: #468847;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }
    .has-success .form-control:focus {
        border-color: #356635;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #7aba7b;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #7aba7b;
    }
    .has-success .input-group-addon {
        color: #468847;
        border-color: #468847;
        background-color: #dff0d8;
    }
    .form-control-static {
        margin-bottom: 0;
        padding-top: 7px;
    }
    .help-block {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        color: #d51212;
    }
    @media (min-width: 768px) {
        .form-inline .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .form-inline .form-control {
            display: inline-block;
        }
        .form-inline .radio,
        .form-inline .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            padding-left: 0;
        }
        .form-inline .radio input[type="radio"],
        .form-inline .checkbox input[type="checkbox"] {
            float: none;
            margin-left: 0;
        }
    }
    .form-horizontal .control-label,
    .form-horizontal .radio,
    .form-horizontal .checkbox,
    .form-horizontal .radio-inline,
    .form-horizontal .checkbox-inline {
        margin-top: 0;
        margin-bottom: 0;
        padding-top: 7px;
    }
    .form-horizontal .form-group {
        margin-left: -15px;
        margin-right: -15px;
    }
    .form-horizontal .form-group:before,
    .form-horizontal .form-group:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .form-horizontal .form-group:after {
        clear: both;
    }
    .form-horizontal .form-group:before,
    .form-horizontal .form-group:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .form-horizontal .form-group:after {
        clear: both;
    }
    @media (min-width: 768px) {
        .form-horizontal .control-label {
            text-align: right;
        }
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.428571429;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        white-space: nowrap;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
    .btn:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    .btn:hover,
    .btn:focus {
        color: #333333;
        text-decoration: none;
    }
    .btn:active,
    .btn.active {
        outline: 0;
        background-image: none;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn.disabled,
    .btn[disabled],
    fieldset[disabled] .btn {
        cursor: not-allowed;
        pointer-events: none;
        opacity: 0.65;
        filter: alpha(opacity=65);
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .btn-default {
        color: #333333;
        background-color: #ffffff;
        border-color: #cccccc;
    }
    .btn-default:hover,
    .btn-default:focus,
    .btn-default:active,
    .btn-default.active,
    .open .dropdown-toggle.btn-default {
        color: #333333;
        background-color: #ebebeb;
        border-color: #adadad;
    }
    .btn-default:active,
    .btn-default.active,
    .open .dropdown-toggle.btn-default {
        background-image: none;
    }
    .btn-default.disabled,
    .btn-default[disabled],
    fieldset[disabled] .btn-default,
    .btn-default.disabled:hover,
    .btn-default[disabled]:hover,
    fieldset[disabled] .btn-default:hover,
    .btn-default.disabled:focus,
    .btn-default[disabled]:focus,
    fieldset[disabled] .btn-default:focus,
    .btn-default.disabled:active,
    .btn-default[disabled]:active,
    fieldset[disabled] .btn-default:active,
    .btn-default.disabled.active,
    .btn-default[disabled].active,
    fieldset[disabled] .btn-default.active {
        background-color: #ffffff;
        border-color: #cccccc;
    }
    .btn-primary {
        color: #ffffff;
        background-color: #625d5b;
        border-color: #55504f;
    }
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary {
        color: #ffffff;
        background-color: #4d4947;
        border-color: #353231;
    }
    .btn-primary:active,
    .btn-primary.active,
    .open .dropdown-toggle.btn-primary {
        background-image: none;
    }
    .btn-primary.disabled,
    .btn-primary[disabled],
    fieldset[disabled] .btn-primary,
    .btn-primary.disabled:hover,
    .btn-primary[disabled]:hover,
    fieldset[disabled] .btn-primary:hover,
    .btn-primary.disabled:focus,
    .btn-primary[disabled]:focus,
    fieldset[disabled] .btn-primary:focus,
    .btn-primary.disabled:active,
    .btn-primary[disabled]:active,
    fieldset[disabled] .btn-primary:active,
    .btn-primary.disabled.active,
    .btn-primary[disabled].active,
    fieldset[disabled] .btn-primary.active {
        background-color: #625d5b;
        border-color: #55504f;
    }
    .btn-warning {
        color: #ffffff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }
    .btn-warning:hover,
    .btn-warning:focus,
    .btn-warning:active,
    .btn-warning.active,
    .open .dropdown-toggle.btn-warning {
        color: #ffffff;
        background-color: #ed9c28;
        border-color: #d58512;
    }
    .btn-warning:active,
    .btn-warning.active,
    .open .dropdown-toggle.btn-warning {
        background-image: none;
    }
    .btn-warning.disabled,
    .btn-warning[disabled],
    fieldset[disabled] .btn-warning,
    .btn-warning.disabled:hover,
    .btn-warning[disabled]:hover,
    fieldset[disabled] .btn-warning:hover,
    .btn-warning.disabled:focus,
    .btn-warning[disabled]:focus,
    fieldset[disabled] .btn-warning:focus,
    .btn-warning.disabled:active,
    .btn-warning[disabled]:active,
    fieldset[disabled] .btn-warning:active,
    .btn-warning.disabled.active,
    .btn-warning[disabled].active,
    fieldset[disabled] .btn-warning.active {
        background-color: #f0ad4e;
        border-color: #eea236;
    }
    .btn-danger {
        color: #ffffff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }
    .btn-danger:hover,
    .btn-danger:focus,
    .btn-danger:active,
    .btn-danger.active,
    .open .dropdown-toggle.btn-danger {
        color: #ffffff;
        background-color: #d2322d;
        border-color: #ac2925;
    }
    .btn-danger:active,
    .btn-danger.active,
    .open .dropdown-toggle.btn-danger {
        background-image: none;
    }
    .btn-danger.disabled,
    .btn-danger[disabled],
    fieldset[disabled] .btn-danger,
    .btn-danger.disabled:hover,
    .btn-danger[disabled]:hover,
    fieldset[disabled] .btn-danger:hover,
    .btn-danger.disabled:focus,
    .btn-danger[disabled]:focus,
    fieldset[disabled] .btn-danger:focus,
    .btn-danger.disabled:active,
    .btn-danger[disabled]:active,
    fieldset[disabled] .btn-danger:active,
    .btn-danger.disabled.active,
    .btn-danger[disabled].active,
    fieldset[disabled] .btn-danger.active {
        background-color: #d9534f;
        border-color: #d43f3a;
    }
    .btn-success {
        color: #ffffff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-success:hover,
    .btn-success:focus,
    .btn-success:active,
    .btn-success.active,
    .open .dropdown-toggle.btn-success {
        color: #ffffff;
        background-color: #47a447;
        border-color: #398439;
    }
    .btn-success:active,
    .btn-success.active,
    .open .dropdown-toggle.btn-success {
        background-image: none;
    }
    .btn-success.disabled,
    .btn-success[disabled],
    fieldset[disabled] .btn-success,
    .btn-success.disabled:hover,
    .btn-success[disabled]:hover,
    fieldset[disabled] .btn-success:hover,
    .btn-success.disabled:focus,
    .btn-success[disabled]:focus,
    fieldset[disabled] .btn-success:focus,
    .btn-success.disabled:active,
    .btn-success[disabled]:active,
    fieldset[disabled] .btn-success:active,
    .btn-success.disabled.active,
    .btn-success[disabled].active,
    fieldset[disabled] .btn-success.active {
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-info {
        color: #ffffff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .btn-info:hover,
    .btn-info:focus,
    .btn-info:active,
    .btn-info.active,
    .open .dropdown-toggle.btn-info {
        color: #ffffff;
        background-color: #39b3d7;
        border-color: #269abc;
    }
    .btn-info:active,
    .btn-info.active,
    .open .dropdown-toggle.btn-info {
        background-image: none;
    }
    .btn-info.disabled,
    .btn-info[disabled],
    fieldset[disabled] .btn-info,
    .btn-info.disabled:hover,
    .btn-info[disabled]:hover,
    fieldset[disabled] .btn-info:hover,
    .btn-info.disabled:focus,
    .btn-info[disabled]:focus,
    fieldset[disabled] .btn-info:focus,
    .btn-info.disabled:active,
    .btn-info[disabled]:active,
    fieldset[disabled] .btn-info:active,
    .btn-info.disabled.active,
    .btn-info[disabled].active,
    fieldset[disabled] .btn-info.active {
        background-color: #5bc0de;
        border-color: #46b8da;
    }
    .btn-link {
        color: #625d5b;
        font-weight: normal;
        cursor: pointer;
        border-radius: 0;
    }
    .btn-link,
    .btn-link:active,
    .btn-link[disabled],
    fieldset[disabled] .btn-link {
        background-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .btn-link,
    .btn-link:hover,
    .btn-link:focus,
    .btn-link:active {
        border-color: transparent;
    }
    .btn-link:hover,
    .btn-link:focus {
        color: #3a3736;
        text-decoration: underline;
        background-color: transparent;
    }
    .btn-link[disabled]:hover,
    fieldset[disabled] .btn-link:hover,
    .btn-link[disabled]:focus,
    fieldset[disabled] .btn-link:focus {
        color: #98827e;
        text-decoration: none;
    }
    .btn-lg {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }
    .btn-sm,
    .btn-xs {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    .btn-xs {
        padding: 1px 5px;
    }
    .btn-block {
        display: block;
        width: 100%;
        padding-left: 0;
        padding-right: 0;
    }
    .btn-block + .btn-block {
        margin-top: 5px;
    }
    input[type="submit"].btn-block,
    input[type="reset"].btn-block,
    input[type="button"].btn-block {
        width: 100%;
    }
    .fade {
        opacity: 0;
        -webkit-transition: opacity 0.15s linear;
        transition: opacity 0.15s linear;
    }
    .fade.in {
        opacity: 1;
    }
    .collapse {
        display: none;
    }
    .collapse.in {
        display: block;
    }
    .collapsing {
        position: relative;
        height: 0;
        overflow: hidden;
        -webkit-transition: height 0.35s ease;
        transition: height 0.35s ease;
    }
    @font-face {
        font-family: 'Glyphicons Halflings';
        src: url('../fonts/glyphicons-halflings-regular.eot');
        src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
    }
    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
    }
    .glyphicon-asterisk:before {
        content: "\2a";
    }
    .glyphicon-plus:before {
        content: "\2b";
    }
    .glyphicon-euro:before {
        content: "\20ac";
    }
    .glyphicon-minus:before {
        content: "\2212";
    }
    .glyphicon-cloud:before {
        content: "\2601";
    }
    .glyphicon-envelope:before {
        content: "\2709";
    }
    .glyphicon-pencil:before {
        content: "\270f";
    }
    .glyphicon-glass:before {
        content: "\e001";
    }
    .glyphicon-music:before {
        content: "\e002";
    }
    .glyphicon-search:before {
        content: "\e003";
    }
    .glyphicon-heart:before {
        content: "\e005";
    }
    .glyphicon-star:before {
        content: "\e006";
    }
    .glyphicon-star-empty:before {
        content: "\e007";
    }
    .glyphicon-user:before {
        content: "\e008";
    }
    .glyphicon-film:before {
        content: "\e009";
    }
    .glyphicon-th-large:before {
        content: "\e010";
    }
    .glyphicon-th:before {
        content: "\e011";
    }
    .glyphicon-th-list:before {
        content: "\e012";
    }
    .glyphicon-ok:before {
        content: "\e013";
    }
    .glyphicon-remove:before {
        content: "\e014";
    }
    .glyphicon-zoom-in:before {
        content: "\e015";
    }
    .glyphicon-zoom-out:before {
        content: "\e016";
    }
    .glyphicon-off:before {
        content: "\e017";
    }
    .glyphicon-signal:before {
        content: "\e018";
    }
    .glyphicon-cog:before {
        content: "\e019";
    }
    .glyphicon-trash:before {
        content: "\e020";
    }
    .glyphicon-home:before {
        content: "\e021";
    }
    .glyphicon-file:before {
        content: "\e022";
    }
    .glyphicon-time:before {
        content: "\e023";
    }
    .glyphicon-road:before {
        content: "\e024";
    }
    .glyphicon-download-alt:before {
        content: "\e025";
    }
    .glyphicon-download:before {
        content: "\e026";
    }
    .glyphicon-upload:before {
        content: "\e027";
    }
    .glyphicon-inbox:before {
        content: "\e028";
    }
    .glyphicon-play-circle:before {
        content: "\e029";
    }
    .glyphicon-repeat:before {
        content: "\e030";
    }
    .glyphicon-refresh:before {
        content: "\e031";
    }
    .glyphicon-list-alt:before {
        content: "\e032";
    }
    .glyphicon-flag:before {
        content: "\e034";
    }
    .glyphicon-headphones:before {
        content: "\e035";
    }
    .glyphicon-volume-off:before {
        content: "\e036";
    }
    .glyphicon-volume-down:before {
        content: "\e037";
    }
    .glyphicon-volume-up:before {
        content: "\e038";
    }
    .glyphicon-qrcode:before {
        content: "\e039";
    }
    .glyphicon-barcode:before {
        content: "\e040";
    }
    .glyphicon-tag:before {
        content: "\e041";
    }
    .glyphicon-tags:before {
        content: "\e042";
    }
    .glyphicon-book:before {
        content: "\e043";
    }
    .glyphicon-print:before {
        content: "\e045";
    }
    .glyphicon-font:before {
        content: "\e047";
    }
    .glyphicon-bold:before {
        content: "\e048";
    }
    .glyphicon-italic:before {
        content: "\e049";
    }
    .glyphicon-text-height:before {
        content: "\e050";
    }
    .glyphicon-text-width:before {
        content: "\e051";
    }
    .glyphicon-align-left:before {
        content: "\e052";
    }
    .glyphicon-align-center:before {
        content: "\e053";
    }
    .glyphicon-align-right:before {
        content: "\e054";
    }
    .glyphicon-align-justify:before {
        content: "\e055";
    }
    .glyphicon-list:before {
        content: "\e056";
    }
    .glyphicon-indent-left:before {
        content: "\e057";
    }
    .glyphicon-indent-right:before {
        content: "\e058";
    }
    .glyphicon-facetime-video:before {
        content: "\e059";
    }
    .glyphicon-picture:before {
        content: "\e060";
    }
    .glyphicon-map-marker:before {
        content: "\e062";
    }
    .glyphicon-adjust:before {
        content: "\e063";
    }
    .glyphicon-tint:before {
        content: "\e064";
    }
    .glyphicon-edit:before {
        content: "\e065";
    }
    .glyphicon-share:before {
        content: "\e066";
    }
    .glyphicon-check:before {
        content: "\e067";
    }
    .glyphicon-move:before {
        content: "\e068";
    }
    .glyphicon-step-backward:before {
        content: "\e069";
    }
    .glyphicon-fast-backward:before {
        content: "\e070";
    }
    .glyphicon-backward:before {
        content: "\e071";
    }
    .glyphicon-play:before {
        content: "\e072";
    }
    .glyphicon-pause:before {
        content: "\e073";
    }
    .glyphicon-stop:before {
        content: "\e074";
    }
    .glyphicon-forward:before {
        content: "\e075";
    }
    .glyphicon-fast-forward:before {
        content: "\e076";
    }
    .glyphicon-step-forward:before {
        content: "\e077";
    }
    .glyphicon-eject:before {
        content: "\e078";
    }
    .glyphicon-chevron-left:before {
        content: "\e079";
    }
    .glyphicon-chevron-right:before {
        content: "\e080";
    }
    .glyphicon-plus-sign:before {
        content: "\e081";
    }
    .glyphicon-minus-sign:before {
        content: "\e082";
    }
    .glyphicon-remove-sign:before {
        content: "\e083";
    }
    .glyphicon-ok-sign:before {
        content: "\e084";
    }
    .glyphicon-question-sign:before {
        content: "\e085";
    }
    .glyphicon-info-sign:before {
        content: "\e086";
    }
    .glyphicon-screenshot:before {
        content: "\e087";
    }
    .glyphicon-remove-circle:before {
        content: "\e088";
    }
    .glyphicon-ok-circle:before {
        content: "\e089";
    }
    .glyphicon-ban-circle:before {
        content: "\e090";
    }
    .glyphicon-arrow-left:before {
        content: "\e091";
    }
    .glyphicon-arrow-right:before {
        content: "\e092";
    }
    .glyphicon-arrow-up:before {
        content: "\e093";
    }
    .glyphicon-arrow-down:before {
        content: "\e094";
    }
    .glyphicon-share-alt:before {
        content: "\e095";
    }
    .glyphicon-resize-full:before {
        content: "\e096";
    }
    .glyphicon-resize-small:before {
        content: "\e097";
    }
    .glyphicon-exclamation-sign:before {
        content: "\e101";
    }
    .glyphicon-gift:before {
        content: "\e102";
    }
    .glyphicon-leaf:before {
        content: "\e103";
    }
    .glyphicon-eye-open:before {
        content: "\e105";
    }
    .glyphicon-eye-close:before {
        content: "\e106";
    }
    .glyphicon-warning-sign:before {
        content: "\e107";
    }
    .glyphicon-plane:before {
        content: "\e108";
    }
    .glyphicon-random:before {
        content: "\e110";
    }
    .glyphicon-comment:before {
        content: "\e111";
    }
    .glyphicon-magnet:before {
        content: "\e112";
    }
    .glyphicon-chevron-up:before {
        content: "\e113";
    }
    .glyphicon-chevron-down:before {
        content: "\e114";
    }
    .glyphicon-retweet:before {
        content: "\e115";
    }
    .glyphicon-shopping-cart:before {
        content: "\e116";
    }
    .glyphicon-folder-close:before {
        content: "\e117";
    }
    .glyphicon-folder-open:before {
        content: "\e118";
    }
    .glyphicon-resize-vertical:before {
        content: "\e119";
    }
    .glyphicon-resize-horizontal:before {
        content: "\e120";
    }
    .glyphicon-hdd:before {
        content: "\e121";
    }
    .glyphicon-bullhorn:before {
        content: "\e122";
    }
    .glyphicon-certificate:before {
        content: "\e124";
    }
    .glyphicon-thumbs-up:before {
        content: "\e125";
    }
    .glyphicon-thumbs-down:before {
        content: "\e126";
    }
    .glyphicon-hand-right:before {
        content: "\e127";
    }
    .glyphicon-hand-left:before {
        content: "\e128";
    }
    .glyphicon-hand-up:before {
        content: "\e129";
    }
    .glyphicon-hand-down:before {
        content: "\e130";
    }
    .glyphicon-circle-arrow-right:before {
        content: "\e131";
    }
    .glyphicon-circle-arrow-left:before {
        content: "\e132";
    }
    .glyphicon-circle-arrow-up:before {
        content: "\e133";
    }
    .glyphicon-circle-arrow-down:before {
        content: "\e134";
    }
    .glyphicon-globe:before {
        content: "\e135";
    }
    .glyphicon-tasks:before {
        content: "\e137";
    }
    .glyphicon-filter:before {
        content: "\e138";
    }
    .glyphicon-fullscreen:before {
        content: "\e140";
    }
    .glyphicon-dashboard:before {
        content: "\e141";
    }
    .glyphicon-heart-empty:before {
        content: "\e143";
    }
    .glyphicon-link:before {
        content: "\e144";
    }
    .glyphicon-phone:before {
        content: "\e145";
    }
    .glyphicon-usd:before {
        content: "\e148";
    }
    .glyphicon-gbp:before {
        content: "\e149";
    }
    .glyphicon-sort:before {
        content: "\e150";
    }
    .glyphicon-sort-by-alphabet:before {
        content: "\e151";
    }
    .glyphicon-sort-by-alphabet-alt:before {
        content: "\e152";
    }
    .glyphicon-sort-by-order:before {
        content: "\e153";
    }
    .glyphicon-sort-by-order-alt:before {
        content: "\e154";
    }
    .glyphicon-sort-by-attributes:before {
        content: "\e155";
    }
    .glyphicon-sort-by-attributes-alt:before {
        content: "\e156";
    }
    .glyphicon-unchecked:before {
        content: "\e157";
    }
    .glyphicon-expand:before {
        content: "\e158";
    }
    .glyphicon-collapse-down:before {
        content: "\e159";
    }
    .glyphicon-collapse-up:before {
        content: "\e160";
    }
    .glyphicon-log-in:before {
        content: "\e161";
    }
    .glyphicon-flash:before {
        content: "\e162";
    }
    .glyphicon-log-out:before {
        content: "\e163";
    }
    .glyphicon-new-window:before {
        content: "\e164";
    }
    .glyphicon-record:before {
        content: "\e165";
    }
    .glyphicon-save:before {
        content: "\e166";
    }
    .glyphicon-open:before {
        content: "\e167";
    }
    .glyphicon-saved:before {
        content: "\e168";
    }
    .glyphicon-import:before {
        content: "\e169";
    }
    .glyphicon-export:before {
        content: "\e170";
    }
    .glyphicon-send:before {
        content: "\e171";
    }
    .glyphicon-floppy-disk:before {
        content: "\e172";
    }
    .glyphicon-floppy-saved:before {
        content: "\e173";
    }
    .glyphicon-floppy-remove:before {
        content: "\e174";
    }
    .glyphicon-floppy-save:before {
        content: "\e175";
    }
    .glyphicon-floppy-open:before {
        content: "\e176";
    }
    .glyphicon-credit-card:before {
        content: "\e177";
    }
    .glyphicon-transfer:before {
        content: "\e178";
    }
    .glyphicon-cutlery:before {
        content: "\e179";
    }
    .glyphicon-header:before {
        content: "\e180";
    }
    .glyphicon-compressed:before {
        content: "\e181";
    }
    .glyphicon-earphone:before {
        content: "\e182";
    }
    .glyphicon-phone-alt:before {
        content: "\e183";
    }
    .glyphicon-tower:before {
        content: "\e184";
    }
    .glyphicon-stats:before {
        content: "\e185";
    }
    .glyphicon-sd-video:before {
        content: "\e186";
    }
    .glyphicon-hd-video:before {
        content: "\e187";
    }
    .glyphicon-subtitles:before {
        content: "\e188";
    }
    .glyphicon-sound-stereo:before {
        content: "\e189";
    }
    .glyphicon-sound-dolby:before {
        content: "\e190";
    }
    .glyphicon-sound-5-1:before {
        content: "\e191";
    }
    .glyphicon-sound-6-1:before {
        content: "\e192";
    }
    .glyphicon-sound-7-1:before {
        content: "\e193";
    }
    .glyphicon-copyright-mark:before {
        content: "\e194";
    }
    .glyphicon-registration-mark:before {
        content: "\e195";
    }
    .glyphicon-cloud-download:before {
        content: "\e197";
    }
    .glyphicon-cloud-upload:before {
        content: "\e198";
    }
    .glyphicon-tree-conifer:before {
        content: "\e199";
    }
    .glyphicon-tree-deciduous:before {
        content: "\e200";
    }
    .glyphicon-briefcase:before {
        content: "\1f4bc";
    }
    .glyphicon-calendar:before {
        content: "\1f4c5";
    }
    .glyphicon-pushpin:before {
        content: "\1f4cc";
    }
    .glyphicon-paperclip:before {
        content: "\1f4ce";
    }
    .glyphicon-camera:before {
        content: "\1f4f7";
    }
    .glyphicon-lock:before {
        content: "\1f512";
    }
    .glyphicon-bell:before {
        content: "\1f514";
    }
    .glyphicon-bookmark:before {
        content: "\1f516";
    }
    .glyphicon-fire:before {
        content: "\1f525";
    }
    .glyphicon-wrench:before {
        content: "\1f527";
    }
    .caret {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 4px solid #000000;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        border-bottom: 0 dotted;
        content: "";
    }
    .dropdown {
        position: relative;
    }
    .dropdown-toggle:focus {
        outline: 0;
    }
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        list-style: none;
        font-size: 14px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        background-clip: padding-box;
    }
    .dropdown-menu.pull-right {
        right: 0;
        left: auto;
    }
    .dropdown-menu .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
    }
    .dropdown-menu > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.428571429;
        color: #5f0808;
        white-space: nowrap;
    }
    .dropdown-menu > li > a:hover,
    .dropdown-menu > li > a:focus {
        text-decoration: none;
        color: #ffffff;
        background-color: #625d5b;
    }
    .dropdown-menu > .active > a,
    .dropdown-menu > .active > a:hover,
    .dropdown-menu > .active > a:focus {
        color: #ffffff;
        text-decoration: none;
        outline: 0;
        background-color: #625d5b;
    }
    .dropdown-menu > .disabled > a,
    .dropdown-menu > .disabled > a:hover,
    .dropdown-menu > .disabled > a:focus {
        color: #98827e;
    }
    .dropdown-menu > .disabled > a:hover,
    .dropdown-menu > .disabled > a:focus {
        text-decoration: none;
        background-color: transparent;
        background-image: none;
        filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
        cursor: not-allowed;
    }
    .open > .dropdown-menu {
        display: block;
    }
    .open > a {
        outline: 0;
    }
    .dropdown-header {
        display: block;
        padding: 3px 20px;
        font-size: 12px;
        line-height: 1.428571429;
        color: #98827e;
    }
    .dropdown-backdrop {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        z-index: 990;
    }
    .pull-right > .dropdown-menu {
        right: 0;
        left: auto;
    }
    .dropup .caret,
    .navbar-fixed-bottom .dropdown .caret {
        border-top: 0 dotted;
        border-bottom: 4px solid #000000;
        content: "";
    }
    .dropup .dropdown-menu,
    .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: auto;
        bottom: 100%;
        margin-bottom: 1px;
    }
    @media (min-width: 768px) {
        .navbar-right .dropdown-menu {
            right: 0;
            left: auto;
        }
    }
    .btn-default .caret {
        border-top-color: #333333;
    }
    .btn-primary .caret,
    .btn-success .caret,
    .btn-warning .caret,
    .btn-danger .caret,
    .btn-info .caret {
        border-top-color: #fff;
    }
    .dropup .btn-default .caret {
        border-bottom-color: #333333;
    }
    .dropup .btn-primary .caret,
    .dropup .btn-success .caret,
    .dropup .btn-warning .caret,
    .dropup .btn-danger .caret,
    .dropup .btn-info .caret {
        border-bottom-color: #fff;
    }
    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: inline-block;
        vertical-align: middle;
    }
    .btn-group > .btn,
    .btn-group-vertical > .btn {
        position: relative;
        float: left;
    }
    .btn-group > .btn:hover,
    .btn-group-vertical > .btn:hover,
    .btn-group > .btn:focus,
    .btn-group-vertical > .btn:focus,
    .btn-group > .btn:active,
    .btn-group-vertical > .btn:active,
    .btn-group > .btn.active,
    .btn-group-vertical > .btn.active {
        z-index: 2;
    }
    .btn-group > .btn:focus,
    .btn-group-vertical > .btn:focus {
        outline: none;
    }
    .btn-group .btn + .btn,
    .btn-group .btn + .btn-group,
    .btn-group .btn-group + .btn,
    .btn-group .btn-group + .btn-group {
        margin-left: -1px;
    }
    .btn-toolbar:before,
    .btn-toolbar:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .btn-toolbar:after {
        clear: both;
    }
    .btn-toolbar:before,
    .btn-toolbar:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .btn-toolbar:after {
        clear: both;
    }
    .btn-toolbar .btn-group {
        float: left;
    }
    .btn-toolbar > .btn + .btn,
    .btn-toolbar > .btn-group + .btn,
    .btn-toolbar > .btn + .btn-group,
    .btn-toolbar > .btn-group + .btn-group {
        margin-left: 5px;
    }
    .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
        border-radius: 0;
    }
    .btn-group > .btn:first-child {
        margin-left: 0;
    }
    .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }
    .btn-group > .btn:last-child:not(:first-child),
    .btn-group > .dropdown-toggle:not(:first-child) {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }
    .btn-group > .btn-group {
        float: left;
    }
    .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0;
    }
    .btn-group > .btn-group:first-child > .btn:last-child,
    .btn-group > .btn-group:first-child > .dropdown-toggle {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }
    .btn-group > .btn-group:last-child > .btn:first-child {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }
    .btn-group .dropdown-toggle:active,
    .btn-group.open .dropdown-toggle {
        outline: 0;
    }
    .btn-group-xs > .btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
        padding: 1px 5px;
    }
    .btn-group-sm > .btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    .btn-group-lg > .btn {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }
    .btn-group > .btn + .dropdown-toggle {
        padding-left: 8px;
        padding-right: 8px;
    }
    .btn-group > .btn-lg + .dropdown-toggle {
        padding-left: 12px;
        padding-right: 12px;
    }
    .btn-group.open .dropdown-toggle {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }
    .btn .caret {
        margin-left: 0;
    }
    .btn-lg .caret {
        border-width: 5px 5px 0;
        border-bottom-width: 0;
    }
    .dropup .btn-lg .caret {
        border-width: 0 5px 5px;
    }
    .btn-group-vertical > .btn,
    .btn-group-vertical > .btn-group {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
    }
    .btn-group-vertical > .btn-group:before,
    .btn-group-vertical > .btn-group:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .btn-group-vertical > .btn-group:after {
        clear: both;
    }
    .btn-group-vertical > .btn-group:before,
    .btn-group-vertical > .btn-group:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .btn-group-vertical > .btn-group:after {
        clear: both;
    }
    .btn-group-vertical > .btn-group > .btn {
        float: none;
    }
    .btn-group-vertical > .btn + .btn,
    .btn-group-vertical > .btn + .btn-group,
    .btn-group-vertical > .btn-group + .btn,
    .btn-group-vertical > .btn-group + .btn-group {
        margin-top: -1px;
        margin-left: 0;
    }
    .btn-group-vertical > .btn:not(:first-child):not(:last-child) {
        border-radius: 0;
    }
    .btn-group-vertical > .btn:first-child:not(:last-child) {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .btn-group-vertical > .btn:last-child:not(:first-child) {
        border-bottom-left-radius: 4px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0;
    }
    .btn-group-vertical > .btn-group:first-child > .btn:last-child,
    .btn-group-vertical > .btn-group:first-child > .dropdown-toggle {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .btn-group-vertical > .btn-group:last-child > .btn:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .btn-group-justified {
        display: table;
        width: 100%;
        table-layout: fixed;
        border-collapse: separate;
    }
    .btn-group-justified .btn {
        float: none;
        display: table-cell;
        width: 1%;
    }
    [data-toggle="buttons"] > .btn > input[type="radio"],
    [data-toggle="buttons"] > .btn > input[type="checkbox"] {
        display: none;
    }
    .input-group {
        position: relative;
        display: table;
        border-collapse: separate;
    }
    .input-group.col {
        float: none;
        padding-left: 0;
        padding-right: 0;
    }
    .input-group .form-control {
        width: 100%;
        margin-bottom: 0;
    }
    .input-group-lg > .form-control,
    .input-group-lg > .input-group-addon,
    .input-group-lg > .input-group-btn > .btn {
        height: 45px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }
    select.input-group-lg > .form-control,
    select.input-group-lg > .input-group-addon,
    select.input-group-lg > .input-group-btn > .btn {
        height: 45px;
        line-height: 45px;
    }
    textarea.input-group-lg > .form-control,
    textarea.input-group-lg > .input-group-addon,
    textarea.input-group-lg > .input-group-btn > .btn {
        height: auto;
    }
    .input-group-sm > .form-control,
    .input-group-sm > .input-group-addon,
    .input-group-sm > .input-group-btn > .btn {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    select.input-group-sm > .form-control,
    select.input-group-sm > .input-group-addon,
    select.input-group-sm > .input-group-btn > .btn {
        height: 30px;
        line-height: 30px;
    }
    textarea.input-group-sm > .form-control,
    textarea.input-group-sm > .input-group-addon,
    textarea.input-group-sm > .input-group-btn > .btn {
        height: auto;
    }
    .input-group-addon,
    .input-group-btn,
    .input-group .form-control {
        display: table-cell;
    }
    .input-group-addon:not(:first-child):not(:last-child),
    .input-group-btn:not(:first-child):not(:last-child),
    .input-group .form-control:not(:first-child):not(:last-child) {
        border-radius: 0;
    }
    .input-group-addon,
    .input-group-btn {
        width: 1%;
        white-space: nowrap;
        vertical-align: middle;
    }
    .input-group-addon {
        padding: 6px 12px;
        font-size: 14px;
        font-weight: normal;
        line-height: 1;
        text-align: center;
        background-color: #c0a4a1;
        border: 1px solid #cccccc;
        border-radius: 4px;
    }
    .input-group-addon.input-sm {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 3px;
    }
    .input-group-addon.input-lg {
        padding: 10px 16px;
        font-size: 18px;
        border-radius: 6px;
    }
    .input-group-addon input[type="radio"],
    .input-group-addon input[type="checkbox"] {
        margin-top: 0;
    }
    .input-group .form-control:first-child,
    .input-group-addon:first-child,
    .input-group-btn:first-child > .btn,
    .input-group-btn:first-child > .dropdown-toggle,
    .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }
    .input-group-addon:first-child {
        border-right: 0;
    }
    .input-group .form-control:last-child,
    .input-group-addon:last-child,
    .input-group-btn:last-child > .btn,
    .input-group-btn:last-child > .dropdown-toggle,
    .input-group-btn:first-child > .btn:not(:first-child) {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
    }
    .input-group-addon:last-child {
        border-left: 0;
    }
    .input-group-btn {
        position: relative;
        white-space: nowrap;
    }
    .input-group-btn > .btn {
        position: relative;
    }
    .input-group-btn > .btn + .btn {
        margin-left: -4px;
    }
    .input-group-btn > .btn:hover,
    .input-group-btn > .btn:active {
        z-index: 2;
    }
    .nav {
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;
    }
    .nav:before,
    .nav:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .nav:after {
        clear: both;
    }
    .nav:before,
    .nav:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .nav:after {
        clear: both;
    }
    .nav > li {
        position: relative;
        display: block;
    }
    .nav > li > a {
        position: relative;
        display: block;
        padding: 10px 15px;
    }
    .nav > li > a:hover,
    .nav > li > a:focus {
        text-decoration: none;
        background-color: #c0a4a1;
    }
    .nav > li.disabled > a {
        color: #98827e;
    }
    .nav > li.disabled > a:hover,
    .nav > li.disabled > a:focus {
        color: #98827e;
        text-decoration: none;
        background-color: transparent;
        cursor: not-allowed;
    }
    .nav .open > a,
    .nav .open > a:hover,
    .nav .open > a:focus {
        background-color: #c0a4a1;
        border-color: #625d5b;
    }
    .nav .nav-divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
    }
    .nav > li > a > img {
        max-width: none;
    }
    .nav-tabs {
        border-bottom: 1px solid #dddddd;
    }
    .nav-tabs > li {
        float: left;
        margin-bottom: -1px;
    }
    .nav-tabs > li > a {
        margin-right: 2px;
        line-height: 1.428571429;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs > li > a:hover {
        border-color: #c0a4a1 #c0a4a1 #dddddd;
    }
    .nav-tabs > li.active > a,
    .nav-tabs > li.active > a:hover,
    .nav-tabs > li.active > a:focus {
        color: #bb1f1e;
        background-color: #fbf8f7;
        border: 1px solid #dddddd;
        border-bottom-color: transparent;
        cursor: default;
    }
    .nav-tabs.nav-justified {
        width: 100%;
        border-bottom: 0;
    }
    .nav-tabs.nav-justified > li {
        float: none;
    }
    .nav-tabs.nav-justified > li > a {
        text-align: center;
    }
    @media (min-width: 768px) {
        .nav-tabs.nav-justified > li {
            display: table-cell;
            width: 1%;
        }
    }
    .nav-tabs.nav-justified > li > a {
        border-bottom: 1px solid #dddddd;
        margin-right: 0;
    }
    .nav-tabs.nav-justified > .active > a {
        border-bottom-color: #fbf8f7;
    }
    .nav-pills > li {
        float: left;
    }
    .nav-pills > li > a {
        border-radius: 5px;
    }
    .nav-pills > li + li {
        margin-left: 2px;
    }
    .nav-pills > li.active > a,
    .nav-pills > li.active > a:hover,
    .nav-pills > li.active > a:focus {
        color: #ffffff;
        background-color: #625d5b;
    }
    .nav-stacked > li {
        float: none;
    }
    .nav-stacked > li + li {
        margin-top: 2px;
        margin-left: 0;
    }
    .nav-justified {
        width: 100%;
    }
    .nav-justified > li {
        float: none;
    }
    .nav-justified > li > a {
        text-align: center;
    }
    @media (min-width: 768px) {
        .nav-justified > li {
            display: table-cell;
            width: 1%;
        }
    }
    .nav-tabs-justified {
        border-bottom: 0;
    }
    .nav-tabs-justified > li > a {
        border-bottom: 1px solid #dddddd;
        margin-right: 0;
    }
    .nav-tabs-justified > .active > a {
        border-bottom-color: #fbf8f7;
    }
    .tabbable:before,
    .tabbable:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .tabbable:after {
        clear: both;
    }
    .tabbable:before,
    .tabbable:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .tabbable:after {
        clear: both;
    }
    .tab-content > .tab-pane,
    .pill-content > .pill-pane {
        display: none;
    }
    .tab-content > .active,
    .pill-content > .active {
        display: block;
    }
    .nav .caret {
        border-top-color: #625d5b;
        border-bottom-color: #625d5b;
    }
    .nav a:hover .caret {
        border-top-color: #3a3736;
        border-bottom-color: #3a3736;
    }
    .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .navbar {
        position: relative;
        z-index: 1000;
        min-height: 50px;
        margin-bottom: 20px;
        border: 1px solid transparent;
    }
    .navbar:before,
    .navbar:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar:after {
        clear: both;
    }
    .navbar:before,
    .navbar:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar:after {
        clear: both;
    }
    @media (min-width: 768px) {
        .navbar {
            border-radius: 4px;
        }
    }
    .navbar-header:before,
    .navbar-header:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar-header:after {
        clear: both;
    }
    .navbar-header:before,
    .navbar-header:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar-header:after {
        clear: both;
    }
    @media (min-width: 768px) {
        .navbar-header {
            float: left;
        }
    }
    .navbar-collapse {
        max-height: 340px;
        overflow-x: visible;
        padding-right: 15px;
        padding-left: 15px;
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
        -webkit-overflow-scrolling: touch;
    }
    .navbar-collapse:before,
    .navbar-collapse:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar-collapse:after {
        clear: both;
    }
    .navbar-collapse:before,
    .navbar-collapse:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .navbar-collapse:after {
        clear: both;
    }
    .navbar-collapse.in {
        overflow-y: auto;
    }
    @media (min-width: 768px) {
        .navbar-collapse {
            width: auto;
            border-top: 0;
            box-shadow: none;
        }
        .navbar-collapse.collapse {
            display: block !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important;
        }
        .navbar-collapse.in {
            overflow-y: visible;
        }
        .navbar-collapse .navbar-nav.navbar-left:first-child {
            margin-left: -15px;
        }
        .navbar-collapse .navbar-nav.navbar-right:last-child {
            margin-right: -15px;
        }
        .navbar-collapse .navbar-text:last-child {
            margin-right: 0;
        }
    }
    .container > .navbar-header,
    .container > .navbar-collapse {
        margin-right: -15px;
        margin-left: -15px;
    }
    @media (min-width: 768px) {
        .container > .navbar-header,
        .container > .navbar-collapse {
            margin-right: 0;
            margin-left: 0;
        }
    }
    .navbar-static-top {
        border-width: 0 0 1px;
    }
    @media (min-width: 768px) {
        .navbar-static-top {
            border-radius: 0;
        }
    }
    .navbar-fixed-top,
    .navbar-fixed-bottom {
        position: fixed;
        right: 0;
        left: 0;
        border-width: 0 0 1px;
    }
    @media (min-width: 768px) {
        .navbar-fixed-top,
        .navbar-fixed-bottom {
            border-radius: 0;
        }
    }
    .navbar-fixed-top {
        z-index: 1030;
        top: 0;
    }
    .navbar-fixed-bottom {
        bottom: 0;
        margin-bottom: 0;
    }
    .navbar-brand {
        float: left;
        padding: 15px 15px;
        font-size: 18px;
        line-height: 20px;
    }
    .navbar-brand:hover,
    .navbar-brand:focus {
        text-decoration: none;
    }
    @media (min-width: 768px) {
        .navbar > .container .navbar-brand {
            margin-left: -15px;
        }
    }
    .navbar-toggle {
        position: relative;
        float: right;
        margin-right: 15px;
        padding: 9px 10px;
        margin-top: 8px;
        margin-bottom: 8px;
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .navbar-toggle .icon-bar {
        display: block;
        width: 22px;
        height: 2px;
        border-radius: 1px;
    }
    .navbar-toggle .icon-bar + .icon-bar {
        margin-top: 4px;
    }
    @media (min-width: 768px) {
        .navbar-toggle {
            display: none;
        }
    }
    .navbar-nav {
        margin: 7.5px -15px;
    }
    .navbar-nav > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 20px;
    }
    @media (max-width: 767px) {
        .navbar-nav .open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            box-shadow: none;
        }
        .navbar-nav .open .dropdown-menu > li > a,
        .navbar-nav .open .dropdown-menu .dropdown-header {
            padding: 5px 15px 5px 25px;
        }
        .navbar-nav .open .dropdown-menu > li > a {
            line-height: 20px;
        }
        .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-nav .open .dropdown-menu > li > a:focus {
            background-image: none;
        }
    }
    @media (min-width: 768px) {
        .navbar-nav {
            float: left;
            margin: 0;
        }
        .navbar-nav > li {
            float: left;
        }
        .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    }
    @media (min-width: 768px) {
        .navbar-left {
            float: left !important;
        }
        .navbar-right {
            float: right !important;
        }
    }
    .navbar-form {
        margin-left: -15px;
        margin-right: -15px;
        padding: 10px 15px;
        border-top: 1px solid transparent;
        border-bottom: 1px solid transparent;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);
        margin-top: 8px;
        margin-bottom: 8px;
    }
    @media (min-width: 768px) {
        .navbar-form .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
        }
        .navbar-form .form-control {
            display: inline-block;
        }
        .navbar-form .radio,
        .navbar-form .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            padding-left: 0;
        }
        .navbar-form .radio input[type="radio"],
        .navbar-form .checkbox input[type="checkbox"] {
            float: none;
            margin-left: 0;
        }
    }
    @media (max-width: 767px) {
        .navbar-form .form-group {
            margin-bottom: 5px;
        }
    }
    @media (min-width: 768px) {
        .navbar-form {
            width: auto;
            border: 0;
            margin-left: 0;
            margin-right: 0;
            padding-top: 0;
            padding-bottom: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    }
    .navbar-nav > li > .dropdown-menu {
        margin-top: 0;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .navbar-nav.pull-right > li > .dropdown-menu,
    .navbar-nav > li > .dropdown-menu.pull-right {
        left: auto;
        right: 0;
    }
    .navbar-btn {
        margin-top: 8px;
        margin-bottom: 8px;
    }
    .navbar-text {
        float: left;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    @media (min-width: 768px) {
        .navbar-text {
            margin-left: 15px;
            margin-right: 15px;
        }
    }
    .navbar-default {
        background-color: #f8f8f8;
        border-color: #e7e7e7;
    }
    .navbar-default .navbar-brand {
        color: #777777;
    }
    .navbar-default .navbar-brand:hover,
    .navbar-default .navbar-brand:focus {
        color: #5e5e5e;
        background-color: transparent;
    }
    .navbar-default .navbar-text {
        color: #777777;
    }
    .navbar-default .navbar-nav > li > a {
        color: #777777;
    }
    .navbar-default .navbar-nav > li > a:hover,
    .navbar-default .navbar-nav > li > a:focus {
        color: #333333;
        background-color: transparent;
    }
    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        color: #555555;
        background-color: #e7e7e7;
    }
    .navbar-default .navbar-nav > .disabled > a,
    .navbar-default .navbar-nav > .disabled > a:hover,
    .navbar-default .navbar-nav > .disabled > a:focus {
        color: #cccccc;
        background-color: transparent;
    }
    .navbar-default .navbar-toggle {
        border-color: #dddddd;
    }
    .navbar-default .navbar-toggle:hover,
    .navbar-default .navbar-toggle:focus {
        background-color: #dddddd;
    }
    .navbar-default .navbar-toggle .icon-bar {
        background-color: #cccccc;
    }
    .navbar-default .navbar-collapse,
    .navbar-default .navbar-form {
        border-color: #e6e6e6;
    }
    .navbar-default .navbar-nav > .dropdown > a:hover .caret,
    .navbar-default .navbar-nav > .dropdown > a:focus .caret {
        border-top-color: #333333;
        border-bottom-color: #333333;
    }
    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
        background-color: #e7e7e7;
        color: #555555;
    }
    .navbar-default .navbar-nav > .open > a .caret,
    .navbar-default .navbar-nav > .open > a:hover .caret,
    .navbar-default .navbar-nav > .open > a:focus .caret {
        border-top-color: #555555;
        border-bottom-color: #555555;
    }
    .navbar-default .navbar-nav > .dropdown > a .caret {
        border-top-color: #777777;
        border-bottom-color: #777777;
    }
    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #777777;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #333333;
            background-color: transparent;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #555555;
            background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a,
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus {
            color: #cccccc;
            background-color: transparent;
        }
    }
    .navbar-default .navbar-link {
        color: #777777;
    }
    .navbar-default .navbar-link:hover {
        color: #333333;
    }
    .navbar-inverse {
        background-color: #090404;
        border-color: #000000;
    }
    .navbar-inverse .navbar-brand {
        color: #98827e;
    }
    .navbar-inverse .navbar-brand:hover,
    .navbar-inverse .navbar-brand:focus {
        color: #ffffff;
        background-color: transparent;
    }
    .navbar-inverse .navbar-text {
        color: #98827e;
    }
    .navbar-inverse .navbar-nav > li > a {
        color: #98827e;
    }
    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li > a:focus {
        color: #ffffff;
        background-color: transparent;
    }
    .navbar-inverse .navbar-nav > .active > a,
    .navbar-inverse .navbar-nav > .active > a:hover,
    .navbar-inverse .navbar-nav > .active > a:focus {
        color: #ffffff;
        background-color: #000000;
    }
    .navbar-inverse .navbar-nav > .disabled > a,
    .navbar-inverse .navbar-nav > .disabled > a:hover,
    .navbar-inverse .navbar-nav > .disabled > a:focus {
        color: #444444;
        background-color: transparent;
    }
    .navbar-inverse .navbar-toggle {
        border-color: #333333;
    }
    .navbar-inverse .navbar-toggle:hover,
    .navbar-inverse .navbar-toggle:focus {
        background-color: #333333;
    }
    .navbar-inverse .navbar-toggle .icon-bar {
        background-color: #ffffff;
    }
    .navbar-inverse .navbar-collapse,
    .navbar-inverse .navbar-form {
        border-color: #000000;
    }
    .navbar-inverse .navbar-nav > .open > a,
    .navbar-inverse .navbar-nav > .open > a:hover,
    .navbar-inverse .navbar-nav > .open > a:focus {
        background-color: #000000;
        color: #ffffff;
    }
    .navbar-inverse .navbar-nav > .dropdown > a:hover .caret {
        border-top-color: #ffffff;
        border-bottom-color: #ffffff;
    }
    .navbar-inverse .navbar-nav > .dropdown > a .caret {
        border-top-color: #98827e;
        border-bottom-color: #98827e;
    }
    .navbar-inverse .navbar-nav > .open > a .caret,
    .navbar-inverse .navbar-nav > .open > a:hover .caret,
    .navbar-inverse .navbar-nav > .open > a:focus .caret {
        border-top-color: #ffffff;
        border-bottom-color: #ffffff;
    }
    @media (max-width: 767px) {
        .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
            border-color: #000000;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
            color: #98827e;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #ffffff;
            background-color: transparent;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #ffffff;
            background-color: #000000;
        }
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
            color: #444444;
            background-color: transparent;
        }
    }
    .navbar-inverse .navbar-link {
        color: #98827e;
    }
    .navbar-inverse .navbar-link:hover {
        color: #ffffff;
    }
    .breadcrumb {
        padding: 8px 15px;
        margin-bottom: 20px;
        list-style: none;
        background-color: #f5f5f5;
        border-radius: 4px;
    }
    .breadcrumb > li {
        display: inline-block;
    }
    .breadcrumb > li + li:before {
        content: "/\00a0";
        padding: 0 5px;
        color: #cccccc;
    }
    .breadcrumb > .active {
        color: #98827e;
    }
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        line-height: 1.428571429;
        text-decoration: none;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        margin-left: -1px;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
    }
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        background-color: #c0a4a1;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 2;
        color: #ffffff;
        background-color: #625d5b;
        border-color: #625d5b;
        cursor: default;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #98827e;
        background-color: #ffffff;
        border-color: #dddddd;
        cursor: not-allowed;
    }
    .pagination-lg > li > a,
    .pagination-lg > li > span {
        padding: 10px 16px;
        font-size: 18px;
    }
    .pagination-lg > li:first-child > a,
    .pagination-lg > li:first-child > span {
        border-bottom-left-radius: 6px;
        border-top-left-radius: 6px;
    }
    .pagination-lg > li:last-child > a,
    .pagination-lg > li:last-child > span {
        border-bottom-right-radius: 6px;
        border-top-right-radius: 6px;
    }
    .pagination-sm > li > a,
    .pagination-sm > li > span {
        padding: 5px 10px;
        font-size: 12px;
    }
    .pagination-sm > li:first-child > a,
    .pagination-sm > li:first-child > span {
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
    }
    .pagination-sm > li:last-child > a,
    .pagination-sm > li:last-child > span {
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
    }
    .pager {
        padding-left: 0;
        margin: 20px 0;
        list-style: none;
        text-align: center;
    }
    .pager:before,
    .pager:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .pager:after {
        clear: both;
    }
    .pager:before,
    .pager:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .pager:after {
        clear: both;
    }
    .pager li {
        display: inline;
    }
    .pager li > a,
    .pager li > span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 15px;
    }
    .pager li > a:hover,
    .pager li > a:focus {
        text-decoration: none;
        background-color: #c0a4a1;
    }
    .pager .next > a,
    .pager .next > span {
        float: right;
    }
    .pager .previous > a,
    .pager .previous > span {
        float: left;
    }
    .pager .disabled > a,
    .pager .disabled > a:hover,
    .pager .disabled > a:focus,
    .pager .disabled > span {
        color: #98827e;
        background-color: #ffffff;
        cursor: not-allowed;
    }
    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: bold;
        line-height: 1;
        color: #ffffff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }
    .label[href]:hover,
    .label[href]:focus {
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
    }
    .label:empty {
        display: none;
    }
    .label-default {
        background-color: #98827e;
    }
    .label-default[href]:hover,
    .label-default[href]:focus {
        background-color: #7e6965;
    }
    .label-primary {
        background-color: #625d5b;
    }
    .label-primary[href]:hover,
    .label-primary[href]:focus {
        background-color: #484442;
    }
    .label-success {
        background-color: #5cb85c;
    }
    .label-success[href]:hover,
    .label-success[href]:focus {
        background-color: #449d44;
    }
    .label-info {
        background-color: #5bc0de;
    }
    .label-info[href]:hover,
    .label-info[href]:focus {
        background-color: #31b0d5;
    }
    .label-warning {
        background-color: #f0ad4e;
    }
    .label-warning[href]:hover,
    .label-warning[href]:focus {
        background-color: #ec971f;
    }
    .label-danger {
        background-color: #d9534f;
    }
    .label-danger[href]:hover,
    .label-danger[href]:focus {
        background-color: #c9302c;
    }
    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: bold;
        color: #ffffff;
        line-height: 1;
        vertical-align: baseline;
        white-space: nowrap;
        text-align: center;
        background-color: #98827e;
        border-radius: 10px;
    }
    .badge:empty {
        display: none;
    }
    a.badge:hover,
    a.badge:focus {
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
    }
    .btn .badge {
        position: relative;
        top: -1px;
    }
    a.list-group-item.active > .badge,
    .nav-pills > .active > a > .badge {
        color: #625d5b;
        background-color: #ffffff;
    }
    .nav-pills > li > a > .badge {
        margin-left: 3px;
    }
    .jumbotron {
        padding: 30px;
        margin-bottom: 30px;
        font-size: 21px;
        font-weight: 200;
        line-height: 2.1428571435;
        color: inherit;
        background-color: #c0a4a1;
    }
    .jumbotron h1 {
        line-height: 1;
        color: inherit;
    }
    .jumbotron p {
        line-height: 1.4;
    }
    .container .jumbotron {
        border-radius: 6px;
    }
    @media screen and (min-width: 768px) {
        .jumbotron {
            padding-top: 48px;
            padding-bottom: 48px;
        }
        .container .jumbotron {
            padding-left: 60px;
            padding-right: 60px;
        }
        .jumbotron h1 {
            font-size: 63px;
        }
    }
    .thumbnail {
        padding: 4px;
        line-height: 1.428571429;
        background-color: #fbf8f7;
        border: 1px solid #dddddd;
        border-radius: 4px;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        display: inline-block;
        max-width: 100%;
        height: auto;
        display: block;
    }
    .thumbnail > img {
        display: block;
        max-width: 100%;
        height: auto;
    }
    a.thumbnail:hover,
    a.thumbnail:focus {
        border-color: #625d5b;
    }
    .thumbnail > img {
        margin-left: auto;
        margin-right: auto;
    }
    .thumbnail .caption {
        padding: 9px;
        color: #5f0808;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert h4 {
        margin-top: 0;
        color: inherit;
    }
    .alert .alert-link {
        font-weight: bold;
    }
    .alert > p,
    .alert > ul {
        margin-bottom: 0;
    }
    .alert > p + p {
        margin-top: 5px;
    }
    .alert-dismissable {
        padding-right: 35px;
    }
    .alert-dismissable .close {
        position: relative;
        top: -2px;
        right: -21px;
        color: inherit;
    }
    .alert-success {
        background-color: #dff0d8;
        border-color: #d6e9c6;
        color: #468847;
    }
    .alert-success hr {
        border-top-color: #c9e2b3;
    }
    .alert-success .alert-link {
        color: #356635;
    }
    .alert-info {
        background-color: #d9edf7;
        border-color: #bce8f1;
        color: #3a87ad;
    }
    .alert-info hr {
        border-top-color: #a6e1ec;
    }
    .alert-info .alert-link {
        color: #2d6987;
    }
    .alert-warning {
        background-color: #fcf8e3;
        border-color: #fbeed5;
        color: #c09853;
    }
    .alert-warning hr {
        border-top-color: #f8e5be;
    }
    .alert-warning .alert-link {
        color: #a47e3c;
    }
    .alert-danger {
        background-color: #f2dede;
        border-color: #eed3d7;
        color: #b94a48;
    }
    .alert-danger hr {
        border-top-color: #e6c1c7;
    }
    .alert-danger .alert-link {
        color: #953b39;
    }
    @-webkit-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
    }
    @-moz-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
    }
    @-o-keyframes progress-bar-stripes {
        from {
            background-position: 0 0;
        }
        to {
            background-position: 40px 0;
        }
    }
    @keyframes progress-bar-stripes {
        from {
            background-position: 40px 0;
        }
        to {
            background-position: 0 0;
        }
    }
    .progress {
        overflow: hidden;
        height: 20px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }
    .progress-bar {
        float: left;
        width: 0%;
        height: 100%;
        font-size: 12px;
        color: #ffffff;
        text-align: center;
        background-color: #625d5b;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: width 0.6s ease;
        transition: width 0.6s ease;
    }
    .progress-striped .progress-bar {
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-size: 40px 40px;
    }
    .progress.active .progress-bar {
        -webkit-animation: progress-bar-stripes 2s linear infinite;
        -moz-animation: progress-bar-stripes 2s linear infinite;
        -ms-animation: progress-bar-stripes 2s linear infinite;
        -o-animation: progress-bar-stripes 2s linear infinite;
        animation: progress-bar-stripes 2s linear infinite;
    }
    .progress-bar-success {
        background-color: #5cb85c;
    }
    .progress-striped .progress-bar-success {
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-info {
        background-color: #5bc0de;
    }
    .progress-striped .progress-bar-info {
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-warning {
        background-color: #f0ad4e;
    }
    .progress-striped .progress-bar-warning {
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .progress-bar-danger {
        background-color: #d9534f;
    }
    .progress-striped .progress-bar-danger {
        background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
        background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    }
    .media,
    .media-body {
        overflow: hidden;
        zoom: 1;
    }
    .media,
    .media .media {
        margin-top: 15px;
    }
    .media:first-child {
        margin-top: 0;
    }
    .media-object {
        display: block;
    }
    .media-heading {
        margin: 0 0 5px;
    }
    .media > .pull-left {
        margin-right: 10px;
    }
    .media > .pull-right {
        margin-left: 10px;
    }
    .media-list {
        padding-left: 0;
        list-style: none;
    }
    .list-group {
        margin-bottom: 20px;
        padding-left: 0;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #ffffff;
        border: 1px solid #dddddd;
    }
    .list-group-item:first-child {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }
    .list-group-item:last-child {
        margin-bottom: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .list-group-item > .badge {
        float: right;
    }
    .list-group-item > .badge + .badge {
        margin-right: 5px;
    }
    a.list-group-item {
        color: #555555;
    }
    a.list-group-item .list-group-item-heading {
        color: #333333;
    }
    a.list-group-item:hover,
    a.list-group-item:focus {
        text-decoration: none;
        background-color: #f5f5f5;
    }
    .list-group-item.active,
    .list-group-item.active:hover,
    .list-group-item.active:focus {
        z-index: 2;
        color: #ffffff;
        background-color: #625d5b;
        border-color: #625d5b;
    }
    .list-group-item.active .list-group-item-heading,
    .list-group-item.active:hover .list-group-item-heading,
    .list-group-item.active:focus .list-group-item-heading {
        color: inherit;
    }
    .list-group-item.active .list-group-item-text,
    .list-group-item.active:hover .list-group-item-text,
    .list-group-item.active:focus .list-group-item-text {
        color: #c7c4c2;
    }
    .list-group-item-heading {
        margin-top: 0;
        margin-bottom: 5px;
    }
    .list-group-item-text {
        margin-bottom: 0;
        line-height: 1.3;
    }
    .panel {
        margin-bottom: 20px;
        background-color: #ffffff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .panel-body {
        padding: 15px;
    }
    .panel-body:before,
    .panel-body:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .panel-body:after {
        clear: both;
    }
    .panel-body:before,
    .panel-body:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .panel-body:after {
        clear: both;
    }
    .panel > .list-group {
        margin-bottom: 0;
    }
    .panel > .list-group .list-group-item {
        border-width: 1px 0;
    }
    .panel > .list-group .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .panel > .list-group .list-group-item:last-child {
        border-bottom: 0;
    }
    .panel-heading + .list-group .list-group-item:first-child {
        border-top-width: 0;
    }
    .panel > .table {
        margin-bottom: 0;
    }
    .panel > .panel-body + .table {
        border-top: 1px solid #5f0808;
    }
    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px;
    }
    .panel-title > a {
        color: inherit;
    }
    .panel-footer {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #dddddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    .panel-group .panel {
        margin-bottom: 0;
        border-radius: 4px;
        overflow: hidden;
    }
    .panel-group .panel + .panel {
        margin-top: 5px;
    }
    .panel-group .panel-heading {
        border-bottom: 0;
    }
    .panel-group .panel-heading + .panel-collapse .panel-body {
        border-top: 1px solid #dddddd;
    }
    .panel-group .panel-footer {
        border-top: 0;
    }
    .panel-group .panel-footer + .panel-collapse .panel-body {
        border-bottom: 1px solid #dddddd;
    }
    .panel-default {
        border-color: #dddddd;
    }
    .panel-default > .panel-heading {
        color: #5f0808;
        background-color: #f5f5f5;
        border-color: #dddddd;
    }
    .panel-default > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #dddddd;
    }
    .panel-default > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #dddddd;
    }
    .panel-primary {
        border-color: #625d5b;
    }
    .panel-primary > .panel-heading {
        color: #ffffff;
        background-color: #625d5b;
        border-color: #625d5b;
    }
    .panel-primary > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #625d5b;
    }
    .panel-primary > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #625d5b;
    }
    .panel-success {
        border-color: #d6e9c6;
    }
    .panel-success > .panel-heading {
        color: #468847;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .panel-success > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #d6e9c6;
    }
    .panel-success > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #d6e9c6;
    }
    .panel-warning {
        border-color: #fbeed5;
    }
    .panel-warning > .panel-heading {
        color: #c09853;
        background-color: #fcf8e3;
        border-color: #fbeed5;
    }
    .panel-warning > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #fbeed5;
    }
    .panel-warning > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #fbeed5;
    }
    .panel-danger {
        border-color: #eed3d7;
    }
    .panel-danger > .panel-heading {
        color: #b94a48;
        background-color: #f2dede;
        border-color: #eed3d7;
    }
    .panel-danger > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #eed3d7;
    }
    .panel-danger > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #eed3d7;
    }
    .panel-info {
        border-color: #bce8f1;
    }
    .panel-info > .panel-heading {
        color: #3a87ad;
        background-color: #d9edf7;
        border-color: #bce8f1;
    }
    .panel-info > .panel-heading + .panel-collapse .panel-body {
        border-top-color: #bce8f1;
    }
    .panel-info > .panel-footer + .panel-collapse .panel-body {
        border-bottom-color: #bce8f1;
    }
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .well blockquote {
        border-color: #ddd;
        border-color: rgba(0, 0, 0, 0.15);
    }
    .well-lg {
        padding: 24px;
        border-radius: 6px;
    }
    .well-sm {
        padding: 9px;
        border-radius: 3px;
    }
    .close {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 1;
        color: #000000;
        text-shadow: 0 1px 0 #ffffff;
        opacity: 0.2;
        filter: alpha(opacity=20);
    }
    .close:hover,
    .close:focus {
        color: #000000;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.5;
        filter: alpha(opacity=50);
    }
    button.close {
        padding: 0;
        cursor: pointer;
        background: transparent;
        border: 0;
        -webkit-appearance: none;
    }
    .modal-open {
        overflow: hidden;
    }
    body.modal-open,
    .modal-open .navbar-fixed-top,
    .modal-open .navbar-fixed-bottom {
        margin-right: 15px;
    }
    .modal {
        display: none;
        overflow: auto;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
    }
    .modal.fade .modal-dialog {
        -webkit-transform: translate(0, -25%);
        -ms-transform: translate(0, -25%);
        transform: translate(0, -25%);
        -webkit-transition: -webkit-transform 0.3s ease-out;
        -moz-transition: -moz-transform 0.3s ease-out;
        -o-transition: -o-transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
    }
    .modal.in .modal-dialog {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        transform: translate(0, 0);
    }
    .modal-dialog {
        margin-left: auto;
        margin-right: auto;
        width: auto;
        padding: 10px;
        z-index: 1050;
    }
    .modal-content {
        position: relative;
        background-color: #ffffff;
        border: 1px solid #999999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        background-clip: padding-box;
        outline: none;
    }
    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1030;
        background-color: #000000;
    }
    .modal-backdrop.fade {
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .modal-backdrop.in {
        opacity: 0.5;
        filter: alpha(opacity=50);
    }
    .modal-header {
        padding: 15px;
        border-bottom: 1px solid #e5e5e5;
        min-height: 16.428571429px;
    }
    .modal-header .close {
        margin-top: -2px;
    }
    .modal-title {
        margin: 0;
        line-height: 1.428571429;
    }
    .modal-body {
        position: relative;
        padding: 20px;
    }
    .modal-footer {
        margin-top: 15px;
        padding: 19px 20px 20px;
        text-align: right;
        border-top: 1px solid #e5e5e5;
    }
    .modal-footer:before,
    .modal-footer:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .modal-footer:after {
        clear: both;
    }
    .modal-footer:before,
    .modal-footer:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .modal-footer:after {
        clear: both;
    }
    .modal-footer .btn + .btn {
        margin-left: 5px;
        margin-bottom: 0;
    }
    .modal-footer .btn-group .btn + .btn {
        margin-left: -1px;
    }
    .modal-footer .btn-block + .btn-block {
        margin-left: 0;
    }
    @media screen and (min-width: 768px) {
        .modal-dialog {
            left: 50%;
            right: auto;
            width: 600px;
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
    }
    .tooltip {
        position: absolute;
        z-index: 1030;
        display: block;
        visibility: visible;
        font-size: 12px;
        line-height: 1.4;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .tooltip.in {
        opacity: 0.9;
        filter: alpha(opacity=90);
    }
    .tooltip.top {
        margin-top: -3px;
        padding: 5px 0;
    }
    .tooltip.right {
        margin-left: 3px;
        padding: 0 5px;
    }
    .tooltip.bottom {
        margin-top: 3px;
        padding: 5px 0;
    }
    .tooltip.left {
        margin-left: -3px;
        padding: 0 5px;
    }
    .tooltip-inner {
        max-width: 200px;
        padding: 3px 8px;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        background-color: #000000;
        border-radius: 4px;
    }
    .tooltip-arrow {
        position: absolute;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
    }
    .tooltip.top .tooltip-arrow {
        bottom: 0;
        left: 50%;
        margin-left: -5px;
        border-width: 5px 5px 0;
        border-top-color: #000000;
    }
    .tooltip.top-left .tooltip-arrow {
        bottom: 0;
        left: 5px;
        border-width: 5px 5px 0;
        border-top-color: #000000;
    }
    .tooltip.top-right .tooltip-arrow {
        bottom: 0;
        right: 5px;
        border-width: 5px 5px 0;
        border-top-color: #000000;
    }
    .tooltip.right .tooltip-arrow {
        top: 50%;
        left: 0;
        margin-top: -5px;
        border-width: 5px 5px 5px 0;
        border-right-color: #000000;
    }
    .tooltip.left .tooltip-arrow {
        top: 50%;
        right: 0;
        margin-top: -5px;
        border-width: 5px 0 5px 5px;
        border-left-color: #000000;
    }
    .tooltip.bottom .tooltip-arrow {
        top: 0;
        left: 50%;
        margin-left: -5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000000;
    }
    .tooltip.bottom-left .tooltip-arrow {
        top: 0;
        left: 5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000000;
    }
    .tooltip.bottom-right .tooltip-arrow {
        top: 0;
        right: 5px;
        border-width: 0 5px 5px;
        border-bottom-color: #000000;
    }
    .popover {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1010;
        display: none;
        max-width: 276px;
        padding: 1px;
        text-align: left;
        background-color: #ffffff;
        background-clip: padding-box;
        border: 1px solid #cccccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        white-space: normal;
    }
    .popover.top {
        margin-top: -10px;
    }
    .popover.right {
        margin-left: 10px;
    }
    .popover.bottom {
        margin-top: 10px;
    }
    .popover.left {
        margin-left: -10px;
    }
    .popover-title {
        margin: 0;
        padding: 8px 14px;
        font-size: 14px;
        font-weight: normal;
        line-height: 18px;
        background-color: #f7f7f7;
        border-bottom: 1px solid #ebebeb;
        border-radius: 5px 5px 0 0;
    }
    .popover-content {
        padding: 9px 14px;
    }
    .popover .arrow,
    .popover .arrow:after {
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
    }
    .popover .arrow {
        border-width: 11px;
    }
    .popover .arrow:after {
        border-width: 10px;
        content: "";
    }
    .popover.top .arrow {
        left: 50%;
        margin-left: -11px;
        border-bottom-width: 0;
        border-top-color: #999999;
        border-top-color: rgba(0, 0, 0, 0.25);
        bottom: -11px;
    }
    .popover.top .arrow:after {
        content: " ";
        bottom: 1px;
        margin-left: -10px;
        border-bottom-width: 0;
        border-top-color: #ffffff;
    }
    .popover.right .arrow {
        top: 50%;
        left: -11px;
        margin-top: -11px;
        border-left-width: 0;
        border-right-color: #999999;
        border-right-color: rgba(0, 0, 0, 0.25);
    }
    .popover.right .arrow:after {
        content: " ";
        left: 1px;
        bottom: -10px;
        border-left-width: 0;
        border-right-color: #ffffff;
    }
    .popover.bottom .arrow {
        left: 50%;
        margin-left: -11px;
        border-top-width: 0;
        border-bottom-color: #999999;
        border-bottom-color: rgba(0, 0, 0, 0.25);
        top: -11px;
    }
    .popover.bottom .arrow:after {
        content: " ";
        top: 1px;
        margin-left: -10px;
        border-top-width: 0;
        border-bottom-color: #ffffff;
    }
    .popover.left .arrow {
        top: 50%;
        right: -11px;
        margin-top: -11px;
        border-right-width: 0;
        border-left-color: #999999;
        border-left-color: rgba(0, 0, 0, 0.25);
    }
    .popover.left .arrow:after {
        content: " ";
        right: 1px;
        border-right-width: 0;
        border-left-color: #ffffff;
        bottom: -10px;
    }
    .carousel {
        position: relative;
    }
    .carousel-inner {
        position: relative;
        overflow: hidden;
        width: 100%;
    }
    .carousel-inner > .item {
        display: none;
        position: relative;
        -webkit-transition: 0.6s ease-in-out left;
        transition: 0.6s ease-in-out left;
    }
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        display: block;
        max-width: 100%;
        height: auto;
        line-height: 1;
    }
    .carousel-inner > .active,
    .carousel-inner > .next,
    .carousel-inner > .prev {
        display: block;
    }
    .carousel-inner > .active {
        left: 0;
    }
    .carousel-inner > .next,
    .carousel-inner > .prev {
        position: absolute;
        top: 0;
        width: 100%;
    }
    .carousel-inner > .next {
        left: 100%;
    }
    .carousel-inner > .prev {
        left: -100%;
    }
    .carousel-inner > .next.left,
    .carousel-inner > .prev.right {
        left: 0;
    }
    .carousel-inner > .active.left {
        left: -100%;
    }
    .carousel-inner > .active.right {
        left: 100%;
    }
    .carousel-control {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 15%;
        opacity: 0.5;
        filter: alpha(opacity=50);
        font-size: 20px;
        color: #ffffff;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
    }
    .carousel-control.left {
        background-image: -webkit-gradient(linear, 0% top, 100% top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.0001)));
        background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.5) 0%), color-stop(rgba(0, 0, 0, 0.0001) 100%));
        background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.0001) 100%);
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.0001) 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
    }
    .carousel-control.right {
        left: auto;
        right: 0;
        background-image: -webkit-gradient(linear, 0% top, 100% top, from(rgba(0, 0, 0, 0.0001)), to(rgba(0, 0, 0, 0.5)));
        background-image: -webkit-linear-gradient(left, color-stop(rgba(0, 0, 0, 0.0001) 0%), color-stop(rgba(0, 0, 0, 0.5) 100%));
        background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0%, rgba(0, 0, 0, 0.5) 100%);
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.0001) 0%, rgba(0, 0, 0, 0.5) 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    }
    .carousel-control:hover,
    .carousel-control:focus {
        color: #ffffff;
        text-decoration: none;
        opacity: 0.9;
        filter: alpha(opacity=90);
    }
    .carousel-control .icon-prev,
    .carousel-control .icon-next,
    .carousel-control .glyphicon-chevron-left,
    .carousel-control .glyphicon-chevron-right {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 5;
        display: inline-block;
    }
    .carousel-control .icon-prev,
    .carousel-control .icon-next {
        width: 20px;
        height: 20px;
        margin-top: -10px;
        margin-left: -10px;
        font-family: serif;
    }
    .carousel-control .icon-prev:before {
        content: '\2039';
    }
    .carousel-control .icon-next:before {
        content: '\203a';
    }
    .carousel-indicators {
        position: absolute;
        bottom: 10px;
        left: 50%;
        z-index: 15;
        width: 60%;
        margin-left: -30%;
        padding-left: 0;
        list-style: none;
        text-align: center;
    }
    .carousel-indicators li {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin: 1px;
        text-indent: -999px;
        border: 1px solid #ffffff;
        border-radius: 10px;
        cursor: pointer;
    }
    .carousel-indicators .active {
        margin: 0;
        width: 12px;
        height: 12px;
        background-color: #ffffff;
    }
    .carousel-caption {
        position: absolute;
        left: 15%;
        right: 15%;
        bottom: 20px;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #ffffff;
        text-align: center;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
    }
    .carousel-caption .btn {
        text-shadow: none;
    }
    @media screen and (min-width: 768px) {
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
            width: 30px;
            height: 30px;
            margin-top: -15px;
            margin-left: -15px;
            font-size: 30px;
        }
        .carousel-caption {
            left: 20%;
            right: 20%;
            padding-bottom: 30px;
        }
        .carousel-indicators {
            bottom: 20px;
        }
    }
    .clearfix:before,
    .clearfix:after {
        content: " ";
        /* 1 */

        display: table;
        /* 2 */

    }
    .clearfix:after {
        clear: both;
    }
    .pull-right {
        float: right !important;
    }
    .pull-left {
        float: left !important;
    }
    .hide {
        display: none !important;
    }
    .show {
        display: block !important;
    }
    .invisible {
        visibility: hidden;
    }
    .text-hide {
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }
    .affix {
        position: fixed;
    }
    @-ms-viewport {
        width: device-width;
    }
    @media screen and (max-width: 400px) {
        @-ms-viewport {
            width: 320px;
        }
    }
    .hidden {
        display: none !important;
        visibility: hidden !important;
    }
    .visible-xs {
        display: none !important;
    }
    tr.visible-xs {
        display: none !important;
    }
    th.visible-xs,
    td.visible-xs {
        display: none !important;
    }
    @media (max-width: 767px) {
        .visible-xs {
            display: block !important;
        }
        tr.visible-xs {
            display: table-row !important;
        }
        th.visible-xs,
        td.visible-xs {
            display: table-cell !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-xs.visible-sm {
            display: block !important;
        }
        tr.visible-xs.visible-sm {
            display: table-row !important;
        }
        th.visible-xs.visible-sm,
        td.visible-xs.visible-sm {
            display: table-cell !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-xs.visible-md {
            display: block !important;
        }
        tr.visible-xs.visible-md {
            display: table-row !important;
        }
        th.visible-xs.visible-md,
        td.visible-xs.visible-md {
            display: table-cell !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-xs.visible-lg {
            display: block !important;
        }
        tr.visible-xs.visible-lg {
            display: table-row !important;
        }
        th.visible-xs.visible-lg,
        td.visible-xs.visible-lg {
            display: table-cell !important;
        }
    }
    .visible-sm {
        display: none !important;
    }
    tr.visible-sm {
        display: none !important;
    }
    th.visible-sm,
    td.visible-sm {
        display: none !important;
    }
    @media (max-width: 767px) {
        .visible-sm.visible-xs {
            display: block !important;
        }
        tr.visible-sm.visible-xs {
            display: table-row !important;
        }
        th.visible-sm.visible-xs,
        td.visible-sm.visible-xs {
            display: table-cell !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-sm {
            display: block !important;
        }
        tr.visible-sm {
            display: table-row !important;
        }
        th.visible-sm,
        td.visible-sm {
            display: table-cell !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-sm.visible-md {
            display: block !important;
        }
        tr.visible-sm.visible-md {
            display: table-row !important;
        }
        th.visible-sm.visible-md,
        td.visible-sm.visible-md {
            display: table-cell !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-sm.visible-lg {
            display: block !important;
        }
        tr.visible-sm.visible-lg {
            display: table-row !important;
        }
        th.visible-sm.visible-lg,
        td.visible-sm.visible-lg {
            display: table-cell !important;
        }
    }
    .visible-md {
        display: none !important;
    }
    tr.visible-md {
        display: none !important;
    }
    th.visible-md,
    td.visible-md {
        display: none !important;
    }
    @media (max-width: 767px) {
        .visible-md.visible-xs {
            display: block !important;
        }
        tr.visible-md.visible-xs {
            display: table-row !important;
        }
        th.visible-md.visible-xs,
        td.visible-md.visible-xs {
            display: table-cell !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-md.visible-sm {
            display: block !important;
        }
        tr.visible-md.visible-sm {
            display: table-row !important;
        }
        th.visible-md.visible-sm,
        td.visible-md.visible-sm {
            display: table-cell !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-md {
            display: block !important;
        }
        tr.visible-md {
            display: table-row !important;
        }
        th.visible-md,
        td.visible-md {
            display: table-cell !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-md.visible-lg {
            display: block !important;
        }
        tr.visible-md.visible-lg {
            display: table-row !important;
        }
        th.visible-md.visible-lg,
        td.visible-md.visible-lg {
            display: table-cell !important;
        }
    }
    .visible-lg {
        display: none !important;
    }
    tr.visible-lg {
        display: none !important;
    }
    th.visible-lg,
    td.visible-lg {
        display: none !important;
    }
    @media (max-width: 767px) {
        .visible-lg.visible-xs {
            display: block !important;
        }
        tr.visible-lg.visible-xs {
            display: table-row !important;
        }
        th.visible-lg.visible-xs,
        td.visible-lg.visible-xs {
            display: table-cell !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .visible-lg.visible-sm {
            display: block !important;
        }
        tr.visible-lg.visible-sm {
            display: table-row !important;
        }
        th.visible-lg.visible-sm,
        td.visible-lg.visible-sm {
            display: table-cell !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .visible-lg.visible-md {
            display: block !important;
        }
        tr.visible-lg.visible-md {
            display: table-row !important;
        }
        th.visible-lg.visible-md,
        td.visible-lg.visible-md {
            display: table-cell !important;
        }
    }
    @media (min-width: 1200px) {
        .visible-lg {
            display: block !important;
        }
        tr.visible-lg {
            display: table-row !important;
        }
        th.visible-lg,
        td.visible-lg {
            display: table-cell !important;
        }
    }
    .hidden-xs {
        display: block !important;
    }
    tr.hidden-xs {
        display: table-row !important;
    }
    th.hidden-xs,
    td.hidden-xs {
        display: table-cell !important;
    }
    @media (max-width: 767px) {
        .hidden-xs {
            display: none !important;
        }
        tr.hidden-xs {
            display: none !important;
        }
        th.hidden-xs,
        td.hidden-xs {
            display: none !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-xs.hidden-sm {
            display: none !important;
        }
        tr.hidden-xs.hidden-sm {
            display: none !important;
        }
        th.hidden-xs.hidden-sm,
        td.hidden-xs.hidden-sm {
            display: none !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-xs.hidden-md {
            display: none !important;
        }
        tr.hidden-xs.hidden-md {
            display: none !important;
        }
        th.hidden-xs.hidden-md,
        td.hidden-xs.hidden-md {
            display: none !important;
        }
    }
    @media (min-width: 1200px) {
        .hidden-xs.hidden-lg {
            display: none !important;
        }
        tr.hidden-xs.hidden-lg {
            display: none !important;
        }
        th.hidden-xs.hidden-lg,
        td.hidden-xs.hidden-lg {
            display: none !important;
        }
    }
    .hidden-sm {
        display: block !important;
    }
    tr.hidden-sm {
        display: table-row !important;
    }
    th.hidden-sm,
    td.hidden-sm {
        display: table-cell !important;
    }
    @media (max-width: 767px) {
        .hidden-sm.hidden-xs {
            display: none !important;
        }
        tr.hidden-sm.hidden-xs {
            display: none !important;
        }
        th.hidden-sm.hidden-xs,
        td.hidden-sm.hidden-xs {
            display: none !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-sm {
            display: none !important;
        }
        tr.hidden-sm {
            display: none !important;
        }
        th.hidden-sm,
        td.hidden-sm {
            display: none !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-sm.hidden-md {
            display: none !important;
        }
        tr.hidden-sm.hidden-md {
            display: none !important;
        }
        th.hidden-sm.hidden-md,
        td.hidden-sm.hidden-md {
            display: none !important;
        }
    }
    @media (min-width: 1200px) {
        .hidden-sm.hidden-lg {
            display: none !important;
        }
        tr.hidden-sm.hidden-lg {
            display: none !important;
        }
        th.hidden-sm.hidden-lg,
        td.hidden-sm.hidden-lg {
            display: none !important;
        }
    }
    .hidden-md {
        display: block !important;
    }
    tr.hidden-md {
        display: table-row !important;
    }
    th.hidden-md,
    td.hidden-md {
        display: table-cell !important;
    }
    @media (max-width: 767px) {
        .hidden-md.hidden-xs {
            display: none !important;
        }
        tr.hidden-md.hidden-xs {
            display: none !important;
        }
        th.hidden-md.hidden-xs,
        td.hidden-md.hidden-xs {
            display: none !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-md.hidden-sm {
            display: none !important;
        }
        tr.hidden-md.hidden-sm {
            display: none !important;
        }
        th.hidden-md.hidden-sm,
        td.hidden-md.hidden-sm {
            display: none !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-md {
            display: none !important;
        }
        tr.hidden-md {
            display: none !important;
        }
        th.hidden-md,
        td.hidden-md {
            display: none !important;
        }
    }
    @media (min-width: 1200px) {
        .hidden-md.hidden-lg {
            display: none !important;
        }
        tr.hidden-md.hidden-lg {
            display: none !important;
        }
        th.hidden-md.hidden-lg,
        td.hidden-md.hidden-lg {
            display: none !important;
        }
    }
    .hidden-lg {
        display: block !important;
    }
    tr.hidden-lg {
        display: table-row !important;
    }
    th.hidden-lg,
    td.hidden-lg {
        display: table-cell !important;
    }
    @media (max-width: 767px) {
        .hidden-lg.hidden-xs {
            display: none !important;
        }
        tr.hidden-lg.hidden-xs {
            display: none !important;
        }
        th.hidden-lg.hidden-xs,
        td.hidden-lg.hidden-xs {
            display: none !important;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        .hidden-lg.hidden-sm {
            display: none !important;
        }
        tr.hidden-lg.hidden-sm {
            display: none !important;
        }
        th.hidden-lg.hidden-sm,
        td.hidden-lg.hidden-sm {
            display: none !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1199px) {
        .hidden-lg.hidden-md {
            display: none !important;
        }
        tr.hidden-lg.hidden-md {
            display: none !important;
        }
        th.hidden-lg.hidden-md,
        td.hidden-lg.hidden-md {
            display: none !important;
        }
    }
    @media (min-width: 1200px) {
        .hidden-lg {
            display: none !important;
        }
        tr.hidden-lg {
            display: none !important;
        }
        th.hidden-lg,
        td.hidden-lg {
            display: none !important;
        }
    }
    .visible-print {
        display: none !important;
    }
    tr.visible-print {
        display: none !important;
    }
    th.visible-print,
    td.visible-print {
        display: none !important;
    }
    @media print {
        .visible-print {
            display: block !important;
        }
        tr.visible-print {
            display: table-row !important;
        }
        th.visible-print,
        td.visible-print {
            display: table-cell !important;
        }
        .hidden-print {
            display: none !important;
        }
        tr.hidden-print {
            display: none !important;
        }
        th.hidden-print,
        td.hidden-print {
            display: none !important;
        }
    }

    </style>
</head>
<body>
<div class="global-container col-md-10 col-md-offset-1">
    <img style="float:left; padding-top:20px; margin-right:-80px;" src="http://localhost/project/front-end/content/user/img/utu.jpg" width="80px" height="100px"/>
    <div class="name-of-authority text-center"><h3><b>Uttarakhand Technical University, Dehradun</b></h3></div>
    <div class="address-of-authority text-center">Government Girls Polytechnic, Premnagar, Sudhowala</div>
    <div class="address-of-authority text-center">Dehradun, Uttarakhand PIN: 248007</div>
    <br/>
    <div class="name-and-year text-center"><h3>Uttarakhand State Counselling - 2011</h3></div>
    <div class="round-detail text-center" style="margin-top: -5px;">III - Round</div>
    <div class="official-detail">
        <span class="text-left">No.</span>
        <span class="text-right " style="float:right;">Admission: PROVISIONAL</span>
    </div>
    <div class="notice-number">UTU/Admission/BTECH/2015</div>
    <br />
    <br />

    <div class="report col-md-12">
        <br />
        <table class="col-md-12">
            <tr>
                <td class="col-md-4 col-md-offset-1">Roll Number: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['roll_number'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">Name: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['fullname'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">DOB: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['dob'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">Father's Name: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['fathername'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">All India Rank: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['rank'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">State Quota: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['state'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">Category: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['category'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">Sub-Category: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $student[0]['subcategory'];?></td>
            </tr>
            <tr>
                <td class="col-md-4">Course: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $branch_name;?></td>
            </tr>
            <tr>
                <td class="col-md-4">Allotted College: </td>
                <td class="col-md-6 col-md-offset-1"><?php echo $college_name;?></td>
            </tr>

        </table>
    </div>
    <br />
    <br />
    <div class="declaration col-md-12 text-center">He/She has been
        asked to report at the Institute/College on or before 29/June/2015
        at 10:00AM and complete the other formalities of admission there. He/She
        will deposit TC/Migration Certificate at the institute.
    </div>

    <br />
    <br />
    <br />
    <br />
    <div class="signature-col">
        <span class="text-center" style="float:left;"><u>Signature of <br />Institute Representative</u></span>
        <span class="text-center" style="float:right;"><u>Signature of Govt. Nominee</u></span>
    </div>
</div>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: hokage
 * Date: 19/6/15
 * Time: 10:09 AM
 */

?>
