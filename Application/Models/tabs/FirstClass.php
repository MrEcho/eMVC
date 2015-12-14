<?php

namespace Application\Models\tabs;

use Application\Base\BaseModel;


class FirstClass extends BaseModel
{

	/**
	 *
	 */
	public function first() {

		echo '<pre>';
		print_r($this);
		echo '</pre>';

	}

}