!function($){var a={init:function(){this.ink(),this.navActive(),this.navDrillDown(),this.navCollapse(),this.navTruncate(),this.navTooltip(),this.browserWidth(),$(window).resize(function(){a.browserWidth()})},ink:function(){var a,i,t,s;$("a.ink").click(function(n){0===$(this).find(".ink-blot").length&&$(this).append("<span class='ink-blot'></span>"),a=$(this).find(".ink-blot"),a.removeClass("ink-animate"),a.height()||a.width()||(i=Math.max($(this).outerWidth(),$(this).outerHeight()),a.css({height:i,width:i})),t=n.pageX-$(this).offset().left-a.width()/2,s=n.pageY-$(this).offset().top-a.height()/2,a.css({top:s+"px",left:t+"px"}).addClass("ink-animate")})},navActive:function(){var a;$("#navigation-lists a").click(function(i){i.preventDefault(),$(this).hasClass("nav-back")||($("#navigation-lists").find("li.active").removeClass("active"),$(this).parent().addClass("active"),!1===$(this).data("has-sub")&&(a=$(this).find(".nav-label").data("label"),$("#title h1").html(a))),$(this).hasClass("secondary-nav-link")&&$("#primary-nav").find("a[data-p='"+$(this).data("p")+"']").parent().addClass("active"),$(this).hasClass("auto-expand")&&$("#navigation").hasClass("collapsed")&&($("a.nav-back").addClass("auto-collapse"),$("#navigation, #navigation-placeholder").toggleClass("collapsed")),$(this).hasClass("auto-collapse")&&!$("#navigation").hasClass("collapsed")&&($(this).removeClass("auto-collapse"),$("#navigation, #navigation-placeholder").toggleClass("collapsed"))})},navDrillDown:function(){var a,i,t,s,n,e;$("#navigation-lists a").click(function(l){a=$(this),i=$("#primary-nav"),t=$("#secondary-nav-"+a.data("p")),s=$(this).hasClass("primary-nav-link"),n=$(this).hasClass("nav-back"),e=a.data("has-sub"),s&&e&&i.hasClass("active")&&(i.removeClass("active"),t.addClass("active")),!s&&n&&(t.removeClass("active"),i.addClass("active"))})},navCollapse:function(){$("#navigation .nav-collapse, #navigation-icon button, #navigation-close").click(function(a){a.preventDefault(),$("#navigation, #navigation-placeholder").toggleClass("collapsed"),$(window).width()<=768&&$("#overlay").toggleClass("active")})},navTruncate:function(){var a;$("#navigation .nav-label").each(function(){a=$(this).text(),a.length>20&&(a=a.substring(0,20)+"&hellip;",$(this).html(a))})},navTooltip:function(){var a,i,t,s,n=$("#tooltip");$("a.primary-nav-link, a.secondary-nav-link").hover(function(){(i=$("#navigation").hasClass("collapsed"))&&$(window).width()<1440&&(t=$(this).offset().left+54,s=$(this).offset().top+10,a=$(this).find(".nav-label").data("label"),n.empty().text(a).css({top:s+"px",left:t+"px"}).addClass("active"))},function(){n.removeClass("active")})},browserWidth:function(){var a,i,t;switch(a="",i=$(window).width(),t=$(window).height(),!0){case i>=1441:a="Giant";break;case i>=1025&&i<=1440:a="Large";break;case i>=769&&i<=1024:a="Medium";break;case i>=601&&i<=768:a="Small";break;case i>=481&&i<=600:a="X Small";break;default:a="XX Small";break}$("#browser-size").empty().html(a+" "+i+" x "+t)}};$(function(){a.init()})}(jQuery);