<?php

namespace App\Services;

use Exception;

class EmailService
{
    public static function sendResetPasswordEmail($to,$view){
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("karimbassemtohamy@gmail.com", "Example User");
        $email->setSubject("Reset your password");
        $email->addTo($to->email,$to->name );
        $email->addContent("text/plain", $view);

        $sendgrid = new \SendGrid(env('send_grid_api_key'));

        try {
            $response = $sendgrid->send($email);
            echo $response->statusCode() . "\n";
            echo implode("\n", $response->headers()) . "\n";
            echo $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}
