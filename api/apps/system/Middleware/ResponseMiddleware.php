<?php

namespace IatiHub\System\Middleware;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
* ResponseMiddleware
*
* Manipulates the response
*/
class ResponseMiddleware implements MiddlewareInterface
{
     /**
      * Before anything happens
      *
      * @param Micro $application
      *
      * @returns bool
      */
    public function call(Micro $application)
    {
        $statusCodes = [
		   200 =>  'OK',
		   201 =>  'Created',
		   202 =>  'Accepted',
		   400 =>  'Bad Request',
		   401 =>  'Unauthorized',
		   403 =>  'Forbidden',
		   404 =>  'Not Found',
		];

		$returnedValue = $application->getReturnedValue();

		$code     = !empty($returnedValue['code'])? $returnedValue['code'] : 200 ;
		$status   = !isset($statusCodes[$code]) ? '' : $statusCodes[$code];
		$message  = !empty($returnedValue['message'])? $returnedValue['message'] : '' ;
		$payload  = !empty($returnedValue['payload'])? $returnedValue['payload'] : [] ;
		
		
		$payload = [
            'code'    => $code,
            'status'  => $status,
            'message' => $message,
            'payload' => $payload,
        ];

 		$application->response->setStatusCode($code, $status);
		$application->response->setJsonContent($payload);
        $application->response->send();

        return true;
    }
}