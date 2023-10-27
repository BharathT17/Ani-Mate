<?php
 

	$name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = 'Message from Contact Form';

        $to = 'abdvilliears17@gmail.com';
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)) {
            header('Location: thank.html');
            exit;
        } else {
            header('Location: error.html');
            exit;
        }




?>
