<?php

/**
 * Controller for salary
 *
 * @author Dinesh Rabara <d.rabara@easternenterprise.com>
 */
declare (strict_types = 1);

namespace Salaries\Controller;

use DateTime;
use Salaries\Contracts\DateCalculatorInterface;
use Salaries\Contracts\ExportOutputInterface;
use Salaries\Contracts\SalaryModelInterface;

class SalaryController
{
    private array $months = [
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
    private DateCalculatorInterface $service;
    private SalaryModelInterface $model;
    private ExportOutputInterface $output;

    /**
     * __construct
     *
     * @param  DateCalculatorInterface $service
     * @param  SalaryModelInterface $model
     * @param  ExportOutputInterface $output
     * @return void
     */
    public function __construct(DateCalculatorInterface $service, SalaryModelInterface $model, ExportOutputInterface $output)
    {
        $this->service = $service;
        $this->model = $model;
        $this->output = $output;
    }

    /**
     * Prepare Monthly Date
     *
     * @param  string $name
     * @param  int $year
     * @return SalaryModelInterface
     */
    public function prepareMonthlyDate(string $monthName, int $year): SalaryModelInterface
    {
        $month = DateTime::createFromFormat('Y-m-d', $year . '-' . array_flip($this->months)[$monthName] . '-1');
        $data = $this->service->processDates($month);
        $model = clone $this->model;
        return $model->setFields(['month' => $monthName . '-' . $year] + $data);
    }

    /**
     * Prepare Yearly Dates
     *
     * @param  int $year
     * @return ExportOutputInterface
     */
    public function prepareYearlyDates(int $year): ExportOutputInterface
    {
        $data = [];
        foreach ($this->months as $month) {
            $data[] = $this->prepareMonthlyDate($month, $year);
        }
        return $this->output->setData($data);
    }
    /**
     * setMonths
     * if you want then you can set bunch of months like only 3 months or 6 months
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
     * @param  DateCalculatorInterface $service
     * @return void
     */
    public function setService(DateCalculatorInterface $service): void
    {
        $this->service = $service;
    }

    /**
     * setModel
     *
     * @param  SalaryModelInterface $model
     * @return void
     */
    public function setModel(SalaryModelInterface $model): void
    {
        $this->model = $model;
    }
    /**
     * setOutput class here
     *
     * @param  ExportOutputInterface $output
     * @return void
     */
    public function setOutput(ExportOutputInterface $output): void
    {
        $this->output = $output;
    }
}
