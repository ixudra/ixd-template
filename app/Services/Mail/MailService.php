<?php namespace App\Services\Mail;


use Config;
use Mail;

class MailService {

    public function send($template, $recipientEmail, $recipientName, $subject = '', $data = array())
    {
        if( Config::get('mail.send', false) ) {
            if( Config::get('mail.recipient', '') != '' ) {
                $recipientEmail = Config::get('mail.recipient');
            }

            Mail::send($template, $data, function ($message) use ($recipientEmail, $recipientName, $subject) {
                $message->to($recipientEmail, $recipientName)->subject( $subject  );
                $message->from('noreply@yourAppName.com', 'Do Not Reply');
            });
        }
    }

}
