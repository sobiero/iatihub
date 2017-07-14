<?php
namespace IatiHub\Main\Controllers;

use \Phalcon\Mvc\Controller;

class UserController extends Controller {

	public function indexAction($name)
	{
	  //echo " Hello " . $name;
	}

	public function getAction($name)
	{
	
	  

	  return ['code' => 200,  'message' => 'Request successfully received', 'payload' => [ "Hello " . $name ] ];


	}

}