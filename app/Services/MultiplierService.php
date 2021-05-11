<?php


namespace App\Services;


use App\Models\Elements\ElementCollection;
use App\Models\Elements\ElementInterface;
use App\Models\Input;

class MultiplierService
{
    private ElementCollection $elements;

    public function __construct(ElementCollection $elements)
    {
        $this->elements = $elements;
    }

    public function execute(Input $input): string
    {
        $result = '';
        foreach ($this->elements->collection() as $element)
        {
            $result .= $this->isMultiplier($element, $input);
        }

        return $result ?: $input->getString();
    }

    private function isMultiplier(ElementInterface $element, Input $input): string
    {
        if ($input->get() % $element->multiplier() !== 0)
        {
            return '';
        }

        return $element->name();
    }
}