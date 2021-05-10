<?php


namespace App\Models\Elements;


class ElementCollection
{
    private array $collection = [];

    public function add(ElementInterface $element): void
    {
        $this->collection[] = $element;
    }

    public function addMany(array $elements): void
    {
        foreach ($elements as $element)
        {
            $this->add($element);
        }
    }

    public function collection(): array
    {
        return $this->collection;
    }
}