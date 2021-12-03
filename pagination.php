<?php
/*** Author: Alex Weber*
 * Date: 12/3/2021*
 * File: pagination.php*
 * Description: Using pagination to display multiple search results from the database*/

// Database Configuration file
include('includes/database.php'); ?>
<html>
<head>
    <title>Pagination Testing Page</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
    </tr>
    <?php
    //Getting default page number
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    // Formula for pagination
    $no_of_records_per_page = 5;
    $offset = ($page - 1) * $no_of_records_per_page;
    // Getting total number of pages
    $total_pages_sql = "SELECT COUNT(*) FROM menu_items";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM menu_items LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn, $sql);
    $cnt = 1;
    while ($row = mysqli_fetch_array($res_data)) {
        ?>
        <tr>
            <td><?php echo $cnt; ?></td>
            <td><?php echo $row['Product_name']; ?></td>
            <td>$<?php echo $row['Price']; ?></td>
            <td><?php echo $row['Description']; ?></td>
        </tr>
        <?php
        $cnt++;
    }
    ?>
</table>
<div align="center">
    <ul class="pagination">
        <li><a href="?page=1">1</a></li>
        <li class="<?php if ($page <= 1) {
            echo 'disabled';
        } ?>">
            <a href="<?php if ($page <= 1) {
                echo '#';
            } else {
                echo "?page=" . ($page - 1);
            } ?>">2</a>
        </li>
        <li class="<?php if ($page >= $total_pages) {
            echo 'disabled';
        } ?>">
            <a href="<?php if ($page >= $total_pages) {
                echo '#';
            } else {
                echo "?page=" . ($page + 1);
            } ?>">3</a>
        </li>
        <li><a href="?page=<?php echo $total_pages; ?>">4</a></li>
    </ul>
</div>
</body>
</html>