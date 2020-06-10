<?php declare (strict_types = 1);

namespace Salaries\Controller;

use DateTime;
use Salaries\Model\Salary;
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
    private $service;
    private $model;

    public function __construct(Service $service, Salary $model)
    {
        $this->service = $service;
        $this->model = $model;
    }

    /**
     * Prepare Monthly Date
     *
     * @param  string $name
     * @param  int $year
     * @return Salary
     */
    public function prepareMonthlyDate(string $monthName, int $year): Salary
    {
        $month = DateTime::createFromFormat('Y-m-d', $year . '-' . array_flip($this->months)[$monthName] . '-1');
        $data = $this->service->process($month);
        $model = clone $this->model;
        return $model->setFields(['month' => $monthName . '-' . $year] + $data);
    }

    /**
     * Prepare Yearly Dates
     *
     * @param  int $year
     * @return self
     */
    public function prepareYearlyDates(int $year): self
    {
        $this->data = [];
        foreach ($this->months as $month) {
            $this->data[] = $this->prepareMonthlyDate($month, $year);
        }
        return $this;
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
}
