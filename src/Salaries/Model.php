<?php declare (strict_types = 1);

namespace Salaries;

class Model
{
    public $month, $payment_date, $bonus_date;

    public function setFields(array $values)
    {
        foreach ($values as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }
}
