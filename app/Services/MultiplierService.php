<?php


namespace App\Services;


use App\Models\Elements\ElementCollection;
use App\Models\Elements\ElementInterface;
use App\Models\Input;

class MultiplierService
{
    private ElementCollection $elements;
    private string $separator;

    public function __construct(ElementCollection $elements, string $separator)
    {
        $this->elements = $elements;
        $this->separator = $separator;
    }

    public function execute(Input $input): string
    {
        $result = '';
        foreach ($this->elements->collection() as $element)
        {
            $multiplier = $this->isMultiplier($element, $input);
            $result .= $multiplier ? $multiplier . $this->separator : '';
        }

        return rtrim($result, $this->separator) ?: $input->getString();
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