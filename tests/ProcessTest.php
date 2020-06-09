<?php
use Carbon\carbon;
use PHPUnit\Framework\TestCase;
use Salaries\Process;

class ProcessTest extends TestCase
{
    public function test_process_monthly()
    {
        $process = new Process();
        $result = $process->monthly('February-2020');

        $this->assertSame(
            [$result->month, $result->payment_date->format('Y-m-d'), $result->bonus_date->format('Y-m-d')],
            ['February-2020', '2020-03-02', '2020-02-19']
        );
    }

    public function test_process_yearly()
    {
        $process = new Process();

        $result = $process->yearly('2020');

        $this->assertSame(
            count($result),
            12
        );
    }
    public function test_set_month()
    {
        $process = new Process();
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
        ];
        $process->setMonths($months);
        $result = $process->getMonths();

        $this->assertSame(
            $result,
            $months
        );
    }
    public function test_set_bonus_day()
    {
        $process = new Process();
        $days = 17;
        $process->setBonusDay($days);
        $result = $process->getBonusDay();

        $this->assertSame(
            $result,
            $days
        );
    }
    public function test_set_weekenddays()
    {
        $process = new Process();
        $weekenddays = [
            Carbon::SUNDAY,
        ];
        $process->setWeekendDays($weekenddays);
        $result = $process->getWeekendDays();

        $this->assertSame(
            $result,
            $weekenddays
        );
    }
}
