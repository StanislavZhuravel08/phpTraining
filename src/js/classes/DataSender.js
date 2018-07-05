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
}
