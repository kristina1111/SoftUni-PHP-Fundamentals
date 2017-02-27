<?php
namespace OnlineRadioApp\Core\Exceptions;


use \Exception;

class InvalidArtistNameException extends InvalidSongException
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}