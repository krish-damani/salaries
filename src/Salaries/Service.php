<?php declare (strict_types = 1);

namespace Salaries;

use Carbon\Carbon;

class Service
{
    /**
     * process
     *
     * @param  Carbon $month
     * @param  int $bonus_day
     * @return array
     */
    public function process(Carbon $month, int $bonus_day): array
    {
        $bonus_date = $month->copy()->addDays($bonus_day);
        $payment_date = $month->copy()->endOfMonth();

        if ($payment_date->isWeekend()) {
            $payment_date = $payment_date->previous('Friday');
        }
        if ($bonus_date->isWeekend()) {
            $bonus_date = $bonus_date->next('Wednesday');
        }

        return ['payment_date' => $payment_date, 'pre_month_bonus_date' => $bonus_date];
    }
}
