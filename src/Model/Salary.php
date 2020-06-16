<?php declare (strict_types = 1);

namespace Salaries\Model;

class Salary
{
    public $month;
    public $paymentDate;
    public $bonusDate;
    /**
     * setFields
     *
     * @param  array $values
     * @return self
     */
    public function setFields(array $values): self
    {
        foreach ($values as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }
}
