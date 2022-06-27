/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {



/***/ }),

/***/ "./resources/theme/js/app.js":
/*!***********************************!*\
  !*** ./resources/theme/js/app.js ***!
  \***********************************/
/***/ (() => {

(function ($) {
  "use strict";

  var fn = {
    // Launch Functions
    Launch: function Launch() {
      fn.Header();
      fn.Masonry();
      fn.AOS();
      fn.ImageView();
      fn.Typed();
      fn.Swiper();
      fn.Vivus();
      fn.Overlay();
      fn.OwlCarousel();
      fn.Apps();
    },
    Header: function Header() {
      $("header").headroom({
        tolerance: 0
      });
    },
    ImageView: function ImageView() {
      $('.lightbox').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        // class to remove default margin from left and right side
        image: {
          verticalFit: true
        }
      });
      $('.gallery').each(function () {
        // the containers for all your galleries
        $(this).magnificPopup({
          delegate: '.photo > a',
          // the selector for gallery item
          type: 'image',
          mainClass: 'mfp-no-margins mfp-with-zoom',
          // class to remove default margin from left and right side
          gallery: {
            enabled: true
          }
        });
      });
      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
    },
    Typed: function (_Typed) {
      function Typed() {
        return _Typed.apply(this, arguments);
      }

      Typed.toString = function () {
        return _Typed.toString();
      };

      return Typed;
    }(function () {
      if ($('#typed').length) {
        var typed = new Typed("#typed", {
          stringsElement: '#typed-strings',
          typeSpeed: 100,
          backSpeed: 50,
          backDelay: 2000,
          startDelay: 200,
          loop: true
        });
      }
    }),
    Masonry: function Masonry() {
      var $grid = $('.masonry').masonry({
        itemSelector: '.masonry > *'
      });
      $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
      });
    },
    AOS: function AOS() {},
    // Swiper
    Swiper: function (_Swiper) {
      function Swiper() {
        return _Swiper.apply(this, arguments);
      }

      Swiper.toString = function () {
        return _Swiper.toString();
      };

      return Swiper;
    }(function () {
      $('.swiper-container').each(function (index, element) {
        var $this = $(this);
        $this.find(".swiper-pagination").addClass("swiper-pagination-" + index);
        $this.find(".swiper-button-next").addClass("swiper-button-next-" + index);
        $this.find(".swiper-button-prev").addClass("swiper-button-prev-" + index);
        var options = {
          parallax: true,
          speed: 1500,
          simulateTouch: false,
          effect: 'fade',
          //pagination
          pagination: {
            el: '.swiper-pagination-' + index,
            clickable: true
          },
          // navigation
          navigation: {
            nextEl: '.swiper-button-next-' + index,
            prevEl: '.swiper-button-prev-' + index
          }
        };
        var slider = $(this);

        if ($(this).hasClass('swiper-container-carousel')) {
          options.spaceBetween = 10;
          options.effect = 'slide';
          options.simulateTouch = true;
          options.slideToClickedSlide = true;
        }

        new Swiper(slider, options);
      });

      if ($(".gallery-container").length) {
        var galleryTop = new Swiper('.gallery-container', {
          effect: 'fade',
          speed: 1500,
          simulateTouch: false
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
          centeredSlides: true,
          slidesPerView: 6,
          speed: 1500,
          breakpoints: {
            1600: {
              slidesPerView: 5
            },
            1200: {
              slidesPerView: 3
            },
            768: {
              slidesPerView: 2
            },
            576: {
              slidesPerView: 2
            }
          },
          slideToClickedSlide: true
        });
        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
      }
    }),
    // SVG Animation
    Vivus: function (_Vivus) {
      function Vivus() {
        return _Vivus.apply(this, arguments);
      }

      Vivus.toString = function () {
        return _Vivus.toString();
      };

      return Vivus;
    }(function () {
      var myCallback = function myCallback() {};

      var myElements = document.querySelectorAll(".svg-icon svg");

      for (var i = myElements.length - 1; i >= 0; i--) {
        new Vivus(myElements[i], {
          duration: 100,
          type: 'async'
        }, myCallback);
      }
    }),
    // Overlay Menu
    Overlay: function Overlay() {
      $(document).ready(function () {
        $('.burger').click(function () {
          var a = $(this);
          a.toggleClass('clicked');
          $('body').toggleClass('overlay-active');
          $('.overlay-menu').toggleClass('opened');
          $('.wrapper').toggleClass('push');
        });
      });
    },
    // Owl Carousel
    OwlCarousel: function OwlCarousel() {
      $('.owl-carousel').each(function () {
        var a = $(this),
            items = a.data('items') || [1, 1, 1],
            margin = a.data('margin'),
            loop = a.data('loop'),
            nav = a.data('nav'),
            dots = a.data('dots'),
            center = a.data('center'),
            autoplay = a.data('autoplay'),
            autoplaySpeed = a.data('autoplay-speed'),
            rtl = a.data('rtl'),
            autoheight = a.data('autoheight');
        var options = {
          nav: nav || false,
          loop: loop || false,
          dots: dots || false,
          center: center || false,
          autoplay: autoplay || false,
          autoHeight: autoheight || false,
          rtl: rtl || false,
          margin: margin || 0,
          autoplayTimeout: autoplaySpeed || 3000,
          autoplaySpeed: 400,
          autoplayHoverPause: true,
          responsive: {
            0: {
              items: items[2] || 1
            },
            576: {
              items: items[1] || 1
            },
            1200: {
              items: items[0] || 1
            }
          }
        };
        a.owlCarousel(options);
      });
    },
    // Apps
    Apps: function Apps() {
      // Navbar Nested Dropdowns
      $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var a = $(this);

        if (!a.next().hasClass('show')) {
          a.parents('.dropdown-menu').first().find('.show').removeClass("show");
        }

        var $subMenu = a.next(".dropdown-menu");
        $subMenu.toggleClass('show');
        a.parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
          $('.dropdown-submenu .show').removeClass("show");
        });
        return false;
      }); // Accordion

      $('.accordion').accordion(); // Lavalamp

      $('.nav').lavalamp({
        setOnClick: true,
        enableHover: false,
        margins: false,
        autoUpdate: true,
        duration: 200
      }); // Tooltips

      $('[data-toggle="tooltip"]').tooltip();
      skrollr.init({
        forceHeight: false,
        mobileCheck: function mobileCheck() {
          //hack - forces mobile version to be off
          return false;
        }
      }); // Video Player

      $(function () {
        if ($('#my-player').length) {
          var player = videojs('my-player');
        }
      }); // Select

      $(function () {
        $('select').selectric({
          disableOnMobile: false,
          nativeOnMobile: false
        });
      }); // Radial

      $('.progress-circle').each(function () {
        var a = $(this),
            b = a.data('percent'),
            c = a.data('color');
        var options = {
          value: b / 100,
          size: 600,
          thickness: 15,
          startAngle: -Math.PI / 2,
          lineCap: 'round',
          fill: {
            color: c
          }
        };
        a.circleProgress(options).on('circle-animation-progress', function (event, progress, stepValue) {
          a.find('strong').html(Math.round(100 * stepValue) + '<i>%</i>');
        });
      }); // Smooth Scroll

      $(function () {
        var scroll = new SmoothScroll('[data-scroll]');
      }); // Filtering

      $(function () {
        if ($('.filtr-container').length) {
          var filterizd = $('.filtr-container').filterizr({
            layout: 'sameWidth'
          });
        }
      }); // Speaker Panel

      $(function () {
        var a = $(".expand");
        var b = $(".collapse");
        a.click(function () {
          var c = $(this);
          a.removeClass("expanded");
          c.toggleClass("expanded");
        });
        b.click(function () {
          a.removeClass("expanded");
        });
      });
      AOS.init({
        duration: 800,
        anchorPlacement: 'center-bottom'
      });
    }
  };
  $(document).ready(function () {
    fn.Launch();
  });
})(jQuery);

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/theme/css/style.css":
/*!***************************************!*\
  !*** ./resources/theme/css/style.css ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/style": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/style","css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/style","css/app"], () => (__webpack_require__("./resources/theme/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/style","css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/style","css/app"], () => (__webpack_require__("./resources/theme/css/style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;