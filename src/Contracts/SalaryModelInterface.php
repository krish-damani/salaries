<?php

/**
 * Contract for salary model
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace Salaries\Contracts;

interface SalaryModelInterface
{
    /**
     * Set fields
     *
     * @return array
     */
    public function setFields(array $values): self;
}
