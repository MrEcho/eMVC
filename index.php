<?php

    $STARTTIME = microtime(true);

    require_once("./vendor/autoload.php");

    use
        Application\Objects\myDatabase,
        Application\Objects\myRoutes;
    use
        eMVC\Base;

    function autoload($className)
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require $fileName;
    }
    spl_autoload_register('autoload');

    $cwd = getcwd();

    $appPath = $cwd."/Application/";

    $eMVC = new Base($appPath);

    $eMVC->startSession();

    $myDB = new myDatabase();
    $myRoutes = new myRoutes($appPath);

    $eMVC->setDatabaseObject($myDB);

    $eMVC->setAppPath($appPath);

    $eMVC->setRoute($myRoutes);

    //echo round(memory_get_usage() / 1024 , 5).'KB<br>';
    //echo ($STARTTIME - microtime(true));
