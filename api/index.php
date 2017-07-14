<?php

namespace IatiHub;

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

if (!defined('APP_PATH'))
{
	define('APP_PATH', realpath('./') . '/' );
}

use Phalcon\Mvc\Micro;
use Phalcon\Loader;
use Phalcon\DI\FactoryDefault;
use Phalcon\Events\Manager;

class Application {

	protected function registerServices()
	{
		$loader = new Loader();
		$di     = new FactoryDefault();

		$loader->registerNamespaces(
					[
						'Phalcon'             =>  APP_PATH . 'apps/library/Phalcon/',
						'IatiHub\Main'        =>  APP_PATH . 'apps/modules/main/classes/',					   
						'IatiHub\System'      =>  APP_PATH . 'apps/system/',
			
						'Firebase'            =>  APP_PATH . 'apps/library/Firebase/',

					]
				);

		$loader->register();

		$config = new \Phalcon\Config\Adapter\Php(APP_PATH . 'apps/config/config.php'); 
		$di->set('config', $config);

	
	
	}


	public function main()
	{

		try 
		{

			$this->registerServices();

			$app           = new Micro();
			
			$eventsManager = new Manager();

			require APP_PATH . 'apps/config/routes.php';

			$eventsManager->attach('micro', new \IatiHub\System\Middleware\NotFoundMiddleware());
			$app->before(new \IatiHub\System\Middleware\NotFoundMiddleware());
			
			
			$eventsManager->attach('micro', new \IatiHub\System\Middleware\ResponseMiddleware());
			$app->after(new \IatiHub\System\Middleware\ResponseMiddleware());

			$app->setEventsManager($eventsManager);

			$app->handle();


		} catch (\Exception $e) {
			
			var_dump($e);
		
		}
	}


}

$application = new Application();
$application->main();
