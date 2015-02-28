<?php
require_once '../Business/iBusinessObject.php';
require_once '../Data/aDataAccess.php';

class Cart implements iBusinessObject{

    private $m_trackId;
    private $m_name;
    private $m_unitPrice;


    public function __construct($in_trackId, $in_name, $in_unitPrice)
    {
        $this->m_trackId = $in_trackId;
        $this->m_name = $in_name;
        $this->m_unitPrice = $in_unitPrice;
    }

    public function getID()
    {
        return ($this->m_trackId);
    }

    public function getName()
    {
        return ($this->m_name);
    }

    public function getUnitPrice()
    {
        return $this->m_unitPrice;
    }

    public static function retrieveSome($start,$count)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectTracks($start, $count);

        while ($row = $myDataAccess->fetchTracks()) {
            $currentTrack = new self($myDataAccess->fetchTrackID($row),
                $myDataAccess->fetchName($row),
                $myDataAccess->fetchUnitPrice($row));

            $arrayOfTrackObjects[] = $currentTrack;


        }
    }

        public static function retrieveOne($trackId)
        {
            $myDataAccess = aDataAccess::getInstance();
            $myDataAccess->connectToDB();

            $myDataAccess->selectTrack($trackId);

            $row = $myDataAccess->fetchTrack();

            $currentTrack = new self($myDataAccess->fetchTrackID($row),
                $myDataAccess->fetchName($row),
                $myDataAccess->fetchUnitPrice($row));

            return $currentTrack;
        }

    public function save()
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $recordsAffected = $myDataAccess->insertCustomer($this->m_firstName, $this->m_lastName);

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) affected!";

    }
}