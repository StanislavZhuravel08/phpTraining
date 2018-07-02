export default class Validator {
    constructor() {
        this.validators = {
            'validate-int': this.validateInt,
            'validate-range': this.validateRange,
            'validate-required': this.validateRequired
        };
    }

    validate($form) {

    }

    /**
     * @param value
     * @returns {boolean}
     */
    validateInt(value) {
        return Number.isInteger(value);
    }

    validateRange($form) {
        let min = $form.find('input').data();
    }
}
