<?php

namespace App\Event;

class GetTitleEvent
{
    public function __construct(private string $title)
    {
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
