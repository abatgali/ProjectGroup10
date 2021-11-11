<?php
/*** Author: Alex Weber*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: THIS FILE CONNECTS OUR WEBPAGE TO THE entrees_louies DATABASE*/

$title = "Menu";

require 'includes/head.php';
require_once('includes/database.php');
//Use a select statement to retrieve information form the
//men_items table

$sql = "SELECT Item_id, Product_name,Category_id,Price,Description FROM $tblMenu";

//to attempt a query execute
$query = $conn->query($sql);

//Error handling
if(!$query){
    $error = "Oops: ". $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit;
}
$row = $query->fetch_assoc();
if(!$row){
    $error = "Menu item not food";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <!--The class "current" allows for highlight in nav-->
        <li><a class="current" href="menu.php">Menu</a></li>
        <li><a href="order.php">Order</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
</nav>
<h2>Menu Items</h2>
<div>
    <div class="booklist">
        <div class="col1">Product: </div>
        <div class="col2">Description</div>
        <div class="col3">Price</div>
    </div>
    <!-- add PHP code here to list all menu items from the "menu" table -->
    <?php while($row = $query->fetch_assoc()){?>
        <div class="row">
            <div class="col1"><?= $row['Product_name']?></div>
            <div class="col2"><?= $row['Description']?></div>
            <div class="col3"><?= $row['Price']?></div>
        </div>
    <?php }?>
</div>
