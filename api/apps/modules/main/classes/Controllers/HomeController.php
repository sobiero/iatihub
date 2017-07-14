<?php
namespace IatiHub\Main\Controllers;

use \Phalcon\Mvc\Contoller;


class HomeController extends Controller {

	public function indexAction($name)
	{
	  echo " Hello " . $name;
	}

}