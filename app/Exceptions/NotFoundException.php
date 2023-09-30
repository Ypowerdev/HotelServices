<?php

namespace App\Exceptions; 

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotFoundException extends HttpException
{
    public function __construct($message = "Not Found", $code = 404, \Throwable $previous = null)
    {
        parent::__construct($code, $message, $previous);
    }

    public function render($request)
    { 
        return new JsonResponse([
            'error' => $this->getMessage()
        ],
            $this->getStatusCode()
        );
    }
}