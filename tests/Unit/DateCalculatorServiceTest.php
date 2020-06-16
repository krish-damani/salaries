<?php

/**
 * Test Date Calculator Service
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Tests\Unit;

use DateTime as DateTime;
use PHPUnit\Framework\TestCase;
use Salaries\Service\DateCalculatorService;

class DateCalculatorServiceTest extends TestCase
{
    protected $service;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->service = new DateCalculatorService();
    }
    /**
     * test process date method and compare output
     *
     * @return void
     */
    public function testProcessDatesMethod()
    {
        $month = DateTime::createFromFormat('Y-m-d', '2020-01-01');
        $result = $this->service->processDates($month);

        $this->assertSame(
            [$result['paymentDate'], $result['bonusDate']],
            ['31-01-2020', '15-01-2020']
        );
    }
    /**
     * set custom bonus day like every month 17th or 20th
     *
     * @return void
     */
    public function testSetBonusDay()
    {
        $days = 17;
        $this->service->setBonusDay($days);
        $result = $this->service->getBonusDay();

        $this->assertSame(
            $result,
            $days
        );
    }
    /**
     * set custom weekendDays like 5 day a week or 4 day a week
     *
     * @return void
     */
    public function testSetWeekendDays()
    {
        $days = [6];
        $this->service->setWeekendDays($days);
        $result = $this->service->getWeekendDays();

        $this->assertSame(
            $result,
            $days
        );
    }
    /**
     * set custom date format like yyyy-mm-dd or yyyy-dd-mm
     *
     * @return void
     */
    public function testSetDateFormat()
    {
        $dateFormat = 'Y-m-d';
        $this->service->setDateFormat($dateFormat);
        $result = $this->service->getDateFormat();

        $this->assertSame(
            $result,
            $dateFormat
        );
    }
}
