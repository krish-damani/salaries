<?php
/**
 * Model for salary
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Salaries\Model;

use Salaries\Contracts\SalaryModelInterface;

class Salary implements SalaryModelInterface
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
