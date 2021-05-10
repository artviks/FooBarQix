<?php


namespace App\Models\Elements;


use App\Models\Input;

interface ElementInterface
{
    public function handle(Input $input): void;

    public function name(): ?string;
}