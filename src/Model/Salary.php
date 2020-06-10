<?php declare (strict_types = 1);

namespace Salaries\Model;

use Salaries\Service\Parse;

class Salary
{
    use parse;

    /**
     * setFields
     *
     * @param  array $values
     * @return self
     */
    public function setFields(array $values): self
    {
        foreach ($values as $key => $value) {
            $this->data[$key] = $value;
        }
        return $this;
    }
}
