// check if logged in

let liu = window.sessionStorage.chamapoalia;

// alert(liu);

if (liu == undefined) {

    // show login view

    $('.main_container').load('views/login.html');

}else {

    // show dash view
    $('.main_container').load('views/dash.html');

}