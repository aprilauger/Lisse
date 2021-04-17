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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/modules/Search.js":
/*!*************************************!*\
  !*** ./assets/js/modules/Search.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\n/* eslint-disable no-useless-escape */\n\n/**\n * Custom Search\n *\n * Adds a dynamic search to the theme.\n */\nvar Search = /*#__PURE__*/function () {\n  // Initiate object\n  function Search() {\n    _classCallCheck(this, Search);\n\n    this.addSearchHTML();\n    this.results = document.getElementById('search-results');\n    this.openBtn = document.getElementById('search-trigger');\n    this.closeBtn = document.getElementById('search-overlay-close');\n    this.searchOverlay = document.getElementById('search-overlay');\n    this.searchTerm = document.getElementById('search-term'); // Call events to add event listeners to the page\n\n    this.events();\n    this.isOverlayOpen = false;\n    this.isSpinnerVisible = false;\n    this.previousValue;\n    this.typingTimer;\n  } // Event handlers\n\n\n  _createClass(Search, [{\n    key: \"events\",\n    value: function events() {\n      this.openBtn.addEventListener('click', this.openOverlay.bind(this));\n      this.closeBtn.addEventListener('click', this.closeOverlay.bind(this));\n      document.addEventListener('keydown', this.keyPressDispatcher.bind(this));\n      this.searchTerm.addEventListener('keyup', this.typingLogic.bind(this));\n    }\n    /**\n     * TypingLogic\n     */\n\n  }, {\n    key: \"typingLogic\",\n    value: function typingLogic() {\n      if (this.searchTerm.value != this.previousValue) {\n        clearTimeout(this.typingTimer); // Show the spinner when user is typing a search term\n\n        if (this.searchTerm.value) {\n          if (!this.isSpinnerVisible) {\n            this.results.innerHTML = '<div class=\"loader\"></div>';\n            this.isSpinnerVisible = true;\n          } // To prevent flooding the server\n\n\n          this.typingTimer = setTimeout(this.queryResults.bind(this), 750); // Hide the spinner when the search input is empty\n        } else {\n          this.results.innerText = '';\n          this.isSpinnerVisible = false;\n        }\n      } // Search field value\n\n\n      this.previousValue = this.searchTerm.value;\n    }\n    /**\n     * QueryResults\n     */\n\n  }, {\n    key: \"queryResults\",\n    value: function queryResults() {\n      var _this = this;\n\n      // Fetch results from our custom API\n      fetch(\"\".concat(lisseData.root_url, \"/wp-json/lisse/v1/search?keyword=\").concat(this.searchTerm.value)) // Convert response to json.\n      .then(function (response) {\n        return response.json();\n      }) // Output the response\n      .then(function (results) {\n        _this.results.innerHTML = \"\\n                <div class=\\\"row\\\">\\n                    <div class=\\\"col-md-6\\\">\\n                        <div class=\\\"results\\\">Posts</div>\\n                        \".concat(results.posts.length ? '<ul class=\"link-list\">' : \"<p>No results returned for posts.</p>\", \"\\n                        \").concat(results.posts.map(function (item) {\n          return \"\\n                            <li class=\\\"card-list-item\\\">\\n                                <div class=\\\"card-title\\\">\\n                                    <a href=\\\"\".concat(encodeURI(item.permalink), \"\\\" title=\\\"\").concat(_this.escapeHTML(item.title), \"\\\">\").concat(_this.escapeHTML(item.title), \"</a> by \").concat(item.author_name, \"\\n                                </div>\\n                                <div class=\\\"published\\\">Published on \").concat(_this.escapeHTML(item.date), \"</div>\\n                                <div class=\\\"description\\\">\").concat(_this.escapeHTML(_this.truncate(item.description, 120)), \"</div>\\n                            </li>\");\n        }).join(''), \"\\n                        \").concat(results.posts.length ? '</ul>' : '', \"\\n                    </div>\\n\\n                    <div class=\\\"col-md-6\\\">\\n                        <div class=\\\"results\\\">Pages</div>\\n                        \").concat(results.pages.length ? '<ul class=\"link-list card-title\">' : \"<p>No results returned for pages.</p>\", \"\\n                        \").concat(results.pages.map(function (item) {\n          return \"<li><a href=\\\"\".concat(encodeURI(item.permalink), \"\\\" title=\\\"\").concat(_this.escapeHTML(item.title), \"\\\">\").concat(_this.escapeHTML(_this.truncate(item.title, 50)), \"</a></li>\");\n        }).join(''), \"\\n                        \").concat(results.pages.length ? '</ul>' : '', \"\\n                    </div>\\n                </div>\");\n      })[\"catch\"](function (err) {\n        _this.results.innerHTML = err + '<p>Unexpected error, please try again.</p>';\n      });\n      this.isSpinnerVisible = false;\n    }\n  }, {\n    key: \"escapeHTML\",\n    value: function escapeHTML(unsafe_str) {\n      return unsafe_str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\\\"/g, '&quot;').replace(/\\'/g, '&#39;').replace(/\\//g, '&#x2F;');\n    }\n    /**\n     * GetJSON\n     */\n\n  }, {\n    key: \"getJSON\",\n    value: function getJSON(url, callback) {\n      var xhr = new XMLHttpRequest();\n      xhr.open('GET', url, true);\n      xhr.responseType = 'json';\n\n      xhr.onload = function () {\n        var status = xhr.status;\n\n        if (status === 200) {\n          callback(null, xhr.response);\n        } else {\n          callback(status, xhr.response);\n        }\n      };\n\n      xhr.send();\n    }\n  }, {\n    key: \"keyPressDispatcher\",\n    value: function keyPressDispatcher(e) {\n      if (e.keyCode == 27 && this.isOverlayOpen) {\n        this.closeOverlay();\n      }\n    }\n    /**\n     * Open Overlay\n     */\n\n  }, {\n    key: \"openOverlay\",\n    value: function openOverlay(e) {\n      var _this2 = this;\n\n      this.searchOverlay.classList.add('search-overlay-active');\n      document.body.classList.add('body-no-scroll');\n      this.searchTerm.value = '';\n      setTimeout(function () {\n        return _this2.searchTerm.focus();\n      }, 300);\n      this.isOverlayOpen = true;\n      e.preventDefault();\n    }\n  }, {\n    key: \"closeOverlay\",\n    value: function closeOverlay() {\n      this.searchOverlay.classList.remove('search-overlay-active');\n      document.body.classList.remove('body-no-scroll');\n      this.isOverlayOpen = false;\n    }\n  }, {\n    key: \"addSearchHTML\",\n    value: function addSearchHTML() {\n      var search = document.createElement('div');\n      search.innerHTML = \"\\n            <div id=\\\"search-overlay\\\">\\n                <div class=\\\"search-top\\\">\\n                    <div class=\\\"container\\\">\\n                        <i class=\\\"fa fa-search search-icon\\\" aria-hidden=\\\"true\\\"></i>\\n                        <input type=\\\"text\\\" class=\\\"search-term\\\" placeholder=\\\"Search\\\" id=\\\"search-term\\\">\\n                        <i id=\\\"search-overlay-close\\\" class=\\\"fas fa-times\\\" aria-hidden=\\\"true\\\"></i>\\n                    </div>\\n                </div>\\n                <div class=\\\"container\\\">\\n                    <div id=\\\"search-results\\\">\\n\\n                    </div>\\n                </div>\\n            </div>\\n            \";\n      document.body.appendChild(search);\n    }\n  }, {\n    key: \"truncate\",\n    value: function truncate(str, maxLength) {\n      return str.length > maxLength ? str.substr(0, maxLength - 1) + '... ' : str;\n    }\n  }]);\n\n  return Search;\n}();\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (Search);\n\n//# sourceURL=webpack:///./assets/js/modules/Search.js?");

/***/ }),

/***/ "./assets/js/search.js":
/*!*****************************!*\
  !*** ./assets/js/search.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_Search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/Search */ \"./assets/js/modules/Search.js\");\n/*!\n * Imports custom search\n */\n\nvar search = new _modules_Search__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\n\n//# sourceURL=webpack:///./assets/js/search.js?");

/***/ }),

/***/ 3:
/*!***********************************!*\
  !*** multi ./assets/js/search.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! C:\\xampp\\htdocs\\development\\wp-content\\themes\\lisse\\src\\assets\\js\\search.js */\"./assets/js/search.js\");\n\n\n//# sourceURL=webpack:///multi_./assets/js/search.js?");

/***/ })

/******/ });