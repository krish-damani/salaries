<?php

require_once __DIR__ . '/vendor/autoload.php';

use Salaries\Controller\Process;

$process = new Process();

echo $process->yearly(2020)->saveCSV(__DIR__ . '/yearly.csv');
