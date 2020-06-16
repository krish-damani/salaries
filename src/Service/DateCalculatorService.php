<?php

/**
 * Service to process salary and bonus date
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Salaries\Service;

use DateInterval;
use DateTime;
use Salaries\Contracts\DateCalculatorInterface;

class DateCalculatorService implements DateCalculatorInterface
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
     * weekendDays
     *
     * @var array
     */
    private $weekendDays = [6, 0];
    /**
     * process Dates
     *
     * @param  DateTime $month
     * @return array
     */
    public function processDates(DateTime $month): array
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
    public function setBonusDay(int $bonusDay): void
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
    public function setDateFormat(string $dateFormat): void
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
        return in_array($date->format('w'), $this->weekendDays);
    }
    /**
     * setWeekendDays
     *
     * @param  array $weekendDays
     * @return void
     */
    public function setWeekendDays(array $weekendDays): void
    {
        $this->weekendDays = $weekendDays;
    }
    /**
     * getWeekendDays
     *
     * @return array
     */
    public function getWeekendDays(): array
    {
        return $this->weekendDays;
    }
}
