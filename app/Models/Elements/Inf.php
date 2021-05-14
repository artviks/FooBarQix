<?php


namespace App\Models\Elements;


class Inf extends Element implements ElementInterface
{
    private int $sumMultiplier;

    public function __construct(int $multiplier, string $contains, int $sumMultiplier)
    {
        parent::__construct($multiplier, $contains);
        $this->setName();
        $this->sumMultiplier = $sumMultiplier;
    }

    protected function setName(): void
    {
        $name = explode('\\', self::class);
        $this->name = end($name);
    }

    public function sumMultiplier(): int
    {
        return $this->sumMultiplier;
    }
}