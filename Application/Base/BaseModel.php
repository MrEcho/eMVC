<?php
/**
 * Created by PhpStorm.
 * User: mrecho
 * Date: 12/13/15
 * Time: 5:49 PM
 */

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


		$this->database = $this->container->database;
		$this->session = $this->container->session;
	}

	public function __get($name) {
		return $this->container->__get($name);
	}
	
}