<?php

namespace Application\Controller\Cirrus;

use Application\Base\BaseController;
use Application\Base\Container;
use Application\Models\tabs\FirstClass;

class Main extends BaseController
{

	public function __construct(Container $container) {
		parent::__construct($container);
	}

	public function index() {
		// Just messing with things.

		$this->setupTwig();

		//echo '<pre>'; print_r($this);  echo '</pre>';

		$this->FirstClass = new FirstClass();
		//$this->load_module("\\Application\\Models\\tabs\\FirstClass", "first");

		$this->FirstClass->first();

		echo $this->twig->render('index.html', $this->view);

		//echo '<pre>'; print_r($this);  echo '</pre>';

		//phpinfo();
	}

	public function test2() {
		echo "test2";
	}

} 