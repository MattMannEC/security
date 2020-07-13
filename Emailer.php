<?php

Class Emailer
{
    public function send($to, $subject, $message, $headers)
    {
        return mail($to, $subject, $message, $headers);
    }
}