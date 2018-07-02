export default class Validator {
    constructor() {
        this.validators = {
            'validate-int': this.validateInt,
            'validate-range': this.validateRange,
            'validate-required': this.validateRequired
        }
    }

    validate($form) {

    }
}
