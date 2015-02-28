<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.html");
}

require_once("config.php");
$db = connectToDB();

$per_page = 25; //no. of results to display in one page
$search = "";
$sql = "SELECT * FROM employees";

if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql.= " WHERE first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'";
}

    if(isset($_POST['next'])) {
        if (isset($_SESSION['start'])){
            $start = ($_SESSION['start'] += $per_page);
            $_SESSION['start'] = $start;
        }else {
            $start = $per_page;
            $_SESSION['start'] = $start;
        }
    } else if(isset($_POST['back'])){
        if(isset($_SESSION['start'])){
            if($_SESSION['start'] == 0){
                $start = 0;
            } else {
                $start = ($_SESSION['start'] - $per_page);
                $_SESSION['start'] = $start;
            }

        } else {
            $start = 0;
            $_SESSION['start'] = $start;
        }
    } else {
        $start = 0;
    }

$sql.= " LIMIT ".$start.",".$per_page."";

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
            <title>Assessment "Assignment"</title>
            <link href="styles.css" rel="stylesheet" type="text/css">
            <script src="delete.js" type="text/javascript"></script>
        </head>
        <body>
            <table>
                <tr>

                    </td>
                </tr>
                <tr class="search">
                    <td colspan="8">
                        Search First & Last Names From Database:
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <form id="search" name="search" method="post" name="search" action="emp_page.php"> 
                            <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Enter Search"> 
                            <input type="submit" name="submit" value="Search"> 
                        </form>
                        <form id="add" name="add" action="addForm.php" method="post">
                            <input type="submit" name="submit" value="Add Employee">
                        </form>
                        <form id="logout" name="logout" action="logout.php">
                            <input type="submit" name="submit" value="Logout"> 
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>Emp. Number</th>
                    <th>Birth Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Hire Date</th>
                    <th colspan="2"></th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['emp_no']; ?></td>
                        <td><?php echo $row['birth_date']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['hire_date']; ?></td>

                        <td><form name="editForm" action="editForm.php" method="post">
                                <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']; ?>">
                                <input id="edit" type="image" src="images/pencil.png">
                            </form>
                        </td>

                        <td><form name="deleteForm" action="deleteForm.php" method="post" onsubmit="return deleteEmployee()">
                                <input type="hidden" name="emp_no" value="<?php echo $row['emp_no']; ?>">
                                <input id="edit" type="image" src="images/trashbin.png">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <?php mysqli_close($db); ?>
                <tr>
                    <td colspan="8">
                        <form id="back" name="back" method="post" action="emp_page.php">
                            <input type="image" name="back" id="back" src="images/back.png" value="-25">
                        </form>
                        <form id="next" name="next" method="post" action="emp_page.php">
                            <input type="image" name="next" id="next" src="images/next.png" value="25">
                        </form>
                    </td>
                </tr>
            </table>
        </body>
    </html>