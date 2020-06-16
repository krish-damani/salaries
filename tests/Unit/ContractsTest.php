<?php
/**
 * Test cases for Contracts
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Tests\Unit;

use DateTime;
use PHPUnit\Framework\TestCase;
use Salaries\Contracts\DateCalculatorInterface;
use Salaries\Contracts\ExportOutputInterface;
use Salaries\Contracts\SalaryModelInterface;

class ContractsTest extends TestCase
{
    /**
     * testDateCalculatorInterface
     *
     * @return void
     */
    public function testDateCalculatorInterface()
    {
        // Create a stub for the DateCalculatorInterface class.
        $stub = $this->createStub(DateCalculatorInterface::class);

        // Configure the stub.
        $stub->method('processDates')
            ->willReturn([]);

        $this->assertSame([], $stub->processDates(DateTime::createFromFormat('Y-m-d', '2020-02-1')));
    }
    /**
     * testExportOutputInterface
     *
     * @return void
     */
    public function testExportOutputInterface()
    {
        // Create a stub for the ExportOutputInterface class.
        $stub = $this->createStub(ExportOutputInterface::class);

        $stub->method('setData')
            ->will($this->returnSelf());

        $stub->method('getData')
            ->willReturn([]);

        $stub->method('save')
            ->willReturn('string');

        $this->assertSame($stub, $stub->setData(['month' => 'Feb-2020']));
        $this->assertSame([], $stub->getData());
        $this->assertSame('string', $stub->save('string'));
    }
    /**
     * testSalaryModelInterface
     *
     * @return void
     */
    public function testSalaryModelInterface()
    {
        // Create a stub for the SalaryModelInterface class.
        $stub = $this->createStub(SalaryModelInterface::class);

        $stub->method('setFields')
            ->will($this->returnSelf());

        $this->assertSame($stub, $stub->setFields(['month' => 'Feb-2020']));
    }
}
