<?php


namespace App\Models\Elements;


use App\Models\Input;

class Foo implements ElementInterface
{
    private int $isMultipleOf = 3;
    private string $name = 'Foo';
    private bool $isFoo = false;

    public function handle(Input $input): void
    {
        $this->isFoo = $input->get() % $this->isMultipleOf === 0;
    }

    public function name(): ?string
    {
        return $this->isFoo ? $this->name : null;
    }
}