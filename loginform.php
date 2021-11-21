<?php
/**
 * Author: James Ritter
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/
?>
<?php
$title = "Login Page";
require_once("includes/header.php");
require_once("includes/database.php");

$message = "Please enter your username and password to login.";
?>
<!DOCTYPE html>
<html lang="en">
    <body>
<div class="login-container">
    <!-- display the login form -->
    <div class="login">
        <form method='post' action='login.php'>
            <table>
                <tr>
                    <td colspan="2"><?php echo $message; ?><br><br></td>
                </tr>
                <tr>
                    <td style="width: 80px">User name: </td>
                    <td><input type='text' name='username' required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type='password' name='password' required></td>
                </tr>
                <tr>
                    <td colspan='2' class="">
                        <input type='submit' value='  Login  '>
                        <input type="button" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- display the registration form -->
    <div class="">
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td colspan="2" align="left">If you are new to our site, please create an account.<br><br></td>
                </tr>
                <tr>
                    <td style="width: 85px">First Name: </td>
                    <td><input name="firstname" type="text" required></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input name="lastname" type="text" required></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input name="username" type="text" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input name="password" type="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="">
                        <input type="submit" value="Register">
                        <input type="button" value="Cancel" onclick="window.location.href = 'index.php'">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php
include ('includes/footer.php');
?>