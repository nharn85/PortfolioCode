<?php
define('DB_HOST','');
define('DB_USER','');
define('DB_PASS','');
define('DB_NAME','');

function connectToDB()
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$db)
    {
        die('Could not connect to the '.DB_NAME.' Database: ' .
            mysqli_error($db));
    }
    return $db;
}


