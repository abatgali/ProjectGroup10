<?php
/*** Author: your name*
 * Date: 11/30/2021*
 * File: register.php*
 * Description: */
if(!$_POST) {
    $error = "The service is currently unavailable. Please try again later.";
    header("Location: error.php?m=$error");
    die();
}

//include code from header.php and database.php
require_once('includes/database.php');

/* Retrieve user inputs from the form.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));


//set user's role
$role = 2;  //regular user

//insert statement. The id field is an auto field.
$sql = "INSERT INTO users VALUES (NULL, '$firstname', '$lastname','$email','$password', '$username', '$role')";

//execut the insert query
$query = @$conn->query($sql);

//Handle insertion errors
if (!$query) {
    $error = "Insertion failed: $error = $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();

//start session if it has not already started
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

//create session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = 2;

//set login status to 3 since this is a new user.
$_SESSION['login_status'] = 3;

//redirect the user to the loginform.php page
header("Location:loginform.php");