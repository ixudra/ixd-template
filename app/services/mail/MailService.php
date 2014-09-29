<?php


class MailService {

    public function mailBugReport($parameters)
    {
        $this->sendMail('bootstrap.emails.reportBug', $parameters, 'info@yourAppName.be', 'yourAppName.be admin', 'jan.oris@gmail.com', 'A new bug report was filed for yourAppName.be');
    }

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
