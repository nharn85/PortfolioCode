<?php

// So, which database implementation will we use??
require_once '../Data/DataAccessMySQLi.php';
//require_once '../Data/DataAccessPDOSQLite.php';

abstract class aDataAccess
{
    private static $m_DataAccess;

    public static function getInstance()
    {
        // singleton
        if(self::$m_DataAccess == null)
        {
            self::$m_DataAccess = new DataAccessMySQLi();
//            self::$m_DataAccess = new DataAccessPDOSQLite();
        }
        return self::$m_DataAccess;
    }

    public abstract function connectToDB();

    public abstract function selectUser($username, $password);

    public abstract function closeDB();

    public abstract function selectTracks($start,$count);

    public abstract function selectTrack($trackId);

    public abstract function fetchTracks();

    public abstract function fetchTrack();
    
    public abstract function fetchTrackID($row);

    public abstract function fetchAlbum($row);

    public abstract function insertUser($username, $password);

    public abstract function checkUser($username);
}
?>
