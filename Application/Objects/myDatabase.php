<?php

namespace Application\Objects;

use Application\Base\Container;

class myDatabase
{
	public $read = null;
	public $write = null;

	public function __construct(Container $container) {
		try {
			$this->read = new \PDO('mysql:host=localhost;dbname=cirrus', 'cirrus', 'cirrus', array(
					\PDO::MYSQL_ATTR_COMPRESS => true,
					\PDO::ATTR_PERSISTENT => true
				));
		} catch (\PDOException $e) {
			print_r($e);
		}

		try {
			$this->write = new \PDO('mysql:host=localhost;dbname=cirrus', 'cirrus', 'cirrus', array(
					\PDO::MYSQL_ATTR_COMPRESS => true,
					\PDO::ATTR_PERSISTENT => true
				));
		} catch (\PDOException $e) {
			print_r($e);
		}

	}

	public function __destruct() {
		$this->write = null;
		$this->read = null;
	}

} 