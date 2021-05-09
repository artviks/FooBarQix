<?php


namespace Test\Unit\Elements;


use App\Models\Elements\Bar;
use App\Models\Input;
use PHPUnit\Framework\TestCase;

class BarTest extends TestCase
{
    public function testName(): void
    {
        $input = new Input('5');
        $bar = new Bar();
        $bar->handle($input);

        self::assertEquals('Bar', $bar->name());
    }

    public function testNoName(): void
    {
        $input = new Input('2');
        $bar = new Bar($input);
        $bar->handle($input);

        self::assertEquals(null, $bar->name());
    }
}