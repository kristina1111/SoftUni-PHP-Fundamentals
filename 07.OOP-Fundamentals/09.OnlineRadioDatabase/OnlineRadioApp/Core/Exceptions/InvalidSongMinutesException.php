<?php
namespace OnlineRadioApp\Core\Exceptions;

use \Exception;

class InvalidSongMinutesException extends InvalidSongLengthException
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}