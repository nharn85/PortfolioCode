<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.html");
}
require_once("config.php");
$db = connectToDB();

$emp_no = $_POST['emp_no'];

$sql = "SELECT * FROM employees WHERE emp_no = ".$emp_no;

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
        <script src="checkform.js" type="text/javascript"></script>
    </head>
    <body>
        <form name="edit" action="edit.php" method="post" onsubmit="return checkForm()">
            <table id="editTable">
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <th colspan="2">Edit Employee #<?php echo $row['emp_no']; ?></th>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td><input type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>" onblur="anyText(this,'You must enter a birth date','bdateWarning')"/>
                        <br /><span id="bdateWarning"></span><br /></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" onblur="anyText(this,'You must enter a first name','firstNameWarning')"/>
                        <br /><span id="firstNameWarning"></span><br /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"onblur="anyText(this,'You must enter a last name','lastNameWarning')"/>
                        <br /><span id="lastNameWarning"></span><br /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <?php if($row['gender'] == 'M'){ ?>
                            <input type="radio" name="gender" value="M" checked>Male<br>
                            <input type="radio" name="gender" value="F">Female
                        <?php } else {?>
                            <input type="radio" name="gender" value="M">Male<br>
                            <input type="radio" name="gender" value="F" checked>Female
                        <?php }?>
                    </td>
                </tr>
                <tr>
                    <td>Hire Date</td>
                    <td><input type="date" name="hire_date" value="<?php echo $row['hire_date']; ?>"onblur="anyText(this,'You must enter a birth date','hiredateWarning')"/>
                        <br /><span id="hiredateWarning"></span><br /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']; ?>">
                        <input type="submit" name="submit" value="Update">
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php mysqli_close($db); ?>
            </table>
        </form>
    </body>
</html>
