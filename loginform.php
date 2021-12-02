<?php
/**
 * Author: James Ritter, Alex Weber
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description: Login and Register forms
 **/
?>
<?php
$title = "Login Page";
require_once("includes/header.php");
?>
<div class="loginHeading">
    <!--<h2>Login or Register</h2> -->
</div>

<?php
$login_status = ' ';

//retrieve session variable
if(isset($_SESSION['login_status'])){
    $login_status = $_SESSION['login_status'];
}
if($login_status == 1){
    echo "<p>You are logged in as ". $_SESSION['name'] . ".</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include ('includes/footer.php');
    exit();
}
//the user's last login attempt failed
if($login_status == 2) {
    $message = "Username or password invalid. Please try again.";
}
//the user has just registered
if ($login_status == 3) {
    echo "<p>Thank you for registering with us. Your account has been created.</p>";
    echo "<a href='logout.php'>Log out</a><br />";
    include ('includes/footer.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <body>
<div class="login-container">
    <!-- display the login form -->
    <div class="loginOld">
        <form method='post' action='login.php'>
            <h2>Existing Customer</h2>
            <table>
                <tr>
                    <td style="width: 80px">Email: </td>
                    <td><input type='email' name='email' required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type='password' name='password' required></td>
                </tr>
                <tr>
                    <td colspan='2' class="choices">
                        <input type='submit' value='  Login  '>
                        <input type="button" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- display the registration form -->
    <div class="loginNew">
        <form action="register.php" method="post">
            <h2>New Customers</h2>
            <table>
                <tr>
                    <td style="width: 85px">First Name: </td>
                    <td><input name="firstname" type="text" required></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input name="lastname" type="text" required></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input name="email" type="email" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input name="password" type="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="choices">
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