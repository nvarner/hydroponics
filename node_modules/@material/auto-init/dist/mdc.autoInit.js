/*!
 Material Components for the web
 Copyright (c) 2016 Google Inc.
 License: Apache-2.0
*/
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else if(typeof exports === 'object')
		exports["autoInit"] = factory();
	else
		root["mdc"] = root["mdc"] || {}, root["mdc"]["autoInit"] = factory();
})(this, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/assets/";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	module.exports = __webpack_require__(1);


/***/ },
/* 1 */
/***/ function(module, exports) {

	'use strict';

	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.default = mdcAutoInit;
	/**
	 * Copyright 2016 Google Inc. All Rights Reserved.
	 *
	 * Licensed under the Apache License, Version 2.0 (the "License");
	 * you may not use this file except in compliance with the License.
	 * You may obtain a copy of the License at
	 *
	 *      http://www.apache.org/licenses/LICENSE-2.0
	 *
	 * Unless required by applicable law or agreed to in writing, software
	 * distributed under the License is distributed on an "AS IS" BASIS,
	 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	 * See the License for the specific language governing permissions and
	 * limitations under the License.
	 */

	var registry = Object.create(null);

	var CONSOLE_WARN = console.warn.bind(console);

	/**
	 * Auto-initializes all mdc components on a page.
	 */
	function mdcAutoInit() {
	  var root = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : document;
	  var warn = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : CONSOLE_WARN;

	  var nodes = root.querySelectorAll('[data-mdc-auto-init]');
	  for (var i = 0, node; node = nodes[i]; i++) {
	    var ctorName = node.dataset.mdcAutoInit;
	    if (!ctorName) {
	      throw new Error('(mdc-auto-init) Constructor name must be given.');
	    }

	    var Ctor = registry[ctorName];
	    if (typeof Ctor !== 'function') {
	      throw new Error('(mdc-auto-init) Could not find constructor in registry for ' + ctorName);
	    }

	    if (node[ctorName]) {
	      warn('(mdc-auto-init) Component already initialized for ' + node + '. Skipping...');
	      continue;
	    }

	    // TODO: Should we make an eslint rule for an attachTo() static method?
	    var component = Ctor.attachTo(node);
	    Object.defineProperty(node, ctorName, {
	      value: component,
	      writable: false,
	      enumerable: false,
	      configurable: true
	    });
	  }
	}

	mdcAutoInit.register = function (componentName, Ctor) {
	  var warn = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : CONSOLE_WARN;

	  if (typeof Ctor !== 'function') {
	    throw new Error('(mdc-auto-init) Invalid Ctor value ' + Ctor + '. Expected function');
	  }
	  if (registry[componentName]) {
	    warn('(mdc-auto-init) Overriding registration for ' + componentName + ' with ' + Ctor + '. ' + ('Was: ' + registry[componentName]));
	  }
	  registry[componentName] = Ctor;
	};

	mdcAutoInit.deregister = function (componentName) {
	  delete registry[componentName];
	};

	mdcAutoInit.deregisterAll = function () {
	  Object.keys(registry).forEach(this.deregister, this);
	};

/***/ }
/******/ ])
});
;