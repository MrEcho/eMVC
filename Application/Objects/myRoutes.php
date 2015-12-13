<?php

namespace Application\Objects;

use eMVC\interfaces\iRouter, Symfony\Component\Yaml\Yaml;

class myRoutes implements iRouter
{

	//private $layout = array();
	private $appPath;

	public function __construct($appPath) {
		$this->appPath = $appPath;
	}

	public function getLayout() {
		$yaml = Yaml::parse(file_get_contents($this->appPath . '/Config/routes.ymal'));

		return $yaml;
	}
}