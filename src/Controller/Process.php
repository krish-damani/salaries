<?php declare (strict_types = 1);

namespace Salaries\Controller;

use Carbon\Carbon;
use Salaries\Model\Salary as Model;
use Salaries\Service\Parse;
use Salaries\Service\Service;

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
    private $weekEndDays = [
        Carbon::SATURDAY,
        Carbon::SUNDAY,
    ];
    private $bonusDay = 14;
    private $service;
    private $model;
    private $dateFormat = 'd-m-Y';

    public function __construct()
    {
        $this->service = new service();
        $this->model = new Model();
        Carbon::setWeekendDays($this->weekEndDays);
        Carbon::setToStringFormat($this->dateFormat);
    }

    /**
     * monthly
     *
     * @param  string $name
     * @param  int $year
     * @return Model
     */
    public function monthly(string $monthName, int $year): Model
    {
        $month = Carbon::createFromDate($year, array_flip($this->months)[$monthName], 1);
        $data = $this->service->process($month, $this->bonusDay);
        $model = clone $this->model;
        return $model->setFields(['month' => $monthName . '-' . $year] + $data);
    }

    /**
     * yearly
     *
     * @param  int $year
     * @return self
     */
    public function yearly(int $year): self
    {
        $this->data = [];
        foreach ($this->months as $month) {
            $this->data[] = $this->monthly($month, $year);
        }
        return $this;
    }
    /**
     * getWeekendDays
     *
     * @return array
     */
    public function getWeekendDays(): array
    {
        return $this->weekEndDays;
    }
    /**
     * setWeekendDays
     *
     * @param  array $weekEndDays
     * @return void
     */
    public function setWeekendDays(array $weekEndDays)
    {
        $this->weekEndDays = $weekEndDays;
    }
    /**
     * setMonths
     *
     * @param  array $months
     * @return void
     */
    public function setMonths(array $months)
    {
        $this->months = $months;
    }
    /**
     * getMonths
     *
     * @return array
     */
    public function getMonths(): array
    {
        return $this->months;
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
     * setService
     *
     * @param  Service $service
     * @return void
     */
    public function setService(Service $service)
    {
        $this->service = $service;
    }

    /**
     * setModel
     *
     * @param  Model $model
     * @return void
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
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
