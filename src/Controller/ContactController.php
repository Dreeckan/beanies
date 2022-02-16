<?php

namespace Controller;

use Model\Contact;

class ContactController extends AbstractController
{
    public function getContent(): array
    {
        $contact = new Contact($_POST);

        if ($contact->isSubmitted() && $contact->isValid()) {
            $statement = $this->db->prepare('INSERT INTO contact (subject, email, content) VALUES (:subject, :email, :content)');
            $statement->execute([
                ':subject' => $contact->getSubject(),
                ':email'   => $contact->getEmail(),
                ':content' => $contact->getContent(),
            ]);
        }

        return [
            'contact' => $contact,
        ];
    }

    public function getFileName(): string
    {
        return 'contact';
    }

    public function getPageTitle(): string
    {
        return 'Nous contacter';
    }
}
