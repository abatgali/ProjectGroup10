<?php
/**
 * Author: Anant Batgali
 * Date: 11/11/21
 * File: searchresults.php
 * Description: this page outputs search results and connects to the database
 */

$title = "Search results";

require_once ('includes/header.php');
require_once ('includes/database.php');

// retrieve search term
if (!filter_has_var(INPUT_GET, "q")) {
    $error = "There was no search terms found.";
    $conn->close();
    header("location: error.php?m=$error");
    die();
}

$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);

// explode the search terms into an array
$terms = explode(" ", $term);

// select statement using pattern search. Multiple terms are concatenated in the loop
$sql = "SELECT * 
    FROM $tblMenu
    WHERE ";
foreach ($terms as $t) {
    $sql .= "Product_name LIKE '%$t%' AND "; // removing the extra "AND " at the end of the string
}

$sql = rtrim($sql, "AND ");

//execute the query
$query = $conn -> query($sql);

// Handle Selection errors
if (!$query) {
    $error = "Selection failed: " . $conn -> error;
    $conn -> close();
    header("Location: error.php?m=$error");
    die();
}

?>
    <h3>Search results for: '<?= $term ?>'</h3>
<?php
if ($query -> num_rows == 0) {
    echo "Your search '$term' did not match any menu items";
    include ('includes/footer.php');
    exit();
} ?>
    <div class="menuItems">
        <div class = "row header">
            <div class="col1" style="text-decoration: underline">Product</div>
            <div class="col2" style="text-decoration: underline">Description</div>
            <div class="col3" style="text-decoration: underline">Price</div>
        </div>
        <!-- displaying each search result -->
        <?php while ($row = $query -> fetch_assoc()) {?>
        <div class="row">
           <div class="col1"><a href="itemDetails.php?id=<?= $row['Item_id'] ?>"><?= $row['Product_name'] ?></a></div>
            <div class="col2"><?= $row['Description'] ?></div>
            <div class="col3"><?= $row['Price'] ?></div>
        </div>
        <?php } ?>
    </div>
<?php
include ('includes/footer.php');





