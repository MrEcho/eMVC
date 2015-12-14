<?php


namespace eMVC;


use Application\Base\Container;

class Base{

    private  $router;

	public function __construct($appPath, Container $container) {
        $this->appPath = $appPath;
		$this->router = new Router($container);
    }

    public function setRoute($myRoutes){
        $this->router->route($myRoutes);
    }


    public function setAppPath($appPath){
        $this->router->setAppPath($appPath);
    }
} 