<?php

$STARTTIME = microtime(true);

require_once("../vendor/autoload.php");

use
	Application\Objects\myDatabase, Application\Objects\myRoutes;
use
	eMVC\Base;

function autoload($className) {
	$className = ltrim($className, '\\');
	$fileName = '';
	$namespace = '';
	if ($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}
	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

	require_once '../' . $fileName;
}

spl_autoload_register('autoload');

$cwd = getcwd();

$appPath = $cwd . "/../Application/";

$container = new \Application\Base\Container();

require_once($appPath . '/Config/Settings.php');

$container->__set('settings', $settings);
$container->__set('database', new myDatabase($container));

$eMVC = new Base($appPath, $container);

$myRoutes = new myRoutes($appPath);

$eMVC->setAppPath($appPath);

$eMVC->setRoute($myRoutes);

echo round(memory_get_usage() / 1024, 5) . 'KB<br>';
echo(microtime(true) - $STARTTIME);
