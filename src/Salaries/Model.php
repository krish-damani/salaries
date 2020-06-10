<?php declare (strict_types = 1);

namespace Salaries;

use Salaries\Parse;

class Model
{
    use parse;

    public function setFields(array $values): self
    {
        foreach ($values as $key => $value) {
            $this->data[$key] = $value;
        }
        return $this;
    }
}
