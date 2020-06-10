<?php
use PHPUnit\Framework\TestCase;
use Salaries\Service\Parse;

class ParseTest extends TestCase
{
    protected $mock;

    protected function setUp(): void
    {
        $this->mock = $this->getMockForTrait(Parse::class);
    }
    public function testToArrayMethod()
    {
        $this->assertSame($this->mock->toArray(), []);
    }
}
