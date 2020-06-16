<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Salaries\Controller\SalaryController;
use Salaries\Model\Salary;
use Salaries\Service\DateCalculatorService as Service;
use Salaries\Service\ExportCSV as Output;

$salaryController = new SalaryController(new Service(), new Salary(), new Output());

echo $salaryController->prepareYearlyDates(2020)->save(__DIR__ . '/yearly.csv');
