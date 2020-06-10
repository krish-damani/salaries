<?php declare (strict_types = 1);

namespace Salaries;

use Carbon\Carbon;
use Exception;
use Salaries\Model;
use Salaries\Parse;
use Salaries\Service;

class Process
{
    use parse;
    private $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];
    private $weekdays = [
        Carbon::SATURDAY,
        Carbon::SUNDAY,
    ];
    private $bonus_day = 14;
    private $service;
    private $model;
    private $date_format = 'd-m-Y';

    public function __construct()
    {
        $this->service = new service();
        $this->model = new Model();
        Carbon::setWeekendDays($this->weekdays);
        Carbon::setToStringFormat($this->date_format);
    }

    public function monthly(string $name): Model
    {
        preg_match('#(?<month>[A-Za-z]+)-(?<year>[0-9]{4})#', $name, $result);

        if (empty($result['month']) || !in_array($result['month'], $this->months)) {
            throw new Exception("Month name not found :" . $name, 1);
        }
        $month = Carbon::createFromDate($result['year'], array_flip($this->months)[$result['month']], 1);
        $data = $this->service->process($month, $this->bonus_day);
        $model = clone $this->model;
        return $model->setFields(['month' => $result['month'] . '-' . $result['year']] + $data);
    }

    public function yearly(int $year): self
    {
        $this->data = [];
        foreach ($this->months as $month) {
            $this->data[] = $this->monthly($month . '-' . $year);
        }
        return $this;
    }
    /**
     * get Weekend Days
     * return array
     */
    public function getWeekendDays(): array
    {
        return $this->weekdays;
    }
    public function setWeekendDays(array $weekdays)
    {
        $this->weekdays = $weekdays;
    }
    public function setMonths(array $months)
    {
        $this->months = $months;
    }
    public function getMonths(): array
    {
        return $this->months;
    }
    public function setBonusDay(int $bonus_day)
    {
        $this->bonus_day = $bonus_day;
    }
    public function getBonusDay(): int
    {
        return $this->bonus_day;
    }

    public function setService(Service $service)
    {
        $this->service = $service;
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }
    public function setDateFormat(string $date_format)
    {
        $this->date_format = $date_format;
    }
    public function getDateFormat(): string
    {
        return $this->date_format;
    }
}
