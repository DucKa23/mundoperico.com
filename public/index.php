<?php

//require_once __DIR__."/../vendor/autoload.php";
error_reporting(E_ALL);
ini_set("display_errors", 0);

require_once __DIR__.'/../src/bootstrap.php';

$reflector = new \ReflectionClass(APP);
$app = $reflector->newInstance();
if ($app instanceof ApplicationInterface)
	$app->run();
exit;
