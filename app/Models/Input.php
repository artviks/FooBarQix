<?php


namespace App\Models;


class Input
{
    private string $userInput;

    public function __construct(string $userInput)
    {
        $this->userInput = $userInput;
    }

    public function get(): int
    {
        return (int)$this->userInput;
    }

    public function getString(): string
    {
        return $this->userInput;
    }
}