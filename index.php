<?php

require_once __DIR__ . '/vendor/autoload.php';

use Salaries\Controller\Process;
use Salaries\Model\Salary;
use Salaries\Service\Service;

$process = new Process(new Service(), new Salary());

echo $process->prepareYearlyDates(2020)->saveCSV(__DIR__ . '/yearly.csv');
