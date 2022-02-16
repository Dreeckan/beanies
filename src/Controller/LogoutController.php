<?php

namespace Controller;

class LogoutController extends AbstractController
{
    public function render()
    {
        session_start();
        session_destroy();

        header("Location: ?logout=success");

        ob_end_flush();
    }

    public function getContent(): array
    {
        return [];
    }

    public function getFileName(): string
    {
        return 'logout';
    }

    public function getPageTitle(): string
    {
        return 'Déconnexion';
    }
}
