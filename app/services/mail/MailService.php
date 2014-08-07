<?php


class MailService {

    protected function sendMail($template, $parameters, $senderMail, $senderName, $receiverMail, $subject)
    {
        Mail::send($template, $parameters, function($message) use ($senderMail, $senderName, $receiverMail, $subject)
        {
            $message
                ->from($senderMail, $senderName)
                ->to($receiverMail)
                ->subject($subject);
        });
    }

}
