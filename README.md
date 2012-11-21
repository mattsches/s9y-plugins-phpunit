# s9y-plugins-phpunit

Files to enable unit testing Serendipity plugins using [PHPUnit](https://github.com/sebastianbergmann/phpunit/).

## Requirements

This has been tested with

* PHP 5.3.6
* Serendipity 1.7-alpha1
* PHPUnit 3.6.12
* An active [PSO_SQLITE](http://www.php.net/manual/de/ref.pdo-sqlite.php) PDO driver for PHP

## Installation

Clone this repository into the `S9Y_ROOT/tests/plugins` directory

`git clone https://github.com/mattsches/s9y-plugins-phpunit tests/plugins`.

Copy `phpunit.xml.dist` to `phpunit.xml` (and edit if needed).

## Writing tests

Unit tests go into a `tests` directory under each plugin directory and should have the name of the plugin, e.g. `S9Y_ROOT/plugins/serendipity_event_foobar/tests/foobarTest.php`. There is an example file in the `example` directory of this repository.

## Running tests

You can run your unit tests from the Serendipty root directory:

`phpunit -c tests/plugins/phpunit.xml plugins/serendipity_event_foobar/tests/foobarTest.php`

or simply

`phpunit -c tests/plugins/phpunit.xml`

to run all plugin unit tests.

You can also set up your IDE to run phpunit tests, e.g. in PhpStorm use the following in Project Settings > PHP > PHPUnit > Test Runner:

* Use configuration file: `/path/to/tests/plugins/phpunit.xml`
* Use bootstrap file: `/path/to/tests/plugins/bootstrap.php`