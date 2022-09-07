<h1 align="center">Sack</h1>

[![Latest Stable Version](https://poser.pugx.org/samdark/sack/v/stable.png)](https://packagist.org/packages/samdark/sack)
[![Total Downloads](https://poser.pugx.org/samdark/sack/downloads.png)](https://packagist.org/packages/samdark/sack)
[![Build status](https://github.com/samdark/sack/workflows/build/badge.svg)](https://github.com/samdark/sack/actions?query=workflow%3Abuild)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/samdark/sack/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/samdark/sack/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/samdark/sack/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/samdark/sack/?branch=master)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyiisoft%2Frbac%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/samdark/sack/master)
[![static analysis](https://github.com/samdark/sack/workflows/static%20analysis/badge.svg)](https://github.com/samdark/sack/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/samdark/sack/coverage.svg)](https://shepherd.dev/github/samdark/sack)

This package implements "0-1 Knapsack Problem" algorithm i.e. allows to find the best way to fill
a knapsack of a specified volume with items of a certain volume and value.

It could be applied to:

- Filling a box with most valued items.
- Selecting best tasks for a week knowing each task value and effort in days.
- Selecting attractions to visit in a limited time knowing how much one wants to visit an attraction and time 
  required for a visit.
- etc. 


## Installation

The package could be installed with composer:

```shell
composer require samdark/sack --prefer-dist
```

## General usage

```php
declare(strict_types=1);

use Samdark\Sack\Item;
use Samdark\Sack\SackFiller;

require __DIR__ . '/vendor/autoload.php';

// Items to select from
$items = [
    new Item('Guitar', 1, 1500),
    new Item('Player', 4, 3000),
    new Item('Laptop', 3, 2000),
];

$sackVolume = 7;
$filler = new SackFiller($sackVolume);
$result = $filler->fill($items);

echo "Possible items:\n\n";
echo "Name\tVolume\tValue\n";
foreach ($items as $item) {
    echo "{$item->getName()}\t{$item->getVolume()}\t{$item->getValue()}\n";
}

echo "\n\nMaximum value for sack of $sackVolume is {$result->getValue()}:\n\n";
echo "Name\tVolume\tValue\n";
foreach ($result->getItems() as $item) {
    echo "{$item->getName()}\t{$item->getVolume()}\t{$item->getValue()}\n";
}
```


## Testing

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework with
[Infection Static Analysis Plugin](https://github.com/Roave/infection-static-analysis-plugin). To run it:

```shell
./vendor/bin/roave-infection-static-analysis-plugin
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```
