<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Salaries\Controller\SalaryController;
use Salaries\Model\Salary;
use Salaries\Service\DateCalculatorService as Service;

$salaryController = new SalaryController(new Service(), new Salary());

echo $salaryController->prepareYearlyDates(2020)->saveCSV(__DIR__ . '/yearly.csv');
