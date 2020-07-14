<?php

include 'Emailer.php';

Class DefaultController
{
    public $message = 'Success!';

    public function processForm()
    {
            $email['emailAddress'] = $_POST['email'];
            $email['firstName'] = $_POST['firstName']; 

        return $email;
    }

    public function validateForm()
    {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if (($_POST['firstName']) && (ctype_alpha($_POST['firstName']))) {
                return true;
            } else {
                $this->message = 'Please enter a valid first name';
            }
        } else {
            $this->message = 'Please enter a valid email';
        }
    }
}



