<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_to = "";

    $email_subject = "Contact Form";


    $first_name = $_POST['firstName'];

    $company = $_POST['company'];

    $email_from = $_POST['email'];

    $telephone = $_POST['phone'];

    $comments = $_POST['message'];

    $string_exp = "/^[A-Za-z .'-]+$/";
    $email_exp = "/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/";
    $telephone_exp = "/^[0-9\-\\+\(\)\s]/";

    if(empty($first_name)){
        echo "Name is not set, please enter name.";
        return 0;
    }

    if(empty($email_from)){
        echo "Email is not set, please enter email.";
        return 0;
    }

    if(empty($comments)){
        echo "Message is not set, please enter message.";
        return 0;
    }

    if(!preg_match($email_exp,$email_from)) {
        echo 'The Email Address you entered does not appear to be valid.';
        return 0;
    }

    if(!preg_match($string_exp,$first_name)) {
        echo 'The Name you entered does not appear to be valid.';
        return 0;
    }

    if(!preg_match($telephone_exp,$telephone )) {
        echo 'The Telephone number you entered does not appear to be valid.';
        return 0;
    }

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message = "Name: ".clean_string($first_name)."\n";

    $email_message = "Company: ".clean_string($company)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone Number: ".clean_string($telephone)."\n";

    $email_message .= "Message: ".clean_string($comments)."\n";


    //Mail Hedaers
    $headers =  "MIME-Version: 1.0\r\n" .

    "Content-type: text/plain; charset=iso-8859-1\r\n".

    'From: ' . $email_from . "\r\n" .

    'Reply-To: ' . $email_from . "\r\n" .

    'X-Mailer: PHP/' . phpversion();


    if(mail($email_to, $email_subject, $email_message. $headers)){
        //http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
       // http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

    // echo $headers;
    //echo $email_message;
}
else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}

?>
