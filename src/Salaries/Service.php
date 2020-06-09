<?php declare (strict_types = 1);

namespace Salaries;

class Service
{

    public function process($month, $bonus_day)
    {
        $bonus_date = $month->copy()->addDays($bonus_day);
        $payment_date = $month->copy()->endOfMonth();

        if ($payment_date->isWeekend()) {
            $payment_date = $payment_date->next('Monday');
        }
        if ($bonus_date->isWeekend()) {
            $bonus_date = $bonus_date->next('Wednesday');
        }

        return ['payment_date' => $payment_date, 'bonus_date' => $bonus_date];
    }
}
