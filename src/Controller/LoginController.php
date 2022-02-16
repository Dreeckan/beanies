<?php

namespace Controller;

class LoginController extends AbstractController
{
    public function getContent(): array
    {
        $defaultPassword = 'toto';
        $errors = [];
        $username = '';
        $password = '';

        if (isset($_POST['username'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($password)) {
                $errors[] = 'Mot de passe vide';
            } elseif ($password != $defaultPassword) {
                $errors[] = 'Mot de passe erroné';
            }

            if (empty($username)) {
                $errors[] = 'Username vide';
            }

            if (empty($errors)) {
                $_SESSION['username'] = $_POST['username'];

                header('Location: ?login=success');
            }
        }

        return [
            'errors'   => $errors,
            'username' => $username,
            'password' => $password,
        ];
    }

    public function getFileName(): string
    {
        return 'login';
    }

    public function getPageTitle(): string
    {
        return 'Connexion';
    }
}
