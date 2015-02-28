<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.html");
}
require_once("config.php");
$db = connectToDB();

$emp_no = $_POST['emp_no'];

$sql = "DELETE FROM employees WHERE emp_no =".$emp_no;

$result = mysqli_query($db,$sql);

if(!$result)
{
    die('Could not retrieve records from the '.DB_NAME.' Database: ' . mysqli_error($db));
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
        <h1>Employee #<?php echo $emp_no; ?> deleted.</h1>
        <a href="emp_page.php">go home.</a>
        <form id="logout-delete" name="logout" action="logout.php">
            <input type="submit" name="submit" value="Logout"> 
        </form>
    </body>
</html>