const showMsg = (text, type) => {

    //alert(type);
    let salert;
    if (type == 'success' || !type) {
        salert = 'alert-success';
    } else if (type == 'error') {
        salert = 'alert-danger';
    }
    $('#flashMsg').text(text);
    $('#flashMsg').removeClass().addClass(salert);
    $('#flashMsg').show();
    $("#flashMsg").fadeIn(10000, function () {
        $("#flashMsg").fadeOut(4500);
    });
}