<?php

Class Emailer
{
    public function composeEmail($to, $subject, $emailAddress, $firstName)
    {
        $message = $firstName . " would like to know more about ADT Security, 
                                please get in contact with them. " . $emailAddress;
                                
        // use wordwrap() if lines are longer than 70 characters
        $message = wordwrap($message,70);

        $headers = [
            'From' => $emailAddress, 
            'Reply-To' => $emailAddress, 
            'Content-type' => 'text/html; charset=iso-8859-1',
        ];

        $email = [
            'to' => $to,
            'subject' => $subject,
            'message' => $message,
            'headers' => $headers,
        ];

        return $email;
    }

    public function send($email)
    {
        return mail(
            $email['to'], 
            $email['subject'], 
            $email['message'], 
            $email['headers']
        );
    }
}