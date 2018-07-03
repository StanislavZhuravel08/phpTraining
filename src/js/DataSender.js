import {methods, urls} from "./config";

export default class DataSender {

    /**
     * @param $form
     */
    sendData($form) {
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

}
