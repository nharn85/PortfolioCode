<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'aDataAccess.php';
class DataAccessMySQLi extends aDataAccess
{

    private $dbConnection;
    private $result;

    // aDataAccess methods
    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("","", "","chinook");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Chinook Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    public function selectTracks($start,$count)
    {

        $sqlStatement = "SELECT t.TrackId, t.Name as trackName, Album.Title as albumTitle, Artist.Name as artistName, MediaType.Name as mediaType, Genre.Name as genre, t.Composer, t.Milliseconds, t.Bytes, t.UnitPrice FROM Track AS t";
        $sqlStatement .= " INNER JOIN Album ON t.AlbumId=Album.AlbumId";
        $sqlStatement .= " INNER JOIN Artist ON Album.ArtistId=Artist.ArtistId";
        $sqlStatement .= " INNER JOIN MediaType ON t.MediaTypeId=MediaType.MediaTypeId";
        $sqlStatement .= " INNER JOIN Genre ON t.GenreId=Genre.GenreId";
        $sqlStatement .= " LIMIT $start,$count;";

        $this->result = @$this->dbConnection->query($sqlStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Chinook Database: ' .
                $this->dbConnection->error);
        }

    }

    public function selectTrack($trackId)
    {

        $sqlStatement = "SELECT t.TrackId, t.Name as trackName, t.UnitPrice FROM Track AS t";
        $sqlStatement .= " WHERE t.TrackId = $trackId";

        $this->result = @$this->dbConnection->query($sqlStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Chinook Database: ' .
                $this->dbConnection->error);
        }

    }

    public function selectUser($username, $password)
    {
        $sqlStatement = "SELECT * FROM users";
        $sqlStatement .= " WHERE username = '$username' AND password = '$password'";

        $this->result = @$this->dbConnection->query($sqlStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Chinook Database: ' .
                $this->dbConnection->error);
        }

    }

    public function fetchUser()
    {
        if(!$this->result)
        {
            die('No records in the result set: ' .
                $this->dbConnection->error);
        }
        $count = $this->result->num_rows;
        return $count;
    }


    public function fetchTracks()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }

    public function fetchTrack()
    {
        if(!$this->result)
        {
            die('No records in the result set: ' .
                $this->dbConnection->error);
        }
        return $this->result->fetch_array();
    }

    public function fetchTrackID($row)
    {
       return $row['TrackId'];
    }

    public function fetchName($row)
    {
       return $row['trackName'];
    }

    public function fetchAlbum($row)
    {
       return $row['albumTitle'];
    }

    public function fetchArtistName($row)
    {
        return $row['artistName'];
    }

    public function fetchMediaType($row)
    {
        return $row['mediaType'];
    }

    public function fetchGenre($row)
    {
        return $row['genre'];
    }

    public function fetchComposer($row)
    {
        return $row['Composer'];
    }

    public function fetchMilliseconds($row)
    {
        return $row['Milliseconds'];
    }

    public function fetchBytes($row)
    {
        return $row['Bytes'];
    }

    public function fetchUnitPrice($row)
    {
        return $row['UnitPrice'];
    }

    public function insertUser($username,$password){

        $sqlStatement = "INSERT INTO users";
        $sqlStatement .= " (username, password) VALUES ('$username', '$password')";

        $this->result = @$this->dbConnection->query($sqlStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Chinook Database: ' .
                $this->dbConnection->error);
        }
    return $this->result;
    }

    //check if username already taken
    public function checkUser($username){

        $sqlStatement = "SELECT * FROM users WHERE username = ";
        $sqlStatement .= "'$username'";

        $this->result = @$this->dbConnection->query($sqlStatement);
        if(!$this->result)
        {
            die('Could not retrieve records from the Chinook Database: ' .
                $this->dbConnection->error);
        }

        $count = $this->result->num_rows;
        return $count;
    }

}

?>
