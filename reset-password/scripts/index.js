// add the email to the email input element
// get the name of the project from the url
$.urlParam = function (name) {

    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.search);

    return (results !== null) ? results[1] || 0 : false;
}

// get the name
let email = $.urlParam('user');


//  set the hidden variables
// project name
document.getElementById('email').value = email;



// when the form is submitted

$('#admin-reset-password').submit((e)=>{

    e.preventDefault();

    let reset_pass_data=$('#admin-reset-password').serialize();

    // alert(reset_pass_data);
    $.post('server/reset_pass.php',reset_pass_data,(data,status)=>{

        alert(data);
        // add the data to the message and show the message
        if(data=='success'){

            $('.password-reset-message').removeClass('error');
            $('.password-reset-message').addClass('success');

            $('.password-reset-message').html(data);

            $('.password-reset-message').show('slow');
        }else{


            $('.password-reset-message').removeClass('success');
            $('.password-reset-message').addClass('error');

            $('.password-reset-message').html(data);

            $('.password-reset-message').show('slow');
        }
        

    });
})