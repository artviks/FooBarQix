<?php


namespace App\Models\Elements;


use App\Models\Input;

class Qix implements ElementInterface
{
    private int $isMultipleOf = 7;
    private string $name = 'Qix';
    private bool $isQix = false;

    public function handle(Input $input): void
    {
        $this->isQix = $input->get() % $this->isMultipleOf === 0;
    }

    public function name(): ?string
    {
        return $this->isQix ? $this->name : null;
    }
}