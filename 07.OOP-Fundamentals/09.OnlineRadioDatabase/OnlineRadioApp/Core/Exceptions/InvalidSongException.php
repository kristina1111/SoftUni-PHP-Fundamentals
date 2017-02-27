<?php
namespace OnlineRadioApp\Core\Exceptions;

use Exception;

class InvalidSongException extends \Exception
{
    public function __construct($message = "Invalid song.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}