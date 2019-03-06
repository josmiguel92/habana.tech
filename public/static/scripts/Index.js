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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/scripts/Index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/scripts/Index.js":
/*!*********************************!*\
  !*** ./assets/scripts/Index.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nvar _smoothScroll = __webpack_require__(/*! ./modules/_smoothScroll */ \"./assets/scripts/modules/_smoothScroll.js\");\n\nvar _smoothScroll2 = _interopRequireDefault(_smoothScroll);\n\nfunction _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }\n\nnew _smoothScroll2.default();\n\n//# sourceURL=webpack:///./assets/scripts/Index.js?");

/***/ }),

/***/ "./assets/scripts/modules/_smoothScroll.js":
/*!*************************************************!*\
  !*** ./assets/scripts/modules/_smoothScroll.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
eval("\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n\nvar _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar SmoothScrooll = function () {\n    function SmoothScrooll() {\n        _classCallCheck(this, SmoothScrooll);\n\n        this.offset = -10;\n        this.call = null;\n        this.links = document.querySelector(\".nav a[href^='#']\");\n        this.events();\n    }\n\n    _createClass(SmoothScrooll, [{\n        key: \"events\",\n        value: function events() {\n            this.links.addEventListener(\"click\", this.reply_click.bind(this));\n        }\n    }, {\n        key: \"scroll\",\n        value: function scroll() {\n            if (this.offset - document.documentElement.scrollTop > 0) {\n                document.documentElement.scrollTop += 10;\n            } else if (this.offset - document.documentElement.scrollTop < 0) {\n                document.documentElement.scrollTop -= 9;\n            } else {\n                clearInterval(this.call);\n            }\n            // console.log(document.documentElement.scrollTop);\n        }\n    }, {\n        key: \"reply_click\",\n        value: function reply_click(event) {\n            event.preventDefault();\n            this.call = setInterval(this.scroll.bind(this), 10);\n            var targetElement = event.target.getAttribute('href');\n            this.offset = document.querySelector(targetElement).offsetTop;\n        }\n    }]);\n\n    return SmoothScrooll;\n}();\n\nexports.default = SmoothScrooll;\n\n//# sourceURL=webpack:///./assets/scripts/modules/_smoothScroll.js?");

/***/ })

/******/ });