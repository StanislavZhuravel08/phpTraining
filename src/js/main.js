import DataSender from "./DataSender.js";
import Validator from "./Validator.js";
import {urls, methods} from "./config.js";

(function () {
    $(document).ready( () => {

        //create instance of validator
        let validator = new Validator();

        // validator.getFields('#feesByAge');

        // create new instance of data sender
        let dataSender = new DataSender();

        // find all forms in document
        let form = $('#feesByAge');
        form.submit((event) => {
            event.preventDefault();

            let $form = $(event.currentTarget);

            let request = dataSender.sendData($form);

            request.done( (data) => {
                console.log(data);
            });
            request.fail( (jqXHR, textStatus) => {
                console.log('Something went wrong' + textStatus);
            });
        });
    });
})();

$(document).ready(function(){
    $('select').material_select();
});


