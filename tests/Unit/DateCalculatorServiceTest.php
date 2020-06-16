<?php

declare(strict_types=1);

namespace Tests\Unit;

use DateTime as DateTime;
use PHPUnit\Framework\TestCase;
use Salaries\Service\DateCalculatorService;

class DateCalculatorServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new DateCalculatorService();
    }
    public function testProcessDatesMethod()
    {
        $month = DateTime::createFromFormat('Y-m-d', '2020-01-01');
        $result = $this->service->processDates($month);

        $this->assertSame(
            [$result['paymentDate'], $result['bonusDate']],
            ['31-01-2020', '15-01-2020']
        );
    }
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
