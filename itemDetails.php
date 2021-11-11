<?php
/*** Author: Alex*
 * Date: 11/11/2021*
 * File: itemDetails.php*
 * Description: This script displays details of a particular menu item*/

$title = "Item Details";
require_once 'includes/head.php';
require_once('includes/database.php');


$Item_id = filter_input(INPUT_GET,"Item_id",FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * 
FROM $tblMenu
WHERE menu_items.Item_id";

//Execute the query
$query = $conn->query($sql);

//handle errors
if(!$query){
    $error = "Selection failed: ". $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
$row = $query->fetch_assoc();
if(!$row){
    $error = "Menu Item not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
    <h2>Book Details</h2>
    <div class="menuDetails">
        <div class="label">
            <!-- display book attributes  -->
            <div>Product Name: </div>
            <div>Description: </div>
            <div>Price: </div>
        </div>
        <div class="content">
            <!-- display book details -->
            <div><?= $row['Product_name'] ?></div>
            <div><?= $row['Description']?></div>
            <div><?= $row['Price']?></div>
        </div>
    </div>


<?php
require_once('includes/footer.php');