<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Salaries\Model\Salary;

class ModelTest extends TestCase
{
    public function testSetFieldMethod()
    {
        $model = new Salary();
        $data = ['month' => 'January-2020', 'paymentDate' => '15-01-2020', 'bonusDate' => '31-01-2020'];
        $model->setFields($data);
        $this->assertSame($model->toArray(), $data);
    }
}
