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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/scroll-animations.js":
/*!****************************************!*\
  !*** ./assets/js/scroll-animations.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Scroll Animation\n *\n * Adds animation to the front page when the user scrolls the page.\n */\njQuery(document).ready(function ($) {\n  // Hide elements on page load\n  $('.img-1').css('opacity', 0);\n  $('.img-2').css('opacity', 0);\n  $('.img-3').css('opacity', 0);\n  $('.img-4').css('opacity', 0);\n  $('.img-5').css('opacity', 0);\n  $('.img-6').css('opacity', 0);\n  $('.fade-in-left').css('opacity', 0);\n  $('.fade-in-right').css('opacity', 0);\n  $('.fade-in-up').css('opacity', 0);\n  $('.fade-in-down').css('opacity', 0);\n  $('.fade-in-contact').css('opacity', 0);\n  $('.cta-left-wrapper').css('opacity', 0);\n  $('.cta-right-wrapper').css('opacity', 0);\n  $('.jumbotron').waypoint(function () {\n    $('.jumbotron').addClass('fadeIn slow delay-1s');\n  }, {\n    offset: '70%'\n  });\n  $('.img-1').waypoint(function () {\n    $('.img-1').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.img-2').waypoint(function () {\n    $('.img-2').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.img-3').waypoint(function () {\n    $('.img-3').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.img-4').waypoint(function () {\n    $('.img-4').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.img-5').waypoint(function () {\n    $('.img-5').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.img-6').waypoint(function () {\n    $('.img-6').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.fade-in-right').waypoint(function () {\n    $('.fade-in-right').addClass('fadeInRight slower');\n  }, {\n    offset: '70%'\n  });\n  $('.fade-in-left').waypoint(function () {\n    $('.fade-in-left').addClass('fadeInLeft slow');\n  }, {\n    offset: '70%'\n  });\n  $('.fade-in-up').waypoint(function () {\n    $('.fade-in-up').addClass('fadeInUp slower');\n  }, {\n    offset: '70%'\n  });\n  $('.fade-in-down').waypoint(function () {\n    $('.fade-in-down').addClass('fadeInDown slow');\n  }, {\n    offset: '70%'\n  });\n  $('.fade-in-contact').waypoint(function () {\n    $('.fade-in-contact').addClass('fadeIn slow');\n  }, {\n    offset: '70%'\n  });\n  $('.cta-left-wrapper').waypoint(function () {\n    $('.cta-left-wrapper').addClass('fadeIn slower');\n  }, {\n    offset: '70%'\n  });\n  $('.cta-right-wrapper').waypoint(function () {\n    $('.cta-right-wrapper').addClass('fadeIn slower');\n  }, {\n    offset: '70%'\n  });\n  $('.scroll-on').removeClass('scroll-on');\n});\n\n//# sourceURL=webpack:///./assets/js/scroll-animations.js?");

/***/ }),

/***/ 2:
/*!**********************************************!*\
  !*** multi ./assets/js/scroll-animations.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! C:\\xampp\\htdocs\\development\\wp-content\\themes\\lisse\\src\\assets\\js\\scroll-animations.js */\"./assets/js/scroll-animations.js\");\n\n\n//# sourceURL=webpack:///multi_./assets/js/scroll-animations.js?");

/***/ })

/******/ });