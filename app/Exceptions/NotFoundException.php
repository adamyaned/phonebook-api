<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class NotFoundException extends \Exception implements HttpExceptionInterface
{
    /**
     * @var string
     */
    protected $message = "Not found";

    /**
     * @var int
     */
    protected $code = 404;

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
