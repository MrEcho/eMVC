<?php

namespace eMVC\core;


use
    eMVC\Router;

class ControllerCore {

    private static $instance;

    public $database;
    public $appPath;
    public $modules = array();

    public function __construct(){
        self::$instance =& $this;

        $router = Router::get_instance();

        $this->database = $router->database;
        $this->appPath = $router->appPath;
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
        /*
        $path = '';
        // Is the model in a sub-folder? If so, parse out the filename and path.
        if (($last_slash = strrpos($model, '/')) !== FALSE)
        {
            $path = substr($model, 0, ++$last_slash);
            $model = substr($model, $last_slash);
        }
        */

        if (isset($this->$name))
        {
            $this->log->error('The model name you are loading is the name of a resource that is already being used: '.$name);
        }

        //if (file_exists($this->appPath .'Models/'.$path.$model.'.php'))
        //{
            //require_once($this->appPath .'Models/'.$path.$model.'.php');

        $this->modules[$name] = new $model();
        //}

    }
} 