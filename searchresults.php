<?php
/**
 * Author: Anant Batgali
 * Date: 11/11/21
 * File: searchresults.php
 * Description: this page outputs search results and connects to the database
 */

$title = "Search results";

require_once('includes/header.php');
require_once('includes/database.php');
//Session variable for determining how the user wants to search
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//creating session
if (!isset($_SESSION['$boolyexpress'])) {
    $_SESSION['$boolyexpress'] = 'true';
} else {
    if (isset($_GET['w'])) {
        $_SESSION['$boolyexpress'] = $_GET['w'];
    }
}
//Keeps track of the boolean expression in use
$booly = $_SESSION['$boolyexpress'];

// retrieve search term
if (!filter_has_var(INPUT_GET, "q")) {
    $error = "There was no search terms found.";
    $conn->close();
    header("location: error.php?m=$error");
    die();
}

// retrieve the boolean value
if (!filter_has_var(INPUT_GET, "w")) {
    $error = "There was error";
    $conn->close();
    header("location: error.php?m=$error");
    die();
}

$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
// explode the search terms into an array
$terms = explode(" ", $term);

// select statement using pattern search. Multiple terms are concatenated in the loop

//if statement is if the user chooses the 'and' option
if ($booly == 'true') {
    echo $booly;
    // defining the sql
    $sql = "SELECT * FROM $tblMenu WHERE (";

    //parts array
    $parts = array();

    //filter through the boolean 'AND' value
    foreach ($terms as $t) {
        $parts[] = 'Product_name LIKE "%'.$t.'%"';
    }

    //implodes the sql statement
    $sql .= implode(' AND ', $parts).")";

    // Execute the Query
    $query = $conn->query($sql);

//Handle Query Error
    if (!$query) {
        $error = "Selection failed: " . $conn->error;
        $conn->close();
        header("Location: error.php?m=$error");
        die();
    }
    //else statement is if the user chooses the 'or' option
} else {
    echo $booly;
    // defining the sql
    $sql = "SELECT * FROM $tblMenu WHERE (";

    //parts array
    $parts = array();

    //filter through the boolean 'OR' value
    foreach ($terms as $t) {
        $parts[] = 'Product_name LIKE "%'.$t.'%"';
    }

    //implodes the sql statement
    $sql .= implode(' OR ', $parts).")";

    // Execute the Query
    $query = $conn->query($sql);

//Handle Query Error
    if (!$query) {
        $error = "Selection failed: " . $conn->error;
        $conn->close();
        header("Location: error.php?m=$error");
        die();
    }
}
?>
    <h3>Search results for: '<?= $term ?>'</h3>
<?php
if ($query->num_rows == 0) {
    echo "Your search '$term' did not match any menu items";
    include('includes/footer.php');
    exit();
} ?>
    <div class="menuItems">
        <div class="row header">
            <div class="col1" style="text-decoration: underline">Product</div>
            <div class="col2" style="text-decoration: underline">Description</div>
            <div class="col3" style="text-decoration: underline">Price</div>
        </div>
        <!-- displaying each search result -->
        <?php while ($row = $query->fetch_assoc()) { ?>
            <div class="row">
                <div class="col1"><a href="itemDetails.php?id=<?= $row['Item_id'] ?>"><?= $row['Product_name'] ?></a>
                </div>
                <div class="col2"><?= $row['Description'] ?></div>
                <div class="col3"><?= $row['Price'] ?></div>
            </div>
        <?php } ?>
    </div>
<?php
include('includes/footer.php');





