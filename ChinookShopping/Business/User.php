<?php
require_once '../Business/iBusinessObject.php';
require_once '../Data/aDataAccess.php';

class User
{
    private $m_username;
    private $m_password;

    public function __construct($in_username, $in_password)
    {
        $this->m_username = $in_username;
        $this->m_password = $in_password;
    }

    public function getUsername()
    {
        return $this->m_username;
    }

    public function getPassword()
    {
        return $this->m_password;
    }

    //check is login is valid
    public static function checkUser($username, $password)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectUser($username, $password);

        $count = $myDataAccess->fetchUser();

        $myDataAccess->closeDB();

        return $count;

    }

    public static function registerUser($username, $password)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $userAdded = $myDataAccess->insertUser($username,$password);

        if($userAdded == true){
            $myDataAccess->closeDB();
            return true;
        }

        $myDataAccess->closeDB();
        return false;
    }

    public static function validUsername($username)
    {
        $myDataAccess = aDataAccess::getInstance();
        $myDataAccess->connectToDB();

        $valid = $myDataAccess->checkUser($username);

        if($valid == 0){
            $myDataAccess->closeDB();
            return true;
        }

        $myDataAccess->closeDB();
        return false;
    }

    public static function passwordsMatch($pw1, $pw2)
    {
        if ($pw1 == $pw2) {
            return true;
        } else {
            return false;
        }

    }
}