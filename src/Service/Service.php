<?php declare (strict_types = 1);

namespace Salaries\Service;

use Carbon\Carbon;

class Service
{
    /**
     * process
     *
     * @param  Carbon $month
     * @param  int $bonusDay
     * @return array
     */
    public function process(Carbon $month, int $bonusDay): array
    {
        $bonusDay = $month->copy()->addDays($bonusDay);
        $paymentDate = $month->copy()->endOfMonth();

        if ($paymentDate->isWeekend()) {
            $paymentDate = $paymentDate->previous('Friday');
        }
        if ($bonusDay->isWeekend()) {
            $bonusDay = $bonusDay->next('Wednesday');
        }

        return ['paymentDate' => $paymentDate, 'bonusDate' => $bonusDay];
    }
}
