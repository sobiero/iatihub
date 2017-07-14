<?php

namespace IatiHub\System\Middleware;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
 * NotFoundMiddleware
 *
 * Processes the 404s
 */
class NotFoundMiddleware implements MiddlewareInterface
{
     /**
     * The route has not been found
     *
     * @returns bool
     */
    public function beforeNotFound()
    {
        
		$app     = new Micro();
		$di      = $app->getDi();
		$config  = $di->get('config');

		$baseUri = ($config['app']['baseUri']);
		
		$app->response->redirect( $baseUri . 'error/404', true);
        $app->response->send();

        return false;

    }

	/**
     * Calls the middleware
     *
     * @param Micro $application
     *
     * @returns bool
     */
	public function call(Micro $application)
    {
        return true;
    }

}