<?php

namespace eMVC\core;


use Application\Base\Container;
use
    eMVC\Router;

class ControllerCore {

    private static $instance;

	/** @var \Application\Base\Container $container */
	public $container;
    public $appPath;

	public function __construct(Container $container) {


        $router = Router::get_instance();

		$this->container = $container;
        $this->appPath = $router->appPath;

		self::$instance =& $this;
    }

    public static function &get_instance()
    {
        return self::$instance;
    }

    public function debug($input,$exit=false){
        echo '<pre>';
        print_r($input);
        echo '</pre>';
        if($exit){exit;};
    }

    protected function load_module($model, $name)
    {


		$x = $this->container->__get($name);
		if (isset($x))
        {
			//$this->log->error('The model name you are loading is the name of a resource that is already being used: '.$name);
        }

		$this->container->__set($name, new $model($this->container));

    }
} 