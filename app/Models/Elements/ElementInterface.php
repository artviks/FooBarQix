<?php


namespace App\Models\Elements;


use App\Models\Input;

interface ElementInterface
{
    public function name(): ?string;

    public function handle(Input $input): void;
}