<?php
session_start();
require_once("../Business/User.php");

if(isset($_POST['username']) AND isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // To protect MySQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    $result = User::checkUser($username,$password);

    if ($result == 1){
        $_SESSION['username'] = $username;
        header("location:trackDisplay.php");
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chinook Shopping</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Login failed.</h1>
<a href="index.html">Try again.</a>
</body>
</html>
