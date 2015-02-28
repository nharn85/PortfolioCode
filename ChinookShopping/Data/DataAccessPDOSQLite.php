<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'aDataAccess.php';
class DataAccessPDOSQLite extends aDataAccess
{
    private $dbConnection;
    private $result;
    private $stmt;

    // aDataAccess methods
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("sqlite:../Data/db/myDB.sqlite");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectTracks($start,$count)
    {
        try
        {

            $sqlStatement = "SELECT t.TrackId, t.Name as trackName, Album.Title as albumTitle, Artist.Name as artistName, MediaType.Name as mediaType, Genre.Name as genre, t.Composer, t.Milliseconds, t.Bytes, t.UnitPrice FROM Track AS t";
            $sqlStatement .= " INNER JOIN Album ON t.AlbumId=Album.AlbumId";
            $sqlStatement .= " INNER JOIN Artist ON Album.ArtistId=Artist.ArtistId";
            $sqlStatement .= " INNER JOIN MediaType ON t.MediaTypeId=MediaType.MediaTypeId";
            $sqlStatement .= " INNER JOIN Genre ON t.GenreId=Genre.GenreId";
            $sqlStatement .= " LIMIT :start,:count;";

            $this->stmt = $this->dbConnection->prepare($sqlStatement);
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function selectTrack($trackId)
    {
        try
        {

            $sqlStatement = "SELECT t.TrackId, t.Name as trackName, t.UnitPrice FROM Track AS t";
            $sqlStatement .= " WHERE t.TrackId = :trackId";

            $this->stmt = $this->dbConnection->prepare($sqlStatement);
            $this->stmt->bindParam(':trackId', $trackId, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function selectUser($username,$password)
    {
        try
        {

            $sqlStatement = "SELECT * FROM users";
            $sqlStatement .= " WHERE username = ':username' AND password = ':password'";

            $this->stmt = $this->dbConnection->prepare($sqlStatement);
            $this->stmt->bindParam(':username', $username, PDO::PARAM_INT);
            $this->stmt->bindParam(':password', $password, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }


    public function fetchTracks()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Could not retrieve from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function fetchTrack()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Could not retrieve from SQLite Database via PDO: ' . $ex->getMessage());
        }

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

    public function insertUser($username, $password)
    {
        // TODO: Implement insertUser() method.
    }

    public function checkUser($username)
    {
        // TODO: Implement checkUser() method.
    }
}

?>
