<?php

$email = $_POST['email'];
$firstname = $_POST['firstname'];

$destination = "dortwag@gmail.com";
$headers = ['From' => $email, 
            'Reply-To' => $email, 
            'Content-type' => 'text/html; charset=iso-8859-1',
        ];

// the message
$msg = $firstname . "would like to know more about ADT Security, please get in contact with them. " . $email;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail($destination, "My subject", $msg, $headers)){
    echo('true');
} else {
    echo('false');
};