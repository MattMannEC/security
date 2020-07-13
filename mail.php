<?php

include 'Emailer.php';

$email = $_POST['email'];
$firstname = $_POST['firstname'];

$to = "dortwag@gmail.com";
$headers = ['From' => $email, 
            'Reply-To' => $email, 
            'Content-type' => 'text/html; charset=iso-8859-1',
        ];

$subject = "this is the subject";

// the message
$msg = $firstname . "would like to know more about ADT Security, please get in contact with them. " . $email;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$emailer = new Emailer;


// send email
if($emailer->send($to, $subject, $msg, $headers)) {
    echo('true');
} else {
    echo('false');
};