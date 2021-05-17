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

/***/ "./assets/js/waypoints.js":
/*!********************************!*\
  !*** ./assets/js/waypoints.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/*!\nWaypoints - 4.0.0\nCopyright © 2011-2015 Caleb Troughton\nLicensed under the MIT license.\nhttps://github.com/imakewebthings/waypoints/blob/master/licenses.txt\n*/\n!function () {\n  \"use strict\";\n\n  function t(o) {\n    if (!o) throw new Error(\"No options passed to Waypoint constructor\");\n    if (!o.element) throw new Error(\"No element option passed to Waypoint constructor\");\n    if (!o.handler) throw new Error(\"No handler option passed to Waypoint constructor\");\n    this.key = \"waypoint-\" + e, this.options = t.Adapter.extend({}, t.defaults, o), this.element = this.options.element, this.adapter = new t.Adapter(this.element), this.callback = o.handler, this.axis = this.options.horizontal ? \"horizontal\" : \"vertical\", this.enabled = this.options.enabled, this.triggerPoint = null, this.group = t.Group.findOrCreate({\n      name: this.options.group,\n      axis: this.axis\n    }), this.context = t.Context.findOrCreateByElement(this.options.context), t.offsetAliases[this.options.offset] && (this.options.offset = t.offsetAliases[this.options.offset]), this.group.add(this), this.context.add(this), i[this.key] = this, e += 1;\n  }\n\n  var e = 0,\n      i = {};\n  t.prototype.queueTrigger = function (t) {\n    this.group.queueTrigger(this, t);\n  }, t.prototype.trigger = function (t) {\n    this.enabled && this.callback && this.callback.apply(this, t);\n  }, t.prototype.destroy = function () {\n    this.context.remove(this), this.group.remove(this), delete i[this.key];\n  }, t.prototype.disable = function () {\n    return this.enabled = !1, this;\n  }, t.prototype.enable = function () {\n    return this.context.refresh(), this.enabled = !0, this;\n  }, t.prototype.next = function () {\n    return this.group.next(this);\n  }, t.prototype.previous = function () {\n    return this.group.previous(this);\n  }, t.invokeAll = function (t) {\n    var e = [];\n\n    for (var o in i) {\n      e.push(i[o]);\n    }\n\n    for (var n = 0, r = e.length; r > n; n++) {\n      e[n][t]();\n    }\n  }, t.destroyAll = function () {\n    t.invokeAll(\"destroy\");\n  }, t.disableAll = function () {\n    t.invokeAll(\"disable\");\n  }, t.enableAll = function () {\n    t.invokeAll(\"enable\");\n  }, t.refreshAll = function () {\n    t.Context.refreshAll();\n  }, t.viewportHeight = function () {\n    return window.innerHeight || document.documentElement.clientHeight;\n  }, t.viewportWidth = function () {\n    return document.documentElement.clientWidth;\n  }, t.adapters = [], t.defaults = {\n    context: window,\n    continuous: !0,\n    enabled: !0,\n    group: \"default\",\n    horizontal: !1,\n    offset: 0\n  }, t.offsetAliases = {\n    \"bottom-in-view\": function bottomInView() {\n      return this.context.innerHeight() - this.adapter.outerHeight();\n    },\n    \"right-in-view\": function rightInView() {\n      return this.context.innerWidth() - this.adapter.outerWidth();\n    }\n  }, window.Waypoint = t;\n}(), function () {\n  \"use strict\";\n\n  function t(t) {\n    window.setTimeout(t, 1e3 / 60);\n  }\n\n  function e(t) {\n    this.element = t, this.Adapter = n.Adapter, this.adapter = new this.Adapter(t), this.key = \"waypoint-context-\" + i, this.didScroll = !1, this.didResize = !1, this.oldScroll = {\n      x: this.adapter.scrollLeft(),\n      y: this.adapter.scrollTop()\n    }, this.waypoints = {\n      vertical: {},\n      horizontal: {}\n    }, t.waypointContextKey = this.key, o[t.waypointContextKey] = this, i += 1, this.createThrottledScrollHandler(), this.createThrottledResizeHandler();\n  }\n\n  var i = 0,\n      o = {},\n      n = window.Waypoint,\n      r = window.onload;\n  e.prototype.add = function (t) {\n    var e = t.options.horizontal ? \"horizontal\" : \"vertical\";\n    this.waypoints[e][t.key] = t, this.refresh();\n  }, e.prototype.checkEmpty = function () {\n    var t = this.Adapter.isEmptyObject(this.waypoints.horizontal),\n        e = this.Adapter.isEmptyObject(this.waypoints.vertical);\n    t && e && (this.adapter.off(\".waypoints\"), delete o[this.key]);\n  }, e.prototype.createThrottledResizeHandler = function () {\n    function t() {\n      e.handleResize(), e.didResize = !1;\n    }\n\n    var e = this;\n    this.adapter.on(\"resize.waypoints\", function () {\n      e.didResize || (e.didResize = !0, n.requestAnimationFrame(t));\n    });\n  }, e.prototype.createThrottledScrollHandler = function () {\n    function t() {\n      e.handleScroll(), e.didScroll = !1;\n    }\n\n    var e = this;\n    this.adapter.on(\"scroll.waypoints\", function () {\n      (!e.didScroll || n.isTouch) && (e.didScroll = !0, n.requestAnimationFrame(t));\n    });\n  }, e.prototype.handleResize = function () {\n    n.Context.refreshAll();\n  }, e.prototype.handleScroll = function () {\n    var t = {},\n        e = {\n      horizontal: {\n        newScroll: this.adapter.scrollLeft(),\n        oldScroll: this.oldScroll.x,\n        forward: \"right\",\n        backward: \"left\"\n      },\n      vertical: {\n        newScroll: this.adapter.scrollTop(),\n        oldScroll: this.oldScroll.y,\n        forward: \"down\",\n        backward: \"up\"\n      }\n    };\n\n    for (var i in e) {\n      var o = e[i],\n          n = o.newScroll > o.oldScroll,\n          r = n ? o.forward : o.backward;\n\n      for (var s in this.waypoints[i]) {\n        var a = this.waypoints[i][s],\n            l = o.oldScroll < a.triggerPoint,\n            h = o.newScroll >= a.triggerPoint,\n            p = l && h,\n            u = !l && !h;\n        (p || u) && (a.queueTrigger(r), t[a.group.id] = a.group);\n      }\n    }\n\n    for (var c in t) {\n      t[c].flushTriggers();\n    }\n\n    this.oldScroll = {\n      x: e.horizontal.newScroll,\n      y: e.vertical.newScroll\n    };\n  }, e.prototype.innerHeight = function () {\n    return this.element == this.element.window ? n.viewportHeight() : this.adapter.innerHeight();\n  }, e.prototype.remove = function (t) {\n    delete this.waypoints[t.axis][t.key], this.checkEmpty();\n  }, e.prototype.innerWidth = function () {\n    return this.element == this.element.window ? n.viewportWidth() : this.adapter.innerWidth();\n  }, e.prototype.destroy = function () {\n    var t = [];\n\n    for (var e in this.waypoints) {\n      for (var i in this.waypoints[e]) {\n        t.push(this.waypoints[e][i]);\n      }\n    }\n\n    for (var o = 0, n = t.length; n > o; o++) {\n      t[o].destroy();\n    }\n  }, e.prototype.refresh = function () {\n    var t,\n        e = this.element == this.element.window,\n        i = e ? void 0 : this.adapter.offset(),\n        o = {};\n    this.handleScroll(), t = {\n      horizontal: {\n        contextOffset: e ? 0 : i.left,\n        contextScroll: e ? 0 : this.oldScroll.x,\n        contextDimension: this.innerWidth(),\n        oldScroll: this.oldScroll.x,\n        forward: \"right\",\n        backward: \"left\",\n        offsetProp: \"left\"\n      },\n      vertical: {\n        contextOffset: e ? 0 : i.top,\n        contextScroll: e ? 0 : this.oldScroll.y,\n        contextDimension: this.innerHeight(),\n        oldScroll: this.oldScroll.y,\n        forward: \"down\",\n        backward: \"up\",\n        offsetProp: \"top\"\n      }\n    };\n\n    for (var r in t) {\n      var s = t[r];\n\n      for (var a in this.waypoints[r]) {\n        var l,\n            h,\n            p,\n            u,\n            c,\n            d = this.waypoints[r][a],\n            f = d.options.offset,\n            w = d.triggerPoint,\n            y = 0,\n            g = null == w;\n        d.element !== d.element.window && (y = d.adapter.offset()[s.offsetProp]), \"function\" == typeof f ? f = f.apply(d) : \"string\" == typeof f && (f = parseFloat(f), d.options.offset.indexOf(\"%\") > -1 && (f = Math.ceil(s.contextDimension * f / 100))), l = s.contextScroll - s.contextOffset, d.triggerPoint = y + l - f, h = w < s.oldScroll, p = d.triggerPoint >= s.oldScroll, u = h && p, c = !h && !p, !g && u ? (d.queueTrigger(s.backward), o[d.group.id] = d.group) : !g && c ? (d.queueTrigger(s.forward), o[d.group.id] = d.group) : g && s.oldScroll >= d.triggerPoint && (d.queueTrigger(s.forward), o[d.group.id] = d.group);\n      }\n    }\n\n    return n.requestAnimationFrame(function () {\n      for (var t in o) {\n        o[t].flushTriggers();\n      }\n    }), this;\n  }, e.findOrCreateByElement = function (t) {\n    return e.findByElement(t) || new e(t);\n  }, e.refreshAll = function () {\n    for (var t in o) {\n      o[t].refresh();\n    }\n  }, e.findByElement = function (t) {\n    return o[t.waypointContextKey];\n  }, window.onload = function () {\n    r && r(), e.refreshAll();\n  }, n.requestAnimationFrame = function (e) {\n    var i = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || t;\n    i.call(window, e);\n  }, n.Context = e;\n}(), function () {\n  \"use strict\";\n\n  function t(t, e) {\n    return t.triggerPoint - e.triggerPoint;\n  }\n\n  function e(t, e) {\n    return e.triggerPoint - t.triggerPoint;\n  }\n\n  function i(t) {\n    this.name = t.name, this.axis = t.axis, this.id = this.name + \"-\" + this.axis, this.waypoints = [], this.clearTriggerQueues(), o[this.axis][this.name] = this;\n  }\n\n  var o = {\n    vertical: {},\n    horizontal: {}\n  },\n      n = window.Waypoint;\n  i.prototype.add = function (t) {\n    this.waypoints.push(t);\n  }, i.prototype.clearTriggerQueues = function () {\n    this.triggerQueues = {\n      up: [],\n      down: [],\n      left: [],\n      right: []\n    };\n  }, i.prototype.flushTriggers = function () {\n    for (var i in this.triggerQueues) {\n      var o = this.triggerQueues[i],\n          n = \"up\" === i || \"left\" === i;\n      o.sort(n ? e : t);\n\n      for (var r = 0, s = o.length; s > r; r += 1) {\n        var a = o[r];\n        (a.options.continuous || r === o.length - 1) && a.trigger([i]);\n      }\n    }\n\n    this.clearTriggerQueues();\n  }, i.prototype.next = function (e) {\n    this.waypoints.sort(t);\n    var i = n.Adapter.inArray(e, this.waypoints),\n        o = i === this.waypoints.length - 1;\n    return o ? null : this.waypoints[i + 1];\n  }, i.prototype.previous = function (e) {\n    this.waypoints.sort(t);\n    var i = n.Adapter.inArray(e, this.waypoints);\n    return i ? this.waypoints[i - 1] : null;\n  }, i.prototype.queueTrigger = function (t, e) {\n    this.triggerQueues[e].push(t);\n  }, i.prototype.remove = function (t) {\n    var e = n.Adapter.inArray(t, this.waypoints);\n    e > -1 && this.waypoints.splice(e, 1);\n  }, i.prototype.first = function () {\n    return this.waypoints[0];\n  }, i.prototype.last = function () {\n    return this.waypoints[this.waypoints.length - 1];\n  }, i.findOrCreate = function (t) {\n    return o[t.axis][t.name] || new i(t);\n  }, n.Group = i;\n}(), function () {\n  \"use strict\";\n\n  function t(t) {\n    this.$element = e(t);\n  }\n\n  var e = window.jQuery,\n      i = window.Waypoint;\n  e.each([\"innerHeight\", \"innerWidth\", \"off\", \"offset\", \"on\", \"outerHeight\", \"outerWidth\", \"scrollLeft\", \"scrollTop\"], function (e, i) {\n    t.prototype[i] = function () {\n      var t = Array.prototype.slice.call(arguments);\n      return this.$element[i].apply(this.$element, t);\n    };\n  }), e.each([\"extend\", \"inArray\", \"isEmptyObject\"], function (i, o) {\n    t[o] = e[o];\n  }), i.adapters.push({\n    name: \"jquery\",\n    Adapter: t\n  }), i.Adapter = t;\n}(), function () {\n  \"use strict\";\n\n  function t(t) {\n    return function () {\n      var i = [],\n          o = arguments[0];\n      return t.isFunction(arguments[0]) && (o = t.extend({}, arguments[1]), o.handler = arguments[0]), this.each(function () {\n        var n = t.extend({}, o, {\n          element: this\n        });\n        \"string\" == typeof n.context && (n.context = t(this).closest(n.context)[0]), i.push(new e(n));\n      }), i;\n    };\n  }\n\n  var e = window.Waypoint;\n  window.jQuery && (window.jQuery.fn.waypoint = t(window.jQuery)), window.Zepto && (window.Zepto.fn.waypoint = t(window.Zepto));\n}();\n\n//# sourceURL=webpack:///./assets/js/waypoints.js?");

/***/ }),

/***/ 3:
/*!**************************************!*\
  !*** multi ./assets/js/waypoints.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__(/*! C:\\xampp\\htdocs\\development\\wp-content\\plugins\\src\\assets\\js\\waypoints.js */\"./assets/js/waypoints.js\");\n\n\n//# sourceURL=webpack:///multi_./assets/js/waypoints.js?");

/***/ })

/******/ });