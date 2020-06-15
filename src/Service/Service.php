<?php declare (strict_types = 1);

namespace Salaries\Service;

use DateInterval;
use DateTime;

/**
 * Service to get Salary Dates
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */

class Service
{
    /**
     * bonusDay
     *
     * @var int
     */
    private $bonusDay = 14;
    /**
     * dateFormat
     *
     * @var string
     */
    private $dateFormat = 'd-m-Y';
    /**
     * weekenddays
     *
     * @var array
     */
    private $weekenddays = [6, 0];
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

        if ($this->isWeekend($paymentDate)) {
            $paymentDate = $paymentDate->modify('last Friday of this month');
        }
        if ($this->isWeekend($bonusDay)) {
            $bonusDay = $bonusDay->modify('next Wednesday');
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
    /**
     * Checks if it is a Weekend
     *
     * @param DateTime $date
     *
     * @return bool
     */
    private function isWeekend(DateTime $date): bool
    {
        return in_array($date->format('w'), $this->weekenddays);
    }
}
