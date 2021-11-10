<?php
/*** Author: your name*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: Hopefully this lists something*/
require_once('includes/database.php');

$sql = "SELECT Item_ID, PProduct_name, category_id, Price FROM $tblMenu_items";

//to attempt a query execute
$query = $conn->query($sql);

if(!$query){
    $error = "Oops: ". $conn->error;
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
