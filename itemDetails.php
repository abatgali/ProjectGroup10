<?php
/*** Author: Alex*
 * Date: 11/11/2021*
 * File: itemDetails.php*
 * Description: This script displays details of a particular menu item*/
?>

<?php
$title = "Item Details";
require_once('includes/header.php');
require_once('includes/database.php');

$Item_id = filter_input(INPUT_GET,"Item_id",FILTER_SANITIZE_NUMBER_INT);

//if item id cannot be retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving item id.";
    $conn -> close();
    header("Location: error.php?m=$error");
    die();
}

//retrieve item id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * 
        FROM $tblMenu
        WHERE Item_id = $id";

//Execute the query
$query = $conn -> query($sql);

//handle errors
if (!$query) {
    $error = "Selection failed: " . $conn -> error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Menu Item not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
    <h2>Our Menu Items</h2>
    <div class="menuDetails">
        <div class="label">
            <!-- display item attributes  -->
            <div class="col1">Product Name:</div>
            <div class="col2">Description:</div>
            <div class="col3">Price:</div>
        </div>
        <div class="content">
            <!-- display item details -->
            <div class="col1"><?= $row['Product_name'] ?></div>
            <div class="col2"><?= $row['Description'] ?></div>
            <div class="col3"><?= $row['Price'] ?></div>
        </div>
    </div>
<?php
require_once('includes/footer.php');