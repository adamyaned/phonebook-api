<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ApiException extends \Exception implements HttpExceptionInterface
{
    /**
     * @var string
     */
    protected $message = "Server error";

    /**
     * @var int
     */
    protected $code = 500;

    /**
     * @return int|mixed
     */
    public function getStatusCode()
    {
        return $this->getCode();
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return [

        ];
    }
}
