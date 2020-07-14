<?php
include 'Emailer.php';

// Class DefaultController
// {
//     public function processForm()
//     {
//         if ($this->validateForm()) {

//         }
//         return $email;

//     }

//     public function validateForm()
//     {
//         return true;
//     }

// }


$email['emailAddress'] = $_POST['email'];
$email['firstName'] = $_POST['firstName'];

// public function composeEmail



$emailer = new Emailer;
$email = $emailer->compose($email);

// send email
if($emailer->send($email)) {
    echo('true');
} else {
    echo('false');
};