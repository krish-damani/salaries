<?php declare (strict_types = 1);

namespace Salaries;

class Model
{
    private $fields = ['month', 'payment_date', 'bonus_date'];

    public function __construct(array $values)
    {
        foreach ($values as $key => $value) {
            $this->$key = $value;
        }
    }
}
