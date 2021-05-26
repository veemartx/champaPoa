// check logged in

$('.loginBtn').click(()=>{

    $('.loginContainer').slideToggle('slow');

});


// alert('yo yo');
$('#registrationForm').submit((e)=>{

    e.preventDefault();

    let regData=$('#registrationForm').serialize();

    // add a loading class to the  btn
    $('.regSbtBtn').addClass('loading');


    // alert(regData);
    $.post('server/register.php',regData,(data,status)=>{

        // remove loading class

        $('.regSbtBtn').removeClass('loading');

        if(data=='success'){

            // show the message

            $('.regMessage').removeClass('error');

            $('.regMessage').addClass('success');

            $('.regMessage').html('Registration Successful, Please Login To Continue');

            // show the message
            $('.regMessage').show('slow');

        }else{

            // show the error message
            $('.regMessage').removeClass('success');

            $('.regMessage').addClass('error');

            $('.regMessage').html('Unknown error occured');

            // show the message
            $('.regMessage').show('slow');
        }

    });
})


$('#loginForm').submit((e)=>{

    e.preventDefault();

    let loginData=$('#loginForm').serialize();

    // alert(loginData);
    $.post('server/login.php',loginData,(data,status)=>{
        
        // alert(data);

        let res=JSON.parse(data);

        if(res.login==true){

            // load localStorage

            window.localStorage.conTrack_lgd_usr=res.user_id;

            // redirect to home
            window.location.href="user/";

        }else{
            // show the message
            $('.loginMessage').show('slow');
        }
    });
})
