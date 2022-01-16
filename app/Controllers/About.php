<?php

namespace App\Controllers;

class About extends BaseController
{
	/**
	 * about the of the webiste
	 *
	 * @return void
	 */
	public function index()
	{
        $this->loadTemplate('about','About',['validation'=>\config\Services::validation()],['home.css']);

	}
}
