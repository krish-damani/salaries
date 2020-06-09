
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

    //you can overwrite service if you want to
    $service = new Service();

    $process = new Process($service);

    //return process month with model
    $result = $process->yearly(2020)

    //if you want to get monthly then like below
    $result = $process->monthly('February-2020')

```
Manually seting options

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

```

Convert CSV/JSON/XML
