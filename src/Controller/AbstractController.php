<?php

namespace Controller;

use Model\Page;

abstract class AbstractController
{
    protected Page $currentPage;


    public function __construct(Page $page)
    {
        $this->setCurrentPage($page);
    }


    public function setCurrentPage(Page $currentPage): self
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    public function getCurrentPage(): Page
    {
        return $this->currentPage;
    }

    public function render()
    {
        ob_start();

        include_once 'includes/header.php';

        include_once realpath(__DIR__ . '/../View/' . $this->currentPage->getFileName() . '.php');

        include_once 'includes/footer.php';

        ob_end_flush();
    }
}
