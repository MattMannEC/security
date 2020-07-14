<?php

include 'Emailer.php';

// public function processForm
    // validate form
    // return array

$emailAddress = $_POST['email'];
$firstName = $_POST['firstName'];

// public function composeEmail

$to = "dortwag@gmail.com";


$subject = "this is the subject";

$emailer = new Emailer;
$email = $emailer->composeEmail($to, $subject, $emailAddress, $firstName);

// send email
if($emailer->send($email)) {
    echo('true');
} else {
    echo('false');
};