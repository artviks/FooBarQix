<?php


namespace App\Models;


use App\Models\Elements\ElementCollection;

class App
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
            $element->handle($input);
            $result .= $element->name() ?? '';
        }

        return $result ?: $input->getString();
    }
}