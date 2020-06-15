<?php

declare(strict_types=1);

namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use Salaries\Controller\Process;
use Salaries\Model\Salary;
use Salaries\Service\Service;

class ProcessTest extends TestCase
{

    protected $process;

    protected function setUp(): void
    {
        $this->process = new Process(new Service(), new Salary());
    }
    public function testProcessMonthlyDate()
    {
        $result = $this->process->prepareMonthlyDate('February', 2020)->toArray();

        $this->assertSame(
            [$result['month'], $result['paymentDate'], $result['bonusDate']],
            ['February-2020', '28-02-2020', '19-02-2020']
        );
    }

    public function testProcessYearlyDates()
    {
        $result = $this->process->prepareYearlyDates(2020)->toArray();

        $this->assertSame(
            count($result),
            12
        );
    }
    public function testSetMonth()
    {
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
        ];
        $this->process->setMonths($months);
        $result = $this->process->getMonths();

        $this->assertSame(
            $result,
            $months
        );
    }
}
