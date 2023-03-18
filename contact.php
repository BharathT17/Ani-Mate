<?php
 

	$name = $_POST['name'];
    $email= $_POST['email'];
    $message= $_POST['message'];
    $to = "bharath.t1718@gmail.com";
    $subject = $_POST['subject'];
    $txt ="Name : ". $name . "\r\n  Email : " . $email . "\r\n Message : " . $message;
    $headers = "From: noreply@abdvilliears17@gmail.com";

    if (mail($to, $subject, $txt, $headers)) {
    	header("location:thank.html");
    }else{
    	header("location:error.html");
    }





?>
