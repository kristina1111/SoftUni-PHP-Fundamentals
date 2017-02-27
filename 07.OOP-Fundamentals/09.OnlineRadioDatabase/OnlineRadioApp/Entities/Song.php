<?php
namespace OnlineRadioApp\Entities;

use OnlineRadioApp\Core\Exceptions\InvalidArtistNameException;
use OnlineRadioApp\Core\Exceptions\InvalidSongLengthException;
use OnlineRadioApp\Core\Exceptions\InvalidSongMinutesException;
use OnlineRadioApp\Core\Exceptions\InvalidSongNameException;
use OnlineRadioApp\Core\Exceptions\InvalidSongSecondsException;

class Song
{
    const ARTIST_NAME_MIN_LENGTH = 3;
    const ARTIST_NAME_MAX_LENGTH = 20;

    const SONG_NAME_MIN_LENGTH = 3;
    const SONG_NAME_MAX_LENGTH = 30;

    const SONG_MINUTES_MIN_LENGTH = 0;
    const SONG_MINUTES_MAX_LENGTH = 14;

    const SONG_SECONDS_MIN_LENGTH = 0;
    const SONG_SECONDS_MAX_LENGTH = 59;

    private $artistName;
    private $songName;
    private $lengthInSec;

    /**
     * Song constructor.
     * @param array $info
     */
//    public function __construct(string $artistName, string $songName, array $length)
    public function __construct(array $info)
    {
        $this->setArtistName($info[0]);
        $this->setSongName($info[1]);
        $this->setLengthInSec(explode(':', $info[2]));
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

    /**
     * @param string $artistName
     * @throws InvalidArtistNameException
     */
    public function setArtistName(string $artistName)
    {
        if(strlen($artistName)<self::ARTIST_NAME_MIN_LENGTH || strlen($artistName)>self::ARTIST_NAME_MAX_LENGTH){
            throw new InvalidArtistNameException("Artist name should be between "
                . self::ARTIST_NAME_MIN_LENGTH
                . " and "
                . self::ARTIST_NAME_MAX_LENGTH
                ." symbols.");
        }
        $this->artistName = $artistName;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @param string $songName
     * @throws InvalidSongNameException
     */
    public function setSongName(string $songName)
    {
        if(strlen($songName)<self::SONG_NAME_MIN_LENGTH || strlen($songName)>self::SONG_NAME_MAX_LENGTH){
            throw new InvalidSongNameException("Song name should be between "
                . self::SONG_NAME_MIN_LENGTH
                . " and "
                . self::SONG_NAME_MAX_LENGTH
                ." symbols.");
        }
        $this->songName = $songName;
    }

    /**
     * @return int
     */
    public function getLengthInSec(): int
    {
        return $this->lengthInSec;
    }

    /**
     * @param array $length
     * @throws InvalidSongLengthException
     * @throws InvalidSongMinutesException
     * @throws InvalidSongSecondsException
     */
    public function setLengthInSec(array $length)
    {
        if(!(count($length)===2 && is_numeric($length[0]) && is_numeric($length[1]))){
            throw new InvalidSongLengthException("Invalid song length.");
        }

        if($length[0]<0 || $length[0]>14){
            throw new InvalidSongMinutesException("Song minutes should be between "
                . self::SONG_MINUTES_MIN_LENGTH
                . " and "
                . self::SONG_MINUTES_MAX_LENGTH . ".");
        }

        if($length[1]<0 || $length[1]>59){
            throw new InvalidSongSecondsException("Song seconds should be between "
                . self::SONG_SECONDS_MIN_LENGTH
                . " and "
                . self::SONG_SECONDS_MAX_LENGTH . ".");
        }

        $this->lengthInSec = $length[0]*60 + $length[1];
    }


}