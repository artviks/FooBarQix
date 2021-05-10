<?php


namespace App\Models\Elements;


use App\Models\Input;

class Bar implements ElementInterface
{
    private int $isMultipleOf = 5;
    private string $name = 'Bar';
    private bool $isBar = false;

    public function handle(Input $input): void
    {
        $this->isBar = $input->get() % $this->isMultipleOf === 0;
    }

    public function name(): ?string
    {
        return $this->isBar ? $this->name : null;
    }
}