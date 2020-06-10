<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Salaries\Model;
use Salaries\Process;
use Salaries\Service;

//you can overwrite service if you want to
$service = new Service();
$model = new Model();

$process = new Process();
// $process->setService($service);
// $process->setModel($model);
// print_r($process->setMonths([
//     1 => 'January',
//     2 => 'February',
//     3 => 'March',
//     4 => 'April',
//     5 => 'May'
// ]));
// print_r($process->getMonths());
// $process->setBonusDay(14);
// print_r($process->getBonusDay());
// $process->setWeekendDays([Carbon::SUNDAY]);
// print_r($process->getWeekendDays());

print_r($process->monthly('February-2020')->toJson());
// print_r($process->yearly(2020)[0]->payment_date);
// print_r($process->yearly(2020)->toArray());
exit;
