(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _config = require('./config');

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var DataSender = function () {
    function DataSender() {
        _classCallCheck(this, DataSender);
    }

    _createClass(DataSender, [{
        key: 'sendData',


        /**
         * @param $form
         */
        value: function sendData($form) {
            return $.ajax({
                type: $form.attr('method') ? $form.attr('method') : 'post',
                url: $form.attr('action'),
                dataType: 'json',
                data: $form.serialize()
            });
        }

        // checkData($form) {
        //     // check if data can hold invalid values
        //
        //     if ($form.id() === 'feesByAge') {
        //
        //         // the values are need to check
        //         let fromAge = form.find('#ageFrom'),
        //             toAge = form.find('#ageTo'),
        //             fromAgeVal = form.find('#ageFrom').val(),
        //             toAgeVal = form.find('#ageTo').val();
        //
        //         // validation
        //         if (fromAgeVal > toAgeVal) {
        //             let a = toAgeVal,
        //                 b = fromAgeVal;
        //
        //             // setting right values
        //             fromAge.val(a);
        //             toAge.val(b);
        //
        //             return form;
        //         }
        //
        //         return form;
        //     }
        //
        //     return form;
        // }

    }]);

    return DataSender;
}();

exports.default = DataSender;

},{"./config":3}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Validator = function () {
    function Validator() {
        _classCallCheck(this, Validator);

        this.rules = {
            'validate-int': this.validateInt,
            'validate-range': this.validateRange,
            'validate-required': this.validateRequired
        };
    }

    _createClass(Validator, [{
        key: 'getFields',
        value: function getFields($form) {
            var fieldData = {},
                rules = [],
                params = [];

            var fields = $form.querySelectorAll('[data-validator-rule]');
            console.log(fields);
        }

        /**
         * @param $form
         */

    }, {
        key: 'validate',
        value: function validate($form) {}

        /**
         * @param value
         * @returns {boolean}
         */

    }, {
        key: 'validateInt',
        value: function validateInt(value) {
            return Number.isInteger(value);
        }

        /**
         * @param value
         */

    }, {
        key: 'validateRange',
        value: function validateRange(value) {}

        /**
         * @param value
         */

    }, {
        key: 'validateRequired',
        value: function validateRequired(value) {}
    }]);

    return Validator;
}();

exports.default = Validator;

},{}],3:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});
// stores servers url's
var urls = ['../../php/index.php'];
var methods = ['POST', 'GET'];

exports.urls = urls;
exports.methods = methods;

},{}],4:[function(require,module,exports){
"use strict";

var _DataSender = require("./DataSender.js");

var _DataSender2 = _interopRequireDefault(_DataSender);

var _Validator = require("./Validator.js");

var _Validator2 = _interopRequireDefault(_Validator);

var _config = require("./config.js");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

(function () {
    $(document).ready(function () {

        //create instance of validator
        var validator = new _Validator2.default();

        // validator.getFields('#feesByAge');

        // create new instance of data sender
        var dataSender = new _DataSender2.default();

        // find all forms in document
        var form = $('#feesByAge');
        form.submit(function (event) {
            event.preventDefault();

            var $form = $(event.currentTarget);

            var request = dataSender.sendData($form);

            request.done(function (data) {
                console.log(data);
            });
            request.fail(function (jqXHR, textStatus) {
                console.log('Something went wrong' + textStatus);
            });
        });
    });
})();

$(document).ready(function () {
    $('select').material_select();
});

},{"./DataSender.js":1,"./Validator.js":2,"./config.js":3}]},{},[4]);
