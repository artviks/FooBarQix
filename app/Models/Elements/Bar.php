<?php


namespace App\Models\Elements;


class Bar extends Element implements ElementInterface
{
    public function __construct(int $multiplier, string $contains)
    {
        parent::__construct($multiplier, $contains);
        $this->setName();
    }

    protected function setName(): void
    {
        $name = explode('\\', self::class);
        $this->name = end($name);
    }
}