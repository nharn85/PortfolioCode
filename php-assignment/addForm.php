<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assessment "Assignment" - Add Employee</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <script src="checkform.js" type="text/javascript"></script>
    </head>
    <body>
            <table id="addTable">
                <form name="edit" action="add.php" method="post" onsubmit="return checkForm()">
                    <tr>
                        <th colspan="2">Add New Employee</th>
                    </tr>
                    <tr>
                        <td>Employee Number</td>
                        <td><input type="text" name="emp_no" value="" placeholder="Employee Number" onblur="anyText(this,'You must enter a employee number','empNoWarning')"/>
                        <br /><span id="empNoWarning"></span><br /></td>
                    </tr>
                    <tr>
                        <td>Birth Date</td>
                        <td><input type="text" name="birth_date" value="" placeholder="YYYY-MM-DD" onblur="anyText(this,'You must enter a birth date','bdateWarning')"/>
                            <br /><span id="bdateWarning"></span><br /></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first_name" value="" placeholder="First Name" onblur="anyText(this,'You must enter a first name','firstNameWarning')"/>
                            <br /><span id="firstNameWarning"></span><br /></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last_name" value="" placeholder="Last Name" onblur="anyText(this,'You must enter a last name','lastNameWarning')"/>
                            <br /><span id="lastNameWarning"></span><br /></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="M" >Male<br>
                            <input type="radio" name="gender" value="F">Female
                        </td>
                    </tr>
                    <tr>
                        <td>Hire Date</td>
                        <td><input type="text" name="hire_date" value="" placeholder="YYYY-MM-DD" onblur="anyText(this,'You must enter a hire date','hireDateWarning')"/>
                            <br /><span id="hireDateWarning"></span><br /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input id="addForm" type="submit" name="submit" value="Add Employee">
                            <form id="logout-add" name="logout" action="logout.php">
                                <input type="submit" name="submit" value="Logout"> 
                            </form>
                        </td>
                    </tr>
            </table>
        </form>
    </body>
</html>
