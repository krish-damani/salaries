<?php

/**
 * Contract for Dates Calculation
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

declare (strict_types = 1);

namespace Salaries\Contracts;

use DateTime;

interface DateCalculatorInterface
{
    /**
     * Get Salary Data
     *
     * @return array
     */
    public function processDates(DateTime $month): array;
}
