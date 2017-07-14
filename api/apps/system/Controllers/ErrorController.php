<?php
namespace IatiHub\System\Controllers;

use \Phalcon\Mvc\Controller;


class ErrorController extends Controller {

	public function error404Action()
	{
	    return [ 'code' => 404,  'message' => 'Requested resource was not found', 'payload' => [] ];
	}

	public function error401Action()
	{
	    return [ 'code' => 401,  'message' => 'You are not authorized to access the requested resource', 'payload' => [] ];
	}
}