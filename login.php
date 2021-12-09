<?php
/*** Author: Alex Weber*
 * Date: 11/30/2021*
 * File: login.php*
 * Description: Login in page*/

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

//validate username and password against a record in the users table in the database. If they are valid, create session variables.
$sql = "SELECT * 
        FROM users 
        WHERE username='$username' AND password='$password'";

$query = @$conn->query($sql);

if ($query->num_rows) {
    //It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['login_status'] = 1;
}



//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");