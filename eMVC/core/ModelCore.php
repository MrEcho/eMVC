<?php

namespace eMVC\core;


use Application\Base\Container;

class ModelCore {

	/** @var \Application\Base\Container $container */
	public $container;

	public function __construct() {
		$this->container = Container::get_instance();
	}

}