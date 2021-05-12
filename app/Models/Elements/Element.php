<?php


namespace App\Models\Elements;


use App\Models\Input;

abstract class Element
{
    protected string $name;
    private int $multiplier;
    private string $contains;

    public function __construct(int $multiplier, string $contains)
    {
        $this->multiplier = $multiplier;
        $this->contains = $contains;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function multiplier(): int
    {
        return $this->multiplier;
    }

    public function contains(): string
    {
        return $this->contains;
    }
}