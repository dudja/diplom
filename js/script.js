$(document).ready(function () {
    $("#form-signin").submit(function (e) {
       //  e.preventDefault();

        var login = $.trim($("#login").val());
        var password = $.trim($("#password").val());

        if(login == '' || password == '') {
            $("img.profile-img").attr("src","/images/user-error.png");
        } else {
            $("img.profile-img").attr("src","/images/user-ok.png");
        }
// To do ajax function
    //    setTimeout(function(){},5000);
    }).delay(1000)
});