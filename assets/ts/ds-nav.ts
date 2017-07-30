/**
 * Ds object
 *
 * @require jquery.js
 */

declare var jQuery: any;

(function($) {

var Ds = {

  init: function() {

    this.ink();
    this.navActive();
    this.navDrillDown();
    this.navCollapse();
    this.navTruncate();
    this.navTooltip();
    this.browserWidth();

    $(window).resize(function() {
      Ds.browserWidth();
    });

  },

  ink: function() {

    var blot, d, x, y;

    $('a.ink').click(function(e) {

      if($(this).find('.ink-blot').length === 0) {
        $(this).append("<span class='ink-blot'></span>");
      };

      blot = $(this).find('.ink-blot');
      blot.removeClass('ink-animate');

      if(!blot.height() && !blot.width()) {
        d = Math.max($(this).outerWidth(), $(this).outerHeight());
        blot.css({height: d, width: d});
      };

      x = e.pageX - $(this).offset().left - blot.width()/2;
      y = e.pageY - $(this).offset().top - blot.height()/2;

      blot.css({top: y+'px', left: x+'px'}).addClass('ink-animate');

    });

  },

  navActive: function() {

    var label;

    $('#navigation-lists a').click(function(e) {

      e.preventDefault();

      if(!$(this).hasClass('nav-back')) {
        $('#navigation-lists').find('li.active').removeClass('active');
        $(this).parent().addClass('active');
        if($(this).data('has-sub') === false) {
          label = $(this).find('.nav-label').data('label');
          $('#title h1').html(label);
        }
      };

      if($(this).hasClass('secondary-nav-link')) {
        $("#primary-nav").find("a[data-p='" + $(this).data('p') + "']").parent().addClass('active');
      };

      if($(this).hasClass('auto-expand') && $('#navigation').hasClass('collapsed')) {
        $('a.nav-back').addClass('auto-collapse');
        $('#navigation, #navigation-placeholder').toggleClass('collapsed');
      }

      if($(this).hasClass('auto-collapse') && !$('#navigation').hasClass('collapsed')) {
        $(this).removeClass('auto-collapse');
        $('#navigation, #navigation-placeholder').toggleClass('collapsed');
      }

    });

  },

  navDrillDown: function() {

    var link, primaryNav, secondaryNav, isPrimary, isBack, hasSub;

    $('#navigation-lists a').click(function(e) {

      link = $(this);
      primaryNav = $('#primary-nav');
      secondaryNav = $('#secondary-nav-' + link.data('p'));
      isPrimary = $(this).hasClass('primary-nav-link');
      isBack = $(this).hasClass('nav-back');
      hasSub = link.data('has-sub');

      if(isPrimary && hasSub && primaryNav.hasClass('active')) {

        primaryNav.removeClass('active');
        secondaryNav.addClass('active');

      }

      if(!isPrimary && isBack) {

        secondaryNav.removeClass('active');
        primaryNav.addClass('active');

      }

    });

  },

  navCollapse: function() {

    $('#navigation .nav-collapse, #navigation-icon button, #navigation-close').click(function(e) {

      e.preventDefault();
      $('#navigation, #navigation-placeholder').toggleClass('collapsed');

      if($(window).width() <= 768) {
        $('#overlay').toggleClass('active');
      }

    });

  },

  navTruncate: function() {

    var string;

    $('#navigation .nav-label').each(function() {
      string = $(this).text();
      if(string.length > 20) {
        string = string.substring(0, 20) + '&hellip;';
        $(this).html(string);
      }
    });

  },

  navTooltip: function() {

    var label, navCollapsed, x, y;
    var tooltip = $('#tooltip');

    $('a.primary-nav-link, a.secondary-nav-link').hover(function() {

      navCollapsed = $('#navigation').hasClass('collapsed');

      if(navCollapsed && $(window).width() < 1440) {

        x = $(this).offset().left + 54;
        y = $(this).offset().top + 10;
        label = $(this).find('.nav-label').data('label');
        tooltip.empty().text(label).css({top: y+'px', left: x+'px'}).addClass('active');

      }

    }, function() {

      tooltip.removeClass('active');

    });


  },

  browserWidth: function() {

    var size, w, h;

    size = '';
    w = $(window).width();
    h = $(window).height();

    switch(true) {
      case (w >= 1441):
        size = 'Giant';
        break;
      case (w >= 1025 && w <= 1440):
        size = 'Large';
        break;
      case (w >= 769 && w <= 1024):
        size = 'Medium';
        break;
      case (w >= 601 && w <= 768):
        size = 'Small';
        break;
      case (w >= 481 && w <= 600):
        size = 'X Small';
        break;
      default:
        size = 'XX Small';
        break;
    }

    $('#browser-size').empty().html(size + ' ' + w + ' x ' + h);

  }

};

$(function() {
  Ds.init();
});

})(jQuery);
