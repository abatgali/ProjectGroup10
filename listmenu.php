<?php
/*** Author: Alex Weber*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: Hopefully this lists something*/

$page_title = "Menu";
require 'includes/header.php';
require_once('includes/database.php');
//Use a select statement to retrieve information form the
//men_items table

$sql = "SELECT Item_ID, Product_name, category_id, Price FROM $tblMenu_items";



//to attempt a query execute
$query = $conn->query($sql);

//Error handling
if(!$query){
    $error = "Oops: ". $conn->error;
    $conn->close();
    $conn->close();
    header("Location: error.php?m=$error");
    exit();
}
$row = $query->fetch_assoc();
if(!$row){
    $error = "Menu item not food";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>

<h2>Menu Items</h2>
<div>
    <div>
        <div>Item ID</div>
        <div>Product Name</div>
        <div>Category ID</div>
        <div>Price</div>
    </div>
    <!-- add PHP code here to list all menu items from the "menu" table -->
    <?php while($row = $query->fetch_assoc()){?>
        <div class="row">
            <div class="col1"><?= $row['Item_ID']?></div>
            <div class="col2"><?= $row['Product_name']?></div>
            <div class="col3"><?= $row['category_id']?></div>
            <div class="col4"><?= $row['price']?></div>
        </div>
    <?php }?>
</div>
