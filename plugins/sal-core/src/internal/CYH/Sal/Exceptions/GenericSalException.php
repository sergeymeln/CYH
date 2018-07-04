<?php


namespace CYH\Sal\Exceptions;


class GenericSalException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}