<?php


namespace App\Services;


use App\Models\Elements\ElementCollection;
use App\Models\Elements\ElementInterface;
use App\Models\Input;

class OccurrenceService
{
    private ElementCollection $elements;

    public function __construct(ElementCollection $elements)
    {
        $this->elements = $elements;
    }

    public function execute(Input $input): string
    {
        $occurrences = '';
        $num = $input->getString();
        $l = strlen($num);
        for ($i = 0; $i < $l; $i++)
        {
            foreach ($this->elements->collection() as $element)
            {
                $occurrences .= $this->contains($element, $num[$i]);
            }
        }

        return $occurrences;
    }

    private function contains(ElementInterface $element, string $digit): string
    {
        if ($element->contains() !== $digit)
        {
            return '';
        }

        return $element->name();
    }
}