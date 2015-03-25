<?php
require 'vendor/autoload.php';
require 'bootstrap.php';

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
exec('vendor/bin/doctrine orm:schema-tool:create');
$loader = new Loader();
$loader->addFixture(new UserGroupData());
$loader->addFixture(new UserData());
$loader->addFixture(new TestData());
$loader->addFixture(new ReportData());
$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());
