<?php
/*** Author: Alex Weber*
 * Date: 11/10/2021*
 * File: listmenu.php*
 * Description: THIS FILE CONNECTS OUR WEBPAGE TO THE entrees_louies DATABASE*/

$title = "Our Menu";
$menu_title = "Menu Items";

require_once('includes/header.php');
require_once('includes/database.php');

// finding total number of menu items
$queryfortotalrows = "SELECT COUNT(*) FROM menu_items";
$result = mysqli_query( $conn, $queryfortotalrows);
$total = mysqli_fetch_row($result)[0];

$rowsPerPage = 6;

// number of pages sharing menu items
$pages = ceil($total / $rowsPerPage);

/*if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['page_position'] = 0;
}*/

// getting the page selected from the url
if (isset($_GET['pg'])) {
    $pg = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
}
else{
    $pg = 1;
}

$offset = ($pg - 1) * $rowsPerPage;

// query for fetching menu items 6 items(max) at a time
$sql = "SELECT * FROM menu_items LIMIT $offset, $rowsPerPage";

$res_data = mysqli_query($conn, $sql);

// attempt a query execute
$query = $conn -> query($sql);

//Error handling
if (!$query) {
    $error = "Oops: " . $conn -> error;
    $conn -> close();
    header("Location: error.php?m=$error");
    exit();
}

?>

<br>
    <form action="searchresults.php" method="get">
        <input type="text" name="q" size="40" required>&nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" value="Search Items">
    </form>
    <div class="menuItems">
        <h2><?php echo $menu_title ?></h2>
        <!-- Buttons to switch between pages  -->
        <ul class="paginate">
            <?php
            if ($pg != 1)
            {
                ?>
                <li><a href='<?=$_SERVER['PHP_SELF']?>?pg=<?= $pg - 1 ?>'>Prev</a></li>
                <?php
            }
            for ($i = 1; $i <= $pages; $i++) {
                ?>
                <li><a href='<?=$_SERVER['PHP_SELF']?>?pg=<?= $i ?>'><?php echo $i ; ?></a></li>
                <?php
            }
            if ($pg != $pages) {
                ?>
                <li><a href="<?=$_SERVER['PHP_SELF']?>?pg=<?= $pg + 1 ?>">Next</a></li>
                <?php
            }
            ?>
        </ul>
        <br>
        <div class="row header">
            <div class="col1" style="text-decoration: underline">Product</div>
            <div class="col2" style="text-decoration: underline">Description</div>
            <div class="col3" style="text-decoration: underline">Price</div>
            <div style="text-decoration: underline">Add to Cart</div>
        </div>

        <?php
        while ($row = mysqli_fetch_array($res_data)) {
        ?>
        <div class="row header">
            <div class="col1"><a href="itemDetails.php?id=<?php echo $row['Item_id']; ?>"><?php echo $row['Product_name']; ?></a></div>
            <div class="col2"><?php echo $row['Description']; ?></div>
            <div class="col3">$<?php echo $row['Price']; ?></div>
            <div> <a href="addtocart.php?id=<?= $row['Item_id'] ?>">
                    <img src="images/plustocart.png" alt="click to add item to cart">
                </a></div>
        </div>
        <?php
        }
        ?>
        <br>
        <!-- Buttons to switch between pages  -->
        <ul class="paginate">
            <?php
            if ($pg != 1)
            {
            ?>
                <li><a href='<?=$_SERVER['PHP_SELF']?>?pg=<?= $pg - 1 ?>'>Prev</a></li>
            <?php
            }
            for ($i = 1; $i <= $pages; $i++) {
            ?>
                <li><a href='<?=$_SERVER['PHP_SELF']?>?pg=<?= $i ?>'><?php echo $i ; ?></a></li>
            <?php
            }
            if ($pg != $pages) {
            ?>
            <li><a href="<?=$_SERVER['PHP_SELF']?>?pg=<?= $pg + 1 ?>">Next</a></li>
            <?php
            }
            ?>
        </ul>
</div>
<?php
require_once("includes/footer.php");