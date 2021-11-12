<?php
/*** Author: Alex Weber*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: THIS FILE CONNECTS OUR WEBPAGE TO THE entrees_louies DATABASE*/
?>

<?php
$title = "Our Menu";

require_once('includes/header.php');
require_once('includes/database.php');

//Use a select statement to retrieve information form the
//menu_items table
$sql = "SELECT * 
        FROM $tblMenu";

//to attempt a query execute
$query = $conn -> query($sql);

//Error handling
if (!$query) {
    $error = "Oops: " . $conn->error;
    $conn -> close();
    header("Location: error.php?m=$error");
    exit();
}

/*$row = $query->fetch_assoc();
if (!$row) {
    $error = "Menu item not food";
    $conn -> close();
    header("Location: error.php?m=$error");
    die();
}*/
?>
    <form action="searchresults.php" method="get">
        <input type="text" name="q" size="40" required />&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search items" />
    </form>

    <h2>Menu Items</h2>
    <div class="menuItems">
        <div class="row header">
            <div class="col1">Product</div>
            <div class="col2">Description</div>
            <div class="col3">Price</div>
        </div>

        <!-- add PHP code here to list all menu items from the "menu" table -->
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="row">
                <div class="col1"><a href="itemDetails.php?id=<?= $row['Item_id'] ?>"><?= $row['Product_name'] ?></a></div>
                <div class="col2"><?= $row['Description'] ?></div>
                <div class="col3"><?= $row['Price'] ?></div>
            </div>
        <?php } ?>
    </div>
<br><br>
<?php
require_once("includes/footer.php");
?>