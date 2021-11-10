<?php
/*
 *Author:       James Ritter
 *Date:         11/10/2021
 *File:         database.php
 *Description:  Access database for the website
*/
?>

<?php
//Define parameters
$host           = "localhost";
$login          = "phpuser";
$password       = "phpuser";
$database       = "";     //Database used

//Define tables of database


//Connect to the MySQL server
$conn = @ new mysqli($host, $login, $password, $database);

//Handle connection errors
if ($conn -> connect_errno){
    $error = $conn -> connect_error;
    header("Location: error.php?m=$error");
    die();
}
?>