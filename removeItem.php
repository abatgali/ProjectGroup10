<?php
/**
 * Author Name : Isaac Lowe
 * Date : 12/2/2021
 * File : removeItem.php
 * Description:
 */
$page_title = "Item Deletion";
require_once 'includes/header.php';
require_once 'includes/database.php';

//if item id unretreivable
if (!filter_has_var(INPUT_GET, 'id')){
    $error = "There was a problem retrieving the item ID";
    header("Location: error.php?m=$error");
    die();
}

//retrieve product id from query string
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);


$sql = "DELETE FROM $tblMenu WHERE Item_id = $id";

//erro
$query = @$conn->query($sql);
if (!$query) {
    $error = "Deletion failed: $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
echo "<p>The book has been successfully deleted from the database.</p>";
$conn->close();
require_once 'includes/footer.php';