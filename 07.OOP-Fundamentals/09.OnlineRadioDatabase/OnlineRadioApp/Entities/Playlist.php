<?php
namespace OnlineRadioApp\Entities;

class Playlist
{
    private static $lastId;
    private $id;
    private $songs;

    /**
     * Playlist constructor.
     * @param $songs
     */
    public function __construct(array $songs = [])
    {
        $this->id = ++self::$lastId;
        $this->songs = $songs;
    }

    /**
     * @return array
     */
    public function getSongs(): array
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    private function setSongs(array $songs)
    {
        $this->songs = $songs;
    }



    /**
     * @param Song $song
     */
    public function addSong(Song $song)
    {
        $this->songs[] = $song;
    }

    /**
     *
     */
    public function getPlaylistTotalLengthInSec()
    {
        $totalLengthInSec = 0.0;
        /** @var Song $song */
        foreach ($this->getSongs() as $song){
            $totalLengthInSec += $song->getLengthInSec();
        }

        return $totalLengthInSec;
    }

    /**
     * @return float
     */
    public function getPlaylistLengthDays() : float
    {
        $totalLengthInSec = $this->getPlaylistTotalLengthInSec();
        return floor($totalLengthInSec/60/60/24);
    }

    public function getPlaylistLengthHours() : float
    {
        $totalLengthInSec = $this->getPlaylistTotalLengthInSec();
        return floor(($totalLengthInSec - $this->getPlaylistLengthDays()*24*60*60)/60/60);
    }

    public function getPlaylistLengthMinutes() : float
    {
        $totalLengthInSec = $this->getPlaylistTotalLengthInSec();
        return floor(($totalLengthInSec - $this->getPlaylistLengthDays()*24*60*60
        -$this->getPlaylistLengthHours()*60*60)/60);
    }

    public function getPlaylistLengthSeconds(): float
    {
        $totalLengthInSec = $this->getPlaylistTotalLengthInSec();
        return $totalLengthInSec - $this->getPlaylistLengthDays()*24*60*60
        - $this->getPlaylistLengthHours()*60*60 - $this->getPlaylistLengthMinutes()*60;
    }

    public function __toString()
    {
        $output = "Songs added: " . count($this->getSongs()) . PHP_EOL;
        $output .= "Playlist length: ";
        if($this->getPlaylistLengthDays()>0){
            $output .= $this->getPlaylistLengthDays()."d ";
        }
        $output .= $this->getPlaylistLengthHours() . "h ";
        $output .= sprintf("%02d", $this->getPlaylistLengthMinutes()) . "m ";
        $output .= sprintf("%02d", $this->getPlaylistLengthSeconds()) . "s";

        return $output;
    }

}