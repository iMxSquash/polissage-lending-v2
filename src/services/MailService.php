<?php

namespace App\Services;

class MailService
{
    private $fromEmail;
    private $fromName;

    public function __construct()
    {
        $this->fromEmail = 'noreply@polissagelending.fr';
        $this->fromName = 'Polissage Lending';
    }

    public function sendContactEmail($name, $email, $message)
    {
        $to = 'contact@polissagelending.fr';
        $subject = 'Nouveau message de contact - ' . $name;

        $body = "Nouveau message de contact:\n\n";
        $body .= "Nom: {$name}\n";
        $body .= "Email: {$email}\n";
        $body .= "Message:\n{$message}\n";

        $headers = [
            'From' => "{$this->fromName} <{$this->fromEmail}>",
            'Reply-To' => $email,
            'X-Mailer' => 'PHP/' . phpversion(),
            'Content-Type' => 'text/plain; charset=utf-8'
        ];

        $headerString = '';
        foreach ($headers as $key => $value) {
            $headerString .= "{$key}: {$value}\r\n";
        }

        if (!mail($to, $subject, $body, $headerString)) {
            throw new \Exception('Failed to send email');
        }

        return true;
    }
}
