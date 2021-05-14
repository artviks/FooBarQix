<?php


namespace App\Models\Elements;


interface ElementInterface
{
    public function name(): string;

    public function multiplier(): int;

    public function contains(): string;
}