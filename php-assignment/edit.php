<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
require_once("config.php");
$db = connectToDB();

$emp_no = $_POST['emp_no'];
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$hire_date = $_POST['hire_date'];

$sql = "UPDATE employees SET ";
$sql.="birth_date='";
$sql.=$birth_date;
$sql.="',first_name='";
$sql.=$first_name;
$sql.="',last_name='";
$sql.=$last_name;
$sql.="',gender='";
$sql.=$gender;
$sql.="',hire_date='";
$sql.=$hire_date;
$sql.="' WHERE emp_no='";
$sql.=$emp_no;
$sql.="';";

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
        <h1>Record <?php echo $emp_no; ?> updated.</h1>
        <a href="emp_page.php">go home.</a>
    </body>
</html>
