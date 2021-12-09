<?php
/**
 * Author Name : Isaac Lowe
 * Date : 12/2/2021
 * File : editItem.php
 * Description:
 */
$title = "Item Details Edit page";
require_once ('includes/header.php');
require_once('includes/database.php');


//if item id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving item id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//retrieve item id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//SELECT statement
$sql = "SELECT * 
      FROM $tblMenu
      WHERE Item_id = $id";


//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Item not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>


    <h2 class="aboutTop">Edit <?php $row['Product_name'] ?></h2>
    <form action="updateItem.php" method="post">
        <div class="menuDetails">
            <div class="label">
                <!-- display item attributes  -->
                <div class="col1">Product Name:</div>
                <div class="col2">Price:</div>
                <div class="col3">Category:</div>
                <br>
                <div class="col3">Description:</div>
            </div>
            <div class="content">
                <!-- display item details -->
                <div class="col1"><input name="Product_name" value="<?php echo  $row['Product_name'] ?>" required></div>
                <div class="col2"><input name="Price" value="<?php echo  $row['Price'] ?>" required> </div>
                <div class="col3-2" <input name="Category_id" value="<?php echo $row['Category_id'] ?>" required>
                        <select style="width: 238px; height: 32px; " name="Category_id">
                            <option value="a">Appetizer</option>
                            <option value="s">Soup</option>
                            <option value="ent">Entree</option>
                        </select>
                </div>
                <div class="col4-2"><input name="Description" value="<?php echo $row['Description'] ?>" required> </div>
            </div
        </div>
        <div class="buttons">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="submit" value="Update" />
            <input type="button" value="Cancel" onclick="window.location.href='itemDetails.php?id=<?= $id ?>'" />
        </div>
    </form>
</div>

<?php
// close the connection.
$conn->close();
require_once 'includes/footer.php';