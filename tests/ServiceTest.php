<?php
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Salaries\Service;

class ServiceTest extends TestCase
{
    public function test_process_method()
    {
        $service = new Service();
        $month = Carbon::createFromDate(2020, 1, 1);
        $result = $service->process($month, 15);

        $this->assertSame(
            [$result['payment_date']->format('Y-m-d'), $result['bonus_date']->format('Y-m-d')],
            ['2020-01-31', '2020-01-16']
        );
    }
}
