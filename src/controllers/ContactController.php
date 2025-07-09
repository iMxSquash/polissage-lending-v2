<?php

namespace App\Controllers;

use App\Utils\Validator;
use App\Services\MailService;

class ContactController
{
    private $mailService;

    public function __construct()
    {
        $this->mailService = new MailService();
    }

    public function handleContact()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
            return;
        }

        $name = Validator::sanitizeString($_POST['name'] ?? '');
        $email = Validator::sanitizeEmail($_POST['email'] ?? '');
        $message = Validator::sanitizeString($_POST['message'] ?? '');

        $errors = [];

        if (!Validator::validateRequired($name)) {
            $errors[] = 'Le nom est requis';
        }

        if (!Validator::validateEmail($email)) {
            $errors[] = 'Email invalide';
        }

        if (!Validator::validateRequired($message)) {
            $errors[] = 'Le message est requis';
        }

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['errors' => $errors]);
            return;
        }

        try {
            $this->mailService->sendContactEmail($name, $email, $message);
            echo json_encode(['success' => 'Message envoyé avec succès']);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de l\'envoi du message']);
        }
    }
}
