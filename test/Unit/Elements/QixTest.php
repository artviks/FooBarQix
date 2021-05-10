<?php

namespace Test\Unit\Elements;


use App\Models\Elements\Qix;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class QixTest extends TestCase
{
    public function testName(): void
    {
        $input = new Input('7');
        $qix = new Qix();
        $qix->handle($input);

        self::assertEquals('Qix', $qix->name());
    }

    public function testNoName(): void
    {
        $input = new Input('2');
        $qix = new Qix();
        $qix->handle($input);

        self::assertEquals(null, $qix->name());
    }
}