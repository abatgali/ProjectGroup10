<?php
/**
 * Author: Anant Batgali, Alex Weber
 * Date: 11/9/21
 * File: database.php
 * Description: basically so far we are creating a mock way to connect our phpmyadmin database into this
 */


//connecting the phpmyadmin database into the webpage
//This is going to be a very rough draft version of it
//make it more secure or whatever on thursday
$database = "entrees_louies_db"; //database name.....
$tblCategoriess = "categoriess"; //categoriess table
$tblMenu_items = "menu_items";   //menu_items table

//connecting to MySQL server
$conn = @new mysqli($database);

//Handle connection errors
if($conn->connect_errno){
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    exit;
}



























?>