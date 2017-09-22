<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;
use Dingo\Api\Contract\Debug\MessageBagErrors;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomException extends HttpException implements MessageBagErrors
{
    protected $errors;

    /**
     * CustomException constructor.
     * @param int $statusCode HTTP 状态码
     * @param int $code 业务状态码
     * @param null $message
     * @param null $errors
     * @param Exception|null $previous
     * @param array $headers
     */
    public function __construct($statusCode = 200,
                                $code = 0,
                                $message = null,
                                $errors = null,
                                \Exception $previous = null,
                                $headers = [])
    {
        if (is_null($errors)) {
            $this->errors = new MessageBag;
        } else {
            $this->errors = is_array($errors) ? new MessageBag($errors) : $errors;
        }

        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasErrors()
    {
        return ! $this->errors->isEmpty();
    }

}
