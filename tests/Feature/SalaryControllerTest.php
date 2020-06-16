<?php
/**
 * Test salary controller
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use Salaries\Controller\SalaryController;
use Salaries\Model\Salary;
use Salaries\Service\DateCalculatorService;
use Salaries\Service\ExportCSV as Output;

class SalaryControllerTest extends TestCase
{

    protected $SalaryController;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->SalaryController = new SalaryController(new DateCalculatorService(), new Salary(), new Output());
    }
    /**
     * test monthly paymentDate and bonusDate
     *
     * @return void
     */
    public function testSalaryControllerMonthlyDate()
    {
        $result = $this->SalaryController->prepareMonthlyDate('February', 2020);

        $this->assertSame(
            [$result->month, $result->paymentDate, $result->bonusDate],
            ['February-2020', '28-02-2020', '19-02-2020']
        );
    }

    /**
     * check month end date is weekend Day
     *
     * @return void
     */
    public function testCheckMonthEndDateIsWeekend()
    {
        $result = $this->SalaryController->prepareMonthlyDate('May', 2020);

        $this->assertSame(
            [$result->month, $result->paymentDate, $result->bonusDate],
            ['May-2020', '29-05-2020', '15-05-2020']
        );
    }
    /**
     * check monthly bonus date is weekendDay
     *
     * @return void
     */
    public function testCheckMonthBonusDateIsWeekend()
    {
        $result = $this->SalaryController->prepareMonthlyDate('August', 2020);

        $this->assertSame(
            [$result->month, $result->paymentDate, $result->bonusDate],
            ['August-2020', '31-08-2020', '19-08-2020']
        );
    }

    /**
     * Compare yearly data with all months data
     *
     * @return void
     */
    public function testSalaryControllerYearlyDates()
    {
        $result = (array) $this->SalaryController->prepareYearlyDates(2020)->getData();

        $this->assertSame(
            count($result),
            12
        );
    }
    /**
     * Set perticular month and get data for selected months
     *
     * @return void
     */
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
