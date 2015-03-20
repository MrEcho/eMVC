<?php


namespace Application\Base;

use eMVC\core\ControllerCore;
use
    Twig_Environment;
use
    Twig_Loader_Filesystem;


class BaseController extends ControllerCore{

    public $view = array("head"=>array("title"=>"","meta"=>array(),"css"=>array(),"js"=>array()));
    public $twig;

    public function __construct()
    {
        parent::__construct();

        $this->load_module("\\Application\\Models\\Logger","log");
        $this->load_module("\\Application\\Models\\Session", "session");
    }

    /**
     * The idea is to setup TWIG on a per use bases. Not every view needs html!
     * TWIG is 486KB
     */
    public function setupTwig(){
        $loader = new Twig_Loader_Filesystem($this->appPath.'/View/');
        $this->twig = new Twig_Environment($loader);
        $this->twig->disableDebug();
        $this->twig->setCache(false);
    }
} 