// when the reset password form is submitted

$('#reset_password_form').submit((e) => {

    // loading class
    $('.recover-btn').addClass('loading');

    e.preventDefault();

    let reset_pass_data = $('#reset_password_form').serialize();

    // post the data
    $.post('server/reset_password.php', reset_pass_data, (data, status) => {

        // remove loading class
        $('.recover-btn').removeClass('loading');

        alert(data)
        let reset_pass_res_data=JSON.parse(data);

        if(reset_pass_res_data.success==true){

            // remove the error class from the message
            $('.pass-reset-message').removeClass('error');

            // add success class
            $('.pass-reset-message').addClass('success');

            // add html
            $('.pass-reset-message').html('Please Check Your Inbox To Reset Your Password');

            // show
            $('.pass-reset-message').show('slow');

        }else{

            // remove success message
            $('.pass-reset-message').removeClass('success');

            // add class error
            $('.pass-reset-message').addClass('error');

            // html
            $('.pass-reset-message').html('Unkown error, please try again later');


            // show
            $('.pass-reset-message').show('slow');

        }
    });
})
