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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/modules/menu-bootstrap.js":
/*!*********************************************!*\
  !*** ./assets/js/modules/menu-bootstrap.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Bootstrap Menu\n *\n * Custom scripts for the primary navigation menu.\n */\n(function ($) {\n  'use strict';\n\n  $(function () {\n    var header = $('.start-style');\n    $(window).scroll(function () {\n      var scroll = $(window).scrollTop();\n\n      if (scroll >= 10) {\n        header.removeClass('start-style').addClass('scroll-on');\n      } else {\n        header.removeClass('scroll-on').addClass('start-style');\n      }\n    });\n  }); // Menu On Hover\n\n  $('body').on('mouseenter mouseleave', '.navbar .nav-item', function (e) {\n    if ($(window).width() > 750) {\n      var _d = $(e.target).closest('.nav-item');\n\n      _d.addClass('show');\n\n      setTimeout(function () {\n        _d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');\n      }, 1);\n    }\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./assets/js/modules/menu-bootstrap.js?");

/***/ }),

/***/ "./assets/js/modules/skip-link-focus-fix.js":
/*!**************************************************!*\
  !*** ./assets/js/modules/skip-link-focus-fix.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * Skip link focus fix\n *\n * Adds accessibility for keyboard only users.\n */\n(function () {\n  var isIe = /(trident|msie)/i.test(navigator.userAgent);\n\n  if (isIe && document.getElementById && window.addEventListener) {\n    window.addEventListener('hashchange', function () {\n      var id = location.hash.substring(1),\n          element;\n\n      if (!/^[A-z0-9_-]+$/.test(id)) {\n        return;\n      }\n\n      element = document.getElementById(id);\n\n      if (element) {\n        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {\n          element.tabIndex = -1;\n        }\n\n        element.focus();\n      }\n    }, false);\n  }\n})();\n\n//# sourceURL=webpack:///./assets/js/modules/skip-link-focus-fix.js?");

/***/ }),

/***/ "./assets/js/scripts.js":
/*!******************************!*\
  !*** ./assets/js/scripts.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/skip-link-focus-fix */ \"./assets/js/modules/skip-link-focus-fix.js\");\n/* harmony import */ var _modules_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_skip_link_focus_fix__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _modules_menu_bootstrap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/menu-bootstrap */ \"./assets/js/modules/menu-bootstrap.js\");\n/* harmony import */ var _modules_menu_bootstrap__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_modules_menu_bootstrap__WEBPACK_IMPORTED_MODULE_1__);\n/*!\n * Imports custom modules\n */\n\n\n\n//# sourceURL=webpack:///./assets/js/scripts.js?");

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./assets/js/scripts.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! C:\\xampp\\htdocs\\development\\wp-content\\plugins\\src\\assets\\js\\scripts.js */\"./assets/js/scripts.js\");\n\n\n//# sourceURL=webpack:///multi_./assets/js/scripts.js?");

/***/ })

/******/ });