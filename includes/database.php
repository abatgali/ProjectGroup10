<?php
/**
 * Author: Anant Batgali, Alex Weber
 * Date: 11/9/21
 * File: database.php
 * Description: Using connect to connect to the entrees_louies_db database  */

//connecting the phpmyadmin database into the webpage
//This is going to be a very rough draft version of it
//make it more secure or whatever on thursday
//Setting the parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "entrees_louies_db"; //database name.....
$tblCategoriess = "categoriess"; //categoriess table
$tblMenu = "menu_items";   //menu_items table

//connecting to MySQL server
$conn = @new mysqli($host, $login, $password, $database);

//Handle connection errors
if($conn->connect_errno){
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    exit;
}