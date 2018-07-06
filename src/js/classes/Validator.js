export default class Validator {

    constructor() {
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
    getFieldsRules($form) {
        let rules = [];
        $.each(this.getFields($form), (index, field) => {
            rules[index] = $(field).attr('data-validator-rule').split(' ');
        });
        return rules;
    }

    /**
     *
     * @param $form
     * @returns {*}
     */
    getFields($form) {
        return $form.find('[data-validator-rule]');
    }

    getRangePair($form) {

    }
    /**
     * @param $form
     */
    validate($form) {
        let fieldsRules = this.getFieldsRules($form);
        for (let i =0; i < fieldsRules.length; i++) {
            if (this.rules[fieldsRules[i][0]]) {
                let condition = this.rules[fieldsRules[i][0]]($form);
                console.log(+'this');
                if (!condition) {
                    this.showErrorMessage();
                }
            }
        }
    }

    showErrorMessage() {
        Materialize.toast('Need to set value', 3000, 'red accent-2');
    }

    /**
     *
     * @param $form
     */
    validateInt($form) {
        let intField = $form.find('[data-validator-rule="validate-int"]');
        if (intField.val() === null) {
            return false;
        }

    }

    /**
     *
     * @param $form
     * @returns {boolean}
     */
    validateRange($form) {
        let rangeId = $form.find("[data-range-id]");
        let rangeMin, rangeMax, a, b;
        $.each(rangeId, (index, item) => {
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
    validateRequired(value) {

    }

}
