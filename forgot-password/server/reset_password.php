<?php

    require 'connect.php';

    use PHPMailer\PHPMailer\PHPMailer;
    require 'phpclasses/phpMailer/vendor/autoload.php';

    // get the sent data
    $email=$_POST['email'];

    // check if a user withe the email exists
    $sel="SELECT * FROM users WHERE user_email='$email'";

    $resObj=new stdClass();

    // query
    $sel_query=mysqli_query($con,$sel);

    if($row=mysqli_fetch_assoc($sel_query)){

        $resObj->exists=true;

        $link_id=substr(str_shuffle('1234567890'),0,4);

        // create the message
        $message="
            <center><h4>Click the link below to reset your account's password</h4></center>

            <br> </br>

            <div>http://localhost/projects/faceid/reset-password/?=action=reset-pass&&user=".$email."&link_id=".$link_id."</>
        ";

        $subject="Password Reset";
        // send the mail

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "4martx@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "Sly676117";
        //Set who the message is to be sent from
        $mail->setFrom('4martx@gmail.com.com', 'Vee');
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($email, 'User');
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->Body=$message;
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file

        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $resObj->email_send_message="message sent";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
                #echo "Message saved!";
            #}

            $reset_id="RID-".substr(str_shuffle('1234567890'),0,4);
            // insert the into the db
            $insert="INSERT INTO password_reset (reset_id,reset_user,reset_link_id,reset_status) 
            
            VALUES('$reset_id','$email','$link_id','pending')";

            // $query
            if(mysqli_query($con,$insert)){

                $resObj->success=true;

                $resObj->insert_message="logged reset successfully";

            }else{

                $resObj->success=false;

                $resObj->insert_message=mysqli_error($con);
            }
        }
        
    }else{

        $resObj->exists=false;

        $resObj->exists_message="This user doesnot exist";
        
    }
   

    echo json_encode($resObj);

