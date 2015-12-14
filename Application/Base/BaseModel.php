<?php

namespace Application\Base;


use eMVC\core\ModelCore;
use Application\Models\Session;
use Application\Objects\myDatabase;

class BaseModel extends ModelCore
{

	/** @var myDatabase $database */
	public $database;

	/** @var Session session */
	public $session;

	public function __construct() {
		parent::__construct();

		/** Load Classes that are needed everywhere */
		$this->database = $this->container->database;
		$this->session = $this->container->session;
	}

	/**
	 * @param $name String This is the module in the Container
	 * @return mixed
	 */
	public function __get($name) {
		return $this->container->__get($name);
	}
	
}