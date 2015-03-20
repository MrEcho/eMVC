<?php

namespace eMVC;

use
    eMVC\interfaces\iRouter;

class Router {

    private static $instance;

    public $database;
    public $appPath;

    public function __construct()
    {
        self::$instance =& $this;
    }

    public static function &get_instance()
    {
        return self::$instance;
    }


    public function route(iRouter $myRoutes){

        $layout = $myRoutes->getLayout();

        $request = $_SERVER['REQUEST_URI'];
        //print_r($layout);

        $split = explode("/", $request);
        $split = array_filter($split, 'strlen');

        //todo this needs more work
        $path = array();
        $break = false;
        foreach($split as $e){
            if($e === "index.php" && $break == false){ $break = true;}
            else { $path[] = filter_var($e, FILTER_SANITIZE_STRING); }
        }

        //echo '<pre>';
        //print_r($path);
        //echo '</pre>';

        if(strlen(@$path[0]) >=1 ) { $controler = $path[0];} else { $controler = "default"; }
        if(strlen(@$path[1]) >=1 ) { $function = $path[1];} else { $function = "default"; }

        $validc = false;
        $validf = false;
        $loadcontroler = "";
        $loadfunction = "";
        if(@$layout[$controler]){
            $validc = true;
            if(@$layout[$controler][$function]){
                $validf = true;
                $loadcontroler = $layout[$controler][$function]['Controller'];
                $loadfunction = $layout[$controler][$function]['Function'];
            }
            else{ http_response_code(404); }
        } else {
            http_response_code(404);
        }

        unset($layout);

        if($validc && $validf){
            $class = '\\Application\\Controller\\' . $loadcontroler;
            $c = new $class();
            $c->$loadfunction($path);
        }
    }

    public function setAppPath($appPath){
        $this->appPath = $appPath;
    }
    public function setDatabase($database){
        $this->database = $database;
    }


} 