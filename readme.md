
## Installation

Begin by installing this package through Composer.
Edit your project's `composer.json` file to require `dinesh/salaries`.

    "require": {
		"dinesh/salaries": "1.0"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes.

Now you can use like below
```php

    use Salaries\Process;
    use Salaries\Service;



    $process = new Process($service);

    //return process month with model
    $result = $process->yearly(2020)->toArray();

    //if you want to get monthly then like below
    $result = $process->monthly('February-2020')->toArray();

```
Manually seting options for months/bonusday/weekendday/dateformat

```php
    //if you want to process only selected months then like below
    $process->setMonths([
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May'
    ]);
    $months = $process->getMonths();

    //if you want to set Bonus Day of the Month
    $process->setBonusDay(14);
    $bonusdays = $process->getBonusDay();

    //if you want to set weekend days
    $process->setWeekendDays([Carbon::SUNDAY]);
    $weekenddays = $process->getWeekendDays();

    //set output date format default d-m-Y
    $process->setDateFormat('Y-m-d');
    $date_format = $process->getDateFormat();

```

Overwrite Model/service

```php
    //if you want to Overwrite model like below
     //you can overwrite service if you want to
    $service = new Service();
    $process = new Process();

    //service like below
    $process->setService($service);

    //model like below
    $process->setModel($model);

```

For PHPUnit check use below commands

    ./vendor/bin/phpunit
    ./vendor/bin/phpunit --testdox


Convert CSV/JSON/Array

```php
    //return process month with model
    $result = $process->yearly(2020)->toArray();
    //or
    $result = $process->yearly(2020)->toJson();
    //or
    $result = $process->yearly(2020)->saveCSV('/home/dns/code/open/salaries/yearly.csv');

```