<?php
/**
 * Author Name : Isaac Lowe
 * Date : 12/2/2021
 * File : insertBook.php
 * Description:
 */
//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'Product_name') ||
    !filter_has_var(INPUT_POST, 'Price') ||
    !filter_has_var(INPUT_POST, 'Category_id') ||
    !filter_has_var(INPUT_POST, 'Description')) {

    echo "There were problems retrieving book details. New book cannot be added.";
    header("Location: error.php?m=$error");
    die();
}

//include code from database.php file
require_once('includes/database.php');

/* Retrieve book details.
 * For security purpose, call the built-in function real_escape_string to
 * escape special characters in a string for use in SQL statement.
 */
$Product_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Product_name', FILTER_SANITIZE_STRING)));
$Price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Price', FILTER_SANITIZE_STRING)));
$Category_id = $conn->real_escape_string(filter_input(INPUT_POST, 'Category_id', FILTER_DEFAULT));
$Description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING)));

//add your code below

//Define MySQL insert statement
$sql = "INSERT INTO $tblMenu VALUES (NULL, '$Product_name','$Category_id', '$Price' ,'$Description')";

//execute the query
$query = @$conn->query($sql);

//Handle potential errors
if (!$query) {
    $error = "Insertion failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//determine the item id
$id = $conn->insert_id;

//close the database connection
$conn->close();
header("Location: itemDetails.php?id=$id&m=insert");
?>
<title>HTML Elements Reference</title>

