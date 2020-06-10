<?php declare (strict_types = 1);

namespace Salaries\Service;

use DateInterval;
use DateTime;

class Service
{
    private $bonusDay = 14;
    private $dateFormat = 'd-m-Y';
    /**
     * process
     *
     * @param  DateTime $month
     * @return array
     */
    public function process(DateTime $month): array
    {
        $bonusDay = clone $month->add(new DateInterval("P{$this->bonusDay}D"));
        $paymentDate = DateTime::createFromFormat('Y-m-d', $month->format('Y-m-t'));
        if ($paymentDate->format('w') == 6) {
            $paymentDate = $paymentDate->sub(new DateInterval("P1D"));
        } elseif ($paymentDate->format('w') == 0) {
            $paymentDate = $paymentDate->sub(new DateInterval("P2D"));
        }
        if ($bonusDay->format('w') == 6) {
            $bonusDay = $bonusDay->add(new DateInterval("P4D"));
        } elseif ($bonusDay->format('w') == 0) {
            $bonusDay = $bonusDay->add(new DateInterval("P3D"));
        }

        return ['paymentDate' => $paymentDate->format($this->dateFormat), 'bonusDate' => $bonusDay->format($this->dateFormat)];
    }
    /**
     * setBonusDay
     *
     * @param  int $bonusDay
     * @return void
     */
    public function setBonusDay(int $bonusDay)
    {
        $this->bonusDay = $bonusDay;
    }
    /**
     * getBonusDay
     *
     * @return int
     */
    public function getBonusDay(): int
    {
        return $this->bonusDay;
    }
    /**
     * setDateFormat
     *
     * @param  string $dateFormat
     * @return void
     */
    public function setDateFormat(string $dateFormat)
    {
        $this->dateFormat = $dateFormat;
    }
    /**
     * getDateFormat
     *
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }
}
