<?php


namespace Application\Base;

use eMVC\core\ControllerCore;
use
	Twig_Environment;
use
	Twig_Loader_Filesystem;


class BaseController extends ControllerCore
{

	public $view = array("head" => array("title" => "", "meta" => array(), "css" => array(), "js" => array()), "settings" => array(), "data" => array());
	public $twig;

	public function __construct(Container $container) {
		parent::__construct($container);

		$this->load_module("\\Application\\Models\\Logger", "log");
		$this->load_module("\\Application\\Models\\Session", "session");

		$container->__set('view', $this->view);
	}

	public function __set($name, $object) {
		$this->container->__set($name, $object);
	}

	public function __get($name) {
		return $this->container->__get($name);
	}

	/**
	 * The idea is to setup TWIG on a per use bases. Not every view needs html!
	 * TWIG is 486KB
	 */
	public function setupTwig() {
		$loader = new Twig_Loader_Filesystem($this->appPath . '/View/');
		$this->twig = new Twig_Environment($loader);
		$this->twig->disableDebug();
		$this->twig->setCache(false);
	}
} 