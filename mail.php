<?php
$email = "dortwag@gmail.com";
$headers = ['From' => $email, 
            'Reply-To' => $email, 
            'Content-type' => 'text/html; charset=iso-8859-1',
        ];

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail($email, "My subject", $msg, $headers)){
    echo('true');
} else {
    echo('false');
};