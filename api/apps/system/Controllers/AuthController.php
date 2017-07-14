<?php
namespace IatiHub\System\Controllers;

use \Phalcon\Mvc\Controller;
use \Firebase\JWT\JWT;


class AuthController extends Controller {

	public function loginAction()
	{

		$jwtConfig = $this->config->app->jwt;
	  
	    $token = [
			"iss"    => "http://example.org",
			"aud"    => "http://example.com",
			"iat"    => 1356999524,
			"nbf"    => 1357000000,
		    "user"   => 'simon',
		    "email"  => 'obierosimon@gmail.com',
		];
	  
	    $jwt = JWT::encode($token, $jwtConfig->privKey, 'RS512');
	    $decoded = JWT::decode($jwt, $jwtConfig->pubKey, ['RS512']);
	
		return ['code' => 200,  'message' => 'Request successfully received', 'payload' => ['jwt'=>$jwt ] ];

	}

}
