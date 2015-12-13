<?php

namespace Application\Controller;

use Application\Base\BaseController;

use \Application\Models\tabs\FirstClass;

class Main extends BaseController
{

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->setupTwig();

		$this->first = new FirstClass();

		//$this->modules['session']->test();
		//$first = $this->modules['first'];

		$this->first->first();


		echo $this->twig->render('index.html', $this->view);

		//echo '<pre>'; print_r($this);  echo '</pre>';
	}

	public function test2() {
		echo "test2";
	}

} 