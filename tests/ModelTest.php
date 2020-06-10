<?php
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Salaries\Model;

class ModelTest extends TestCase
{
    public function test_set_field_method()
    {
        $model = new Model();
        $data = ['month' => 'January-2020', 'payment_date' => Carbon::now(), 'bonus_date' => Carbon::now()];
        $model->setFields($data);
        $this->assertSame($model->toArray(), $data);
    }
}
