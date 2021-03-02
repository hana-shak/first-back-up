/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/sass/app.scss":
/*!*************************************!*\
  !*** ./public/assets/sass/app.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*------------------------------------------------------------------

Project:      Fedash - Bootstrap Multipurpose Admin Dashboard Template
Version:      1.0
Author:       laborasyon
Author URL:   https://themeforest.net/user/laborasyon/portfolio

---------------------------------------------------------------------*/


(function ($) {
  var wind_ = $(window),
      body_ = $('body'),
      settings = {
    navigation_level_icon: body_.hasClass('rtl') ? 'ti-angle-left' : 'ti-angle-right' // ti-angle-up

  };
  feather.replace({
    'stroke-width': 2
  });
  flexTable(); // Active pages, automatically show on the menu

  $('.navigation .navigation-menu-body ul li a.active').parent().parents('li').addClass('open');
  $('.header-navigation ul li a.active').parent().parents('li').addClass('open');
  jQuery.fn.reverse = [].reverse;
  var breadcrumb_items = '',
      active_link_parents = body_.hasClass('horizontal-navigation') ? $('.header .header-navigation ul li a.active').parents('li') : $('.navigation ul li a.active').parents('li');
  active_link_parents.reverse().each(function (index, item) {
    var clone_item = $(item).find('>a').clone();
    clone_item.find('.badge, .nav-link-icon').remove();
    var link_name = clone_item.text(),
        link_href = clone_item.attr('href');
    link_name = $.trim(link_name);

    if (index !== active_link_parents.length - 1) {
      if (link_name) {
        breadcrumb_items += "<li class=\"breadcrumb-item\">\n                <a href=\"".concat(link_href, "\">").concat(link_name, "</a>\n                </li>\n                ");
      }
    } else {
      breadcrumb_items += "<li class=\"breadcrumb-item active\" aria-current=\"page\">".concat(link_name, "</li>");
    }
  });
  var breadcrumb_build = "<nav aria-label=\"breadcrumb\">\n        <ol class=\"breadcrumb\">\n            <li class=\"breadcrumb-item\">\n                <a href=\"#\">\n                    <i class=\"ti-home\"></i>\n                </a>\n            </li>\n            ".concat(breadcrumb_items, "\n        </ol>\n    </nav>");
  $('.page-header').prepend(breadcrumb_build);
  $('[data-background-image]').each(function (e) {
    $(this).css("background", 'url(' + $(this).data('background-image') + ')');
  });
  var table_responsive_stack = $(".table-responsive-stack");
  table_responsive_stack.find("th").each(function (i) {
    $(".table-responsive-stack td:nth-child(" + (i + 1) + ")").prepend('<span class="table-responsive-stack-thead">' + $(this).text() + ":</span> ");
    $(".table-responsive-stack-thead").hide();
  });
  table_responsive_stack.each(function () {
    var thCount = $(this).find("th").length,
        rowGrow = 100 / thCount + "%";
    $(this).find("th, td").css("flex-basis", rowGrow);
  }); //------------------- Methods -------------------

  $.createOverlay = function () {
    if ($('.overlay').length < 1) {
      body_.addClass('no-scroll').append('<div class="overlay"></div>');
      $('.overlay').addClass('show');
    }
  };

  $.removeOverlay = function () {
    body_.removeClass('no-scroll');
    $('.overlay').remove();
  };

  function flexTable() {
    if (wind_.width() < 768) {
      $(".table-responsive-stack").each(function (i) {
        $(this).find(".table-responsive-stack-thead").show();
        $(this).find("thead").hide();
      }); // window is less than 768px
    } else {
      $(".table-responsive-stack").each(function (i) {
        $(this).find(".table-responsive-stack-thead").hide();
        $(this).find("thead").show();
      });
    }
  }

  if ($('.chat-block').length > 0) {
    body_.addClass('web-app');
  } //------------------- Events -------------------


  window.onresize = function () {
    flexTable();
  };

  $(document).on('click', '[data-toggle="fullscreen"]', function () {
    $(this).toggleClass('active-fullscreen');

    if (document.fullscreenEnabled) {
      if ($(this).hasClass("active-fullscreen")) {
        document.documentElement.requestFullscreen();
      } else {
        document.exitFullscreen();
      }
    } else {
      alert("Your browser does not support fullscreen.");
    }

    return false;
  });
  $(document).on('click', '.overlay', function () {
    $.removeOverlay();
    $('.navigation').removeClass('open');
    $('.header-navigation').removeClass('open');
    $('.navigation-toggler').removeClass('toggle');
    $('.app-block .app-sidebar.show').removeClass('show');
  });
  $(document).on('click', '.navigation ul li a.disabled', function () {
    return false;
  });
  $(document).on('click', '[data-sidebar-target]', function () {
    var target = $(this).data('sidebar-target');
    $('body').addClass('no-scroll');
    $('.sidebar-group').addClass('show');
    $('.sidebar-group .sidebar').removeClass('show');
    $('.sidebar-group .sidebar' + target).addClass('show');
    new PerfectScrollbar('.sidebar-group .sidebar' + target + ' .sidebar-content');
    return false;
  });
  $(document).on('click', '.sidebar-group', function (e) {
    if ($(e.target).is($('.sidebar-group'))) {
      $('.sidebar-group').removeClass('show');
      $('body').removeClass('no-scroll');
      $('.sidebar-group .sidebar').removeClass('show');
    }
  });
  wind_.on('load', function () {
    $('.preloader').fadeOut(300, function () {
      if ($('.navigation').length && !body_.hasClass('horizontal-navigation')) {
        setTimeout(function () {
          if ($('.navigation .navigation-menu-body ul li a.active').parent().parent().css('display') == 'none') {
            $('.navigation .navigation-menu-body').animate({
              scrollTop: $('.navigation .navigation-menu-body ul li.open').position().top - $('.header').height()
            });
          } else {
            $('.navigation .navigation-menu-body').animate({
              scrollTop: $('.navigation .navigation-menu-body ul li a.active').position().top - $('.header').height()
            });
          }
        }, 200);
        /* $('.small-navigation .navigation').hover(function () {
            $(this).find('.navigation-menu-body').animate({
                scrollTop: $('.navigation .navigation-menu-body ul li a.active').position().top + ($('.header').height()) + ($('.content-footer').height())
            });
        }); */
      }
    });
    setTimeout(function () {
      $('.navigation .navigation-menu-body ul li a').each(function () {
        var $this = $(this);

        if ($this.next('ul').length) {
          $this.append('<i class="sub-menu-arrow ' + settings.navigation_level_icon + '"></i>');
        }
      });

      if (wind_.width() < 1200) {
        $('.header-navigation ul li a').each(function () {
          var $this = $(this);

          if ($this.next('ul').length) {
            $this.append('<i class="sub-menu-arrow ' + settings.navigation_level_icon + '"></i>');
          }
        });
      } else {
        $('.header-navigation ul li a + ul li a').each(function () {
          var $this = $(this);

          if ($this.next('ul').length) {
            $this.append('<i class="sub-menu-arrow ' + settings.navigation_level_icon + '"></i>');
          }
        });
      }
    }, 150);
  });
  $(document).on('click', '.navigation-toggler', function () {
    if (wind_.width() >= 1200) {
      if (body_.hasClass('hidden-navigation')) {
        $('.navigation').toggleClass('open');
      } else {
        body_.toggleClass('small-navigation');
      }
    } else {
      if ($('body').hasClass('horizontal-navigation')) {
        $('.header-navigation').toggleClass('open');

        if ($('.header-navigation').hasClass('open')) {
          $.createOverlay();
        } else {
          $.removeOverlay();
        }
      } else {
        $('.navigation').toggleClass('open');

        if ($('.navigation').hasClass('open')) {
          $.createOverlay();
        } else {
          $.removeOverlay();
        }
      }

      $(this).toggleClass('toggle');
    }

    return false;
  });
  $(document).on('click', '.btn-sidebar-close', function () {
    $.removeOverlay();
    $('.sidebar-group').removeClass('show');
    $('.sidebar-group .sidebar').removeClass('show');
    return false;
  });
  $(document).on('click', '.header-toggler', function () {
    $('.header .header-action-right').toggleClass('open');
    return false;
  });
  $(document).on('click', '.header-navigation-close-button', function () {
    $('.header-navigation').removeClass('open');
    $.removeOverlay();
    return false;
  });
  $(document).on('click', '*', function (e) {
    if (!$(e.target).is($('.navigation, .navigation *, .navigation-toggler, .navigation-toggler *'))) {
      $('.navigation').removeClass('open');
      $('.navigation-toggler').removeClass('toggle');
      $.removeOverlay();
    }
  });
  $(document).on('click', '*', function (e) {
    if (!$(e.target).is('.header ul.navbar-nav, .header ul.navbar-nav *, .header-toggler, .header-toggler *')) {
      $('.header .header-action-right').removeClass('open');
    }
  });
  /*------------- Custom accordion -------------*/

  $(document).on('click', '.accordion.custom-accordion .accordion-row a.accordion-header', function () {
    var $this = $(this);
    $this.closest('.accordion.custom-accordion').find('.accordion-row').not($this.parent()).removeClass('open');
    $this.parent('.accordion-row').toggleClass('open');
    return false;
  });
  /*------------- responsive table dropdown -------------*/

  var dropdownMenu,
      table_responsive = $('.table-responsive');
  table_responsive.on('show.bs.dropdown', function (e) {
    dropdownMenu = $(e.target).find('.dropdown-menu');
    body_.append(dropdownMenu.detach());
    var eOffset = $(e.target).offset();
    dropdownMenu.css({
      'display': 'block',
      'top': eOffset.top + $(e.target).outerHeight(),
      'left': eOffset.left,
      'width': '184px',
      'font-size': '14px'
    });
    dropdownMenu.addClass("mobPosDropdown");
  });
  table_responsive.on('hide.bs.dropdown', function (e) {
    $(e.target).append(dropdownMenu.detach());
    dropdownMenu.hide();
  });
  /*------------- responsive table dropdown -------------*/

  /*------------- Mobile chat sidebar -------------*/

  $(document).on('click', '.chat-block .chat-sidebar .chat-sidebar-content .list-group .list-group-item', function () {
    $('.chat-block .chat-content').addClass('chat-mobile-open');
    return false;
  });
  /*------------- Mobile chat sidebar close btn -------------*/

  $(document).on('click', '.chat-block .chat-content .mobile-chat-close-btn a', function () {
    $('.chat-block .chat-content').removeClass('chat-mobile-open');
    return false;
  });
  /*------------- Navigation collapse -------------*/

  $(document).on('click', '.navigation ul li a', function () {
    var $this = $(this);

    if ($this.next('ul').length) {
      if (!body_.hasClass('horizontal-navigation') || wind_.width() < 1200) {
        var sub_menu_arrow = $this.find('.sub-menu-arrow');
        $('.navigation ul li a .sub-menu-arrow').removeClass('rotate-in');
        $this.next('ul').toggle(150, function () {
          if ($(this).is(":visible")) {
            sub_menu_arrow.addClass('rotate-in');
          } else {
            sub_menu_arrow.removeClass('rotate-in');
          }
        });
        $this.parent('li').siblings().not($this.parent('li')).find('ul').hide(250);
        $this.next('ul').find('li>ul').hide('open');
      }

      return false;
    }
  });
  /*------------- Horizontal navigation collapse -------------*/

  $(document).on('click', '.header-navigation ul li a', function () {
    var $this = $(this);

    if ($this.next('ul').length) {
      if (wind_.width() < 1200) {
        var sub_menu_arrow = $this.find('.sub-menu-arrow');
        $('.header-navigation ul li a .sub-menu-arrow').removeClass('rotate-in');
        $this.next('ul').toggle(150, function () {
          if ($(this).is(":visible")) {
            sub_menu_arrow.addClass('rotate-in');
          } else {
            sub_menu_arrow.removeClass('rotate-in');
          }
        });
        $this.parent('li').siblings().not($this.parent('li')).find('ul').hide(250);
        $this.next('ul').find('li>ul').hide('open');
      }

      return false;
    }
  });
  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget),
        recipient = button.data('whatever'),
        modal = $(this);
    modal.find('.modal-title').text('New message to ' + recipient);
    modal.find('.modal-body input').val(recipient);
  });
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body'
  });
  $('[data-toggle="popover"]').popover();
  $('.carousel').carousel();
  $(document).on('click', '.mobile-header-search-btn', function () {
    $('.header .header-search-form').addClass('show');
    setTimeout(function () {
      $('.header .header-search-form .form-control').focus();
    }, wind_.width() >= 1200 ? 50 : 500);
    return false;
  });
  $(document).on('click', '*', function (e) {
    if (!$(e.target).is($('.header .header-search-form, .header .header-search-form *, .mobile-header-search-btn, .mobile-header-search-btn *')) && wind_.width() >= 1200) {
      $('.header .header-search-form').removeClass('show');
    }
  });
  $(document).on('click', '.header-search-close-btn', function () {
    $('.header .header-search-form').removeClass('show');
    $.removeOverlay();
    return false;
  });
  $(document).on('click', '.header .header-search-form', function (e) {
    if (!$(e.target).is($('form *'))) {
      $('.header .header-search-form').removeClass('show');
    }

    return false;
  });
  $('.header-search-form .form-control').focus(function () {
    $('.header-search-form .search-results').addClass('open');
    new PerfectScrollbar('.header-search-form .search-results');
  });
  $(document).on('click', '*', function (e) {
    if (!$(e.target).is($('.header-search-form, .header-search-form *'))) {
      $('.header-search-form .search-results').removeClass('open');
    }
  });

  if (wind_.width() >= 1200) {
    setTimeout(function () {
      if ($('.card-scroll').length) {
        document.querySelectorAll('.card-scroll').forEach(function (container) {
          new PerfectScrollbar(container);
        });
      }

      if ($('.demo-code-preview > pre').length) {
        document.querySelectorAll('.demo-code-preview > pre').forEach(function (container) {
          new PerfectScrollbar(container);
        });
      }

      if ($('.dropdown-scroll').length) {
        document.querySelectorAll('.dropdown-scroll').forEach(function (container) {
          new PerfectScrollbar(container);
        });
      }

      if ($('.table-responsive').length) {
        document.querySelectorAll('.table-responsive').forEach(function (container) {
          new PerfectScrollbar(container);
        });
      }

      if ($('.chat-block .chat-sidebar .chat-sidebar-content').length) {
        new PerfectScrollbar('.chat-block .chat-sidebar .chat-sidebar-content');
      }

      if ($('.chat-block .chat-content .messages').length) {
        new PerfectScrollbar('.chat-block .chat-content .messages');
        $('.chat-block .chat-content .messages').scrollTop($('.chat-block .chat-content .messages').prop("scrollHeight"));
      }
    }, 100);
  }

  var navigation_ps = null;

  if (!body_.hasClass('horizontal-navigation') && wind_.width() >= 1200 && $('.navigation').length) {
    navigation_ps = new PerfectScrollbar('.navigation .navigation-menu-body');
  }

  $(document).on('mouseenter', 'body.small-navigation .navigation', function (e) {
    navigation_ps.update();
  });
  $(document).on('mouseleave', 'body.small-navigation .navigation', function (e) {
    $(this).find('.navigation-menu-body ul').removeAttr('style');
    $(this).find('.navigation-menu-body ul').prev('a').find('.sub-menu-arrow').removeClass('rotate-in ti-minus').addClass(settings.navigation_level_icon);
  }); // RTL

  if (body_.hasClass('rtl')) {
    $('.dropdown-menu').removeClass('dropdown-menu-right');
  }
})(jQuery);

/***/ }),

/***/ 0:
/*!*****************************************************************!*\
  !*** multi ./resources/js/app.js ./public/assets/sass/app.scss ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\wamp64\www\themeforest\alek\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\wamp64\www\themeforest\alek\public\assets\sass\app.scss */"./public/assets/sass/app.scss");


/***/ })

/******/ });