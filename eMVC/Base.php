<?php


namespace eMVC;


use
    Twig_Environment;
use
    Twig_Loader_Filesystem;

class Base{

    private  $router;

    public function __construct($appPath){
        $this->appPath = $appPath;
        $this->router = new Router();
    }

    public function startSession(){
        session_start();
    }

    public function setRoute($myRoutes){
        $this->router->route($myRoutes);
    }

    public function setDatabaseObject($db){
        $this->router->setDatabase($db);
    }

    public function setAppPath($appPath){
        $this->router->setAppPath($appPath);
    }
} 