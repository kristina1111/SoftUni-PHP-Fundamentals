<?php

/*
 * Create an online radio station database.
 * It should keep information about all added songs.
 * On the first line you are going to get the number of songs you are going to try adding.
 * On the next lines you will get the songs to be added in the format
 * <artist name>;<song name>;<minutes:seconds>.
 * To be valid, every song should have an artist name, a song name and length.
 * Design a custom exception hierarchy for invalid songs.
 * Check validity in the order artist name -> song name -> song length.
 * If the song is added, print "Song added.".
 * If you can’t add a song, print an appropriate exception message.
 * On the last two lines print the number of songs added and the total length of the playlist in format
 * {Playlist length: 0h 00m 00s}.
 *
 * Sample input 1:
3
ABBA;Mamma Mia;3:35
Nasko Mentata;Shopskata salata;4:123
Nasko Mentata;Shopskata salata;4:12

 * Output expected:
Song added.
Song seconds should be between 0 and 59.
Song added.
Songs added: 2
Playlist length: 0h 07m 47s
 *
 * Sample input 2:
5
Nasko Mentata;Shopskata salata;14:59
Nasko Mentata;Shopskata salata;14:59
Nasko Mentata;Shopskata salata;14:59
Nasko Mentata;Shopskata salata;14:59
Nasko Mentata;Shopskata salata;0:5
 *
 * Output expected:
Song added.
Song added.
Song added.
Song added.
Song added.
Songs added: 5
Playlist length: 1h 00m 01s
 *
 */

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$input = \OnlineRadioApp\IO\ConsoleIO::readLine();
$playlist = new \OnlineRadioApp\Entities\Playlist();

while ($input--){
    $info = explode(';', \OnlineRadioApp\IO\ConsoleIO::readLine());
    try{
        $song = new \OnlineRadioApp\Entities\Song($info);
    }catch (\Exception $e){
        \OnlineRadioApp\IO\ConsoleIO::writeLine($e->getMessage());
        continue;
    }
    $playlist->addSong($song);

    \OnlineRadioApp\IO\ConsoleIO::writeLine("Song added.");
}

\OnlineRadioApp\IO\ConsoleIO::write($playlist);