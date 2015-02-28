<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chinook Shopping - Login</title>
    <script src="js/checkform.js" type="text/javascript"></script>
</head>
<body>
<h1>Register for Chinook Shopping.</h1>
<table>
    <form role="form" name="register" method="post" action="trackDisplay.php" onsubmit="return checkForm()">
    <tr>
        <td>Choose Username*</td>
        <td><input type="text" name="username" placeholder="Create a Username" onblur="anyText(this,'You must enter a username','usernameWarning')">
            <br /><span id="usernameWarning"></span><br /></td>
    </tr>
    <tr>
        <td>Password*</td>
        <td><input type="password" name="password" placeholder="Enter A Password" onblur="anyText(this,'You must enter a password','passwordWarning')">
            <br /><span id="passwordWarning"></span><br /></td>
    </tr>
    <tr>
        <td>Confirm Password*</td>
        <td><input type="password" name="password2" placeholder="Enter Password Again" onblur="anyText(this,'You must confirm the password','password2Warning')">
            <br /><span id="password2Warning"></span><br /></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input name="register" type="submit" value="Submit"></td>
    </tr>

        </form>
    </table>
</body>
</html>