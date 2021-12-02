<?php
/**
 * Author Name : Isaac Lowe
 * Date : 12/2/2021
 * File : updateItem.php
 * Description:
 */


//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve item id. Do not proceed if id was not found.
if (!filter_has_var(INPUT_POST, 'id')) {
    $error = "There was a problem retrieving item id.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//include code from the database.php file
require_once('includes/database.php');

/* Proceed since id was successfully retrieved.
 * Retrieve item details.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$Product_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Product_name', FILTER_SANITIZE_STRING)));
$Category = $conn->real_escape_string(filter_input(INPUT_POST, 'Category_id', FILTER_DEFAULT));
$Price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Price', FILTER_SANITIZE_STRING)));
$Description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING)));


//Define MySQL update statement
$sql = "UPDATE $tblMenu SET Product_name = '$Product_name',Category_id = '$Category', Price = '$Price', Description = '$Description' 
 WHERE Item_id=$id";

$query = @$conn->query($sql);

//Handle potential errors
if (!$query) {
    $error = "Update failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//close the database connection
$conn->close();
header("Location: itemDetails.php?id=$id&w=updateItem");
