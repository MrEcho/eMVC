<?php

namespace Application\Models\tabs;

use eMVC\core\ModelCore;

class FirstClass extends ModelCore
{

	public function first() {

		//echo '<pre>'; print_r($this->modules);  echo '</pre>';

		$this->session->test();
	}

}