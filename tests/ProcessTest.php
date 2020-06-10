<?php
use Carbon\carbon;
use PHPUnit\Framework\TestCase;
use Salaries\Controller\Process;

class ProcessTest extends TestCase
{

    protected $process;

    protected function setUp(): void
    {
        $this->process = new Process();
    }
    public function test_process_monthly()
    {
        $result = $this->process->monthly('February',2020)->toArray();

        $this->assertSame(
            [$result['month'], $result['paymentDate']->format('Y-m-d'), $result['bonusDate']->format('Y-m-d')],
            ['February-2020', '2020-02-28', '2020-02-19']
        );
    }

    public function test_process_yearly()
    {
        $result = $this->process->yearly('2020')->toArray();

        $this->assertSame(
            count($result),
            12
        );
    }
    public function test_set_month()
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
    public function test_set_bonus_day()
    {
        $days = 17;
        $this->process->setBonusDay($days);
        $result = $this->process->getBonusDay();

        $this->assertSame(
            $result,
            $days
        );
    }
    public function test_set_weekenddays()
    {
        $weekEndDays = [
            Carbon::SUNDAY,
        ];
        $this->process->setWeekendDays($weekEndDays);
        $result = $this->process->getWeekendDays();

        $this->assertSame(
            $result,
            $weekEndDays
        );
    }
    public function test_set_date_format()
    {
        $dateFormat = 'Y-m-d';
        $this->process->setDateFormat($dateFormat);
        $result = $this->process->getDateFormat();

        $this->assertSame(
            $result,
            $dateFormat
        );
    }
}
