<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Gaufrette\Adapter\Local;
use Gaufrette\Filesystem;
use Puzzle\Configuration\Yaml;
use Yams\Application;

$configurationFilesStorage = new Filesystem(new Local(__DIR__ . '/../config'));
$configuration = new Yaml($configurationFilesStorage);

$rootDir = realpath(__DIR__ . '/..');

$app = new Application($configuration, $rootDir);

$app->run();
