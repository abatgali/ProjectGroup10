<?php
/**
 * Author: Anant Batgali
 * Date: 11/11/21
 * File: searchresults.php
 * Description: this page outputs search results and connects to the database
 */

$page_title = "Search results";

require_once ('includes/head.php');
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
$sql = "SELECT id, title, author, price, category
    FROM $tblBook, $tblCategory
    WHERE $tblBook.category_id = $tblCategory.category_id AND ";

foreach ($terms as $t) {
    $sql .= "title LIKE '%$t%' AND "; // removing the extra "AND " at the end of the string
}

$sql = rtrim($sql, "AND ");

//execute the query
$query = $conn->query($sql);

// Handle Selection errors
if (!$query) {
    $error = "Selection failed: ". $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

?>
    <h2>Book search results for: '<?= $term ?>'</h2>
<?php
if ($query->num_rows == 0) {
    echo "Your search '$term' did not match any books in our inventory";
    include ('includes/footer.php');
    exit;
} ?>

    <div class="booklist">
        <div class="row header">
            <div class="col1">Title</div>
            <div class="col2">Author</div>
            <div class="col3">Category</div>
            <div class="col4">Price</div>
        </div>
        <!-- insert a row into the table for each book -->
        <?php while ($row = $query->fetch_assoc()) {?>
            <div class = "row">
                <div class = "col1"><a href="bookdetails.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></div>
                <div class = "col1"><?= $row['author'] ?></div>
                <div class = "col1"><?= $row['category'] ?></div>
                <div class = "col1"><?= $row['price'] ?></div>
            </div>
        <?php } ?>
    </div>

<?php
include ('includes/footer.php');





