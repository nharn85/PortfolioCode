<?php

require_once '../Business/iBusinessObject.php';
require_once '../Data/aDataAccess.php';

class Track implements iBusinessObject
{
    private $m_trackId;
    private $m_name;
    private $m_album;
    private $m_artistName;
    private $m_mediaType;
    private $m_genre;
    private $m_composer;
    private $m_milliseconds;
    private $m_bytes;
    private $m_unitPrice;

    
    public function __construct($in_trackId, $in_name)
    {
        $this->m_trackId = $in_trackId;
        $this->m_name = $in_name;
    }

    public function getID()
    {
        return ($this->m_trackId);
    }
    
    public function getName()
    {
        return ($this->m_name);
    }

    public function getAlbum()
    {
        return ($this->m_album);
    }

    public function getArtistName()
    {
        return $this->m_artistName;
    }


    public function getMediaType()
    {
        return $this->m_mediaType;
    }

    public function getGenre()
    {
        return $this->m_genre;
    }

    public function getComposer()
    {
        return $this->m_composer;
    }

    public function getMilliseconds()
    {
        return $this->m_milliseconds;
    }

    public function getBytes()
    {
        return $this->m_bytes;
    }

    public function getUnitPrice()
    {
        return $this->m_unitPrice;
    }

    public static function retrieveSome($start,$count)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectTracks($start,$count);
        
        while($row = $myDataAccess->fetchTracks())
        {
            $currentTrack = new self($myDataAccess->fetchTrackID($row),
                $myDataAccess->fetchName($row));
            $currentTrack->m_composer = $myDataAccess->fetchComposer($row);
            $currentTrack->m_milliseconds = $myDataAccess->fetchMilliseconds($row);
            $currentTrack->m_bytes= $myDataAccess->fetchBytes($row);
            $currentTrack->m_unitPrice= $myDataAccess->fetchUnitPrice($row);

            // New for artist name
            $currentAlbumName = new Album(
                $myDataAccess->fetchAlbum($row)
            );
            $currentTrack->m_album = $currentAlbumName;

            // New for artist name
            $currentArtistName = new Artist(
                $myDataAccess->fetchArtistName($row)
            );
            $currentTrack->m_artistName = $currentArtistName;

            // New for media type
            $currentMediaType = new MediaType(
                $myDataAccess->fetchMediaType($row)
            );
            $currentTrack->m_mediaType = $currentMediaType;

            // New for media type
            $currentGenre = new Genre(
                $myDataAccess->fetchGenre($row)
            );
            $currentTrack->m_genre = $currentGenre;

            $arrayOfTrackObjects[] = $currentTrack;


        }

        $myDataAccess->closeDB();
        
        return $arrayOfTrackObjects;
    }
    
    public function save()
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $recordsAffected = $myDataAccess->insertCustomer($this->m_firstName,$this->m_lastName);

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) affected!";
        
    }
}

?>
