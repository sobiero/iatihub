<?php
use Phalcon\Mvc\Micro\Collection;

/**
Error routes
**/

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
	die();
}

$errors = new Collection();
$errors->setHandler('\IatiHub\System\Controllers\ErrorController', true);
$errors->setPrefix('/error');
$errors->get('/404', 'error404Action');
$errors->get('/401', 'error401Action');

$app->mount($errors);


/**
Auth routes
**/

$auth = new Collection();
$auth->setHandler('\IatiHub\System\Controllers\AuthController', true);
$auth->setPrefix('/auth');
$auth->post('/login',  'loginAction');
$auth->post('/logout', 'logoutAction');

$app->mount($auth);




/**
Main module routes 
**/

$modulePrefix = '/main';


$users = new Collection();
$users->setHandler('\IatiHub\Main\Controllers\UserController', true);
$users->setPrefix($modulePrefix.'/users');
$users->get('/get/{id}', 'getAction');
$users->post('/add/{payload}', 'addAction');

$app->mount($users);
