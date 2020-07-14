<?php

include 'Emailer.php';

Class FormController
{
    public $errors;

    public function processForm()
    {
        $email['emailAddress'] = $_POST['email'];
        $email['firstName'] = $_POST['firstName']; 
        $email['lastName'] = $_POST['lastName'];

        return $email;
    }

    public function validateForm()
    {
        if ((!$_POST['email']) || 
            (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $this->errors['email'] = 'Please enter a valid email';
        }
        if ((!$_POST['firstName']) || (!ctype_alpha($_POST['firstName']))) {
            $this->errors['firstName'] = 'Please enter a valid first name';
        }
        if ((!$_POST['lastName']) || (!ctype_alpha($_POST['lastName']))) {
            $this->errors['lastName'] = 'Please enter a valid last name';
        }
    }
}


