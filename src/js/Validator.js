export default class Validator {
    constructor() {
        this.rules = {
            'validate-int': this.validateInt,
            'validate-range': this.validateRange,
            'validate-required': this.validateRequired
        };
    }

    getFields($form) {
        let fieldData = {},
            rules =[],
            params =[];

        let fields = $form.querySelectorAll('[data-validator-rule]');
        console.log(fields);
    }

    /**
     * @param $form
     */
    validate($form) {

    }

    /**
     * @param value
     * @returns {boolean}
     */
    validateInt(value) {
        return Number.isInteger(value);
    }

    /**
     * @param value
     */
    validateRange(value) {

    }

    /**
     * @param value
     */
    validateRequired(value) {

    }

}
