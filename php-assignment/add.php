<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.html");
}
require_once("config.php");
$db = connectToDB();

$emp_no = $_POST['emp_no'];
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$hire_date = $_POST['hire_date'];


$sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES ('";
$sql.=$emp_no;
$sql.="','";
$sql.=$birth_date;
$sql.="','";
$sql.=$first_name;
$sql.="','";
$sql.=$last_name;
$sql.="','";
$sql.=$gender;
$sql.="','";
$sql.=$hire_date;
$sql.="')";

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
        <h1><?php echo $first_name.' '.$last_name; ?> inserted.</h1>
        <a href="emp_page.php">go home.</a>
        <form id="logout-delete" name="logout" action="logout.php">
            <input type="submit" name="submit" value="Logout"> 
        </form>
    </body>
</html>