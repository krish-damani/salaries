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
    public function test_to_array_method()
    {
        $this->assertSame($this->mock->toArray(), []);
    }
    public function test_to_json_method()
    {
        $this->assertSame($this->mock->toArray(), []);
    }
}
