<?php declare (strict_types = 1);

namespace Salaries;

use SimpleXMLElement;

trait Parse
{
    public $data;

    public function toArray(): array
    {
        return $this->data;
    }

    public function toJson(): string
    {
        return json_encode($this->data);
    }
}
