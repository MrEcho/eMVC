<?php

namespace Application\Base;

class Container
{
	private static $instance;

	public function __construct() {
		self::$instance =& $this;
	}

	public static function &get_instance() {
		return self::$instance;
	}

	public function __get($name) {
		return @$this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}
	
}