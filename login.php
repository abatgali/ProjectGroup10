<?php
/**
 * Author: James Ritter
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description:
 **/
?>
<?php
//include code from database.php
require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $passcode = "";

//retrieve username and password from the form in the registerform.php
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//close the connection
$conn -> close();

//redirect to the loginform.php page
header("Location: loginform.php");
?>
