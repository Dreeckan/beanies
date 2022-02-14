<?php

class Page
{
    protected string $fileName;

    protected string $title;


    public function __construct(string $fileName, string $title)
    {
        $this->fileName = $fileName;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }
}
