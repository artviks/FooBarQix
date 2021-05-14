<?php


namespace App\Services;


use App\Models\Elements\ElementCollection;
use App\Models\Elements\ElementInterface;
use App\Models\Input;

class MultiplierService
{
    private ElementCollection $elements;
    private string $separator;
    private string $sumMultiplier = '';
    private ?ElementInterface $sumElement;

    public function __construct(ElementCollection $elements, string $separator, ElementInterface $sumElement = null)
    {
        $this->elements = $elements;
        $this->separator = $separator;
        $this->sumElement = $sumElement;
    }

    public function execute(Input $input): string
    {
        $result = '';
        foreach ($this->elements->collection() as $element)
        {
            $this->isSumMultiplier($input);
            $multiplier = $this->isMultiplier($element, $input);
            $result .= $multiplier ? $multiplier . $this->separator : '';
        }

        return rtrim($result, $this->separator) ?: $input->getString();
    }

    public function sumMultiplier(): string
    {
        return $this->sumMultiplier;
    }

    public function setSumMultiplier(): void
    {
        $this->sumMultiplier = '';
    }

    private function isSumMultiplier(Input $input): void
    {
        if (is_null($this->sumElement) || $this->digitSum($input) % $this->sumElement->sumMultiplier() !== 0) {
            return;
        }
        $this->sumMultiplier = $this->sumElement->name();
    }

    private function isMultiplier(ElementInterface $element, Input $input): string
    {
        if ($input->get() % $element->multiplier() !== 0)
        {
            return '';
        }

        return $element->name();
    }

    private function digitSum(Input $input): int
    {
        return array_sum(str_split($input->getString()));
    }
}