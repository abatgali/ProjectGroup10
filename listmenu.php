<?php
/*** Author: your name*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: Hopefully this lists something*/
require_once('includes/database.php');

$sql = "SELECT Product_name, category_id, Item_ID, Price
FROM $tblMenu_items";

$query = $conn->query($sql);

if(!$query){
    $error = "Oops: ". $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit();
}
?>
    <h2>Products and shit</h2>
    <div>
        <div>
            <div>Product Name</div>
            <div>Category ID</div>
            <div>Item ID</div>
            <div>Price</div>
        </div>
        <!-- add PHP code here to list all books from the "books" table -->
        <?php
        //display shit
        while ($row = $query->fetch_assoc()) { ?>
            <div>
                <div class="col2"><?= $row['Product_name'] ?></div>
                <div class="col3"><?= $row['category_id'] ?></div>
                <div class="col4"><?= $row['price'] ?></div>
            </div>
            <?php } ?>

    <?php while($row = $query->fetch_assoc()){?>
        <div class="row">
            <div class="col1"><?= $row['Product_name']?></div>
            <div class="col2"><?= $row['Item_ID']?></div>
            <div class="col3"><?= $row['category_id']?></div>
            <div class="col4"><?= $row['price']?></div>
        </div>
    <?php }?>
    </div>
<?php