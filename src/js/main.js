import DataSender from "./classes/DataSender.js";
import Validator from "./classes/Validator.js";

(function () {
    $(document).ready( () => {


        //create instance of validator
        let validator = new Validator();

        // validator.getFields('#feesByAge');

        // create new instance of data sender
        let dataSender = new DataSender();

        // find all forms in document
        let forms = $('form');

        // watches submits
        $.each( forms, (index, form) => {
            let $form = $(form);

            $form.submit( (event) => {

                let validator = new Validator();

                event.preventDefault();
                let $form = $(event.currentTarget);
                validator.validate($form);

                // send request data with AJAX
                let request = dataSender.sendData($form);

                // work with response data
                request.done( (data) => {
                    console.log(data);
                });
                request.fail( (jqXHR, textStatus) => {
                    console.log('Something went wrong' + textStatus);
                });
            });
        });
    });
})();

$(document).ready(function(){
    $('select').material_select();
});


