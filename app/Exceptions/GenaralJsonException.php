<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class GenaralJsonException extends Exception
{
    public function report()
    {
        //send mail or nofity admin
    }


    public function render($request)
    {
        return new JsonResponse([
            'errors' => [
                'message'  => $this->getMessage()
            ]
        ], $this->code);
    }
}
