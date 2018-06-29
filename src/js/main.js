import DataSender from "./DataSender.js";

;(function () {
    $(document).ready( () => {

        // create new instance of data sender
        let send = new DataSender();

        // find all forms in document
        let forms = $('form');


        forms.each( (i, el) => {

            let $form = $(el);

            $form.submit( (e) => {

                e.preventDefault();

                let $form = $(e.target);

                $form =  send.checkData($form);

                console.log($form);

                console.log($form.serialize() + '&formId=' + $form[0].id);
                //send.sendData(e, );
            });
        } );
    });
})();

$(document).ready(function(){
    $('select').material_select();
});


