(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

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
    }]);

    return DataSender;
}();

exports.default = DataSender;

},{}],2:[function(require,module,exports){
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
        this.ruleName = '[data-validator-rule]';
        this.minRange = 'validate-range min';
        this.maxRange = 'validate-range max';
        this.self = this;
    }

    /**
     *
     * @param $form
     * @returns {Array}
     */


    _createClass(Validator, [{
        key: 'getFieldsRules',
        value: function getFieldsRules($form) {
            var rules = [];
            $.each(this.getFields($form), function (index, field) {
                rules[index] = $(field).attr('data-validator-rule').split(' ');
            });
            return rules;
        }

        /**
         *
         * @param $form
         * @returns {*}
         */

    }, {
        key: 'getFields',
        value: function getFields($form) {
            return $form.find('[data-validator-rule]');
        }
    }, {
        key: 'getRangePair',
        value: function getRangePair($form) {}
        /**
         * @param $form
         */

    }, {
        key: 'validate',
        value: function validate($form) {
            var fieldsRules = this.getFieldsRules($form);
            for (var i = 0; i < fieldsRules.length; i++) {
                if (this.rules[fieldsRules[i][0]]) {
                    var condition = this.rules[fieldsRules[i][0]]($form);
                    console.log(+'this');
                    if (!condition) {
                        this.showErrorMessage();
                    }
                }
            }
        }
    }, {
        key: 'showErrorMessage',
        value: function showErrorMessage() {
            Materialize.toast('Need to set value', 3000, 'red accent-2');
        }

        /**
         *
         * @param $form
         */

    }, {
        key: 'validateInt',
        value: function validateInt($form) {
            var intField = $form.find('[data-validator-rule="validate-int"]');
            if (intField.val() === null) {
                return false;
            }
        }

        /**
         *
         * @param $form
         * @returns {boolean}
         */

    }, {
        key: 'validateRange',
        value: function validateRange($form) {
            var rangeId = $form.find("[data-range-id]");
            var rangeMin = void 0,
                rangeMax = void 0,
                a = void 0,
                b = void 0;
            $.each(rangeId, function (index, item) {
                if ($(item).attr('data-validator-rule').includes('min')) {
                    rangeMin = $(item);
                }
                rangeMax = $(item);
            });

            if (+rangeMin.val() > +rangeMax.val()) {
                a = +rangeMin.val();
                b = +rangeMax.val();
                rangeMin.val(b);
                rangeMax.val(a);
            }

            return true;
        }

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
"use strict";

var _DataSender = require("./classes/DataSender.js");

var _DataSender2 = _interopRequireDefault(_DataSender);

var _Validator = require("./classes/Validator.js");

var _Validator2 = _interopRequireDefault(_Validator);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

(function () {
    $(document).ready(function () {

        //create instance of validator
        var validator = new _Validator2.default();

        // validator.getFields('#feesByAge');

        // create new instance of data sender
        var dataSender = new _DataSender2.default();

        // find all forms in document
        var forms = $('form');

        // watches submits
        $.each(forms, function (index, form) {
            var $form = $(form);

            $form.submit(function (event) {

                var validator = new _Validator2.default();

                event.preventDefault();
                var $form = $(event.currentTarget);
                validator.validate($form);

                // send request data with AJAX
                var request = dataSender.sendData($form);

                // work with response data
                request.done(function (data) {
                    console.log(data);
                });
                request.fail(function (jqXHR, textStatus) {
                    console.log('Something went wrong' + textStatus);
                });
            });
        });
    });
})();

$(document).ready(function () {
    $('select').material_select();
});

},{"./classes/DataSender.js":1,"./classes/Validator.js":2}]},{},[3]);
