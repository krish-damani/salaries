
## Installation

Begin by installing this package through Composer.
Edit your project's `composer.json` file to require `dinesh/salaries`.

    "require": {
		"dinesh/salaries": "1.0"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes.

For Console Run

    php public/index.php

Now you can use like below
```php

    use Salaries\Controller\SalaryController;
    use Salaries\Model\Salary;
    use Salaries\Service\DateCalculatorService as Service;
    use Salaries\Service\ExportCSV as Output;

    $salaryController = new SalaryController(new Service(), new Salary(), new Output());

    //return salaryController month with model
    $result = $salaryController->prepareYearlyDates(2020)->getData();

    //if you want to get monthly then like below
    $result = $salaryController->prepareMonthlyDate('February',2020);

```
Manually seting options for months/bonusday/weekendday/dateformat

```php
    //if you want to salaryController only selected months then like below
    $salaryController->setMonths([
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May'
    ]);
    $months = $salaryController->getMonths();

    //if you want to set Bonus Day of the Month
    $service->setBonusDay(14);
    $bonusdays = $service->getBonusDay();

    //if you want to set weekend days of the Month like 5 days a week or 4 days a week
    $service->setWeekendDays([6]);
    $weekendDays = $service->getWeekendDays();

    //set output date format default d-m-Y
    $service->setDateFormat('Y-m-d');
    $date_format = $service->getDateFormat();

```

Overwrite Model/service/output

```php
    //if you want to Overwrite model like below
     //you can overwrite service if you want to
    $service = new DateCalculatorService();
    $salaryController = new SalaryController();

    //service like below
    $salaryController->setService($service);

    //model like below
    $salaryController->setModel($model);

    //output class may be for csv/pdf/excel/text any
    $salaryController->setOutput($output);

```

For PHPUnit check use below commands

    ./vendor/bin/phpunit
    ./vendor/bin/phpunit --testdox


Convert CSV/Array

```php
    //return salaryController month with model
    $result = $salaryController->prepareYearlyDates(2020)->getData();
    //or
    $result = $salaryController->prepareYearlyDates(2020)->save('/home/dns/code/open/salaries/yearly.csv');

```

 SaveCSV file output look like below

|Month|Payment Date|Bonus Date|
|-----|-----|-----|
|January-2020|31-01-2020|15-01-2020|
|February-2020|28-02-2020|19-02-2020|
|March-2020|31-03-2020|18-03-2020|
|April-2020|30-04-2020|15-04-2020|
|May-2020|29-05-2020|15-05-2020|
|June-2020|30-06-2020|15-06-2020|
|July-2020|31-07-2020|15-07-2020|
|August-2020|31-08-2020|19-08-2020|
|September-2020|30-09-2020|15-09-2020|
|October-2020|30-10-2020|15-10-2020|
|November-2020|30-11-2020|18-11-2020|
|December-2020|31-12-2020|15-12-2020|
