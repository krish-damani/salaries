<?php

declare (strict_types = 1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Salaries\Controller\SalaryController;
use Salaries\Model\Salary;
use Salaries\Service\DateCalculatorService;

class SalaryControllerTest extends TestCase
{

    protected $SalaryController;

    protected function setUp(): void
    {
        $this->SalaryController = new SalaryController(new DateCalculatorService(), new Salary());
    }
    public function testSalaryControllerMonthlyDate()
    {
        $result = $this->SalaryController->prepareMonthlyDate('February', 2020);

        $this->assertSame(
            [$result->month, $result->paymentDate, $result->bonusDate],
            ['February-2020', '28-02-2020', '19-02-2020']
        );
    }

    public function testSalaryControllerYearlyDates()
    {
        $result = $this->SalaryController->prepareYearlyDates(2020)->toArray();

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
        $this->SalaryController->setMonths($months);
        $result = $this->SalaryController->getMonths();

        $this->assertSame(
            $result,
            $months
        );
    }
}
