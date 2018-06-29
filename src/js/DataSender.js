export default class DataSender {

  /**
   * @param e
   * @returns {*}
   */
  checkData(form) {
  // check if data can hold invalid values

    if (form[0].id === 'feesByAge') {

      // the values are need to check
      let fromAge = form.find( '#ageFrom' ),
        toAge = form.find( '#ageTo' ),
        fromAgeVal = form.find( '#ageFrom' ).val(),
        toAgeVal = form.find( '#ageTo' ).val();

      // validation
      if (fromAgeVal > toAgeVal) {
        let a = toAgeVal,
          b = fromAgeVal;

        // setting right values
        fromAge.val(a);
        toAge.val(b);

        return form;
      }

      return form;
    }

    return form;
  }

  /**
   * @param form
   * @param url
   * @param method
   * @param callback
   */
  sendData( form, url, method, callback) {
    //send data from form to server

    form.preventDefault();

    let serializedString = form.serialize();
    serializedString += '&formId=' + form[0].id;

    $.ajax({
      type: method,
      url: url,
      data: serializedString,
      success: callback(result)
    });
  }

  showResult(result) {
    console.log(result);
  }

}
