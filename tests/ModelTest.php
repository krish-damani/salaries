<?php
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Salaries\Model\Salary;

class ModelTest extends TestCase
{
    public function test_set_field_method()
    {
        $model = new Salary();
        $data = ['month' => 'January-2020', 'paymentDate' => Carbon::now(), 'bonusDate' => Carbon::now()];
        $model->setFields($data);
        $this->assertSame($model->toArray(), $data);
    }
}
