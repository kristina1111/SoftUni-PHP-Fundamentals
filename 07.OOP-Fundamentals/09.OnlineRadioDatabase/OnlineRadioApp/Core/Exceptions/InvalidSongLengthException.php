<?php
namespace OnlineRadioApp\Core\Exceptions;


use Exception;

class InvalidSongLengthException extends InvalidSongException
{
    public function __construct($message = "Invalid song length.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}