<?php
session_start();
require("config.php");
$db = connectToDB();

if(isset($_POST['username']) AND isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // To protect MySQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($db, $sql);

    if (!$result) {
        die('Could not retrieve records from the ' . DB_NAME . ' Database: ' . mysqli_error($db));
    }

    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['username'] = $username;
        header("location:emp_page.php");
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assessment "Assignment" - Edit Employee</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Login failed.</h1>
        <a href="index.html">Try again.</a>
    </body>
</html>
