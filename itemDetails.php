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

$Item_id = filter_input(INPUT_GET, "Item_id", FILTER_SANITIZE_NUMBER_INT);

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
    $conn -> close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query -> fetch_assoc();
if (!$row) {
    $error = "Menu Item not found";
    $conn -> close();
    header("Location: error.php?m=$error");
    die();
}
//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//if the user has logged in, retrieve the user's role.
$role = 0;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}
?>
<div class="container">
    <div class="menuDetails">
        <div class="label">
            <!-- display item attributes  -->
            <div class="col1">Product Name:</div>
            <div class="col2">Price:</div>
            <div class="col3">Description:</div>
        </div>
        <div class="content">
            <!-- display item details -->
            <div class="col1"><?= $row['Product_name'] ?></div>
            <div class="col2">$<?= $row['Price'] ?></div>
            <div class="col3"><?= $row['Description'] ?></div>
        </div
    </div>
    <?php
    $confirm = "";
    if(isset($_GET['w'])) {
        if ($_GET['w'] == "insert") {
            $confirm = "You have successfully added the new item.";
        }
        else if ($_GET['w'] == "updateItem") {
            $confirm = "Your item has been successfully updated.";
        }
    }
    //display the following buttons only if the user's role is 1.
    if ($role == 1) {
    ?>
    <br><br>
    <div class="buttons">
        <input type="button"
               onclick="window.location.href='editItem.php?id=<?= $id ?>'"
               value="Edit">
        <input type="button" value="Delete"
               onclick="window.location.href='deleteItem.php?id=<?= $id ?>'">
        <?php
        }
        ?>
        <div>

            <input type="button"
                   onclick="window.location.href='addtocart.php?id=<?= $id ?>'"
                   value="Add To Cart">
            <input type="button"
                   onclick="window.location.href='listMenu.php'"
                   value="Back to Menu">
        </div>

    </div>
</div>
    <?php
    require_once('includes/footer.php');
    ?>
